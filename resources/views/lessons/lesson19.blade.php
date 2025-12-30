{{-- ===== LESSON 19: PAG-UNAWA SA BINASANG EDITORYAL ===== --}}

<div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg">
    {{-- ===== PAGE 1 ===== --}}
    <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold">
                <span class="!text-[#F4C300]">Sesyon 19:</span>
                Pag-unawa sa Binasang Editoryal
            </h1>
        </header>
    </div>

    {{-- ===== PAGE 2 ===== --}}
    <div x-show="page === 2" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold !text-[#F4C300]">
                Ano ang editoryal?
            </h1>
        </header>

        <div class="flex-1 flex items-center justify-center p-8">
            <p class="text-2xl font-semibold leading-relaxed text-center max-w-4xl">
                Ang editoryal ay isang artikulo na naglalahad ng opinya ng editorial board o patnugutan tungkol sa iba't ibang paksa, kadalasang may mas malalim na pagsusuri kaysa sa mga balita. Layunin nitong magbigay ng pananaw, opinya, at pagsusuri sa mga kasalukuyang isyu, kasabay ng pagbigay ng inspirasyon at kamalayan sa mga mambabasa.
            </p>
        </div>
    </div>

    {{-- ===== PAGE 3 ===== --}}
    <div x-show="page === 3" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Halimbawa:
            </p>
        </header>
    </div>

    {{-- ===== PAGE 4 ===== --}}
    <div x-show="page === 4" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h2 class="text-2xl font-bold !text-[#F4C300] text-center">TUITION FEE, LIBRE</h2>
            <p class="text-lg text-center">Elvie M. Dimatulac</p>
        </header>

        <div class="flex-1 overflow-y-auto p-5">
            <div class="text-lg leading-relaxed space-y-4">
                <p>
                    Ipinakilala ni Senador Paolo Benigno "Bam" Aquino ang Senate Bill No. 177 na nagtatadhana ng libreng tuition fee para sa mga estudyante na naka-enrol sa mga State Universities and Colleges (SUCs). Ito ay nakapagpataas ng moral ng mga masang Pilipino na naniniwalang ang pagtatapos sa tertiary education ay nakapagpapaangat ng kalagayan sa buhay.
                </p>
                <p>
                    Sa pananaw ng Kinatawan ng Kabataan na si Sarah Elago, ang "Free Higher Education for All Act" ay isang hakbang sa matuwid na direksiyon para sa SUCs. Kaya naman, ang pagpapatupad nito ay isang malaking bagay para sa mga estudyante at mga magulang at dapat masunod para sa kanilang kapakinabangan.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 5 ===== --}}
    <div x-show="page === 5" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <div class="flex-1 overflow-y-auto p-5">
            <div class="text-lg leading-relaxed space-y-4">
                <p>
                    Gayunpaman, ipinagdiinan ni Pangulong Rodrigo Roa Duterte na ang libreng tuition fee ay hindi magiging para sa lahat. Ipinag-utos niya na ang mga estudyanteng mahihirap ang estado sa buhay na may kakayahang akademiko ang mabibigyan ng prayoridad.
                </p>
                <p>
                    Samakatuwid, dapat pagsumikapan ng mga estudyante na mag-aral nang mabuti ngayon sapagkat ang mga marka nila ang magsisilbi nilang katibayan upang mapakinabangan ang nasabing libreng tuition fee.
                </p>
                <p>
                    Kinakailangan din ang masinop na paggabay at pagsubaybay ng mga magulang sa kanilang mga anak para matiyak na nag-aaral sila nang mabuti at matamasa ang ganitong programa ng pamahalaan.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 6 ===== --}}
    <div x-show="page === 6" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <div class="flex-1 overflow-y-auto p-5">
            <div class="text-lg leading-relaxed space-y-4">
                <p>
                    Sa editoryal na ito ang opinya ng mga editor na matatagpuan sa Introduksyon o sa unang talata ay ang, <span class="!text-[#F4C300]">"Ito ay nakapagpataas ng moral ng mga masang Pilipino na naniniwalang ang pagtatapos sa tertiary education ay nakapagpapaangat ng kalagayan sa buhay."</span>
                </p>
                <p>
                    Ang newspeg o batayang balita naman ay ang, <span class="!text-[#F4C300]">"Ipinakilala ni Senador Paolo Benigno "Bam" Aquino ang Senate Bill No. 177 na nagtatadhana ng libreng tuition fee para sa mga estudyante na naka-enrol sa mga State Universities and Colleges (SUCs)."</span>
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 7 ===== --}}
    <div x-show="page === 7" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Basahin at buoin mo ang puzzle upang malaman ang kasingkahulugan ng sumusunod na salita.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 8 ===== --}}
    <div x-show="page === 8" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <div class="flex-1 flex flex-col justify-center gap-6 overflow-y-auto p-5">
            @foreach ([
                ['Nagtatadhana', '__a g t a __a k __ a'],
                ['Pananaw', 'o __ i n y __n'],
                ['Estado', 'k __ l __g a __ a __'],
                ['Masinop', 'm a __n g __ t'],
                ['Prayoridad', 'p a g - __ __ n __']
            ] as $puzzle)
                <div class="flex items-center gap-6 text-2xl">
                    <span class="font-bold !text-[#F4C300] w-48">{{ $puzzle[0] }}</span>
                    <span class="text-3xl">{{ $puzzle[1] }}</span>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 9 ===== --}}
    <div x-show="page === 9" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Ngayon naman ay subukan mong sagutin sa abot ng iyong makakaya ang sumusunod na tanong. Pindutin at basahin ang tamang sagot.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 10 ===== --}}
    <div x-show="page === 10" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-xl font-semibold !text-gray-200">
                Ano ang bill na ipinakilala ni Sen. Bam Aquino?
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center gap-8">
            @foreach (['Senate Bill No. 177', 'Senate Bill No. 711'] as $choice)
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
                Sino ang naniniwalang ang "Free Higher Education for All Act" ay isang hakbang sa matuwid na direksiyon para sa SUCs?
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center gap-8">
            @foreach (['Sarah Elago', 'Sarah Elegado'] as $choice)
                <p class="text-3xl font-bold cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform px-8 py-4 border-2 border-[#F4C300] rounded-lg">
                    {{ $choice }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 12 ===== --}}
    <div x-show="page === 12" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-xl font-semibold !text-gray-200">
                Sino lamang ang prayoridad ng nasabing batas?
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center gap-8">
            @foreach (['Estudyanteng mahihirap', 'estudyanteng mayayaman'] as $choice)
                <p class="text-3xl font-bold cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform px-8 py-4 border-2 border-[#F4C300] rounded-lg">
                    {{ $choice }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 13 ===== --}}
    <div x-show="page === 13" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-xl font-semibold !text-gray-200">
                Ano ang dapat gawin ng mga mag-aaral upang makamit ang libreng tuition fee?
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center gap-8">
            @foreach (['Magsumikap mag-aral', 'magtambay'] as $choice)
                <p class="text-3xl font-bold cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform px-8 py-4 border-2 border-[#F4C300] rounded-lg">
                    {{ $choice }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 14 ===== --}}
    <div x-show="page === 14" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-xl font-semibold !text-gray-200">
                Ano naman ang bahagi ng mga magulang para rito?
            </p>
        </header>

        <div class="flex-1 flex items-center justify-center gap-8">
            @foreach (['Masinop na paggabay', 'masinop na opinya'] as $choice)
                <p class="text-3xl font-bold cursor-pointer hover:scale-110 hover:!text-[#F4C300] transition-transform px-8 py-4 border-2 border-[#F4C300] rounded-lg">
                    {{ $choice }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 15 ===== --}}
    <div x-show="page === 15" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Tunghayan pa natin ang isang editoryal. Unawain mong mabuti habang ito ay binabasa.
            </p>
        </header>
    </div>

    {{-- ===== PAGE 16 ===== --}}
    <div x-show="page === 16" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h2 class="text-2xl font-bold !text-[#F4C300] text-center">Edu-Aksyon</h2>
            <p class="text-lg text-center">Jay Andrei Capuno</p>
        </header>

        <div class="flex-1 overflow-y-auto p-5">
            <div class="text-lg leading-relaxed space-y-4">
                <p>
                    Tunay na makatutulong sa mga mag-aaral, guro at iba pang kawani sa larangan ng edukasyon ang naaprubahang P793.74 bilyong badgyet ng senado para sa Department of Education (DepEd) para sa taong 2025. Isa itong Edu-aksyon sa kasaysayan. Ito ay mas mataas ng 3.99% kumpara sa nakaraang badyet.
                </p>
                <p>
                    Sa pangunguna ni Sen. Pia Cayetano, pumayag ang senado na ilaan sa DepEd ang naturang badyet. Dahil dito, mas mapupunan ang pangangailangan ng mga mag-aaral at guro na hindi nila naisakatuparan sa nakaraang taon.
                </p>
                <p>
                    Bukod dito, isa rin itong magandang hakbang upang mas mapaunlad ang kalidad ng edukasyon ng bawat kabataang Pilipino.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 17 ===== --}}
    <div x-show="page === 17" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <div class="flex-1 overflow-y-auto p-5">
            <div class="text-lg leading-relaxed space-y-4">
                <p>
                    Bagama't may mga tumutol kamakailan at nagsabing hindi na dapat taasan pa ang badyet sa DepEd ay naaprubahan pa rin sa senado ang tungkol dito. Maganda ang kanilang naging desisyon upang mas marami pang mga gusaling maipatatayo na magagamit ng mga mag-aaral at hindi nagsisiksikan sa silid-aralan.
                </p>
                <p>
                    Marapat ding pagtuonan ng pansin ng DepEd ang iba pang suliraning pang-edukasyon tulad ng kakulangan ng mga kagamitang pampagkatuto, kakulangan ng mga guro, malaking puwang sa pagkatuto o learning gaps ng mga bata na idinulot ng pandemya at marami pang iba.
                </p>
                <p>
                    Bilang kongklusyon, ang naaprubahang P793.74 bilyong badyet ay may malaking maitutulong upang mabawasan kung hindi man tuluyang masolusyunan ang mga nabanggit na suliranin. Lalo na kung maayos na mapangangasiwaan at hindi ibubulsa lamang ang pondong nakalaan para sa edukasyon ng mga mag-aaral.
                </p>
            </div>
        </div>
    </div>

    {{-- Navigation Buttons --}}
    @include('partials.lesson-navigation')
</div>