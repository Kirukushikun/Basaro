<!-- Main Content -->
<main class="flex-1 overflow-hidden pb-[50px] pt-[50px]" x-data="{ page: @entangle('page') }">
    <div class="h-full flex items-center justify-center">
        <div class="card flex flex-col items-center gap-5 relative text-lg max-h-[80vh]">
            
            <!-- One time show of Layunin only -->
            @if($lesson == 1)
                <!-- Title Section -->
                <div x-show="page === 1" class="absolute -top-6 left-1/2 -translate-x-1/2">
                    <div class="relative inline-block">
                        <h1 class="relative z-10 bg-[#F4C300] px-20 py-1 !text-black text-xl font-bold rounded-md border-2 border-[#31343A]">
                            PAUNANG SALITA
                        </h1>
                        
                        <!-- Decorative Ribbons -->
                        <img class="absolute z-0 -left-7 top-0" width="55" src="../Img/ribbon.png" alt="">
                        <img class="absolute z-0 -right-7 top-0 rotate-180" width="55" src="../Img/ribbon.png" alt="">
                    </div>
                </div>
                <!-- Scrollable Content Area -->
                <div x-show="page === 1" class="overflow-y-auto flex-1 flex flex-col gap-5 px-2 text-xl">
                    <p>
                        Ang Basaro ay isang interaktibong web-based na programa na idinisenyo upang tulungan ang mga bata sa kanilang pagsisimula sa pagbasa. Pinagsasama nito ang pagkatuto at paglalaro upang gawing mas masigla, makatawag-pansin, at kaiga-igaya ang bawat sesyon ng aralin.
                    </p>
                    
                    <p>
                        Sa tulong ng mga gawain sa pagkilala ng letra, pakikinig, at pagbigkas, unti-unting nahuhubog ang kakayahan ng mag-aaral na makilala ang mga letra at maiuugnay ang mga tunog nito—isang mahalagang hakbang sa pagbuo ng kasanayan sa pagbasa.
                    </p>

                    <p>
                        Layunin ng Basaro na maging katulong ng guro at kaagapay ng mag-aaral sa pagtuklas at paglinang ng kahusayan sa pagbasa sa paraang madali, malikhain, at nakakatuwa.
                    </p>

                    <p>
                        Samahan natin ang bawat batang mag-aaral sa kanilang paglalakbay tungo sa mas maayos at tiwalang pagbasa.
                    </p>
                </div>
            @endif

            <!-- Title Section -->
            <div x-show="page === 2" class="absolute -top-6 left-1/2 -translate-x-1/2">
                <div class="relative inline-block">
                    <h1 class="relative z-10 bg-[#F4C300] px-20 py-1 !text-black text-xl font-bold rounded-md border-2 border-[#31343A]">
                        LAYUNIN NG ARALIN
                    </h1>
                    
                    <!-- Decorative Ribbons -->
                    <img class="absolute z-0 -left-7 top-0" width="55" src="../Img/ribbon.png" alt="">
                    <img class="absolute z-0 -right-7 top-0 rotate-180" width="55" src="../Img/ribbon.png" alt="">
                </div>
            </div>
            <!-- Next Content -->
            <div x-show="page === 2" class="overflow-y-auto flex-1 flex flex-col gap-5 px-2 text-xl">
                <p class="!font-bold">Pagkatapos ng Sesyon, ikaw ay inaasahang:</p>
                <p class="ml-5"><span class="!text-[#F4C300]">1.</span> Nakikilala ang bawat letra sa Alpabetong Filipino.</p>
                <p class="ml-5"><span class="!text-[#F4C300]">2.</span> Nabibigkas ang wastong tunog ng mga letra.</p>
                <p class="ml-5"><span class="!text-[#F4C300]">3.</span> Nakakasunod sa mga simpleng tagubilin patungkol sa pagbasa at pagbigkas.</p>
                <p class="ml-5"><span class="!text-[#F4C300]">4.</span> Nabibigyang-halaga ang patuloy na pagsasanay bilang bahagi ng pagkatuto sa pagbasa.</p>
            </div>
            
            <!-- Action Button -->
            <div class="flex justify-between w-full mt-4">
                @if($lesson == 1)
                    <button
                        @click="page === 1 ? window.location.href = '/lessons' : page--"
                        class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold">
                        <i class="fa-solid fa-arrow-left !text-black"></i> Balik
                    </button>

                    <button x-show="page == 1" @click="page++"
                        :class="{ 'opacity-30 pointer-events-none': page === 2 }"
                        class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold">
                        Susunod <i class="fa-solid fa-arrow-right !text-black"></i>
                    </button>

                    <button x-show="page === 2" onclick="window.location.href='/lesson-view?lesson={{$lesson}}&slide=second-slide'"
                        class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold">
                        Magpatuloy
                        <i class="fa-solid fa-arrow-right !text-black"></i>
                    </button>
                @else 
                    <button
                        @click="window.location.href = '/lessons'"
                        class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold">
                        <i class="fa-solid fa-arrow-left !text-black"></i> Balik
                    </button>

                    <button onclick="window.location.href='/lesson-view?lesson={{$lesson}}&slide=second-slide'"
                        class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold">
                        Magpatuloy
                        <i class="fa-solid fa-arrow-right !text-black"></i>
                    </button>
                @endif

            </div>
        </div>
    </div>
</main>
