@extends('layouts.ppa')

@section('content')
<div class="content flex-1 flex flex-col">
     <!-- Summary Cards -->
     <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4 text-white">
          <div class="px-6 py-5 rounded-xl bg-[#31343A] shadow-sm flex justify-between items-center hover:-translate-y-2 hover:shadow-lg">
               <div class="card-label">
               <p class="text-sm font-semibold text-[#ADADAD]">Total Students</p>
               <h1 class="text-lg font-bold">197</h1>
               </div>
               <div class="card-icon p-2 rounded-xl bg-[#F4C300] text-xl">
                    <i class="fa-solid fa-user-graduate"></i>
               </div>
          </div>
          <div class="px-5 py-5 rounded-xl bg-[#31343A] shadow-sm flex justify-between items-center hover:-translate-y-2 hover:shadow-lg">
               <div class="card-label">
               <p class="text-sm font-semibold text-[#ADADAD]">Overall Performance</p>
               <h1 class="text-lg font-bold">85%</h1>
               </div>
               <div class="card-icon p-2 rounded-xl bg-[#F4C300] text-xl">
                    <i class="fa-solid fa-chart-simple"></i>
               </div>
          </div>
          <div class="px-5 py-5 rounded-xl bg-[#31343A] shadow-sm flex justify-between items-center hover:-translate-y-2 hover:shadow-lg">
               <div class="card-label">
               <p class="text-sm font-semibold text-[#ADADAD]">Total Lessons</p>
               <h1 class="text-lg font-bold">22</h1>
               </div>
               <div class="card-icon p-2 rounded-xl bg-[#F4C300] text-xl">
               <i class="fa-solid fa-book"></i>
               </div>
          </div>
          <div class="px-5 py-5 rounded-xl bg-[#31343A] shadow-sm flex justify-between items-center hover:-translate-y-2 hover:shadow-lg">
               <div class="card-label">
               <p class="text-sm font-semibold text-[#ADADAD]">Active this week</p>
               <h1 class="text-lg font-bold">110</h1>
               </div>
               <div class="card-icon p-2 rounded-xl bg-[#F4C300] text-xl">
               <i class="fa-solid fa-earth-asia"></i>
               </div>
          </div>
     </div>

     <br />

     <!-- Main Cards -->
     <div class="main-cards h-full grid-cols-1 lg:grid-cols-[calc(35%-10px)_calc(65%-10px)]">
          <!-- Left Card -->
          <div class="card flex flex-col gap-5">
               <div class="graph">
                    <div class="flex items-end bg-[#222427] rounded-xl p-[40px] pb-[65px] font-sans h-80 w-full">
                         <!-- Y-Axis -->
                         <div class="flex flex-col justify-between h-full mr-1 text-xs">
                              <p class="!text-white">5000</p>
                              <p class="!text-white">3000</p>
                              <p class="!text-white">2000</p>
                              <p class="!text-white">1000</p>
                              <p class="!text-white">0</p>
                         </div>

                         <!-- Chart Bars -->
                         <div class="flex items-end justify-around flex-1 h-full">
                              <div class="relative w-[10%] bg-white rounded-lg flex items-end justify-center text-[10px] pb-2 shadow-md hover:opacity-80 hover:-translate-y-1 transition" style="height: 80%">
                                   <div class="absolute -bottom-[30px] text-white">GOOD</div>
                              </div>
                              <div class="relative w-[10%] bg-white rounded-lg flex items-end justify-center text-[10px] pb-2 shadow-md hover:opacity-80 hover:-translate-y-1 transition" style="height: 35%">
                                   <div class="absolute -bottom-[30px] text-white">DEFECTIVE</div>
                              </div>
                              <div class="relative w-[10%] bg-white rounded-lg flex items-end justify-center text-[10px] pb-2 shadow-md hover:opacity-80 hover:-translate-y-1 transition" style="height: 45%">
                                   <div class="absolute -bottom-[30px] text-white">REPAIR</div>
                              </div>
                              <div class="relative w-[10%] bg-white rounded-lg flex items-end justify-center text-[10px] pb-2 shadow-md hover:opacity-80 hover:-translate-y-1 transition" style="height: 55%">
                                   <div class="absolute -bottom-[30px] text-white">REPLACE</div>
                              </div>
                         </div>
                    </div>
               </div>
               <h1 class="text-xl font-bold">Grade Level Overview</h1>
               <!-- Asset Status Overview -->
               <div class="asset-statuses grid grid-cols-2 gap-10 mb-5">
                    <div class="flex flex-col gap-1">
                         <div class="label flex items-center gap-2">
                              <i class="text-lg fa-solid fa-square text-[#4FD1C5]"></i>
                              <p class="text-sm text-[#ADADAD]">Grade 7</p>
                         </div>
                         <div class="flex flex-col gap-2">
                              <h1 class="text-lg font-bold">54</h1>
                              <div class="bg-gray-200 w-full h-[4px] rounded-sm">
                                   <div class="h-full w-[20%] bg-[#4FD1C5] rounded-sm"></div>
                              </div>
                         </div>
                    </div>
                    <div class="flex flex-col gap-1">
                         <div class="label flex items-center gap-2">
                              <i class="text-lg fa-solid fa-square text-[#4299E1]"></i>
                              <p class="text-sm text-[#ADADAD]">Grade 8</p>
                         </div>
                         <div class="flex flex-col gap-2">
                              <h1 class="text-lg font-bold">46</h1>
                              <div class="bg-gray-200 w-full h-[4px] rounded-sm">
                                   <div class="h-full w-[20%] bg-[#4299E1] rounded-sm"></div>
                              </div>
                         </div>
                    </div>
                    <div class="flex flex-col gap-1">
                         <div class="label flex items-center gap-2">
                              <i class="text-lg fa-solid fa-square text-[#F4C300]"></i>
                              <p class="text-sm text-[#ADADAD]">Grade 9</p>
                         </div>
                         <div class="flex flex-col gap-2">
                              <h1 class="text-lg font-bold">52</h1>
                              <div class="bg-gray-200 w-full h-[4px] rounded-sm">
                                   <div class="h-full w-[20%] bg-[#F4C300] rounded-sm"></div>
                              </div>
                         </div>
                    </div>
                    <div class="flex flex-col gap-1">
                         <div class="label flex items-center gap-2">
                              <i class="text-lg fa-solid fa-square text-[#ED8936]"></i>
                              <p class="text-sm text-[#ADADAD]">Grade 10</p>
                         </div>
                         <div class="flex flex-col gap-2">
                              <h1 class="text-lg font-bold">45</h1>
                              <div class="bg-gray-200 w-full h-[4px] rounded-sm">
                                   <div class="h-full w-[20%] bg-[#ED8936] rounded-sm"></div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>

          <!-- Right Cards -->
          <div class="right-cards flex flex-col gap-7">
               <div class="card flex flex-col">
                    <h1 class="text-xl font-bold mb-5">Top Performing Students</h1>

                    <div class="flex justify-center items-end gap-4 h-64">
                         <!-- 2nd Place -->
                         <div class="flex-1 flex flex-col text-center">
                              <p class="font-bold mt-1">Juan Dela Cruz</p>
                              <p class="text-sm text-[#ADADAD] mb-5">General Average: 98.5</p>
                              <div class="bg-[#515151]  h-40 rounded-lg flex flex-col items-center justify-center">
                                   <span class="text-yellow-400 text-5xl font-black">#2</span>
                              </div>                              
                         </div>


                         <!-- 1st Place (taller) -->
                         <div class="flex-1 flex flex-col text-center">
                              <p class="font-bold mt-1">Chris P. Bacon</p>
                              <p class="text-sm text-[#ADADAD] mb-5">General Average: 98.5</p>
                              <div class="bg-[#707070]  h-52 rounded-lg flex flex-col items-center justify-center">
                                   <span class="text-yellow-400 text-5xl font-black">#1</span>
                              </div>                              
                         </div>

                         <!-- 3rd Place -->
                         <div class="flex-1 flex flex-col text-center">
                              <p class="font-bold mt-1">Pedro P. Duko</p>
                              <p class="text-sm text-[#ADADAD] mb-5">General Average: 98.5</p>
                              <div class="bg-[#515151]  h-40 rounded-lg flex flex-col items-center justify-center">
                                   <span class="text-yellow-400 text-5xl font-black">#3</span>
                              </div>                              
                         </div>
                    </div>

               </div>

               <div class="alert-action flex-1 flex flex-col md:flex-row gap-7">
                    <div class="card flex-1">
                         <h1 class="text-xl font-bold mb-5">Alerts</h1>
                         <div class="pl-5 flex flex-col gap-5">
                              <!-- Alert 1 -->
                              <div class="relative flex flex-col gap-2">
                                   <!-- icon and line -->
                                   <div class="absolute top-1 -left-6 flex flex-col items-center gap-1 h-full">
                                        <i class="fa-solid fa-bell text-yellow-400 text-md"></i>
                                        <div class="w-[3px] rounded-lg flex-1 bg-gray-200"></div>
                                   </div>

                                   <!-- text content -->
                                   <p class="text-sm font-bold ml-2">5 assets are marked Lost</p>
                                   <p class="text-xs text-[#ADADAD] font-semibold ml-2">22 DEC 7:20 PM</p>
                              </div>

                              <!-- Alert 2 -->
                              <div class="relative flex flex-col gap-2">
                                   <!-- icon and line -->
                                   <div class="absolute top-1 -left-6 flex flex-col items-center gap-1 h-full">
                                        <i class="fa-solid fa-bell text-yellow-400 text-md"></i>
                                        <div class="w-[3px] rounded-lg flex-1 bg-gray-200"></div>
                                   </div>

                                   <!-- text content -->
                                   <p class="text-sm font-bold ml-2">12 assets are Under Repair for more than 30 days</p>
                                   <p class="text-xs text-[#ADADAD] font-semibold ml-2">21 DEC 11:21 PM</p>
                              </div>

                              <!-- Alert 3 -->
                              <div class="relative flex flex-col gap-2">
                                   <!-- icon and line -->
                                   <div class="absolute top-1 -left-6 flex flex-col items-center gap-1 h-full">
                                        <i class="fa-solid fa-bell text-yellow-400 text-md"></i>
                                        <div class="w-[3px] rounded-lg flex-1 bg-gray-200"></div>
                                   </div>

                                   <!-- text content -->
                                   <p class="text-sm font-bold ml-2">3 employees have unreturned items</p>
                                   <p class="text-xs text-[#ADADAD] font-semibold ml-2">21 DEC 9:28 PM</p>
                              </div>
                         </div>
                    </div>
                    <div class="card !bg-[#F4C300] flex-1 flex flex-col gap-5">
                         <h1 class="text-xl text-white font-bold">Quick Actions</h1>

                         <!-- <div class="grid grid-cols-2 gap-4">
                              <button class="bg-[#31343A] rounded-md p-3 text-sm font-semibold hover:scale-105"><i class="fa-solid fa-plus text-yellow-400"></i> Add New Asset</button>
                              <button class="bg-[#31343A] rounded-md p-3 text-sm font-semibold hover:scale-105"><i class="fa-solid fa-user-plus text-yellow-400"></i> Add Employee</button>
                              <button class="bg-[#31343A] rounded-md p-3 text-sm font-semibold hover:scale-105"><i class="fa-solid fa-file-lines text-yellow-400"></i> Generate Report</button>
                              <button class="bg-[#31343A] rounded-md p-3 text-sm font-semibold hover:scale-105"><i class="fa-solid fa-file-import text-yellow-400"></i> Import Assets</button>
                              <button class="bg-[#31343A] rounded-md p-3 text-sm font-semibold hover:scale-105"><i class="fa-solid fa-file-export text-yellow-400"></i> Export Assets</button>
                         </div> -->
                    </div>
               </div>
          </div>
     </div>
</div>
@endsection