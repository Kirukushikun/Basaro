<!-- Pagtataya result -->
<div 
    class="flex-1 flex flex-col items-center gap-5"
    x-data="{ showModal: false }"
    x-show="page > questions.length"  
    x-effect="if (page > questions.length) { $wire.completePagtataya() }"
>
    <img src="{{asset('img/Badge.png')}}" width="200" alt="">
    <h1 class="text-2xl font-bold">CONGRATULATIONS!</h1>
    <h2 class="score !text-[#F4C300]" x-text="Math.round((score / questions.length) * 100) + '%'"></h2>
    <p class="w-96 text-lg text-center">
        Nakakuha ka ng <span class="font-bold" x-text="score"></span>
        sa <span class="font-bold" x-text="questions.length"></span> na tanong!
    </p>
    <p class="w-96 text-lg text-center">Mahusay! Natapos mo ang araling ito nang may buong sigasig at pagsisikap. Ipagpatuloy lamang ang iyong pagkatuto!</p>
    <div class="flex gap-4 mt-4">
        <button
            @click="replay"
            class="px-4 py-2 border-2 border-[#F4C300] text-[#F4C300] rounded-md font-bold hover:bg-[#F4C300] hover:text-black transition">
            Ulitin
        </button>

        <!-- Exit -->
        <button
            onclick="window.location.href='/'"
            class="px-4 py-2 bg-gray-600 text-white rounded-md font-bold hover:bg-gray-700 transition">
            Lumabas
        </button>

        <!-- Primary -->
        <button
            @click="showModal = true"
            class="px-4 py-2 bg-[#F4C300] !text-black rounded-md font-bold hover:opacity-90 transition">
            Magpatuloy sa Pagtataya
        </button>
    </div>

        <!-- Backdrop -->
    <div x-show="showModal" x-transition.opacity class="fixed inset-0 bg-black/30 z-40" @click="showModal = false"></div>

    <!-- Modal Container -->
    <div
        x-show="showModal"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="fixed inset-0 flex items-center justify-center z-50"
        @click.self="showModal = false"
    >
        <div class="relative bg-[#31343A] p-8 rounded-lg shadow-lg w-[26rem] max-h-[90vh] overflow-y-auto">
            <button class="absolute right-7 top-7 text-gray-400 hover:text-gray-800" @click="showModal = false">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <div class="flex flex-col gap-5">
                <h2 class="text-xl font-semibold -mb-2">Pagtataya</h2>

                <p>
                    Handa ka na bang magsimula sa Pagtataya?
                </p>

                <div class="flex justify-end gap-3">
                    <button 
                        @click="showModal = false"
                        class="px-4 py-2 border rounded-lg hover:bg-gray-100"
                    >
                        Kanselahin
                    </button>

                    <button 
                        onclick="window.location.href='/lesson-view?lesson={{ $lesson }}&slide=fourth-slide'"
                        @click="showModal = false"
                        class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold"
                    >
                        Simulan
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>  