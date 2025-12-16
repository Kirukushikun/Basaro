<div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg">
    {{-- ===== PAGE 1 ===== --}}
    <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold">
                <span class="!text-[#F4C300]">Sesyon 7:</span>
                Letrang E, U, T, K, L, N, Y
            </h1>
            <p class="text-2xl font-semibold !text-gray-200">
                Sundan mo ako sa pagbigkas ng sumusunod na pantig.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 2 ===== --}}
    <div x-show="page === 2" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center gap-8">
            @foreach (['e', 'e', 'e', 'e', 'e'] as $letter)
                <p class="text-8xl font-bold">{{ $letter }}</p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 3 ===== --}}
    <div x-show="page === 3" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center gap-8">
            @foreach (['u', 'u', 'u', 'u', 'u'] as $letter)
                <p class="text-8xl font-bold">{{ $letter }}</p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 4 ===== --}}
    <div x-show="page === 4" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center gap-8">
            @foreach (['ta', 'ta', 'ta', 'ta', 'ta'] as $syllable)
                <p class="text-8xl font-bold">{{ $syllable }}</p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 5 ===== --}}
    <div x-show="page === 5" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center gap-8">
            @foreach (['ka', 'ka', 'ka', 'ka', 'ka'] as $syllable)
                <p class="text-8xl font-bold">{{ $syllable }}</p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 6 ===== --}}
    <div x-show="page === 6" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center gap-8">
            @foreach (['la', 'la', 'la', 'la', 'la'] as $syllable)
                <p class="text-8xl font-bold">{{ $syllable }}</p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 7 ===== --}}
    <div x-show="page === 7" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center gap-8">
            @foreach (['na', 'na', 'na', 'na', 'na'] as $syllable)
                <p class="text-8xl font-bold">{{ $syllable }}</p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 8 ===== --}}
    <div x-show="page === 8" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center gap-8">
            @foreach (['ya', 'ya', 'ya', 'ya', 'ya'] as $syllable)
                <p class="text-8xl font-bold">{{ $syllable }}</p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 9 ===== --}}
    <div x-show="page === 9" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Balikan natin ang tunog /e/. Ang tunog na /e/ ay ang tunog ng letrang Ee. Alin sa mga larawan ang nagsisimula sa tunog na /e/?
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center gap-10">
            <div class="text-center">
                <div class="w-32 h-32 bg-gray-700 rounded-lg mb-2 flex items-center justify-center">
                    <p class="text-sm">Ibon</p>
                </div>
            </div>
            <div class="text-center">
                <div class="w-32 h-32 bg-gray-700 rounded-lg mb-2 flex items-center justify-center">
                    <p class="text-sm">Eroplano</p>
                </div>
            </div>
            <div class="text-center">
                <div class="w-32 h-32 bg-gray-700 rounded-lg mb-2 flex items-center justify-center">
                    <p class="text-sm">Aso</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 10 ===== --}}
    <div x-show="page === 10" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Punan mo nga ang patlang upang mabuo mo ang mga salita.
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center gap-10">
            @foreach (['__roplano', '__lisi', '__lepante'] as $word)
                <p class="text-5xl font-bold cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform">
                    {{ $word }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 11 ===== --}}
    <div x-show="page === 11" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Ang tunog na /u/ ay tunog naman ng letrang Uu. Alin sa mga larawan ang nagsisimula sa tunog na /u/?
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center gap-10">
            <div class="text-center">
                <div class="w-32 h-32 bg-gray-700 rounded-lg mb-2 flex items-center justify-center">
                    <p class="text-sm">Usa</p>
                </div>
            </div>
            <div class="text-center">
                <div class="w-32 h-32 bg-gray-700 rounded-lg mb-2 flex items-center justify-center">
                    <p class="text-sm">Oso</p>
                </div>
            </div>
            <div class="text-center">
                <div class="w-32 h-32 bg-gray-700 rounded-lg mb-2 flex items-center justify-center">
                    <p class="text-sm">Mansanas</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 12 ===== --}}
    <div x-show="page === 12" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Isulat mo ang nawawalang letra upang mabuo mo ang mga salita.
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center gap-10">
            @foreach (['__bas', '__be', '__nan'] as $word)
                <p class="text-5xl font-bold cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform">
                    {{ $word }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 13 ===== --}}
    <div x-show="page === 13" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Kapag pinagsama natin ang tunog ng letrang Tt at tunog ng letrang Aa ay mabubuo natin ang pantig na /ta/
            </p>
        </header>

        <div class="flex-1 flex flex-col items-center justify-center gap-6">
            <p class="text-6xl font-bold">
                <span class="!text-[#F4C300]">t</span> + <span class="!text-[#F4C300]">a</span> = <span class="text-7xl">ta</span>
            </p>
        </div>
    </div>

    {{-- ===== PAGE 14 ===== --}}
    <div x-show="page === 14" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                At kapag pagsasama-samahin pa natin ang iba pang pantig na ating natalakay sa mga naunang sesyon kasama ang pantig na /ta/ sa unahan ay makakabuo tayo ng mga salita.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 15 ===== --}}
    <div x-show="page === 15" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-2xl font-semibold !text-gray-200">
                Halimbawa:
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center overflow-y-auto">
            <div class="grid grid-cols-2 gap-8 text-5xl font-bold">
                @foreach ([
                    'ta+o = tao',
                    'ta+bo = tabo',
                    'ta+sa = tasa',
                    'ta+ma = tama'
                ] as $example)
                    <p class="text-center">{{ $example }}</p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 16 ===== --}}
    <div x-show="page === 16" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-2xl font-semibold !text-gray-200">
                Subukan mo ngang basahin ang mga pantig para mabuo mo ang salita.
            </p>
        </header>

        <div class="flex-1 flex flex-col justify-center gap-6 overflow-y-auto p-5">
            @foreach ([
                'Ma ta ba = ______________',
                'ma u u bos = __________________',
                'Bu tas = ____________',
                'bom ba = ____________________',
                'Ta os = ______________',
                'su bo = __________________'
            ] as $exercise)
                <p class="text-3xl font-bold">{{ $exercise }}</p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 17 ===== --}}
    <div x-show="page === 17" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Alam mo ba? Hindi lang /ta/ ang pantig na mabubuo natin kapag isinama natin ang tunog /t/ sa iba pang patinig na atin ng napag-aralan. Aralin natin.
            </p>
            <p class="text-xl !text-gray-300 mt-4">
                Kapag pinagsama ang tunog na /t/ sa tunog na /e/ ay mabubuo natin ang pantig na /te/.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 18 ===== --}}
    <div x-show="page === 18" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Magbigay tayo ngayo ng mga salitang mabubuo natin kapag ang pantig na /te/ ay hinalo natin sa iba pang pantig.
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-2 gap-8 text-5xl font-bold">
                @foreach ([
                    'Te+la = tela',
                    'a+te = ate',
                    'te+ma = tema',
                    'te+ka = teka'
                ] as $example)
                    <p>{{ $example }}</p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 19 ===== --}}
    <div x-show="page === 19" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Paano naman kapag pinagsama ang tunog na /t/ sa tunog na /i/?
            </p>
        </header>

        <div class="flex-1 flex flex-col items-center justify-center gap-6">
            <p class="text-6xl font-bold">
                <span class="!text-[#F4C300]">t</span> + <span class="!text-[#F4C300]">i</span> = <span class="text-7xl">ti</span>
            </p>
        </div>
    </div>

    {{-- ===== PAGE 20 ===== --}}
    <div x-show="page === 20" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Subukan nating makabuo ng salita gamit ang mga pantig na ti at iba pang mga pantig.
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-2 gap-8 text-5xl font-bold">
                @foreach ([
                    'Ti+la = tila',
                    'ba+ti = bati',
                    'ti+ta = tita',
                    'bu+ti = buti'
                ] as $example)
                    <p>{{ $example }}</p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 21 ===== --}}
    <div x-show="page === 21" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                /to/ naman ang pantig na mabubuo kapag pinagsama natin ang /t/ at /o/.
            </p>
            <p class="text-xl !text-gray-300 mt-4">
                Narito ang mga halimbawa ng mga salita na ginamit ang pantig na /to/ at iba pang pantig.
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-2 gap-8 text-5xl font-bold">
                @foreach ([
                    'o+to = oto',
                    'bo+to = boto',
                    'ka+to+to = katoto',
                    'to+to+o = totoo'
                ] as $example)
                    <p>{{ $example }}</p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 22 ===== --}}
    <div x-show="page === 22" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                /tu/- Ito ang pantig na mabubuo sa pinagsamang /t/ at /u/.
            </p>
            <p class="text-xl !text-gray-300 mt-4">
                Isama natin ito sa iba pang pantig. Ano-ano kayang mga salita ang ating mabubuo?
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-2 gap-8 text-5xl font-bold">
                @foreach ([
                    'Tu+ta = tuta',
                    'tu+ka = tuka',
                    'ka+tu+tu+bo = katutubo',
                    'tu+ba = tuba'
                ] as $example)
                    <p>{{ $example }}</p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 23 ===== --}}
    <div x-show="page === 23" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Ang pantig na /ka/ ay pinagsamang tunog ng mga letrang Kk at Aa.
            </p>
        </header>

        <div class="flex-1 flex flex-col items-center justify-center gap-6">
            <p class="text-6xl font-bold">
                <span class="!text-[#F4C300]">K</span> + <span class="!text-[#F4C300]">a</span> = <span class="text-7xl">ka</span>
            </p>
        </div>
    </div>

    {{-- ===== PAGE 24 ===== --}}
    <div x-show="page === 24" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Ano-ano kaya ang mga salitang mabubuo natin kapag pinagsama natin ang pantig na /ka/ sa iba pang pantig na ating natalakay na?
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-2 gap-8 text-5xl font-bold">
                @foreach ([
                    'Ka+ba = kaba',
                    'ka+ma = kama',
                    'ka+si = kasi',
                    'ka+ka+i+ba = kakaiba'
                ] as $example)
                    <p>{{ $example }}</p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 25 ===== --}}
    <div x-show="page === 25" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-2xl font-semibold !text-gray-200">
                Subukan mong basahin ang mga pantig upang makabuo ka ng mga salita.
            </p>
        </header>

        <div class="flex-1 flex flex-col justify-center gap-6 overflow-y-auto p-5">
            @foreach ([
                'i ba = ___________',
                'ma ka ka sa ma = ___________________',
                'ba ka = __________',
                'ka ba ba ta = ______________',
                'ka ta ka ta ka = _______________',
                'ka so = _________'
            ] as $exercise)
                <p class="text-3xl font-bold">{{ $exercise }}</p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 26 ===== --}}
    <div x-show="page === 26" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Kapag isinama natin ang tunog na /k/ sa iba pang patinig ay ganito ang mangyayari.
            </p>
        </header>

        <div class="flex-1 flex flex-col items-center justify-center gap-8">
            <div class="text-5xl font-bold space-y-4">
                <p>K+e = ke</p>
                <p>k+i = ki</p>
                <p>k+o = ko</p>
                <p>k+u = ku</p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 27 ===== --}}
    <div x-show="page === 27" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center gap-10">
            @foreach (['Ke', 'Ki', 'Ko', 'Ku'] as $syllable)
                <p class="text-8xl font-bold cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform">
                    {{ $syllable }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 28 ===== --}}
    <div x-show="page === 28" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Kapag ibinaligtad natin ay ganito naman ang kalalabasan:
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center gap-10">
            @foreach (['Ek', 'Ik', 'Ok', 'Uk'] as $syllable)
                <p class="text-8xl font-bold cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform">
                    {{ $syllable }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 29 ===== --}}
    <div x-show="page === 29" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Paghahalu-haluin natin para mataya natin ang iyong kaalaman.
            </p>
            <p class="text-xl !text-gray-300 mt-4">
                Basahin mo ang sumusunod:
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center gap-10">
            @foreach (['ku', 'ki', 'ke', 'ko'] as $syllable)
                <p class="text-8xl font-bold cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform">
                    {{ $syllable }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 30 ===== --}}
    <div x-show="page === 30" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Kapag pinagsama-sama natin ang mga ito sa iba pang pantig, ano-ano ang mga salitang mabubuo natin.
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-3 gap-6 text-4xl font-bold">
                @foreach ([
                    'Ku+to = kuto',
                    'ma+ka+ti = makati',
                    'ma+ki+ba+ka = makibaka',
                    'ke+so = keso',
                    'kem+bot = kembot'
                ] as $example)
                    <p>{{ $example }}</p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 31 ===== --}}
    <div x-show="page === 31" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-2xl font-semibold !text-gray-200">
                Basahin mo ang sumusunod na salita:
            </p>
        </header>

        <div class="flex-1 grid grid-cols-3 gap-6 text-4xl font-bold text-center overflow-y-auto p-5">
            @foreach ([
                'Makikita', 'kusa', 'bulsa',
                'Bakit', 'sumakit', 'kabute',
                'Takam', 'bantas', 'tumakas'
            ] as $word)
                <p class="cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform">
                    {{ $word }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 32 ===== --}}
    <div x-show="page === 32" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                /la/- ito naman ang pantig na mabubuo kapag pinagsama ang tunog ng Ll at Aa. Tunog /l/ at /a/ ay /la/
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-2 gap-8 text-5xl font-bold">
                @foreach ([
                    'la+so = laso',
                    'la+kas = lakas',
                    'si+la',
                    'la+me+sa = lamesa'
                ] as $example)
                    <p>{{ $example }}</p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 33 ===== --}}
    <div x-show="page === 33" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Tunog /l/ at /e/ = le
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-3 gap-8 text-5xl font-bold">
                @foreach ([
                    'Le+o = Leo',
                    'a+le = ale',
                    'ka+le+sa = kalesa'
                ] as $example)
                    <p>{{ $example }}</p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 34 ===== --}}
    <div x-show="page === 34" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Tunog /l/ at /i/ = li
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-3 gap-8 text-5xl font-bold">
                @foreach ([
                    'li+ma = lima',
                    'li+sa = lisa',
                    'a+li+la = alila'
                ] as $example)
                    <p>{{ $example }}</p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 35 ===== --}}
    <div x-show="page === 35" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Tunog /l/ at /o/ = lo
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-3 gap-8 text-5xl font-bold">
                @foreach ([
                    'lo+lo = lolo',
                    'bo+lo = bolo',
                    'lo+bo = lobo'
                ] as $example)
                    <p>{{ $example }}</p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 36 ===== --}}
    <div x-show="page === 36" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Tunog /l/ at /u/ = lu
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-3 gap-8 text-5xl font-bold">
                @foreach ([
                    'lu+ma = luma',
                    'lu+to = luto',
                    'lu+pa = lupa'
                    ] as $example)
                    <p>{{ $example }}</p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 37 ===== --}}
    <div x-show="page === 37" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-2xl font-semibold !text-gray-200">
                Basahin ang sumusunod na salita.
            </p>
        </header>

        <div class="flex-1 flex flex-col justify-center gap-6 overflow-y-auto p-5">
            @foreach ([
                'Ku lam bo ___________',
                'sa li ta ____________',
                'ma lu lu ma _______________',
                'Ba li ta ____________',
                'ka le sa ____________',
                'ma si si lo _________________'
            ] as $exercise)
                <p class="text-3xl font-bold">{{ $exercise }}</p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 38 ===== --}}
    <div x-show="page === 38" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Pantig na /na/. Ito ang nabubuo kapag pinagsama ang tunog na /n/ at /a/.
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-3 gap-8 text-5xl font-bold">
                @foreach ([
                    'na+ba+sa = nabasa',
                    'na+ki+ta = nakita',
                    'na+tum+ba = natumba'
                ] as $example)
                    <p>{{ $example }}</p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 39 ===== --}}
    <div x-show="page === 39" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                /n/ + /e/ = ne
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-3 gap-8 text-5xl font-bold">
                @foreach ([
                    'Ne=ne = Nene',
                    'Ne+mo = Nemo',
                    'Ne+na = Nena'
                ] as $example)
                    <p>{{ $example }}</p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 40 ===== --}}
    <div x-show="page === 40" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                /n/ + /i/ = ni
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-3 gap-8 text-5xl font-bold">
                @foreach ([
                    'ni+la = nila',
                    'Ka+ni+na = kanina',
                    'ma+ni = mani'
                ] as $example)
                    <p>{{ $example }}</p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 41 ===== --}}
    <div x-show="page === 41" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                /n/ + /o/ = no
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-3 gap-8 text-5xl font-bold">
                @foreach ([
                    'no+o = noo',
                    'ta+li+no = talino',
                    'a+ni+no'
                ] as $example)
                    <p>{{ $example }}</p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 42 ===== --}}
    <div x-show="page === 42" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                /n/ + /u/ = nu
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-3 gap-8 text-5xl font-bold">
                @foreach ([
                    'nu+no = nuno',
                    'nu+nal = nunal',
                    'nu+nu+kal = nunukal'
                ] as $example)
                    <p>{{ $example }}</p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 43 ===== --}}
    <div x-show="page === 43" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-2xl font-semibold !text-gray-200">
                Basahin ang mga salitang nabuo gamit ang mga panting na /na/, /ne/, /ni/, /no/ at /nu/ at ang mga pantig na napag-aralan mo na.
            </p>
        </header>

        <div class="flex-1 flex flex-col justify-center gap-6 overflow-y-auto p-5">
            @foreach ([
                'Ma ta li no_______________',
                'si ni ko ______________',
                'Na na lo _______________',
                'ma nu nu lak ________________',
                'Ti nu bu an ________________',
                'ma ni ka ___________________'
            ] as $exercise)
                <p class="text-3xl font-bold">{{ $exercise }}</p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 44 ===== --}}
    <div x-show="page === 44" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                /ya/- pinagsamang tunog na /y/ at /a/ ay ya
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-3 gap-8 text-5xl font-bold">
                @foreach ([
                    'ya+ya',
                    'ka+ya = kaya',
                    'sa+ya = saya'
                ] as $example)
                    <p>{{ $example }}</p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 45 ===== --}}
    <div x-show="page === 45" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                /ye/
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-3 gap-8 text-5xl font-bold">
                @foreach ([
                    'ye+so = yeso',
                    'ye+lo = yelo',
                    'ye+ma = yema'
                ] as $example)
                    <p>{{ $example }}</p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 46 ===== --}}
    <div x-show="page === 46" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                /yi/
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-3 gap-8 text-5xl font-bold">
                @foreach ([
                    'bay+ba+yin = baybayin',
                    'sa+na+yin = sanayin',
                    'bu+la+yin = bulayin'
                ] as $example)
                    <p>{{ $example }}</p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 47 ===== --}}
    <div x-show="page === 47" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                /yo/
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-3 gap-8 text-5xl font-bold">
                @foreach ([
                    'yo+yo = yoyo',
                    'ka+ba+yo = kabayo',
                    'i+ba+yo = ibayo'
                ] as $example)
                    <p>{{ $example }}</p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 48 ===== --}}
    <div x-show="page === 48" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                /yu/
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-3 gap-8 text-5xl font-bold">
                @foreach ([
                    'yu+ko = yuko',
                    'an+yu+an = anyuan',
                    'ma+yu+mi = mayumi'
                ] as $example)
                    <p>{{ $example }}</p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 49 ===== --}}
    <div x-show="page === 49" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-2xl font-semibold !text-gray-200">
                Basahin ang sumusunod na pantig upang mabuo ang salita:
            </p>
        </header>

        <div class="flex-1 flex flex-col justify-center gap-6 overflow-y-auto p-5">
            @foreach ([
                'Ma yu mi ___________',
                'bay ba yin ______________',
                'tu yo ___________',
                'Ma sa sa ya ____________',
                'yu yu ko ______________',
                'ye ma ___________',
                'Sa sa na yin ____________',
                'ma ya ya man ________________'
            ] as $exercise)
                <p class="text-3xl font-bold">{{ $exercise }}</p>
            @endforeach
        </div>
    </div>

    {{-- Navigation Buttons --}}
    @include('partials.lesson-navigation')
</div>