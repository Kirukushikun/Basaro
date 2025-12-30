{{-- ===== LESSON 17: PAG-UNAWA SA BINASANG MAIKLING KUWENTO ===== --}}

<div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg">

    {{-- ===== PAGE 1: TITLE ===== --}}
    <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center">
            <h1 class="text-4xl font-bold text-center">
                <span class="!text-[#F4C300]">Sesyon 17:</span><br>
                Pag-unawa sa Binasang Maikling Kuwento
            </h1>
        </div>
    </div>

    {{-- ===== PAGE 2 ===== --}}
    <div x-show="page === 2" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h2 class="text-3xl font-bold !text-[#F4C300] text-center">Unang Araw ng Klase</h2>
            <p class="text-xl text-center">Elvie M. Dimatulac</p>
        </header>

        <div class="flex-1 overflow-y-auto p-5">
            <div class="text-xl leading-relaxed space-y-4">
                <p>
                    Tututut! Tututut! Pagtunog ng alarm clock ay dahan-dahang bumangon ng higaan si Ken. Inayos niya ang kaniyang pinaghigaan at dumiretso sa lababo ng kusina. Nasalubong niya ang kaniyang kuya Kyel. "Magandang umaga, kuya," ang masayang pagbati niya.
                </p>
                <p>
                    "Aba! Mukhang excited kang pumasok, Ken. Milagro ay nagising ka nang maaga." Nangingiting pangangantiyaw ni Kyel sa bunso niyang kapatid.
                </p>
                <p>
                    "Syempre kuya, unang araw ng klase ngayon kaya dapat hindi tayo mahuli sa pagpasok." Naulinigan ng kanilang ina ang kanilang usapan kung kaya't tinawag na sila upang makakain.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 3 ===== --}}
    <div x-show="page === 3" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold !text-[#F4C300]">
                Sagutin ang talasalitaan:
            </h1>
            <p class="text-2xl font-semibold !text-gray-200">
                Hanapin ang kasingkahulugan ng sumusunod na salita.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 4 ===== --}}
    <div x-show="page === 4" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center">
            <div class="space-y-8 text-3xl w-full max-w-3xl">
                @foreach ([
                    ['Bumangon', 'tumayo'],
                    ['Pangangantiyaw', 'panunukso'],
                    ['Naulinigan', 'narinig']
                ] as $pair)
                    <div class="flex items-center gap-6">
                        <span class="font-bold !text-[#F4C300]">{{ $pair[0] }}</span>
                        <span>–</span>
                        <span>{{ $pair[1] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 5 ===== --}}
    <div x-show="page === 5" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Sagutin mo ang mga tanong:
            </p>
        </header>
    </div>

    {{-- ===== PAGE 6 ===== --}}
    <div x-show="page === 6" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-xl font-semibold !text-gray-200">
                1. Sino ang dahan-dahang bumangon ng higaan?
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-3 gap-6 text-3xl font-bold">
                @foreach (['A. Kyel', 'B. Ken', 'C. kuya'] as $choice)
                    <p class="cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform text-center">
                        {{ $choice }}
                    </p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 7 ===== --}}
    <div x-show="page === 7" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-xl font-semibold !text-gray-200">
                2. Ano ang kaniyang unang ginawa bago dumiretso sa lababo ng kusina?
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-3 gap-6 text-2xl font-bold">
                @foreach (['A. umiyak sa kuwarto', 'B. Ngumiti na lang', 'C. nag-ayos ng higaan'] as $choice)
                    <p class="cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform text-center">
                        {{ $choice }}
                    </p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 8 ===== --}}
    <div x-show="page === 8" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-xl font-semibold !text-gray-200">
                3. Sino ang kaniyang nakasalubong?
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-3 gap-6 text-3xl font-bold">
                @foreach (['A. si kuya Kyel', 'B. si nanay', 'C. si tatay'] as $choice)
                    <p class="cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform text-center">
                        {{ $choice }}
                    </p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 9 ===== --}}
    <div x-show="page === 9" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-xl font-semibold !text-gray-200">
                4. Bakit bumangon nang maaga ang pangunahing tauhan sa kuwento?
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-3 gap-6 text-2xl font-bold">
                @foreach (['A. para kumain', 'B. dahil ayaw niyang mahuli sa pagpasok sa paaralan', 'C. dahil tinawag na sila ng kanilang nanay'] as $choice)
                    <p class="cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform text-center">
                        {{ $choice }}
                    </p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 10 ===== --}}
    <div x-show="page === 10" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-xl font-semibold !text-gray-200">
                5. Bakit sila tinawag ng kanilang ina?
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-3 gap-6 text-3xl font-bold">
                @foreach (['A. Para bumiyahe', 'B. Para maligo', 'C. para kumain'] as $choice)
                    <p class="cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform text-center">
                        {{ $choice }}
                    </p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 11 ===== --}}
    <div x-show="page === 11" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Tunghayan natin ang isa pang kuwento.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 12 ===== --}}
    <div x-show="page === 12" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h2 class="text-3xl font-bold !text-[#F4C300] text-center">Panalangin</h2>
            <p class="text-xl text-center">Elvie M. Dimatulac</p>
        </header>

        <div class="flex-1 overflow-y-auto p-5">
            <div class="text-xl leading-relaxed space-y-4">
                <p>
                    Pagkagising sa umaga, umusal muna ng panalangin si Toto bago niya inayos ang kaniyang higaan. "Salamat po Panginoon sa isang magandang araw na muli Mo pong ipinagkaloob sa akin at sa aking pamilya", ito ang naging pasasalamat ni Toto sa Diyos sa kaniyang munting panalangin.
                </p>
                <p>
                    Dumiretso siya sa batalan upang maghilamos ng mukha at magsipilyo ng ngipin. "Magandang umaga po itay, inay." Isang pagbati sa kaniyang mga magulang nang masalubong niya sa batalan pagkatapos niyang makapaghilamos at magsipilyo.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 13 ===== --}}
    <div x-show="page === 13" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <div class="flex-1 overflow-y-auto p-5">
            <div class="text-xl leading-relaxed space-y-4">
                <p>
                    Bagama't mahirap ang kalagayan sa buhay ay masaya ang mag-anak. Nagtatanim sila ng mga gulay at prutas na ibinebenta nila sa palengke.
                </p>
                <p>
                    "Toto, halika at nang makakain ka na, anak." Niyaya siya ng kaniyang ina upang mag-almusal. "Opo inay, inaayos ko lang po ang mga dadalhin natin sa palengke," sagot naman ni Toto.
                </p>
                <p>
                    Bago kumain ay sama-samang nanalangin muna ang mag-anak. Naniniwala sila na ang panalangin ay mabisang pakikipag-ugnayan sa Diyos.
                </p>
                <p>
                    Hindi na nakapagtataka kung bakit muli silang nanalangin bago umalis ng bahay patungong palengke upang ibenta ang kanilang mga inaning prutas at gulay kaninang madaling araw.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 14 ===== --}}
    <div x-show="page === 14" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex flex-col items-center justify-center gap-8">
            <p class="text-3xl font-bold !text-[#F4C300]">
                Nagustuhan mo ba ang kuwento?
            </p>
            <p class="text-3xl font-bold !text-[#F4C300]">
                Naunawaan mo ba?
            </p>
        </div>
    </div>

    {{-- ===== PAGE 15 ===== --}}
    <div x-show="page === 15" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex flex-col items-center justify-center gap-10">
            <p class="text-3xl font-semibold text-center">
                Ikaw, nananalangin ka rin ba sa Panginoon?
            </p>
            <p class="text-3xl font-semibold text-center">
                Bakit kailangang manalangin sa Diyos?
            </p>
        </div>
    </div>

    {{-- Navigation Buttons --}}
    @include('partials.lesson-navigation')
</div>