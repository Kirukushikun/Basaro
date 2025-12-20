<!-- Pagsasanay 3 -->
<div class="relative flex flex-col items-center"
     x-data="{
        page: 1,
        confirmed: false,
        recording: false,
        score: 0,
        questions: @js($questions),

        get current() {
            return this.page <= this.questions.length
                ? this.questions[this.page - 1]
                : null
        },

        next() {
            if (!this.confirmed) {
                this.confirmed = true
                // Score for read_phrase and read_sentence auto-pass
                if (['read_phrase', 'read_sentence'].includes(this.current.type)) {
                    this.score++
                }
                // Score for comprehension if correct
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
            this.confirmed = false
            this.recording = false
        },

        replay() {
            this.page = 1
            this.score = 0
            this.reset()
        }
     }">

    <template x-if="current">
        <div class="flex-1 flex flex-col items-center gap-10">

            <!-- alpabeto -->
            <h1 class="alphabet mt-10 !text-[#F4C300]"
                x-text="current.alpabeto"></h1>

            <!-- Success -->
            <div x-show="confirmed"
                 x-transition
                 class=" px-4 py-2 bg-green-500 text-white rounded-lg shadow-md text-lg font-semibold">
                ✅ Tama!
            </div>

            <!-- Instruction -->
            <p class="w-96 text-lg text-center">
                Basahin nang malinaw ang alpabetong nasa itaas.
                Subukang bigkasin ito nang tama at dahan-dahan.
            </p>

            <!-- Microphone -->
            <div
                @mousedown="recording = true"
                @mouseup="
                    recording = false;
                    setTimeout(() => confirm(), 1500)
                "
                @mouseleave="recording = false"
                class="relative bg-gray-500 px-3 py-2 rounded-full cursor-pointer transition-transform hover:scale-110"
                :class="{ 'scale-125 ring-4 ring-red-500 animate-pulse': recording }">

                <i class="fa-solid fa-microphone text-white text-xl"></i>

                <div x-show="recording"
                     class="absolute inset-0 rounded-full bg-red-500 opacity-30 animate-ping">
                </div>
            </div>

        </div>
    </template>

    <!-- Results Page -->
    @include('partials.pagsasanay-results')

    <!-- Navigation Buttons -->
    @include('partials.pagsasanay-navigation')

</div>