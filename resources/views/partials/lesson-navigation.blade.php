<div class="flex w-full justify-end gap-5 mt-4">
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
        onclick="window.location.href='/lesson-view?lesson={{ $lesson }}&slide=third-slide'"
        class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold"
    >
        Magpatuloy
        <i class="fa-solid fa-arrow-right !text-black"></i>
    </button>
</div>