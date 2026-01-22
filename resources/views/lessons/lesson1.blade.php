<!-- Lesson 1 -->
<!-- {{-- Page 1 Background --}}
<img 
    x-show="page === 1" 
    class="absolute bottom-[150px] left-[80px] z-[1] w-[730px] pointer-events-none" 
    src="{{asset('img/layunin-figure.png')}}" 
    alt="Layunin Figure"
>

{{-- Page 2 Background --}}
<img 
    x-show="page === 2" 
    class="absolute bottom-[20px] left-[50px] z-[1] w-[730px] pointer-events-none" 
    src="{{asset('img/layunin-figure.png')}}" 
    alt="Layunin Figure"
>

{{-- Page 3 Background --}}
<img 
    x-show="page === 3" 
    class="absolute bottom-[40px] left-[70px] z-[1] w-[730px] pointer-events-none" 
    src="{{asset('img/layunin-figure.png')}}" 
    alt="Layunin Figure"
> -->

<!-- Lesson 1 -->
<div class="card w-full max-h-[80vh] flex flex-col items-center gap-5 relative text-lg">
    
    {{-- ===== PAGE 1 ===== --}}
    <div x-show="page === 1" class="w-full flex-1 flex flex-col min-h-0">
        <div class="overflow-y-auto flex-1 flex flex-col gap-6 px-2 min-h-0">
            <p class="!text-base sm:!text-lg md:!text-xl lg:!text-2xl font-semibold !text-gray-200">
                Magandang buhay mabuting tao! Ako si Gng. Beng ang iyong guro sa Basaro. 
                Handa ka na bang matutong magbasa? Tara na at samahan mo ako sa mundo ng Basaro.
            </p>
        </div>
    </div>

    {{-- ===== PAGE 2 ===== --}}
    <div x-show="page === 2" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h1 class="!text-xl sm:!text-2xl md:!text-2xl lg:!text-3xl font-bold">
                <span class="!text-[#F4C300]">Sesyon 1:</span>
                Ang Alpabetong Filipino
            </h1>
            <p class="!text-base sm:!text-lg md:!text-xl lg:!text-2xl font-semibold !text-gray-200">
                Pagpapakilala ng mga letra at tunog ng mga ito
            </p>
        </header>

        <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5 !text-2xl sm:!text-3xl md:!text-3xl lg:!text-4xl font-bold text-center p-5 overflow-y-auto flex-1 min-h-0">
            @php
                $letters = [
                    'A','B','C','D','E','F','G','H','I','J','K','L','M',
                    'N','Ñ','NG','O','P','Q','R','S','T','U','V','W','X','Y','Z'
                ];
            @endphp

            @foreach ($letters as $letter)
                <p class="z-[2] cursor-pointer hover:scale-125 hover:!text-[#F4C300] transition-transform">
                    {{ $letter }}{{ mb_strtolower($letter, 'UTF-8') }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 3 ===== --}}
    <div x-show="page === 3" class="w-full flex-1 flex flex-col min-h-0">
        <div class="overflow-y-auto flex-1 flex flex-col gap-6 px-2 min-h-0">
            <p class="!text-base sm:!text-lg md:!text-xl lg:!text-2xl font-semibold !text-gray-200">
                Ngayon naman ay subukan mong dumako sa mga pagsasanay, tayo ng mag-Basaro! Magbasa at maglaro. Sa bawat tamang sagot ay makakakuha ka ng ribbon. 
                Para sa <span class="!text-[#F4C300]">Pagsasanay A</span> ano ang tunog ng sumusunod na letra? Pindutin mo lamang ang microphone button <i class="fa-solid fa-microphone"></i> para sa pagbigkas mo ng tunog ng letra. Huwag kang mag alala gagabayan ka ng iyong guro.
            </p>
        </div>
    </div>

    {{-- Navigation Buttons --}}
    @include('partials.lesson-navigation')
</div>