{{-- ===== LESSON 15: PANG-UNAWA SA BINASANG KARUNUNGANG BAYAN ===== --}}

<div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg">
    {{-- ===== PAGE 1: TITLE ===== --}}
    <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold border-b border-gray-500 pb-4">
                <span class="!text-[#F4C300]">Sesyon 15:</span>
                Karunungang Bayan
            </h1>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-2 gap-8 w-full max-w-4xl">
                <div class="bg-gray-800/50 p-8 rounded-lg border-2 border-[#F4C300] text-center">
                    <p class="text-2xl font-bold !text-[#F4C300]">BUGTONG</p>
                </div>
                <div class="bg-gray-800/50 p-8 rounded-lg border-2 border-[#F4C300] text-center">
                    <p class="text-2xl font-bold !text-[#F4C300]">SALAWIKAIN</p>
                </div>
                <div class="bg-gray-800/50 p-8 rounded-lg border-2 border-[#F4C300] text-center">
                    <p class="text-2xl font-bold !text-[#F4C300]">KASABIHAN</p>
                </div>
                <div class="bg-gray-800/50 p-8 rounded-lg border-2 border-[#F4C300] text-center">
                    <p class="text-2xl font-bold !text-[#F4C300]">SAWIKAIN</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 2: BUGTONG INTRO ===== --}}
    <div x-show="page === 2" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold !text-[#F4C300]">BUGTONG</h1>
        </header>

        <div class="flex-1 flex flex-col items-center justify-center gap-6 p-8">
            <div class="bg-gray-800/50 p-10 rounded-lg border-2 border-[#F4C300] text-center">
                <p class="text-2xl font-semibold leading-relaxed">
                    Isang kuwadrong maliit,<br>
                    Naaabot ang buong daigdig.
                </p>
                <p class="text-2xl !text-[#F4C300] font-bold mt-8">
                    Sagot: cellphone
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 3: BUGTONG EXAMPLES ===== --}}
    <div x-show="page === 3" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <div class="flex-1 grid grid-cols-2 gap-8 overflow-y-auto p-5">
            <div class="bg-gray-800/50 p-8 rounded-lg border-2 border-[#F4C300] flex flex-col justify-center">
                <p class="text-2xl font-semibold text-center leading-relaxed">
                    Dalawang bolang malalim,<br>
                    Malayo ang nararating.
                </p>
                <p class="text-2xl !text-[#F4C300] font-bold text-center mt-6">
                    Sagot: mata
                </p>
            </div>

            <div class="bg-gray-800/50 p-8 rounded-lg border-2 border-[#F4C300] flex flex-col justify-center">
                <p class="text-2xl font-semibold text-center leading-relaxed">
                    Isang prinsesa,<br>
                    Nakaupo sa tasa.
                </p>
                <p class="text-2xl !text-[#F4C300] font-bold text-center mt-6">
                    Sagot: kasoy
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 4: BUGTONG PRACTICE ===== --}}
    <div x-show="page === 4" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex flex-col items-center justify-center gap-6 p-8">
            <div class="bg-gray-800/50 p-10 rounded-lg border-2 border-[#F4C300] text-center">
                <p class="text-2xl font-semibold leading-relaxed">
                    Inuukit niyang mga titik,<br>
                    Binubura pag may batik.
                </p>
                <p class="text-2xl !text-[#F4C300] font-bold mt-8">
                    Sagot: ?
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 5: SALAWIKAIN INTRO ===== --}}
    <div x-show="page === 5" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold !text-[#F4C300]">SALAWIKAIN</h1>
        </header>

        <div class="flex-1 flex flex-col items-center justify-center gap-10 p-8">
            <div class="bg-gray-800/50 p-8 rounded-lg border-2 border-[#F4C300] text-center w-full max-w-3xl">
                <p class="text-3xl font-bold leading-relaxed">
                    Kapag may tiyaga,<br>
                    May nilaga.
                </p>
            </div>

            <div class="bg-gray-800/50 p-8 rounded-lg border-2 border-[#F4C300] text-center w-full max-w-3xl">
                <p class="text-3xl font-bold leading-relaxed">
                    Kapag may isinuksok,<br>
                    May madurukot.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 6: SALAWIKAIN MEANING - ISINUKSOK ===== --}}
    <div x-show="page === 6" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex flex-col justify-center gap-10 p-8">
            <div class="bg-gray-800/50 p-8 rounded-lg border-2 border-[#F4C300]">
                <p class="text-3xl font-bold !text-[#F4C300] text-center mb-4">isinuksok</p>
                <p class="text-2xl font-semibold text-center">= itinago, inilagay, ipinasok</p>
            </div>
            
            <div class="bg-gray-800/50 p-8 rounded-lg border-2 border-[#F4C300]">
                <p class="text-3xl font-bold !text-[#F4C300] text-center mb-4">madurukot</p>
                <p class="text-2xl font-semibold text-center">= makukuha, mahuhugot</p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 7: SALAWIKAIN MEANING - PERA ===== --}}
    <div x-show="page === 7" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center p-8">
            <div class="bg-gray-800/50 p-12 rounded-lg border-2 border-[#F4C300] text-center">
                <p class="text-2xl font-semibold leading-relaxed mb-8">
                    Kapag may isinuksok,<br>
                    May madurukot.
                </p>
                <div class="border-t-2 border-gray-600 pt-8 mt-8">
                    <p class="text-3xl font-bold !text-[#F4C300]">PERA</p>
                    <p class="text-2xl mt-6">Mag-ipon = May magagamit</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 8: KASABIHAN INTRO ===== --}}
    <div x-show="page === 8" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold !text-[#F4C300]">KASABIHAN</h1>
        </header>

        <div class="flex-1 flex flex-col items-center justify-center gap-6 p-8">
            <div class="bg-gray-800/50 p-10 rounded-lg border-2 border-[#F4C300] text-center">
                <p class="text-2xl font-bold leading-relaxed">
                    Ang pagsasabi nang tapat,<br>
                    Pagsasama nang maluwat.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 9: KASABIHAN MEANING ===== --}}
    <div x-show="page === 9" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center p-8">
            <div class="bg-gray-800/50 p-12 rounded-lg border-2 border-[#F4C300] text-center max-w-4xl">
                <p class="text-3xl font-bold !text-[#F4C300] mb-8">matapat = hindi sinungaling</p>
                <p class="text-2xl font-semibold leading-relaxed">
                    Magtatagal ang samahan
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 10: KASABIHAN EXAMPLE 2 ===== --}}
    <div x-show="page === 10" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex flex-col items-center justify-center gap-6 p-8">
            <div class="bg-gray-800/50 p-10 rounded-lg border-2 border-[#F4C300] text-center">
                <p class="text-2xl font-bold leading-relaxed">
                    Kumain tayo ng prutas at gulay,<br>
                    Upang humaba ang ating buhay.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 11: SAWIKAIN INTRO ===== --}}
    <div x-show="page === 11" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold !text-[#F4C300]">SAWIKAIN</h1>
        </header>

        <div class="flex-1 flex items-center justify-center">
            <div class="grid grid-cols-3 gap-8 text-3xl font-bold">
                <p class="text-center">Pusong mamon</p>
                <p class="text-center">Malayo sa bituka</p>
                <p class="text-center">Butas ang bulsa</p>
                <p class="text-center">Anak-dalita</p>
                <p class="text-center">Nakahiga sa salapi</p>
                <p class="text-center">Ilaw ng tahanan</p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 12: SAWIKAIN - PUSONG MAMON ===== --}}
    <div x-show="page === 12" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center p-8">
            <div class="bg-gray-800/50 p-12 rounded-lg border-2 border-[#F4C300] text-center">
                <p class="text-3xl font-bold !text-[#F4C300] mb-10">Pusong mamon</p>
                <p class="text-2xl font-semibold">mamon = malambot</p>
                <div class="border-t-2 border-gray-600 pt-8 mt-8">
                    <p class="text-3xl font-bold">= malambot ang kalooban</p>
                    <p class="text-3xl font-bold mt-4">= mabait</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 13: SAWIKAIN MEANINGS 1 ===== --}}
    <div x-show="page === 13" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <div class="flex-1 flex flex-col justify-center gap-6 overflow-y-auto p-5">
            <div class="grid grid-cols-2 gap-8 text-2xl">
                <div class="bg-gray-800/50 p-6 rounded-lg border-2 border-[#F4C300]">
                    <p class="font-bold !text-[#F4C300] text-3xl mb-3">Anak-dalita</p>
                    <p class="text-3xl">= mahirap</p>
                </div>
                
                <div class="bg-gray-800/50 p-6 rounded-lg border-2 border-[#F4C300]">
                    <p class="font-bold !text-[#F4C300] text-3xl mb-3">Malayo sa bituka</p>
                    <p class="text-3xl">= hindi malubha ang sakit</p>
                </div>
                
                <div class="bg-gray-800/50 p-6 rounded-lg border-2 border-[#F4C300]">
                    <p class="font-bold !text-[#F4C300] text-3xl mb-3">Butas ang bulsa</p>
                    <p class="text-3xl">= walang pera</p>
                </div>
                
                <div class="bg-gray-800/50 p-6 rounded-lg border-2 border-[#F4C300]">
                    <p class="font-bold !text-[#F4C300] text-3xl mb-3">Ilaw ng tahanan</p>
                    <p class="text-3xl">= nanay / ina</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 14: SAWIKAIN PRACTICE ===== --}}
    <div x-show="page === 14" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center">
            <div class="bg-gray-800/50 p-12 rounded-lg border-2 border-[#F4C300] text-center">
                <p class="text-3xl font-bold !text-[#F4C300] mb-8">Nakahiga sa salapi</p>
                <p class="text-2xl font-semibold">= ?</p>
            </div>
        </div>
    </div>

    {{-- Navigation Buttons --}}
    @include('partials.lesson-navigation')

</div>