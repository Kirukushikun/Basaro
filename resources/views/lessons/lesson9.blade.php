<div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg">
    {{-- ===== PAGE 1 ===== --}}
    <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="!text-xl sm:!text-2xl md:!text-3xl lg:!text-4xl font-bold">
                <span class="!text-[#F4C300]">Sesyon 9:</span>
                Pagbasa ng mga Pantig
            </h1>
            <p class="!text-base sm:!text-lg md:!text-xl lg:!text-2xl font-semibold !text-gray-200">
                Mula sa mga letrang
            </p>
        </header>

        <div class="grid grid-cols-6 gap-5 !text-2xl sm:!text-3xl md:!text-3xl lg:!text-4xl font-bold text-center">
            @foreach (['m', 's', 'a', 'i', 'o', 'b', 'e', 'u', 't', 'k', 'l', 'n', 'y', 'g', 'ng', 'p', 'r', 'd', 'h', 'w'] as $letter)
                <p class="z-[2] cursor-pointer hover:scale-125 hover:!text-[#F4C300] transition-transform">
                    {{ $letter }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 2 ===== --}}
    <div x-show="page === 2" class="w-full flex-1 flex flex-col gap-6 px-2">
        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl !text-gray-300 mt-4">
            Sundan mo ako sa pagbigkas o pagbasa sa mga pantig.
        </p>
        <div class="flex-1 flex items-center justify-center gap-8">
            @foreach (['Ga', 'ga', 'ga', 'ga', 'ga'] as $syllable)
                <p class="!text-4xl sm:!text-5xl md:!text-6xl lg:!text-8xl font-bold">{{ $syllable }}</p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 3 ===== --}}
    <div x-show="page === 3" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center gap-8">
            @foreach (['Nga', 'nga', 'nga', 'nga', 'nga'] as $syllable)
                <p class="!text-4xl sm:!text-5xl md:!text-6xl lg:!text-8xl font-bold">{{ $syllable }}</p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 4 ===== --}}
    <div x-show="page === 4" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center gap-8">
            @foreach (['Pa', 'pa', 'pa', 'pa', 'pa'] as $syllable)
                <p class="!text-4xl sm:!text-5xl md:!text-6xl lg:!text-8xl font-bold">{{ $syllable }}</p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 5 ===== --}}
    <div x-show="page === 5" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center gap-8">
            @foreach (['Ra', 'ra', 'ra', 'ra', 'ra'] as $syllable)
                <p class="!text-4xl sm:!text-5xl md:!text-6xl lg:!text-8xl font-bold">{{ $syllable }}</p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 6 ===== --}}
    <div x-show="page === 6" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center gap-8">
            @foreach (['Da', 'da', 'da', 'da', 'da'] as $syllable)
                <p class="!text-4xl sm:!text-5xl md:!text-6xl lg:!text-8xl font-bold">{{ $syllable }}</p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 7 ===== --}}
    <div x-show="page === 7" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center gap-8">
            @foreach (['Ha', 'ha', 'ha', 'ha', 'ha'] as $syllable)
                <p class="!text-4xl sm:!text-5xl md:!text-6xl lg:!text-8xl font-bold">{{ $syllable }}</p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 8 ===== --}}
    <div x-show="page === 8" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center gap-8">
            @foreach (['Wa', 'wa', 'wa', 'wa', 'wa'] as $syllable)
                <p class="!text-4xl sm:!text-5xl md:!text-6xl lg:!text-8xl font-bold">{{ $syllable }}</p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 9 ===== --}}
    <div x-show="page === 9" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex flex-shrink-0">
            <p class="!text-base sm:!text-lg md:!text-xl lg:!text-2xl font-semibold !text-gray-200">
                Ang pantig na <span class="!text-[#F4C300]">ga</span> pinagsamang tunog ng <span class="!text-[#F4C300]">g</span> at <span class="!text-[#F4C300]">a</span>. Hindi lang ang pantig na <span class="!text-[#F4C300]">ga</span> ang mabubuo natin kung pagsasamahin natin ang iba pang mga tunog ng patinig sa letrang g na may tunog na <span class="text-[#F4C300]">g</span>.
            </p>
        </header>
        <div class="flex-1 flex flex-col items-center overflow-y-auto flex-shrink-0 gap-8">
            <div class="!text-3xl sm:!text-4xl md:!text-4xl lg:!text-5xl font-bold space-y-4">
                <p>g + a = ga</p>
                <p>g + e = ge</p>
                <p>g + i = gi</p>
                <p>g + o = go</p>
                <p>g + u = gu</p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 10 ===== --}}
    <div x-show="page === 10" class="w-full flex-1 flex flex-col gap-6 px-2">
        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl !text-gray-300 mt-4">
            Sabayan mo nga akong muli sa pag bigkas ng mga pantig na ito.
        </p>
        <div class="flex-1 flex items-center justify-center gap-8">
            @foreach (['Ga', 'Ge', 'Gi', 'Go', 'Gu'] as $syllable)
                <p class="!text-4xl sm:!text-5xl md:!text-6xl lg:!text-8xl font-bold">{{ $syllable }}</p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 11 ===== --}}
    <div x-show="page === 11" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="!text-base sm:!text-lg md:!text-xl lg:!text-2xl font-semibold !text-gray-200">
                Bumuo tayo ng mga salitang gamit ang pantig na <span class="!text-[#F4C300]">ga</span>, <span class="!text-[#F4C300]">ge</span>, <span class="!text-[#F4C300]">gi</span>, <span class="!text-[#F4C300]">go</span> at <span class="!text-[#F4C300]">gu</span> kasama ang iba pang pantig na ating natalakay. Halimbawa:
            </p>
        </header>

        <div class="flex-1 grid grid-cols-2 md:grid-cols-3 gap-6 !text-lg sm:!text-2xl md:!text-2xl lg:!text-3xl font-bold text-center overflow-y-auto p-5">
            @foreach ([
                'ga + ya = gaya',
                'ga + a + no = gaano',
                'ma + ga = maga',
                'ge + mo = gemo',
                'ga + tas = gatas',
                'gi + las = gilas',
                'gu + lat = gulat',
                'gi + ni + sa = ginisa',
                'go + ma = goma',
                'go + to = goto',
                'ga + gam + ba = gagamba',
                'gu + lay = gulay',
                'gin + to = ginto',
                'gu + sa + li = gusali'
            ] as $example)
                <p class="cursor-pointer hover:scale-105 hover:!text-[#F4C300] transition-transform">
                    {{ $example }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 12 ===== --}}
    <div x-show="page === 12" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="!text-base sm:!text-lg md:!text-xl lg:!text-2xl font-semibold !text-gray-200">
                Ang pantig na <span class="!text-[#F4C300]">nga</span> pinagsamang tunog ng <span class="!text-[#F4C300]">ng</span> at <span class="!text-[#F4C300]">a</span>. Hindi lang ang pantig na <span class="!text-[#F4C300]">nga</span> ang mabubuo natin kung pagsasamahin natin ang iba pang mga tunog ng patinig sa letrang <span class="!text-[#F4C300]">ng</span> na may tunog na <span class="!text-[#F4C300]">ng</span>.
            </p>
        </header>

        <div class="flex-1 flex flex-col items-center gap-8 overflow-y-auto">
            <div class="!text-3xl sm:!text-4xl md:!text-4xl lg:!text-5xl font-bold space-y-4">
                <p>ng + a = nga</p>
                <p>ng + e = nge</p>
                <p>ng + i = ngi</p>
                <p>ng + o = ngo</p>
                <p>ng + u = ngu</p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 13 ===== --}}
    <div x-show="page === 13" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="!text-base sm:!text-lg md:!text-xl lg:!text-2xl font-semibold !text-gray-200">
                Halika bumuo tayo ng mga salitang gamit ang pantig na <span class="!text-[#F4C300]">nga</span>, <span class="!text-[#F4C300]">nge</span>, <span class="!text-[#F4C300]">ngi</span>, <span class="!text-[#F4C300]">ngo</span> at <span class="!text-[#F4C300]">ngu</span> kasama ang iba pang pantig na ating natalakay. Halimbawa:
            </p>
        </header>
        <div class="flex-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 !text-lg sm:!text-2xl md:!text-2xl lg:!text-3xl font-bold text-center overflow-y-auto p-5">
            @foreach ([
                'Nga + nga = nganga',
                'ngi + ti = ngiti',
                'bu + nga = bunga',
                'ngu + so = nguso',
                'bu + ngo = bungo',
                'Ba + nga = banga',
                'ngi + pin = ngipin',
                'ngo + ngo = ngongo',
                'sa + nga = sanga',
                'la + ngo = lango'
            ] as $example)
                <p class="cursor-pointer hover:scale-105 hover:!text-[#F4C300] transition-transform">
                    {{ $example }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 14 ===== --}}
    <div x-show="page === 14" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="!text-base sm:!text-lg md:!text-xl lg:!text-2xl font-semibold !text-gray-200">
                Ang pantig na <span class="!text-[#F4C300]">pa</span> pinagsamang tunog ng <span class="!text-[#F4C300]">p</span> at <span class="!text-[#F4C300]">a</span>. Hindi lang ang pantig na <span class="!text-[#F4C300]">pa</span> ang mabubuo natin kung pagsasamahin natin ang iba pang mga tunog ng patinig sa letrang <span class="!text-[#F4C300]">p</span> na may tunog na <span class="!text-[#F4C300]">p</span>.
            </p>
        </header>

        <div class="flex-1 flex flex-col items-center gap-8 overflow-y-auto">
            <div class="!text-3xl sm:!text-4xl md:!text-4xl lg:!text-5xl font-bold space-y-4">
                <p>p + a = pa</p>
                <p>p + e = pe</p>
                <p>p + i = pi</p>
                <p>p + o = po</p>
                <p>p + u = pu</p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 15 ===== --}}
    <div x-show="page === 15" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="!text-base sm:!text-lg md:!text-xl lg:!text-2xl font-semibold !text-gray-200">
                Bumuo tayo ng mga salitang gamit ang pantig na <span class="!text-[#F4C300]">pa</span>, <span class="!text-[#F4C300]">pe</span>, <span class="!text-[#F4C300]">pi</span>, <span class="!text-[#F4C300]">po</span> at <span class="!text-[#F4C300]">pu</span> kasama ang iba pang pantig na ating natalakay. Halimbawa:
            </p>
        </header>
        <div class="flex-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 !text-lg sm:!text-2xl md:!text-2xl lg:!text-3xl font-bold text-center overflow-y-auto p-5">
            @foreach ([
                'pu + sa = pusa',
                'a + pu + la = apula',
                'pi + to = pito',
                'pa + lo = palo',
                'pi + ta + ka = pitaka',
                'pu + no = puno',
                'pi + so = piso',
                'pe + li + ku + la = pelikula',
                'pa + ta + tas = patatas',
                'pu + ti = puti',
                'pu + gi + ta = pugita',
                'ma + pu + la = mapula',
                'sa + pi + an = sapian',
                'Pe + li + ta = Pelita',
                'pi + ko = piko'
            ] as $example)
                <p class="cursor-pointer hover:scale-105 hover:!text-[#F4C300] transition-transform">
                    {{ $example }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 16 ===== --}}
    <div x-show="page === 16" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="!text-base sm:!text-lg md:!text-xl lg:!text-2xl font-semibold !text-gray-200">
                Ang panting na <span class="!text-[#F4C300]">ra</span> pinagsamang tunog ng <span class="!text-[#F4C300]">r</span> at <span class="!text-[#F4C300]">a</span>. Hindi lang ang pantig na <span class="!text-[#F4C300]">ra</span> ang mabubuo natin kung pagsasamahin natin ang iba pang mga tunog ng patinig sa letrang <span class="!text-[#F4C300]">r</span> na may tunog na <span class="!text-[#F4C300]">r</span>.
            </p>
        </header>
        <div class="flex-1 flex flex-col items-center gap-8 overflow-y-auto">
            <div class="!text-3xl sm:!text-4xl md:!text-4xl lg:!text-5xl font-bold space-y-4">
                <p>r + a = ra</p>
                <p>r + e = re</p>
                <p>r + i = ri</p>
                <p>r + o = ro</p>
                <p>r + u = ru</p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 17 ===== --}}
    <div x-show="page === 17" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="!text-base sm:!text-lg md:!text-xl lg:!text-2xl font-semibold !text-gray-200">
                Bumuo tayo ng mga salitang gamit ang pantig na <span class="!text-[#F4C300]">ra</span>, <span class="!text-[#F4C300]">re</span>, <span class="!text-[#F4C300]">ri</span>, <span class="!text-[#F4C300]">ro</span> at <span class="!text-[#F4C300]">ru</span> kasama ang iba pang pantig na ating natalakay. Halimbawa:
            </p>
        </header>
        <div class="flex-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 !text-lg sm:!text-2xl md:!text-2xl lg:!text-3xl font-bold text-center overflow-y-auto p-5">
            @foreach ([
                'pe + ra = pera',
                'ra + ke + ta = raketa',
                're + ti + ro = retiro',
                'ro + on = roon',
                'ri + les = riles',
                'Re + lo = relo',
                'u + ri = uri',
                'a + ra + ro = araro',
                'a + ra = ara',
                'ri + ta = rita',
                'gi + ta + ra = gitara',
                'pa + ri = pari',
                'pa + ra = para',
                'ru + ler = ruler',
                'ma + ru + mi = marumi'
            ] as $example)
                <p class="cursor-pointer hover:scale-105 hover:!text-[#F4C300] transition-transform">
                    {{ $example }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 18 ===== --}}
    <div x-show="page === 18" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="!text-base sm:!text-lg md:!text-xl lg:!text-2xl font-semibold !text-gray-200">
                Ang pantig na <span class="!text-[#F4C300]">da</span> pinagsamang tunog ng <span class="!text-[#F4C300]">d</span> at <span class="!text-[#F4C300]">a</span>. Hindi lang ang pantig na <span class="!text-[#F4C300]">da</span> ang mabubuo natin kung pagsasamahin natin ang iba pang mga tunog ng patinig sa letrang <span class="!text-[#F4C300]">d</span> na may tunog na <span class="!text-[#F4C300]">d</span>.
            </p>
        </header>
        <div class="flex-1 flex flex-col items-center gap-8 overflow-y-auto">
            <div class="!text-3xl sm:!text-4xl md:!text-4xl lg:!text-5xl font-bold space-y-4">
                <p>d + a = da</p>
                <p>d + e = de</p>
                <p>d + i = di</p>
                <p>d + o = do</p>
                <p>d + u = du</p>
            </div>
        </div>        
    </div>

    {{-- ===== PAGE 19 ===== --}}
    <div x-show="page === 19" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="!text-base sm:!text-lg md:!text-xl lg:!text-2xl font-semibold !text-gray-200">
                Bumuo tayo ng mga salitang gamit ang pantig na <span class="!text-[#F4C300]">da</span>, <span class="!text-[#F4C300]">de</span>, <span class="!text-[#F4C300]">di</span>, <span class="!text-[#F4C300]">do</span> at <span class="!text-[#F4C300]">du</span> kasama ang iba pang pantig na ating natalakay. Halimbawa:
            </p>
        </header>
        <div class="flex-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 !text-lg sm:!text-2xl md:!text-2xl lg:!text-3xl font-bold text-center overflow-y-auto p-5">
            @foreach ([
                'da + ga = daga',
                'da + ya = daya',
                'du + go = dugo',
                'di + la = dila',
                'da + gok = dagok',
                'di + ko = diko',
                'de + lub + yo = delubyo',
                'do + se = dose',
                'pan + da + kot = pandakot',
                'du + da = duda',
                'da + mo = damo',
                'du + la = dula'
            ] as $example)
                <p class="cursor-pointer hover:scale-105 hover:!text-[#F4C300] transition-transform">
                    {{ $example }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 20 ===== --}}
    <div x-show="page === 20" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="!text-base sm:!text-lg md:!text-xl lg:!text-2xl font-semibold !text-gray-200">
                Ang pantig na <span class="!text-[#F4C300]">ha</span> ay pinagsamang tunog ng <span class="!text-[#F4C300]">h</span> at <span class="!text-[#F4C300]">a</span>. Hindi lang ang pantig na <span class="!text-[#F4C300]">ha</span> ang mabubuo natin kung pagsasamahin natin ang iba pang mga tunog ng patinig sa letrang <span class="!text-[#F4C300]">h</span> na may tunog na <span class="!text-[#F4C300]">h</span>.
            </p>
        </header>
        <div class="flex-1 flex flex-col items-center gap-8 overflow-y-auto">
            <div class="!text-3xl sm:!text-4xl md:!text-4xl lg:!text-5xl font-bold space-y-4">
                <p>h + a = ha</p>
                <p>h + e = he</p>
                <p>h + i = hi</p>
                <p>h + o = ho</p>
                <p>h + u = hu</p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 21 ===== --}}
    <div x-show="page === 21" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="!text-base sm:!text-lg md:!text-xl lg:!text-2xl font-semibold !text-gray-200">
                Narito ang mga salitang nabuo natin gamit ang pantig na <span class="!text-[#F4C300]">ha</span>, <span class="!text-[#F4C300]">ha</span>, <span class="!text-[#F4C300]">hi</span>, <span class="!text-[#F4C300]">ho</span> at <span class="!text-[#F4C300]">hu</span> kasama ang iba pang pantig na ating natalakay. Halimbawa:
            </p>
        </header>
        <div class="flex-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 !text-lg sm:!text-2xl md:!text-2xl lg:!text-3xl font-bold text-center overflow-y-auto p-5">
            @foreach ([
                'ha + la + man = halaman',
                'hu + la = hula',
                'hi + ta = hita',
                'ho + len = holen',
                'Hi + ga = higa',
                'hu + gas = hugas',
                'i + ha + in = ihain',
                'i + ho = iho',
                'hi + ni + hi + ka = hinihika',
                'ha + ba = haba',
                'na + hi + ya = nahiya',
                'ha + li + gi = haligi'
            ] as $example)
                <p class="cursor-pointer hover:scale-105 hover:!text-[#F4C300] transition-transform">
                    {{ $example }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 22 ===== --}}
    <div x-show="page === 22" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="!text-base sm:!text-lg md:!text-xl lg:!text-2xl font-semibold !text-gray-200">
                Ang pantig na <span class="!text-[#F4C300]">wa</span> pinagsamang tunog ng <span class="!text-[#F4C300]">w</span> at <span class="!text-[#F4C300]">a</span>. Hindi lang ang pantig na <span class="!text-[#F4C300]">wa</span> ang mabubuo natin kung pagsasamahin natin ang iba pang mga tunog ng patinig sa letrang <span class="!text-[#F4C300]">w</span> na may tunog na <span class="!text-[#F4C300]">wa</span>.
            </p>
        </header>
        <div class="flex-1 flex flex-col items-center gap-8 overflow-y-auto">
            <div class="!text-3xl sm:!text-4xl md:!text-4xl lg:!text-5xl font-bold space-y-4">
                <p>w + a = wa</p>
                <p>w + e = we</p>
                <p>w + i = wi</p>
                <p>w + o = wo</p>
                <p>w + u = wu</p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 23 ===== --}}
    <div x-show="page === 23" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="!text-base sm:!text-lg md:!text-xl lg:!text-2xl font-semibold !text-gray-200">
                Narito ang mga salitang nabuo natin gamit ang mga pantig na <span class="!text-[#F4C300]">wa</span>, <span class="!text-[#F4C300]">we</span>, <span class="!text-[#F4C300]">wi</span>, <span class="!text-[#F4C300]">wo</span> at <span class="!text-[#F4C300]">wu</span> kasama ang iba pang pantig na ating natalakay. Halimbawa:
            </p>
        </header>
        <div class="flex-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 !text-lg sm:!text-2xl md:!text-2xl lg:!text-3xl font-bold text-center overflow-y-auto p-5">
            @foreach ([
                'wi + ka = wika',
                'wa + la = wala',
                'tu + ma + wa = tumawa',
                'u + wi + an = uwian',
                'wa + gi = wagi',
                'bu + wa + ya = buwaya',
                'wi + sik = wisik',
                'su + wel + do = suweldo'
            ] as $example)
                <p class="cursor-pointer hover:scale-105 hover:!text-[#F4C300] transition-transform">
                    {{ $example }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- Navigation Buttons --}}
    @include('partials.lesson-navigation')
</div>