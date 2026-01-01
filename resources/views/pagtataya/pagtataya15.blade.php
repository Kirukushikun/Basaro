<!-- Pagtataya 15: Sawikain + Kasabihan with Comprehension -->
<div class="relative flex flex-col items-center"
     x-data="{
        page: 1,
        userInput: '',
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
                // Score for read_sawikain and kasabihan auto-pass
                if (['read_sawikain', 'kasabihan'].includes(this.current.type)) {
                    this.score++
                }
                // Score for input_kahulugan and comprehension if correct
                if (['input_kahulugan', 'comprehension'].includes(this.current.type) && 
                    this.userInput.toLowerCase().trim() === this.current.answer.toLowerCase().trim()) {
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
            this.userInput = ''
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

            <!-- TYPE: READ SAWIKAIN -->
            <template x-if="current.type === 'read_sawikain'">
                <div class="flex-1 flex flex-col items-center gap-10">

                    <!-- Sawikain -->
                    <h1 class="text-5xl font-bold mt-10 !text-[#F4C300] text-center px-4"
                        x-text="current.sawikain"></h1>

                    <!-- Success -->
                    <div x-show="confirmed"
                        x-transition
                        class="px-4 py-2 bg-green-500 text-white rounded-lg shadow-md text-lg font-semibold">
                        <i class="fa-solid fa-check"></i> Tama!
                    </div>

                    <!-- Instruction -->
                    <p class="w-96 text-lg text-center font-semibold">
                        Basahin nang malinaw ang sawikain sa itaas.
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

            <!-- TYPE: INPUT KAHULUGAN -->
            <template x-if="current.type === 'input_kahulugan'">
                <div class="flex-1 flex flex-col items-center gap-10">

                    <!-- Show the sawikain again -->
                    <h1 class="text-5xl font-bold mt-10 !text-[#F4C300] text-center px-4"
                        x-text="current.sawikain"></h1>

                    <!-- Instruction -->
                    <p class="w-96 text-lg text-center font-semibold">
                        Isulat sa patlang ang <span class="!text-[#F4C300]">kahulugan</span> ng sawikain na ito.
                    </p>

                    <!-- Input Field -->
                    <div class="w-full max-w-xl px-4">
                        <input 
                            type="text"
                            x-model="userInput"
                            :disabled="confirmed"
                            placeholder="Isulat ang kahulugan dito..."
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg text-lg focus:outline-none focus:border-[#F4C300] disabled:bg-gray-100 text-center"
                            @keyup.enter="userInput && !confirmed && confirm()">
                    </div>

                    <!-- Feedback -->
                    <div x-show="confirmed"
                         x-transition
                         class="mt-4 px-6 py-3 rounded-lg text-lg font-semibold"
                         :class="userInput.toLowerCase().trim() === current.answer.toLowerCase().trim() ? 'bg-green-500 text-white' : 'bg-red-500 text-white'">
                        <span x-show="userInput.toLowerCase().trim() === current.answer.toLowerCase().trim()">
                            <i class="fa-solid fa-check"></i> Tama! Ang kahulugan ay "<span x-text="current.answer"></span>"
                        </span>
                        <span x-show="userInput.toLowerCase().trim() !== current.answer.toLowerCase().trim()">
                            <i class="fa-solid fa-x"></i> Mali. Ang tamang kahulugan ay "<b x-text="current.answer"></b>"
                        </span>
                    </div>

                </div>
            </template>

            <!-- TYPE: KASABIHAN PAGE -->
            <template x-if="current.type === 'kasabihan'">
                <div class="flex-1 flex flex-col items-center justify-center gap-10 w-full px-4">
                    
                    <h2 class="text-4xl font-bold !text-[#F4C300]">Basahin ang Kasabihan</h2>

                    <div class="max-w-3xl bg-gray-800 p-10 rounded-xl border-4 border-[#F4C300] shadow-2xl">
                        <p class="text-2xl leading-relaxed text-white text-center" x-text="current.kasabihan"></p>
                    </div>

                    <p class="text-lg text-center max-w-xl opacity-80">
                        Basahin nang mabuti ang kasabihan. Pagkatapos, sasagutin mo ang mga tanong tungkol dito.
                    </p>

                </div>
            </template>

            <!-- TYPE: COMPREHENSION -->
            <template x-if="current.type === 'comprehension'">
                <div class="flex-1 flex flex-col items-center gap-10 mt-10 w-full px-4">

                    <!-- Question -->
                    <div class="max-w-2xl">
                        <h2 class="text-4xl font-bold !text-[#F4C300] mb-6 text-center"
                            x-text="current.tanong"></h2>
                    </div>
                        
                    <!-- Success/Error Feedback -->
                    <div x-show="confirmed"
                        x-transition
                        class="px-6 py-3 rounded-lg text-lg font-semibold"
                        :class="userInput.toLowerCase().trim() === current.answer.toLowerCase().trim() ? 'bg-green-500 text-white' : 'bg-red-500 text-white'">
                        <span x-show="userInput.toLowerCase().trim() === current.answer.toLowerCase().trim()">
                            <i class="fa-solid fa-check"></i> Tama!
                        </span>
                        <span x-show="userInput.toLowerCase().trim() !== current.answer.toLowerCase().trim()">
                            <i class="fa-solid fa-x"></i> Mali. Ang tamang sagot ay: <b x-text="current.answer"></b>
                        </span>
                    </div>

                    <!-- Instruction -->
                    <p class="w-96 text-lg text-center">
                        Sagutin ang tanong sa pamamagitan ng pagsulat ng iyong sagot sa ibaba.
                    </p>

                    <!-- Input Field -->
                    <div class="w-full max-w-xl">
                        <input 
                            type="text"
                            x-model="userInput"
                            :disabled="confirmed"
                            placeholder="Isulat ang iyong sagot dito..."
                            class="w-full px-6 py-4 border-2 border-[#F4C300] rounded-lg text-xl focus:outline-none focus:ring-3 focus:ring-yellow-300 disabled:bg-gray-100"
                            @keyup.enter="!confirmed && userInput.trim() && confirm()">
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
        <p x-show="current.type !== 'kasabihan'">
            <span x-text="page"></span>/<span x-text="questions.length"></span>
        </p>
        <p x-show="current.type === 'kasabihan'" class="text-sm opacity-70">Kasabihan</p>
        
        <div class="flex gap-3">
            <button 
                x-show="(current.type === 'kasabihan' && confirmed) || (['input_kahulugan', 'comprehension'].includes(current.type) && userInput && !confirmed) || confirmed" 
                @click="next" 
                :disabled="['input_kahulugan', 'comprehension'].includes(current.type) && !userInput && !confirmed"
                class="px-4 py-2 bg-[#F4C300] rounded-md font-bold whitespace-nowrap disabled:opacity-50 disabled:cursor-not-allowed">
                <span x-show="confirmed" class="!text-black">Susunod</span>
                <span x-show="['input_kahulugan', 'comprehension'].includes(current.type) && userInput && !confirmed" class="!text-black">Kumpirmahin</span>
                <i class="fa-solid fa-arrow-right !text-black"></i>
            </button>
        </div>
    </div>

</div>