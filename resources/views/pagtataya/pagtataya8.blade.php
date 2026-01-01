<!-- Pagtataya 8: Story Reading + Comprehension (Fill-in) -->
<div class="relative flex flex-col items-center"
     x-data="{
        page: 0,
        userInput: '',
        confirmed: false,
        score: @entangle('score'),
        questions: @js($questions),
        story: @js($this->getStoryProperty()),

        get current() {
            return this.page > 0 && this.page <= this.questions.length
                ? this.questions[this.page - 1]
                : null
        },

        get isStoryPage() {
            return this.page === 0
        },

        next() {
            if (this.isStoryPage) {
                // Move from story to first question
                this.page++
                this.confirmed = false
            } else if (!this.confirmed) {
                // Confirm answer
                this.confirmed = true
                if (this.userInput.toLowerCase().trim() === this.current.answer.toLowerCase().trim()) {
                    this.score++
                }
            } else {
                // Move to next question
                this.page++
                this.reset()
            }
        },

        reset() {
            this.userInput = ''
            this.confirmed = false
        },

        replay() {
            this.page = 0
            this.score = 0
            this.reset()
        }
     }">

    <!-- Story Page -->
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

    <!-- Comprehension Questions -->
    <template x-if="current">
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
                    <i class="fa-solid fa-x"></i> Mali. Ang tamang sagot ay: <b x-text="current.answer"></b>
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

    <!-- Results Page -->
    @include('partials.pagtataya-results')

    <!-- Navigation Buttons (Modified for Story Page) -->
    <div x-show="page <= questions.length" class="absolute -bottom-[110px] flex items-center justify-between w-[450px]">
        <!-- Page Counter -->
        <p x-show="page > 0">
            <span x-text="page"></span>/<span x-text="questions.length"></span>
        </p>
        <p x-show="page === 0" class="text-sm opacity-70">Kwento</p>
        
        <div class="flex gap-3">
            <button x-show="page > 0" @click="page--; reset()" class="px-4 py-2 border border-gray-500 text-white rounded-md font-bold whitespace-nowrap">
                <i class="fa-solid fa-arrow-left"></i> Balik
            </button>
            <button 
                x-show="page === 0 || confirmed" 
                @click="next" 
                class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold whitespace-nowrap">
                Susunod <i class="fa-solid fa-arrow-right !text-black"></i>
            </button>
        </div>
    </div>

</div>