<!-- Pagtataya 7: Read Sentence + Multiple Choice -->
<div class="relative flex flex-col items-center"
     x-data="{
        page: 1,
        selected: null,
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
                // Score for read_sentence auto-pass
                if (this.current.type === 'read_sentence') {
                    this.score++
                }
                // Score for multiple_choice if correct
                if (this.current.type === 'multiple_choice' && this.selected === this.current.answer) {
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
            this.recording = false
        },

        replay() {
            this.page = 1
            this.score = 0
            this.reset()
        }
     }">

    <template x-if="current">
        <div class="flex-1 flex flex-col items-center gap-10 w-full">

            <!-- TYPE: READ SENTENCE -->
            <template x-if="current.type === 'read_sentence'">
                <div class="flex-1 flex flex-col items-center gap-10">

                    <!-- Pangungusap -->
                    <h1 class="text-5xl font-bold mt-10 !text-[#F4C300] text-center px-4 max-w-3xl"
                        x-text="current.pangungusap"></h1>
                        
                    <!-- Success -->
                    <div x-show="confirmed"
                        x-transition
                        class="px-4 py-2 bg-green-500 text-white rounded-lg shadow-md text-lg font-semibold">
                        <i class="fa-solid fa-check"></i> Tama!
                    </div>

                    <!-- Instruction -->
                    <p class="w-96 text-lg text-center">
                        Basahin nang malinaw ang pangungusap na nasa itaas.
                        Subukang bigkasin ito nang tama at dahan-dahan.
                    </p>

                    <!-- Microphone -->
                    <div class="flex flex-col items-center gap-4">
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

                        <div class="text-center">
                            <p class="!text-gray-400 text-xs">
                                Pindutin at hawakan ang mikropono habang nagbibigkas
                            </p>
                        </div>             
                    </div>

                </div>
            </template>

            <!-- TYPE: MULTIPLE CHOICE -->
            <template x-if="current.type === 'multiple_choice'">
                <div class="flex-1 flex flex-col items-center gap-8 mt-10">

                    <!-- Question -->
                    <div class="max-w-2xl px-4">
                        <h3 class="text-3xl font-bold !text-[#F4C300] text-center mb-2" 
                            x-text="current.tanong"></h3>
                    </div>

                    <!-- Answer Choices -->
                    <div class="flex flex-col gap-4 items-center max-w-xl w-full px-4">
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
                                class="w-full px-6 py-4 border-2 border-[#F4C300] !text-[#F4C300] font-bold rounded-lg hover:bg-[#F4C300] hover:!text-black transition-all text-center disabled:cursor-not-allowed text-lg">
                                <span x-text="choice"></span>
                            </button>
                        </template>
                    </div>

                    <!-- Feedback -->
                    <div x-show="confirmed"
                         x-transition
                         class="mt-4 px-6 py-3 rounded-lg text-lg font-semibold"
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

        </div>
    </template>

    <!-- Results Page -->
    @include('partials.pagsasanay-results')

    <!-- Navigation Buttons -->
        <!-- Navigation Buttons (Modified for Story Page) -->
    <div x-show="page <= questions.length" class="absolute -bottom-[110px] flex items-center justify-between w-[450px]">
        <!-- Page Counter (hide on story page) -->
        <p x-show="page > 0">
            <span x-text="page"></span>/<span x-text="questions.length"></span>
        </p>
        <p x-show="page === 0" class="text-sm opacity-70">Kwento</p>
        
        <div class="flex gap-3">
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