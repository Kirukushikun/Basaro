<script>
    window.pagsasanay19Questions = @json($questions);
</script>

<div class="relative flex flex-col items-center" 
     x-data="{
        page: 1,
        selected: null,
        confirmed: false,
        showFeedback: false,
        recording: false,
        score: 0,
        questions: window.pagsasanay19Questions,

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
            if (this.confirmed) {
                this.page++;
                this.reset();
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
            this.reset();
        }
     }">

    <template x-if="current">
        <div class="flex-1 flex flex-col items-center gap-10 mt-10 w-full">

            <!-- TYPE: VOCABULARY MATCHING (Part A) -->
            <template x-if="current.type === 'vocabulary_match'">
                <div class="flex flex-col items-center gap-8 w-full">
                    
                    <!-- Word to Match -->
                    <div class="text-center">
                        <p class="text-sm text-gray-400 mb-2">Kahulugan ng salita:</p>
                        <p class="text-4xl font-bold !text-[#F4C300]" x-text="current.word"></p>
                    </div>

                    <!-- Answer Choices (2 options) -->
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

            <!-- TYPE: COMPREHENSION (Part B - Multiple Choice) -->
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