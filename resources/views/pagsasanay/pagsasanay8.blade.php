<!-- Pagsasanay 8: Story Reading + Multiple Choice Questions -->
<div class="relative"
     x-data="{
        page: 1,
        selected: null,
        confirmed: false,
        showFeedback: false,
        score: 0,
        questions: @js($questions),
        story: @js($this->getStoryProperty()),

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
        },

        replay() {
            this.page = 1
            this.score = 0
            this.reset()
        }
     }">

    <template x-if="current">
        <div class="flex-1 flex flex-col items-center gap-10 mt-10 w-full">

            <!-- Story Display (only on first question) -->
            <template x-if="page === 1">
                <div class="max-w-2xl bg-gray-800 p-8 rounded-lg border-2 border-[#F4C300]">
                    <p class="text-lg leading-relaxed text-white text-center" x-text="story"></p>
                </div>
            </template>

            <!-- Question -->
            <p class="text-lg font-semibold text-center max-w-xl" x-text="current.question"></p>

            <!-- Answer Choices (Buttons) -->
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

            <!-- Confirm Button -->
            <button x-show="selected && !confirmed"
                    @click="confirm"
                    class="px-6 py-2 bg-[#F4C300] text-black font-bold rounded-lg">
                Kumpirmahin
            </button>

            <!-- Feedback -->
            <div x-show="showFeedback"
                class="mt-4 px-6 py-3 rounded-lg text-lg font-semibold"
                :class="selected === current.answer ? 'bg-green-500 text-white' : 'bg-red-500 text-white'">
                <span x-show="selected === current.answer">✅ Tama!</span>
                <span x-show="selected !== current.answer">
                    ❌ Mali. Ang tamang sagot ay <b x-text="current.answer"></b>
                </span>
            </div>

        </div>
    </template>

    <!-- Results Page -->
    @include('partials.pagsasanay-results')

    <!-- Navigation Buttons -->
    @include('partials.pagsasanay-navigation')

</div>