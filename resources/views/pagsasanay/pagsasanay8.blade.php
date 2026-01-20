<!-- Pagsasanay 8: Story Reading + Multiple Choice Questions -->
<div class="relative"
    x-data="{
    page: 1,
    selected: null,
    confirmed: false,
    score: 0,
    questions: @js($questions),
    story: @js($this->getStoryProperty()),
    soundEnabled: false,
    currentPanutoAudio: null,

    get isPanuto() {
        return this.current && this.current.type === 'panuto';
    },

    get showSoundOverlay() {
        // Only show if sound not enabled AND it's the first panuto
        return !this.soundEnabled && this.isPanuto;
    },

    enableSound() {
        this.soundEnabled = true;
        // Play the panuto audio if it exists
        if (this.current && this.current.audio) {
            this.currentPanutoAudio = new Audio(this.current.audio);
            this.currentPanutoAudio.play();
        }
    },

get current() {
    // Filter panuto and regular questions
    let panutoQuestions = this.questions.filter(q => q.type === 'panuto');
    let regularQuestions = this.questions.filter(q => q.type !== 'panuto');
    
    // Page 1: First panuto
    if (this.page === 1 && panutoQuestions.length > 0) {
        return panutoQuestions[0];
    }
    
    // Page 2: Story (isStoryPage will handle this)
    // Page 3: Second panuto (if exists)
    if (this.page === 3 && panutoQuestions.length > 1) {
        return panutoQuestions[1];
    }
    
    // Page 4+: Regular questions
    let questionIndex = this.page - 4; // Pages 4, 5, 6, 7... for questions
    return questionIndex >= 0 && questionIndex < regularQuestions.length
        ? regularQuestions[questionIndex]
        : null;
},

get isStoryPage() {
    return this.page === 2; // Story is always page 2
},

next() {
    if (this.isPanuto) {
        // Move past panuto page
        this.page++
        this.reset()
        
        // Stop panuto audio if playing
        if (this.currentPanutoAudio) {
            this.currentPanutoAudio.pause();
            this.currentPanutoAudio.currentTime = 0;
            this.currentPanutoAudio = null;
        }

        // Auto-play next panuto audio if applicable
        this.$nextTick(() => {
            if (this.soundEnabled && this.isPanuto && this.current && this.current.audio) {
                this.currentPanutoAudio = new Audio(this.current.audio);
                this.currentPanutoAudio.play();
            }
        });
    } else if (this.isStoryPage) {
        // Move from story to second panuto (or first question if no second panuto)
        this.page++
        this.confirmed = false
        
        // ✅ ADD THIS: Auto-play second panuto audio
        this.$nextTick(() => {
            if (this.soundEnabled && this.isPanuto && this.current && this.current.audio) {
                this.currentPanutoAudio = new Audio(this.current.audio);
                this.currentPanutoAudio.play();
            }
        });
    } else if (!this.confirmed) {
        // Confirm answer
        this.confirmed = true
        if (this.selected === this.current.answer) {
            this.score++
        }
    } else {
        // Move to next question
        this.page++
        this.reset()
    }
},

    reset() {
        this.selected = null
        this.confirmed = false
    },

replay() {
    this.page = 1 // Reset to first panuto
    this.score = 0
    this.soundEnabled = false
    this.reset()
}
    }"
>
    <!-- SOUND OVERLAY -->
    <template x-if="showSoundOverlay">
        <div class="absolute inset-0 bg-black/60 flex items-center justify-center z-50 rounded-lg ">
            <button 
                @click="enableSound()" 
                class="px-6 py-3 bg-[#F4C300] !text-black font-bold rounded-lg text-lg shadow-lg hover:bg-yellow-500 transition-all"
            >
                <i class="fa-solid fa-volume-high !text-black"></i> I-enable ang Tunog
            </button>
        </div>
    </template>

    
    <!-- PANUTO TYPE -->
    <template x-if="isPanuto">
        <div class="flex-1 flex flex-col items-center justify-center gap-6 mt-5 w-full px-4">
            <div class="bg-gray-800 p-6 rounded-lg border-2 border-[#F4C300] max-w-2xl">
                <h2 class="text-center font-bold text-2xl !text-[#F4C300] mb-2">
                    PANUTO
                </h2>
                <p class="text-white mb-4"><strong x-text="current.header"></strong></p>
                <p class="!text-gray-300 mb-4" x-text="current.body"></p>
            </div>

            <button @click="next" class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold whitespace-nowrap mb-5">
                Naiintindihan ko ang panuto
            </button>
        </div>
    </template> 

    <!-- Story Page -->
    <template x-if="isStoryPage">
        <div class="flex-1 flex flex-col items-center justify-center gap-10 w-full px-4">
            
            <h2 class="!text-2xl sm:!text-3xl md:!text-4xl lg:!text-4xl font-bold !text-[#F4C300]">Basahin ang Kwento</h2>

            <div class="max-w-3xl bg-gray-800 p-10 rounded-xl border-4 border-[#F4C300] shadow-2xl">
                <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl leading-relaxed text-white" x-text="story"></p>
            </div>

            <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl text-center max-w-xl opacity-80">
                Basahin nang mabuti ang kwento. Pagkatapos, sasagutin mo ang mga tanong tungkol dito.
            </p>

        </div>
    </template>


    <!-- Question Pages -->
    <template x-if="current && !isPanuto">
        <div class="flex-1 flex flex-col items-center gap-8 mt-10 w-full px-4">

            <!-- Question -->
            <div class="max-w-2xl">
                <h3 class="!text-lg sm:!text-2xl md:!text-2xl lg:!text-3xl font-bold !text-[#F4C300] text-center mb-2" 
                    x-text="current.question"></h3>
            </div>

            <!-- Answer Choices -->
            <div class="flex flex-col gap-4 items-center max-w-xl w-full">
                <template x-for="choice in current.choices" :key="choice">
                    <button
                        @click="!confirmed && (selected = choice)"
                        :disabled="confirmed"
                        :class="{
                            'bg-[#F4C300] !text-black border-[#F4C300]': selected === choice && !confirmed,
                            'bg-green-500 !text-white border-green-500': confirmed && choice === current.answer,
                            'bg-red-500 !text-white border-red-500': confirmed && selected === choice && choice !== current.answer,
                            'opacity-50': confirmed && choice !== current.answer && choice !== selected
                        }"
                        class="w-full px-6 py-4 border-2 border-[#F4C300] !text-[#F4C300] font-bold rounded-lg hover:bg-[#F4C300] hover:!text-black transition-all text-center disabled:cursor-not-allowed !text-base sm:!text-lg md:!text-lg lg:!text-xl">
                        <span x-text="choice"></span>
                    </button>
                </template>
            </div>

            <!-- Feedback -->
            <div x-show="confirmed"
                 x-transition
                 class="mt-4 px-6 py-3 rounded-lg !text-base sm:!text-lg md:!text-lg lg:!text-xl font-semibold"
                 :class="selected === current.answer ? 'bg-green-500 text-white' : 'bg-red-500 text-white'">
                <span x-show="selected === current.answer">
                    <i class="fa-solid fa-check"></i> Tama! Magaling!
                </span>
                <span x-show="selected !== current.answer">
                    <i class="fa-solid fa-x"></i> Mali. Ang tamang sagot ay <b x-text="current.answer"></b>
                </span>
            </div>

        </div>
    </template>

    <div 
        class="flex-1 flex flex-col items-center gap-5"
        x-data="{ 
            showModal: false,
            get regularQuestions() {
                return questions.filter(q => q.type !== 'panuto');
            }
        }"
        x-show="page > (3 + regularQuestions.length)"  
        x-effect="if (page > (3 + regularQuestions.length)) { $wire.completePagsasanay() }"
    >
        <img src="{{asset('img/Badge.png')}}" width="200" alt="">
        <h1 class="text-2xl font-bold">CONGRATULATIONS!</h1>
        <h2 class="score !text-[#F4C300]" x-text="Math.round((score / 4) * 100) + '%'"></h2>
        <p class="w-96 text-lg text-center">
            Nakakuha ka ng <span class="font-bold" x-text="score"></span>
            sa <span class="font-bold" x-text="4"></span> na tanong!
        </p>
        <p class="w-96 text-lg text-center">Mahusay! Natapos mo ang araling ito nang may buong sigasig at pagsisikap. Ipagpatuloy lamang ang iyong pagkatuto!</p>
        <div class="flex gap-4 mt-4">
            <button
                @click="replay"
                class="px-4 py-2 border-2 border-[#F4C300] text-[#F4C300] rounded-md font-bold hover:bg-[#F4C300] hover:text-black transition">
                Ulitin
            </button>

            <!-- Exit -->
            <button
                onclick="window.location.href='/'"
                class="px-4 py-2 bg-gray-600 text-white rounded-md font-bold hover:bg-gray-700 transition">
                Lumabas
            </button>

            <!-- Primary -->
            <button
                @click="showModal = true"
                class="px-4 py-2 bg-[#F4C300] !text-black rounded-md font-bold hover:opacity-90 transition">
                Magpatuloy sa Pagtataya
            </button>
        </div>

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

                <div class="flex flex-col gap-5">
                    <h2 class="text-xl font-semibold -mb-2">Pagtataya</h2>

                    <p>
                        Handa ka na bang magsimula sa Pagtataya?
                    </p>

                    <div class="flex justify-end gap-3">
                        <button 
                            @click="showModal = false"
                            class="px-4 py-2 border rounded-lg hover:bg-gray-100"
                        >
                            Kanselahin
                        </button>

                        <button 
                            onclick="window.location.href='/lesson-view?lesson={{ $lesson }}&slide=fourth-slide-panuto'"
                            @click="showModal = false"
                            class="px-4 py-2 bg-[#F4C300] rounded-md !text-black font-bold"
                        >
                            Simulan
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>  

    <!-- Navigation Buttons (Modified for Story Page) -->
    <div x-show="!isPanuto && page <= (3 + questions.filter(q => q.type !== 'panuto').length)" 
        class="absolute -bottom-[110px] flex items-center justify-between w-full">
        
        <!-- Page Counter -->
        <p x-show="page === 1">Panuto 1</p>
        <p x-show="page === 2">Kwento</p>
        <p x-show="page === 3 && questions.filter(q => q.type === 'panuto').length > 1">Panuto 2</p>
        <p x-show="page > 3 && page <= (3 + questions.filter(q => q.type !== 'panuto').length)">
            <span x-text="page - 3"></span>/<span x-text="questions.filter(q => q.type !== 'panuto').length"></span>
        </p>
        
        <div class="flex gap-3">
            <button x-show="page > 1" @click="page--; reset()" 
                    class="px-4 py-2 border border-gray-500 text-white rounded-md font-bold whitespace-nowrap">
                <i class="fa-solid fa-arrow-left"></i> Balik
            </button>
            
            <button 
                x-show="isStoryPage || (selected && !confirmed) || confirmed" 
                @click="next" 
                :disabled="!isStoryPage && page > 3 && !selected && !confirmed"
                class="px-4 py-2 bg-[#F4C300] rounded-md font-bold whitespace-nowrap disabled:opacity-50 disabled:cursor-not-allowed">
                <span x-show="isStoryPage || confirmed" class="!text-black">Susunod</span>
                <span x-show="!isStoryPage && selected && !confirmed" class="!text-black">Kumpirmahin</span>
                <i class="fa-solid fa-arrow-right !text-black"></i>
            </button>
        </div>
    </div>

</div>