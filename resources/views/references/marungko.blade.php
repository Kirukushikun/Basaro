<main class="flex-1 overflow-hidden pb-[40px]">
    <div class="lessons md:pr-5 gap-4 md:gap-7 h-full overflow-y-auto">

        {{-- Back Navigation --}}
        <!-- <a href="/references" class="inline-flex items-center gap-2 text-sm text-white/60 hover:text-[#F4C300] transition-colors mb-4">
            <i class="fa-solid fa-arrow-left"></i> Bumalik sa References
        </a> -->

        {{-- Header Card --}}
        <div class="card flex items-center gap-4 mb-6">
            <div class="w-16 h-16 rounded-xl bg-[#F4C300] flex items-center justify-center shrink-0">
                <i class="fa-solid fa-graduation-cap text-black text-3xl"></i>
            </div>
            <div>
                <p class="text-xs uppercase tracking-wider text-[#F4C300] font-semibold mb-1">Reference Material</p>
                <h1 class="text-2xl md:text-3xl font-bold">Pamamaraang Marungko</h1>
            </div>
        </div>

        {{-- Main Content Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Left Column - Content --}}
            <div class="lg:col-span-2 flex flex-col gap-6">

                {{-- Ano ang Pamamaraang Marungko --}}
                <div class="card">
                    <div class="flex items-center gap-2 mb-4">
                        <i class="fa-solid fa-circle-info text-[#F4C300]"></i>
                        <h2 class="text-lg font-bold">Ano ang Pamamaraang Marungko?</h2>
                    </div>
                    <p class="text-white/80 leading-relaxed">
                        Ang <span class="text-white font-semibold">Pamamaraang Marungko</span> ay isang paraan ng pagtuturo ng pagbasa na unang ipinakilala sa isang 
                        pampublikong paaralang elementarya sa <span class="text-[#F4C300] font-semibold">Marungko, Angat, Bulacan</span>. 
                        Ito ay dinisenyo nina <span class="text-white font-semibold">Nooraihan Ali</span> at <span class="text-white font-semibold">Josefina Urbano</span>, 
                        at gumagamit ng pamamaraang <em>"phono-syllabic"</em> — ang pagtuturo ng tamang indibidwal na tunog at ang pagsasama-sama 
                        ng mga tunog upang makabuo ng mga pantig at salita.
                    </p>
                </div>

                {{-- Kasaysayan --}}
                <div class="card">
                    <div class="flex items-center gap-2 mb-4">
                        <i class="fa-solid fa-clock-rotate-left text-[#F4C300]"></i>
                        <h2 class="text-lg font-bold">Kasaysayan</h2>
                    </div>
                    <p class="text-white/80 leading-relaxed">
                        Nagsimula ang pamamaraan sa isang maliit na paaralan sa Bulacan at unti-unting kumalat sa buong bansa bilang 
                        isa sa mga pinaka-epektibong paraan ng pagtuturo ng panimulang pagbasa sa Filipino. 
                        Kalaunan, ito ay naging bahagi ng programa ng <span class="text-[#F4C300] font-semibold">DepEd</span> para sa 
                        mga mag-aaral sa unang baitang.
                    </p>
                </div>

                {{-- Paano Ginagamit --}}
                <div class="card">
                    <div class="flex items-center gap-2 mb-4">
                        <i class="fa-solid fa-chalkboard-user text-[#F4C300]"></i>
                        <h2 class="text-lg font-bold">Paano Ginagamit</h2>
                    </div>
                    <p class="text-white/80 leading-relaxed mb-6">
                        Ang pagkakasunud-sunod ng pagtuturo ng mga titik ay nakaayos ayon sa pinaka-madalas na lumilitaw na mga titik sa wikang Filipino. 
                        Sa ganitong paraan, maaari nang bumuo ang bata ng maikling salita pagkatapos lamang ng ilang aralin — 
                        halimbawa, ang <span class="text-[#F4C300] font-semibold">"masa"</span> at <span class="text-[#F4C300] font-semibold">"sama"</span> 
                        mula sa mga titik na M, S, at A.
                    </p>

                    {{-- Letter Order --}}
                    <p class="text-xs uppercase tracking-wider text-white/40 mb-3 font-semibold">Pagkakasunud-sunod ng Mga Titik</p>
                    <div class="grid grid-cols-5 sm:grid-cols-10 gap-2 mb-6">
                        @foreach(['M','S','A','I','O','B','E','U','T','K','L','Y','N','G','Ng','P','R','D','H','W'] as $index => $titik)
                            <div class="rounded-lg py-3 px-2 text-center border border-white/10 bg-white/5 hover:border-[#F4C300]/50 transition-colors">
                                <span class="text-[10px] text-white/30 block mb-1">{{ $index + 1 }}</span>
                                <span class="text-base font-bold text-[#F4C300]">{{ $titik }}</span>
                            </div>
                        @endforeach
                    </div>

                    {{-- 5 Stages --}}
                    <p class="text-xs uppercase tracking-wider text-white/40 mb-3 font-semibold">Limang Antas ng Pagbasa</p>
                    <div class="flex flex-col gap-3">
                        @foreach([
                            ['1', 'Pagpapakilala ng titik at tunog'],
                            ['2', 'Pagbuo ng mga salita'],
                            ['3', 'Pagkilala ng mga pantulong na kataga'],
                            ['4', 'Pagbuo ng mga pangungusap'],
                            ['5', 'Pagbasa ng maikling kuwento'],
                        ] as $stage)
                            <div class="flex items-center gap-3 rounded-xl px-4 py-3 border border-white/10 bg-white/5">
                                <div class="w-8 h-8 rounded-full bg-[#F4C300] text-black font-bold text-sm flex items-center justify-center shrink-0">
                                    {{ $stage[0] }}
                                </div>
                                <span class="text-white/80">{{ $stage[1] }}</span>
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
                        <img src="{{ asset('img/references/marungko-1.jpg') }}" 
                             alt="Pamamaraang Marungko" 
                             class="w-full h-full object-cover"
                             onerror="this.parentElement.innerHTML='<div class=\'text-white/40 text-sm text-center p-6\'><i class=\'fa-solid fa-image text-4xl mb-2 block\'></i></div>'"
                        >
                    </div>

                    {{-- Image 2 --}}
                    <div class="rounded-xl overflow-hidden aspect-square flex items-center justify-center border border-white/10 bg-white/5">
                        <img src="{{ asset('img/references/marungko-2.jpg') }}" 
                             alt="Marungko Booklet" 
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