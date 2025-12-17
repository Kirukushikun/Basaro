{{-- ===== LESSON 14: PANLAPI ===== --}}

<div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg">
    {{-- ===== PAGE 1 ===== --}}
    <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold">
                <span class="!text-[#F4C300]">Sesyon 14:</span>
                Panlapi
            </h1>
            <p class="text-2xl font-semibold !text-gray-200">
                Puntahan naman natin ang mga salitang may panlapi.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 2 ===== --}}
    <div x-show="page === 2" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Ang panlapi ay maaaring <span class="!text-[#F4C300]">unlapi</span> na matatagpuan sa unahan, <span class="!text-[#F4C300]">gitlapi</span> na matatagpuan sa gitna at <span class="!text-[#F4C300]">hulapi</span> kung matatagpuan sa hulihan ng salita.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 3 ===== --}}
    <div x-show="page === 3" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Halimbawa: <span class="!text-[#F4C300] text-4xl font-bold">matakaw</span>
            </p>
        </header>

        <div class="flex-1 flex flex-col items-center justify-center gap-8">
            <div class="text-3xl font-semibold text-center">
                <p>Unlaping <span class="!text-[#F4C300]">ma</span> + salitang-ugat na <span class="!text-[#F4C300]">takaw</span></p>
                <p class="text-5xl font-bold !text-[#F4C300] mt-4">= matakaw</p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 4 ===== --}}
    <div x-show="page === 4" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Isa pang halimbawa:
            </p>
        </header>

        <div class="flex-1 flex flex-col items-center justify-center gap-8">
            <div class="text-3xl font-semibold text-center">
                <p>Salitang ugat na <span class="!text-[#F4C300]">bato</span> + <span class="!text-[#F4C300]">hin</span></p>
                <p class="text-5xl font-bold !text-[#F4C300] mt-4">= batuhin</p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 5 ===== --}}
    <div x-show="page === 5" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-2xl font-semibold !text-gray-200">
                Mga halimbawa ng salitang may panlapi:
            </p>
        </header>

        <div class="flex-1 grid grid-cols-3 gap-6 text-3xl font-bold text-center overflow-y-auto p-5">
            @foreach ([
                'Ma + ganda',
                'Una + hin',
                'Bagu + hin',
                'Ma + bango',
                'Ma + taas',
                'Husga + han',
                'I + ba+hin',
                'I + sayaw',
                'Nag + pasyal',
                'Ma + sunod',
                'Ma + talino',
                'A + asa'
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