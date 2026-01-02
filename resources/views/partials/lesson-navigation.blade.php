<div class="flex w-full justify-end gap-5 mt-4"
    x-data="{ showModal: false }"
>
    <button
        @click="page == 1 ? window.location.href = '/lesson-view?lesson={{$lesson}}&slide=first-slide' : page--"
        class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold"
    >
        <i class="fa-solid fa-arrow-left !text-black"></i> Balik
    </button>

    <button 
        x-show="page < {{ $totalPages }}"
        @click="page++"
        class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold"
    >
        Susunod 
        <i class="fa-solid fa-arrow-right !text-black"></i>
    </button>

    <button 
        x-show="page === {{ $totalPages }}"
        x-effect="if (page === {{ $totalPages }}) { $wire.completeLesson() }"
        @click="showModal = true"
        class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold"
    >
        Magpatuloy
        <i class="fa-solid fa-arrow-right !text-black"></i>
    </button>

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
                <h2 class="text-xl font-semibold -mb-2">Pagsasanay</h2>

                <p>
                    Handa ka na bang magsimula sa pagsasanay?
                </p>

                <div class="flex justify-end gap-3">
                    <button 
                        @click="showModal = false"
                        class="px-4 py-2 border rounded-lg hover:bg-gray-100"
                    >
                        Kanselahin
                    </button>

                    <button 
                        onclick="window.location.href='/lesson-view?lesson={{ $lesson }}&slide=third-slide-panuto'"
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