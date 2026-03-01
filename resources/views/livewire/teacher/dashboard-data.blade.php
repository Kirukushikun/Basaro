<div class="content flex-1 flex flex-col">
     <!-- Summary Cards -->
     <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4 text-white">
          <div class="px-6 py-5 rounded-xl bg-[#31343A] shadow-sm flex justify-between items-center hover:-translate-y-2 hover:shadow-lg transition-all duration-200">
               <div class="card-label">
                    <p class="text-sm font-semibold text-[#ADADAD]">Total Students</p>
                    <h1 class="text-lg font-bold">{{ number_format($totalStudents) }}</h1>
               </div>
               <div class="card-icon p-2 rounded-xl bg-[#F4C300] text-xl">
                    <i class="fa-solid fa-user-graduate text-[#2d3748]"></i>
               </div>
          </div>
          <div class="px-5 py-5 rounded-xl bg-[#31343A] shadow-sm flex justify-between items-center hover:-translate-y-2 hover:shadow-lg transition-all duration-200">
               <div class="card-label">
                    <p class="text-sm font-semibold text-[#ADADAD]">Overall Performance</p>
                    <h1 class="text-lg font-bold">{{ $overallPerformance }}%</h1>
               </div>
               <div class="card-icon p-2 rounded-xl bg-[#F4C300] text-xl">
                    <i class="fa-solid fa-chart-simple text-[#2d3748]"></i>
               </div>
          </div>
          <div class="px-5 py-5 rounded-xl bg-[#31343A] shadow-sm flex justify-between items-center hover:-translate-y-2 hover:shadow-lg transition-all duration-200">
               <div class="card-label">
                    <p class="text-sm font-semibold text-[#ADADAD]">Total Lessons</p>
                    <h1 class="text-lg font-bold">{{ $totalLessons }}</h1>
               </div>
               <div class="card-icon p-2 rounded-xl bg-[#F4C300] text-xl">
                    <i class="fa-solid fa-book text-[#2d3748]"></i>
               </div>
          </div>
          <div class="px-5 py-5 rounded-xl bg-[#31343A] shadow-sm flex justify-between items-center hover:-translate-y-2 hover:shadow-lg transition-all duration-200">
               <div class="card-label">
                    <p class="text-sm font-semibold text-[#ADADAD]">Active this week</p>
                    <h1 class="text-lg font-bold">{{ $activeThisWeek }}</h1>
               </div>
               <div class="card-icon p-2 rounded-xl bg-[#F4C300] text-xl">
                    <i class="fa-solid fa-earth-asia text-[#2d3748]"></i>
               </div>
          </div>
     </div>

     <!-- Main Cards -->
     <div class="main-cards h-full grid-cols-1 lg:grid-cols-[calc(35%-10px)_calc(65%-10px)]">
          <!-- Left Card -->
          <div class="card flex flex-col gap-5">
               <h1 class="text-xl font-bold mb-2">Performance Distribution</h1>
               <div class="graph">
                    <div class="flex items-end bg-[#222427] rounded-xl p-[40px] pb-[65px] font-sans h-80 w-full">
                         <!-- Y-Axis -->
                         <div class="flex flex-col justify-between h-full mr-1 text-xs">
                              <p class="!text-white">{{ $performanceDistribution['max'] }}</p>
                              <p class="!text-white">{{ round($performanceDistribution['max'] * 0.75) }}</p>
                              <p class="!text-white">{{ round($performanceDistribution['max'] * 0.5) }}</p>
                              <p class="!text-white">{{ round($performanceDistribution['max'] * 0.25) }}</p>
                              <p class="!text-white">0</p>
                         </div>

                         <!-- Chart Bars -->
                         <div class="flex items-end justify-around flex-1 h-full">
                              <div class="relative w-[10%] bg-green-400 rounded-lg flex items-end justify-center text-[10px] pb-2 shadow-md hover:opacity-80 hover:-translate-y-1 transition" 
                                   style="height: {{ $performanceDistribution['max'] > 0 ? ($performanceDistribution['excellent'] / $performanceDistribution['max']) * 100 : 0 }}%"
                                   title="{{ $performanceDistribution['excellent'] }} students">
                                   <span class="font-bold text-white">{{ $performanceDistribution['excellent'] }}</span>
                                   <div class="absolute -bottom-[30px] text-white text-center text-xs">Excellent</div>
                              </div>
                              <div class="relative w-[10%] bg-blue-400 rounded-lg flex items-end justify-center text-[10px] pb-2 shadow-md hover:opacity-80 hover:-translate-y-1 transition" 
                                   style="height: {{ $performanceDistribution['max'] > 0 ? ($performanceDistribution['good'] / $performanceDistribution['max']) * 100 : 0 }}%"
                                   title="{{ $performanceDistribution['good'] }} students">
                                   <span class="font-bold text-white">{{ $performanceDistribution['good'] }}</span>
                                   <div class="absolute -bottom-[30px] text-white text-center text-xs">Good</div>
                              </div>
                              <div class="relative w-[10%] bg-yellow-400 rounded-lg flex items-end justify-center text-[10px] pb-2 shadow-md hover:opacity-80 hover:-translate-y-1 transition" 
                                   style="height: {{ $performanceDistribution['max'] > 0 ? ($performanceDistribution['needs_guidance'] / $performanceDistribution['max']) * 100 : 0 }}%"
                                   title="{{ $performanceDistribution['needs_guidance'] }} students">
                                   <span class="font-bold text-white">{{ $performanceDistribution['needs_guidance'] }}</span>
                                   <div class="absolute -bottom-[30px] text-white text-center text-xs">Average</div>
                              </div>
                              <div class="relative w-[10%] bg-red-400 rounded-lg flex items-end justify-center text-[10px] pb-2 shadow-md hover:opacity-80 hover:-translate-y-1 transition" 
                                   style="height: {{ $performanceDistribution['max'] > 0 ? ($performanceDistribution['struggling'] / $performanceDistribution['max']) * 100 : 0 }}%"
                                   title="{{ $performanceDistribution['struggling'] }} students">
                                   <span class="font-bold text-white">{{ $performanceDistribution['struggling'] }}</span>
                                   <div class="absolute -bottom-[30px] text-white text-center text-xs">Struggling</div>
                              </div>
                         </div>
                    </div>
               </div>
               
               <h1 class="text-xl font-bold">Grade Level Overview</h1>
               <!-- Grade Level Distribution -->
               <div class="asset-statuses grid grid-cols-2 gap-10 mb-5">
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
                         <div class="flex flex-col gap-1">
                              <div class="label flex items-center gap-2">
                                   <i class="text-lg fa-solid fa-square" style="color: {{ $gradeColors[$gradeNum] }}"></i>
                                   <p class="text-sm text-[#ADADAD]">Grade {{ $gradeNum }}</p>
                              </div>
                              <div class="flex flex-col gap-2">
                                   <h1 class="text-lg font-bold">{{ $gradeData[$gradeNum] }}</h1>
                                   <div class="bg-gray-200 w-full h-[4px] rounded-sm">
                                        <div class="h-full rounded-sm" 
                                             style="width: {{ $totalStudents > 0 ? ($gradeData[$gradeNum] / $totalStudents * 100) : 0 }}%; background-color: {{ $gradeColors[$gradeNum] }}">
                                        </div>
                                   </div>
                              </div>
                         </div>
                    @endforeach
               </div>
          </div>

          <!-- Right Cards -->
          <div class="right-cards flex flex-col gap-7">
               <div class="card flex flex-col">
                    <h1 class="text-xl font-bold mb-5">Top Performing Students</h1>

                    @if(count($topPerformers) >= 3)
                    <div class="flex justify-center items-end gap-4 h-64">
                         <!-- 2nd Place -->
                         <div class="flex-1 flex flex-col text-center">
                              <p class="font-bold mt-1">{{ $topPerformers[1]['name'] }}</p>
                              <p class="text-sm text-[#ADADAD] mb-5">Average: {{ number_format($topPerformers[1]['average'], 1) }}%</p>
                              <div class="bg-[#515151] h-40 rounded-lg flex flex-col items-center justify-center">
                                   <span class="text-yellow-400 text-5xl font-black">#2</span>
                              </div>                              
                         </div>

                         <!-- 1st Place (taller) -->
                         <div class="flex-1 flex flex-col text-center">
                              <p class="font-bold mt-1">{{ $topPerformers[0]['name'] }}</p>
                              <p class="text-sm text-[#ADADAD] mb-5">Average: {{ number_format($topPerformers[0]['average'], 1) }}%</p>
                              <div class="bg-[#707070] h-52 rounded-lg flex flex-col items-center justify-center">
                                   <span class="text-yellow-400 text-5xl font-black">#1</span>
                              </div>                              
                         </div>

                         <!-- 3rd Place -->
                         <div class="flex-1 flex flex-col text-center">
                              <p class="font-bold mt-1">{{ $topPerformers[2]['name'] }}</p>
                              <p class="text-sm text-[#ADADAD] mb-5">Average: {{ number_format($topPerformers[2]['average'], 1) }}%</p>
                              <div class="bg-[#515151] h-40 rounded-lg flex flex-col items-center justify-center">
                                   <span class="text-yellow-400 text-5xl font-black">#3</span>
                              </div>                              
                         </div>
                    </div>
                    @else
                         <div class="flex justify-center items-center h-64 text-gray-500">
                              Not enough students with completed lessons to show rankings
                         </div>
                    @endif
               </div>

               <div class="alert-action flex-1 flex flex-col md:flex-row gap-7">
                    <div class="card flex-1">
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
                    
<div class="card !bg-[#F4C300] flex-1 flex flex-col gap-3">
     <div class="flex justify-between items-center">
          <h1 class="text-xl text-black font-bold">Message of the day</h1>
          
          @if(!$isEditing)
               <button 
                    wire:click="editMessage"
                    class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700 transition text-sm font-medium"
               >
                    Edit
               </button>
          @endif
     </div>

     @if(session()->has('message'))
          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded text-sm">
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
          <div class="flex gap-2 justify-end">
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