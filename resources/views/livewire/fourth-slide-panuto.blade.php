<main 
    class="flex-1 pb-[50px]" 
    x-data="{ 
        page: @entangle('page'),
        currentAudio: null,
        currentAudioIndex: 0,
        audioQueue: [],
        soundEnabled: false,
        audios: @js($audios),
        
        // Prepare audio queue for current page
        prepareAudioQueue(page) {
            const audioData = this.audios[page];
            
            // If it's an array, use it as is
            if (Array.isArray(audioData)) {
                this.audioQueue = audioData;
            } 
            // If it's a string, wrap it in an array
            else if (audioData) {
                this.audioQueue = [audioData];
            } 
            // No audio for this page
            else {
                this.audioQueue = [];
            }
            
            this.currentAudioIndex = 0;
        },
        
        // Play audio from queue
        playNextAudio() {
            if (!this.soundEnabled || this.audioQueue.length === 0) return;
            
            // Stop current audio if playing
            if (this.currentAudio) {
                this.currentAudio.pause();
                this.currentAudio = null;
            }
            
            // Check if there are more audios to play
            if (this.currentAudioIndex < this.audioQueue.length) {
                const audioFile = this.audioQueue[this.currentAudioIndex];
                this.currentAudio = new Audio('{{ asset('') }}' + audioFile);
                
                // When audio ends, play next one automatically
                this.currentAudio.addEventListener('ended', () => {
                    this.currentAudioIndex++;
                    this.playNextAudio();
                });
                
                this.currentAudio.play().catch(err => {
                    console.error('Audio play error:', err);
                });
            }
        },
        
        // Handle page change
        handlePageChange() {
            if (!this.soundEnabled) return;
            
            // Stop any current audio
            if (this.currentAudio) {
                this.currentAudio.pause();
                this.currentAudio = null;
            }
            
            // Prepare and play new page audio
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
            @if($lesson == 1)
                <!-- LESSON 1 -->
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Kilalanin mo ang bawat letra, pagkatapos ay pindutin mo ang microphone button sa pagbigkas ng tunog ng mga ito.</p>
                </div>

            @elseif($lesson == 2)
                <!-- LESSON 2 -->
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4"><strong>A.</strong> <span class="!text-gray-300">Bigkasin mo ang tunog ng sumusunod na patinig. Pindutin mo lamang ang microphone button sa pagbigkas mo ng tunog ng mga ito.</span></p>
                        <p class="text-white mb-4"><strong>B.</strong> <span class="!text-gray-300">Ano ang unang tunog ng sumusunod na larawan? Bigkasin mo ang unang tunog sa pamamagat ng pagpindot sa microphone button.</span></p>
                    </div>
                </div>

            @elseif($lesson == 3)
                <!-- LESSON 3 -->
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Basahin mo ang sumusunod na pantulong na kataga. Pindutin mo ang microphone button.</p>
                </div>

            @elseif($lesson == 4)
                <!-- LESSON 4 -->
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4"><strong>A.</strong> <span class="!text-gray-300">Basahin mo ang sumusunod na pantig. Pindutin mo ang microphone button.</span></p>
                        <p class="text-white"><strong>B.</strong> <span class="!text-gray-300">Sa bawat pagbasa mo sa mga salita ay pipindutin mo ang microphone button.</span></p>
                    </div>
                </div>

            @elseif($lesson == 5)
                <!-- LESSON 5 -->
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4"><strong>A.</strong> <span class="!text-gray-300">Pindutin mo ang microphone button upang mabasa ang sumusunod na parirala</span></p>
                        <p class="text-white"><strong>B.</strong> <span class="!text-gray-300">Sagutin mo ang sumusunod na tanong pagkatapos mong basahin.</span></p>
                    </div>
                </div>

            @elseif($lesson == 6)
                <!-- LESSON 6 -->
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4"><strong>A.</strong> <span class="!text-gray-300">Basahin mo ang sumusunod na salita.</span></p>
                        <p class="text-white mb-4"><strong>B.</strong> <span class="!text-gray-300">Basahin mo ang mga parirala.</span></p>
                        <p class="text-white"><strong>C.</strong> <span class="!text-gray-300">Basahin mo ang mga pangungusap at sagutin ang mga tanong.</span></p>
                    </div>
                </div>

            @elseif($lesson == 7)
                <!-- LESSON 7 -->
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4"><strong>A.</strong> <span class="!text-gray-300">Sundan mo ako sa pagbasa ng sumusunod na pangungusap.</span></p>
                        <p class="text-white"><strong>B.</strong> <span class="!text-gray-300">Handa ka na bang sumagot sa mga tanong batay sa mga pangungusap na iyong babasahin?</span></p>
                    </div>
                </div>

            @elseif($lesson == 8)
                <!-- LESSON 8 -->
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4"><strong>Panuto:</strong> <span class="!text-gray-300">Basahin mo ang isa pang talata na nabuo sa mga letrang m s a i o b e u t k l n y.</span></p>
                        <p class="text-white"><strong>Sagutin mo ang mga tanong.</strong></p>
                    </div>
                </div>

            @elseif($lesson == 9)
                <!-- LESSON 9 -->
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Sagutin ang sumusunod na tanong.</p>
                </div>

            @elseif($lesson == 10)
                <!-- LESSON 10 -->
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Basahin mo ang sumusunod na pangunahing salita sa Filipino.</p>
                </div>

            @elseif($lesson == 11)
                <!-- LESSON 11 -->
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Basahin mo ang sumusunod na salita. Pagkatapos ay sabihin mo kung ang mga ito ay magkasinkahulugan o magkasalungat.</p>
                </div>

            @elseif($lesson == 12)
                <!-- LESSON 12 -->
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4"><strong>A.</strong> <span class="!text-gray-300">Basahin mo ang sumusunod na salitang may diptonggo.</span></p>
                        <p class="text-white"><strong>B.</strong> <span class="!text-gray-300">Buoin mo ang salita. Pumili ng sagot na nasa kanan. Isulat mo sa patlang ang nabuong salita.</span></p>
                    </div>
                </div>

            @elseif($lesson == 13)
                <!-- LESSON 13 - NO PAGTATAYA YET -->
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4"><strong>A.</strong> <span class="!text-gray-300">Punan mo ng wastong panlapi ang sumusunod na salitang- ugat.</span></p>
                        <p class="text-white"><strong>B.</strong> <span class="!text-gray-300">Basahin mo ang mga nabuo mong salitang may panlapi.</span></p>
                    </div>
                </div>

            @elseif($lesson == 14)
                <!-- LESSON 14 -->
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Basahin mo ang sumusunod na salita. Pagkatapos ay isulat mo sa patlang ang panlaping nasa loob ng salita.</p>
                </div>

            @elseif($lesson == 15)
                <!-- LESSON 15 -->
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                        <p class="text-white mb-4"><strong>A.</strong> <span class="!text-gray-300">Basahin mo ang mga sawikain. Pagkatapos ay isulat mo ang kanilang kahulugan.</span></p>
                        <p class="text-white mb-4"><strong>B.</strong> <span class="!text-gray-300">Basahin mo ang isang kasabihan. Pagkatapos ay sagutin ang mga tanong.</span></p>
                        <p class="text-white"><strong>C.</strong> <span class="!text-gray-300">Basahin mo ang isang salawikain. Pagkatapos ay sagutin mo ang mga tanong.</span></p>
                    </div>
                </div>

            @elseif($lesson == 16)
                <!-- LESSON 16 -->
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Basahin at unawain ang sumusunod na katanungan o pahayag. Pindutin mo lang ang salita na sa palagay mo ay ang tamang sagot.</p>
                </div>

            @elseif($lesson == 17)
                <!-- LESSON 17 -->
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Basahin at unawain ang sumusunod na tanong. Pindutin lang ang letra na tama ang sagot.</p>
                </div>

            @elseif($lesson == 18)
                <!-- LESSON 18 -->
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Batay sa dalawang balitang binasa, basahin at sagutin ang sumusunod. Pindutin lang ang letra na tama ang sagot.</p>
                </div>

            @elseif($lesson == 19)
                <!-- LESSON 19 -->
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">Sagutin ang sumusunod na tanong. Pindutin lang ang letra na kumakatawan sa tamang sagot.</p>
                </div>

            @elseif($lesson == 20)
                <!-- LESSON 20 -->
                <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-10 w-full px-4">
                    <p class="text-lg font-semibold text-center max-w-2xl">A. Basahin at unawain ang mga talasalitaan. Hanapin mo ang kasingkahulugan ng mga ito sa kahon.</p>
                </div>
            @endif

            @include('partials.panuto-navigation')
        </div>
    </div>

</main>