{{-- ===== LESSON 20: PAG-UNAWA SA BINASANG ARTIKULONG PANG-AGHAM AT TEKNOLOHIYA ===== --}}

<div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg">
    {{-- ===== PAGE 1 ===== --}}
    <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold">
                <span class="!text-[#F4C300]">Sesyon 20:</span>
                Pag-unawa sa Binasang Artikulong Pang-agham at Teknolohiya
            </h1>
            <p class="text-xl !text-gray-300">(Science and Technology)</p>
        </header>
    </div>

    {{-- ===== PAGE 2 ===== --}}
    <div x-show="page === 2" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h2 class="text-2xl font-bold !text-[#F4C300] text-center">Folic Acid Para sa mga Kababaihan</h2>
        </header>

        <div class="flex-1 overflow-y-auto p-5">
            <div class="text-lg leading-relaxed space-y-4">
                <p>
                    Isang mabuting hakbang ang pagtutulungan ng Department of Education (DepEd) at Department of Health (DOH) na mailunsad ang pamimigay ng Folic Acid sa mga mag-aaral sa mga pampublikong paaralan na makatutulong sa mga mag-aaral na kababaihan.
                </p>
                <p>
                    Ayon sa pag-aaral, ang Folic Acid ay may malaking bentahe sa pangangatawan ng mga kababaihan sapagkat ito ay naglalaman ng mga bitamina at mineral na makapagpapalakas ng dugo. Dagdag pa rito, ang mga babae ay nagkakaroon ng buwanang dalaw kung kaya't inirerekomenda ng magkatuwang na kagawaran ang pag-inom ng Folic Acid.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 3 ===== --}}
    <div x-show="page === 3" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <div class="flex-1 overflow-y-auto p-5">
            <div class="text-lg leading-relaxed space-y-4">
                <p>
                    Maaaring maging matamlay ang mga mag-aaral na may kakulangan o mababang dugo, kung kaya naman minabuti ng pamahalaan na maisagawa ang mga ganitong programa.
                </p>
                <p>
                    Mabuti na lamang, karamihan sa mga babaeng mag-aaral ay sang-ayon sa pagkakaroon ng mga ganitong hakbang o aktibidad ng gobyerno.
                </p>
                <p>
                    Sa kabuuan, marapat lamang na isiping makabubuti ang mga programang ito ng pamahalaan. Isinasaalang-alang ang mga ganitong hakbang para rin sa ating kapakanan.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 4 ===== --}}
    <div x-show="page === 4" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Ang binasa ay isang artikulong Pang-agham at Teknolohiya. Ano ba ang kahulugan nito?
            </p>
        </header>
    </div>

    {{-- ===== PAGE 5 ===== --}}
    <div x-show="page === 5" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center p-8">
            <div class="text-xl leading-relaxed space-y-4 max-w-4xl">
                <p>
                    Ito ang pinakabagong uri ng kategorya o pamahayagan sa Pilipinas. Naging isang pangangailangang dala ng imbensyon tungo sa pag-unlad ng teknolohiya at digital age.
                </p>
                <p>
                    Ang pagsulat nito ay isang anyo ng pagbibigay-kaalaman sa pamamahayag na kinabibilangan ng mga elemento sa pagsulat ng balita, editorial at lathalain.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 6 ===== --}}
    <div x-show="page === 6" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Para maunawaan mo nang lubos ang nilalaman ng artikulong ito, subukan mong sagutin ang mga kasingkahulugan ng sumusunod na salita.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 7 ===== --}}
    <div x-show="page === 7" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <div class="flex-1 flex flex-col justify-center gap-8 overflow-y-auto p-5">
            @foreach ([
                ['Mailunsad', ['maipatupad', 'mailaban']],
                ['Bentahe', ['galak', 'pakinabang']],
                ['Magkatuwang', ['magkasama', 'magkahiwalay']],
                ['Matamlay', ['masigla', 'walang sigla']],
                ['Kapakanan', ['kabuhayan', 'kabutihan']]
            ] as $item)
                <div class="flex items-center gap-8">
                    <span class="font-bold !text-[#F4C300] text-2xl w-64">{{ $item[0] }} -</span>
                    <div class="flex gap-6">
                        @foreach ($item[1] as $choice)
                            <p class="text-xl cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform px-6 py-2 border-2 border-[#F4C300] rounded-lg">
                                {{ $choice }}
                            </p>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 8 ===== --}}
    <div x-show="page === 8" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Basahin mo at unawain ang mga tanong. Piliin ang wastong sagot.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 9 ===== --}}
    <div x-show="page === 9" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-xl font-semibold !text-gray-200">
                Ano ang ipinamigay ng DepEd at DOH sa mga mag-aaral?
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center gap-8">
            @foreach (['Ascorbic acid', 'Acid', 'Folic acid'] as $choice)
                <p class="text-3xl font-bold cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform px-8 py-4 border-2 border-[#F4C300] rounded-lg">
                    {{ $choice }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 10 ===== --}}
    <div x-show="page === 10" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-xl font-semibold !text-gray-200">
                Sino lamang sa mga mag-aaral ang binigyan?
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center gap-8">
            @foreach (['Kababaihan', 'kalalakihan', 'kapwa lalaki at babae'] as $choice)
                <p class="text-3xl font-bold cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform px-8 py-4 border-2 border-[#F4C300] rounded-lg">
                    {{ $choice }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 11 ===== --}}
    <div x-show="page === 11" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-xl font-semibold !text-gray-200">
                Ano ang isang bentahe ng pag-inom ng Folic acid?
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center gap-8">
            @foreach (['Pampatibay ng puso', 'pampadagdag ng dugo', 'pampalakas ng tuhod'] as $choice)
                <p class="text-2xl font-bold cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform px-8 py-4 border-2 border-[#F4C300] rounded-lg text-center">
                    {{ $choice }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 12 ===== --}}
    <div x-show="page === 12" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-xl font-semibold !text-gray-200">
                Ano ang isa sa di-magandang maidudulot ng kakulangan ng dugo?
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center gap-8">
            @foreach (['Nakamamatay', 'pagka-malilimutin', 'pagiging matamlay'] as $choice)
                <p class="text-2xl font-bold cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform px-8 py-4 border-2 border-[#F4C300] rounded-lg text-center">
                    {{ $choice }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 13 ===== --}}
    <div x-show="page === 13" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-xl font-semibold !text-gray-200">
                Ano sa iyong palagay ang tinutukoy na buwanang dalaw?
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center gap-8">
            @foreach (['Pagreregla', 'pagkahilo', 'pagdating ng tao'] as $choice)
                <p class="text-3xl font-bold cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform px-8 py-4 border-2 border-[#F4C300] rounded-lg">
                    {{ $choice }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 14 ===== --}}
    <div x-show="page === 14" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Basahin mo at unawain ang isa pang artikulong Pang-agham at Teknolohiya. Pagkatapos ay dumako ka sa Pagsasanay.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 15 ===== --}}
    <div x-show="page === 15" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h2 class="text-2xl font-bold !text-[#F4C300] text-center">Lulong sa Usok</h2>
            <p class="text-lg text-center italic">Tusong impostor, hatid ay adiksyon.</p>
            <p class="text-lg text-center">Yishin D. Malong</p>
        </header>

        <div class="flex-1 overflow-y-auto p-5">
            <div class="text-lg leading-relaxed space-y-4">
                <p>
                    Maliit, may di pangkaraniwang hugis at panibagong anyo't kulay na naman. Bakit mo sila inaakit sa iyong usok?
                </p>
                <p>
                    Isang maaliwalas na umaga na naman ang sumibol. Tapos na ang almusal at masyado pang maaga upang magluto ng tanghalian ngunit, isang usok ang aking natanaw at sunod nito'y isang ubong malakas. Si Totoy na 13 taong gulang at ang kaniyang Tito, 20 taong gulang na humihipak sa tig-isa nilang vape o e-cigarretes.
                </p>
                <p>
                    Pero teka… lingid sa kanilang kaalaman, unti-unti na palang pinapatay ng mga ito ang kanilang kinabukasan.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 16 ===== --}}
    <div x-show="page === 16" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h3 class="text-xl font-bold !text-[#F4C300]">Dumaraming Hipak.</h3>
        </header>

        <div class="flex-1 overflow-y-auto p-5">
            <div class="text-lg leading-relaxed space-y-4">
                <p>
                    Puno ng pangamba, ayon sa World Health Organization (WHO), higit na sa 100 million ang mga gumagamit ng vape. Samantala, mahigit 86 million dito ay matatanda at ang 15 million naman ay mga kabataang gaya ni Totoy.
                </p>
                <p>
                    Sa loob ng isang araw, napag-alamang higit sa 9 na beses kung gumamit ang mga kabataan ng vape na madalas na bunsod ng kuryosidad at dala na rin ng impluwensiya ng iba.
                </p>
                <p>
                    At sa murang edad na mga kagaya ni Totoy na gumagamit ay pinakikilala nito ang nicotine na di-kalauna'y maaaring pumatay ng kinabukasan niya.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 17 ===== --}}
    <div x-show="page === 17" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h3 class="text-xl font-bold !text-[#F4C300]">Ang impostor na mapanlinlang</h3>
        </header>

        <div class="flex-1 overflow-y-auto p-5">
            <div class="text-lg leading-relaxed space-y-4">
                <p>
                    Bagaman kaakit-akit at puno ng kulay ang vape ay kakambal ito ng tabako o ng kinagawiang sigarilyo na tila ba nagbabalat kayong impostor lang.
                </p>
                <p>
                    Hindi man isahan, ayon sa mga pag-aaral sa buong daigdig, maaaring dumapo ang mga sakit na gaya ng liver failure, respiratory problem, disabilities na maaaring humantong sa kamatayan ang paggamit ng mga gaya ng vape, tabako at sigarilyo.
                </p>
                <p>
                    Samakatuwid, madalas mang pampalipas oras ito sa una ay maaari itong umabot sa pagkalulong at adiksyon na maaaring magkaroon ng panganib hindi lang sa mismong humihipak, kundi pati na rin sa kapaligiran at sa mga nakapaligid dito dahil sa second-hand smoke na higit na mapaminsala sa katawan ng kung sinomang makalalanghap nito.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 18 ===== --}}
    <div x-show="page === 18" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h3 class="text-xl font-bold !text-[#F4C300]">Tigil sa Pagpipigil</h3>
        </header>

        <div class="flex-1 overflow-y-auto p-5">
            <div class="text-lg leading-relaxed space-y-4">
                <p>
                    Gayunpaman, sa pamamagitan ng pagpipigil at tamang control ay magkakaroon ng pagbabago!
                </p>
                <p>
                    Sa papalubog na araw, naroroon na naman sina Totoy at ang kaniyang tiyuhin, humihipak pa rin. Hanggang kailan kayang ang usok na nakalululong ang tutukso sa kanila na unti-unting nagpapahirap at nagpapalabo na pala ng kanilang kinabukasan?
                </p>
            </div>
        </div>
    </div>

    {{-- Navigation Buttons --}}
    @include('partials.lesson-navigation')
</div>