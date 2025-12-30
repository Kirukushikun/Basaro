<div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg">
    {{-- ===== PAGE 1 ===== --}}
    <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold">
                <span class="!text-[#F4C300]">Sesyon 2:</span>
                Ang Mga Patinig
            </h1>
            <p class="text-2xl font-semibold !text-gray-200">
                Ang alpabetong filipino ay binubuo ng <span class="!text-[#F4C300]">28</span> letra, <span class="!text-[#F4C300]">5</span> sa mga ito ay tinatawag na patinig. Ang mga ito ay ang sumusunod:
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center gap-10">
            @foreach (['A', 'E', 'I', 'O', 'U'] as $patinig)
                <p class="text-8xl font-bold z-[2] cursor-pointer hover:scale-125 hover:!text-[#F4C300] transition-transform">{{ $patinig }}</p>
            @endforeach
        </div>
    </div>
    
    {{-- ===== PAGE 2 ===== --}}
    <div x-show="page === 2" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0 items-center justify-center">
        <header class="header flex-shrink-0">
            <h1 class="text-3xl font-bold">
                Natatandaan mo ba ang kanilang tunog?
            </h1>
        </header>
    </div>

    {{-- ===== PAGE 3 ===== --}}
    <div x-show="page === 3" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h1 class="text-3xl font-bold">
                Letrang
                <span class="!text-[#F4C300]">Aa</span>
            </h1>
        </header>
        
        <div class="grid grid-cols-3 gap-5 text-4xl font-bold text-center p-5 overflow-y-auto flex-1">
            @foreach ([
                'aso', 'araw', 'apoy', 'atis', 'ahas', 'abokado',
            ] as $patinig)
                <div class="z-[2] p-2 cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform capitalize">
                    <img 
                        src="{{ asset('illustrations/' . $patinig . '.png') }}" 
                        alt="{{ $patinig }}"
                        class="mx-auto mb-3 w-32 h-32 object-cover rounded-md"
                    >
                    <p>{{ $patinig }}</p>
                </div>
            @endforeach
        </div>

    </div>

    {{-- ===== PAGE 4 ===== --}}
    <div x-show="page === 4" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h1 class="text-3xl font-bold">
                Letrang
                <span class="!text-[#F4C300]">Aa</span>
            </h1>
            <p class="text-2xl font-semibold !text-gray-200">
                Ang mga salitang <b>a</b>so, <b>a</b>raw, <b>a</b>poy, <b>a</b>tis, <b>a</b>has at <b>a</b>bokado ay nagsisimula sa letrang <span class="!text-[#F4C300]">Aa</span> kung kaya naman ang naririnig mong unang tunog ay tunog /a/. 
            </p>
        </header>
        
        <div class="grid grid-cols-3 gap-5 text-4xl font-bold text-center p-5 overflow-y-auto flex-1">
            @foreach ([
                'aso', 'araw', 'apoy', 'atis', 'ahas', 'abokado',
            ] as $word)
                <div class="z-[2] p-2 cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform capitalize">
                    <img 
                        src="{{ asset('illustrations/' . $word . '.png') }}" 
                        alt="{{ $word }}"
                        class="mx-auto mb-3 w-32 h-32 object-cover rounded-md"
                    >
                    <p>{{ $word }}</p>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 5 ===== --}}
    <div x-show="page === 5" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Ano nga ba ang tunog ng letrang Aa?
            </p>
            <p class="text-xl !text-gray-300 mt-2">
                Basahin at bigkasin mo ang tunog ng letra.
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <p class="text-9xl font-bold !text-[#F4C300]">A</p>
        </div>
    </div>

    {{-- ===== PAGE 6 ===== --}}
    <div x-show="page === 6" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h1 class="text-3xl font-bold">
                Letrang
                <span class="!text-[#F4C300]">Ee</span>
            </h1>
        </header>
        
        <div class="grid grid-cols-3 gap-5 text-4xl font-bold text-center p-5 overflow-y-auto flex-1">
            @foreach ([
                'elesi', 'elepante', 'ekis', 'espada', 'eroplano',
            ] as $word)
                <div class="z-[2] p-2 cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform capitalize">
                    <img 
                        src="{{ asset('illustrations/' . $word . '.png') }}" 
                        alt="{{ $word }}"
                        class="mx-auto mb-3 w-32 h-32 object-cover rounded-md"
                    >
                    <p>{{ $word }}</p>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 7 ===== --}}
    <div x-show="page === 7" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h1 class="text-3xl font-bold">
                Letrang
                <span class="!text-[#F4C300]">Ee</span>
            </h1>
            <p class="text-2xl font-semibold !text-gray-200">
                Ang mga salitang tulad ng <b>e</b>lisi, <b>e</b>lepante, <b>e</b>kis, <b>e</b>spada at <b>e</b>roplano ay nagsisimula sa letrang <span class="!text-[#F4C300]">Ee</span>. Hindi nakapagtataka kung bakit ang naririnig mong unang tunog ng mga ito ay tunog /e/.
            </p>
        </header>
        
        <div class="grid grid-cols-3 gap-5 text-4xl font-bold text-center p-5 overflow-y-auto flex-1">
            @foreach ([
                'elesi', 'elepante', 'ekis', 'espada', 'eroplano',
            ] as $word)
                <div class="z-[2] p-2 cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform capitalize">
                    <img 
                        src="{{ asset('illustrations/' . $word . '.png') }}" 
                        alt="{{ $word }}"
                        class="mx-auto mb-3 w-32 h-32 object-cover rounded-md"
                    >
                    <p>{{ $word }}</p>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 8 ===== --}}
    <div x-show="page === 8" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Ano nga ba ang tunog ng letrang Ee?
            </p>
            <p class="text-xl !text-gray-300 mt-2">
                Basahin at bigkasin mo ang tunog ng letra.
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <p class="text-9xl font-bold !text-[#F4C300]">E</p>
        </div>
    </div>

    {{-- ===== PAGE 9 ===== --}}
    <div x-show="page === 9" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h1 class="text-3xl font-bold">
                Letrang
                <span class="!text-[#F4C300]">Ii</span>
            </h1>
        </header>
        
        <div class="grid grid-cols-3 gap-5 text-4xl font-bold text-center p-5 overflow-y-auto flex-1">
            @foreach ([
                'ibon', 'isda', 'itlog', 'ilaw', 'ilong',
            ] as $word)
                <div class="z-[2] p-2 cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform capitalize">
                    <img 
                        src="{{ asset('illustrations/' . $word . '.png') }}" 
                        alt="{{ $word }}"
                        class="mx-auto mb-3 w-32 h-32 object-cover rounded-md"
                    >
                    <p>{{ $word }}</p>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 10 ===== --}}
    <div x-show="page === 10" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h1 class="text-3xl font-bold">
                Letrang
                <span class="!text-[#F4C300]">Ii</span>
            </h1>
            <p class="text-2xl font-semibold !text-gray-200">
                Nagsisimula sa letrang <span class="!text-[#F4C300]">Ii</span> ang mga salitang <b>i</b>bon, <b>i</b>sda, <b>i</b>tlog, <b>i</b>law at <b>i</b>long kung kaya naman ang naririnig nating unang tunog ng mga salitang ito ay tunog /i/.
            </p>
        </header>
        
        <div class="grid grid-cols-3 gap-5 text-4xl font-bold text-center p-5 overflow-y-auto flex-1">
            @foreach ([
                'ibon', 'isda', 'itlog', 'ilaw', 'ilong',
            ] as $word)
                <div class="z-[2] p-2 cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform capitalize">
                    <img 
                        src="{{ asset('illustrations/' . $word . '.png') }}" 
                        alt="{{ $word }}"
                        class="mx-auto mb-3 w-32 h-32 object-cover rounded-md"
                    >
                    <p>{{ $word }}</p>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 11 ===== --}}
    <div x-show="page === 11" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Ano nga ba ang tunog ng letrang Ii?
            </p>
            <p class="text-xl !text-gray-300 mt-2">
                Basahin at bigkasin mo ang tunog ng letra.
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <p class="text-9xl font-bold !text-[#F4C300]">I</p>
        </div>
    </div>

    {{-- ===== PAGE 12 ===== --}}
    <div x-show="page === 12" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h1 class="text-3xl font-bold">
                Letrang
                <span class="!text-[#F4C300]">Oo</span>
            </h1>
        </header>
        
        <div class="grid grid-cols-3 gap-5 text-4xl font-bold text-center p-5 overflow-y-auto flex-1">
            @foreach ([
                'oso', 'okra', 'orasan', 'ospital', 'oregano',
            ] as $word)
                <div class="z-[2] p-2 cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform capitalize">
                    <img 
                        src="{{ asset('illustrations/' . $word . '.png') }}" 
                        alt="{{ $word }}"
                        class="mx-auto mb-3 w-32 h-32 object-cover rounded-md"
                    >
                    <p>{{ $word }}</p>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 13 ===== --}}
    <div x-show="page === 13" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h1 class="text-3xl font-bold">
                Letrang
                <span class="!text-[#F4C300]">Oo</span>
            </h1>
            <p class="text-2xl font-semibold !text-gray-200">
                Ang mga binasa nating salita kanina na <b>o</b>so, <b>o</b>kra, <b>o</b>rasan, <b>o</b>spital at <b>o</b>regano ay pawang nagsisimula sa letrang <span class="!text-[#F4C300]">Oo</span>. Ang unang tunog ng mga salitang ito ay tunog /o/.
            </p>
        </header>
        
        <div class="grid grid-cols-3 gap-5 text-4xl font-bold text-center p-5 overflow-y-auto flex-1">
            @foreach ([
                'oso', 'okra', 'orasan', 'ospital', 'oregano',
            ] as $word)
                <div class="z-[2] p-2 cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform capitalize">
                    <img 
                        src="{{ asset('illustrations/' . $word . '.png') }}" 
                        alt="{{ $word }}"
                        class="mx-auto mb-3 w-32 h-32 object-cover rounded-md"
                    >
                    <p>{{ $word }}</p>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 14 ===== --}}
    <div x-show="page === 14" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Ano nga ba ang tunog ng letrang Oo?
            </p>
            <p class="text-xl !text-gray-300 mt-2">
                Basahin at bigkasin mo ang tunog ng letra.
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <p class="text-9xl font-bold !text-[#F4C300]">O</p>
        </div>
    </div>

    {{-- ===== PAGE 15 ===== --}}
    <div x-show="page === 15" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h1 class="text-3xl font-bold">
                Letrang
                <span class="!text-[#F4C300]">Uu</span>
            </h1>
        </header>
        
        <div class="grid grid-cols-3 gap-5 text-4xl font-bold text-center p-5 overflow-y-auto flex-1">
            @foreach ([
                'ubas', 'unan', 'ulan', 'usa', 'ube',
            ] as $word)
                <div class="z-[2] p-2 cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform capitalize">
                    <img 
                        src="{{ asset('illustrations/' . $word . '.png') }}" 
                        alt="{{ $word }}"
                        class="mx-auto mb-3 w-32 h-32 object-cover rounded-md"
                    >
                    <p>{{ $word }}</p>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 16 ===== --}}
    <div x-show="page === 16" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h1 class="text-3xl font-bold">
                Letrang
                <span class="!text-[#F4C300]">Uu</span>
            </h1>
            <p class="text-2xl font-semibold !text-gray-200">
                Narinig natin ang tunog na /u/ sa mga salitang <b>u</b>bas, <b>u</b>nan, <b>u</b>lan, <b>u</b>sa at <b>u</b>be dahil ang mga salitang ito ay nagsisimula sa letrang <span class="!text-[#F4C300]">Uu</span>.
            </p>
        </header>
        
        <div class="grid grid-cols-3 gap-5 text-4xl font-bold text-center p-5 overflow-y-auto flex-1">
            @foreach ([
                'ubas', 'unan', 'ulan', 'usa', 'ube',
            ] as $word)
                <div class="z-[2] p-2 cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform capitalize">
                    <img 
                        src="{{ asset('illustrations/' . $word . '.png') }}" 
                        alt="{{ $word }}"
                        class="mx-auto mb-3 w-32 h-32 object-cover rounded-md"
                    >
                    <p>{{ $word }}</p>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 17 ===== --}}
    <div x-show="page === 17" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Ano nga ba ang tunog ng letrang Uu?
            </p>
            <p class="text-xl !text-gray-300 mt-2">
                Basahin at bigkasin mo ang tunog ng letra.
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <p class="text-9xl font-bold !text-[#F4C300]">U</p>
        </div>
    </div>

    {{-- ===== PAGE 18 ===== --}}
    <div x-show="page === 18" class="w-full flex-1 flex flex-col gap-6 px-2">
        <p class="text-2xl font-semibold !text-gray-200">
            Para sa iyong pagsasanay, tayo ng mag-Basaro! Magbasa at maglaro.
        </p>
    </div>

    {{-- Navigation Buttons --}}
    @include('partials.lesson-navigation')
</div>