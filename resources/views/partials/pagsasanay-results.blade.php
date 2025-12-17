<div x-show="page > questions.length" class="flex-1 flex flex-col items-center gap-5">
    <img src="../Img/Badge.png" width="200" alt="">
    <h1 class="text-2xl font-bold">CONGRATULATIONS!</h1>
    <h2 class="score !text-[#F4C300]" x-text="Math.round((score / questions.length) * 100) + '%'"></h2>
    <p class="w-96 text-lg text-center">
        Nakakuha ka ng <span class="font-bold" x-text="score"></span>
        sa <span class="font-bold" x-text="questions.length"></span> na tanong!
    </p>
    <div class="flex gap-4 mt-4">
        <button @click="replay" class="px-4 py-2 border border-2 border-[#F4C300] text-[#F4C300] rounded-md font-bold hover:bg-[#F4C300] hover:text-black transition">
            Ulitin
        </button>
        <button onclick="window.location.href='/'" class="px-4 py-2 bg-gray-600 rounded-md text-white font-bold hover:opacity-80">
            Lumabas
        </button>
    </div>
</div>