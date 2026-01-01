<div class="relative flex flex-col items-center" x-data="{
    page: 1,
    selected: null,
    confirmed: false,
    showFeedback: false,
    score: @entangle('score'),
    questions: @js($questions),

    get current() {
        return this.questions[this.page - 1] || null
    },

    confirm() {
        this.confirmed = true
        this.showFeedback = true
        if (this.selected === this.current.answer) this.score++
    },

    next() {
        this.page++
        this.reset()
    },

    reset() {
        this.selected = null
        this.confirmed = false
        this.showFeedback = false
    },

    replay() {
        this.page = 1
        this.score = 0
        this.reset()
    }
}">
    
    <template x-if="current">
        <div class="flex-1 flex flex-col items-center gap-10 mt-10 w-full">

            <!-- Audio Icon -->
            <i class="fa-solid fa-ear-listen !text-[#F4C300] alphabet"></i>

            <!-- Letter Choices -->
            <div class="grid grid-cols-5 gap-4">
                <template x-for="choice in current.choices" :key="choice">
                    <button
                        @click="!confirmed && (selected = choice)"
                        :disabled="confirmed"
                        :class="{ 
                            'bg-[#F4C300] !text-black': selected === choice,
                            'opacity-50 cursor-not-allowed': confirmed && selected !== choice
                        }"
                        class="choice font-extrabold px-4 py-2 text-xl !text-[#F4C300] border-2 !border-[#F4C300] rounded-lg hover:bg-[#F4C300] hover:!text-black transition-all disabled:hover:bg-transparent disabled:hover:!text-[#F4C300]">
                        <span x-text="choice"></span>
                    </button>
                </template>
            </div>

            <div x-data="{ hover: false }" 
                @mouseenter="hover = true" 
                @mouseleave="hover = false"
                class="flex gap-2 items-center relative bg-gray-500 px-4 py-3 rounded-full cursor-pointer transition-transform hover:scale-110">
                <i class="fa-solid fa-volume-high"></i>
                
                <!-- Tooltip -->
                <div x-show="hover" x-transition class="absolute -top-10 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-sm px-3 py-1 rounded whitespace-nowrap">
                    Pakinggan ulit
                </div>
            </div>

            <!-- Prompt -->
            <p class="w-96 text-lg text-center" x-text="current.prompt"></p>

            <!-- Confirm Button -->
            <button x-show="selected && !confirmed"
                @click="confirm"
                class="px-6 py-2 bg-[#F4C300] text-black font-bold rounded-lg hover:bg-yellow-500 transition-colors">
                Kumpirmahin
            </button>

            <!-- Feedback -->
            <div x-show="showFeedback"
                class="mt-4 px-4 py-2 rounded-lg text-lg font-semibold"
                :class="selected === current.answer ? 'bg-green-500 text-white' : 'bg-red-500 text-white'">
                <span x-show="selected === current.answer"><i class="fa-solid fa-check"></i> Tama!</span>
                <span x-show="selected !== current.answer">
                    <i class="fa-solid fa-xmark"></i> Mali. Ang tamang sagot ay <b x-text="current.answer"></b>
                </span>
            </div>

        </div>
    </template>

    <!-- Results Page -->
    @include('partials.pagtataya-results')

    <!-- Navigation Buttons -->
    @include('partials.pagtataya-navigation')

</div>  