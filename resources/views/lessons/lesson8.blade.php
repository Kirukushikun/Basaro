<div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg">
    {{-- ===== PAGE 1 ===== --}}
    <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold">
                <span class="!text-[#F4C300]">Sesyon 8:</span>
                Pang-unawa sa Binasang Talata
            </h1>
            <p class="text-2xl font-semibold !text-gray-200">
                Subukan nating magbasa ng isang talata upang mahasa ang iyong kasanayan at maunawaan ang iyong binabasa.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 2 ===== --}}
    <div x-show="page === 2" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold !text-[#F4C300]">
                Alam mo ba kung ano ang talata?
            </h1>
            <p class="text-2xl font-semibold !text-gray-200 mt-4">
                Ito ay binubuo ng mga magkakaugnay na pangungusap. Dahil dito ay nakakabuo tayo ng isang kuwento.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 3 ===== --}}
    <div x-show="page === 3" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Narito ang isang halimbawa:
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center p-8">
            <div class="bg-gray-800/50 p-8 rounded-lg border-2 border-[#F4C300]">
                <p class="text-3xl font-semibold leading-relaxed text-center">
                    May lobo sa loob ng kotse. Kay Bambi ang asul na lobo. Masaya siya sa lobo niya.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 4 ===== --}}
    <div x-show="page === 4" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Ang unang pangungusap ay
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <p class="text-4xl font-bold !text-[#F4C300]">
                "May lobo sa loob ng kotse"
            </p>
        </div>
    </div>

    {{-- ===== PAGE 5 ===== --}}
    <div x-show="page === 5" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Ikalawa ay
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <p class="text-4xl font-bold !text-[#F4C300]">
                "Kay Bambi ang asul na lobo"
            </p>
        </div>
    </div>

    {{-- ===== PAGE 6 ===== --}}
    <div x-show="page === 6" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Panghuli ay
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <p class="text-4xl font-bold !text-[#F4C300]">
                "Masaya siya sa lobo niya"
            </p>
        </div>
    </div>

    {{-- ===== PAGE 7 ===== --}}
    <div x-show="page === 7" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold !text-[#F4C300]">
                Ilan ang pangungusap na bumbuo sa talatang ito?
            </h1>
            <p class="text-2xl font-semibold !text-gray-200 mt-4">
                Sagutin mo nga.
            </p>
            <p class="text-xl !text-gray-300 mt-2">
                Pindutin mo ang microphone button at sabihin ang iyong sagot.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 8 ===== --}}
    <div x-show="page === 8" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center">
            <div class="text-center">
                <p class="text-2xl font-semibold !text-gray-200 mb-6">
                    Kung tatlo ang iyong sagot, ito ay
                </p>
                <p class="text-8xl font-bold !text-[#F4C300]">
                    TAMA
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 9 ===== --}}
    <div x-show="page === 9" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Para maunawaan mo ang talata, sagutin mo ang mga tanong.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 10 ===== --}}
    <div x-show="page === 10" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-2xl font-semibold !text-gray-200">
                Sagutin ang mga sumusunod na tanong:
            </p>
        </header>

        <div class="flex-1 flex flex-col justify-center gap-8 overflow-y-auto p-5">
            @foreach ([
                'Kanino ang lobo? ___________________',
                'Anong kulay ang lobo? ___________________',
                'Sino ang masaya? ___________________',
                'Nasaan ang lobo? ___________________'
            ] as $question)
                <p class="text-3xl font-bold">{{ $question }}</p>
            @endforeach
        </div>
    </div>

    {{-- Navigation Buttons --}}
    @include('partials.lesson-navigation')
</div>