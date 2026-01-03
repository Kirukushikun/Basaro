{{-- ===== LESSON 20: PAG-UNAWA SA BINASANG ARTIKULONG PANG-AGHAM AT TEKNOLOHIYA ===== --}}

<div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg" x-data="{
    vocabAnswers: {
        v1: null,
        v2: null,
        v3: null,
        v4: null,
        v5: null
    },
    questionAnswers: {
        q1: null,
        q2: null,
        q3: null,
        q4: null,
        q5: null
    },
    selectVocab(question, answer) {
        this.vocabAnswers[question] = answer;
    },
    selectQuestion(question, answer) {
        this.questionAnswers[question] = answer;
    }
}">
    {{-- ===== PAGE 1: TITLE ===== --}}
    <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center">
            <div class="text-center">
                <h1 class="!text-xl sm:!text-2xl md:!text-3xl lg:!text-4xl font-bold">
                    <span class="!text-[#F4C300]">Sesyon 20:</span><br>
                    Pag-unawa sa Binasang Artikulong<br>
                    Pang-agham at Teknolohiya
                </h1>
                <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl !text-gray-300 mt-4">(Science and Technology)</p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 2: ARTICLE 1 - PART 1 ===== --}}
    <div x-show="page === 2" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h2 class="!text-lg sm:!text-2xl md:!text-3xl lg:!text-3xl font-bold !text-[#F4C300] text-center">Folic Acid Para sa mga Kababaihan</h2>
        </header>

        <div class="flex-1 overflow-y-auto p-5">
            <div class="!text-base sm:!text-lg md:!text-lg lg:!text-xl leading-relaxed space-y-4">
                <p>
                    Isang mabuting hakbang ang pagtutulungan ng Department of Education (DepEd) at Department of Health (DOH) na mailunsad ang pamimigay ng Folic Acid sa mga mag-aaral sa mga pampublikong paaralan na makatutulong sa mga mag-aaral na kababaihan.
                </p>
                <p>
                    Ayon sa pag-aaral, ang Folic Acid ay may malaking bentahe sa pangangatawan ng mga kababaihan sapagkat ito ay naglalaman ng mga bitamina at mineral na makapagpapalakas ng dugo. Dagdag pa rito, ang mga babae ay nagkakaroon ng buwanang dalaw kung kaya't inirerekomenda ng magkatuwang na kagawaran ang pag-inom ng Folic Acid.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 3: ARTICLE 1 - PART 2 ===== --}}
    <div x-show="page === 3" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <div class="flex-1 overflow-y-auto p-5">
            <div class="!text-base sm:!text-lg md:!text-lg lg:!text-xl leading-relaxed space-y-4">
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

    {{-- ===== PAGE 4: DEFINITION ===== --}}
    <div x-show="page === 4" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="!text-xl sm:!text-2xl md:!text-3xl lg:!text-4xl font-bold !text-[#F4C300]">
                Ano ang Artikulong Pang-agham at Teknolohiya?
            </h1>
        </header>

        <div class="flex-1 flex items-center justify-center p-8">
            <div class="!text-base sm:!text-lg md:!text-lg lg:!text-xl leading-relaxed space-y-4 max-w-4xl">
                <p>
                    Ito ang pinakabagong uri ng kategorya o pamahayagan sa Pilipinas. Naging isang pangangailangang dala ng imbensyon tungo sa pag-unlad ng teknolohiya at digital age.
                </p>
                <p>
                    Ang pagsulat nito ay isang anyo ng pagbibigay-kaalaman sa pamamahayag na kinabibilangan ng mga elemento sa pagsulat ng balita, editorial at lathalain.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 5: VOCABULARY (INTERACTIVE) ===== --}}
    <div x-show="page === 5" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h1 class="!text-lg sm:!text-xl md:!text-2xl lg:!text-2xl font-bold !text-[#F4C300]">Kasingkahulugan:</h1>
        </header>

        <div class="flex-1 flex flex-col gap-6 overflow-y-auto p-5">
            {{-- Vocab 1 --}}
            <div class="space-y-3">
                <p class="font-bold !text-[#F4C300] !text-base sm:!text-lg md:!text-lg lg:!text-xl">Mailunsad -</p>
                <div class="grid grid-cols-2 gap-4">
                    <div @click="selectVocab('v1', 'A')" 
                         :class="vocabAnswers.v1 === 'A' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-bold">maipatupad</p>
                    </div>
                    <div @click="selectVocab('v1', 'B')" 
                         :class="vocabAnswers.v1 === 'B' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-bold">mailaban</p>
                    </div>
                </div>
            </div>

            {{-- Vocab 2 --}}
            <div class="space-y-3">
                <p class="font-bold !text-[#F4C300] !text-base sm:!text-lg md:!text-lg lg:!text-xl">Bentahe -</p>
                <div class="grid grid-cols-2 gap-4">
                    <div @click="selectVocab('v2', 'A')" 
                         :class="vocabAnswers.v2 === 'A' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-bold">galak</p>
                    </div>
                    <div @click="selectVocab('v2', 'B')" 
                         :class="vocabAnswers.v2 === 'B' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-bold">pakinabang</p>
                    </div>
                </div>
            </div>

            {{-- Vocab 3 --}}
            <div class="space-y-3">
                <p class="font-bold !text-[#F4C300] !text-base sm:!text-lg md:!text-lg lg:!text-xl">Magkatuwang -</p>
                <div class="grid grid-cols-2 gap-4">
                    <div @click="selectVocab('v3', 'A')" 
                         :class="vocabAnswers.v3 === 'A' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-bold">magkasama</p>
                    </div>
                    <div @click="selectVocab('v3', 'B')" 
                         :class="vocabAnswers.v3 === 'B' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-bold">magkahiwalay</p>
                    </div>
                </div>
            </div>

            {{-- Vocab 4 --}}
            <div class="space-y-3">
                <p class="font-bold !text-[#F4C300] !text-base sm:!text-lg md:!text-lg lg:!text-xl">Matamlay -</p>
                <div class="grid grid-cols-2 gap-4">
                    <div @click="selectVocab('v4', 'A')" 
                         :class="vocabAnswers.v4 === 'A' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-bold">masigla</p>
                    </div>
                    <div @click="selectVocab('v4', 'B')" 
                         :class="vocabAnswers.v4 === 'B' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-bold">walang sigla</p>
                    </div>
                </div>
            </div>

            {{-- Vocab 5 --}}
            <div class="space-y-3">
                <p class="font-bold !text-[#F4C300] !text-base sm:!text-lg md:!text-lg lg:!text-xl">Kapakanan -</p>
                <div class="grid grid-cols-2 gap-4">
                    <div @click="selectVocab('v5', 'A')" 
                         :class="vocabAnswers.v5 === 'A' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-bold">kabuhayan</p>
                    </div>
                    <div @click="selectVocab('v5', 'B')" 
                         :class="vocabAnswers.v5 === 'B' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-bold">kabutihan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 6: QUESTIONS (ALL IN ONE) ===== --}}
    <div x-show="page === 6" class="w-full flex-1 flex flex-col gap-4 px-2 min-h-0">
            <div class="flex-1 overflow-y-auto p-5 space-y-6">
            {{-- Question 1 --}}
            <div class="space-y-3">
                <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-semibold !text-gray-200">
                    1. Ano ang ipinamigay ng DepEd at DOH sa mga mag-aaral?
                </p>
                <div class="grid grid-cols-3 gap-4">
                    <div @click="selectQuestion('q1', 'A')" 
                         :class="questionAnswers.q1 === 'A' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-bold">Ascorbic acid</p>
                    </div>
                    <div @click="selectQuestion('q1', 'B')" 
                         :class="questionAnswers.q1 === 'B' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-bold">Acid</p>
                    </div>
                    <div @click="selectQuestion('q1', 'C')" 
                         :class="questionAnswers.q1 === 'C' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-bold">Folic acid</p>
                    </div>
                </div>
            </div>

            {{-- Question 2 --}}
            <div class="space-y-3">
                <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-semibold !text-gray-200">
                    2. Sino lamang sa mga mag-aaral ang binigyan?
                </p>
                <div class="grid grid-cols-3 gap-4">
                    <div @click="selectQuestion('q2', 'A')" 
                         :class="questionAnswers.q2 === 'A' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-bold">Kababaihan</p>
                    </div>
                    <div @click="selectQuestion('q2', 'B')" 
                         :class="questionAnswers.q2 === 'B' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-bold">kalalakihan</p>
                    </div>
                    <div @click="selectQuestion('q2', 'C')" 
                         :class="questionAnswers.q2 === 'C' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-bold">kapwa lalaki at babae</p>
                    </div>
                </div>
            </div>

            {{-- Question 3 --}}
            <div class="space-y-3">
                <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-semibold !text-gray-200">
                    3. Ano ang isang bentahe ng pag-inom ng Folic acid?
                </p>
                <div class="grid grid-cols-3 gap-4">
                    <div @click="selectQuestion('q3', 'A')" 
                         :class="questionAnswers.q3 === 'A' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-bold">Pampatibay ng puso</p>
                    </div>
                    <div @click="selectQuestion('q3', 'B')" 
                         :class="questionAnswers.q3 === 'B' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-bold">pampadagdag ng dugo</p>
                    </div>
                    <div @click="selectQuestion('q3', 'C')" 
                         :class="questionAnswers.q3 === 'C' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-bold">pampalakas ng tuhod</p>
                    </div>
                </div>
            </div>

            {{-- Question 4 --}}
            <div class="space-y-3">
                <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-semibold !text-gray-200">
                    4. Ano ang isa sa di-magandang maidudulot ng kakulangan ng dugo?
                </p>
                <div class="grid grid-cols-3 gap-4">
                    <div @click="selectQuestion('q4', 'A')" 
                         :class="questionAnswers.q4 === 'A' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-bold">Nakamamatay</p>
                    </div>
                    <div @click="selectQuestion('q4', 'B')" 
                         :class="questionAnswers.q4 === 'B' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-bold">pagka-malilimutin</p>
                    </div>
                    <div @click="selectQuestion('q4', 'C')" 
                         :class="questionAnswers.q4 === 'C' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-bold">pagiging matamlay</p>
                    </div>
                </div>
            </div>

            {{-- Question 5 --}}
            <div class="space-y-3">
                <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-semibold !text-gray-200">
                    5. Ano sa iyong palagay ang tinutukoy na buwanang dalaw?
                </p>
                <div class="grid grid-cols-3 gap-4">
                    <div @click="selectQuestion('q5', 'A')" 
                         :class="questionAnswers.q5 === 'A' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-bold">Pagreregla</p>
                    </div>
                    <div @click="selectQuestion('q5', 'B')" 
                         :class="questionAnswers.q5 === 'B' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-bold">pagkahilo</p>
                    </div>
                    <div @click="selectQuestion('q5', 'C')" 
                         :class="questionAnswers.q5 === 'C' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl font-bold">pagdating ng tao</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 7: ARTICLE 2 - INTRO ===== --}}
    <div x-show="page === 7" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h2 class="!text-lg sm:!text-2xl md:!text-3xl lg:!text-3xl font-bold !text-[#F4C300] text-center">Lulong sa Usok</h2>
            <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl text-center italic">Tusong impostor, hatid ay adiksyon.</p>
            <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl text-center">Yishin D. Malong</p>
        </header>

        <div class="flex-1 overflow-y-auto p-5">
            <div class="!text-base sm:!text-lg md:!text-lg lg:!text-xl leading-relaxed space-y-4">
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

    {{-- ===== PAGE 8: ARTICLE 2 - DUMARAMING HIPAK ===== --}}
    <div x-show="page === 8" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h3 class="!text-lg sm:!text-xl md:!text-2xl lg:!text-2xl font-bold !text-[#F4C300]">Dumaraming Hipak.</h3>
        </header>

        <div class="flex-1 overflow-y-auto p-5">
            <div class="!text-base sm:!text-lg md:!text-lg lg:!text-xl leading-relaxed space-y-4">
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

    {{-- ===== PAGE 9: ARTICLE 2 - ANG IMPOSTOR ===== --}}
    <div x-show="page === 9" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h3 class="!text-lg sm:!text-xl md:!text-2xl lg:!text-2xl font-bold !text-[#F4C300]">Ang impostor na mapanlinlang</h3>
        </header>

        <div class="flex-1 overflow-y-auto p-5">
            <div class="!text-base sm:!text-lg md:!text-lg lg:!text-xl leading-relaxed space-y-4">
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

    {{-- ===== PAGE 10: ARTICLE 2 - TIGIL SA PAGPIPIGIL ===== --}}
    <div x-show="page === 10" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h3 class="!text-lg sm:!text-xl md:!text-2xl lg:!text-2xl font-bold !text-[#F4C300]">Tigil sa Pagpipigil</h3>
        </header>

        <div class="flex-1 overflow-y-auto p-5">
            <div class="!text-base sm:!text-lg md:!text-lg lg:!text-xl leading-relaxed space-y-4">
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