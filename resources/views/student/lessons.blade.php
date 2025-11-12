@extends('layouts.app')

@section('content')
<main class="flex-1 overflow-hidden pb-[40px]">
    <div class="lessons grid grid-cols-3 pr-5 gap-7 h-full overflow-y-auto" 
        x-data="{
            lessons: [
                'Tunog ng mga Patinig',
                'Tunog ng mga Katinig',
                'Pagsasanay sa mga Patinig',
                'Pagsasanay sa mga Katinig',
                'Pagtukoy ng Unang Tunog',
                'Pagtukoy ng Huling Tunog',
                'Pagsasama ng mga Tunog',
                'Pagbuo ng mga Pantig',
                'Pagbasa ng mga Pantig',
                'Pagtukoy sa Tamang Pantig',
                'Pagbuo ng mga Simpleng Salita',
                'Pagbasa ng mga Simpleng Salita',
                'Pagkilala sa mga Larawan at Salita',
                'Pagbasa ng mga Parirala',
                'Pagtukoy ng Kahulugan ng Salita',
                'Pagbasa ng mga Maikling Pangungusap',
                'Pag-unawa sa Binasa',
                'Pagtukoy sa Tauhan at Lugar',
                'Pagsunod sa Panuto ng Binasa',
                'Pagbasa ng Maikling Kuwento',
                'Pagpapahalaga sa Binasa'
            ]
        }"
    >
        <div class="card relative flex flex-col justify-between">
            <!-- <div class="absolute inset-0 w-full h-full rounded-2xl bg-black/50 flex items-center justify-center">
                <i class="fa-solid fa-lock text-white text-5xl"></i>
            </div> -->
            
            <div class="">
                <div class="flex items-start justify-between mb-4">
                    <h1 class="text-xl font-bold">Ang Alpabetong Filipino</h1>
                    <h2 class="text-sm whitespace-nowrap w-fit px-3 py-1 border border-2 border-green-600 bg-green-900 rounded-md">Level 1</h2>
                </div>

                <p class="mb-6">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis impedit quas aliquam recusandae numquam quos.</p>                
            </div>


            <div class="flex items-center justify-between">
                <button class="w-fit px-4 py-2 bg-[#F4C300] !text-black rounded-md font-bold" onclick="window.location.href='/lesson-view?lesson=1&slide=first-slide'">
                    Start Lesson
                </button>

                <p>0/35</p>
            </div>
        </div>

        <template x-for="(lesson, index) in lessons" :key="index">
            <div class="card relative flex flex-col justify-between">

                <!-- LOCK OVERLAY -->
                <div class="absolute inset-0 w-full h-full rounded-2xl bg-black/50 flex items-center justify-center">
                    <i class="fa-solid fa-lock text-white text-5xl"></i>
                </div>


                <div class="">
                    <div class="flex items-start justify-between mb-4">
                        <h1 class="text-xl font-bold" x-text="lesson"></h1>
                        <h2 class="text-sm whitespace-nowrap px-3 py-1 border border-2 border-green-600 bg-green-900 rounded-md"
                            x-text="'Level ' + (index + 1)">
                        </h2>
                    </div>

                    <p class="mb-6 text-gray-300">
                        Matutunan ang tamang pagbigkas at pagkilala sa mga letra, tunog, at salita.
                    </p>                    
                </div>


                <div class="flex items-center justify-between">
                    <button class="w-fit px-4 py-2 bg-[#F4C300] !text-black rounded-md font-bold">
                        Start Lesson
                    </button>
                    <p>0/10</p>
                </div>
            </div>
        </template>

    </div>
</main>
@endsection