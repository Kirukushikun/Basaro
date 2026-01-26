<main class="flex-1 overflow-hidden pb-[40px] px-4 md:px-0">
    <div class="lessons grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 md:pr-5 gap-4 md:gap-7 h-full overflow-y-auto">

        @foreach($lessons as $lesson)
            @php
                $track = $userTracks[$lesson->id] ?? null;

                // Lesson is unlocked if:
                // - First lesson (order 1)
                // - OR user has a track for this lesson
                // - OR lesson order is <= current unlocked order
                $isUnlocked = $lesson->order === 1
                    || $track
                    || $lesson->order <= $currentUnlockedOrder;
            @endphp

            <div class="card relative flex flex-col justify-between">

                {{-- LOCK OVERLAY --}}
                @if(!$isUnlocked)
                    <div class="absolute inset-0 rounded-2xl bg-black/50 flex items-center justify-center z-10">
                        <i class="fa-solid fa-lock text-white text-4xl md:text-5xl"></i>
                    </div>
                @endif

                <div>
                    <div class="flex items-start justify-between mb-3 md:mb-4 gap-2">
                        <h1 class="text-lg md:text-xl font-bold">{{ $lesson->title }}</h1>
                        @php
                            // Color progression based on level
                            $levelColors = [
                                1 => 'border-green-500 bg-green-900 text-green-100',      // Beginner
                                2 => 'border-emerald-500 bg-emerald-900 text-emerald-100',
                                3 => 'border-teal-500 bg-teal-900 text-teal-100',
                                4 => 'border-cyan-500 bg-cyan-900 text-cyan-100',
                                5 => 'border-sky-500 bg-sky-900 text-sky-100',           // Intermediate
                                6 => 'border-blue-500 bg-blue-900 text-blue-100',
                                7 => 'border-indigo-500 bg-indigo-900 text-indigo-100',
                                8 => 'border-violet-500 bg-violet-900 text-violet-100',
                                9 => 'border-purple-500 bg-purple-900 text-purple-100',  // Advanced
                                10 => 'border-fuchsia-500 bg-fuchsia-900 text-fuchsia-100',
                                11 => 'border-pink-500 bg-pink-900 text-pink-100',
                                12 => 'border-rose-500 bg-rose-900 text-rose-100',
                                13 => 'border-red-500 bg-red-900 text-red-100',          // Expert
                                14 => 'border-orange-500 bg-orange-900 text-orange-100',
                                15 => 'border-amber-500 bg-amber-900 text-amber-100',
                            ];
                            
                            $colorClass = $levelColors[$lesson->order] ?? 'border-yellow-500 bg-yellow-900 text-yellow-100';
                        @endphp

                        <h2 class="text-xs md:text-sm whitespace-nowrap w-fit px-2 md:px-3 py-1 border-2 rounded-md {{ $colorClass }}">
                            Level {{ $lesson->order }}
                        </h2>
                    </div>

                    <p class="mb-4 md:mb-6 text-sm md:text-base">{{ $lesson->description }}</p>
                </div>

                <div class="flex flex-col-reverse sm:flex-row items-start sm:items-center justify-between gap-3">
                    @php
                        $user = Auth::user();
                        $isCurrentLesson = $user->current_lesson == $lesson->id;
                        $progress = $user->current_progress;
                    @endphp

                    @if ($isCurrentLesson && $progress == 25)
                        <button class="w-full sm:w-fit !text-black px-3 md:px-4 py-2 bg-[#F4C300] text-gray-900 rounded-md font-bold text-sm md:text-base" onclick="window.location.href='/lesson-view?lesson={{$lesson->id}}&slide=second-slide'">
                            Continue Lesson
                        </button>
                    @elseif ($isCurrentLesson && $progress == 50)
                        <button class="w-full sm:w-fit !text-black px-3 md:px-4 py-2 bg-[#F4C300] text-gray-900 rounded-md font-bold text-sm md:text-base" onclick="window.location.href='/lesson-view?lesson={{$lesson->id}}&slide=third-slide'">
                            Continue Lesson
                        </button>
                    @elseif ($isCurrentLesson && $progress == 75)
                        <button class="w-full sm:w-fit !text-black px-3 md:px-4 py-2 bg-[#F4C300] text-gray-900 rounded-md font-bold text-sm md:text-base" onclick="window.location.href='/lesson-view?lesson={{$lesson->id}}&slide=fourth-slide'">
                            Continue Lesson
                        </button>
                    @elseif ($track && $track->status === 'completed')
                        <button
                            class="w-full sm:w-fit px-3 md:px-4 py-2 bg-[#F4C300] !text-black rounded-md font-bold text-sm md:text-base {{ !$isUnlocked ? 'opacity-50 cursor-not-allowed' : '' }}"
                            @if(!$isUnlocked) disabled @endif
                            onclick="window.location.href='/lesson-view?lesson={{ $lesson->id }}&slide=first-slide'"
                        >
                            Retry Lesson
                        </button>
                    @else
                        <button
                            class="w-full sm:w-fit px-3 md:px-4 py-2 bg-[#F4C300] !text-black rounded-md font-bold text-sm md:text-base {{ !$isUnlocked ? 'opacity-50 cursor-not-allowed' : '' }}"
                            @if(!$isUnlocked) disabled @endif
                            onclick="window.location.href='/lesson-view?lesson={{ $lesson->id }}&slide=first-slide'"
                        >
                            Start Lesson
                        </button>                    
                    @endif


                    @if($track && $track->status === 'completed')
                        @php
                            $passingScore = $lesson->total_scores * 0.70;
                            $isPassing = $track->score > $passingScore;
                        @endphp
                        <p class="text-sm md:text-base {{ $isPassing ? 'text-green-400' : 'text-red-400' }}">
                            {{ $track->score }} / {{ $lesson->total_scores }}
                        </p>
                    @elseif($isCurrentLesson && $progress > 0)
                        <p class="text-sm md:text-base">
                            In progress
                        </p>
                    @else
                        <p class="text-sm md:text-base">
                            Not started
                        </p>
                    @endif
                </div>
            </div>
        @endforeach

    </div>
</main>