<main class="flex-1 overflow-hidden mb-10" x-data="{ showModal: false, modalTemplate: '' }">
    <div class="lessons flex flex-col gap-7 overflow-y-auto h-full !pr-5 lg:pr-0">
        <div class="card flex flex-col gap-6">
            <div class="header">
                <p class="text-lg !text-gray-400">Current Lesson:</p>
                <h1 class="text-2xl font-bold">Lesson {{$lesson->order}}: {{$lesson->title}}</h1>
                @php
                    // Color progression based on level
                    $levelColors = [
                        1 => 'border-green-500 bg-green-900 text-green-100',
                        2 => 'border-emerald-500 bg-emerald-900 text-emerald-100',
                        3 => 'border-teal-500 bg-teal-900 text-teal-100',
                        4 => 'border-cyan-500 bg-cyan-900 text-cyan-100',
                        5 => 'border-sky-500 bg-sky-900 text-sky-100',
                        6 => 'border-blue-500 bg-blue-900 text-blue-100',
                        7 => 'border-indigo-500 bg-indigo-900 text-indigo-100',
                        8 => 'border-violet-500 bg-violet-900 text-violet-100',
                        9 => 'border-purple-500 bg-purple-900 text-purple-100',
                        10 => 'border-fuchsia-500 bg-fuchsia-900 text-fuchsia-100',
                        11 => 'border-pink-500 bg-pink-900 text-pink-100',
                        12 => 'border-rose-500 bg-rose-900 text-rose-100',
                        13 => 'border-red-500 bg-red-900 text-red-100',
                        14 => 'border-orange-500 bg-orange-900 text-orange-100',
                        15 => 'border-amber-500 bg-amber-900 text-amber-100',
                    ];
                    
                    // Difficulty labels based on level ranges
                    $difficulty = match(true) {
                        $lesson->order <= 4 => 'Beginner',
                        $lesson->order <= 7 => 'Intermediate',
                        $lesson->order <= 10 => 'Advanced',
                        $lesson->order <= 13 => 'Expert',
                        default => 'Master'
                    };
                    
                    $colorClass = $levelColors[$lesson->order] ?? 'border-yellow-500 bg-yellow-900 text-yellow-100';
                @endphp

                <h2 class="text-sm w-fit mt-2 px-2 py-1 border-2 rounded-md {{ $colorClass }}">
                    Level {{$lesson->order}} - {{$difficulty}}
                </h2>
            </div>

            <div class="description">
                {{$lesson->description}}
            </div>

            <div class="footer flex flex-col gap-4">
                <div class="flex justify-between">
                    <p class="!text-gray-400">Your progress:</p>
                    <p class="!text-gray-400">{{Auth::user()->current_progress}}%</p>
                </div>

                <div class="bg-gray-600 h-2 rounded-md">
                    <div class="bg-[#F4C300] h-full rounded-md" style="width: {{Auth::user()->current_progress}}%"></div>
                </div>

                @php
                    $user = Auth::user();
                    $isCurrentLesson = $user->current_lesson == $lesson->order;
                    $progress = $user->current_progress;
                @endphp

                @if ($isCurrentLesson && $progress == 25)
                    <button class="w-fit !text-black px-4 py-2 bg-[#F4C300] text-gray-900 rounded-md font-bold" onclick="window.location.href='/lesson-view?lesson={{$lesson->order}}&slide=second-slide'">
                        Magpatuloy sa Talakayan
                    </button>
                @elseif ($isCurrentLesson && $progress == 50)
                    <button class="w-fit !text-black px-4 py-2 bg-[#F4C300] text-gray-900 rounded-md font-bold" onclick="window.location.href='/lesson-view?lesson={{$lesson->order}}&slide=third-slide'">
                        Magpatuloy sa Pagsasanay
                    </button>
                @elseif ($isCurrentLesson && $progress == 75)
                    <button class="w-fit !text-black px-4 py-2 bg-[#F4C300] text-gray-900 rounded-md font-bold" onclick="window.location.href='/lesson-view?lesson={{$lesson->order}}&slide=fourth-slide'">
                        Magpatuloy sa Pagtataya
                    </button>
                @elseif ($isCurrentLesson && $progress == 100)
                    {{-- Current lesson is completed, move to next --}}
                    @if ($lesson->order < 20)
                        <button class="w-fit !text-black px-4 py-2 bg-green-500 text-white rounded-md font-bold" onclick="window.location.href='/lesson-view?lesson={{$lesson->order + 1}}&slide=first-slide'">
                            <i class="fa-solid !text-black fa-check"></i> Susunod na Aralin
                        </button>
                    @else
                        <span class="w-fit px-4 py-2 bg-green-500 text-white rounded-md font-bold">
                            <i class="fa-solid !text-black fa-champagne-glasses"></i> Natapos na ang lahat ng Aralin!
                        </span>
                    @endif
                @elseif ($user->current_lesson > $lesson->order)
                    {{-- This lesson was already completed (user is on a later lesson) --}}
                    <button class="w-fit !text-black px-4 py-2 bg-blue-500 text-white rounded-md font-bold" onclick="window.location.href='/lesson-view?lesson={{$lesson->order}}&slide=first-slide'">
                        <i class="fa-solid !text-black fa-repeat"></i> Balikan ang Aralin
                    </button>
                @elseif ($user->current_lesson < $lesson->order)
                    {{-- This lesson is locked (user hasn't reached it yet) --}}
                    <button class="w-fit px-4 py-2 bg-gray-400 text-gray-700 rounded-md font-bold cursor-not-allowed" disabled>
                        <i class="fa-solid !text-black fa-lock"></i> Nakalock pa
                    </button>
                @else
                    {{-- Start fresh lesson (progress == 0 or just starting) --}}
                    <button class="w-fit !text-black px-4 py-2 bg-[#F4C300] text-gray-900 rounded-md font-bold" onclick="window.location.href='/lesson-view?lesson={{$lesson->order}}&slide=first-slide'">
                        Magsimula
                    </button>
                @endif
            </div>
        </div>
        <div class="flex-1 grid grid-cols-1 lg:grid-cols-3 gap-7">
            <div class="card">
            @php 
                $lessonGoals = [
                    1 => [
                        "Makilala ang bawat letra sa Alpabetong Filipino",
                        "Mabigkas ang wastong tunog ng mga letra",
                        "Makasunod sa mga simpleng tagubilin patungkol sa pagbasa at pagbigkas",
                        "Mabigyang-halaga ang patuloy na pagsasanay bilang bahagi ng pagkatuto sa pagbasa",
                    ],

                    2 => [
                        "Makilala ang limang patinig ng Filipino",
                        "Mabigkas nang malinaw ang tunog ng bawat patinig",
                        "Maipakita ang pag-unawa sa pagkakaiba ng mga tunog-patinig",
                        "Mailapat ang kaalaman sa patinig sa mga simpleng gawain sa pagbasa",
                    ],

                    3 => [
                        "Makilala ang mga pantulong na kataga",
                        "Mabasa ang mga pantulong na kataga",
                        "Maunawaan ang kahulugan ng mga pantulong na kataga",
                    ],

                    4 => [
                        "Makabuo ng mga pantig gamit ang tunog ng M, S, at A",
                        "Mabigkas nang tama ang mga tunog na M, S, at A",
                        "Makabasa ng mga pantig at salita gamit ang M, S, at A",
                    ],

                    5 => [
                        "Malaman ang parirala at pangungusap",
                        "Mabasa ang mga parirala at pangungusap",
                    ],

                    6 => [
                        "Makilala ang mga letrang M, S, A, I, O at B",
                        "Mabigkas ang tamang tunog ng bawat letra",
                        "Mabasa ang mga salitang mabuo mula sa M, S, A, I, O at B",
                    ],

                    7 => [
                        "Makilala ang mga letrang E, U, T, K, L, Y at N",
                        "Mabigkas ang wastong tunog ng bawat isa",
                        "Mabasa ang mga salitang nabuo mula sa mga tunog ng E, U, T, K, L, Y at N",
                    ],

                    8 => [
                        "Malaman ang kahulugan ng talata",
                        "Mabasa ang talata",
                        "Maipakita ang pag-unawa sa pamamagitan ng pagsagot sa mga tanong",
                    ],

                    9 => [
                        "Makilala ang mga pantig sa isang salita",
                        "Maihati ang salita ayon sa tamang pagpapantig",
                        "Mabigkas ang mga pantig nang malinaw at wasto",
                        "Magamit ang kaalaman sa pantig sa pagbasa ng mga salita",
                    ],

                    10 => [
                        "Makilala ang mga pangunahing salitang karaniwang ginagamit",
                        "Mabigkas nang tama ang mga salitang ito",
                    ],

                    11 => [
                        "Matukoy ang kasing kahulugan at kasalungat ng mga salita",
                        "Mabasa ang mga magkakasing kahulugan at magkakasalungat na salita",
                    ],

                    12 => [
                        "Makilala ang mga diptonggo sa salita",
                        "Mabigkas nang tama ang mga salitang may diptonggo",
                        "Mabasa ang mga salita na may diptonggo",
                    ],

                    13 => [
                        "Makilala ang mga kambal katinig sa mga salita",
                        "Mabigkas ang mga salitang may kambal katinig nang wasto",
                        "Matukoy ang kambal katinig sa binasang salita",
                    ],

                    14 => [
                        "Makilala ang iba't ibang uri ng panlapi",
                        "Mabasa ang mga salitang may panlapi",
                    ],

                    15 => [
                        "Maunawaan ang binasang karunungang-bayan",
                        "Maipakita ang pagpapahalaga sa kulturang Pilipino",
                    ],

                    16 => [
                        "Nakakabasa ng mga tula.",
                        "Nauunawaan ang mga binasang tula.",
                    ],

                    17 => [
                        "Makabasa ng mga maikling kwento",
                        "Maunawaan ang mga binasang maikling kuwento",
                    ],

                    18 => [
                        "Makabasa ng mga balita",
                        "Maunawaan ang mga binasang balita",
                        "Mahimay ang mahahalagang detalye sa mga binasang balita",
                    ],

                    19 => [
                        "Matukoy ang kahulugan ng editoryal",
                        "Makabasa ng artikulong editoryal",
                        "Maunawaan ang mga binasang artikulo",
                    ],

                    20 => [
                        "Matukoy ang kahulugan ng artikulong pang-agham at teknolohiya",
                        "Makabasa nang may pang-unawa sa mga artikulong pang-agham at teknolohiya",
                        "Mahimay ang mga mahahalagang detalye sa mga binasang artikulo",
                    ],
                ];
            @endphp

                <h1 class="text-xl font-bold mb-5"><i class="fa-solid fa-bullseye"></i> Today's Target</h1>
                
                <div class="flex flex-col gap-2">
                    @foreach ($lessonGoals[$lesson->order] as $goal)
                        <div class="relative pl-7">
                            <i class="absolute left-0 top-[4px] fa-solid fa-circle-check !text-gray-400"></i>
                            <p>{{$goal}}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="card">
                <h1 class="flex items-center justify-between text-xl font-bold mb-5">
                    <span>
                        <i class="fa-solid fa-note-sticky"></i> Notes
                    </span>
                    <i 
                        class="fa-solid fa-plus cursor-pointer !text-[#F4C300] hover:scale-125"
                        @click="showModal = true; modalTemplate = 'create-note'"
                    ></i>
                </h1>
                <div class="flex flex-col gap-2">
                    @forelse($notes as $note)
                        <div class="flex items-center justify-between">
                            <p>{{ $note->title }}</p>
                            <div class="flex gap-2 items-center">
                                <i 
                                    class="fa-solid fa-eye cursor-pointer !text-gray-400 hover:scale-125"
                                    @click="showModal = true; modalTemplate = 'view-note'; $wire.set('selectedNoteId', {{ $note->id }})"
                                ></i>
                                <i 
                                    class="fa-solid fa-trash-can cursor-pointer !text-red-400 hover:scale-125"
                                    @click="showModal = true; modalTemplate = 'delete-note'; $wire.set('selectedNoteId', {{ $note->id }})"
                                ></i>
                            </div>
                        </div>
                    @empty
                        <p class="!text-gray-400 text-md">No notes yet. Click + to create one.</p>
                    @endforelse
                </div>
            </div>

            <div class="card flex flex-col">
                <h1 class="text-xl font-bold mb-5"><i class="fa-solid fa-quote-left"></i> Teacher's Message</h1>
                <div class="flex-1 flex flex-col justify-between">
                    <p>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio vitae aperiam perspiciatis consequuntur laudantium aliquid eos unde voluptate atque consectetur."</p>

                    <div class="flex justify-between">
                        <p class="font-bold">- Gng. Beng</p>
                        <p class="!text-gray-400 ">3 Days ago</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL -->

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

            <!-- Create Note Modal -->
            <div class="flex flex-col gap-5" x-show="modalTemplate === 'create-note'">
                <h2 class="text-xl font-semibold -mb-2">Create Note</h2>

                <div>
                    <label class="block mb-1 font-medium">Title</label>
                    <input 
                        type="text" 
                        class="border rounded-lg w-full p-2" 
                        wire:model="noteTitle"
                        placeholder="Enter note title"
                    />
                    @error('noteTitle') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block mb-1 font-medium">Content</label>
                    <textarea 
                        class="border rounded-lg w-full p-2 min-h-[120px]" 
                        wire:model="noteContent"
                        placeholder="Enter note content"
                    ></textarea>
                    @error('noteContent') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end gap-3">
                    <button @click="showModal = false" class="px-4 py-2 border rounded-lg hover:bg-gray-100">Cancel</button>
                    <button 
                        wire:click="createNote" 
                        @click="showModal = false"
                        class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-800"
                    >
                        Create
                    </button>
                </div>
            </div>

            <!-- View Note Modal -->
            <div class="flex flex-col gap-5" x-show="modalTemplate === 'view-note'">
                <h2 class="text-xl font-semibold -mb-2">{{ $selectedNote->title ?? 'Note' }}</h2>
                
                <div class="prose max-w-none">
                    <p class="whitespace-pre-wrap">{{ $selectedNote->content ?? '' }}</p>
                </div>

                <div class="flex justify-end gap-3">
                    <button @click="showModal = false" class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-800">Close</button>
                </div>
            </div>

            <!-- Delete Note Confirmation -->
            <div class="flex flex-col gap-5" x-show="modalTemplate === 'delete-note'">
                <h2 class="text-xl font-semibold -mb-2">Delete Note</h2>
                <p>Are you sure you want to delete "{{ $selectedNote->title ?? 'this note' }}"? This action cannot be undone.</p>

                <div class="flex justify-end gap-3">
                    <button @click="showModal = false" class="px-4 py-2 border rounded-lg hover:bg-gray-100">Cancel</button>
                    <button 
                        wire:click="deleteNote" 
                        @click="showModal = false"
                        class="px-4 py-2 bg-red-700 text-white rounded-lg hover:bg-red-800"
                    >
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>
