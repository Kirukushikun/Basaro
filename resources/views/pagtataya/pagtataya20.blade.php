<script>
    window.pagtatayanQuestions = @json($questions);
</script>

<div class="relative flex flex-col items-center lg:min-w-96 p-6"
     x-data="{
        showPanuto: true,  // ✅ Add this
        answers: {},
        submitted: false,
        score: @entangle('score'),
        questions: window.pagtatayanQuestions,
        wordBank: window.pagtatayanQuestions[0]?.wordBank || [],
        soundEnabled: false,
        currentPanutoAudio: null,

        get isPanuto() {
            return this.current && this.current.type === 'panuto';
        },

        get showSoundOverlay() {
            // Only show if sound not enabled AND it's the first panuto
            return !this.soundEnabled && this.isPanuto;
        },

        enableSound() {
            this.soundEnabled = true;
            // Play the panuto audio if it exists
            if (this.current && this.current.audio) {
                this.currentPanutoAudio = new Audio(this.current.audio);
                this.currentPanutoAudio.play();
            }
        },

        get allAnswered() {
            return this.questions.every(q => this.answers[q.word]);
        },

        get isWordUsed() {
            return (word) => {
                return Object.values(this.answers).includes(word);
            };
        },

        submit() {
            this.submitted = true;
            this.score = 0;
            
            this.questions.forEach(q => {
                if (this.answers[q.word] === q.answer) {
                    this.score++;
                }
            });
        },

        reset() {
            this.answers = {};
            this.submitted = false;
            this.score = 0;
        }
     }">
    <!-- Panuto Overlay -->
    <template x-if="showPanuto">
        <div class="fixed inset-0 bg-black/80 flex items-center justify-center z-50">
            <div class="bg-gray-800 p-8 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                <h2 class="text-center font-bold text-2xl !text-[#F4C300] mb-4">
                    PANUTO
                </h2>
                <p class="text-white mb-4">
                    <strong>Mga Hakbang:</strong>
                </p>
                <p class="!text-gray-300 mb-6">
                    Basahin at unawain ang mga talasalitaan. Hanapin mo ang kasingkahulugan ng mga ito sa kahon sa itaas. Pumili ng tamang sagot mula sa dropdown menu para sa bawat salita.
                </p>
                <button @click="showPanuto = false" 
                        class="w-full px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold">
                    Naiintindihan ko ang panuto
                </button>
            </div>
        </div>
    </template>
    
    <div class="flex-1 flex flex-col items-center gap-10 mt-10 w-full max-w-4xl px-4">

        <!-- Instructions -->
        <div class="text-center">
            <p class="text-lg">
                Basahin at unawain ang mga talasalitaan. Hanapin mo ang kasingkahulugan ng mga ito sa kahon.
            </p>
        </div>

        <!-- Word Bank (Box with available words) -->
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
            <template x-for="(question, index) in questions" :key="question.word">
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
                                :disabled="submitted"
                                class="w-full px-4 py-2 border-2 rounded-lg text-lg focus:outline-none focus:ring-2"
                                :class="{
                                    'border-[#F4C300] bg-gray-700 text-white focus:ring-[#F4C300]': !submitted,
                                    'bg-green-500 text-white border-green-500': submitted && answers[question.word] === question.answer,
                                    'bg-red-500 text-white border-red-500': submitted && answers[question.word] !== question.answer,
                                    'bg-gray-600 text-gray-400 cursor-not-allowed': submitted
                                }">
                            <option value="">Piliin ang sagot...</option>
                            <template x-for="word in wordBank" :key="word">
                                <option :value="word" 
                                        :disabled="isWordUsed(word) && answers[question.word] !== word"
                                        x-text="word"></option>
                            </template>
                        </select>
                    </div>

                    <!-- Feedback Icon -->
                    <div x-show="submitted" class="w-8">
                        <span x-show="answers[question.word] === question.answer" class="text-green-500 text-2xl">✓</span>
                        <span x-show="answers[question.word] !== question.answer" class="text-red-500 text-2xl">✗</span>
                    </div>

                </div>
            </template>
        </div>

        <!-- Submit Button -->
        <button x-show="!submitted && allAnswered"
                @click="submit"
                class="px-8 py-3 bg-[#F4C300] text-black font-bold rounded-lg hover:opacity-90 transition-all text-lg">
            Suriin ang Sagot
        </button>

        <!-- Results -->
        <template x-if="submitted">
            <div class="w-full flex flex-col items-center gap-6">
                
                <!-- Score Display -->
                <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] text-center">
                    <h3 class="text-2xl font-bold !text-[#F4C300] mb-2">Resulta</h3>
                    <p class="text-xl text-white">
                        Nakakuha ka ng <span class="font-bold text-[#F4C300]" x-text="score"></span>
                        sa <span class="font-bold text-[#F4C300]" x-text="questions.length"></span> tanong
                    </p>
                    <p class="text-3xl font-bold !text-[#F4C300] mt-4" 
                       x-text="Math.round((score / questions.length) * 100) + '%'"></p>
                </div>

                <!-- Correct Answers Table -->
                <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] w-full">
                    <p class="text-sm text-gray-400 mb-4 font-semibold">Tamang Sagot:</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <template x-for="(question, index) in questions" :key="question.word">
                            <div class="flex justify-between text-sm border-b border-gray-700 pb-2">
                                <span class="text-white">
                                    <span x-text="index + 1"></span>. <span x-text="question.word"></span>
                                </span>
                                <span class="text-[#F4C300] font-bold" x-text="question.answer"></span>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4">
                    <button @click="reset"
                            class="px-6 py-2 border-2 border-[#F4C300] text-[#F4C300] rounded-lg font-bold hover:bg-[#F4C300] hover:text-black transition">
                        Ulitin
                    </button>
                    <button onclick="window.location.href='/'"
                            class="px-6 py-2 bg-gray-600 text-white rounded-lg font-bold hover:opacity-80">
                        Lumabas
                    </button>
                </div>

            </div>
        </template>

    </div>
</div>