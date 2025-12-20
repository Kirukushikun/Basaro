<!-- Pagsasanay 6: Syllable Building + Reading Comprehension -->
<div class="relative"
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
                // Score for syllable_build - user must match answer
                if (this.current.type === 'syllable_build' && this.userInput.toLowerCase().trim() === this.current.answer.toLowerCase().trim()) {
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
        <div class="flex-1 flex flex-col items-center gap-10 mt-10 w-full">

            <!-- TYPE: SYLLABLE BUILD -->
            <template x-if="current.type === 'syllable_build'">
                <div class="flex flex-col items-center gap-8 w-full">
                    <p class="text-lg text-center">Ayusin ang mga tunog upang makabuo ng salita.</p>

                    <!-- Syllables Display -->
                    <div class="flex gap-2 items-center flex-wrap justify-center">
                        <template x-for="(s, index) in current.syllables" :key="index">
                            <div class="flex items-center gap-2">
                                <div class="px-6 py-3 bg-[#F4C300] text-black font-bold text-lg rounded-lg">
                                    <span x-text="s"></span>
                                </div>
                                <span x-show="index < current.syllables.length - 1" class="text-4xl font-bold !text-[#F4C300]">+</span>
                            </div>
                        </template>
                    </div>

                    <!-- Formed Word Display -->
                    <p class="text-4xl font-extrabold !text-[#F4C300]" x-text="word"></p>

                    <!-- Text Input for Answer -->
                    <input
                        type="text"
                        x-model="userInput"
                        placeholder="I-type ang salita dito"
                        @keyup.enter="confirm"
                        class="px-4 py-2 border-2 border-[#F4C300] rounded-lg text-center text-lg font-bold focus:outline-none max-w-md">
                </div>
            </template>

            <!-- TYPE: READ PHRASE -->
            <template x-if="current.type === 'read_phrase'">
                <div class="flex flex-col items-center gap-6 w-full">
                    <h1 class="alphabet !text-[#F4C300]" x-text="current.text"></h1>
                    <p class="w-96 text-lg text-center">Basahin nang malinaw ang katagang nasa itaas. Subukang bigkasin ito nang tama at dahan-dahan.</p>

                    <!-- Microphone Button (Hold to Record) -->
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
                             class="absolute inset-0 rounded-full bg-red-500 opacity-30 animate-ping"></div>
                    </div>
                </div>
            </template>

            <!-- TYPE: READ SENTENCE -->
            <template x-if="current.type === 'read_sentence'">
                <div class="flex flex-col items-center gap-6 w-full">
                    <p class="text-2xl font-semibold text-center max-w-2xl" x-text="current.text"></p>
                    <p class="w-96 text-lg text-center">Basahin nang malinaw ang pangungusap.</p>

                    <!-- Microphone Button (Hold to Record) -->
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
                             class="absolute inset-0 rounded-full bg-red-500 opacity-30 animate-ping"></div>
                    </div>
                </div>
            </template>

            <!-- TYPE: COMPREHENSION -->
            <template x-if="current.type === 'comprehension'">
                <div class="flex flex-col items-center gap-6 w-full">
                    <p class="text-lg font-semibold text-center" x-text="current.question"></p>
                    <input
                        type="text"
                        x-model="userInput"
                        placeholder="Sagutin dito..."
                        @keyup.enter="confirm"
                        class="px-4 py-2 border-2 border-[#F4C300] rounded-lg text-center text-lg focus:outline-none max-w-md">
                </div>
            </template>

            <!-- Confirm Button (for syllable_build & comprehension) -->
            <button x-show="(current.type === 'syllable_build' || current.type === 'comprehension') && userInput && !confirmed"
                    @click="confirm"
                    class="px-6 py-2 bg-[#F4C300] text-black font-bold rounded-lg">
                Kumpirmahin
            </button>

            <!-- Feedback - All Types -->
            <div x-show="confirmed"
                 x-transition
                 class="mt-4 px-4 py-2 rounded-lg text-lg font-semibold"
                 :class="((['read_phrase', 'read_sentence'].includes(current.type)) || 
                          (current.type === 'syllable_build' && userInput.toLowerCase().trim() === current.answer.toLowerCase().trim()) ||
                          (current.type === 'comprehension' && userInput.toLowerCase().trim() === current.answer.toLowerCase().trim())) ? 'bg-green-500 text-white' : 'bg-red-500 text-white'">
                
                <!-- Reading Types (Auto-pass) -->
                <template x-if="['read_phrase', 'read_sentence'].includes(current.type)">
                    <span>✅ Tama!</span>
                </template>

                <!-- Syllable Build Feedback -->
                <template x-if="current.type === 'syllable_build'">
                    <span x-show="userInput.toLowerCase().trim() === current.answer.toLowerCase().trim()">✅ Tama!</span>
                    <span x-show="userInput.toLowerCase().trim() !== current.answer.toLowerCase().trim()">❌ Mali. Ang tamang sagot ay <b x-text="current.answer"></b></span>
                </template>

                <!-- Comprehension Feedback -->
                <template x-if="current.type === 'comprehension'">
                    <span x-show="userInput.toLowerCase().trim() === current.answer.toLowerCase().trim()">✅ Tama!</span>
                    <span x-show="userInput.toLowerCase().trim() !== current.answer.toLowerCase().trim()">❌ Mali. Ang tamang sagot ay <b x-text="current.answer"></b></span>
                </template>
            </div>

        </div>
    </template>

    <!-- Results Page -->
    @include('partials.pagsasanay-results')

    <!-- Navigation Buttons -->
    @include('partials.pagsasanay-navigation')

</div>