<!-- Pagsasanay navigation -->
<div x-show="page <= questions.length" class="absolute -bottom-[110px] flex items-center justify-between w-full">
    <p><span x-text="page"></span>/<span x-text="questions.length"></span></p>
    <div class="flex gap-5">
        <button x-show="page > 1" @click="page--; reset()" class="px-4 py-2 border border-gray-500 text-white rounded-md font-bold">
            <i class="fa-solid fa-arrow-left"></i> Balik
        </button>
        <button x-show="confirmed" @click="next" class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold">
            Susunod <i class="fa-solid fa-arrow-right !text-black"></i>
        </button>
    </div>
</div>