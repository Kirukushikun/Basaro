<!-- Pagtataya 11: Read Word Pairs + Identify Relationship -->
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
                // Score for read_pair auto-pass
                if (this.current.type === 'read_pair') {
                    this.score++
                }
                // Score for identify_relationship if correct
                if (this.current.type === 'identify_relationship' && this.selected === this.current.answer) {
                    this.score++
                }
            } else {
                this.page++
                this.reset()
            }
        },

        confirm() {
            this.confirmed = true
            // Score immediately on confirm for identify_relationship
            if (this.current.type === 'identify_relationship' && this.selected === this.current.answer) {
                this.score++
            }
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

            <!-- TYPE: READ PAIR -->
            <template x-if="current.type === 'read_pair'">
                <div class="flex-1 flex flex-col items-center gap-10">

                    <!-- Word Pair Display -->
                    <div class="flex items-center gap-6 mt-10">
                        <h1 class="text-6xl font-bold !text-[#F4C300]" x-text="current.word1"></h1>
                        <span class="text-5xl !text-gray-400">-</span>
                        <h1 class="text-6xl font-bold !text-[#F4C300]" x-text="current.word2"></h1>
                    </div>
                        
                    <!-- Success -->
                    <div x-show="confirmed"
                        x-transition
                        class="px-4 py-2 bg-green-500 text-white rounded-lg shadow-md text-lg font-semibold">
                        <i class="fa-solid fa-check"></i> Tama!
                    </div>

                    <!-- Instruction -->
                    <p class="w-96 text-lg text-center">
                        Basahin nang malinaw ang dalawang salita.
                        Subukang bigkasin ang mga ito nang tama at dahan-dahan.
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

            <!-- TYPE: IDENTIFY RELATIONSHIP -->
            <template x-if="current.type === 'identify_relationship'">
                <div class="flex-1 flex flex-col items-center gap-8 mt-10">

                    <!-- Word Pair (smaller, as reference) -->
                    <div class="flex items-center gap-4 bg-gray-800 px-8 py-4 rounded-xl border-2 border-[#F4C300]">
                        <span class="text-3xl font-bold text-white" x-text="current.word1"></span>
                        <span class="text-2xl !text-gray-400">-</span>
                        <span class="text-3xl font-bold text-white" x-text="current.word2"></span>
                    </div>

                    <!-- Question -->
                    <div class="max-w-2xl px-4">
                        <h3 class="text-2xl font-bold !text-[#F4C300] text-center mb-2">
                            Ang dalawang salitang ito ay:
                        </h3>
                    </div>

                    <!-- Answer Choices -->
                    <div class="flex flex-col gap-4 items-center max-w-xl w-full px-4">
                        <button
                            @click="!confirmed && (selected = 'Magkasingkahulugan')"
                            :disabled="confirmed"
                            :class="{
                                'bg-[#F4C300] !text-black border-[#F4C300]': selected === 'Magkasingkahulugan' && !confirmed,
                                'bg-green-500 !text-white border-green-500': confirmed && 'Magkasingkahulugan' === current.answer,
                                'bg-red-500 !text-white border-red-500': confirmed && selected === 'Magkasingkahulugan' && 'Magkasingkahulugan' !== current.answer,
                                'opacity-50 cursor-not-allowed': confirmed && 'Magkasingkahulugan' !== current.answer && selected !== 'Magkasingkahulugan'
                            }"
                            class="w-full px-6 py-4 border-2 border-[#F4C300] !text-[#F4C300] font-bold rounded-lg hover:bg-[#F4C300] hover:!text-black transition-all text-center disabled:hover:bg-transparent disabled:hover:!text-[#F4C300] text-lg">
                            Magkasingkahulugan
                        </button>

                        <button
                            @click="!confirmed && (selected = 'Magkasalungat')"
                            :disabled="confirmed"
                            :class="{
                                'bg-[#F4C300] !text-black border-[#F4C300]': selected === 'Magkasalungat' && !confirmed,
                                'bg-green-500 !text-white border-green-500': confirmed && 'Magkasalungat' === current.answer,
                                'bg-red-500 !text-white border-red-500': confirmed && selected === 'Magkasalungat' && 'Magkasalungat' !== current.answer,
                                'opacity-50 cursor-not-allowed': confirmed && 'Magkasalungat' !== current.answer && selected !== 'Magkasalungat'
                            }"
                            class="w-full px-6 py-4 border-2 border-[#F4C300] !text-[#F4C300] font-bold rounded-lg hover:bg-[#F4C300] hover:!text-black transition-all text-center disabled:hover:bg-transparent disabled:hover:!text-[#F4C300] text-lg">
                            Magkasalungat
                        </button>
                    </div>

                    <!-- Confirm Button -->
                    <button x-show="selected && !confirmed"
                            @click="confirm"
                            class="px-8 py-3 bg-[#F4C300] text-black font-bold rounded-lg hover:opacity-90 transition-all">
                        Kumpirmahin
                    </button>

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

            <!-- TYPE: MULTIPLE CHOICE -->
            <template x-if="current.type === 'identify_relationship'">
                <div class="flex-1 flex flex-col items-center gap-8 mt-10">

                    <!-- Word Pair (smaller, as reference) -->
                    <div class="flex items-center gap-4 bg-gray-800 px-8 py-4 rounded-xl border-2 border-[#F4C300]">
                        <span class="text-3xl font-bold text-white" x-text="current.word1"></span>
                        <span class="text-2xl !text-gray-400">-</span>
                        <span class="text-3xl font-bold text-white" x-text="current.word2"></span>
                    </div>

                    <!-- Question -->
                    <div class="max-w-2xl px-4">
                        <h3 class="text-2xl font-bold !text-[#F4C300] text-center mb-2">
                            Ang dalawang salitang ito ay:
                        </h3>
                    </div>

                    <!-- Answer Choices -->
                    <div class="flex flex-col gap-4 items-center max-w-xl w-full px-4">
                        <button
                            @click="!confirmed && (selected = 'Magkasingkahulugan')"
                            :disabled="confirmed"
                            :class="{
                                'bg-[#F4C300] !text-black border-[#F4C300]': selected === 'Magkasingkahulugan' && !confirmed,
                                'bg-green-500 !text-white border-green-500': confirmed && 'Magkasingkahulugan' === current.answer,
                                'bg-red-500 !text-white border-red-500': confirmed && selected === 'Magkasingkahulugan' && 'Magkasingkahulugan' !== current.answer,
                                'opacity-50 cursor-not-allowed': confirmed && 'Magkasingkahulugan' !== current.answer && selected !== 'Magkasingkahulugan'
                            }"
                            class="w-full px-6 py-4 border-2 border-[#F4C300] !text-[#F4C300] font-bold rounded-lg hover:bg-[#F4C300] hover:!text-black transition-all text-center disabled:hover:bg-transparent disabled:hover:!text-[#F4C300] text-lg">
                            Magkasingkahulugan
                        </button>

                        <button
                            @click="!confirmed && (selected = 'Magkasalungat')"
                            :disabled="confirmed"
                            :class="{
                                'bg-[#F4C300] !text-black border-[#F4C300]': selected === 'Magkasalungat' && !confirmed,
                                'bg-green-500 !text-white border-green-500': confirmed && 'Magkasalungat' === current.answer,
                                'bg-red-500 !text-white border-red-500': confirmed && selected === 'Magkasalungat' && 'Magkasalungat' !== current.answer,
                                'opacity-50 cursor-not-allowed': confirmed && 'Magkasalungat' !== current.answer && selected !== 'Magkasalungat'
                            }"
                            class="w-full px-6 py-4 border-2 border-[#F4C300] !text-[#F4C300] font-bold rounded-lg hover:bg-[#F4C300] hover:!text-black transition-all text-center disabled:hover:bg-transparent disabled:hover:!text-[#F4C300] text-lg">
                            Magkasalungat
                        </button>
                    </div>

                    <!-- Confirm Button -->
                    <button x-show="selected && !confirmed"
                            @click="confirm"
                            class="px-8 py-3 bg-[#F4C300] text-black font-bold rounded-lg hover:opacity-90 transition-all">
                        Kumpirmahin
                    </button>

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
    @include('partials.pagsasanay-navigation')

</div>