{{-- ===== LESSON 15: PANG-UNAWA SA BINASANG KARUNUNGANG BAYAN ===== --}}

<div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg">
    {{-- ===== PAGE 1 ===== --}}
    <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold">
                <span class="!text-[#F4C300]">Sesyon 15:</span>
                Pang-unawa sa Binasang Karunungang Bayan
            </h1>
            <p class="text-2xl font-semibold !text-gray-200">
                Ang Karunungang Bayan ay isang uri panitikan na nagpapahayag ng mga kaisipan, pangyayari, paniniwala, at tradisyon ng isang pangkat o lugar.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 2 ===== --}}
    <div x-show="page === 2" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Kabilang sa yaman ng karunungang bayan ng ating bansa ay ang mga <span class="!text-[#F4C300]">bugtong</span>, <span class="!text-[#F4C300]">salawikain</span>, <span class="!text-[#F4C300]">sawikain</span> at <span class="!text-[#F4C300]">kasabihan</span>.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 3: BUGTONG ===== --}}
    <div x-show="page === 3" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold !text-[#F4C300]">
                BUGTONG
            </h1>
            <p class="text-2xl font-semibold !text-gray-200">
                Isang pahulaan na karaniwang isang pahayag o tanong na may nakatagong kahulugan na sinasagot bilang palaisipan.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 4 ===== --}}
    <div x-show="page === 4" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Halimbawa:
            </p>
        </header>

        <div class="flex-1 flex flex-col items-center justify-center gap-6 p-8">
            <div class="bg-gray-800/50 p-8 rounded-lg border-2 border-[#F4C300] text-center">
                <p class="text-3xl font-semibold leading-relaxed">
                    Isang kuwadrong maliit,<br>
                    Naaabot ang buong daigdig.
                </p>
                <p class="text-2xl !text-[#F4C300] font-bold mt-6">
                    Sagot: cellphone
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 5 ===== --}}
    <div x-show="page === 5" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Ikaw, ano-ano ang mga bugtong na pamilar sa iyo? Balikan natin upang iyong maalala.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 6 ===== --}}
    <div x-show="page === 6" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <div class="flex-1 grid grid-cols-2 gap-8 overflow-y-auto p-5">
            <div class="bg-gray-800/50 p-6 rounded-lg border-2 border-[#F4C300] flex flex-col justify-center">
                <p class="text-2xl font-semibold text-center leading-relaxed">
                    Dalawang bolang malalim,<br>
                    Malayo ang nararating.
                </p>
                <p class="text-xl !text-[#F4C300] font-bold text-center mt-4">
                    Sagot: mata
                </p>
            </div>

            <div class="bg-gray-800/50 p-6 rounded-lg border-2 border-[#F4C300] flex flex-col justify-center">
                <p class="text-2xl font-semibold text-center leading-relaxed">
                    Isang prinsesa,<br>
                    Nakaupo sa tasa.
                </p>
                <p class="text-xl !text-[#F4C300] font-bold text-center mt-4">
                    sagot: kasoy
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 7 ===== --}}
    <div x-show="page === 7" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Basahin mo nga ang isa pang halimbawa ng bugtong. Subukan mong sagutin.
            </p>
        </header>

        <div class="flex-1 flex flex-col items-center justify-center gap-6 p-8">
            <div class="bg-gray-800/50 p-8 rounded-lg border-2 border-[#F4C300] text-center">
                <p class="text-3xl font-semibold leading-relaxed">
                    Inuukit niyang mga titik,<br>
                    Binubura pag may batik.
                </p>
                <p class="text-2xl !text-[#F4C300] font-bold mt-6">
                    Sagot: ?
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 8: SALAWIKAIN ===== --}}
    <div x-show="page === 8" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold !text-[#F4C300]">
                SALAWIKAIN
            </h1>
            <p class="text-2xl font-semibold !text-gray-200">
                Ang salawikain ay karaniwang patalinhaga at may nakatagong kahulugan.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 9 ===== --}}
    <div x-show="page === 9" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Basahin mo ang mga halimbawa ng mga sikat na salawikain:
            </p>
        </header>

        <div class="flex-1 flex flex-col items-center justify-center gap-10 p-8">
            <div class="bg-gray-800/50 p-6 rounded-lg border-2 border-[#F4C300] text-center w-full max-w-2xl">
                <p class="text-3xl font-bold leading-relaxed">
                    Kapag may tiyaga,<br>
                    May nilaga.
                </p>
            </div>

            <div class="bg-gray-800/50 p-6 rounded-lg border-2 border-[#F4C300] text-center w-full max-w-2xl">
                <p class="text-3xl font-bold leading-relaxed">
                    Kapag may isinuksok,<br>
                    May madurukot.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 10 ===== --}}
    <div x-show="page === 10" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Nauunawaan mo ba ang ibig sabihin ng mga salawikain na iyong binasa?
            </p>
            <p class="text-xl !text-gray-300 mt-4">
                Ano kaya ang ibig sabihin na kapag may tiyaga ay may nilaga? Literal bang may nilagang darating kapag ikaw ay nagtiyaga?
            </p>
        </header>
    </div>

    {{-- ===== PAGE 11 ===== --}}
    <div x-show="page === 11" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200 leading-relaxed">
                Ang ibig sabihin nito kapag matiyaga ang isang tao, maganda ang ibubunga nito. Halimbawa, kapag matiyaga kang nag-aaral magkakaroon ka ng magandang kinabukasan.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 12 ===== --}}
    <div x-show="page === 12" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Ano naman ang ibig sabihin ng "Kapag may isinuksok, may madurukot."
            </p>
            <p class="text-xl !text-gray-300 mt-4">
                Subukan mo ngang ipaliwanag.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 13 ===== --}}
    <div x-show="page === 13" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex flex-col justify-center gap-6 p-8">
            <p class="text-2xl font-semibold leading-relaxed">
                Ang kasingkahulugan ng salitang <span class="!text-[#F4C300]">isinuksok</span> ay itinago, inilagay o kaya ay ipinasok.
            </p>
            <p class="text-2xl font-semibold leading-relaxed">
                Ang ibig sabihin naman ng salitang <span class="!text-[#F4C300]">madurukot</span> ay makukuha o mahuhugot.
            </p>
        </div>
    </div>

    {{-- ===== PAGE 14 ===== --}}
    <div x-show="page === 14" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Ano ba ang bagay na kadalasang itinatago ng isang taong marunong mag-ipon?
            </p>
            <p class="text-3xl font-bold !text-[#F4C300] mt-6">
                Tama, ito ay pera.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 15 ===== --}}
    <div x-show="page === 15" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center p-8">
            <p class="text-2xl font-semibold leading-relaxed text-center max-w-4xl">
                Ibig sabihin ng salawikaing ito, kapag may iniipon kang pera ay may magagamit ka o mahuhugot ka sa oras ng pangangailangan tulad ng pagkakasakit o iba pang mahalagang bagay.
            </p>
        </div>
    </div>

    {{-- ===== PAGE 16: KASABIHAN ===== --}}
    <div x-show="page === 16" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold !text-[#F4C300]">
                KASABIHAN
            </h1>
            <p class="text-2xl font-semibold !text-gray-200">
                Ito ay hindi gumagamit ng mga talinhaga. Payak lamang ang kahulugan. Ang kilos, ugali at gawi ng isang tao ay masasalamin sa mga ito.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 17 ===== --}}
    <div x-show="page === 17" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Halimbawa:
            </p>
        </header>

        <div class="flex-1 flex flex-col items-center justify-center gap-6 p-8">
            <div class="bg-gray-800/50 p-8 rounded-lg border-2 border-[#F4C300] text-center">
                <p class="text-3xl font-bold leading-relaxed">
                    Ang pagsasabi nang tapat,<br>
                    Pagsasama nang maluwat.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 18 ===== --}}
    <div x-show="page === 18" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Nauunawaan mo ba ang ibig sabihin nito?
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center p-8">
            <p class="text-2xl font-semibold leading-relaxed text-center max-w-4xl">
                Ikaw, hindi ka ba nagsisinungaling sa iyong kaibigan? Kapag hindi ka sinungaling ibig sabihin, ikaw ay matapat. At dahil dito, magtatagal ang inyong samahan ng iyong kaibigan.
            </p>
        </div>
    </div>

    {{-- ===== PAGE 19 ===== --}}
    <div x-show="page === 19" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Basahin mo at subukang ipaliwanag ang susunod na kasabihan.
            </p>
        </header>

        <div class="flex-1 flex flex-col items-center justify-center gap-6 p-8">
            <div class="bg-gray-800/50 p-8 rounded-lg border-2 border-[#F4C300] text-center">
                <p class="text-3xl font-bold leading-relaxed">
                    Kumain tayo ng prutas at gulay,<br>
                    Upang humaba ang ating buhay.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 20: SAWIKAIN ===== --}}
    <div x-show="page === 20" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold !text-[#F4C300]">
                SAWIKAIN
            </h1>
            <p class="text-2xl font-semibold !text-gray-200">
                Ang sawikain o patambis ay mga salitang eupemistiko, patayutay o idyomatiko na ginagamit upang maging maganda ang paraan ng pagpapahayag.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 21 ===== --}}
    <div x-show="page === 21" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Halimbawa:
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-3 gap-8 text-3xl font-bold">
                @foreach ([
                    'Pusong mamon',
                    'malayo sa bituka',
                    'butas ang bulsa',
                    'Anak-dalita',
                    'nakahiga sa salapi',
                    'ilaw ng tahanan'
                ] as $idiom)
                    <p class="text-center">{{ $idiom }}</p>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== PAGE 22 ===== --}}
    <div x-show="page === 22" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Nauunawaan mo kaya ang mga binasa nating halimbawa?
            </p>
            <p class="text-xl !text-gray-300 mt-4">
                Ano kaya ang ibig sabihin ng pusong mamon? Hindi ba't malambot ang mamon? Ibig sabihin nito pag sinabihan kang may pusong mamon ay malambot ang iyong kalooban o ikaw ay mabait.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 23 ===== --}}
    <div x-show="page === 23" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <div class="flex-1 flex flex-col justify-center gap-6 overflow-y-auto p-5">
            <div class="grid grid-cols-2 gap-6 text-xl">
                <p><span class="font-bold !text-[#F4C300]">Anak-dalita</span> - ay nangangahulugang mahirap</p>
                <p><span class="font-bold !text-[#F4C300]">Malayo sa bituka</span> - ang ibig sabihin ay hindi malubha ang sakit</p>
                <p><span class="font-bold !text-[#F4C300]">Butas ang bulsa</span> - nangangahulugang walang pera</p>
                <p><span class="font-bold !text-[#F4C300]">Ilaw ng tahanan</span> - nangangahulugang nanay o ina</p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 24 ===== --}}
    <div x-show="page === 24" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Subukan mong sagutin kung ano ang kahulugan ng "Nakahiga sa salapi."
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <p class="text-4xl font-bold !text-[#F4C300]">
                Nakahiga sa salapi - ?
            </p>
        </div>
    </div>

    {{-- Navigation Buttons --}}
    @include('partials.lesson-navigation')

</div>