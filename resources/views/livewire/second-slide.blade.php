<main 
    class="flex-1 overflow-hidden pb-[50px]" 
    x-data="{ 
        page: @entangle('page'),
        audio: null,
        soundEnabled: false,
        playAudio(src) {
            if (!this.soundEnabled) return;
            if (this.audio) this.audio.pause();
            this.audio = new Audio(src);
            this.audio.play();
        },
        handleAudio() {
            if (!this.soundEnabled) return;
            if (this.page === 1) this.playAudio('{{ asset('audio/L1P1.m4a') }}');
            if (this.page === 2) this.playAudio('{{ asset('audio/L1P2.m4a') }}');
        }
    }"
    x-init="$watch('page', () => handleAudio())"
>

    <!-- Enable Sound overlay -->
    <template x-if="!soundEnabled">
        <div class="absolute inset-0 bg-black/90 flex items-center justify-center z-50">
            <button 
                @click="soundEnabled = true; handleAudio();" 
                class="px-6 py-3 bg-[#F4C300] !text-black font-bold rounded-lg text-lg shadow-lg"
            >
                <i class="fa-solid fa-volume-high !text-black"></i> I-enable ang Tunog
            </button>
        </div>
    </template>

    <div class="h-full flex items-center justify-center">
        @if ($lesson == 1)
            <!-- Background figure -->
            <img 
                x-show="page === 1" class="absolute bottom-[150px] left-[80px] z-[1] w-[730px] pointer-events-none" src="../Img/layunin-figure.png" alt="Layunin Figure"
            >
            <img 
                x-show="page === 2" class="absolute bottom-[20px] left-[50px] z-[1] w-[730px] pointer-events-none" src="../Img/layunin-figure.png" alt="Layunin Figure"
            >

            <div class="card w-full flex flex-col items-center gap-5 relative text-lg max-h-[80vh]">
                <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
                    <p class="text-2xl font-bold text-gray-300">
                        Magandang buhay mabuting tao! Ako si Gng. Beng ang iyong guro sa Basaro. Handa ka na bang matutong magbasa? Tara na at samahan mo ako sa mundo ng Basaro.
                    </p>
                </div>

                <!-- Page 2 -->
                <div x-show="page === 2" class="w-full flex-1 flex flex-col gap-6 px-2">
                    <header class="header">
                        <h1 class="text-3xl font-bold">
                            <span class="!text-[#F4C300]">Sesyon 1:</span>
                            Ang Alpabetong Filipino
                        </h1>
                        <p class="text-2xl font-bold text-gray-300">
                            Pagpapakilala ng mga letra at tunog ng mga ito
                        </p>
                    </header>

                    <div class="grid grid-cols-6 gap-5 text-4xl font-bold text-center">
                        @foreach (range('A', 'Z') as $letter)
                            <p  class="z-[2] cursor-pointer hover:scale-125 hover:!text-[#F4C300]">{{ $letter }}{{ strtolower($letter) }}</p>
                        @endforeach
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex w-full justify-end gap-5 mt-4">
                    <!-- Back -->
                    <button
                        @click="page === 1 ? window.location.href = '/lesson-view?lesson={{$lesson}}&slide=first-slide' : page--"
                        class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold"
                    >
                        <i class="fa-solid fa-arrow-left !text-black"></i> Balik
                    </button>

                    <!-- Next -->
                    <button 
                        x-show="page == 1"
                        @click="page++"
                        :class="{ 'opacity-30 pointer-events-none': page === 2 }"
                        class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold"
                    >
                        Susunod 
                        <i class="fa-solid fa-arrow-right !text-black"></i>
                    </button>

                    <!-- Continue -->
                    <button 
                        x-show="page === 2"
                        onclick="window.location.href='/lesson-view?lesson={{ $lesson }}&slide=third-slide'"
                        class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold"
                    >
                        Magpatuloy
                        <i class="fa-solid fa-arrow-right !text-black"></i>
                    </button>
                </div>
            </div>
        @endif
    </div>
</main>
