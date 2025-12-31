{{-- ===== LESSON 18: PAG-UNAWA SA BINASANG BALITA ===== --}}

<div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg">
    {{-- ===== PAGE 1: TITLE ===== --}}
    <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center">
            <h1 class="text-3xl font-bold text-center">
                <span class="!text-[#F4C300]">Sesyon 18:</span><br>
                Pag-unawa sa Binasang Balita
            </h1>
        </div>
    </div>

    {{-- ===== PAGE 2: ANO ANG BALITA ===== --}}
    <div x-show="page === 2" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold !text-[#F4C300]">
                Ano ang balita?
            </h1>
        </header>

        <div class="flex-1 flex items-center justify-center p-8">
            <p class="text-2xl font-semibold leading-relaxed text-center max-w-4xl">
                Ayon kay Wiliam S. Maulsby ang balita ay isang <span class="!text-[#F4C300]">makatotohanan</span> at <span class="!text-[#F4C300]">walang kinikilingan</span> na ulat ng mga kaganapan.
            </p>
        </div>
    </div>

    {{-- ===== PAGE 3: BALITA 1 - PART 1 ===== --}}
    <div x-show="page === 3" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h2 class="text-3xl font-bold !text-[#F4C300] text-center">"Quality ng pagtuturo ang habol ko" -Santiago</h2>
            <p class="text-xl text-center">ni Elvie M. Dimatulac</p>
        </header>

        <div class="flex-1 overflow-y-auto p-5">
            <div class="text-xl leading-relaxed space-y-4">
                <p>
                    "Maliban sa alumna ako ng Tarlac State University (TSU), nag-enrol ako ng MAEd- Filipino rito dahil 'yong quality ng pagtuturo ang habol ko." Ito ang naging tugon ni Anna Devina Yusi- Santiago sa kaniyang panayam kung bakit napili niyang mag-aral sa nasabing unibersidad.
                </p>
                <p>
                    Ayon sa kaniya ang bawat propesor ay may iba't ibang pamamaraan sa pagtuturo na nakatulong sa kaniyang propesyon.
                </p>
                <p>
                    "Yung qualifications ng university ay bonus na rin dahil sa layo na ng narating nito", dagdag pa niya.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 4: BALITA 1 - PART 2 ===== --}}
    <div x-show="page === 4" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <div class="flex-1 overflow-y-auto p-5">
            <div class="text-xl leading-relaxed space-y-4">
                <p>
                    June 2018 nang siya ay makapagtapos ng Master of Arts in Education, Major sa Filipino sa TSU na siyang naging daan upang ma-promote siya bilang T-III.
                </p>
                <p>
                    "For my personal growth ito at way ko na rin para may mapatunayan pa ako sa sarili ko in terms of academic matters," pahabol niya.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 5: TALASALITAAN ===== --}}
    <div x-show="page === 5" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h1 class="text-2xl font-bold !text-[#F4C300]">Talasalitaan:</h1>
        </header>

        <div class="flex-1 overflow-y-auto p-5">
            <div class="space-y-6 text-xl">
                <div class="bg-gray-800/50 p-4 rounded-lg border-2 border-[#F4C300]">
                    <p class="font-bold !text-[#F4C300] mb-2">1. Alumna</p>
                    <p>- babaeng dating mag-aaral o estudyante ng isang paaralan o unibersidad.</p>
                </div>
                <div class="bg-gray-800/50 p-4 rounded-lg border-2 border-[#F4C300]">
                    <p class="font-bold !text-[#F4C300] mb-2">2. Panayam</p>
                    <p>- nangangahulugang interbyu</p>
                </div>
                <div class="bg-gray-800/50 p-4 rounded-lg border-2 border-[#F4C300]">
                    <p class="font-bold !text-[#F4C300] mb-2">3. Propesor</p>
                    <p>- isang guro na may pinakamataas na ranggong akademiko sa kolehiyo o unibersidad.</p>
                </div>
                <div class="bg-gray-800/50 p-4 rounded-lg border-2 border-[#F4C300]">
                    <p class="font-bold !text-[#F4C300] mb-2">4. Propesyon</p>
                    <p>- uri ng trabaho o hanapbuhay</p>
                </div>
                <div class="bg-gray-800/50 p-4 rounded-lg border-2 border-[#F4C300]">
                    <p class="font-bold !text-[#F4C300] mb-2">5. T-III</p>
                    <p>- isang ranggo ng guro na ang ibig sabihin ay Teacher III.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 6: QUESTIONS ===== --}}
    <div x-show="page === 6" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <div class="flex-1 flex flex-col justify-center gap-6 overflow-y-auto p-5">
            <div class="bg-gray-800/50 p-4 rounded-lg border-2 border-[#F4C300]">
                <p class="text-xl font-semibold">1. Sino ang nagsulat ng binasang balita?</p>
            </div>
            <div class="bg-gray-800/50 p-4 rounded-lg border-2 border-[#F4C300]">
                <p class="text-xl font-semibold">2. Sino ang kaniyang ibinabalitang alumna ng TSU?</p>
            </div>
            <div class="bg-gray-800/50 p-4 rounded-lg border-2 border-[#F4C300]">
                <p class="text-xl font-semibold">3. Ano ang ibig sabihin ng akronim na TSU?</p>
            </div>
            <div class="bg-gray-800/50 p-4 rounded-lg border-2 border-[#F4C300]">
                <p class="text-xl font-semibold">4. Kailan siya nakapagtapos sa TSU?</p>
            </div>
            <div class="bg-gray-800/50 p-4 rounded-lg border-2 border-[#F4C300]">
                <p class="text-xl font-semibold">5. Ano ang kursong kaniyang natapos?</p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 7: BALITA 2 ===== --}}
    <div x-show="page === 7" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <div class="flex-1 overflow-y-auto p-5">
            <div class="text-xl leading-relaxed space-y-4">
                <p>
                    Dahil sa pangarap na umangat sa posisyon at magkaroon ng mataas na sweldo, nagsikap si Joy C. Ramos na makapagtapos ng Masters of Arts in Education, Major sa Filipino sa Tarlac State University, 2013.
                </p>
                <p>
                    "Bago ako nag-enrol sa MAEd, kumuha muna ako ng 18 units sa Filipino-undergrad kung saan naranasan kong nagsuot ng unipormeng pang-kolehiyo." Ito ang naging pahayag ni Ramos sa kaniyang panayam.
                </p>
                <p>
                    Kahit isa na siyang ganap na guro ay hindi niya ikinahiya na magsuot ng nasabing uniporme.
                </p>
                <p>
                    Nagkaroon siya ng pagkakatong makapag-aral naman ng post graduate nang maipasa niya ang Eduardo Cojuangco Foundation (ECF) scholarship exam para sa mga gurong nagnanais nito.
                </p>
                <p>
                    Pagkatapos ng ilang taon mula nang makapagtapos, na-promote siya at ngayon ay isa ng Master Teacher I (MT-I) sa Cristo Rey High School, Capas.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 8: REFLECTION ===== --}}
    <div x-show="page === 8" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex flex-col items-center justify-center gap-10 p-8">
            <p class="text-2xl font-semibold text-center">
                Naiintindihan mo ba ang dalawang balitang iyong nabasa?
            </p>
            <p class="text-2xl font-semibold text-center !text-[#F4C300]">
                Ano sa palagay mo ang headline o ulo ng balitang ito?
            </p>
        </div>
    </div>

    {{-- Navigation Buttons --}}
    @include('partials.lesson-navigation')
</div>