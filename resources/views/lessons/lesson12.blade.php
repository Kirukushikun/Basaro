{{-- ===== LESSON 12: DIPTONGGO ===== --}}

<div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg">
    {{-- ===== PAGE 1 ===== --}}
    <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold">
                <span class="!text-[#F4C300]">Sesyon 12:</span>
                Diptonggo
            </h1>
            <p class="text-2xl font-semibold !text-gray-200">
                Ang pinagsamang patinig at malapatinig na w at y ay nakabubuo ng diptonggo. Diptonggo ang tawag sa mga titik na <span class="!text-[#F4C300]">ay</span>, <span class="!text-[#F4C300]">aw</span>, <span class="!text-[#F4C300]">iw</span>, <span class="!text-[#F4C300]">oy</span>, <span class="!text-[#F4C300]">uy</span> at <span class="!text-[#F4C300]">ey</span> sa isang pantig.
            </p>
        </header>

        <div class="flex-1 grid grid-cols-3 gap-6 text-4xl font-bold text-center overflow-y-auto p-5">
            @foreach ([
                'araw', 'natanaw', 'itinaboy',
                'aruy!', 'pabulyaw', 'bayaw',
                'ayaw', 'aliw', 'kaaway', 'kasoy'
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