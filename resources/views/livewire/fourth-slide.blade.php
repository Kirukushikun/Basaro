<main class="flex-1 pb-[50px]">
    <div class="h-full flex items-center justify-center">
        <div class="card flex flex-col items-center gap-5 relative text-lg">
            
            <!-- Title Section (Shared across all lessons) -->
            <div class="absolute -top-6 left-1/2 -translate-x-1/2">
                <div class="relative inline-block">
                    <h1 class="relative z-10 bg-[#F4C300] px-20 py-1 !text-black text-xl font-bold rounded-md border-2 border-[#31343A]">
                        PAGTATAYA
                    </h1>
                    <img class="absolute z-0 -left-7 top-0" width="55" src="../Img/ribbon.png" alt="">
                    <img class="absolute z-0 -right-7 top-0 rotate-180" width="55" src="../Img/ribbon.png" alt="">
                </div>
            </div>

            <!-- Dynamic Lesson Content -->
            @if($lesson == 1)
                @include('pagtataya.pagtataya1', ['questions' => $this->lessonQuestions])
            @endif

        </div>
    </div>
</main>