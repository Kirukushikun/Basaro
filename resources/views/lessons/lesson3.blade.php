{{-- ===== LESSON 3: MGA PANTULONG NA KATAGA ===== --}}

<div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg">
    {{-- ===== PAGE 1 ===== --}}
    <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header flex flex-col gap-2">
            <h1 class="text-3xl font-bold">
                <span class="!text-[#F4C300]">Sesyon 3:</span>
                Mga Pantulong na Kataga
            </h1>
            <p class="text-2xl font-semibold !text-gray-200">
                Pagpapakilala ng ilan sa mga pantulong na kataga. Ang mga katagang ito ay madalas na ginagamit sa pagbuo at pagbasa ng mga parirala at pangungusap. Mahalagang matutuhan mong basahin ang mga ito upang hindi ka mahirapan sa iyong pagbasa sa mga parirala at pangungusap.
            </p>
            <p class="text-2xl font-semibold !text-gray-200">
                Babasahin ko ang mga halimbawa. Makinig kang mabuti upang masundan mo sa iyong isip at mga mata ang aking mga binabasa.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 2 ===== --}}
    <div x-show="page === 2" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-2xl font-semibold !text-gray-200">
                Mga Pantulong na kataga.
            </p>
        </header>
        
        <div class="grid grid-cols-4 gap-5 text-4xl font-bold text-center p-5 overflow-y-auto flex-1">
            @foreach ([
                'ang', 'mga', 'si', 'ay', 'ng', 'kay', 'at', 'sa', 
                'ni', 'na', 'mo', 'may', 'kina', 'sina', 'sila', 'mas'
            ] as $word)
                <p class="z-[2] cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform">
                    {{ $word }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 3 ===== --}}
    <div x-show="page === 3" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-2xl font-semibold !text-gray-200">
                Ngayon naman ay magbabasa ka pagkatapos ko.
            </p>
        </header>
        
        <div class="grid grid-cols-4 gap-5 text-4xl font-bold text-center p-5 overflow-y-auto flex-1">
            @foreach ([
                'ang', 'mga', 'si', 'ay', 'ng', 'kay', 'at', 'sa', 
                'ni', 'na', 'mo', 'may', 'kina', 'sina', 'sila', 'mas'
            ] as $word)
                <p class="z-[2] cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform">
                    {{ $word }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 4 ===== --}}
    <div x-show="page === 4" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-2xl font-semibold !text-gray-200">
                Sa tulong ng iyong gurong nakaantabay sa iyo ay uulit-ulitin mong babasahin ang mga ito hanggang sa iyong makabisado.
            </p>
        </header>
        
        <div class="grid grid-cols-4 gap-5 text-4xl font-bold text-center p-5 overflow-y-auto flex-1">
            @foreach ([
                'ang', 'mga', 'si', 'ay', 'ng', 'kay', 'at', 'sa', 
                'ni', 'na', 'mo', 'may', 'kina', 'sina', 'sila', 'mas'
            ] as $word)
                <p class="z-[2] cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform">
                    {{ $word }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- Navigation Buttons --}}
    @include('partials.lesson-navigation')
</div>