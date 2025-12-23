<!-- Pagsasanay 6: Syllable Building + Reading Comprehension -->
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

        get word() {
            return this.current && this.current.syllables ? this.current.syllables.join('') : ''
        },

        next() {
            if (!this.confirmed) {
                this.confirmed = true
                // Score for syllable_build - auto-pass (microphone interaction)
                if (this.current.type === 'syllable_build') {
                    this.score++
                }
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

    <template x-if="current">
        <div class="flex-1 flex flex-col items-center gap-10 w-full">

            <!-- TYPE: SYLLABLE BUILD -->
            <template x-if="current.type === 'syllable_build'">
                <div class="flex-1 flex flex-col items-center gap-8 mt-10">

                    <!-- Syllables with + sign -->
                    <div class="flex gap-2 items-center">
                        <template x-for="(s, index) in current.syllables" :key="index">
                            <div class="flex items-center gap-2">
                                <div class="items-center justify-center alphabet !text-8xl">
                                    <span x-text="s"></span>
                                </div>
                                <span x-show="index < current.syllables.length - 1" class="text-4xl font-bold !text-[#F4C300]">+</span>
                            </div>
                        </template>
                    </div>

                    <!-- Formed Word -->
                    <p x-show="confirmed" x-transition class="text-3xl font-extrabold !text-[#F4C300]" x-text="word"></p>

                    <!-- Success Message -->
                    <div x-show="confirmed"
                        x-transition
                        class="bg-green-500 text-white px-6 py-2 rounded-lg font-bold text-lg shadow-md">
                        <i class="fa-solid fa-check"></i> Tama!
                    </div>

                    <!-- Instruction -->
                    <p class="w-96 text-center text-lg">
                        Pagdugtungin ang mga pantig upang makabuo ng salita. Pagkatapos ay subukan mo itong basahin.
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

            <!-- TYPE: READ PHRASE -->
            <template x-if="current.type === 'read_phrase'">
                <div class="flex-1 flex flex-col items-center gap-10">

                    <!-- Parirala -->
                    <h1 class="text-7xl font-bold mt-10 !text-[#F4C300]"
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

            <!-- TYPE: READ SENTENCE -->
            <template x-if="current.type === 'read_sentence'">
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

            <!-- TYPE: COMPREHENSION -->
            <template x-if="current.type === 'comprehension'">
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

                    <!-- Confirm Button -->
                    <button x-show="userInput && !confirmed"
                            @click="confirm"
                            class="px-6 py-2 bg-[#F4C300] text-black font-bold rounded-lg hover:bg-yellow-500 transition">
                        Kumpirmahin
                    </button>

                </div>
            </template>

        </div>
    </template>

    <!-- Results Page -->
    @include('partials.pagsasanay-results')

    <!-- Navigation Buttons -->
    @include('partials.pagsasanay-navigation')

</div>