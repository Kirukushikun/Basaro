<!-- Pagtataya 8: Story Reading + Comprehension (Fill-in) -->
<div class="relative flex flex-col items-center lg:min-w-96 p-6"
     x-data="{
        page: 0,
        userInput: '',
        confirmed: false,
        score: @entangle('score'),
        totalScore: @entangle('totalScore'),
        completed: false,
        showModal: false,
        questions: @js($questions),
        story: @js($this->getStoryProperty()),
        soundEnabled: false,
        currentPanutoAudio: null,
        get isPanuto() {
            return this.page === 0;
        },
        get isStoryPage() {
            return this.page === 1;
        },
        get showSoundOverlay() {
            return !this.soundEnabled && this.isPanuto;
        },
        enableSound() {
            this.soundEnabled = true;
            if (this.isPanuto && this.questions[0] && this.questions[0].audio) {
                this.currentPanutoAudio = new Audio(this.questions[0].audio);
                this.currentPanutoAudio.play();
            }
        },
        get current() {
            // Page 0 = Panuto, Page 1 = Story, Page 2+ = Questions
            if (this.page >= 1) {
                return this.questions[this.page - 1];
            }
            return null;
        },
        get totalPages() {
            // Panuto (1) + Story (1) + Questions
            return 1 + this.questions.length;
        },
        next() {
            if (this.isPanuto) {
                // Move from panuto to story
                this.page++;
                this.stopPanutoAudio();
            } else if (this.isStoryPage) {
                // Move from story to first question
                this.page++;
                this.confirmed = false;
            } else if (!this.confirmed) {
                // Confirm answer
                this.confirmed = true;
                if (this.userInput.toLowerCase().trim() === this.current.answer.toLowerCase().trim()) {
                    this.score++;
                }
            } else {
                // Move to next question
                this.page++;
                this.reset();
            }
        },
        prev() {
            if (this.page > 0) {
                this.page--;
                this.reset();
            }
        },
        reset() {
            this.userInput = '';
            this.confirmed = false;
        },
        stopPanutoAudio() {
            if (this.currentPanutoAudio) {
                this.currentPanutoAudio.pause();
                this.currentPanutoAudio.currentTime = 0;
                this.currentPanutoAudio = null;
            }
        },
        replay() {
            this.page = 0;
            this.score = 0;
            this.soundEnabled = false;
            this.reset();
            this.stopPanutoAudio();
        }
     }">
    
    <!-- SOUND OVERLAY -->
    <template x-if="showSoundOverlay">
        <div class="absolute inset-0 bg-black/60 flex items-center justify-center z-50 rounded-lg">
            <button 
                @click="enableSound()" 
                class="px-6 py-3 bg-[#F4C300] !text-black font-bold rounded-lg text-lg shadow-lg hover:bg-yellow-500 transition-all">
                <i class="fa-solid fa-volume-high !text-black"></i> I-enable ang Tunog
            </button>
        </div>
    </template>
    
    <!-- PANUTO PAGE (Page 0) -->
    <template x-if="isPanuto">
        <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-5 w-full px-4">
            <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                <h2 class="text-center font-bold text-2xl !text-[#F4C300] mb-2">
                    PANUTO
                </h2>
                <template x-if="questions[0] && questions[0].header">
                    <p class="text-white mb-4"><strong x-text="questions[0].header"></strong></p>
                </template>
                <template x-if="questions[0] && questions[0].body">
                    <p class="!text-gray-300 mb-4" x-text="questions[0].body"></p>
                </template>
            </div>
            <button @click="next" class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold whitespace-nowrap mb-5">
                Naiintindihan ko ang panuto
            </button>
        </div>
    </template>
    
    <!-- STORY PAGE (Page 1) -->
    <template x-if="isStoryPage">
        <div class="flex-1 flex flex-col items-center justify-center gap-10 w-full px-4">
            <h2 class="text-4xl font-bold !text-[#F4C300]">Basahin ang Kwento</h2>
            <div class="max-w-3xl bg-gray-800 p-10 rounded-xl border-4 border-[#F4C300] shadow-2xl">
                <p class="text-xl leading-relaxed text-white" x-text="story"></p>
            </div>
            <p class="text-lg text-center max-w-xl opacity-80">
                Basahin nang mabuti ang kwento. Pagkatapos, sasagutin mo ang mga tanong tungkol dito.
            </p>
        </div>
    </template>
    
    <!-- COMPREHENSION QUESTIONS (Page 2+) -->
    <template x-if="current && !isPanuto && !isStoryPage">
        <div class="flex-1 flex flex-col items-center gap-10 mt-10 w-full px-4">
            <!-- Question -->
            <div class="max-w-2xl">
                <h2 class="text-4xl font-bold !text-[#F4C300] mb-6 text-center"
                    x-text="current.tanong"></h2>
            </div>
                
            <!-- Success/Error Feedback -->
            <div x-show="confirmed"
                x-transition
                class="px-6 py-3 rounded-lg text-lg font-semibold"
                :class="userInput.toLowerCase().trim() === current.answer.toLowerCase().trim() ? 'bg-green-500 text-white' : 'bg-red-500 text-white'">
                <span x-show="userInput.toLowerCase().trim() === current.answer.toLowerCase().trim()">
                    <i class="fa-solid fa-check"></i> Tama!
                </span>
                <span x-show="userInput.toLowerCase().trim() !== current.answer.toLowerCase().trim()">
                    <i class="fa-solid fa-x"></i> Mali.
                </span>
            </div>
            
            <!-- Instruction -->
            <p class="w-96 text-lg text-center">
                Sagutin ang tanong sa pamamagitan ng pagsulat ng iyong sagot sa ibaba.
            </p>
            
            <!-- Input Field -->
            <div class="w-full max-w-xl">
                <input 
                    type="text"
                    x-model="userInput"
                    :disabled="confirmed"
                    placeholder="Isulat ang iyong sagot dito..."
                    class="w-full px-6 py-4 border-2 border-[#F4C300] rounded-lg text-xl focus:outline-none focus:ring-3 focus:ring-yellow-300 disabled:border-gray-600"
                    @keyup.enter="!confirmed && userInput.trim() && next()">
            </div>
            
            <!-- Confirm Button -->
            <button x-show="userInput.trim() && !confirmed"
                    @click="next"
                    class="px-8 py-3 bg-[#F4C300] text-black font-bold rounded-lg hover:opacity-90 transition-all text-lg">
                Kumpirmahin
            </button>
        </div>
    </template>
    
    <!-- RESULTS PAGE -->
    @include('partials.pagtataya-results')
    
    <!-- NAVIGATION BUTTONS -->
    <div x-show="page < totalPages" class="absolute -bottom-[110px] flex items-center justify-between w-[450px]">
        <!-- Page Counter -->
        <p>
            <template x-if="isStoryPage">
                <span class="text-sm opacity-70">Kwento</span>
            </template>
            <template x-if="!isPanuto && !isStoryPage">
                <span>
                    Tanong <span x-text="page - 1"></span>/<span x-text="questions.length"></span>
                </span>
            </template>
        </p>
        
        <template x-if="!isPanuto">
            <div class="flex gap-3">
                <button x-show="page > 0" @click="prev()" class="px-4 py-2 border border-gray-500 text-white rounded-md font-bold whitespace-nowrap">
                    <i class="fa-solid fa-arrow-left"></i> Balik
                </button>
                <button 
                    x-show="isPanuto || isStoryPage || confirmed" 
                    @click="next()" 
                    class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold whitespace-nowrap">
                    Susunod <i class="fa-solid fa-arrow-right !text-black"></i>
                </button>
            </div>
        </template>

    </div>
</div>