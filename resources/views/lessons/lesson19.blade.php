{{-- ===== LESSON 19: PAG-UNAWA SA BINASANG EDITORYAL ===== --}}

<div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg" x-data="{
    answers: {
        q1: null,
        q2: null,
        q3: null,
        q4: null,
        q5: null
    },
    puzzleAnswers: {
        p1: '',
        p2: '',
        p3: '',
        p4: '',
        p5: ''
    },
    correctAnswers: {
        p1: 'nagtatatag',
        p2: 'opinyon',
        p3: 'kalagayan',
        p4: 'maingat',
        p5: 'pag-una'
    },
    selectAnswer(question, answer) {
        this.answers[question] = answer;
    },
    checkPuzzle(key) {
        const input = this.puzzleAnswers[key].toLowerCase().trim();
        const correct = this.correctAnswers[key].toLowerCase();
        return input === correct;
    },
    getPuzzleClass(key) {
        if (!this.puzzleAnswers[key]) return 'border-gray-400';
        return this.checkPuzzle(key) ? 'border-[#F4C300] bg-[#F4C300]/20' : 'border-red-500 bg-red-500/20';
    }
}">
    {{-- ===== PAGE 1: TITLE ===== --}}
    <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center">
            <h1 class="text-3xl font-bold text-center">
                <span class="!text-[#F4C300]">Sesyon 19:</span><br>
                Pag-unawa sa Binasang Editoryal
            </h1>
        </div>
    </div>

    {{-- ===== PAGE 2: ANO ANG EDITORYAL ===== --}}
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

    {{-- ===== PAGE 3: EDITORYAL 1 - PART 1 ===== --}}
    <div x-show="page === 3" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h2 class="text-3xl font-bold !text-[#F4C300] text-center">TUITION FEE, LIBRE</h2>
            <p class="text-xl text-center">Elvie M. Dimatulac</p>
        </header>

        <div class="flex-1 overflow-y-auto p-5">
            <div class="text-xl leading-relaxed space-y-4">
                <p>
                    Ipinakilala ni Senador Paolo Benigno "Bam" Aquino ang Senate Bill No. 177 na nagtatadhana ng libreng tuition fee para sa mga estudyante na naka-enrol sa mga State Universities and Colleges (SUCs). Ito ay nakapagpataas ng moral ng mga masang Pilipino na naniniwalang ang pagtatapos sa tertiary education ay nakapagpapaangat ng kalagayan sa buhay.
                </p>
                <p>
                    Sa pananaw ng Kinatawan ng Kabataan na si Sarah Elago, ang "Free Higher Education for All Act" ay isang hakbang sa matuwid na direksiyon para sa SUCs. Kaya naman, ang pagpapatupad nito ay isang malaking bagay para sa mga estudyante at mga magulang at dapat masunod para sa kanilang kapakinabangan.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 4: EDITORYAL 1 - PART 2 ===== --}}
    <div x-show="page === 4" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <div class="flex-1 overflow-y-auto p-5">
            <div class="text-xl leading-relaxed space-y-4">
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

    {{-- ===== PAGE 5: ANALYSIS ===== --}}
    <div x-show="page === 5" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <div class="flex-1 overflow-y-auto p-5">
            <div class="text-xl leading-relaxed space-y-4">
                <p>
                    Sa editoryal na ito ang opinya ng mga editor na matatagpuan sa Introduksyon o sa unang talata ay ang, <span class="!text-[#F4C300]">"Ito ay nakapagpataas ng moral ng mga masang Pilipino na naniniwalang ang pagtatapos sa tertiary education ay nakapagpapaangat ng kalagayan sa buhay."</span>
                </p>
                <p>
                    Ang newspeg o batayang balita naman ay ang, <span class="!text-[#F4C300]">"Ipinakilala ni Senador Paolo Benigno "Bam" Aquino ang Senate Bill No. 177 na nagtatadhana ng libreng tuition fee para sa mga estudyante na naka-enrol sa mga State Universities and Colleges (SUCs)."</span>
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 6: PUZZLE ===== --}}
    <div x-show="page === 6" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <p class="text-xl font-semibold !text-gray-200">
                Buoin ang puzzle upang malaman ang kasingkahulugan:
            </p>
        </header>

        <div class="flex-1 flex flex-col justify-center gap-6 overflow-y-auto p-5">
            <div class="flex items-center gap-6 text-xl">
                <span class="font-bold !text-[#F4C300] w-48">Nagtatadhana</span>
                <input type="text" x-model="puzzleAnswers.p1" 
                       :class="getPuzzleClass('p1')"
                       class="flex-1 px-4 py-2 bg-gray-800/50 border-2 rounded-lg text-2xl transition-colors"
                       placeholder="n a g t a t a t a g">
            </div>

            <div class="flex items-center gap-6 text-xl">
                <span class="font-bold !text-[#F4C300] w-48">Pananaw</span>
                <input type="text" x-model="puzzleAnswers.p2" 
                       :class="getPuzzleClass('p2')"
                       class="flex-1 px-4 py-2 bg-gray-800/50 border-2 rounded-lg text-2xl transition-colors"
                       placeholder="o p i n y o n">
            </div>

            <div class="flex items-center gap-6 text-xl">
                <span class="font-bold !text-[#F4C300] w-48">Estado</span>
                <input type="text" x-model="puzzleAnswers.p3" 
                       :class="getPuzzleClass('p3')"
                       class="flex-1 px-4 py-2 bg-gray-800/50 border-2 rounded-lg text-2xl transition-colors"
                       placeholder="k a l a g a y a n">
            </div>

            <div class="flex items-center gap-6 text-xl">
                <span class="font-bold !text-[#F4C300] w-48">Masinop</span>
                <input type="text" x-model="puzzleAnswers.p4" 
                       :class="getPuzzleClass('p4')"
                       class="flex-1 px-4 py-2 bg-gray-800/50 border-2 rounded-lg text-2xl transition-colors"
                       placeholder="m a i n g a t">
            </div>

            <div class="flex items-center gap-6 text-xl">
                <span class="font-bold !text-[#F4C300] w-48">Prayoridad</span>
                <input type="text" x-model="puzzleAnswers.p5" 
                       :class="getPuzzleClass('p5')"
                       class="flex-1 px-4 py-2 bg-gray-800/50 border-2 rounded-lg text-2xl transition-colors"
                       placeholder="p a g - u n a">
            </div>
        </div>
    </div>

    {{-- ===== PAGE 7: QUESTIONS ===== --}}
    <div x-show="page === 7" class="w-full flex-1 flex flex-col gap-4 px-2 min-h-0">
        <div class="flex-1 overflow-y-auto p-5 space-y-6">
            {{-- Question 1 --}}
            <div class="space-y-3">
                <p class="text-xl font-semibold !text-gray-200">
                    Ano ang bill na ipinakilala ni Sen. Bam Aquino?
                </p>
                <div class="grid grid-cols-2 gap-4">
                    <div @click="selectAnswer('q1', 'A')" 
                         :class="answers.q1 === 'A' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="text-xl font-bold">Senate Bill No. 177</p>
                    </div>
                    <div @click="selectAnswer('q1', 'B')" 
                         :class="answers.q1 === 'B' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="text-xl font-bold">Senate Bill No. 711</p>
                    </div>
                </div>
            </div>

            {{-- Question 2 --}}
            <div class="space-y-3">
                <p class="text-xl font-semibold !text-gray-200">
                    Sino ang naniniwalang ang "Free Higher Education for All Act" ay isang hakbang sa matuwid na direksiyon para sa SUCs?
                </p>
                <div class="grid grid-cols-2 gap-4">
                    <div @click="selectAnswer('q2', 'A')" 
                         :class="answers.q2 === 'A' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="text-xl font-bold">Sarah Elago</p>
                    </div>
                    <div @click="selectAnswer('q2', 'B')" 
                         :class="answers.q2 === 'B' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="text-xl font-bold">Sarah Elegado</p>
                    </div>
                </div>
            </div>

            {{-- Question 3 --}}
            <div class="space-y-3">
                <p class="text-xl font-semibold !text-gray-200">
                    Sino lamang ang prayoridad ng nasabing batas?
                </p>
                <div class="grid grid-cols-2 gap-4">
                    <div @click="selectAnswer('q3', 'A')" 
                         :class="answers.q3 === 'A' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="text-xl font-bold">Estudyanteng mahihirap</p>
                    </div>
                    <div @click="selectAnswer('q3', 'B')" 
                         :class="answers.q3 === 'B' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="text-xl font-bold">estudyanteng mayayaman</p>
                    </div>
                </div>
            </div>

            {{-- Question 4 --}}
            <div class="space-y-3">
                <p class="text-xl font-semibold !text-gray-200">
                    Ano ang dapat gawin ng mga mag-aaral upang makamit ang libreng tuition fee?
                </p>
                <div class="grid grid-cols-2 gap-4">
                    <div @click="selectAnswer('q4', 'A')" 
                         :class="answers.q4 === 'A' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="text-xl font-bold">Magsumikap mag-aral</p>
                    </div>
                    <div @click="selectAnswer('q4', 'B')" 
                         :class="answers.q4 === 'B' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="text-xl font-bold">magtambay</p>
                    </div>
                </div>
            </div>

            {{-- Question 5 --}}
            <div class="space-y-3">
                <p class="text-xl font-semibold !text-gray-200">
                    Ano naman ang bahagi ng mga magulang para rito?
                </p>
                <div class="grid grid-cols-2 gap-4">
                    <div @click="selectAnswer('q5', 'A')" 
                         :class="answers.q5 === 'A' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="text-xl font-bold">Masinop na paggabay</p>
                    </div>
                    <div @click="selectAnswer('q5', 'B')" 
                         :class="answers.q5 === 'B' ? 'bg-[#F4C300] text-black' : 'bg-gray-800/50'"
                         class="p-4 rounded-lg border-2 border-[#F4C300] cursor-pointer hover:scale-105 transition-transform text-center">
                        <p class="text-xl font-bold">masinop na opinya</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 8: EDITORYAL 2 - PART 1 ===== --}}
    <div x-show="page === 8" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h2 class="text-3xl font-bold !text-[#F4C300] text-center">Edu-Aksyon</h2>
            <p class="text-xl text-center">Jay Andrei Capuno</p>
        </header>

        <div class="flex-1 overflow-y-auto p-5">
            <div class="text-xl leading-relaxed space-y-4">
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

    {{-- ===== PAGE 9: EDITORYAL 2 - PART 2 ===== --}}
    <div x-show="page === 9" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <div class="flex-1 overflow-y-auto p-5">
            <div class="text-xl leading-relaxed space-y-4">
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