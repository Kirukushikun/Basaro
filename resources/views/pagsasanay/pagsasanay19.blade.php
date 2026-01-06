<script>
    window.pagsasanay18Questions = @json($questions);
</script>

<div class="relative flex flex-col items-center"
     x-data="{
        page: 1,
        selected: null,
        confirmed: false,
        showFeedback: false,
        recording: false,
        score: 0,
        questions: window.pagsasanay18Questions,
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
            return this.confirmed && this.selected === this.current.answer;
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
            this.confirmed = false;
            this.showFeedback = false;
            this.recording = false;
        },

        replay() {
            this.page = 1;
            this.score = 0;
            this.soundEnabled = false; // Reset sound for replay
            this.reset();
        }
     }">

    <template x-if="current">
        <div class="flex-1 flex flex-col items-center gap-10 mt-10 w-full">

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
            
            <!-- TYPE: VOCABULARY MATCHING -->
            <template x-if="current.type === 'vocabulary_match'">
                <div class="flex flex-col items-center gap-8 w-full">
                    
                    <!-- Word to Match -->
                    <div class="text-center">
                        <p class="text-sm text-gray-400 mb-2">Kasingkahulugan ng salita:</p>
                        <p class="text-4xl font-bold !text-[#F4C300]" x-text="current.word"></p>
                    </div>

                    <!-- Answer Choices -->
                    <div class="flex flex-col gap-3 items-center max-w-md w-full">
                        <template x-for="choice in current.choices" :key="choice">
                            <button
                                @click="!confirmed && (selected = choice)"
                                :disabled="confirmed"
                                :class="{ 
                                    'bg-[#F4C300] !text-black': selected === choice,
                                    'opacity-50 cursor-not-allowed': confirmed && selected !== choice
                                }"
                                class="w-full px-6 py-3 border-2 border-[#F4C300] !text-[#F4C300] font-bold rounded-lg hover:bg-[#F4C300] hover:!text-black transition-all text-center disabled:hover:bg-transparent disabled:hover:!text-[#F4C300]">
                                <span x-text="choice"></span>
                            </button>
                        </template>
                    </div>
                </div>
            </template>

            <!-- TYPE: COMPREHENSION (Multiple Choice) -->
            <template x-if="current.type === 'comprehension'">
                <div class="flex flex-col items-center gap-8 w-full">
                    
                    <!-- Question -->
                    <p class="text-lg font-semibold text-center max-w-xl" x-text="current.question"></p>

                    <!-- Answer Choices -->
                    <div class="flex flex-col gap-3 items-center max-w-md w-full">
                        <template x-for="choice in current.choices" :key="choice">
                            <button
                                @click="!confirmed && (selected = choice)"
                                :disabled="confirmed"
                                :class="{ 
                                    'bg-[#F4C300] !text-black': selected === choice,
                                    'opacity-50 cursor-not-allowed': confirmed && selected !== choice
                                }"
                                class="w-full px-6 py-3 border-2 border-[#F4C300] !text-[#F4C300] font-bold rounded-lg hover:bg-[#F4C300] hover:!text-black transition-all text-center disabled:hover:bg-transparent disabled:hover:!text-[#F4C300]">
                                <span x-text="choice"></span>
                            </button>
                        </template>
                    </div>
                </div>
            </template>

            <!-- Confirm Button -->
            <button x-show="selected && !confirmed"
                    @click="confirm"
                    class="px-6 py-2 bg-[#F4C300] text-black font-bold rounded-lg hover:opacity-90 transition-all">
                Kumpirmahin
            </button>

            <!-- Feedback -->
            <div x-show="showFeedback"
                 x-transition
                 class="mt-4 px-6 py-3 rounded-lg text-lg font-semibold"
                 :class="isCorrect ? 'bg-green-500 text-white' : 'bg-red-500 text-white'">
                <span x-show="isCorrect">✅ Tama!</span>
                <span x-show="!isCorrect">
                    ❌ Mali. Ang tamang sagot ay "<b x-text="current.answer"></b>"
                </span>
            </div>

        </div>
    </template>

    <!-- Results Page -->
    @include('partials.pagsasanay-results')

    <!-- Navigation Buttons -->
    @include('partials.pagsasanay-navigation')

</div>