<main class="flex-1 overflow-hidden pb-[40px]">
    <div class="lessons grid grid-cols-3 pr-5 gap-7 h-full overflow-y-auto">

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
                        <i class="fa-solid fa-lock text-white text-5xl"></i>
                    </div>
                @endif

                <div>
                    <div class="flex items-start justify-between mb-4">
                        <h1 class="text-xl font-bold">{{ $lesson->title }}</h1>
                        <h2 class="text-sm whitespace-nowrap w-fit px-3 py-1 border-2 border-green-600 bg-green-900 rounded-md">
                            Level {{ $lesson->order }}
                        </h2>
                    </div>

                    <p class="mb-6">{{ $lesson->description }}</p>
                </div>

                <div class="flex items-center justify-between">
                    <button
                        class="w-fit px-4 py-2 bg-[#F4C300] !text-black rounded-md font-bold {{ !$isUnlocked ? 'opacity-50 cursor-not-allowed' : '' }}"
                        @if(!$isUnlocked) disabled @endif
                        onclick="window.location.href='/lesson-view?lesson={{ $lesson->id }}&slide=first-slide'"
                    >
                        Start Lesson
                    </button>

                    @if($track && $track->status === 'completed')
                        @php
                            $passingScore = $lesson->total_scores * 0.70;
                            $isPassing = $track->score > $passingScore;
                        @endphp
                        <p class="{{ $isPassing ? 'text-green-400' : 'text-red-400' }}">
                            {{ $track->score }} / {{ $lesson->total_scores }}
                        </p>
                    @elseif($track)
                        <p>
                            In progress
                        </p>
                    @else
                        <p>
                            Not started
                        </p>
                    @endif
                </div>
            </div>
        @endforeach

    </div>
</main>