<!-- Main Content -->
<main class="flex-1 pb-[50px]" x-data="{ page: 1 }">
    <div class="h-full flex items-center justify-center">
        <div class="card flex flex-col items-center gap-5 relative text-lg max-h-[80vh]">
            
            <!-- Title Section -->
            <div class="absolute -top-6 left-1/2 -translate-x-1/2">
                <div class="relative inline-block">
                    <h1 class="relative z-10 bg-[#F4C300] px-20 py-1 !text-black text-xl font-bold rounded-md border-2 border-[#31343A]">
                        PAGTATAYA
                    </h1>
                    
                    <!-- Decorative Ribbons -->
                    <img class="absolute z-0 -left-7 top-0" width="55" src="../Img/ribbon.png" alt="">
                    <img class="absolute z-0 -right-7 top-0 rotate-180" width="55" src="../Img/ribbon.png" alt="">
                </div>
            </div>

            <!-- Scrollable Content Area -->
            <div x-show="page === 1" 
                class="flex-1 flex flex-col items-center gap-10"
                x-data="{ recording: false, showMessage: false }">

                <h1 class="alphabet mt-10 !text-[#F4C300]">"M"</h1>

                <p class="w-96 text-lg text-center">
                    Basahin nang malinaw ang titik na nasa itaas. Subukang bigkasin ito nang tama at dahan-dahan.
                </p>

                <div 
                    @mousedown="recording = true" 
                    @mouseup="
                        recording = false; 
                        setTimeout(() => { 
                            showMessage = true; 
                        }, 1500)
                    "
                    @mouseleave="recording = false"
                    class="relative bg-gray-500 px-3 py-2 rounded-full cursor-pointer transition-transform hover:scale-110"
                    :class="{ 'scale-125 ring-4 ring-red-500 animate-pulse': recording }"
                >
                    <i class="fa-solid fa-microphone text-white text-xl"></i>

                    <!-- glowing ripple effect -->
                    <div x-show="recording"
                        class="absolute inset-0 rounded-full bg-red-500 opacity-30 animate-ping">
                    </div>
                </div>

                <!-- success message -->
                <div x-show="showMessage"
                    x-transition
                    class="mt-4 px-4 py-2 bg-green-500 text-white rounded-lg shadow-md text-lg font-semibold">
                    ✅ Tama!
                </div>
            </div>

            <div x-show="page === 2" 
                class="flex-1 flex flex-col items-center gap-10"
                x-data="{ recording: false, showMessage: false }">

                <h1 class="alphabet mt-10 !text-[#F4C300]">"S"</h1>

                <p class="w-96 text-lg text-center">
                    Basahin nang malinaw ang titik na nasa itaas. Subukang bigkasin ito nang tama at dahan-dahan.
                </p>

                <div 
                    @mousedown="recording = true" 
                    @mouseup="
                        recording = false; 
                        setTimeout(() => { 
                            showMessage = true; 
                        }, 1500)
                    "
                    @mouseleave="recording = false"
                    class="relative bg-gray-500 px-3 py-2 rounded-full cursor-pointer transition-transform hover:scale-110"
                    :class="{ 'scale-125 ring-4 ring-red-500 animate-pulse': recording }"
                >
                    <i class="fa-solid fa-microphone text-white text-xl"></i>

                    <!-- glowing ripple effect -->
                    <div x-show="recording"
                        class="absolute inset-0 rounded-full bg-red-500 opacity-30 animate-ping">
                    </div>
                </div>

                <!-- success message -->
                <div x-show="showMessage"
                    x-transition
                    class="mt-4 px-4 py-2 bg-green-500 text-white rounded-lg shadow-md text-lg font-semibold">
                    ✅ Tama!
                </div>
            </div>

            <div x-show="page === 3" 
                class="flex-1 flex flex-col items-center gap-10"
                x-data="{ recording: false, showMessage: false }">

                <h1 class="alphabet mt-10 !text-[#F4C300]">"A"</h1>

                <p class="w-96 text-lg text-center">
                    Basahin nang malinaw ang titik na nasa itaas. Subukang bigkasin ito nang tama at dahan-dahan.
                </p>

                <div 
                    @mousedown="recording = true" 
                    @mouseup="
                        recording = false; 
                        setTimeout(() => { 
                            showMessage = true; 
                        }, 1500)
                    "
                    @mouseleave="recording = false"
                    class="relative bg-gray-500 px-3 py-2 rounded-full cursor-pointer transition-transform hover:scale-110"
                    :class="{ 'scale-125 ring-4 ring-red-500 animate-pulse': recording }"
                >
                    <i class="fa-solid fa-microphone text-white text-xl"></i>

                    <!-- glowing ripple effect -->
                    <div x-show="recording"
                        class="absolute inset-0 rounded-full bg-red-500 opacity-30 animate-ping">
                    </div>
                </div>

                <!-- success message -->
                <div x-show="showMessage"
                    x-transition
                    class="mt-4 px-4 py-2 bg-green-500 text-white rounded-lg shadow-md text-lg font-semibold">
                    ✅ Tama!
                </div>
            </div>

            <div x-show="page === 4" 
                class="flex-1 flex flex-col items-center gap-10"
                x-data="{ recording: false, showMessage: false }">

                <h1 class="alphabet mt-10 !text-[#F4C300]">"I"</h1>

                <p class="w-96 text-lg text-center">
                    Basahin nang malinaw ang titik na nasa itaas. Subukang bigkasin ito nang tama at dahan-dahan.
                </p>

                <div 
                    @mousedown="recording = true" 
                    @mouseup="
                        recording = false; 
                        setTimeout(() => { 
                            showMessage = true; 
                        }, 1500)
                    "
                    @mouseleave="recording = false"
                    class="relative bg-gray-500 px-3 py-2 rounded-full cursor-pointer transition-transform hover:scale-110"
                    :class="{ 'scale-125 ring-4 ring-red-500 animate-pulse': recording }"
                >
                    <i class="fa-solid fa-microphone text-white text-xl"></i>

                    <!-- glowing ripple effect -->
                    <div x-show="recording"
                        class="absolute inset-0 rounded-full bg-red-500 opacity-30 animate-ping">
                    </div>
                </div>

                <!-- success message -->
                <div x-show="showMessage"
                    x-transition
                    class="mt-4 px-4 py-2 bg-green-500 text-white rounded-lg shadow-md text-lg font-semibold">
                    ✅ Tama!
                </div>
            </div>

            <div x-show="page === 5" 
                class="flex-1 flex flex-col items-center gap-10"
                x-data="{ recording: false, showMessage: false }">

                <h1 class="alphabet mt-10 !text-[#F4C300]">"0"</h1>

                <p class="w-96 text-lg text-center">
                    Basahin nang malinaw ang titik na nasa itaas. Subukang bigkasin ito nang tama at dahan-dahan.
                </p>

                <div 
                    @mousedown="recording = true" 
                    @mouseup="
                        recording = false; 
                        setTimeout(() => { 
                            showMessage = true; 
                        }, 1500)
                    "
                    @mouseleave="recording = false"
                    class="relative bg-gray-500 px-3 py-2 rounded-full cursor-pointer transition-transform hover:scale-110"
                    :class="{ 'scale-125 ring-4 ring-red-500 animate-pulse': recording }"
                >
                    <i class="fa-solid fa-microphone text-white text-xl"></i>

                    <!-- glowing ripple effect -->
                    <div x-show="recording"
                        class="absolute inset-0 rounded-full bg-red-500 opacity-30 animate-ping">
                    </div>
                </div>

                <!-- success message -->
                <div x-show="showMessage"
                    x-transition
                    class="mt-4 px-4 py-2 bg-green-500 text-white rounded-lg shadow-md text-lg font-semibold">
                    ✅ Tama!
                </div>
            </div>

            <div x-show="page === 6" class="flex-1 flex flex-col items-center gap-5">
                <img src="../Img/Badge.png" width="200" alt="">
                <h1 class="text-2xl font-bold">CONGRATULATIONS!</h1>

                <h2 class="score !text-[#F4C300]">100%</h2>

                <p class="w-96 text-lg text-center">Mahusay! Natapos mo ang araling ito nang may buong sigasig at pagsisikap. Ipagpatuloy lamang ang iyong pagkatuto!</p>
                
                <button
                    class="px-4 py-2 bg-[#F4C300] rounded-md text-black font-bold" onclick="window.location.href='/lessons'">
                    Next Lesson
                </button>
            </div>
            
            <!-- Action Button -->
            <div x-show="page < 6"  class="absolute -bottom-[70px] flex items-center justify-between w-full">
                <p><span x-text="page"></span>/5</p>

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
                        @click="page++" 
                        class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold">
                        Susunod <i class="fa-solid fa-arrow-right !text-black"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>