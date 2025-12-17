{{-- ===== LESSON 16: PAG-UNAWA SA BINASANG TULA ===== --}}

<div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg">
    {{-- ===== PAGE 1 ===== --}}
    <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold">
                <span class="!text-[#F4C300]">Sesyon 16:</span>
                Pag-unawa sa Binasang Tula
            </h1>
            <p class="text-2xl font-semibold !text-gray-200">
                Subukan mong basahin ang nasa ibaba.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 2 ===== --}}
    <div x-show="page === 2" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex flex-col items-center justify-center gap-8 p-8">
            <div class="bg-gray-800/50 p-8 rounded-lg border-2 border-[#F4C300] w-full max-w-3xl">
                <h2 class="text-3xl font-bold !text-[#F4C300] text-center mb-6">Lugud ning Indu</h2>
                <p class="text-xl text-center mb-6">Jay-R C. Guinto</p>
                
                <div class="text-2xl leading-loose text-center space-y-2">
                    <p>Ika, O kakung Indu,</p>
                    <p>Megkandili't tinuru,</p>
                    <p>Andyang masyas ku bungu,</p>
                    <p>Lagi mung tuturu,</p>
                    <p>Na dapat kung abalu.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 3 ===== --}}
    <div x-show="page === 3" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Ang iyong binasa ay isang tula.
            </p>
            <h1 class="text-3xl font-bold !text-[#F4C300] mt-6">
                Ano ang tula?
            </h1>
        </header>
    </div>

    {{-- ===== PAGE 4 ===== --}}
    <div x-show="page === 4" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center p-8">
            <p class="text-2xl font-semibold leading-relaxed text-center max-w-4xl">
                Ang <span class="!text-[#F4C300]">TULA</span> ay isang anyo ng sining o panitikan na naglalayong maipahayag ang damdamin sa malayang pagsusulat. Binubuo ang tula ng <span class="!text-[#F4C300]">saknong</span> at <span class="!text-[#F4C300]">taludtod</span>.
            </p>
        </div>
    </div>

    {{-- ===== PAGE 5 ===== --}}
    <div x-show="page === 5" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Subukan nating isalin sa Filipino ang tulang Kapampangan na ito.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 6 ===== --}}
    <div x-show="page === 6" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex flex-col items-center justify-center gap-8 p-8">
            <div class="bg-gray-800/50 p-8 rounded-lg border-2 border-[#F4C300] w-full max-w-3xl">
                <h2 class="text-3xl font-bold !text-[#F4C300] text-center mb-6">Pag-ibig ng Ina</h2>
                <p class="text-xl text-center mb-6">Isinalin ni Elvie M. Dimatulac</p>
                
                <div class="text-2xl leading-loose text-center space-y-2">
                    <p>Ikaw, O ina ko,</p>
                    <p>Nagkandili't nagturo,</p>
                    <p>Matigas man ang aking bungo,</p>
                    <p>Lagi ka pa ring nagtuturo,</p>
                    <p>Sa mga dapat na mapagtanto.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 7 ===== --}}
    <div x-show="page === 7" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Para mas maunawaan ang tula, alamin muna natin ang kasingkahulugan ng sumusunod na salita. Basahin mo ang mga ito.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 8 ===== --}}
    <div x-show="page === 8" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-2 gap-8 text-3xl w-full max-w-4xl">
                @foreach ([
                    ['Pag-ibig', 'pagmamahal'],
                    ['Nagkandili', 'nag-alaga'],
                    ['Bungo', 'ulo'],
                    ['Mapagtanto', 'malaman']
                ] as $pair)
                    <div class="flex items-center gap-4">
                        <span class="font-bold !text-[#F4C300]">{{ $pair[0] }}</span>
                        <span>-</span>
                        <span>{{ $pair[1] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 9 ===== --}}
    <div x-show="page === 9" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Subukan mo ngang sagutin ang mga tanong.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 10 ===== --}}
    <div x-show="page === 10" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-2xl font-semibold !text-gray-200">
                Sagutin ang mga sumusunod:
            </p>
        </header>

        <div class="flex-1 flex flex-col justify-center gap-6 overflow-y-auto p-5">
            @foreach ([
                '1. Ano ang pamagat ng tula?',
                '2. Sino ang sumulat ng tula?',
                '3. Sa iyong palagay, sino ang nagsasalita sa tula?',
                '4. Sino ang kinakausap niya sa tula?',
                '5. Sino raw ang mataigas ang bungo?'
            ] as $question)
                <p class="text-2xl font-semibold">{{ $question }}</p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 11 ===== --}}
    <div x-show="page === 11" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Narito ang isang halimbawa ng tula. Hinango lamang ang dalawang saknong. Ang una at huling saknong lamang ng tulang pinamagatang "Sinag at Lakas". Subukan mong basahin.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 12 ===== --}}
    <div x-show="page === 12" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <div class="flex-1 flex flex-col items-center justify-center overflow-y-auto p-8">
            <div class="bg-gray-800/50 p-8 rounded-lg border-2 border-[#F4C300] w-full max-w-3xl">
                <h2 class="text-3xl font-bold !text-[#F4C300] text-center mb-6">Sinag at Lakas</h2>
                <p class="text-xl text-center mb-8">Elvie M. Dimatulac</p>
                
                <div class="space-y-8">
                    <div class="text-xl leading-loose">
                        <p>Isang maningning na ilaw, sa buhay ko'y tumatanglaw</p>
                        <p>Mula pa noong mga araw na ang isipa'y isang ampaw!</p>
                        <p>Sa aking kamusmusan ako'y di pinabayaan,</p>
                        <p>Siya na maningning kong ilaw, pagkalinga'y di pumanaw.</p>
                    </div>

                    <div class="text-xl leading-loose">
                        <p>Sa mundong ibabaw tunay ngang tayo ay singaw lang</p>
                        <p>Pagkat darating ang araw, sa ayaw at sa gusto man,</p>
                        <p>Magpapahinga ang nanay, alaala'y maiiwan</p>
                        <p>Sinag sa karimlan, siya namang lakas sa maiiwan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Navigation Buttons --}}
    @include('partials.lesson-navigation')
</div>