<div class="relative flex flex-col items-center"
     x-data="{
        page: 1,
        selected: null,
        userInput: '',
        confirmed: false,
        showFeedback: false,
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
                // Score for vocabulary matching
                if (this.current.type === 'vocabulary_match' && this.selected === this.current.answer) {
                    this.score++
                }
                // Score for comprehension (text input)
                if (this.current.type === 'comprehension' && this.userInput.toLowerCase().trim() === this.current.answer.toLowerCase().trim()) {
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
            this.userInput = ''
            this.confirmed = false
            this.showFeedback = false
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
                        <p class="text-sm text-gray-400 mb-2">Hanapin ang kasingkahulugan:</p>
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

            <!-- TYPE: COMPREHENSION -->
            <template x-if="current.type === 'comprehension'">
                <div class="flex flex-col items-center gap-8 w-full">
                    
                    <!-- Question -->
                    <p class="text-lg font-semibold text-center max-w-xl" x-text="current.question"></p>

                    <!-- Text Input -->
                    <input
                        type="text"
                        x-model="userInput"
                        placeholder="Sagutin dito..."
                        @keyup.enter="confirm"
                        class="px-4 py-2 border-2 border-[#F4C300] rounded-lg text-center text-lg focus:outline-none max-w-md">
                </div>
            </template>

            <!-- Confirm Button -->
            <button x-show="(current.type === 'vocabulary_match' && selected && !confirmed) || (current.type === 'comprehension' && userInput && !confirmed)"
                    @click="confirm"
                    class="px-6 py-2 bg-[#F4C300] text-black font-bold rounded-lg">
                Kumpirmahin
            </button>

            <!-- Feedback -->
            <div x-show="showFeedback"
                class="mt-4 px-6 py-3 rounded-lg text-lg font-semibold"
                :class="(current.type === 'vocabulary_match' && selected === current.answer) || (current.type === 'comprehension' && userInput.toLowerCase().trim() === current.answer.toLowerCase().trim()) ? 'bg-green-500 text-white' : 'bg-red-500 text-white'">
                <template x-if="current.type === 'vocabulary_match'">
                    <span x-show="selected === current.answer"><i class="fa-solid fa-check"></i> Tama!</span>
                    <span x-show="selected !== current.answer"><i class="fa-solid fa-x"></i> Mali. Ang tamang sagot ay <b x-text="current.answer"></b></span>
                </template>
                <template x-if="current.type === 'comprehension'">
                    <span x-show="userInput.toLowerCase().trim() === current.answer.toLowerCase().trim()"><i class="fa-solid fa-check"></i> Tama!</span>
                    <span x-show="userInput.toLowerCase().trim() !== current.answer.toLowerCase().trim()"><i class="fa-solid fa-x"></i> Mali. Ang tamang sagot ay <b x-text="current.answer"></b></span>
                </template>
            </div>

        </div>
    </template>

    <!-- Results Page -->
    @include('partials.pagsasanay-results')

    <!-- Navigation Buttons -->
    @include('partials.pagsasanay-navigation')

</div>