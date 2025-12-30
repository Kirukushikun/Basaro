<main 
    class="flex-1 pb-[50px]" 
    x-data="{ 
        page: @entangle('page'),
        currentAudio: null,
        currentAudioIndex: 0,
        audioQueue: [],
        soundEnabled: false,
        audios: @js($audio),
        
        prepareAudioQueue(page) {
            const audioData = this.audios[page];
            if (Array.isArray(audioData)) {
                this.audioQueue = audioData;
            } else if (audioData) {
                this.audioQueue = [audioData];
            } else {
                this.audioQueue = [];
            }
            this.currentAudioIndex = 0;
        },
        
        playNextAudio() {
            if (!this.soundEnabled || this.audioQueue.length === 0) return;
            
            if (this.currentAudio) {
                this.currentAudio.pause();
                this.currentAudio = null;
            }
            
            if (this.currentAudioIndex < this.audioQueue.length) {
                const audioFile = this.audioQueue[this.currentAudioIndex];
                this.currentAudio = new Audio('{{ asset('') }}' + audioFile);
                
                this.currentAudio.addEventListener('ended', () => {
                    this.currentAudioIndex++;
                    this.playNextAudio();
                });
                
                this.currentAudio.play().catch(err => {
                    console.error('Audio play error:', err);
                });
            }
        },
        
        handlePageChange() {
            if (!this.soundEnabled) return;
            
            if (this.currentAudio) {
                this.currentAudio.pause();
                this.currentAudio = null;
            }
            
            this.prepareAudioQueue(this.page);
            this.playNextAudio();
        }
    }"
    x-init="$watch('page', () => handlePageChange())"
>

    <!-- Enable Sound Overlay -->
    <template x-if="!soundEnabled">
        <div class="absolute inset-0 bg-black/90 flex items-center justify-center z-50">
            <button 
                @click="soundEnabled = true; handlePageChange();" 
                class="px-6 py-3 bg-[#F4C300] !text-black font-bold rounded-lg text-lg shadow-lg"
            >
                <i class="fa-solid fa-volume-high !text-black"></i> I-enable ang Tunog
            </button>
        </div>
    </template>

    <div class="h-full flex items-center justify-center">
        <div class="card flex flex-col items-center gap-5 relative text-lg">
            <!-- Title Section -->
            <div class="absolute -top-6 left-1/2 -translate-x-1/2">
                <div class="relative inline-block">
                    <h1 class="relative z-10 bg-[#F4C300] px-20 py-1 !text-black text-xl font-bold rounded-md border-2 border-[#31343A]">
                        PANUTO
                    </h1>
                    <img class="absolute z-0 -left-7 top-0" width="55" src="../Img/ribbon.png" alt="">
                    <img class="absolute z-0 -right-7 top-0 rotate-180" width="55" src="../Img/ribbon.png" alt="">
                </div>
            </div>

            <!-- LESSON 1 -->
            <template x-if="$lesson == 1">
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Tayo ng mag-Basaro! Magbasa at maglaro. Sa bawat tamang sagot ay makakakuha ka ng ribbon.</p>
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4"><strong>A. Ano ang tunog ng sumusunod na letra?</strong></p>
                        <p class="text-white mb-4">Pindutin mo ang microphone button para sa pagbigkas mo ng tunog ng letra.</p>
                        <p class="text-white mb-4"><strong>B. Sa anong letra maririnig ang sumusunod na tunog?</strong></p>
                    </div>
                </div>
            </template>

            <!-- LESSON 2 -->
            <template x-if="$lesson == 2">
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Tayo ng mag BASARO!</p>
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4"><strong>A. Tukuyin mo ang sumusunod na larawan.</strong></p>
                        <p class="text-white mb-4">Pindutin mo ang microphone button sa iyong pagbigkas.</p>
                        <p class="text-white mb-4"><strong>B. Pakinggan mo ang aking babasahin</strong> lalo na ang unang tunog na iyong maririnig.</p>
                        <p class="text-white">Isulat mo sa patlang ang unang letra upang mabuo ang salita na may larawan. Pagkatapos ay pindutin ang microphone button para bigkasin o basahin ang mga nabuo mong salita.</p>
                    </div>
                </div>
            </template>

            <!-- LESSON 3 -->
            <template x-if="$lesson == 3">
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Tayo ng mag-Basaro! Magbasa at maglaro. Sa bawat tamang sagot ay makakakuha ka ng ribbon.</p>
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4">Sa harapan ng iyong guro ay babaybayin mo ang sumusunod na kataga.</p>
                        <p class="text-white mb-4">Pagkatapos ay basahin mo ang sumusunod na pantulong na kataga.</p>
                        <p class="text-white">Pindutin mo ang microphone button. Gagabayan ka ng iyong guro sa iyong pagbasa.</p>
                    </div>
                </div>
            </template>

            <!-- LESSON 4 -->
            <template x-if="$lesson == 4">
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Tayo ng mag-Basaro! Magbasa at maglaro. Sa bawat tamang sagot ay makakakuha ka ng 1 ribbon.</p>
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white">Pagdugtungin ang mga pantig upang makabuo ng salita. Pagkatapos ay subukan mo itong basahin.</p>
                    </div>
                </div>
            </template>

            <!-- LESSON 5 -->
            <template x-if="$lesson == 5">
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Tayo ng mag-Basaro! Magbasa at maglaro. Sa bawat tamang sagot ay makakakuha ka ng ribbon.</p>
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4">Subukan mong basahin ang sumusunod na parirala.</p>
                        <p class="text-white mb-4">Ngayon naman ay subukan mong basahin ang mga pangungusap.</p>
                        <p class="text-white mb-4">Naunawaan mo ba ang iyong mga binasa?</p>
                        <p class="text-white">Subukan nga nating sagutin ang mga tanong na ito: Isulat mo ang iyong sagot sa patlang.</p>
                    </div>
                </div>
            </template>

            <!-- LESSON 6 -->
            <template x-if="$lesson == 6">
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Tayo ng magbasaro. Magbasa at maglaro.</p>
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4"><strong>A.</strong> Subukan mong basahin ang sumusunod na pantig upang makabuo ka ng salita.</p>
                        <p class="text-white mb-4"><strong>B.</strong> Basahin mo ang sumusunod na parirala at pangungusap.</p>
                        <p class="text-white">Subukan nga nating sagutin ang mga tanong batay sa iyong binasang pangungusap.</p>
                    </div>
                </div>
            </template>

            <!-- LESSON 7 -->
            <template x-if="$lesson == 7">
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Tayo ng magbasaro. Magbasa at maglaro.</p>
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4"><strong>A.</strong> Pindutin ang microphone button. (Nakadisenyong parang scrabble ang sumusunod na salitang babasahin ng mga bata)</p>
                        <p class="text-white"><strong>B.</strong> Basahin mo ang sumusunod na parirala.</p>
                    </div>
                </div>
            </template>

            <!-- LESSON 8 -->
            <template x-if="$lesson == 8">
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Tayo ng magbasaro. Magbasa at maglaro.</p>
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4">Sasagutin natin ang mga tanong tungkol sa kuwento o talata na nabuo.</p>
                        <p class="text-white">Panuto: Ilagay mo sa patlang ang iyong sagot. Pumili ka lamang sa mga nasa ibaba.</p>
                    </div>
                </div>
            </template>

            <!-- LESSON 9 -->
            <template x-if="$lesson == 9">
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Tayo ng magbasaro. Magbasa at maglaro.</p>
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4"><strong>A.</strong> Pagsama-samahin ang mga pantig upang mabuo ang salita.</p>
                        <p class="text-white"><strong>B.</strong> Basahin ang sumusunod na parirala.</p>
                    </div>
                </div>
            </template>

            <!-- LESSON 10 -->
            <template x-if="$lesson == 10">
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Tayo ng magbasaro. Magbasa at maglaro.</p>
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white">Isulat ang nawawalang pantig. Basahin mo ang mabubuong salita. (Lagyan ng larawan ang mga salita)</p>
                    </div>
                </div>
            </template>

            <!-- LESSON 11 -->
            <template x-if="$lesson == 11">
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Tayo ng magbasaro. Magbasa at maglaro.</p>
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4"><strong>A.</strong> Hanapin sa Hanay B ang kasingkahulugan ng mga salitang nasa Hanay A. Isulat ang letra ng tamang sagot sa patlang.</p>
                        <p class="text-white"><strong>B.</strong> Hanapin mo sa pagpipilian ang tamang kasalungat na kahulugan ng sumusunod na salita. Pindutin mo lang ang salita.</p>
                    </div>
                </div>
            </template>

            <!-- LESSON 12 -->
            <template x-if="$lesson == 12">
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Tayo ng magbasaro. Magbasa at maglaro.</p>
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white">Punan ng tamang diptonggo na ay, aw, iw, oy, uy at ey ang sumusunod na salita. Pagkatapos ay basahin mo ang nabuo mong salita.</p>
                    </div>
                </div>
            </template>

            <!-- LESSON 13 -->
            <template x-if="$lesson == 13">
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Tayo ng magbasaro. Magbasa at maglaro.</p>
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4"><strong>A.</strong> Punan mo ng wastong kambal-katinig ang sumusunod upang mabuo ang mga salita.</p>
                        <p class="text-white"><strong>B.</strong> Basahin mo ang mga nabuo mong salita.</p>
                    </div>
                </div>
            </template>

            <!-- LESSON 14 -->
            <template x-if="$lesson == 14">
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Tayo ng magbasaro. Magbasa at maglaro.</p>
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4"><strong>A.</strong> Punan mo ng wastong panlapi ang sumusunod na salitang-ugat.</p>
                        <p class="text-white"><strong>B.</strong> Basahin mo ang mga nabuo mong salitang may panlapi.</p>
                    </div>
                </div>
            </template>

            <!-- LESSON 15 -->
            <template x-if="$lesson == 15">
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Tayo ng magbasaro. Magbasa at maglaro.</p>
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4"><strong>A.</strong> Basahin mo ang sumusunod na karunungang bayan. Isulat kung ito ay kasabihan, salawikain o sawikain.</p>
                        <p class="text-white"><strong>B.</strong> Basahin mo ang sumusunod na bugtong. Unawain mo kung ano ang tinutukoy upang masagot ang mga ito.</p>
                    </div>
                </div>
            </template>

            <!-- LESSON 16 -->
            <template x-if="$lesson == 16">
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Tayo ng magbasaro. Magbasa at maglaro.</p>
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4"><strong>A.</strong> Subukan mong sagutin ang sumusunod na talasalitaan. Basahin mo muna ang salita pagkatapos ay pindutin mo lang ang letra ng tamang sagot.</p>
                        <p class="text-white"><strong>B.</strong> Sagutin ang sumusunod na tanong batay sa binasang tula. Basahin mo muna ang mga ito pagkatapos ay pindutin mo ang letra ng tamang sagot.</p>
                    </div>
                </div>
            </template>

            <!-- LESSON 17 -->
            <template x-if="$lesson == 17">
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Tayo ng magbasaro. Magbasa at maglaro.</p>
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4"><strong>A.</strong> Basahin mo at sagutin ang mga talasalitaan.</p>
                        <p class="text-white"><strong>B.</strong> Basahin at unawain ang sumusunod na tanong batay sa kuwentong binasa. Isulat mo ang iyong sagot sa patlang.</p>
                    </div>
                </div>
            </template>

            <!-- LESSON 18 -->
            <template x-if="$lesson == 18">
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Tayo ng magbasaro. Magbasa at maglaro.</p>
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4"><strong>A.</strong> Batay sa nabasa mong huling balita, basahin at sagutin mo ang mga tanong.</p>
                        <p class="text-white"><strong>B.</strong> Ano-ano ang mga salitang hindi pamilyar? Subukan mong sagutin ang sumusunod na talasalitaan at akronim.</p>
                    </div>
                </div>
            </template>

            <!-- LESSON 19 -->
            <template x-if="$lesson == 19">
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Tayo ng magbasaro. Magbasa at maglaro.</p>
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4"><strong>A.</strong> Basahin at sagutin ang kasingkahulugan ng sumusunod na salita. Pindutin mo ang microphone button sa pagbasa mo ng tamang sagot.</p>
                        <p class="text-white"><strong>B.</strong> Basahin at unawain ang bawat tanong. Sagutin mo sa pamamagitan ng paggamit ng microphone button at pagbasa mo nang malakas ngunit mahinahon.</p>
                    </div>
                </div>
            </template>

            <!-- LESSON 20 -->
            <template x-if="$lesson == 20">
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Tayo ng magbasaro. Magbasa at maglaro.</p>
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4"><strong>A.</strong> Basahin mo muna ang talasalitaan bago sagutin ang kahulugan. Pindutin mo lang ang puso kung ito ang tamang sagot.</p>
                        <p class="text-white"><strong>B.</strong> Basahin at unawain mo ang mga tanong. Pindutin mo ang microphone button at bigkasin/basahin mo ang tamang sagot.</p>
                    </div>
                </div>
            </template>

        </div>
    </div>

</main>