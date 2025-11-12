@extends('layouts.app')

@section('content')
<!-- Main Content -->
<main class="flex-1 flex flex-col gap-7">
    <div class="card flex flex-col gap-6">
        <div class="header">
            <p class="text-lg text-gray-400">Current Lesson:</p>
            <h1 class="text-2xl font-bold">Lesson 1: Ang Apabetong Filipino</h1>
            <h2 class="text-sm w-fit mt-2 px-2 py-1 border border-2 border-green-600 bg-green-900 rounded-md">Level 1 - Beginner</h2>
        </div>

        <div class="description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi in, animi alias molestiae molestias porro inventore ab et, cumque sunt temporibus nobis aut facere! Ducimus quas quae cum fugiat ratione.
        </div>

        <div class="footer flex flex-col gap-4">
            <div class="flex justify-between">
                <p class="text-gray-400">Your progress:</p>
                <p class="text-gray-400">0%</p>
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
            <h1 class="text-xl font-bold"><i class="fa-solid fa-bullseye"></i> Today's Target</h1>
        </div>
        <div class="card"><h1 class="text-xl font-bold"><i class="fa-solid fa-note-sticky"></i> Notes</h1></div>
        <div class="card"><h1 class="text-xl font-bold"><i class="fa-solid fa-quote-left"></i> Teacher's Message</h1></div>
    </div>
</main>
@endsection