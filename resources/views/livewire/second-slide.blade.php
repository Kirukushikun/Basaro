<main 
    class="flex-1 pb-[50px]" 
    x-data="{ 
        page: @entangle('page'),
        audio: null,
        soundEnabled: false,
        audios: @js($audios), // All audios passed from backend
        
        playAudio(page) {
            if (!this.soundEnabled) return;
            if (this.audio) this.audio.pause();
            
            const audioFile = this.audios[page];
            if (audioFile) {
                this.audio = new Audio('{{ asset('') }}' + audioFile);
                this.audio.play();
            }
        },
        
        handleAudio() {
            if (!this.soundEnabled) return;
            this.playAudio(this.page);
        }
    }"
    x-init="$watch('page', () => handleAudio())"
>

    <!-- Enable Sound Overlay -->
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
            {{-- ========== LESSON 1 CONTENT ========== --}}
            
            {{-- Page 1 Background --}}
            <img 
                x-show="page === 1" 
                class="absolute bottom-[150px] left-[80px] z-[1] w-[730px] pointer-events-none" 
                src="../Img/layunin-figure.png" 
                alt="Layunin Figure"
            >
            
            {{-- Page 2 Background --}}
            <img 
                x-show="page === 2" 
                class="absolute bottom-[20px] left-[50px] z-[1] w-[730px] pointer-events-none" 
                src="../Img/layunin-figure.png" 
                alt="Layunin Figure"
            >

            <div class="card w-full max-h-[80vh] flex flex-col items-center gap-5 relative text-lg">
                
                {{-- ===== PAGE 1 ===== --}}
                <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
                    <p class="text-2xl font-semibold !text-gray-200">
                        Magandang buhay mabuting tao! Ako si Gng. Beng ang iyong guro sa Basaro. 
                        Handa ka na bang matutong magbasa? Tara na at samahan mo ako sa mundo ng Basaro.
                    </p>
                </div>

                {{-- ===== PAGE 2 ===== --}}
                <div x-show="page === 2" class="w-full flex-1 flex flex-col gap-6 px-2">
                    <header class="header">
                        <h1 class="text-3xl font-bold">
                            <span class="!text-[#F4C300]">Sesyon 1:</span>
                            Ang Alpabetong Filipino
                        </h1>
                        <p class="text-2xl font-semibold !text-gray-200">
                            Pagpapakilala ng mga letra at tunog ng mga ito
                        </p>
                    </header>

                    <div class="grid grid-cols-6 gap-5 text-4xl font-bold text-center">
                        @foreach (range('A', 'Z') as $letter)
                            <p class="z-[2] cursor-pointer hover:scale-125 hover:!text-[#F4C300] transition-transform">
                                {{ $letter }}{{ strtolower($letter) }}
                            </p>
                        @endforeach
                    </div>
                </div>

                {{-- Navigation Buttons --}}
                @include('partials.lesson-navigation')
            </div>

        @elseif ($lesson == 2)
            {{-- ========== LESSON 2 CONTENT ========== --}}
            
            <div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg">
                {{-- ===== PAGE 1 ===== --}}
                <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
                    <header class="header">
                        <h1 class="text-3xl font-bold">
                            <span class="!text-[#F4C300]">Sesyon 2:</span>
                            Ang Mga Patinig
                        </h1>
                        <p class="text-2xl font-semibold !text-gray-200">
                            Ang alpabetong filipino ay binubuo ng <span class="!text-[#F4C300]">28</span> letra, 5 sa mga ito ay tinatawag na patinig. Ang mga ito ay ang sumusunod:
                        </p>
                    </header>

                    <div class="grid grid-cols-5 gap-5 text-4xl font-bold text-center p-5">
                        @foreach (['A', 'E', 'I', 'O', 'U'] as $patinig)
                            <p class="z-[2] cursor-pointer hover:scale-125 hover:!text-[#F4C300] transition-transform">
                                {{ $patinig }}
                            </p>
                        @endforeach
                    </div>
                </div>
                
                {{-- ===== PAGE 2 ===== --}}
                <div x-show="page === 2" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
                    <header class="header flex-shrink-0">
                        <h1 class="text-3xl font-bold">
                            Natatandaan mo ba ang kanilang tunog?
                        </h1>
                    </header>
                    
                    <div class="grid grid-cols-3 gap-5 text-4xl font-bold text-center p-5 overflow-y-auto flex-1">
                        @foreach ([
                            'Aso', 'Araw', 'Apoy', 'Atis', 'Ahas', 'Abokado',
                            'Eroplano', 'Elefante', 'Eskwela', 'Espada', 'Estudyante', 'Elektrisidad',
                            'Ibon', 'Isda', 'Itlog', 'Ilaw', 'Iglesia', 'Imburnal',
                            'Oso', 'Ospital', 'Okra', 'Orasan', 'Oras', 'Osmena',
                            'Ulan', 'Upo', 'Ube', 'Ulap', 'Ugat', 'Upuan',
                            'Agila', 'Asin', 'Alambre', 'Araro', 'Anghel', 'Asul',
                            'Estante', 'Entablado', 'Empanada', 'Eksamen', 'Empleyado', 'Ebidensya',
                            'Imahen', 'Ina', 'Ikaw', 'Inggit', 'Imik', 'Indak',
                            'Orihinal', 'Opisina', 'Orasyon', 'Operasyon', 'Organisa', 'Ordinaryo',
                            'Usapan', 'Ugali', 'Umaga', 'Uliran', 'Ugoy', 'Ukit'
                        ] as $patinig)
                            <p class="z-[2] cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform">
                                {{ $patinig }}
                            </p>
                        @endforeach
                    </div>
                </div>
                
                {{-- Navigation Buttons --}}
                @include('partials.lesson-navigation')
            </div>
            
        @endif
        
    </div>
</main>