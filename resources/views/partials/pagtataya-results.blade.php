<!-- Pagtataya result -->
@php
    $nextLesson = $lesson + 1;
@endphp

<div 
    class="flex-1 flex flex-col items-center gap-5"
    x-data="{ 
        get percentage() {
            return Math.round((this.score / this.totalScore) * 100);
        },
        get hasPassed() {
            return this.percentage >= 70;
        }
    }"
    x-show="page > questions.length"  
    x-effect="if (page > questions.length) { $wire.completePagtataya() }"
>
    <img src="{{asset('img/Badge.png')}}" width="200" alt="">
    <h1 class="text-2xl font-bold">CONGRATULATIONS!</h1>
    <h2 class="score !text-[#F4C300]" x-text="percentage + '%'"></h2>
    <p class="w-96 text-lg text-center">
        Nakakuha ka ng <span class="font-bold" x-text="score"></span>
        sa <span class="font-bold" x-text="totalScore"></span> na tanong!
    </p>
    <p class="w-96 text-lg text-center" x-show="hasPassed">
        Mahusay! Natapos mo ang araling ito nang may buong sigasig at pagsisikap. Ipagpatuloy lamang ang iyong pagkatuto!
    </p>
    <p class="w-96 text-lg text-center text-red-400" x-show="!hasPassed">
        Kailangan ng 70% o mas mataas upang magpatuloy sa susunod na sesyon. Subukan muli!
    </p>
    
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

        <!-- Primary - Only show if passed -->
        <button
            x-show="hasPassed"
            @click="showModal = true"
            class="px-4 py-2 bg-[#F4C300] !text-black rounded-md font-bold hover:opacity-90 transition">
            Magpatuloy sa Sesyon {{$nextLesson}}
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
                    Handa ka na bang magsimula sa susunod na sesyon?
                </p>

                <div class="flex justify-end gap-3">
                    <button 
                        @click="showModal = false"
                        class="px-4 py-2 border rounded-lg hover:bg-gray-100"
                    >
                        Kanselahin
                    </button>

                    <button 
                        onclick="window.location.href='/lesson-view?lesson={{ encrypt($nextLesson) }}&slide=first-slide'"
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