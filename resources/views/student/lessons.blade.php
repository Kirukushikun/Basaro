@extends('layouts.app')

@section('content')
<main class="flex-1 overflow-hidden pb-[40px]">
    <div class="lessons grid grid-cols-3 pr-5 gap-7 h-full overflow-y-auto" 
    >   

        @foreach($lessons as $lesson)
            <div class="card relative flex flex-col justify-between">
                @if(!$lesson->userTrack)
                    <div class="absolute inset-0 w-full h-full rounded-2xl bg-black/50 flex items-center justify-center">
                        <i class="fa-solid fa-lock text-white text-5xl"></i>
                    </div>
                @endif
                
                <div class="">
                    <div class="flex items-start justify-between mb-4">
                        <h1 class="text-xl font-bold">{{$lesson->title}}</h1>
                        <h2 class="text-sm whitespace-nowrap w-fit px-3 py-1 border border-2 border-green-600 bg-green-900 rounded-md">Level {{$lesson->order}}</h2>
                    </div>

                    <p class="mb-6">{{$lesson->description}}</p>                
                </div>


                <div class="flex items-center justify-between">
                    <button class="w-fit px-4 py-2 bg-[#F4C300] !text-black rounded-md font-bold" onclick="window.location.href='/lesson-view?lesson={{$lesson->order}}&slide=first-slide'">
                        Start Lesson
                    </button>

                    <p>{{$lesson->userTrack->score ?? '0'}}/{{$lesson->total_scores}}</p>
                </div>
            </div>
        @endforeach
    </div>
</main>
@endsection