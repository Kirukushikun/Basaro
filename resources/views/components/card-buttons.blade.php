<div 
    x-data="navButtons({ 
        startPage: {{ $startPage ?? 1 }}, 
        endPage: {{ $endPage ?? 2 }},
        backUrl: '{{ $backUrl ?? '' }}',
        continueUrl: '{{ $continueUrl ?? '' }}'
    })"
    class="flex w-full justify-end gap-5 mt-4"
>
    <!-- Back -->
    <button
        @click="goBack()"
        class="px-4 py-2 bg-[#F4C300] rounded-md text-black font-bold"
    >
        <i class="fa-solid fa-arrow-left text-black"></i> Balik
    </button>

    <!-- Next -->
    <button 
        x-show="page < endPage"
        @click="page++"
        class="px-4 py-2 bg-[#F4C300] rounded-md text-black font-bold"
    >
        Susunod 
        <i class="fa-solid fa-arrow-right text-black"></i>
    </button>

    <!-- Continue -->
    <button 
        x-show="page === endPage"
        @click="goContinue()"
        class="px-4 py-2 bg-[#F4C300] rounded-md text-black font-bold"
    >
        Magpatuloy
        <i class="fa-solid fa-arrow-right text-black"></i>
    </button>
</div>
<script>
    function navButtons({ startPage, endPage, backUrl, continueUrl }) {
        return {
            page: startPage,

            goBack() {
                if (this.page === startPage) {
                    window.location.href = backUrl;
                } else {
                    this.page--;
                }
            },

            goContinue() {
                window.location.href = continueUrl;
            }
        };
    }
</script>