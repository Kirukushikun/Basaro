{{-- ===== LESSON 4: PAGSASAMA-SAMA NG MGA TUNOG ===== --}}

<div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg">
    {{-- ===== PAGE 1 ===== --}}
    <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold">
                <span class="!text-[#F4C300]">Sesyon 4:</span>
                Pagsasama-sama ng mga tunog (Mm, Ss at Aa)
            </h1>
            <p class="text-2xl font-semibold !text-gray-200">
                Ngayon naman ay pagsasama-samahin natin ang mga tunog upang makalikha tayo ng pantig at nang sa gayon ay makabuo tayo ng isang makabuluhang salita gamit ang mga letrang Mm, Ss at Aa.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 2 ===== --}}
    <div x-show="page === 2" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Bilang pagbabalik-aral sa mga naunang sesyon, banggitin mo nga ang tunog ng letrang Mm.
            </p>
            <p class="text-xl !text-gray-300 mt-2">
                Pindutin mo ang microphone button sa iyong pagbigkas.
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <p class="text-9xl font-bold !text-[#F4C300]">M</p>
        </div>
    </div>

    {{-- ===== PAGE 3 ===== --}}
    <div x-show="page === 3" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Ano naman ang tunog ng letrang Ss?
            </p>
            <p class="text-xl !text-gray-300 mt-2">
                Pindutin mo ang microphone button sa iyong pagbigkas.
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <p class="text-9xl font-bold !text-[#F4C300]">S</p>
        </div>
    </div>

    {{-- ===== PAGE 4 ===== --}}
    <div x-show="page === 4" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                At panghuli, pindutin mong muli ang microphone button sa pagbigkas mo ng tunog ng letrang Aa.
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <p class="text-9xl font-bold !text-[#F4C300]">A</p>
        </div>
    </div>

    {{-- ===== PAGE 5 ===== --}}
    <div x-show="page === 5" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Pagdurugtungin natin ang mga tunog ng mga ito
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center gap-8">
            <p class="text-8xl font-bold">m</p>
            <p class="text-8xl font-bold">s</p>
            <p class="text-8xl font-bold">a</p>
        </div>
    </div>

    {{-- ===== PAGE 6 ===== --}}
    <div x-show="page === 6" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Ito ang nabuo nating pantig nang pagsamahin natin ang tunog na <span class="!text-[#F4C300]">mmm</span> at <span class="!text-[#F4C300]">aaa</span>
            </p>
        </header>

        <div class="flex-1 flex flex-col items-center justify-center gap-6">
            <p class="text-6xl font-bold">
                <span class="!text-[#F4C300]">m</span> + <span class="!text-[#F4C300]">a</span> = <span class="text-7xl">ma</span>
            </p>
            <div class="flex gap-8 text-5xl font-bold">
                <p>ma</p>
                <p>ma</p>
                <p>ma</p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 7 ===== --}}
    <div x-show="page === 7" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Ito ang nabuo nating pantig nang pagsamahin natin ang tunog na <span class="!text-[#F4C300]">sss</span> at <span class="!text-[#F4C300]">aaa</span>
            </p>
        </header>

        <div class="flex-1 flex flex-col items-center justify-center gap-6">
            <p class="text-6xl font-bold">
                <span class="!text-[#F4C300]">s</span> + <span class="!text-[#F4C300]">a</span> = <span class="text-7xl">sa</span>
            </p>
            <div class="flex gap-8 text-5xl font-bold">
                <p>sa</p>
                <p>sa</p>
                <p>sa</p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 8 ===== --}}
    <div x-show="page === 8" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center gap-8">
            <p class="text-8xl font-bold">a</p>
            <p class="text-8xl font-bold">a</p>
            <p class="text-8xl font-bold">a</p>
            <p class="text-8xl font-bold">a</p>
            <p class="text-8xl font-bold">a</p>
        </div>
    </div>

    {{-- ===== PAGE 9 ===== --}}
    <div x-show="page === 9" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Ito ang nabuo nating pantig nang pagsamahin natin ang tunog na <span class="!text-[#F4C300]">aaa</span> at <span class="!text-[#F4C300]">mmm</span>
            </p>
        </header>

        <div class="flex-1 flex flex-col items-center justify-center gap-6">
            <p class="text-6xl font-bold">
                <span class="!text-[#F4C300]">a</span> + <span class="!text-[#F4C300]">m</span> = <span class="text-7xl">am</span>
            </p>
            <div class="flex gap-8 text-5xl font-bold">
                <p>am</p>
                <p>am</p>
                <p>am</p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 10 ===== --}}
    <div x-show="page === 10" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Ito ang nabuo nating pantig nang pagsamahin natin ang tunog na <span class="!text-[#F4C300]">aaa</span> at <span class="!text-[#F4C300]">sss</span>
            </p>
        </header>

        <div class="flex-1 flex flex-col items-center justify-center gap-6">
            <p class="text-6xl font-bold">
                <span class="!text-[#F4C300]">a</span> + <span class="!text-[#F4C300]">s</span> = <span class="text-7xl">as</span>
            </p>
            <div class="flex gap-8 text-5xl font-bold">
                <p>as</p>
                <p>as</p>
                <p>as</p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 11 ===== --}}
    <div x-show="page === 11" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Nakuha mo ba? Ngayon ay ikaw naman. Sundan mo ako para mabasa mo nang tama.
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center gap-10">
            @foreach (['Ma', 'Sa', 'Am', 'As'] as $syllable)
                <p class="text-7xl font-bold cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform">
                    {{ $syllable }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 12 ===== --}}
    <div x-show="page === 12" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-2xl font-semibold !text-gray-200">
                Subukan nga nating pagsama-samahin ang mga pantig para makabuo ng salita.
            </p>
        </header>

        <div class="grid grid-cols-3 gap-6 text-4xl font-bold text-center p-5 overflow-y-auto flex-1">
            @foreach ([
                'a+ma', 'ma+ma', 'a+sa',
                'sa+ma', 'sa+sa+ma', 'a+a+sa',
                'ma+sa+ma', 'ma+sa', 'ma+sa+sa+ma'
            ] as $combination)
                <p class="z-[2] cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform">
                    {{ $combination }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- Navigation Buttons --}}
    @include('partials.lesson-navigation')
</div>