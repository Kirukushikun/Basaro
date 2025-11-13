@extends('layouts.app')

@section('content')
<!-- Main Content -->
<main class="flex-1 flex flex-col gap-7">
    <div class="card flex flex-col gap-6">
        <div class="header">
            <p class="text-lg !text-gray-400">Current Lesson:</p>
            <h1 class="text-2xl font-bold">Lesson 1: Ang Alpabetong Filipino</h1>
            <h2 class="text-sm w-fit mt-2 px-2 py-1 border border-2 border-green-600 bg-green-900 rounded-md">Level 1 - Beginner</h2>
        </div>

        <div class="description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi in, animi alias molestiae molestias porro inventore ab et, cumque sunt temporibus nobis aut facere! Ducimus quas quae cum fugiat ratione.
        </div>

        <div class="footer flex flex-col gap-4">
            <div class="flex justify-between">
                <p class="!text-gray-400">Your progress:</p>
                <p class="!text-gray-400">0%</p>
            </div>

            <div class="bg-gray-600 h-2 rounded-md">
                <div class="w-[0%] bg-[#F4C300] h-full rounded-md"></div>
            </div>

            <button class="w-fit !text-black px-4 py-2 bg-[#F4C300] text-gray-900 rounded-md font-bold">
                Start Lesson
            </button>
        </div>
    </div>
    <div class="flex-1 grid grid-cols-3 gap-7 pb-[40px]">
        <div class="card">
            <h1 class="text-xl font-bold mb-5"><i class="fa-solid fa-bullseye"></i> Today's Target</h1>
            
            <div class="flex flex-col gap-2">
                <div class="relative pl-7">
                    <i class="absolute left-0 top-[4px] fa-solid fa-circle-check !text-gray-400"></i>
                    <p>Makilala ang bawat letra sa Alpabetong Filipino</p>
                </div>

                <div class="relative pl-7">
                    <i class="absolute left-0 top-[4px] fa-solid fa-circle-check !text-gray-400"></i>
                    <p>Mibigkas ang wastong tunog ng mga letra</p>
                </div>

                <div class="relative pl-7">
                    <i class="absolute left-0 top-[4px] fa-solid fa-circle-check !text-gray-400"></i>
                    <p>Makasunod sa mga simpleng tagubilin patungkol sa pagbasa at pagbigkas</p>
                </div>

                
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
</main>
@endsection