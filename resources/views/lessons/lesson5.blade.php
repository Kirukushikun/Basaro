<div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg">
    {{-- ===== PAGE 1 ===== --}}
    <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold border-b border-gray-500 pb-4">
                <span class="!text-[#F4C300]">Sesyon 5:</span>
                Pagbubuo ng mga parirala at pangungusap
            </h1>
            <h1 class="text-2xl font-bold mt-4">
                Ano naman ang ibig sabihin ng <span class="!text-[#F4C300]">Parirala</span>?
            </h1>
            <p class="text-2xl font-semibold !text-gray-200 mt-4">
                Ang parirala ay lipon ng mga salita na hindi nagsasaad ng buong diwa.
                Para itong pinagsama-samang kataga at salita tulad ng:
            </p>
        </header>

        <div class="grid grid-cols-3 gap-6 text-4xl font-bold text-center p-5 overflow-y-auto flex-1">
            @foreach ([
                'Ang masa',
                'Si ama',
                'Ang masama',
                'Ang mama',
                'Masasama kay ama'
            ] as $phrase)
                <p class="cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform">
                    {{ $phrase }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 2 ===== --}}
    <div x-show="page === 2" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-2xl font-bold">
                Ano naman ang ibig sabihin ng <span class="!text-[#F4C300]">Pangungusap</span>?
            </h1>
            <p class="text-2xl font-semibold !text-gray-200 mt-4">
                Ito ay lipon ng mga salita na nagpapahayag ng buong diwa. Narito ang mga halimbawa: 
            </p>
        </header>
        <div class="flex-1 flex flex-col items-center justify-center gap-8 p-5">
            @foreach ([
                'Kay ama sasama si Mama.',
                'Ang mama ay masama.'
            ] as $sentence)
                <p class="text-4xl font-bold cursor-pointer hover:scale-105 hover:!text-[#F4C300] transition-transform text-center">
                    {{ $sentence }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 3 ===== --}}
    <div x-show="page === 3" class="w-full flex-1 flex flex-col gap-6 px-2">
        <p class="text-2xl font-semibold !text-gray-200">
            Dumako kana sa pagsasanay, Tayo ng mag-Basaro! Magbasa at maglaro. Sa bawat tamang sagot ay makakakuha ka ng ribbon. Para sa panuto subukan mong basahin ang sumusunod na parirala.
        </p>
    </div>

    {{-- Navigation Buttons --}}
    @include('partials.lesson-navigation')
</div>