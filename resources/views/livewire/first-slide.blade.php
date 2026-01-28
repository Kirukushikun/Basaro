<!-- Main Content -->
<main class="flex-1 overflow-hidden pb-[50px] pt-[50px]"     
    x-data="{
        page: @entangle('page'),
        isFirstLesson: {{ $lesson == 1 ? 'true' : 'false' }},
        maxPage: {{ $lesson == 1 ? 2 : 2 }}
    }">
    <div class="h-full flex items-center justify-center">
        <div class="card flex flex-col items-center gap-5 relative text-lg max-h-[80vh] w-full max-w-4xl mb-7">
            
            <!-- One time show of Layunin only -->
            @if($lesson == 1)
                <div x-show="page === 1" class="flex-1 w-full flex flex-col min-h-0">
                    <!-- Title Section - Desktop (hidden below 554px) -->
                    <div class="absolute -top-6 left-1/2 -translate-x-1/2 hidden min-[554px]:block">
                        <div class="relative inline-block">
                            <h1 class="relative z-10 bg-[#F4C300] px-20 py-1 !text-black text-xl font-bold rounded-md border-2 border-[#31343A] whitespace-nowrap">
                                PAUNANG SALITA
                            </h1>
                            
                            <!-- Decorative Ribbons -->
                            <img class="absolute z-0 -left-7 top-0" width="55" src="{{asset('img/ribbon.png')}}" alt="">
                            <img class="absolute z-0 -right-7 top-0 rotate-180" width="55" src="{{asset('img/ribbon.png')}}" alt="">
                        </div>
                    </div>

                    <!-- Title Section - Mobile (shown below 554px) -->
                    <h2 class="text-center font-bold text-2xl !text-[#F4C300] min-[554px]:hidden mb-2">
                        PAUNANG SALITA
                    </h2>

                    <!-- Scrollable Content Area -->
                    <div class="overflow-y-auto flex-1 flex flex-col gap-5 px-2 text-xl overflow-x-hidden min-h-0 mt-8">
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
                </div>
            @endif

            <!-- Page 2 -->
            <div x-show="page === 2" class="flex-1 w-full flex flex-col min-h-0">
                <!-- Title Section - Desktop (hidden below 554px) -->
                <div class="absolute -top-6 left-1/2 -translate-x-1/2 hidden min-[554px]:block">
                    <div class="relative inline-block">
                        <h1 class="relative z-10 bg-[#F4C300] px-20 py-1 !text-black text-xl font-bold rounded-md border-2 border-[#31343A] whitespace-nowrap">
                            LAYUNIN NG ARALIN
                        </h1>
                        
                        <!-- Decorative Ribbons -->
                        <img class="absolute z-0 -left-7 top-0" width="55" src="{{asset('img/ribbon.png')}}" alt="">
                        <img class="absolute z-0 -right-7 top-0 rotate-180" width="55" src="{{asset('img/ribbon.png')}}" alt="">
                    </div>
                </div>
                <!-- Next Content -->
                <div class="overflow-y-auto flex-1 flex flex-col gap-5 px-2 text-xl min-h-0 mt-8">
                    <!-- Title Section - Mobile (shown below 554px) -->
                    <h2 class="text-center font-bold text-2xl !text-[#F4C300] min-[554px]:hidden mb-2">
                        LAYUNIN NG ARALIN
                    </h2>
                    <p class="!font-bold">Pagkatapos ng Sesyon, ikaw ay inaasahang:</p>
                    @foreach($layunin as $i => $goal)
                        <p class="ml-5"><span class="!text-[#F4C300]">{{ $i + 1 }}.</span> {{ $goal }}</p>
                    @endforeach
                </div>                
            </div>

            
            <!-- Action Button -->
            <div class="flex justify-between w-full mt-4 flex-shrink-0">

                <!-- BACK -->
                <button
                    @click="
                        if (page === 1 || !isFirstLesson) {
                            window.location.href = '/lessons'
                        } else {
                            page--
                        }
                    "
                    class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold"
                >
                    <i class="fa-solid fa-arrow-left !text-black"></i> Balik
                </button>

                <!-- NEXT / CONTINUE -->
                <template x-if="isFirstLesson">
                    <button
                        x-show="page < maxPage"
                        @click="page++"
                        class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold"
                    >
                        Susunod <i class="fa-solid fa-arrow-right !text-black"></i>
                    </button>
                </template>

                <button
                    x-show="(!isFirstLesson) || page === maxPage"
                    @click="window.location.href = '/lesson-view?lesson={{ encrypt($lesson) }}&slide=second-slide'"
                    class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold"
                >
                    Magpatuloy <i class="fa-solid fa-arrow-right !text-black"></i>
                </button>

            </div>
        </div>
    </div>
</main>