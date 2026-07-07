<div class="content flex-1 flex flex-col min-h-0">
     <!-- Summary Cards -->
     <div class="dash-stats mb-5">
          <div class="stat-card">
               <div>
                    <p class="stat-label">Total Students</p>
                    <h1 class="stat-value">{{ number_format($totalStudents) }}</h1>
               </div>
               <div class="stat-badge">
                    <i class="fa-solid fa-user-graduate"></i>
               </div>
          </div>
          <div class="stat-card">
               <div>
                    <p class="stat-label">Overall Performance</p>
                    <h1 class="stat-value">{{ $overallPerformance }}%</h1>
               </div>
               <div class="stat-badge">
                    <i class="fa-solid fa-chart-simple"></i>
               </div>
          </div>
          <div class="stat-card">
               <div>
                    <p class="stat-label">Total Lessons</p>
                    <h1 class="stat-value">{{ $totalLessons }}</h1>
               </div>
               <div class="stat-badge">
                    <i class="fa-solid fa-book"></i>
               </div>
          </div>
          <div class="stat-card">
               <div>
                    <p class="stat-label">Active this week</p>
                    <h1 class="stat-value">{{ $activeThisWeek }}</h1>
               </div>
               <div class="stat-badge">
                    <i class="fa-solid fa-earth-asia"></i>
               </div>
          </div>
     </div>

     <!-- Main Cards -->
     <div class="dash-grid">
          <!-- Left Card -->
          <div class="card flex flex-col gap-5">
               <h1 class="text-xl font-bold">Performance Distribution</h1>

               <div class="chart-box">
                    <div class="chart">
                         <!-- Y-Axis -->
                         <div class="y-axis">
                              <span>{{ $performanceDistribution['max'] }}</span>
                              <span>{{ round($performanceDistribution['max'] * 0.75) }}</span>
                              <span>{{ round($performanceDistribution['max'] * 0.5) }}</span>
                              <span>{{ round($performanceDistribution['max'] * 0.25) }}</span>
                              <span>0</span>
                         </div>

                         <!-- Chart Bars -->
                         <div class="bars">
                              <div class="chart-bar" style="height: {{ $performanceDistribution['max'] > 0 ? ($performanceDistribution['excellent'] / $performanceDistribution['max']) * 100 : 0 }}%; background-color: #22c58b;" title="{{ $performanceDistribution['excellent'] }} students">
                                   <span class="font-bold text-white">{{ $performanceDistribution['excellent'] }}</span>
                                   <div class="chart-bar-label">Excellent</div>
                              </div>
                              <div class="chart-bar" style="height: {{ $performanceDistribution['max'] > 0 ? ($performanceDistribution['good'] / $performanceDistribution['max']) * 100 : 0 }}%; background-color: #4a9bff;" title="{{ $performanceDistribution['good'] }} students">
                                   <span class="font-bold text-white">{{ $performanceDistribution['good'] }}</span>
                                   <div class="chart-bar-label">Good</div>
                              </div>
                              <div class="chart-bar" style="height: {{ $performanceDistribution['max'] > 0 ? ($performanceDistribution['needs_guidance'] / $performanceDistribution['max']) * 100 : 0 }}%; background-color: #F4C300;" title="{{ $performanceDistribution['needs_guidance'] }} students">
                                   <span class="font-bold text-[#2d3748]">{{ $performanceDistribution['needs_guidance'] }}</span>
                                   <div class="chart-bar-label">Average</div>
                              </div>
                              <div class="chart-bar" style="height: {{ $performanceDistribution['max'] > 0 ? ($performanceDistribution['struggling'] / $performanceDistribution['max']) * 100 : 0 }}%; background-color: #ff5d5d;" title="{{ $performanceDistribution['struggling'] }} students">
                                   <span class="font-bold text-white">{{ $performanceDistribution['struggling'] }}</span>
                                   <div class="chart-bar-label">Struggling</div>
                              </div>
                         </div>
                    </div>
               </div>

               <h1 class="text-xl font-bold">Grade Level Overview</h1>
               <!-- Grade Level Distribution -->
               <div class="grades">
                    @php
                         $gradeColors = [
                              '7' => '#4FD1C5',
                              '8' => '#4299E1',
                              '9' => '#F4C300',
                              '10' => '#ED8936',
                         ];
                         $fixedGrades = ['7', '8', '9', '10'];
                         $gradeData = [];
                         foreach($fixedGrades as $gradeNum) {
                              $found = collect($gradeDistribution)->firstWhere('grade', $gradeNum);
                              $gradeData[$gradeNum] = $found ? $found['count'] : 0;
                         }
                    @endphp

                    @foreach($fixedGrades as $gradeNum)
                         <div class="grade-item">
                              <div class="grade-top">
                                   <span class="grade-dot" style="background-color: {{ $gradeColors[$gradeNum] }}"></span>
                                   Grade {{ $gradeNum }}
                              </div>
                              <div class="grade-num">{{ $gradeData[$gradeNum] }}</div>
                              <div class="grade-track">
                                   <span style="width: {{ $totalStudents > 0 ? ($gradeData[$gradeNum] / $totalStudents * 100) : 0 }}%; background-color: {{ $gradeColors[$gradeNum] }}"></span>
                              </div>
                         </div>
                    @endforeach
               </div>
          </div>

          <!-- Right Card -->
          <div class="card right-card">
               <h1 class="text-xl font-bold mb-5">Top Performing Students</h1>

               @if(count($topPerformers) >= 3)
               <div class="podium">
                    <!-- 2nd Place -->
                    <div class="perf p2">
                         <p class="perf-name">{{ $topPerformers[1]['name'] }}</p>
                         <p class="perf-avg">Average: {{ number_format($topPerformers[1]['average'], 1) }}%</p>
                         <div class="perf-block">#2</div>
                    </div>

                    <!-- 1st Place (taller) -->
                    <div class="perf p1">
                         <p class="perf-name">{{ $topPerformers[0]['name'] }}</p>
                         <p class="perf-avg">Average: {{ number_format($topPerformers[0]['average'], 1) }}%</p>
                         <div class="perf-block">#1</div>
                    </div>

                    <!-- 3rd Place -->
                    <div class="perf p3">
                         <p class="perf-name">{{ $topPerformers[2]['name'] }}</p>
                         <p class="perf-avg">Average: {{ number_format($topPerformers[2]['average'], 1) }}%</p>
                         <div class="perf-block">#3</div>
                    </div>
               </div>
               @else
                    <div class="flex justify-center items-center h-64 text-gray-500">
                         Not enough students with completed lessons to show rankings
                    </div>
               @endif

               <div class="dash-bottom">
                    <div class="subcard alerts">
                         <h1 class="text-xl font-bold mb-5">Alerts</h1>
                         <div class="pl-5 flex flex-col gap-5">
                              @forelse($alerts as $alert)
                              <div class="relative flex flex-col gap-2">
                                   <!-- icon and line -->
                                   <div class="absolute top-1 -left-6 flex flex-col items-center gap-1 h-full">
                                        <i class="fa-solid fa-bell text-yellow-400 text-md"></i>
                                        @if(!$loop->last)
                                        <div class="w-[3px] rounded-lg flex-1 bg-gray-200"></div>
                                        @endif
                                   </div>

                                   <!-- text content -->
                                   <p class="text-sm font-bold ml-2">{{ $alert['message'] }}</p>
                                   <p class="text-xs text-[#ADADAD] font-semibold ml-2">{{ $alert['timestamp'] }}</p>
                              </div>
                              @empty
                              <div class="text-center text-gray-500 py-4">
                                   <i class="fa-solid fa-circle-check text-green-400 text-2xl mb-2"></i>
                                   <p class="text-sm">All clear! No alerts at the moment.</p>
                              </div>
                              @endforelse
                         </div>
                    </div>

                    <div class="subcard motd">
                         <div class="motd-head">
                              <h1 class="text-xl font-bold">Message of the day</h1>

                              @if(!$isEditing)
                                   <button wire:click="editMessage" class="motd-edit">
                                        Edit
                                   </button>
                              @endif
                         </div>

                         @if(session()->has('message'))
                              <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded text-sm mb-3">
                                   {{ session('message') }}
                              </div>
                         @endif

                         <!-- Sticky note textarea with lines -->
                         <textarea
                              wire:model="messageOfTheDay"
                              @if(!$isEditing) readonly @endif
                              class="w-full flex-1 bg-transparent border-none rounded-sm text-gray-800 resize-none focus:outline-none focus:ring-0 {{ !$isEditing ? 'cursor-default' : '' }}"
                              placeholder="Write your message here..."
                              style="
                                   font-family: 'Indie Flower', 'Comic Sans MS', cursive;
                                   line-height: 2rem;
                                   background-image: repeating-linear-gradient(
                                        transparent,
                                        transparent 1.9rem,
                                        rgba(0, 0, 0, 0.15) 1.9rem,
                                        rgba(0, 0, 0, 0.15) 2rem
                                   );
                                   background-size: 100% 2rem;
                              "
                         ></textarea>

                         @if($isEditing)
                              <div class="flex gap-2 justify-end mt-2">
                                   <button
                                        wire:click="cancelEdit"
                                        class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition text-sm font-medium"
                                   >
                                        Cancel
                                   </button>
                                   <button
                                        wire:click="saveMessageOfTheDay"
                                        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition text-sm font-medium"
                                   >
                                        Save
                                   </button>
                              </div>
                         @endif
                    </div>
               </div>
          </div>
     </div>
</div>
