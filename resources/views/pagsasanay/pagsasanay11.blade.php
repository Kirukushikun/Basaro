<div class="relative"
     x-data="{
        page: 1,
        confirmed: false,
        showFeedback: false,
        score: 0,
        selected: null,
        partAAnswers: {},
        questions: @js($questions),

        // In the x-data, update the current getter:
        get current() {
            // Get questions starting from page 2
            let antonymQuestions = this.questions.filter(q => q.type === 'antonym_select');
            let antonymIndex = this.page - 2; // page 2 = index 0
            return antonymIndex >= 0 && antonymIndex < antonymQuestions.length 
                ? antonymQuestions[antonymIndex] 
                : null;
        },

        checkPartA() {
            let correct = 0;
            this.questions.filter(q => q.type === 'synonym_match').forEach(q => {
                if (this.partAAnswers[q.word] === q.answer) {
                    correct++;
                }
            });
            return correct;
        },

        submitPartA() {
            this.showFeedback = true;
            let partACorrect = this.checkPartA();
            this.score = partACorrect;
        },

next() {
    if (!this.showFeedback) {
        this.showFeedback = true
        if (this.page > 1 && this.selected === this.current.answer) {
            this.score++
        }
    } else {
        let antonymQuestions = this.questions.filter(q => q.type === 'antonym_select');
        let totalPages = 1 + antonymQuestions.length; // 1 for Part A + antonym count
        
        if (this.page >= totalPages) {
            this.page = totalPages + 1 // Show results
        } else {
            this.page++
        }
        this.reset()
    }
},

        confirm() {
            this.confirmed = true;
        },

        reset() {
            this.selected = null
            this.confirmed = false
            this.showFeedback = false
            // DON'T reset partAAnswers or score here
        },

        replay() {
            this.page = 1;
            this.score = 0;
            this.reset();
        }
     }">

    <!-- PART A: Synonym Matching Table -->
    <template x-if="page === 1">
        <div class="flex-1 flex flex-col items-center gap-8 mt-10 w-full px-4">

            <p class="text-lg text-center font-semibold">Hanapin sa Hanay B ang kasingkahulugan ng mga salita sa Hanay A</p>

            <!-- Styled Table -->
            <div class="max-w-3xl w-full overflow-x-auto">
                <table class="w-full border-collapse border-2 border-[#F4C300]">
                    <thead>
                        <tr class="bg-gray-700">
                            <th class="border border-[#F4C300] px-6 py-3 text-[#F4C300] font-bold text-center w-1/2">Hanay A</th>
                            <th class="border border-[#F4C300] px-6 py-3 text-[#F4C300] font-bold text-center w-1/2">Hanay B</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="(question, index) in questions.filter(q => q.type === 'synonym_match')" :key="question.word">
                            <tr class="border-b border-[#F4C300] hover:bg-gray-800 transition-colors">
                                <!-- Hanay A -->
                                <td class="border border-[#F4C300] px-6 py-4 text-white font-semibold">
                                    <span x-text="index + 1 + '. ' + question.word"></span>
                                </td>
                                
                                <!-- Hanay B -->
                                <td class="border border-[#F4C300] px-6 py-4">
                                    <select x-model="partAAnswers[question.word]"
                                            class="w-full px-3 py-2 border-2 border-[#F4C300] bg-gray-800 text-[#F4C300] font-bold rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F4C300]">
                                        <option value="">Piliin</option>
                                        <template x-for="choice in question.choices" :key="choice.letter">
                                            <option :value="choice.letter"
                                                    :disabled="Object.values(partAAnswers).includes(choice.letter) && partAAnswers[question.word] !== choice.letter"
                                                    x-text="choice.letter + '. ' + choice.meaning"></option>
                                        </template>
                                    </select>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>

            <!-- Submit Button -->
            <button x-show="!showFeedback"
                    @click="submitPartA"
                    class="mt-8 px-8 py-3 bg-[#F4C300] text-black font-bold rounded-lg hover:opacity-90 transition-all">
                Suriin ang Sagot
            </button>

            <!-- Feedback Section -->
            <template x-if="showFeedback">
                <div class="mt-8 flex flex-col items-center gap-6 w-full">
                    
                    <!-- Score Display -->
                    <div class="text-center">
                        <h2 class="text-2xl font-bold !text-[#F4C300] mb-2">Resulta ng Bahagi A</h2>
                        <p class="text-xl text-white">
                            Nakakuha ka ng <span class="font-bold text-[#F4C300]" x-text="score"></span>
                            sa <span class="font-bold text-[#F4C300]">10</span> tanong
                        </p>
                    </div>

                    <!-- Correct Answers Display -->
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl w-full">
                        <p class="text-sm text-gray-400 mb-4 font-semibold">Tamang Sagot:</p>
                        <div class="grid grid-cols-2 gap-4">
                            <template x-for="question in questions.filter(q => q.type === 'synonym_match')" :key="question.word">
                                <div class="flex justify-between text-sm border-b border-gray-700 pb-2">
                                    <span class="text-white" x-text="question.word"></span>
                                    <span class="text-[#F4C300] font-bold" x-text="question.answer"></span>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Next Button (to Part B) -->
                    <button @click="page = 2; reset()"
                            class="px-8 py-3 bg-[#F4C300] text-black font-bold rounded-lg hover:opacity-90 transition-all">
                        Susunod sa Bahagi B
                    </button>

                </div>
            </template>

        </div>
    </template>

    <!-- PART B: Antonym Selection (Question by question) -->
    <template x-if="page > 1 && current && current.type === 'antonym_select'">
        <div class="flex-1 flex flex-col items-center gap-10 mt-10 w-full">

            <p class="text-lg text-center font-semibold">Piliin ang tamang kasalungat na kahulugan</p>
            
            <!-- Word -->
            <p class="text-4xl font-bold !text-[#F4C300]" x-text="current.word"></p>

            <!-- Antonym Choices -->
            <div class="flex flex-col gap-3 items-center max-w-md w-full">
                <template x-for="choice in current.choices" :key="choice">
                    <button
                        @click="selected = choice; confirmed = false; showFeedback = false"
                        :class="{ 'bg-[#F4C300] !text-black': selected === choice }"
                        class="w-full px-6 py-3 border-2 border-[#F4C300] !text-[#F4C300] font-bold rounded-lg hover:bg-[#F4C300] hover:!text-black transition-all text-center">
                        <span x-text="choice"></span>
                    </button>
                </template>
            </div>

            <!-- Confirm Button -->
            <button x-show="selected && !confirmed"
                    @click="confirm"
                    class="px-6 py-2 bg-[#F4C300] text-black font-bold rounded-lg">
                Kumpirmahin
            </button>

            <!-- Feedback -->
            <div x-show="showFeedback"
                class="mt-4 px-6 py-3 rounded-lg text-lg font-semibold"
                :class="selected === current.answer ? 'bg-green-500 text-white' : 'bg-red-500 text-white'">
                <span x-show="selected === current.answer">✅ Tama!</span>
                <span x-show="selected !== current.answer">
                    ❌ Mali. Ang tamang sagot ay <b x-text="current.answer"></b>
                </span>
            </div>

        </div>
    </template>

<!-- Custom Navigation for Pagsasanay 11 -->
<div x-show="page <= (1 + questions.filter(q => q.type === 'antonym_select').length)" 
     class="absolute -bottom-[110px] flex items-center justify-between w-full">
    <p>
        <span x-text="page === 1 ? page : (page - 1)"></span>/
        <span x-text="page === 1 ? questions.length : questions.filter(q => q.type === 'antonym_select').length"></span>
    </p>
    <div class="flex gap-5">
        <button x-show="page > 1" @click="page--; reset()" class="px-4 py-2 border border-gray-500 text-white rounded-md font-bold">
            <i class="fa-solid fa-arrow-left"></i> Balik
        </button>
        <button x-show="confirmed" @click="next" class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold">
            Susunod <i class="fa-solid fa-arrow-right !text-black"></i>
        </button>
    </div>
</div>

<!-- Custom Results for Pagsasanay 11 -->
<div x-show="page > (1 + questions.filter(q => q.type === 'antonym_select').length)" 
     class="flex-1 flex flex-col items-center justify-center gap-5 mt-10 w-full">
    <img src="../Img/Badge.png" width="200" alt="">
    <h1 class="text-2xl font-bold">CONGRATULATIONS!</h1>
    <h2 class="score !text-[#F4C300]" x-text="Math.round((score / (questions.length)) * 100) + '%'"></h2>
    <p class="w-96 text-lg text-center">
        Nakakuha ka ng <span class="font-bold" x-text="score"></span>
        sa <span class="font-bold" x-text="questions.length"></span> na tanong!
    </p>
    <div class="flex gap-4 mt-4">
        <button @click="replay()" class="px-4 py-2 border border-2 border-[#F4C300] text-[#F4C300] rounded-md font-bold hover:bg-[#F4C300] hover:text-black transition">
            Ulitin
        </button>
        <button onclick="window.location.href='/'" class="px-4 py-2 bg-gray-600 rounded-md text-white font-bold hover:opacity-80">
            Lumabas
        </button>
    </div>
</div>

</div>