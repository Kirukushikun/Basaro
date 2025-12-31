{{-- ===== LESSON 17: PAG-UNAWA SA BINASANG MAIKLING KUWENTO ===== --}}

<div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg" x-data="{
    answers: {
        q1: null,
        q2: null,
        q3: null,
        q4: null,
        q5: null
    },
    selectAnswer(question, answer) {
        this.answers[question] = answer;
    }
}">
    {{-- ===== PAGE 1: TITLE ===== --}}
    <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center">
            <h1 class="text-3xl font-bold text-center">
                <span class="!text-[#F4C300]">Sesyon 17:</span><br>
                Pag-unawa sa Binasang Maikling Kuwento
            </h1>
        </div>
    </div>

    {{-- ===== PAGE 2: STORY 1 ===== --}}
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

    {{-- ===== PAGE 3: TALASALITAAN ===== --}}
    <div x-show="page === 3" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-2xl font-bold !text-[#F4C300]">Talasalitaan:</h1>
        </header>
        
        <div class="flex-1 flex items-center justify-center">
            <div class="space-y-6 text-2xl w-full max-w-3xl">
                <div class="bg-gray-800/50 p-6 rounded-lg border-2 border-[#F4C300] flex items-center gap-6">
                    <span class="font-bold !text-[#F4C300]">Bumangon</span>
                    <span>–</span>
                    <span>tumayo</span>
                </div>
                <div class="bg-gray-800/50 p-6 rounded-lg border-2 border-[#F4C300] flex items-center gap-6">
                    <span class="font-bold !text-[#F4C300]">Pangangantiyaw</span>
                    <span>–</span>
                    <span>panunukso</span>
                </div>
                <div class="bg-gray-800/50 p-6 rounded-lg border-2 border-[#F4C300] flex items-center gap-6">
                    <span class="font-bold !text-[#F4C300]">Naulinigan</span>
                    <span>–</span>
                    <span>narinig</span>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 4: ALL QUESTIONS ===== --}}
    <div x-show="page === 4" class="w-full flex-1 flex flex-col gap-4 px-2 min-h-0">
        <div class="flex-1 overflow-y-auto p-5 space-y-8">
            {{-- Question 1 --}}
            <div class="space-y-4">
                <p class="text-xl font-semibold !text-gray-200">
                    1. Sino ang dahan-dahang bumangon ng higaan?
                </p>
                <div class="grid grid-cols-3 gap-4">
                    <div @click="selectAnswer('q1', 'A')" 
                         :class="answers.q1 === 'A' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-2 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="text-xl font-bold">A. Kyel</p>
                    </div>
                    <div @click="selectAnswer('q1', 'B')" 
                         :class="answers.q1 === 'B' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-2 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="text-xl font-bold">B. Ken</p>
                    </div>
                    <div @click="selectAnswer('q1', 'C')" 
                         :class="answers.q1 === 'C' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-2 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="text-xl font-bold">C. kuya</p>
                    </div>
                </div>
            </div>

            {{-- Question 2 --}}
            <div class="space-y-4">
                <p class="text-xl font-semibold !text-gray-200">
                    2. Ano ang kaniyang unang ginawa bago dumiretso sa lababo ng kusina?
                </p>
                <div class="grid grid-cols-3 gap-4">
                    <div @click="selectAnswer('q2', 'A')" 
                         :class="answers.q2 === 'A' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-2 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="text-lg font-bold">A. umiyak sa kuwarto</p>
                    </div>
                    <div @click="selectAnswer('q2', 'B')" 
                         :class="answers.q2 === 'B' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-2 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="text-lg font-bold">B. Ngumiti na lang</p>
                    </div>
                    <div @click="selectAnswer('q2', 'C')" 
                         :class="answers.q2 === 'C' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-2 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="text-lg font-bold">C. nag-ayos ng higaan</p>
                    </div>
                </div>
            </div>

            {{-- Question 3 --}}
            <div class="space-y-4">
                <p class="text-xl font-semibold !text-gray-200">
                    3. Sino ang kaniyang nakasalubong?
                </p>
                <div class="grid grid-cols-3 gap-4">
                    <div @click="selectAnswer('q3', 'A')" 
                         :class="answers.q3 === 'A' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-2 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="text-xl font-bold">A. si kuya Kyel</p>
                    </div>
                    <div @click="selectAnswer('q3', 'B')" 
                         :class="answers.q3 === 'B' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-2 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="text-xl font-bold">B. si nanay</p>
                    </div>
                    <div @click="selectAnswer('q3', 'C')" 
                         :class="answers.q3 === 'C' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-2 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="text-xl font-bold">C. si tatay</p>
                    </div>
                </div>
            </div>

            {{-- Question 4 --}}
            <div class="space-y-4">
                <p class="text-xl font-semibold !text-gray-200">
                    4. Bakit bumangon nang maaga ang pangunahing tauhan sa kuwento?
                </p>
                <div class="grid grid-cols-3 gap-4">
                    <div @click="selectAnswer('q4', 'A')" 
                         :class="answers.q4 === 'A' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-2 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="text-lg font-bold">A. para kumain</p>
                    </div>
                    <div @click="selectAnswer('q4', 'B')" 
                         :class="answers.q4 === 'B' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-2 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="text-lg font-bold">B. dahil ayaw niyang mahuli sa pagpasok sa paaralan</p>
                    </div>
                    <div @click="selectAnswer('q4', 'C')" 
                         :class="answers.q4 === 'C' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-2 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="text-lg font-bold">C. dahil tinawag na sila ng kanilang nanay</p>
                    </div>
                </div>
            </div>

            {{-- Question 5 --}}
            <div class="space-y-4">
                <p class="text-xl font-semibold !text-gray-200">
                    5. Bakit sila tinawag ng kanilang ina?
                </p>
                <div class="grid grid-cols-3 gap-4">
                    <div @click="selectAnswer('q5', 'A')" 
                         :class="answers.q5 === 'A' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-2 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="text-xl font-bold">A. Para bumiyahe</p>
                    </div>
                    <div @click="selectAnswer('q5', 'B')" 
                         :class="answers.q5 === 'B' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-2 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="text-xl font-bold">B. Para maligo</p>
                    </div>
                    <div @click="selectAnswer('q5', 'C')" 
                         :class="answers.q5 === 'C' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-2 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="text-xl font-bold">C. para kumain</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 5: STORY 2 - PART 1 ===== --}}
    <div x-show="page === 5" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
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

    {{-- ===== PAGE 6: STORY 2 - PART 2 ===== --}}
    <div x-show="page === 6" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
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

    {{-- ===== PAGE 7: REFLECTION QUESTIONS ===== --}}
    <div x-show="page === 7" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex flex-col items-center justify-center gap-10 p-8">
            <p class="text-2xl font-semibold text-center">
                Ikaw, nananalangin ka rin ba sa Panginoon?
            </p>
            <p class="text-2xl font-semibold text-center">
                Bakit kailangang manalangin sa Diyos?
            </p>
        </div>
    </div>

    {{-- Navigation Buttons --}}
    @include('partials.lesson-navigation')
</div>