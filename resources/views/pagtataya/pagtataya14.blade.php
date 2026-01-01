<!-- Pagtataya 14: Read Word then Input Panlapi -->
<div class="relative flex flex-col items-center"
     x-data="{
        page: 1,
        confirmed: false,
        recording: false,
        score: 0,
        userInput: '',
        questions: @js($questions),

        get current() {
            return this.page <= this.questions.length
                ? this.questions[this.page - 1]
                : null
        },

        next() {
            if (!this.confirmed) {
                this.confirmed = true
                // Score for read_word auto-pass
                if (this.current.type === 'read_word') {
                    this.score++
                }
                // Score for input_panlapi if correct
                if (this.current.type === 'input_panlapi' && this.userInput.toLowerCase().trim() === this.current.answer.toLowerCase().trim()) {
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
            this.userInput = ''
        },

        replay() {
            this.page = 1
            this.score = 0
            this.reset()
        }
    }">

    <template x-if="current">
        <div class="flex-1 flex flex-col items-center gap-10 w-full">

            <!-- TYPE: READ WORD -->
            <template x-if="current.type === 'read_word'">
                <div class="flex-1 flex flex-col items-center gap-10">

                    <!-- Word to Read -->
                    <h1 class="text-5xl font-bold mt-10 !text-[#F4C300] text-center px-4"
                        x-text="current.salita"></h1>

                    <!-- Success -->
                    <div x-show="confirmed"
                        x-transition
                        class="px-4 py-2 bg-green-500 text-white rounded-lg shadow-md text-lg font-semibold">
                        <i class="fa-solid fa-check"></i> Tama!
                    </div>

                    <!-- Instruction -->
                    <p class="w-96 text-lg text-center font-semibold">
                        Basahin nang malinaw ang salita sa itaas.
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

            <!-- TYPE: INPUT PANLAPI -->
            <template x-if="current.type === 'input_panlapi'">
                <div class="flex-1 flex flex-col items-center gap-10">

                    <!-- Show the word again -->
                    <h1 class="text-5xl font-bold mt-10 !text-[#F4C300] text-center px-4"
                        x-text="current.salita"></h1>

                    <!-- Instruction -->
                    <p class="w-96 text-lg text-center font-semibold">
                        Isulat sa patlang ang <span class="!text-[#F4C300]">panlapi</span> na nasa loob ng salitang ito.
                    </p>

                    <!-- Input Field -->
                    <div class="w-96">
                        <input 
                            type="text"
                            x-model="userInput"
                            :disabled="confirmed"
                            placeholder="Isulat ang panlapi dito..."
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg text-lg focus:outline-none focus:border-[#F4C300] disabled:bg-gray-100 text-center"
                            @keyup.enter="userInput && !confirmed && confirm()">
                    </div>

                    <!-- Feedback -->
                    <div x-show="confirmed"
                         x-transition
                         class="mt-4 px-6 py-3 rounded-lg text-lg font-semibold"
                         :class="userInput.toLowerCase().trim() === current.answer.toLowerCase().trim() ? 'bg-green-500 text-white' : 'bg-red-500 text-white'">
                        <span x-show="userInput.toLowerCase().trim() === current.answer.toLowerCase().trim()">
                            <i class="fa-solid fa-check"></i> Tama! Ang panlapi ay "<span x-text="current.answer"></span>"
                        </span>
                        <span x-show="userInput.toLowerCase().trim() !== current.answer.toLowerCase().trim()">
                            <i class="fa-solid fa-x"></i> Mali. Ang tamang panlapi ay "<b x-text="current.answer"></b>"
                        </span>
                    </div>

                </div>
            </template>

        </div>
    </template>

    <!-- Results Page -->
    @include('partials.pagtataya-results')

    <!-- Navigation Buttons -->
    <div x-show="page <= questions.length" class="absolute -bottom-[110px] flex items-center justify-between w-[450px]">
        <!-- Page Counter -->
        <p>
            <span x-text="page"></span>/<span x-text="questions.length"></span>
        </p>
        
        <div class="flex gap-3">
            <button 
                x-show="(current.type === 'input_panlapi' && userInput && !confirmed) || confirmed" 
                @click="next" 
                :disabled="current.type === 'input_panlapi' && !userInput && !confirmed"
                class="px-4 py-2 bg-[#F4C300] rounded-md font-bold whitespace-nowrap disabled:opacity-50 disabled:cursor-not-allowed">
                <span x-show="confirmed" class="!text-black">Susunod</span>
                <span x-show="current.type === 'input_panlapi' && userInput && !confirmed" class="!text-black">Kumpirmahin</span>
                <i class="fa-solid fa-arrow-right !text-black"></i>
            </button>
        </div>
    </div>

</div>