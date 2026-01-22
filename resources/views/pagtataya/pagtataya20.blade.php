<script>
    window.pagtatayanQuestions = @json($questions);
</script>

<div class="relative flex flex-col items-center lg:min-w-96 p-6"
     x-data="{
        page: 1,
        answers: {},
        submitted: false,
        showResults: false,
        score: @entangle('score'),
        questions: window.pagtatayanQuestions,
        wordBank: window.pagtatayanQuestions.find(q => q.wordBank)?.wordBank || [],
        soundEnabled: false,
        currentPanutoAudio: null,
        showModal: false,

        get current() {
            return this.page <= this.questions.length
                ? this.questions[this.page - 1]
                : null
        },

        get isPanuto() {
            return this.current && this.current.type === 'panuto';
        },

        get showSoundOverlay() {
            return !this.soundEnabled && this.isPanuto;
        },

        enableSound() {
            this.soundEnabled = true;
            if (this.current && this.current.audio) {
                this.currentPanutoAudio = new Audio(this.current.audio);
                this.currentPanutoAudio.play();
            }
        },

        get actualQuestions() {
            return this.questions.filter(q => q.type !== 'panuto');
        },

        get allAnswered() {
            return this.actualQuestions.every(q => this.answers[q.word]);
        },

        get isWordUsed() {
            return (word) => {
                return Object.values(this.answers).includes(word);
            };
        },

        next() {
            if (this.isPanuto) {
                this.page++;
                
                if (this.currentPanutoAudio) {
                    this.currentPanutoAudio.pause();
                    this.currentPanutoAudio.currentTime = 0;
                    this.currentPanutoAudio = null;
                }

                this.$nextTick(() => {
                    if (this.soundEnabled && this.isPanuto && this.current && this.current.audio) {
                        this.currentPanutoAudio = new Audio(this.current.audio);
                        this.currentPanutoAudio.play();
                    }
                });
            }
        },

        submit() {
            this.submitted = true;
            this.score = 0;
            
            this.actualQuestions.forEach(q => {
                if (this.answers[q.word] === q.answer) {
                    this.score++;
                }
            });
        },

        proceedToResults() {
            this.showResults = true;
            $wire.completePagtataya();
        },

        reset() {
            this.page = 1;
            this.answers = {};
            this.submitted = false;
            this.showResults = false;
            this.score = 0;
            this.showModal = false;
        }
     }">

    <!-- MAIN CONTENT (Panuto & Quiz) -->
    <template x-if="current && !showResults">
        <div class="flex-1 flex flex-col items-center gap-10 w-full max-w-4xl px-4">

            <!-- SOUND OVERLAY -->
            <template x-if="showSoundOverlay">
                <div class="absolute inset-0 bg-black/60 flex items-center justify-center z-50 rounded-lg">
                    <button 
                        @click="enableSound()" 
                        class="px-6 py-3 bg-[#F4C300] !text-black font-bold rounded-lg text-lg shadow-lg hover:bg-yellow-500 transition-all">
                        <i class="fa-solid fa-volume-high !text-black"></i> I-enable ang Tunog
                    </button>
                </div>
            </template>

            <!-- PANUTO TYPE -->
            <template x-if="isPanuto">
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-5 w-full px-4">
                    <div class="bg-gray-800 p-8 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <h2 class="text-center font-bold text-2xl !text-[#F4C300] mb-4">
                            PANUTO
                        </h2>
                        <p class="text-white mb-4">
                            <strong x-text="current.header || 'Mga Hakbang:'"></strong>
                        </p>
                        <p class="!text-gray-300 mb-6" x-text="current.body || 'Basahin at unawain ang mga talasalitaan. Hanapin mo ang kasingkahulugan ng mga ito sa kahon sa itaas. Pumili ng tamang sagot mula sa dropdown menu para sa bawat salita.'">
                        </p>
                    </div>

                    <button @click="next" 
                            class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold whitespace-nowrap mb-5">
                        Naiintindihan ko ang panuto
                    </button>
                </div>
            </template>

            <!-- QUIZ CONTENT (only show when not panuto and not submitted) -->
            <template x-if="!isPanuto && !submitted">
                <div class="w-full space-y-10">
                    
                    <!-- Word Bank -->
                    <div class="w-full bg-gray-800 border-4 border-[#F4C300] rounded-lg p-6">
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3">
                            <template x-for="word in wordBank" :key="word">
                                <div class="px-4 py-2 bg-gray-700 rounded-lg text-center font-semibold text-white border-2 border-gray-600"
                                     :class="{ 'opacity-40': isWordUsed(word) }">
                                    <span x-text="word"></span>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Question List -->
                    <div class="w-full space-y-4">
                        <template x-for="(question, index) in actualQuestions" :key="question.word">
                            <div class="flex items-center gap-4 bg-gray-800 p-4 rounded-lg border-2 border-gray-700">
                                
                                <!-- Number and Word -->
                                <div class="flex-1">
                                    <span class="text-lg font-semibold text-white">
                                        <span x-text="index + 1"></span>. 
                                        <span x-text="question.word"></span>
                                    </span>
                                </div>

                                <!-- Dropdown Select -->
                                <div class="flex-1">
                                    <select x-model="answers[question.word]"
                                            class="w-full px-4 py-2 border-2 border-[#F4C300] bg-gray-700 text-white rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-[#F4C300]">
                                        <option value="">Piliin ang sagot...</option>
                                        <template x-for="word in wordBank" :key="word">
                                            <option :value="word" 
                                                    :disabled="isWordUsed(word) && answers[question.word] !== word"
                                                    x-text="word"></option>
                                        </template>
                                    </select>
                                </div>

                            </div>
                        </template>
                    </div>

                    <!-- Submit Button -->
                    <button x-show="allAnswered"
                            @click="submit"
                            class="px-8 py-3 bg-[#F4C300] text-black font-bold rounded-lg hover:opacity-90 transition-all text-lg">
                        Suriin ang Sagot
                    </button>

                </div>
            </template>

            <!-- REVIEW ANSWERS (after submit, before results) -->
            <template x-if="!isPanuto && submitted">
                <div class="w-full space-y-10">
                    
                    <!-- Score Display -->
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] text-center">
                        <h3 class="text-2xl font-bold !text-[#F4C300] mb-2">Resulta</h3>
                        <p class="text-xl text-white">
                            Nakakuha ka ng <span class="font-bold text-[#F4C300]" x-text="score"></span>
                            sa <span class="font-bold text-[#F4C300]" x-text="10"></span> tanong
                        </p>
                        <p class="text-3xl font-bold !text-[#F4C300] mt-4" 
                           x-text="Math.round((score / 10) * 100) + '%'"></p>
                    </div>

                    <!-- Correct Answers Table -->
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] w-full">
                        <p class="text-sm text-gray-400 mb-4 font-semibold">Tamang Sagot:</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <template x-for="(question, index) in actualQuestions" :key="question.word">
                                <div class="flex justify-between items-center text-sm border-b border-gray-700 pb-2">
                                    <span class="text-white">
                                        <span x-text="index + 1"></span>. <span x-text="question.word"></span>
                                    </span>
                                    <div class="flex items-center gap-2">
                                        <span class="text-[#F4C300] font-bold" x-text="question.answer"></span>
                                        <span x-show="answers[question.word] === question.answer" class="text-green-500">✓</span>
                                        <span x-show="answers[question.word] !== question.answer" class="text-red-500">✗</span>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4 justify-center">
                        <button @click="reset"
                                class="px-6 py-2 border-2 border-[#F4C300] text-[#F4C300] rounded-lg font-bold hover:bg-[#F4C300] hover:text-black transition">
                            Ulitin
                        </button>
                        <button @click="proceedToResults"
                                class="px-6 py-2 bg-[#F4C300] text-black rounded-lg font-bold hover:opacity-90 transition">
                            Magpatuloy
                        </button>
                    </div>

                </div>
            </template>

        </div>
    </template>

    <!-- FINAL RESULTS PAGE -->
    <template x-if="showResults">
        <div class="flex-1 flex flex-col items-center gap-5">
            <img src="{{asset('img/Badge.png')}}" width="200" alt="">
            <h1 class="text-2xl font-bold">CONGRATULATIONS!</h1>
            <h2 class="score !text-[#F4C300]" x-text="Math.round((score / 10) * 100) + '%'"></h2>
            <p class="w-96 text-lg text-center">
                Nakakuha ka ng <span class="font-bold" x-text="score"></span>
                sa <span class="font-bold" x-text="10"></span> na tanong!
            </p>
            <p class="w-96 text-lg text-center">Mahusay! Natapos mo ang araling ito nang may buong sigasig at pagsisikap. Ipagpatuloy lamang ang iyong pagkatuto!</p>
            
            <div class="flex gap-4 mt-4">
                <button
                    @click="reset"
                    class="px-4 py-2 border-2 border-[#F4C300] text-[#F4C300] rounded-md font-bold hover:bg-[#F4C300] hover:text-black transition">
                    Ulitin
                </button>

                <button
                    onclick="window.location.href='/'"
                    class="px-4 py-2 bg-gray-600 text-white rounded-md font-bold hover:bg-gray-700 transition">
                    Lumabas
                </button>

                <button
                    @click="showModal = true"
                    class="px-4 py-2 bg-[#F4C300] !text-black rounded-md font-bold hover:opacity-90 transition">
                    Magpatuloy sa Pagtataya
                </button>
            </div>

            <!-- Modal Backdrop -->
            <div x-show="showModal" x-transition.opacity class="fixed inset-0 bg-black/30 z-40" @click="showModal = false"></div>

            <!-- Modal Container -->
            <div
                x-show="showModal"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90"
                class="fixed inset-0 flex items-center justify-center z-50"
                @click.self="showModal = false">
                <div class="relative bg-[#31343A] p-8 rounded-lg shadow-lg w-[26rem] max-h-[90vh] overflow-y-auto">
                    <button class="absolute right-7 top-7 text-gray-400 hover:text-gray-800" @click="showModal = false">
                        <i class="fa-solid fa-xmark"></i>
                    </button>

                    <div class="flex flex-col gap-5">
                        <h2 class="text-xl font-semibold -mb-2">Pagtataya</h2>
                        <p>Handa ka na bang magsimula sa Pagtataya?</p>

                        <div class="flex justify-end gap-3">
                            <button 
                                @click="showModal = false"
                                class="px-4 py-2 border rounded-lg hover:bg-gray-100">
                                Kanselahin
                            </button>

                            <button 
                                onclick="window.location.href='/lesson-view?lesson={{ $lesson }}&slide=fourth-slide'"
                                @click="showModal = false"
                                class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold">
                                Simulan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>

</div>