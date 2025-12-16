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