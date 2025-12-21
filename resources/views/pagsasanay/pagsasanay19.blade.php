<div class="relative flex flex-col items-center"
     x-data="{
        page: 1,
        selected: null,
        confirmed: false,
        showFeedback: false,
        recording: false,
        score: 0,
        questions: @js($questions),

        get current() {
            return this.page <= this.questions.length
                ? this.questions[this.page - 1]
                : null
        },

        next() {
            if (!this.showFeedback) {
                this.showFeedback = true
                if (this.selected === this.current.answer) {
                    this.score++
                }
            } else {
                this.page++
                this.reset()
            }
        },

        confirm() {
            this.confirmed = true
        },

        reset() {
            this.selected = null
            this.confirmed = false
            this.showFeedback = false
            this.recording = false
        },

        replay() {
            this.page = 1
            this.score = 0
            this.reset()
        }
     }">

    <template x-if="current">
        <div class="flex-1 flex flex-col items-center gap-10 mt-10 w-full">

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
                                @click="selected = choice; confirmed = false; showFeedback = false"
                                :class="{ 'bg-[#F4C300] !text-black': selected === choice }"
                                class="w-full px-6 py-3 border-2 border-[#F4C300] !text-[#F4C300] font-bold rounded-lg hover:bg-[#F4C300] hover:!text-black transition-all text-center">
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
                                @click="selected = choice; confirmed = false; showFeedback = false"
                                :class="{ 'bg-[#F4C300] !text-black': selected === choice }"
                                class="w-full px-6 py-3 border-2 border-[#F4C300] !text-[#F4C300] font-bold rounded-lg hover:bg-[#F4C300] hover:!text-black transition-all text-center">
                                <span x-text="choice"></span>
                            </button>
                        </template>
                    </div>
                </div>
            </template>

            <!-- Confirm Button (for selection, then mic) -->
            <button x-show="selected && !confirmed"
                    @click="confirm"
                    class="px-6 py-2 bg-[#F4C300] text-black font-bold rounded-lg">
                Kumpirmahin
            </button>

            <!-- Microphone (Hold to Record) -->
            <div x-show="confirmed && !showFeedback"
                @mousedown="recording = true"
                @mouseup="
                    recording = false;
                    setTimeout(() => showFeedback = true, 1500)
                "
                @mouseleave="recording = false"
                class="relative bg-gray-500 px-3 py-2 rounded-full cursor-pointer transition-transform hover:scale-110"
                :class="{ 'scale-125 ring-4 ring-red-500 animate-pulse': recording }">
                <i class="fa-solid fa-microphone text-white text-xl"></i>
                <div x-show="recording"
                     class="absolute inset-0 rounded-full bg-red-500 opacity-30 animate-ping"></div>
            </div>

            <!-- Feedback -->
            <div x-show="showFeedback"
                class="mt-4 px-6 py-3 rounded-lg text-lg font-semibold"
                :class="selected === current.answer ? 'bg-green-500 text-white' : 'bg-red-500 text-white'">
                <span x-show="selected === current.answer"><i class="fa-solid fa-check"></i> Tama!</span>
                <span x-show="selected !== current.answer">
                    <i class="fa-solid fa-x"></i> Mali. Ang tamang sagot ay <b x-text="current.answer"></b>
                </span>
            </div>

        </div>
    </template>

    <!-- Results Page -->
    @include('partials.pagsasanay-results')

    <!-- Navigation Buttons -->
    @include('partials.pagsasanay-navigation')

</div>