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
                        ],

                        2 => [
                            "Matukoy ang limang patinig sa Alpabetong Filipino",
                            "Mabigkas nang tama ang bawat patinig sa iba’t ibang tunog",
                            "Makagamit ng mga patinig sa mga simpleng tunog at pantig",
                        ],

                        3 => [
                            "Makilala ang mga katinig sa alpabeto",
                            "Mabigkas ang wastong tunog ng bawat katinig",
                            "Makaunawa sa pagkakaiba ng tunog-patinig at tunog-katinig",
                        ],

                        4 => [
                            "Makilala ang tunog ng M, S, at A",
                            "Mabigkas nang malinaw ang mga tunog na ito",
                            "Makapagsanib ng tunog upang mabuo ang mga pantig at simpleng salita",
                        ],

                        5 => [
                            "Makabuo ng mga simpleng parirala at pangungusap",
                            "Makagamit ng wastong bantas at tamang pagkakasunod-sunod ng salita",
                            "Makaunawa sa kahulugan ng mga ginawang parirala at pangungusap",
                        ],

                        6 => [
                            "Makilala ang mga letrang M, S, A, I, O, at B",
                            "Mabigkas ang tamang tunog ng bawat isa",
                            "Makabuo ng mga pantig gamit ang mga letrang ito",
                        ],

                        7 => [
                            "Makilala ang mga letrang E, U, T, K, L, Y, at N",
                            "Mabigkas nang wasto ang mga tunog ng mga ito",
                            "Makabuo ng mga simpleng salita gamit ang mga tunog na ito",
                        ],

                        8 => [
                            "Makaunawa sa kahulugan ng binabasang pangungusap",
                            "Matukoy ang pangunahing ideya ng pangungusap",
                            "Makapagbigay ng tamang sagot batay sa nabasang pangungusap",
                        ],

                        9 => [
                            "Makilala ang iba’t ibang uri ng pantig",
                            "Makabuo ng pantig mula sa pagsasanib ng patinig at katinig",
                            "Makabasa ng mga pantig nang malinaw at tama",
                        ],

                        10 => [
                            "Makabasa ng mga pangunahing salita",
                            "Makilala ang mga salitang madalas gamitin",
                            "Mabigkas nang tama ang mga salitang ito",
                        ],

                        11 => [
                            "Makilala at magamit ang bagong bokabularyo",
                            "Makabuo ng pangungusap gamit ang mga bagong salita",
                            "Makaunawa sa kahulugan ng salita batay sa konteksto",
                        ],

                        12 => [
                            "Makilala ang diptonggo sa salita",
                            "Mabigkas nang tama ang mga salitang may diptonggo",
                            "Makapagtukoy ng diptonggo sa pangungusap",
                        ],

                        13 => [
                            "Makilala ang kambal-katinig sa salita",
                            "Makabasa ng mga salitang may kambal-katinig",
                            "Makapagtukoy ng kambal-katinig sa pangungusap",
                        ],

                        14 => [
                            "Makilala ang iba’t ibang uri ng panlapi",
                            "Makabuo ng salita gamit ang mga panlapi",
                            "Makilala ang kahulugan ng salita batay sa panlaping ginamit",
                        ],

                        15 => [
                            "Makaunawa sa binasang karunungang-bayan",
                            "Matukoy ang aral at mensaheng taglay nito",
                            "Makapagbigay ng halimbawa ng karunungang-bayan",
                        ],

                        16 => [
                            "Makaunawa sa binasang tula",
                            "Matukoy ang tugma, sukat, at mensahe ng tula",
                            "Makapagbigay ng sariling pagpapakahulugan sa tula",
                        ],

                        17 => [
                            "Makaunawa sa binasang maikling kuwento",
                            "Matukoy ang tauhan, tagpuan, at banghay",
                            "Makabuo ng konklusyon batay sa pangyayari",
                        ],

                        18 => [
                            "Makaunawa sa binasang balita",
                            "Matukoy ang pangunahing impormasyon at detalye",
                            "Makapagpaliwanag ng kahalagahan ng balitang nabasa",
                        ],

                        19 => [
                            "Makaunawa sa binasang editoryal",
                            "Matukoy ang opinyon at paninindigan ng may-akda",
                            "Makapagbigay ng sariling pananaw kaugnay ng editoryal",
                        ],

                        20 => [
                            "Makaunawa sa binasang artikulong pang-agham at teknolohiya",
                            "Matukoy ang mga konsepto at impormasyon sa artikulo",
                            "Makapagbigay ng aplikasyon ng mga natutunang kaalaman mula sa artikulo",
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
