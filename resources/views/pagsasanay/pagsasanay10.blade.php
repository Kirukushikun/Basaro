<!-- Pagsasanay 10: Fill Syllable + Reading -->
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
                // Score for fill_syllable if correct
                if (this.current.type === 'fill_syllable' && this.userInput.toLowerCase().trim() === this.current.answer.toLowerCase()) {
                    this.score++
                }
                // Score for read_word auto-pass
                if (this.current.type === 'read_word') {
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

            <!-- TYPE: FILL SYLLABLE -->
            <template x-if="current.type === 'fill_syllable'">
                <div class="flex-1 flex flex-col items-center gap-8 mt-10">

                    <!-- Image -->
                    <img :src="current.image" 
                         :alt="current.full_word" 
                         class="w-48 h-48 object-contain rounded-lg border-4 border-[#F4C300]">

                    <!-- Incomplete Word with Input -->
                    <div class="text-center">
                        <p class="text-xl mb-4 font-semibold">Punan ang nawawalang pantig:</p>
                        <div class="flex items-center justify-center gap-2">
                            <template x-for="(part, index) in current.word.split('__')" :key="index">
                                <div class="flex items-center">
                                    <span class="text-5xl font-bold !text-[#F4C300]" x-text="part"></span>
                                    <template x-if="index < current.word.split('__').length - 1">
                                        <input 
                                            type="text" 
                                            x-model="userInput"
                                            :disabled="confirmed"
                                            @keyup.enter="!confirmed && userInput.trim() && confirm()"
                                            class="w-24 h-16 text-4xl font-bold text-center border-4 border-[#F4C300] rounded-md mx-1 focus:outline-none focus:ring-4 focus:ring-yellow-300 disabled:border-gray-500"
                                            maxlength="3"
                                        >
                                    </template>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Feedback -->
                    <div x-show="confirmed"
                         x-transition
                         :class="userInput.toLowerCase().trim() === current.answer.toLowerCase() ? 'bg-green-500' : 'bg-red-500'"
                         class="px-6 py-3 text-white rounded-lg shadow-md text-lg font-semibold">
                        <span x-show="userInput.toLowerCase().trim() === current.answer.toLowerCase()">
                            <i class="fa-solid fa-check"></i> Tama!
                        </span>
                        <span x-show="userInput.toLowerCase().trim() !== current.answer.toLowerCase()">
                            <i class="fa-solid fa-x"></i> Mali. Ang tamang sagot ay <b x-text="current.answer"></b>
                        </span>
                    </div>

                    <!-- Confirm Button -->
                    <button x-show="userInput.trim() && !confirmed"
                            @click="confirm" 
                            class="px-8 py-3 bg-[#F4C300] text-black font-bold rounded-lg hover:opacity-90 transition-all">
                        Kumpirmahin
                    </button>

                </div>
            </template>

            <!-- TYPE: READ WORD -->
            <template x-if="current.type === 'read_word'">
                <div class="flex-1 flex flex-col items-center gap-10">

                    <!-- Full Word -->
                    <h1 class="!text-7xl !font-bold !text-[#F4C300] mt-10" x-text="current.full_word"></h1>
                    
                    <!-- Success -->
                    <div x-show="confirmed"
                        x-transition
                        class="px-4 py-2 bg-green-500 text-white rounded-lg shadow-md text-lg font-semibold">
                        <i class="fa-solid fa-check"></i> Tama!
                    </div>

                    <!-- Instruction -->
                    <p class="w-96 text-lg text-center">
                        Basahin nang malinaw ang salitang nasa itaas.
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

        </div>
    </template>

    <!-- Results Page -->
    @include('partials.pagsasanay-results')

    <!-- Navigation Buttons -->
    @include('partials.pagsasanay-navigation')

</div>