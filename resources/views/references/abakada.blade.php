<main class="flex-1 overflow-hidden pb-[40px]">
    <div class="lessons md:pr-5 gap-4 md:gap-7 h-full overflow-y-auto">

        {{-- Back Navigation --}}
        <!-- <a href="/references" class="inline-flex items-center gap-2 text-sm text-white/60 hover:text-[#F4C300] transition-colors mb-4">
            <i class="fa-solid fa-arrow-left"></i> Bumalik sa References
        </a> -->

        {{-- Header Card --}}
        <div class="card flex items-center gap-4 mb-6">
            <div class="w-16 h-16 rounded-xl bg-[#F4C300] flex items-center justify-center shrink-0">
                <i class="fa-solid fa-book-open text-black text-3xl"></i>
            </div>
            <div>
                <p class="text-xs uppercase tracking-wider text-[#F4C300] font-semibold mb-1">Reference Material</p>
                <h1 class="text-2xl md:text-3xl font-bold">Aklat ng Abakada</h1>
            </div>
        </div>

        {{-- Main Content Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Left Column - Content --}}
            <div class="lg:col-span-2 flex flex-col gap-6">

                {{-- Ano ang Aklat ng Abakada --}}
                <div class="card">
                    <div class="flex items-center gap-2 mb-4">
                        <i class="fa-solid fa-circle-info text-[#F4C300]"></i>
                        <h2 class="text-lg font-bold">Ano ang Aklat ng Abakada?</h2>
                    </div>
                    <p class="text-white/80 leading-relaxed">
                        Ang <span class="text-white font-semibold">Aklat ng Abakada</span> ay isang pangunahing kagamitan sa pagtuturo ng pagbasa at pagsulat sa wikang Filipino. 
                        Ito ay naglalaman ng <span class="text-[#F4C300] font-semibold">20 titik</span> ng tradisyonal na alpabeto ng wikang pambansa — 
                        limang patinig (<strong>A, E, I, O, U</strong>) at labinlimang katinig.
                    </p>
                </div>

                {{-- Kasaysayan --}}
                <div class="card">
                    <div class="flex items-center gap-2 mb-4">
                        <i class="fa-solid fa-clock-rotate-left text-[#F4C300]"></i>
                        <h2 class="text-lg font-bold">Kasaysayan</h2>
                    </div>
                    <p class="text-white/80 leading-relaxed">
                        Ang Abakada ay isang "pinakatutubong" alpabetong Latin na pormal na pinagtibay noong 
                        <span class="text-white font-semibold">1939</span> para sa Wikang Pambansa na nakabatay sa Tagalog. 
                        Ang 20 titik nito ay ipinakilala sa aklat ng balarila na binuo ni 
                        <span class="text-[#F4C300] font-semibold">Lope K. Santos</span>. 
                        Naging pangunahing kasangkapan ito sa pagtuturo ng wika sa loob ng maraming henerasyon ng mga mag-aaral sa buong Pilipinas.
                    </p>
                </div>

                {{-- Paano Ginagamit --}}
                <div class="card">
                    <div class="flex items-center gap-2 mb-4">
                        <i class="fa-solid fa-chalkboard-user text-[#F4C300]"></i>
                        <h2 class="text-lg font-bold">Paano Ginagamit</h2>
                    </div>
                    <p class="text-white/80 leading-relaxed mb-6">
                        Ginagamit ang Aklat ng Abakada sa paaralan upang turuan ang mga bata ng wastong pagbigkas ng bawat titik, 
                        pagbabaybay, at panimulang pagbasa. Itinuturo ang bawat titik na may kasamang tunog nito:
                    </p>

                    {{-- Letter Grid --}}
                    <p class="text-xs uppercase tracking-wider text-white/40 mb-3 font-semibold">Mga Titik at Tunog</p>
                    <div class="grid grid-cols-4 sm:grid-cols-5 gap-2">
                        @foreach(['A-a','B-ba','K-ka','D-da','E-e','G-ga','H-ha','I-i','L-la','M-ma','N-na','Ng-nga','O-o','P-pa','R-ra','S-sa','T-ta','U-u','W-wa','Y-ya'] as $titik)
                            <div class="rounded-lg py-3 px-3 text-center border border-white/10 bg-white/5 hover:border-[#F4C300]/50 transition-colors">
                                <span class="text-sm font-bold text-[#F4C300]">{{ $titik }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

            {{-- Right Column - Images --}}
            <div class="flex flex-col gap-6">
                <div class="card">
                    <p class="text-xs uppercase tracking-wider text-white/40 mb-4 font-semibold">Mga Larawan</p>

                    {{-- Image 1 --}}
                    <div class="rounded-xl overflow-hidden mb-4 aspect-square flex items-center justify-center border border-white/10 bg-white/5">
                        <img src="{{ asset('img/references/abakada-1.jpg') }}" 
                             alt="Aklat ng Abakada" 
                             class="w-full h-full object-cover"
                             onerror="this.parentElement.innerHTML='<div class=\'text-white/40 text-sm text-center p-6\'><i class=\'fa-solid fa-image text-4xl mb-2 block\'></i></div>'"
                        >
                    </div>

                    {{-- Image 2 --}}
                    <div class="rounded-xl overflow-hidden aspect-square flex items-center justify-center border border-white/10 bg-white/5">
                        <img src="{{ asset('img/references/abakada-2.jpg') }}" 
                             alt="Mga Titik ng Abakada" 
                             class="w-full h-full object-cover"
                             onerror="this.parentElement.innerHTML='<div class=\'text-white/40 text-sm text-center p-6\'><i class=\'fa-solid fa-image text-4xl mb-2 block\'></i></div>'"
                        >
                    </div>

                    <p class="text-xs text-white/30 mt-4 text-center">Larawan mula sa Google</p>
                </div>
            </div>

        </div>
    </div>
</main>