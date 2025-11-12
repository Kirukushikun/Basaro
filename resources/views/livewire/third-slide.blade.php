<!-- Main Content -->
<main class="flex-1 pb-[50px]" x-data="{ page: 1 }">
    <div class="h-full flex items-center justify-center">
        <div class="card flex flex-col items-center gap-5 relative text-lg max-h-[80vh]">
            
            <!-- Title Section -->
            <div class="absolute -top-6 left-1/2 -translate-x-1/2">
                <div class="relative inline-block">
                    <h1 class="relative z-10 bg-[#F4C300] px-20 py-1 !text-black text-xl font-bold rounded-md border-2 border-[#31343A]">
                        PAGSASANAY
                    </h1>
                    
                    <!-- Decorative Ribbons -->
                    <img class="absolute z-0 -left-7 top-0" width="55" src="../Img/ribbon.png" alt="">
                    <img class="absolute z-0 -right-7 top-0 rotate-180" width="55" src="../Img/ribbon.png" alt="">
                </div>
            </div>
            <!-- Scrollable Content Area -->
            <div x-show="page === 1" class="flex-1 flex flex-col items-center gap-10">
                <h1 class="alphabet mt-10 !text-[#F4C300]">
                    "M"   
                </h1>

                <p class="w-96 text-lg text-center">Basahin nang malinaw ang titik na nasa itaas. Subukang bigkasin ito nang tama at dahan-dahan.</p>
                
                <div class="bg-gray-500 px-3 py-2 rounded-full cursor-pointer hover:scale-110">
                    <i class="fa-solid fa-microphone"></i>
                </div>
            </div>

            <div x-show="page === 2" class="flex-1 flex flex-col items-center gap-10">
                <h1 class="alphabet mt-10 !text-[#F4C300]">
                    "S"   
                </h1>

                <p class="w-96 text-lg text-center">Basahin nang malinaw ang titik na nasa itaas. Subukang bigkasin ito nang tama at dahan-dahan.</p>
                
                <div class="bg-gray-500 px-3 py-2 rounded-full cursor-pointer hover:scale-110">
                    <i class="fa-solid fa-microphone"></i>
                </div>
            </div>

            <div x-show="page === 3" class="flex-1 flex flex-col items-center gap-10">
                <h1 class="alphabet mt-10 !text-[#F4C300]">
                    "A"   
                </h1>

                <p class="w-96 text-lg text-center">Basahin nang malinaw ang titik na nasa itaas. Subukang bigkasin ito nang tama at dahan-dahan.</p>
                
                <div class="bg-gray-500 px-3 py-2 rounded-full cursor-pointer hover:scale-110">
                    <i class="fa-solid fa-microphone"></i>
                </div>
            </div>

            <div x-show="page === 4" class="flex-1 flex flex-col items-center gap-5">
                <img src="../Img/Badge.png" width="200" alt="">
                <h1 class="text-2xl font-bold">CONGRATULATIONS!</h1>

                <h2 class="score !text-[#F4C300]">92%</h2>

                <p class="w-96 text-lg text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium aut dolor ullam fugit? Reprehenderit, molestiae!</p>
                
                <button
                    class="px-4 py-2 bg-[#F4C300] rounded-md text-black font-bold">
                    Next Lesson
                </button>
            </div>
            
            <!-- Action Button -->
            <div class="absolute -bottom-[70px] flex items-center justify-between w-full">
                <p>1/35</p>

                <div class="flex gap-5">
                    <!-- Previous -->
                    <button 
                        @click="page--" 
                        :disabled="page === 1"
                        class="px-4 py-2 border border-2 border-gray-500 text-white rounded-md  font-bold ">
                        <i class="fa-solid fa-arrow-left "></i> Balik
                    </button>

                    <!-- Next -->
                    <button 
                        x-show="page < 4" 
                        @click="page++" 
                        class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold">
                        Susunod <i class="fa-solid fa-arrow-right !text-black"></i>
                    </button>

                    <!-- Continue -->
                    <button 
                        x-show="page === 4" 
                        @click="window.location.href='../Student/4 - sSlide.html'"
                        class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold">
                        Magpatuloy <i class="fa-solid fa-arrow-right !text-black"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>