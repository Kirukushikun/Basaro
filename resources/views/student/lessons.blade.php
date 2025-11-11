@extends('layouts.app')

@section('content')
<main class="flex-1 overflow-hidden pb-[40px]">
    <div class="lessons grid grid-cols-3 pr-5 gap-7 h-full overflow-y-auto" 
        x-data="{
            start: 3,
            total: 20
        }"
    >
        <div class="card relative">
            <!-- <div class="absolute inset-0 w-full h-full rounded-2xl bg-black/50 flex items-center justify-center">
                <i class="fa-solid fa-lock text-white text-5xl"></i>
            </div> -->

            <div class="flex items-center justify-between mb-4">
                <h1 class="text-xl font-bold">Reading Excercise</h1>
                <h2 class="text-sm w-fit px-3 py-1 border border-2 border-green-600 bg-green-900 rounded-md">Level 1</h2>
            </div>

            <p class="mb-6">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis impedit quas aliquam recusandae numquam quos.</p>

            <div class="flex items-center justify-between">
                <button class="w-fit px-4 py-2 bg-[#F4C300] text-gray-900 rounded-md font-bold">
                    Restart Lesson
                </button>

                <p>10/10</p>
            </div>
        </div>
        
        <div class="card relative">
            <!-- <div class="absolute inset-0 w-full h-full rounded-2xl bg-black/50 flex items-center justify-center">
                <i class="fa-solid fa-lock text-white text-5xl"></i>
            </div> -->

            <div class="flex items-center justify-between mb-4">
                <h1 class="text-xl font-bold">Reading Excercise</h1>
                <h2 class="text-sm w-fit px-3 py-1 border border-2 border-green-600 bg-green-900 rounded-md">Level 2</h2>
            </div>

            <p class="mb-6">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis impedit quas aliquam recusandae numquam quos.</p>

            <div class="flex items-center justify-between">
                <button class="w-fit px-4 py-2 bg-[#F4C300] text-gray-900 rounded-md font-bold" onclick="window.location.href='../Student/3 - fSlide.html'">
                    Start Lesson
                </button>

                <p>0/10</p>
            </div>
        </div> 

        <template x-for="i in total">
            <div class="card relative">

                <!-- LOCK ALWAYS VISIBLE -->
                <div class="absolute inset-0 w-full h-full rounded-2xl bg-black/50 flex items-center justify-center">
                    <i class="fa-solid fa-lock text-white text-5xl"></i>
                </div>

                <div class="flex items-center justify-between mb-4">
                    <h1 class="text-xl font-bold">Reading Exercise</h1>
                    <h2 class="text-sm px-3 py-1 border border-2 border-green-600 bg-green-900 rounded-md"
                        x-text="'Level ' + (start + i - 1)">
                    </h2>
                </div>

                <p class="mb-6">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis impedit quas aliquam recusandae numquam quos.</p>

                <div class="flex items-center justify-between">
                    <button class="w-fit px-4 py-2 bg-[#F4C300] text-gray-900 rounded-md font-bold">
                        Start Lesson
                    </button>
                    <p>0/10</p>
                </div>

            </div>
        </template>

    </div>
</main>
@endsection