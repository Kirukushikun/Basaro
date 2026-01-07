<!-- Pagsasanay 8: Story Reading + Multiple Choice Questions -->
<div class="relative"
    x-data="{
    page: 0,
    selected: null,
    confirmed: false,
    score: 0,
    questions: @js($questions),
    story: @js($this->getStoryProperty()),
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
        return this.page > 0 && this.page <= this.questions.length
            ? this.questions[this.page - 1]
            : null
    },

    get isStoryPage() {
        return this.page === 0
    },

    next() {
        if (this.isPanuto) {
            // Move past panuto page
            this.page++
            this.reset()
            
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
        } else if (this.isStoryPage) {
            // Move from story to first question
            this.page++
            this.confirmed = false
        } else if (!this.confirmed) {
            // Confirm answer
            this.confirmed = true
            if (this.selected === this.current.answer) {
                this.score++
            }
        } else {
            // Move to next question
            this.page++
            this.reset()
        }
    },

    reset() {
        this.selected = null
        this.confirmed = false
    },

    replay() {
        this.page = 0
        this.score = 0
        this.soundEnabled = false; // Reset sound for replay
        this.reset()
    }
    }"
>
    <!-- SOUND OVERLAY -->
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

    <!-- Story Page -->
    <template x-if="isStoryPage">
        <div class="flex-1 flex flex-col items-center justify-center gap-10 w-full px-4">
            
            <h2 class="!text-2xl sm:!text-3xl md:!text-4xl lg:!text-4xl font-bold !text-[#F4C300]">Basahin ang Kwento</h2>

            <div class="max-w-3xl bg-gray-800 p-10 rounded-xl border-4 border-[#F4C300] shadow-2xl">
                <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl leading-relaxed text-white" x-text="story"></p>
            </div>

            <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl text-center max-w-xl opacity-80">
                Basahin nang mabuti ang kwento. Pagkatapos, sasagutin mo ang mga tanong tungkol dito.
            </p>

        </div>
    </template>


    <!-- Question Pages -->
    <template x-if="current && !isPanuto">
        <div class="flex-1 flex flex-col items-center gap-8 mt-10 w-full px-4">

            <!-- Question -->
            <div class="max-w-2xl">
                <h3 class="!text-lg sm:!text-2xl md:!text-2xl lg:!text-3xl font-bold !text-[#F4C300] text-center mb-2" 
                    x-text="current.question"></h3>
            </div>

            <!-- Answer Choices -->
            <div class="flex flex-col gap-4 items-center max-w-xl w-full">
                <template x-for="choice in current.choices" :key="choice">
                    <button
                        @click="!confirmed && (selected = choice)"
                        :disabled="confirmed"
                        :class="{
                            'bg-[#F4C300] !text-black border-[#F4C300]': selected === choice && !confirmed,
                            'bg-green-500 !text-white border-green-500': confirmed && choice === current.answer,
                            'bg-red-500 !text-white border-red-500': confirmed && selected === choice && choice !== current.answer,
                            'opacity-50': confirmed && choice !== current.answer && choice !== selected
                        }"
                        class="w-full px-6 py-4 border-2 border-[#F4C300] !text-[#F4C300] font-bold rounded-lg hover:bg-[#F4C300] hover:!text-black transition-all text-center disabled:cursor-not-allowed !text-base sm:!text-lg md:!text-lg lg:!text-xl">
                        <span x-text="choice"></span>
                    </button>
                </template>
            </div>

            <!-- Feedback -->
            <div x-show="confirmed"
                 x-transition
                 class="mt-4 px-6 py-3 rounded-lg !text-base sm:!text-lg md:!text-lg lg:!text-xl font-semibold"
                 :class="selected === current.answer ? 'bg-green-500 text-white' : 'bg-red-500 text-white'">
                <span x-show="selected === current.answer">
                    <i class="fa-solid fa-check"></i> Tama! Magaling!
                </span>
                <span x-show="selected !== current.answer">
                    <i class="fa-solid fa-x"></i> Mali. Ang tamang sagot ay <b x-text="current.answer"></b>
                </span>
            </div>

        </div>
    </template>

    <!-- Results Page -->
    @include('partials.pagsasanay-results')

    <!-- Navigation Buttons (Modified for Story Page) -->
    <div x-show="page <= questions.length" class="absolute -bottom-[110px] flex items-center justify-between w-full">
        <!-- Page Counter (hide on story page) -->
        <p x-show="page > 0">
            <span x-text="page"></span>/<span x-text="questions.length"></span>
        </p>
        <p x-show="page === 0" class="text-sm opacity-70">Kwento</p>
        
        <div class="flex gap-3">
            <button x-show="page > 0" @click="page--; reset()" class="px-4 py-2 border border-gray-500 text-white rounded-md font-bold whitespace-nowrap">
                <i class="fa-solid fa-arrow-left"></i> Balik
            </button>
            <!-- Story page: always show next button -->
            <!-- Question pages: show when answer is selected -->
            <button 
                x-show="page === 0 || (selected && !confirmed) || confirmed" 
                @click="next" 
                :disabled="page > 0 && !selected && !confirmed"
                class="px-4 py-2 bg-[#F4C300] rounded-md  font-bold whitespace-nowrap disabled:opacity-50 disabled:cursor-not-allowed">
                <span x-show="page === 0 || confirmed" class="!text-black">Susunod</span>
                <span x-show="page > 0 && selected && !confirmed">Kumpirmahin</span>
                <i class="fa-solid fa-arrow-right !text-black"></i>
            </button>
        </div>
    </div>

</div>