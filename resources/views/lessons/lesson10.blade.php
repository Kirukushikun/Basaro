<div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg">
    {{-- ===== PAGE 1 ===== --}}
    <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h1 class="!text-xl sm:!text-2xl md:!text-3xl lg:!text-4xl font-bold">
                <span class="!text-[#F4C300]">Sesyon 10:</span>
                Pagbasa ng mga Pangunahin o Karaniwang Salita
            </h1>
            <p class="!text-base sm:!text-lg md:!text-xl lg:!text-2xl font-semibold !text-gray-200">
                Ang mga karaniwang salita o basic sight words sa Ingles ay mga pangunahing salita na inaasahang agad makikilala ng mga batang mag-aaral na Pilipino.
            </p>
        </header>
        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl !text-gray-300">
            (Basic Sight Words sa Filipino)
        </p>
        <div class="flex-1 grid grid-cols-3 gap-6 !text-2xl sm:!text-3xl md:!text-3xl lg:!text-4xl font-bold text-center overflow-y-auto p-5">
            @foreach ([
                'mesa', 'mani', 'niya',
                'beke', 'kami', 'mali',
                'yate', 'bibe', 'pipi',
                'teka', 'dila', 'tiya',
                'peke', 'nipa', 'sine',
                'dede', 'pari', 'sariwa',
                'pera', 'siya', 'diwata',
                'tela', 'lahi', 'binata'
            ] as $word)
                <p class="cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform">
                    {{ $word }}
                </p>
            @endforeach
        </div>
    </div>


    {{-- Navigation Buttons --}}
    @include('partials.lesson-navigation')
</div>