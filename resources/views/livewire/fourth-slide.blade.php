<main class="flex-1 pb-[50px]">
    <div class="h-full flex items-center justify-center">
        <div class="card flex flex-col items-center gap-5 relative text-lg">
            
            <!-- Title Section (Shared across all lessons) -->
            <div class="absolute -top-7 left-1/2 -translate-x-1/2">
                <div class="relative inline-block">
                    <h1 class="relative z-10 bg-[#F4C300] px-20 py-1 !text-black text-xl font-bold rounded-md border-2 border-[#31343A]">
                        PAGTATAYA
                    </h1>
                    <img class="absolute z-0 -left-7 top-0" width="55" src="{{asset('img/ribbon.png')}}" alt="">
                    <img class="absolute z-0 -right-7 top-0 rotate-180" width="55" src="{{asset('img/ribbon.png')}}" alt="">
                </div>
            </div>

            <!-- Dynamic Lesson Content -->
            @if($lesson == 1)
                @include('pagtataya.pagtataya1', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 2)
                @include('pagtataya.pagtataya2', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 3)
                @include('pagtataya.pagtataya3', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 4)
                @include('pagtataya.pagtataya3', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 5)
                @include('pagtataya.pagtataya5', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 6)
                @include('pagtataya.pagtataya5', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 7)
                @include('pagtataya.pagtataya7', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 8)
                @include('pagtataya.pagtataya8', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 9)
                @include('pagtataya.pagtataya5', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 10)
                @include('pagtataya.pagtataya3', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 11)
                @include('pagtataya.pagtataya11', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 12)
                @include('pagtataya.pagtataya12', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 13)
                @include('pagtataya.pagtataya12', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 14)
                @include('pagtataya.pagtataya14', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 15)
                @include('pagtataya.pagtataya15', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 16)
                @include('pagtataya.pagtataya7', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 17)
                @include('pagtataya.pagtataya7', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 18)
                @include('pagtataya.pagtataya7', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 19)
                @include('pagtataya.pagtataya7', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 20)
                @include('pagtataya.pagtataya20', ['questions' => $this->lessonQuestions])
            @endif

        </div>
    </div>
</main>