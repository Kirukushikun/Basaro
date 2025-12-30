{{-- ===== LESSON 16: PAG-UNAWA SA BINASANG TULA ===== --}}

<div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg">
    {{-- ===== PAGE 1: TITLE ===== --}}
    <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center">
            <h1 class="text-4xl font-bold text-center">
                <span class="!text-[#F4C300]">Sesyon 16:</span><br>
                Pag-unawa sa Binasang Tula
            </h1>
        </div>
    </div>

    {{-- ===== PAGE 2: KAPAMPANGAN POEM ===== --}}
    <div x-show="page === 2" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex flex-col items-center justify-center gap-8">
            <div class="bg-gray-800/50 p-10 rounded-lg border-2 border-[#F4C300] w-full max-w-3xl">
                <h2 class="text-4xl font-bold !text-[#F4C300] text-center mb-2">Lugud ning Indu</h2>
                <p class="text-xl text-center mb-8">Jay-R C. Guinto</p>
                
                <div class="text-3xl leading-loose text-center space-y-3">
                    <p>Ika, O kakung Indu,</p>
                    <p>Megkandili't tinuru,</p>
                    <p>Andyang masyas ku bungu,</p>
                    <p>Lagi mung tuturu,</p>
                    <p>Na dapat kung abalu.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 3: ANO ANG TULA ===== --}}
    <div x-show="page === 3" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center">
            <h1 class="text-5xl font-bold !text-[#F4C300]">
                Ano ang tula?
            </h1>
        </div>
    </div>

    {{-- ===== PAGE 4: TULA DEFINITION ===== --}}
    <div x-show="page === 4" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center p-8">
            <div class="bg-gray-800/50 p-10 rounded-lg border-2 border-[#F4C300] max-w-4xl">
                <p class="text-3xl font-semibold leading-relaxed text-center">
                    Ang <span class="!text-[#F4C300]">TULA</span> ay isang anyo ng sining o panitikan na naglalayong maipahayag ang damdamin sa malayang pagsusulat.
                </p>
                <div class="border-t-2 border-gray-600 pt-8 mt-8">
                    <p class="text-3xl font-bold text-center">
                        Binubuo ng <span class="!text-[#F4C300]">saknong</span> at <span class="!text-[#F4C300]">taludtod</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 5: FILIPINO TRANSLATION ===== --}}
    <div x-show="page === 5" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex flex-col items-center justify-center gap-8 p-8">
            <div class="bg-gray-800/50 p-10 rounded-lg border-2 border-[#F4C300] w-full max-w-3xl">
                <h2 class="text-4xl font-bold !text-[#F4C300] text-center mb-2">Pag-ibig ng Ina</h2>
                <p class="text-xl text-center mb-8">Isinalin ni Elvie M. Dimatulac</p>
                
                <div class="text-3xl leading-loose text-center space-y-3">
                    <p>Ikaw, O ina ko,</p>
                    <p>Nagkandili't nagturo,</p>
                    <p>Matigas man ang aking bungo,</p>
                    <p>Lagi ka pa ring nagtuturo,</p>
                    <p>Sa mga dapat na mapagtanto.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 6: KASINGKAHULUGAN ===== --}}
    <div x-show="page === 6" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center p-8">
            <div class="grid grid-cols-2 gap-10 text-3xl w-full max-w-4xl">
                <div class="bg-gray-800/50 p-6 rounded-lg border-2 border-[#F4C300]">
                    <span class="font-bold !text-[#F4C300]">Pag-ibig</span>
                    <span class="mx-3">-</span>
                    <span>pagmamahal</span>
                </div>
                
                <div class="bg-gray-800/50 p-6 rounded-lg border-2 border-[#F4C300]">
                    <span class="font-bold !text-[#F4C300]">Nagkandili</span>
                    <span class="mx-3">-</span>
                    <span>nag-alaga</span>
                </div>
                
                <div class="bg-gray-800/50 p-6 rounded-lg border-2 border-[#F4C300]">
                    <span class="font-bold !text-[#F4C300]">Bungo</span>
                    <span class="mx-3">-</span>
                    <span>ulo</span>
                </div>
                
                <div class="bg-gray-800/50 p-6 rounded-lg border-2 border-[#F4C300]">
                    <span class="font-bold !text-[#F4C300]">Mapagtanto</span>
                    <span class="mx-3">-</span>
                    <span>malaman</span>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 7: QUESTIONS ===== --}}
    <div x-show="page === 7" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <div class="flex-1 flex flex-col justify-center gap-6 overflow-y-auto p-8">
            <div class="bg-gray-800/50 p-6 rounded-lg border-2 border-[#F4C300]">
                <p class="text-2xl font-semibold">1. Ano ang pamagat ng tula?</p>
            </div>
            
            <div class="bg-gray-800/50 p-6 rounded-lg border-2 border-[#F4C300]">
                <p class="text-2xl font-semibold">2. Sino ang sumulat ng tula?</p>
            </div>
            
            <div class="bg-gray-800/50 p-6 rounded-lg border-2 border-[#F4C300]">
                <p class="text-2xl font-semibold">3. Sa iyong palagay, sino ang nagsasalita sa tula?</p>
            </div>
            
            <div class="bg-gray-800/50 p-6 rounded-lg border-2 border-[#F4C300]">
                <p class="text-2xl font-semibold">4. Sino ang kinakausap niya sa tula?</p>
            </div>
            
            <div class="bg-gray-800/50 p-6 rounded-lg border-2 border-[#F4C300]">
                <p class="text-2xl font-semibold">5. Sino raw ang matigas ang bungo?</p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 8: SINAG AT LAKAS ===== --}}
    <div x-show="page === 8" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <div class="flex-1 flex flex-col items-center justify-center overflow-y-auto p-8">
            <div class="bg-gray-800/50 p-10 rounded-lg border-2 border-[#F4C300] w-full max-w-4xl">
                <h2 class="text-4xl font-bold !text-[#F4C300] text-center mb-2">Sinag at Lakas</h2>
                <p class="text-xl text-center mb-8">Elvie M. Dimatulac</p>
                
                <div class="space-y-10">
                    <div class="text-2xl leading-loose">
                        <p>Isang maningning na ilaw, sa buhay ko'y tumatanglaw</p>
                        <p>Mula pa noong mga araw na ang isipa'y isang ampaw!</p>
                        <p>Sa aking kamusmusan ako'y di pinabayaan,</p>
                        <p>Siya na maningning kong ilaw, pagkalinga'y di pumanaw.</p>
                    </div>

                    <div class="text-2xl leading-loose">
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