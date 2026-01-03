{{-- ===== LESSON 13: KAMBAL-KATINIG ===== --}}

<div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg">
    {{-- ===== PAGE 1 ===== --}}
    <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="!text-xl sm:!text-2xl md:!text-3xl lg:!text-4xl font-bold">
                <span class="!text-[#F4C300]">Sesyon 13:</span>
                Kambal-Katinig
            </h1>
            <p class="!text-base sm:!text-lg md:!text-xl lg:!text-2xl font-semibold !text-gray-200">
                Tunghayan na natin ang aralin tungkol sa kambal katinig.
            </p>
        </header>

        <div class="flex-1 grid grid-cols-3 gap-6 !text-2xl sm:!text-3xl md:!text-3xl lg:!text-4xl font-bold text-center overflow-y-auto p-5">
            @foreach ([
                'braso', 'prasko', 'plato',
                'grabe', 'gripo', 'presko',
                'prito', 'trabaho', 'blusa',
                'tren', 'eroplano', 'plaka'
            ] as $word)
                <p class="cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform">
                    {{ $word }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 2 ===== --}}
    <div x-show="page === 2" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="!text-base sm:!text-lg md:!text-xl lg:!text-2xl font-semibold !text-gray-200">
                Ang mga magkasunod na letrang ito ang tinatawag na kambal-katinig:
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-4 gap-10 !text-3xl sm:!text-4xl md:!text-5xl lg:!text-6xl font-bold">
                @foreach (['br', 'dr', 'pl', 'gr', 'pr', 'bl', 'tr'] as $cluster)
                    <p class="text-center cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform">
                        {{ $cluster }}
                    </p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Navigation Buttons --}}
    @include('partials.lesson-navigation')
</div>