<!-- Main Content -->
    <main class="flex-1 pb-[50px]" x-data="{ 
        page: 1,
        correctAnswers: ['S', 'A', 'M', 'O', 'I'],
        selectedLetter: null,
        showFeedback: false,
        confirmed: false,
        isCorrect: false,
        score: 0,
        totalQuestions: 5,
        getCurrentCorrectAnswer() {
            return this.correctAnswers[this.page - 1];
        }
    }">
        <div class="h-full flex items-center justify-center">
            <div class="card flex flex-col items-center gap-5 relative text-lg">
                
                <!-- Title Section -->
                <div class="absolute -top-6 left-1/2 -translate-x-1/2">
                    <div class="relative inline-block">
                        <h1 class="relative z-10 bg-[#F4C300] px-20 py-1 !text-black text-xl font-bold rounded-md border-2 border-[#31343A]">
                            PAGSASANAY
                        </h1>
                        
                        <!-- Decorative Ribbons -->
                        <img class="absolute z-0 -left-7 top-0" width="55" src="../Img/ribbon.png" alt="">
                        <img class="absolute z-0 -right-7 top-0 rotate-180" width="55" src="../Img/ribbon.png" alt="">
                    </div>
                </div>

                <!-- Questions 1-5 -->
                <template x-for="questionNum in 5" :key="questionNum">
                    <div x-show="page === questionNum" 
                        class="flex-1 flex flex-col items-center gap-10 mt-10 w-full">

                        <i class="fa-solid fa-ear-listen !text-[#F4C300] alphabet"></i>

                        <div class="grid grid-cols-5 gap-4">
                            <template x-for="letter in ['M', 'S', 'A', 'I', 'O']" :key="letter">
                                <button 
                                    @click="selectedLetter = letter; showFeedback = false; confirmed = false;" 
                                    :class="{ 'bg-[#F4C300] !text-black': selectedLetter === letter }"
                                    class="choice font-extrabold px-4 py-2 text-xl !text-[#F4C300] border border-2 !border-[#F4C300] rounded-lg hover:bg-[#F4C300] hover:!text-black transition-all"
                                    x-text="letter">
                                </button>
                            </template>
                        </div>

                        <p class="w-96 text-lg text-center" x-text="
                            questionNum === 1 ? 'Sa anong letra maririnig ang sumusunod na tunog?' :
                            questionNum === 2 ? 'Anong letra ang iyong narinig?' :
                            questionNum === 3 ? 'Pakinggan mabuti. Aling letra ang tumutunog?' :
                            questionNum === 4 ? 'Makinig at pumili ng tamang letra.' :
                            'Huling tanong: Anong letra ang iyong narinig?'
                        "></p>

                        <!-- Confirm Button (shows after selection, before clicking next) -->
                        <button 
                            x-show="selectedLetter && !confirmed"
                            @click="confirmed = true"
                            class="px-6 py-2 bg-[#F4C300] text-black font-bold rounded-lg hover:opacity-80 transition-all">
                            Kumpirmahin
                        </button>

                        <!-- Feedback message (shows after clicking Susunod) -->
                        <div x-show="showFeedback"
                            x-transition
                            class="mt-4 px-4 py-2 rounded-lg shadow-md text-lg font-semibold"
                            :class="isCorrect ? 'bg-green-500 text-white' : 'bg-red-500 text-white'">
                            <span x-show="isCorrect">✅ Tama!</span>
                            <span x-show="!isCorrect" x-text="'❌ Mali. Ang tamang sagot ay ' + getCurrentCorrectAnswer()"></span>
                        </div>
                    </div>
                </template>

                <!-- PAGE 6: Results -->
                <div x-show="page === 6" class="flex-1 flex flex-col items-center gap-5">
                    <img src="../Img/Badge.png" width="200" alt="">
                    <h1 class="text-2xl font-bold">CONGRATULATIONS!</h1>

                    <h2 class="score !text-[#F4C300]" x-text="Math.round((score / totalQuestions) * 100) + '%'"></h2>

                    <p class="w-96 text-lg text-center">
                        Mahusay! Natapos mo ang araling ito nang may buong sigasig at pagsisikap. 
                        Nakakuha ka ng <span class="font-bold" x-text="score"></span> sa <span class="font-bold" x-text="totalQuestions"></span> na tanong!
                    </p>
                    
                    <button
                        class="px-4 py-2 bg-[#F4C300] rounded-md text-black font-bold hover:opacity-80 transition-all" 
                        onclick="window.location.href='/lesson-view?lesson={{$lesson}}&slide=fourth-slide'">
                        Magpatuloy
                    </button>
                </div>
                
                <!-- Action Buttons -->
                <div x-show="page < 6" class="absolute -bottom-[70px] flex items-center justify-between w-full">
                    <p><span x-text="page"></span>/<span x-text="totalQuestions"></span></p>

                    <div class="flex gap-5">
                        <!-- Previous -->
                        <button 
                            @click="page--; selectedLetter = null; showFeedback = false; confirmed = false;" 
                            x-show="page > 1"
                            class="px-4 py-2 border border-2 border-gray-500 text-white rounded-md font-bold hover:bg-gray-700 transition-all">
                            <i class="fa-solid fa-arrow-left"></i> Balik
                        </button>

                        <!-- Next (only shows after confirmation) -->
                        <button 
                            @click="
                                if (!showFeedback) {
                                    isCorrect = (selectedLetter === getCurrentCorrectAnswer());
                                    if (isCorrect) score++;
                                    showFeedback = true;
                                } else {
                                    page++;
                                    selectedLetter = null;
                                    showFeedback = false;
                                    confirmed = false;
                                    isCorrect = false;
                                }
                            " 
                            x-show="confirmed"
                            class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold hover:opacity-80 transition-all">
                            <span x-text="showFeedback ? 'Susunod' : 'Susunod'"></span> <i class="fa-solid fa-arrow-right !text-black"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>