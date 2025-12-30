{{-- ===== LESSON 11: PAGPAPALAWAK NG TALASALITAAN ===== --}}

<div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg">
    {{-- ===== PAGE 1 ===== --}}
    <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold">
                <span class="!text-[#F4C300]">Sesyon 11:</span>
                Pagpapalawak ng Talasalitaan o Bokabularyo sa Filipino
            </h1>
        </header>

        <div class="flex-1 grid grid-cols-2 gap-x-16 gap-y-6 text-2xl overflow-y-auto p-5">
            @foreach ([
                ['Tribo', 'pangkat'],
                ['Nauntol', 'natigil'],
                ['kaakit-akit', 'maganda'],
                ['Tahimik', 'payapa'],
                ['Pagod', 'pata'],
                ['Sumunod', 'tumalima'],
                ['Galak', 'tuwa'],
                ['Lungkot', 'panglaw'],
                ['Katoto', 'kaibigan'],
                ['Batid', 'alam'],
                ['Bata', 'tiis'],
                ['Mahirap', 'dukha']
            ] as $pair)
                <div class="flex items-center gap-4">
                    <span class="font-bold">{{ $pair[0] }}</span>
                    <span class="!text-[#F4C300]">—</span>
                    <span>{{ $pair[1] }}</span>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 2 ===== --}}
    <div x-show="page === 2" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h1 class="text-3xl font-bold !text-[#F4C300]">
                Magkakasingkahulugang Salita
            </h1>
        </header>

        <div class="flex-1 grid grid-cols-2 gap-x-16 gap-y-6 text-2xl overflow-y-auto p-5">
            @foreach ([
                ['salungat', 'taliwas'],
                ['ganid', 'sakim'],
                ['pukaw', 'gising'],
                ['yumao', 'umalis'],
                ['bulaan', 'sinungaling'],
                ['suwail', 'taksil'],
                ['sagana', 'marami'],
                ['nag-aalaga', 'kumakalinga'],
                ['gusto', 'ibig'],
                ['umiral', 'nangibabaw'],
                ['kandili', 'alaga'],
                ['tanggi', 'kaila']
            ] as $pair)
                <div class="flex items-center gap-4">
                    <span class="font-bold">{{ $pair[0] }}</span>
                    <span class="!text-[#F4C300]">—</span>
                    <span>{{ $pair[1] }}</span>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ===== PAGE 3 ===== --}}
    <div x-show="page === 3" class="w-full flex-1 flex flex-col gap-6 px-2 min-h-0">
        <header class="header flex-shrink-0">
            <h1 class="text-3xl font-bold !text-[#F4C300]">
                Magkakasalungat na Salita
            </h1>
        </header>

        <div class="flex-1 grid grid-cols-2 gap-x-16 gap-y-6 text-2xl overflow-y-auto p-5">
            @foreach ([
                ['Mabuti', 'masama'],
                ['Kaibigan', 'kaaway'],
                ['Kaibig-ibig', 'kasuklam-suklam'],
                ['Masunurin', 'suwail'],
                ['Malamig', 'mainit'],
                ['Mabilis', 'mabagal'],
                ['sobra', 'kulang'],
                ['mahal', 'mura'],
                ['ayaw', 'gusto'],
                ['tapat', 'taksil'],
                ['sarado', 'bukas'],
                ['mapait', 'matamis']
            ] as $pair)
                <div class="flex items-center gap-4">
                    <span class="font-bold">{{ $pair[0] }}</span>
                    <span class="!text-[#F4C300]">—</span>
                    <span>{{ $pair[1] }}</span>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Navigation Buttons --}}
    @include('partials.lesson-navigation')
</div>