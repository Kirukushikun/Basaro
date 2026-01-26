<script>
    window.pagsasanay15Questions = @json($questions);
</script>

<div class="relative flex flex-col items-center"
     x-data="{
        page: 1,
        selected: null,
        userInput: '',
        confirmed: false,
        showFeedback: false,
        score: @entangle('score'),
        totalScore: @entangle('totalScore'),
        completed: false,
        showModal: false,
        questions: window.pagsasanay15Questions,
        soundEnabled: false,
        currentPanutoAudio: null,

        get isPanuto() {
            return this.current && this.current.type === 'panuto';
        },

        get showSoundOverlay() {
            // Only show if sound not enabled AND it's the first panuto
            return !this.soundEnabled && this.isPanuto;
        },

        enableSound() {
            this.soundEnabled = true;
            // Play the panuto audio if it exists
            if (this.current && this.current.audio) {
                this.currentPanutoAudio = new Audio(this.current.audio);
                this.currentPanutoAudio.play();
            }
        },

        get current() {
            return this.page <= this.questions.length
                ? this.questions[this.page - 1]
                : null
        },

        get isCorrect() {
            if (!this.confirmed) return false;
            
            if (this.current.type === 'classify') {
                return this.selected === this.current.answer;
            }
            
            if (this.current.type === 'riddle') {
                return this.userInput.toLowerCase().trim() === this.current.answer.toLowerCase().trim();
            }
            
            return false;
        },

        confirm() {
            this.confirmed = true;
            this.showFeedback = true;
            
            if (this.isCorrect) {
                this.score++;
            }
        },

        next() {
            if (!this.confirmed) {
                // For panuto, just proceed
                if (this.current.type === 'panuto') {
                    this.page++;
                    this.reset();
                    
                    // Stop panuto audio if playing
                    if (this.currentPanutoAudio) {
                        this.currentPanutoAudio.pause();
                        this.currentPanutoAudio.currentTime = 0;
                        this.currentPanutoAudio = null;
                    }

                    // Auto-play next panuto audio if applicable
                    this.$nextTick(() => {
                        if (this.soundEnabled && this.isPanuto && this.current && this.current.audio) {
                            this.currentPanutoAudio = new Audio(this.current.audio);
                            this.currentPanutoAudio.play();
                        }
                    });
                }
                // For comprehension, submit the answer
                else if (this.current.type === 'comprehension') {
                    this.handleComprehensionSubmit();
                }
            } else {
                this.page++;
                this.reset();

                // Stop panuto audio if playing
                if (this.currentPanutoAudio) {
                    this.currentPanutoAudio.pause();
                    this.currentPanutoAudio.currentTime = 0;
                    this.currentPanutoAudio = null;
                }

                // Auto-play next panuto audio if applicable
                this.$nextTick(() => {
                    if (this.soundEnabled && this.isPanuto && this.current && this.current.audio) {
                        this.currentPanutoAudio = new Audio(this.current.audio);
                        this.currentPanutoAudio.play();
                    }
                });
            }
        },

        reset() {
            this.selected = null;
            this.userInput = '';
            this.confirmed = false;
            this.showFeedback = false;
        },

        replay() {
            this.page = 1;
            this.score = 0;
            this.soundEnabled = false; // Reset sound for replay
            this.reset();
        }
     }">

    <template x-if="current">
        <div class="flex-1 flex flex-col items-center gap-10 mt-10 w-full lg:min-w-96">

            <template x-if="showSoundOverlay">
                <div class="absolute inset-0 bg-black/60 flex items-center justify-center z-50 rounded-lg ">
                    <button 
                        @click="enableSound()" 
                        class="px-6 py-3 bg-[#F4C300] !text-black font-bold rounded-lg text-lg shadow-lg hover:bg-yellow-500 transition-all"
                    >
                        <i class="fa-solid fa-volume-high !text-black"></i> I-enable ang Tunog
                    </button>
                </div>
            </template>

            <!-- PANUTO TYPE -->
            <template x-if="isPanuto">
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-5 w-full px-4">
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <h2 class="text-center font-bold text-2xl !text-[#F4C300] mb-2">
                            PANUTO
                        </h2>
                        <p class="text-white mb-4"><strong x-text="current.header"></strong></p>
                        <p class="!text-gray-300 mb-4" x-text="current.body"></p>
                    </div>

                    <button @click="next" class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold whitespace-nowrap mb-5">
                        Naiintindihan ko ang panuto
                    </button>
                </div>
            </template>
            
            <!-- TYPE: CLASSIFY PROVERBS -->
            <template x-if="current.type === 'classify'">
                <div class="flex flex-col items-center gap-8 w-full">
                    
                    <!-- Proverb Text -->
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-xl text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl italic text-white" x-text="current.text"></p>
                    </div>

                    <!-- Question -->
                    <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-semibold text-center" x-text="current.question"></p>

                    <!-- Classification Choices -->
                    <div class="flex flex-col gap-3 items-center max-w-md w-full">
                        <template x-for="choice in current.choices" :key="choice">
                            <button
                                @click="!confirmed && (selected = choice)"
                                :disabled="confirmed"
                                :class="{ 
                                    'bg-[#F4C300] !text-black': selected === choice,
                                    'opacity-50 cursor-not-allowed': confirmed && selected !== choice
                                }"
                                class="w-full px-6 py-3 border-2 border-[#F4C300] !text-[#F4C300] font-bold rounded-lg hover:bg-[#F4C300] hover:!text-black transition-all text-center disabled:hover:bg-transparent disabled:hover:!text-[#F4C300] !text-base sm:!text-lg md:!text-lg lg:!text-xl">
                                <span x-text="choice"></span>
                            </button>
                        </template>
                    </div>
                </div>
            </template>

            <!-- TYPE: RIDDLE -->
            <template x-if="current.type === 'riddle'">
                <div class="flex flex-col items-center gap-8 w-full">
                    
                    <!-- Riddle Text -->
                        <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-xl text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl italic text-white whitespace-pre-line" x-text="current.text"></p>
                    </div>

                    <!-- Question -->
                    <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-semibold text-center" x-text="current.question"></p>

                    <!-- Text Input -->
                    <input
                        type="text"
                        x-model="userInput"
                        :disabled="confirmed"
                        placeholder="Sagutin dito..."
                        @keyup.enter="!confirmed && userInput.trim() && confirm()"
                        class="px-4 py-2 border-2 border-[#F4C300] rounded-lg text-center !text-base sm:!text-lg md:!text-lg lg:!text-xl focus:outline-none max-w-md disabled:bg-gray-800 disabled:cursor-not-allowed">
                </div>
            </template>

            <!-- Confirm Button -->
            <button x-show="!confirmed && ((current.type === 'classify' && selected) || (current.type === 'riddle' && userInput.trim()))"
                    @click="confirm"
                    class="px-6 py-2 bg-[#F4C300] text-black font-bold rounded-lg hover:opacity-90 transition-all !text-base sm:!text-lg md:!text-lg lg:!text-xl">
                Kumpirmahin
            </button>

            <!-- Feedback -->
            <div x-show="showFeedback"
                 x-transition
                 class="mt-4 px-6 py-3 rounded-lg !text-base sm:!text-lg md:!text-lg lg:!text-xl font-semibold"
                 :class="isCorrect ? 'bg-green-500 text-white' : 'bg-red-500 text-white'">
                <div x-show="isCorrect"
                            class="px-6 py-4 bg-green-500 text-white rounded-lg shadow-md !text-base sm:!text-lg md:!text-lg lg:!text-xl font-semibold text-center">
                            <i class="fa-solid fa-check"></i> Tama!
                        </div>
                <span x-show="!isCorrect">
                    <i class="fa-solid fa-xmark"></i> Mali. Ang tamang sagot ay "<b x-text="current.answer"></b>"
                </span>
            </div>

        </div>
    </template>

    <!-- Results Page -->
    @include('partials.pagsasanay-results')

    <!-- Navigation Buttons -->
    @include('partials.pagsasanay-navigation')

</div>