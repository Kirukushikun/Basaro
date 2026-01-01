<!-- Pagtataya 5 -->
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
            this.userInput = ''
        },

        replay() {
            this.page = 1
            this.score = 0
            this.reset()
        }
    }">

    <!-- Pagsasanay 5 - Read Phrase -->
    <template x-if="current && current.type === 'read_phrase'">
        <div class="flex-1 flex flex-col items-center gap-10">

            <!-- Parirala -->
            <h1 class="text-5xl font-bold mt-10 !text-[#F4C300]"
                x-text="current.parirala"></h1>
                
            <!-- Success -->
            <div x-show="confirmed"
                x-transition
                class="px-4 py-2 bg-green-500 text-white rounded-lg shadow-md text-lg font-semibold">
                <i class="fa-solid fa-check"></i> Tama!
            </div>

            <!-- Instruction -->
            <p class="w-96 text-lg text-center">
                Basahin nang malinaw ang pariralang nasa itaas.
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

    <!-- Read Sentence -->
    <template x-if="current && current.type === 'read_sentence'">
        <div class="flex-1 flex flex-col items-center gap-10">

            <!-- Pangungusap -->
            <h1 class="text-5xl font-bold mt-10 !text-[#F4C300] text-center px-4"
                x-text="current.pangungusap"></h1>
                
            <!-- Success -->
            <div x-show="confirmed"
                x-transition
                class="px-4 py-2 bg-green-500 text-white rounded-lg shadow-md text-lg font-semibold">
                <i class="fa-solid fa-check"></i> Tama!
            </div>

            <!-- Instruction -->
            <p class="w-96 font-bold text-lg text-center">
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

    <!-- Comprehension -->
    <template x-if="current && current.type === 'comprehension'">
        <div class="flex-1 flex flex-col items-center gap-10">

            <!-- Question -->
            <div class="mt-10 max-w-2xl px-4">
                <h2 class="text-5xl font-bold !text-[#F4C300] mb-6 text-center"
                    x-text="current.tanong"></h2>
            </div>
                
            <!-- Success/Error -->
            <div x-show="confirmed"
                x-transition>
                <div x-show="userInput.toLowerCase().trim() === current.answer.toLowerCase().trim()"
                    class="px-4 py-2 bg-green-500 text-white rounded-lg shadow-md text-lg font-semibold">
                    <i class="fa-solid fa-check"></i> Tama!
                </div>
                <div x-show="userInput.toLowerCase().trim() !== current.answer.toLowerCase().trim()"
                    class="px-4 py-2 bg-red-500 text-white rounded-lg shadow-md text-lg font-semibold">
                    <i class="fa-solid fa-x"></i> Mali. Ang tamang sagot ay: <span x-text="current.answer"></span>
                </div>
            </div>

            <!-- Instruction -->
            <p class="w-96 text-lg text-center">
                Sagutin ang tanong sa pamamagitan ng pagsulat ng iyong sagot sa ibaba.
            </p>

            <!-- Input Field -->
            <div class="w-96">
                <input 
                    type="text"
                    x-model="userInput"
                    :disabled="confirmed"
                    placeholder="Isulat ang iyong sagot dito..."
                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg text-lg focus:outline-none focus:border-[#F4C300] disabled:border-gray-100"
                    @keyup.enter="!confirmed && confirm()">
            </div>

        </div>
    </template>

    <!-- Results Page -->
    @include('partials.pagtataya-results')

    <!-- Navigation Buttons -->
    @include('partials.pagtataya-navigation')

</div>