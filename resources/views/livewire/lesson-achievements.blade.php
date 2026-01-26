@if($achievements->isNotEmpty())
    <main class="flex-1 overflow-hidden pb-[40px] px-4 md:px-0">
        <div class="lessons grid grid-cols-1 sm:grid-cols-2 md:pr-5 gap-4 md:gap-7 h-full overflow-y-auto">
            
            @foreach($achievements as $achievement)
                <div class="card flex gap-6 items-start">
                    <!-- Badge/ribbon with count -->
                    <div style="position: relative; flex-shrink: 0; width: 158px; height: 158px;">
                        <img style="width: 100%; height: 100%;" 
                            src="{{ asset($this->getMedalImage($achievement->medal)) }}" 
                            alt="{{ $achievement->medal }} medal">
                        <span style="position: absolute; top: 40%; left: 50%; transform: translate(-50%, -50%); color: white; font-size: 2.25rem; font-weight: bold;">
                            {{ $achievement->count }}
                        </span>
                    </div>
                    
                    <!-- Content -->
                    <div class="flex-1 pt-2">
                        <h2 class="text-2xl font-bold text-white mb-4">
                            {{ $achievementHeaders[$achievement->lesson][$achievement->type][$achievement->medal] ?? 'Achievement' }}
                        </h2>
                        <p class="!text-gray-300 leading-relaxed">
                            {{ $this->getAchievementDescription($achievement->lesson, $achievement->type, $achievement->medal) ?? '' }}
                        </p>
                    </div>
                </div>
            @endforeach
            
        </div>
    </main>
@else
    <main class="card flex-1 flex flex-col items-center justify-center gap-5 mb-10">
        <i class="fa-solid fa-medal text-5xl !text-gray-500"></i>
        <p class="!text-gray-500 select-none">Wala pang nakuhang ribbon. Magsimula ng aralin!</p>
    </main>
@endif
