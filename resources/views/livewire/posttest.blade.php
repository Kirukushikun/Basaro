@php
$questions = [
    // Section 1: Pag-ibig ng Ina
    1  => ['q' => 'Ano ang pamagat ng tula?',                                                                  'choices' => ['Pag-ibig ng Anak', 'Pag-ibig ng Ina', 'Pag-ibig ng Magulang']],
    2  => ['q' => 'Sino ang sumulat ng tula?',                                                                 'choices' => ['Elvie Dimatulac', 'Jay-r Guinto', 'Jay Ar Quinto']],
    3  => ['q' => 'Sa iyong palagay, sino ang nagsasalita sa tula?',                                          'choices' => ['anak', 'ama', 'ina']],
    4  => ['q' => 'Sino ang kinakausap niya sa tula?',                                                        'choices' => ['anak', 'ama', 'ina']],
    5  => ['q' => 'Sino raw ang matigas ang bungo?',                                                          'choices' => ['anak', 'ama', 'ina']],
    6  => ['q' => 'Ano ang kasingkahulugan ng salitang mapagtanto sa huling linya ng tula?',                  'choices' => ['malaman', 'mapigil', 'mawakasan']],
    7  => ['q' => '"Ikaw, O ina ko, Nagkandili\'t nagturo." Ang salitang nagkandili ay nangangahulugang ___?','choices' => ['nag-alaga', 'nagkaila', 'nagmahal']],
    8  => ['q' => '"Matigas man ang aking bungo." Ano ang ibig sabihin ng salitang bungo?',                   'choices' => ['Mata', 'panga', 'ulo']],
    9  => ['q' => 'Sa anong orihinal na wika nakasulat ang tula ni Guinto?',                                  'choices' => ['Ingles', 'Kapampangan', 'Tagalog']],
    10 => ['q' => 'Ano ang nais iparating ng tulang iyong nabasa?',                                           'choices' => ['Mahirap ang walang ina', 'Mapagmahal ang mga ina', 'Matigas ang ulo ng mga anak']],

    // Section 2: Unang Araw ng Klase
    11 => ['q' => 'Sino ang dahan-dahang bumangon ng higaan?',                                                'choices' => ['Kyel', 'Ken', 'kuya']],
    12 => ['q' => 'Ano ang kaniyang unang ginawa bago dumiretso sa lababo ng kusina?',                        'choices' => ['umiyak sa kuwarto', 'Ngumiti na lang', 'nag-ayos ng higaan']],
    13 => ['q' => 'Sino ang kaniyang nakasalubong?',                                                          'choices' => ['si kuya Kyel', 'si nanay', 'si tatay']],
    14 => ['q' => 'Ano ang kaniyang naging pagbati sa kaniyang kuya?',                                        'choices' => ['Aba!', 'Magandang tanghali!', 'Magandang umaga!']],
    15 => ['q' => 'Sino kaya ang nakangiting nangantiyaw sa kaniya?',                                         'choices' => ['si ama', 'si ina', 'si kuya Kyel']],
    16 => ['q' => 'Ano ang ikinabigla ng kaniyang kuya sa kaniya?',                                          'choices' => ['Maaga siyang nagising', 'Nag-ayos ng higaan', 'Nangangantiyaw lang']],
    17 => ['q' => 'Bakit bumangon nang maaga ang pangunahing tauhan sa kuwento?',                             'choices' => ['para kumain', 'dahil ayaw niyang mahuli sa pagpasok sa paaralan', 'dahil tinawag na sila ng kanilang nanay']],
    18 => ['q' => 'Bakit sila tinawag ng kanilang ina?',                                                      'choices' => ['Para bumiyahe', 'Para maligo', 'para kumain']],
    19 => ['q' => 'Ano ang pamagat ng kuwento?',                                                              'choices' => ['Araw ng Klase', 'Sina Ken at Kyel', 'Unang Araw ng Klase']],
    20 => ['q' => 'Ano ang aral na mapupulot sa kuwento?',                                                    'choices' => ['Huwag magpapahuli kahit sa unang araw lang ng klase.', 'Tumayo agad pagbangon sa umaga.', 'Ugaliing bumangon nang maaga para hindi nahuhuli sa klase.']],

    // Section 3: Sinag at Lakas
    21 => ['q' => 'Ano ang kahulugan ng salitang kamusmusan?',                                                'choices' => ['kabataan', 'katandaan', 'kawalan']],
    22 => ['q' => 'Ano ang ibig sabihin ng salitang tumatanglaw?',                                            'choices' => ['nagdidilim', 'nagbibigay-liwanag', 'nagbibigay']],
    23 => ['q' => 'Sino ang tinutukoy na maningning na ilaw sa tula?',                                        'choices' => ['tatay', 'literal na ilaw', 'nanay']],
    24 => ['q' => 'Sino kaya ang nagsasalita sa tula?',                                                       'choices' => ['nanay', 'tatay', 'anak']],
    25 => ['q' => 'Ayon sa tula, ano ang hindi nawawala sa ginagawa ng isang ina?',                          'choices' => ['pagkalinga', 'ampaw', 'ilaw']],
    26 => ['q' => 'Ano ang pamagat ng tulang iyong binasa?',                                                  'choices' => ['Ang Lakas', 'Lakas at Sinag', 'Sinag at Lakas']],
    27 => ['q' => 'Sino ang may-akda ng tula?',                                                               'choices' => ['Arvie Dimatulac', 'Elvie Dimatulac', 'Elvie Matulac']],
    28 => ['q' => 'Sino raw ang tumatanglaw sa buhay ng nagsasalita sa tula?',                               'choices' => ['Araw', 'ikaw', 'maningning na ilaw']],
    29 => ['q' => 'Ano na lang ang maiiwan kapag nagpahinga ang nanay?',                                      'choices' => ['Alaala', 'larawan', 'wala na']],
    30 => ['q' => 'Ano ang nais iparating ng tulang iyong nabasa?',                                           'choices' => ['Dakila ang pagmamahal ng isang ina', 'Magugunaw ang mundo', 'Mawawalan ng ilaw ang mundo']],

    // Section 4: Panalangin
    31 => ['q' => 'Ano ang ibig sabihin ng salitang patungo?',                                                'choices' => ['papunta', 'palabas', 'palibot']],
    32 => ['q' => 'Ano ang pamagat ng kuwentong binasa?',                                                     'choices' => ['Si Toto', 'Ang Mag-ina', 'Panalangin']],
    33 => ['q' => 'Sino ang gumaganap sa kuwento?',                                                           'choices' => ['Berto', 'Toto', 'Tolits']],
    34 => ['q' => 'Ano ang ginawa niya pagkagising sa umaga?',                                                'choices' => ['nanalangin', 'natulog muli', 'nagsayaw']],
    35 => ['q' => 'Saan siya dumiretso upang maghilamos at magsipilyo?',                                     'choices' => ['batalan', 'kusina', 'sala']],
    36 => ['q' => 'Sino ang kaniyang nakasalubong at binati matapos maghilamos?',                             'choices' => ['nanay', 'tatay', 'nanay at tatay']],
    37 => ['q' => 'Ano ang kanilang hanapbuhay?',                                                             'choices' => ['pagluluto', 'pagtitinda', 'pagwawalis']],
    38 => ['q' => 'Saan nagbebenta ng prutas at gulay ang mag-anak?',                                        'choices' => ['ospital', 'bahay', 'palengke']],
    39 => ['q' => 'Ano ang ginawa ng mag-anak bago kumain?',                                                  'choices' => ['naglaba', 'nanalangin', 'nagtinda']],
    40 => ['q' => 'Ano ang kahulugan ng salitang ipinagkaloob?',                                              'choices' => ['ibinigay', 'itinapon', 'ikinalat']],
    41 => ['q' => '"Umusal siya ng munting panalangin." Ano ang kahulugan ng salitang munti?',                'choices' => ['maikli', 'mahaba', 'Malaki']],
    42 => ['q' => 'Ano ang kasingkahulugan ng salitang batalan?',                                             'choices' => ['pahugasan', 'hardin', 'sala']],
    43 => ['q' => 'Ano ang kalagayan sa buhay ng mag-anak?',                                                  'choices' => ['mahirap', 'mailap', 'mayaman']],
    44 => ['q' => 'Kailan nagtungo sa palengke ang mag-anak upang magbenta?',                                 'choices' => ['Kaninang madaling araw', 'Kaninang tanghali', 'Kaninang umaga']],
    45 => ['q' => 'Anong katangian ang masasalamin sa mag-anak?',                                             'choices' => ['mahirap', 'mapanalanginin', 'mapanghusga']],
    46 => ['q' => 'Sa iyong palagay, bakit mahalaga ang pananalangin?',                                       'choices' => ['Dahil ito ay paraan upang makipag-usap sa Diyos para makahingi ng Kaniyang tulong at makapagpasalamat.', 'Dahil ito ay may pakinabang sa buhay ng lahat ng tao sa mundo.', 'Dahil ito ang magbibigay sa atin ng lahat ng kagustuhan natin sa mundo.']],

    // Section 5: Short paragraph
    47 => ['q' => 'Kanino ang mga luya?',     'choices' => ['kay Tiya Bela', 'kay Tiya Sela', 'kay Tito Selo']],
    48 => ['q' => 'Nasaan ang mga luya?',     'choices' => ['sa lamesa', 'sa sofa', 'sa upuan']],
    49 => ['q' => 'Ano ang uulamin nila?',    'choices' => ['luya', 'tinola', 'tuyo']],
    50 => ['q' => 'Kailan nila ito uulamin?', 'choices' => ['bukas', 'kanina', 'mamaya']],
];

$sections = [
    ['label' => 'Para sa bilang 1–10',  'range' => range(1, 10),  'type' => 'tula',    'words' => 21,
     'title'  => 'Pag-ibig ng Ina',
     'author' => 'Mula sa Tulang Kapampangan ni Jay-r C. Guinto na isinalin sa Filipino ni Elvie M. Dimatulac',
     'passage' => "Ikaw, O ina ko,\nNagkandili't nagturo,\nMatigas man ang aking bungo,\nLagi ka pa ring nagtuturo,\nSa mga dapat na mapagtanto."],

    ['label' => 'Para sa bilang 11–20', 'range' => range(11, 20), 'type' => 'kuwento', 'words' => 85,
     'title'  => 'Unang Araw ng Klase',
     'author' => 'Elvie M. Dimatulac',
     'passage' => "Tututut! Tututut! Pagtunog ng alarm clock ay dahan-dahang bumangon ng higaan si Ken. Inayos niya ang kaniyang pinaghigaan at dumiretso sa lababo ng kusina. Nasalubong niya ang kaniyang kuya Kyel. \"Magandang umaga, kuya,\" ang masayang pagbati niya. \"Aba! Mukhang excited kang pumasok, Ken. Milagro ay nagising ka nang maaga.\" Nangingiting pangangantiyaw ni Kyel sa bunso niyang kapatid.\n\n\"Syempre kuya, unang araw ng klase ngayon kaya dapat hindi tayo mahuli sa pagpasok.\" Naulinigan ng kanilang ina ang kanilang usapan kung kaya't tinawag na sila upang makakain."],

    ['label' => 'Para sa bilang 21–30', 'range' => range(21, 30), 'type' => 'tula',    'words' => 64,
     'title'  => 'Sinag at Lakas',
     'author' => 'Elvie M. Dimatulac',
     'passage' => "Isang maningning na ilaw, sa buhay ko'y tumatanglaw\nMula pa noong mga araw na ang isipa'y isang ampaw!\nSa aking kamusmusan ako'y di pinabayaan,\nSiya na maningning kong ilaw, pagkalinga'y di pumanaw.\nSa mundong ibabaw tunay ngang tayo ay singaw lang\nPagkat darating ang araw, sa ayaw at sa gusto man,\nMagpapahinga ang nanay, alaala'y maiiwan\nSinag sa karimlan, siya namang lakas sa maiiwan."],

    ['label' => 'Para sa bilang 31–46', 'range' => range(31, 46), 'type' => 'kuwento', 'words' => 175,
     'title'  => 'Panalangin',
     'author' => 'Elvie M. Dimatulac',
     'passage' => "Pagkagising sa umaga, umusal muna ng panalangin si Toto bago niya inayos ang kaniyang higaan. \"Salamat po Panginoon sa isang magandang araw na muli Mo pong ipinagkaloob sa akin at sa aking pamilya\", ito ang naging pasasalamat ni Toto sa Diyos sa kaniyang munting panalangin.\n\nDumiretso siya sa batalan upang maghilamos ng mukha at magsipilyo ng ngipin. \"Magandang umaga po itay, inay.\" Isang pagbati sa kaniyang mga magulang nang masalubong niya sa batalan pagkatapos niyang makapaghilamos at magsipilyo.\n\nBagama't mahirap ang kalagayan sa buhay ay masaya ang mag-anak. Nagtatanim sila ng mga gulay at prutas na ibinebenta nila sa palengke.\n\n\"Toto, halika at nang makakain ka na, anak.\" Niyaya siya ng kaniyang ina upang mag-almusal. \"Opo inay, inaayos ko lang po ang mga dadalhin natin sa palengke,\" sagot naman ni Toto.\n\nBago kumain ay sama-samang nanalangin muna ang mag-anak. Naniniwala sila na ang panalangin ay mabisang pakikipag-ugnayan sa Diyos.\n\nHindi na nakapagtataka kung bakit muli silang nanalangin bago umalis ng bahay patungong palengke upang ibenta ang kanilang mga inaning prutas at gulay kaninang madaling araw."],

    ['label' => 'Para sa bilang 47–50', 'range' => range(47, 50), 'type' => 'talata',  'words' => 23,
     'title'  => null,
     'author' => null,
     'passage' => "May mga luya sa lamesa. Kay Tiya Sela ang mga luya. Isasama niya ang mga ito sa tinola. Tinola ang uulamin nila mamaya."],
];
@endphp

<main class="flex-1 overflow-hidden pb-[40px]">
    <div class="lessons md:pr-5 gap-4 md:gap-7 h-full overflow-y-auto">

        <form wire:submit.prevent="submit" class="flex flex-col gap-8">

        {{-- POSTTEST HEADER --}}
        <div class="card relative flex flex-col justify-between col-span-1 sm:col-span-2 lg:col-span-3 border-2 border-blue-400 bg-gradient-to-r from-blue-950 to-blue-900">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <span class="text-2xl">📝</span>
                        <h1 class="text-xl md:text-2xl font-bold text-blue-300">BASARO Posttest</h1>
                        @if($hasFirstAttempt)
                            <span class="text-xs px-2 py-1 rounded-md border border-blue-500 bg-blue-900 text-blue-200 font-semibold whitespace-nowrap">
                                Unang Iskor: {{ $firstAttempt->score }} / 50
                            </span>
                        @endif
                    </div>
                    <p class="text-sm md:text-base text-blue-100/80">
                        Basahin at unawaing mabuti ang sumusunod na akda upang masagot ang mga katanungan.
                        Itiman ang bilog na kumakatawan sa letra na tama ang sagot.
                    </p>
                    @if($hasFirstAttempt)
                        <p class="text-xs text-blue-300/60 mt-2">
                            Ang iyong unang pagsubok ay naitala na. Maaari kang sumubok muli ngunit hindi na mababago ang unang iskor.
                        </p>
                    @endif
                </div>
            </div>
        </div>

            {{-- Sections --}}
            @foreach($sections as $section)
                <div class="flex flex-col gap-4">

                    {{-- Passage --}}
                    <div class="rounded-xl border border-white/30 bg-white/5 px-6 py-5">
                        <p class="text-xs uppercase tracking-widest mb-3 !text-[#00A8F4]">{{ $section['label'] }}</p>

                        @if($section['title'])
                            <h2 class="text-lg font-bold text-[#00A8F4] mb-1">{{ $section['title'] }}</h2>
                        @endif

                        @if($section['author'])
                            <p class="text-xs text-white/50 mb-4">{{ $section['author'] }}</p>
                        @endif

                        @if($section['type'] === 'tula')
                            <div class="border-l-2 border-[#00A8F4]/40 pl-4 flex flex-col gap-1 text-sm md:text-base italic text-white/80">
                                @foreach(explode("\n", $section['passage']) as $line)
                                    <span>{{ $line }}</span>
                                @endforeach
                            </div>
                        @else
                            <p class="text-sm md:text-base text-white/80 leading-relaxed whitespace-pre-line">{{ $section['passage'] }}</p>
                        @endif

                        <p class="text-xs text-white/30 mt-3">(Bilang ng mga salita: {{ $section['words'] }})</p>
                    </div>

                    {{-- Questions --}}
                    @foreach($section['range'] as $num)
                        @php
                            $item        = $questions[$num];
                            $savedAnswer = $answers[$num] ?? null;
                        @endphp

                        <div class="rounded-xl border border-white/10 bg-white/5 px-6 py-5 flex flex-col gap-4
                            {{ $hasFirstAttempt ? 'opacity-75' : '' }}">

                            {{-- Question --}}
                            <p class="text-sm md:text-base font-medium text-white leading-relaxed">
                                <span class="text-[#00A8F4] font-bold mr-2">{{ $num }}.</span>{{ $item['q'] }}
                            </p>

                            {{-- Choices --}}
                            <div class="flex flex-col gap-3">
                                @foreach($item['choices'] as $index => $choice)
                                    @php $letter = chr(65 + $index); @endphp
                                    <label class="flex items-start gap-3 {{ $hasFirstAttempt ? 'cursor-not-allowed' : 'cursor-pointer group' }}">
                                        <input
                                            type="radio"
                                            name="question_{{ $num }}"
                                            value="{{ $letter }}"
                                            class="mt-0.5 accent-[#00A8F4] w-4 h-4 shrink-0 {{ $hasFirstAttempt ? 'cursor-not-allowed' : 'cursor-pointer' }}"
                                            @if(!$hasFirstAttempt) wire:model="answers.{{ $num }}" @endif
                                            @if($hasFirstAttempt) disabled @endif
                                            @if($hasFirstAttempt && $savedAnswer === $letter) checked @endif
                                        >
                                        <span class="text-sm md:text-base leading-relaxed
                                            {{ $hasFirstAttempt
                                                ? ($savedAnswer === $letter ? 'text-white' : 'text-white/30')
                                                : 'text-white/70 group-hover:text-white transition-colors' }}">
                                            <span class="{{ $hasFirstAttempt ? 'text-white/20' : 'text-white/40' }} mr-1">{{ $letter }}.</span>{{ $choice }}
                                        </span>
                                    </label>
                                @endforeach
                            </div>

                        </div>
                    @endforeach

                </div>
            @endforeach

            {{-- Submit / Retry --}}
            <div class="flex justify-end pb-4">
                @if($hasFirstAttempt)
                    <button
                        type="button"
                        wire:click="retryTest"
                        class="px-8 py-3 border border-[#00A8F4] text-[#00A8F4] rounded-md font-bold text-sm md:text-base hover:bg-[#00A8F4]/10 transition-colors"
                    >
                        Subukan Muli
                    </button>
                @else
                    <button
                        type="submit"
                        class="px-8 py-3 bg-[#00A8F4] !text-black rounded-md font-bold text-sm md:text-base hover:bg-blue-300 transition-colors"
                    >
                        Isumite ang Sagot
                    </button>
                @endif
            </div>

        </form>

    </div>
</main>