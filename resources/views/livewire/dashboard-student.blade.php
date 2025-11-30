<main class="flex-1 overflow-hidden mb-10">
    <div class="lessons flex flex-col gap-7 overflow-y-auto h-full !pr-5 lg:pr-0">
        <div class="card flex flex-col gap-6">
            <div class="header">
                <p class="text-lg !text-gray-400">Current Lesson:</p>
                <h1 class="text-2xl font-bold">Lesson {{$lesson->order}}: {{$lesson->title}}</h1>
                <h2 class="text-sm w-fit mt-2 px-2 py-1 border border-2 border-green-600 bg-green-900 rounded-md">Level {{$lesson->order}} - Beginner</h2>
            </div>

            <div class="description">
                {{$lesson->description}}
            </div>

            <div class="footer flex flex-col gap-4">
                <div class="flex justify-between">
                    <p class="!text-gray-400">Your progress:</p>
                    <p class="!text-gray-400">{{Auth::user()->current_progress}}%</p>
                </div>

                <div class="bg-gray-600 h-2 rounded-md">
                    <div class="w-[0%] bg-[#F4C300] h-full rounded-md"></div>
                </div>

                <button class="w-fit !text-black px-4 py-2 bg-[#F4C300] text-gray-900 rounded-md font-bold" onclick="window.location.href='/lesson-view?lesson={{$lesson->order}}&slide=first-slide'">
                    Start Lesson
                </button>
            </div>
        </div>
        <div class="flex-1 grid grid-cols-1 lg:grid-cols-3 gap-7">
            <div class="card">
                @php 
                    $lessonGoals = [
                        1 => [
                            "Makilala ang bawat letra sa Alpabetong Filipino",
                            "Mabigkas ang wastong tunog ng mga letra",
                            "Makasunod sa mga simpleng tagubilin patungkol sa pagbasa at pagbigkas",
                        ],

                        2 => [
                            "Matukoy ang limang patinig sa Alpabetong Filipino",
                            "Mabigkas nang tama ang bawat patinig sa iba’t ibang tunog",
                            "Makagamit ng mga patinig sa mga simpleng tunog at pantig",
                        ],

                        3 => [
                            "Makilala ang mga katinig sa alpabeto",
                            "Mabigkas ang wastong tunog ng bawat katinig",
                            "Makaunawa sa pagkakaiba ng tunog-patinig at tunog-katinig",
                        ],

                        4 => [
                            "Makilala ang tunog ng M, S, at A",
                            "Mabigkas nang malinaw ang mga tunog na ito",
                            "Makapagsanib ng tunog upang mabuo ang mga pantig at simpleng salita",
                        ],

                        5 => [
                            "Makabuo ng mga simpleng parirala at pangungusap",
                            "Makagamit ng wastong bantas at tamang pagkakasunod-sunod ng salita",
                            "Makaunawa sa kahulugan ng mga ginawang parirala at pangungusap",
                        ],

                        6 => [
                            "Makilala ang mga letrang M, S, A, I, O, at B",
                            "Mabigkas ang tamang tunog ng bawat isa",
                            "Makabuo ng mga pantig gamit ang mga letrang ito",
                        ],

                        7 => [
                            "Makilala ang mga letrang E, U, T, K, L, Y, at N",
                            "Mabigkas nang wasto ang mga tunog ng mga ito",
                            "Makabuo ng mga simpleng salita gamit ang mga tunog na ito",
                        ],

                        8 => [
                            "Makaunawa sa kahulugan ng binabasang pangungusap",
                            "Matukoy ang pangunahing ideya ng pangungusap",
                            "Makapagbigay ng tamang sagot batay sa nabasang pangungusap",
                        ],

                        9 => [
                            "Makilala ang iba’t ibang uri ng pantig",
                            "Makabuo ng pantig mula sa pagsasanib ng patinig at katinig",
                            "Makabasa ng mga pantig nang malinaw at tama",
                        ],

                        10 => [
                            "Makabasa ng mga pangunahing salita",
                            "Makilala ang mga salitang madalas gamitin",
                            "Mabigkas nang tama ang mga salitang ito",
                        ],

                        11 => [
                            "Makilala at magamit ang bagong bokabularyo",
                            "Makabuo ng pangungusap gamit ang mga bagong salita",
                            "Makaunawa sa kahulugan ng salita batay sa konteksto",
                        ],

                        12 => [
                            "Makilala ang diptonggo sa salita",
                            "Mabigkas nang tama ang mga salitang may diptonggo",
                            "Makapagtukoy ng diptonggo sa pangungusap",
                        ],

                        13 => [
                            "Makilala ang kambal-katinig sa salita",
                            "Makabasa ng mga salitang may kambal-katinig",
                            "Makapagtukoy ng kambal-katinig sa pangungusap",
                        ],

                        14 => [
                            "Makilala ang iba’t ibang uri ng panlapi",
                            "Makabuo ng salita gamit ang mga panlapi",
                            "Makilala ang kahulugan ng salita batay sa panlaping ginamit",
                        ],

                        15 => [
                            "Makaunawa sa binasang karunungang-bayan",
                            "Matukoy ang aral at mensaheng taglay nito",
                            "Makapagbigay ng halimbawa ng karunungang-bayan",
                        ],

                        16 => [
                            "Makaunawa sa binasang awiting-bayan",
                            "Matukoy ang paksa at damdaming ipinapahayag",
                            "Makapagbigay ng interpretasyon batay sa binasa",
                        ],

                        17 => [
                            "Makaunawa sa binasang tula",
                            "Matukoy ang tugma, sukat, at mensahe ng tula",
                            "Makapagbigay ng sariling pagpapakahulugan sa tula",
                        ],

                        18 => [
                            "Makaunawa sa binasang maikling kuwento",
                            "Matukoy ang tauhan, tagpuan, at banghay",
                            "Makabuo ng konklusyon batay sa pangyayari",
                        ],

                        19 => [
                            "Makaunawa sa binasang diyalogo",
                            "Matukoy ang nagsasalita at layunin ng usapan",
                            "Makapagbigay ng wastong interpretasyon sa diyalogo",
                        ],

                        20 => [
                            "Makaunawa sa binasang balita",
                            "Matukoy ang pangunahing impormasyon at detalye",
                            "Makapagpaliwanag ng kahalagahan ng balitang nabasa",
                        ],

                        21 => [
                            "Makaunawa sa binasang editoryal",
                            "Matukoy ang opinyon at paninindigan ng may-akda",
                            "Makapagbigay ng sariling pananaw kaugnay ng editoryal",
                        ],

                        22 => [
                            "Makaunawa sa binasang dula",
                            "Matukoy ang tauhan, tagpo, at diyalogo",
                            "Makapagbigay ng interpretasyon batay sa kilos at usapan",
                        ]
                    ];
                @endphp

                <h1 class="text-xl font-bold mb-5"><i class="fa-solid fa-bullseye"></i> Today's Target</h1>
                
                <div class="flex flex-col gap-2">
                    @foreach ($lessonGoals[$lesson->order] as $goal)
                        <div class="relative pl-7">
                            <i class="absolute left-0 top-[4px] fa-solid fa-circle-check !text-gray-400"></i>
                            <p>{{$goal}}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="card">
                <h1 class="flex items-center justify-between text-xl font-bold mb-5">
                    <span>
                        <i class="fa-solid fa-note-sticky"></i> Notes
                    </span>
                    <i class="fa-solid fa-plus cursor-pointer !text-[#F4C300] hover:scale-125"></i>
                </h1>
                <div class="flex flex-col gap-2">
                    <div class="flex items-center justify-between">
                        <p>Note 1</p>
                        <div class="flex gap-2 items-center">
                            <i class="fa-solid fa-eye cursor-pointer !text-gray-400 hover:scale-125"></i>
                            <i class="fa-solid fa-trash-can cursor-pointer !text-red-400 hover:scale-125"></i>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <p>Note 2</p>
                        <div class="flex gap-2 items-center">
                            <i class="fa-solid fa-eye cursor-pointer !text-gray-400 hover:scale-125"></i>
                            <i class="fa-solid fa-trash-can cursor-pointer !text-red-400 hover:scale-125"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card flex flex-col">
                <h1 class="text-xl font-bold mb-5"><i class="fa-solid fa-quote-left"></i> Teacher's Message</h1>
                <div class="flex-1 flex flex-col justify-between">
                    <p>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio vitae aperiam perspiciatis consequuntur laudantium aliquid eos unde voluptate atque consectetur."</p>

                    <div class="flex justify-between">
                        <p class="font-bold">- Gng. Beng</p>
                        <p class="!text-gray-400 ">3 Days ago</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
