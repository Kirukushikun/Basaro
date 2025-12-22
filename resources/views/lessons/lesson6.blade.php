<div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg">
    {{-- ===== PAGE 1 ===== --}}
    <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold">
                <span class="!text-[#F4C300]">Sesyon 6:</span>
                M, S, A, I, O at B
            </h1>
            <p class="text-2xl font-semibold !text-gray-200">
                Sa mga naunang sesyon ay nalaman mo na ang tunog ng mga letrang "m s a."
            </p>
        </header>

        <div class="flex-1 flex flex-col gap-8 p-5">
            <p class="text-2xl font-semibold !text-gray-200">Sabihin mo ngang muli ang tunog ng letrang <span>M</span>?</p>
            <p class="text-2xl font-semibold !text-gray-200">Paano naman ang tunog ng <span>S</span>?</p>
            <p class="text-2xl font-semibold !text-gray-200">E ang tunog ng <span>A</span>?</p>
        </div>
    </div>

    {{-- ===== PAGE 2 ===== --}}
    <div x-show="page === 2" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Sa sesyong ito ay pagsasama-samahin natin ang tunog ng mga letrang Ii, Oo at Bb kasama ng tunog ng mga letrang m, s at a.
            </p>
            <p class="text-xl !text-gray-300 mt-4">
                Sundan mo ako sa pagbigkas.
            </p>
        </header>

        <div class="grid grid-cols-3 gap-6 text-4xl font-bold text-center p-5 overflow-y-auto flex-1">
            @foreach ([
                'Ii',
                'Oo',
                'Bb',
                'Mm',
                'Ss',
                'Aa',
            ] as $phrase)
                <p class="cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform">
                    {{ $phrase }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 3 ===== --}}
    <div x-show="page === 3" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Narito ang mga pantig na ating mabubuo kapag pinagsama-sama natin ang mga tunog ng mga letrang Ii, Oo at Bb.
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center gap-10">
            @foreach (['Bi', 'Bo', 'Ib', 'Ob'] as $syllable)
                <p class="text-7xl font-bold cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform">
                    {{ $syllable }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 4 ===== --}}
    <div x-show="page === 4" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Kapag pinagsama-sama natin ang mga pantig na ito ay makakabuo tayo ng salita. Halimbawa:
                <span class="text-2xl font-bold !text-[#F4C300]">
                    bi + bo = bibo
                </span>.
                Kapag pinagsama-sama natin ang mga pantig na <span class="!text-[#F4C300]">bi</span>, <span class="!text-[#F4C300]">bo</span>, <span class="!text-[#F4C300]">ib</span> at <span class="!text-[#F4C300]">ob</span> sa mga tunog ng <span class="!text-[#F4C300]">m</span>, <span class="!text-[#F4C300]">s</span> at <span class="!text-[#F4C300]">a</span> ay makakabuo tayo ng maraming salita.
            </p>
            <p class="text-xl !text-gray-300 mt-4">
                Narito ang mabubuo nating mga pantig:
            </p>            
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-5 gap-8 text-5xl font-bold">
                @foreach (['im', 'om', 'mi', 'mo', 'is', 'as', 'so', 'os', 'sa', 'ba'] as $syllable)
                    <p class="cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform text-center">
                        {{ $syllable }}
                    </p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 5 ===== --}}
    <div x-show="page === 5" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Ikaw nga ang magbasa.
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-5 gap-8 text-5xl font-bold">
                @foreach (['im', 'om', 'mi', 'mo', 'is', 'as', 'so', 'os', 'sa', 'ba'] as $syllable)
                    <p class="cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform text-center">
                        {{ $syllable }}
                    </p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 6 ===== --}}
    <div x-show="page === 6" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-2xl font-semibold !text-gray-200">
                Narito ang mga halimbawa ng mga salitang mabubuo natin kapag ibinagsamasama natin ang mga panting na ito:
            </p>
        </header>

        <div class="flex-1 flex flex-col items-center justify-center gap-8 overflow-y-auto p-5">
            @foreach ([
                'i + ba = iba',
                'a + ba = aba',
                'ba + o = bao',
                'o + so = oso',
                'mi + sa = misa'
            ] as $example)
                <p class="text-5xl font-bold">
                    {{ $example }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 7 ===== --}}
    <div x-show="page === 7" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-2xl font-semibold !text-gray-200">
                Ikaw naman muli ang magbasa:
            </p>
        </header>

        <div class="flex-1 flex flex-col items-center justify-center gap-8 overflow-y-auto p-5">
            @foreach ([
                'i + ba = iba',
                'a + ba = aba',
                'ba + o = bao',
                'o + so = oso',
                'mi + sa = misa'
            ] as $example)
                <p class="text-5xl font-bold">
                    {{ $example }}
                </p>
            @endforeach
        </div>
    </div>


    {{-- ===== PAGE 8 ===== --}}
    <div x-show="page === 8" class="w-full flex-1 flex flex-col gap-6 px-2">
        <p class="text-2xl font-semibold !text-gray-200">
            Pagsasanay, tayo na uling magbasaro! Magbasa at maglaro.
        </p>
    </div>

    {{-- Navigation Buttons --}}
    @include('partials.lesson-navigation')
</div>