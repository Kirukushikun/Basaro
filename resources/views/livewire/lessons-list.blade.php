<main class="flex-1 overflow-hidden pb-[40px] px-4 md:px-0">
    <div class="lessons grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 md:pr-5 gap-4 md:gap-7 h-full overflow-y-auto">

        {{-- PRETEST CARD --}}
        <div class="card relative flex flex-col justify-between col-span-1 sm:col-span-2 lg:col-span-3 border-2 border-yellow-400 bg-gradient-to-r from-yellow-950 to-yellow-900">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <span class="text-2xl">📋</span>
                        <h1 class="text-xl md:text-2xl font-bold text-yellow-300">BASARO Pretest</h1>
                        <span class="text-xs px-2 py-1 rounded-md border border-yellow-500 bg-yellow-900 text-yellow-200 font-semibold whitespace-nowrap">Bago Magsimula</span>
                    </div>
                    <p class="text-sm md:text-base text-yellow-100/80">Subukin ang iyong kasalukuyang antas ng pagbasa bago simulan ang mga aralin. Ang resulta ay makakatulong upang masubaybayan ang iyong pag-unlad.</p>
                </div>
                <button
                    class="w-full sm:w-fit px-5 py-2 bg-yellow-400 !text-black rounded-md font-bold text-sm md:text-base hover:bg-yellow-300 transition-colors whitespace-nowrap"
                    onclick="window.location.href='/tests?type=pretest'"
                >
                    Simulan ang Pretest
                </button>
            </div>
        </div>

        {{-- 20 LESSONS --}}
        @foreach($lessons as $lesson)
            @php
                $track = $userTracks[$lesson->id] ?? null;

                // Check if pretest is completed
                $hasPretestRecord = \App\Models\UserTest::hasFirstAttempt(Auth::id(), 'pretest');

                // Lesson is unlocked if:
                // - First lesson (order 1) AND pretest completed
                // - OR user has a track for this lesson
                // - OR lesson order is <= current unlocked order
                $isUnlocked = ($lesson->order === 1 && $hasPretestRecord)
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
                            $levelColors = [
                                1 => 'border-green-500 bg-green-900 text-green-100',
                                2 => 'border-emerald-500 bg-emerald-900 text-emerald-100',
                                3 => 'border-teal-500 bg-teal-900 text-teal-100',
                                4 => 'border-cyan-500 bg-cyan-900 text-cyan-100',
                                5 => 'border-sky-500 bg-sky-900 text-sky-100',
                                6 => 'border-blue-500 bg-blue-900 text-blue-100',
                                7 => 'border-indigo-500 bg-indigo-900 text-indigo-100',
                                8 => 'border-violet-500 bg-violet-900 text-violet-100',
                                9 => 'border-purple-500 bg-purple-900 text-purple-100',
                                10 => 'border-fuchsia-500 bg-fuchsia-900 text-fuchsia-100',
                                11 => 'border-pink-500 bg-pink-900 text-pink-100',
                                12 => 'border-rose-500 bg-rose-900 text-rose-100',
                                13 => 'border-red-500 bg-red-900 text-red-100',
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
                    @if($track && $track->status === 'completed')
                        {{-- Retry button for completed lessons --}}
                        <button
                            class="w-full sm:w-fit px-3 md:px-4 py-2 bg-[#F4C300] !text-black rounded-md font-bold text-sm md:text-base {{ !$isUnlocked ? 'opacity-50 cursor-not-allowed' : 'hover:bg-yellow-300 transition-colors' }}"
                            @if(!$isUnlocked) disabled @endif
                            onclick="window.location.href='/lesson-view?lesson={{ encrypt($lesson->id) }}&slide=first-slide'"
                        >
                            Retry Lesson
                        </button>
                    @else
                        {{-- Start button for new/in-progress lessons --}}
                        <button
                            class="w-full sm:w-fit px-3 md:px-4 py-2 bg-[#F4C300] !text-black rounded-md font-bold text-sm md:text-base {{ !$isUnlocked ? 'opacity-50 cursor-not-allowed' : 'hover:bg-yellow-300 transition-colors' }}"
                            @if(!$isUnlocked) disabled @endif
                            onclick="window.location.href='/lesson-view?lesson={{ encrypt($lesson->id) }}&slide=first-slide'"
                        >
                            Start Lesson
                        </button>
                    @endif

                    {{-- Score display --}}
                    @if($track && $track->status === 'completed')
                        @php
                            $passingScore = $lesson->total_scores * 0.60;
                            $isPassing = $track->score > $passingScore;
                        @endphp
                        <p class="text-sm md:text-base {{ $isPassing ? 'text-green-400' : 'text-red-400' }}">
                            {{ $track->score }} / {{ $lesson->total_scores }}
                        </p>
                    @elseif(!$isUnlocked)
                        <p class="text-sm md:text-base text-white/40">
                            <i class="fa-solid fa-lock mr-1"></i> Locked
                        </p>
                    @else
                        <p class="text-sm md:text-base text-white/60">
                            Not started
                        </p>
                    @endif
                </div>
            </div>
        @endforeach

        {{-- POSTTEST CARD --}}
        @php
            // Check if all 20 lessons are completed with passing scores
            $allLessonsCompleted = $currentUnlockedOrder > 20;
        @endphp

        <div class="card relative flex flex-col justify-between col-span-1 sm:col-span-2 lg:col-span-3 border-2 border-blue-400 bg-gradient-to-r from-blue-950 to-blue-900">
            
            {{-- LOCK OVERLAY for posttest --}}
            @if(!$allLessonsCompleted)
                <div class="absolute inset-0 rounded-2xl bg-black/50 flex items-center justify-center z-10">
                    <i class="fa-solid fa-lock text-white text-4xl md:text-5xl"></i>
                </div>
            @endif

            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <span class="text-2xl">📝</span>
                        <h1 class="text-xl md:text-2xl font-bold text-blue-300">BASARO Posttest</h1>
                        <span class="text-xs px-2 py-1 rounded-md border border-blue-500 bg-blue-900 text-blue-200 font-semibold whitespace-nowrap">Pagkatapos ng Lahat ng Aralin</span>
                    </div>
                    <p class="text-sm md:text-base text-blue-100/80">Pagkatapos makumpleto ang lahat ng aralin, subukin ang iyong pag-unlad sa pamamagitan ng posttest. Makikita mo kung gaano ka na kahusay nagbasa!</p>
                </div>
                <button
                    class="w-full sm:w-fit px-5 py-2 bg-blue-400 !text-black rounded-md font-bold text-sm md:text-base whitespace-nowrap {{ !$allLessonsCompleted ? 'opacity-50 cursor-not-allowed' : 'hover:bg-blue-300 transition-colors' }}"
                    @if(!$allLessonsCompleted) disabled @endif
                    onclick="window.location.href='/tests?type=posttest'"
                >
                    Simulan ang Posttest
                </button>
            </div>
        </div>

    </div>
</main>