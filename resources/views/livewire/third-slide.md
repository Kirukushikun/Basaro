```html

<!-- Main Content -->
<main class="flex-1 pb-[50px]"
    x-data="{
        page: 1,
        selected: null,
        confirmed: false,
        showFeedback: false,
        score: 0,
        questions: @js($this->lessonQuestions),
        get current() {
            return this.questions[this.page - 1]
        },
        confirm() {
            this.confirmed = true
        },
        next() {
            if (!this.showFeedback) {
                this.showFeedback = true
                if (this.selected === this.current.answer) this.score++
            } else {
                this.page++
                this.reset()
            }
        },
        reset() {
            this.selected = null
            this.confirmed = false
            this.showFeedback = false
        }
    }">
    <div class="card flex flex-col items-center gap-6 relative text-lg">
        <!-- Title -->
        <h1 class="bg-[#F4C300] px-20 py-1 text-black text-xl font-bold rounded-md">
            PAGSASANAY
        </h1>
        
        <!-- Question -->
        <template x-if="current">
            <div class="flex flex-col items-center gap-6 mt-6 w-full">
                <!-- Audio Icon -->
                <i x-show="current.type === 'mc_audio'"
                    class="fa-solid fa-ear-listen text-[#F4C300] text-6xl"></i>
                
                <!-- Choices -->
                <div class="grid grid-cols-5 gap-4">
                    <template x-for="choice in current.choices" :key="choice">
                        <button
                            @click="selected = choice; showFeedback = false"
                            :class="selected === choice
                                ? 'bg-[#F4C300] text-black'
                                : 'text-[#F4C300] border-[#F4C300]'"
                            class="px-4 py-2 text-xl font-extrabold border-2 rounded-lg transition">
                            <span x-text="choice"></span>
                        </button>
                    </template>
                </div>
                
                <!-- Prompt -->
                <p class="w-96 text-lg text-center" x-text="current.prompt"></p>
                
                <!-- Confirm -->
                <button x-show="selected && !confirmed"
                    @click="confirm"
                    class="px-6 py-2 bg-[#F4C300] text-black font-bold rounded-lg">
                    Kumpirmahin
                </button>
                
                <!-- Feedback -->
                <div x-show="showFeedback"
                    class="px-4 py-2 rounded-lg text-white font-semibold"
                    :class="selected === current.answer ? 'bg-green-500' : 'bg-red-500'">
                    <span x-show="selected === current.answer">✅ Tama!</span>
                    <span x-show="selected !== current.answer">
                        ❌ Mali. Ang tamang sagot ay <b x-text="current.answer"></b>
                    </span>
                </div>
            </div>
        </template>
        
        <div class="absolute -bottom-[70px] flex justify-between w-full">
            <p><span x-text="page"></span>/<span x-text="questions.length"></span></p>
            <div class="flex gap-4">
                <button x-show="page > 1"
                    @click="page--; reset()"
                    class="px-4 py-2 border border-gray-500 rounded-md font-bold">
                    Balik
                </button>
                <button x-show="confirmed"
                    @click="next"
                    class="px-4 py-2 bg-[#F4C300] text-black rounded-md font-bold">
                    Susunod
                </button>
            </div>
        </div>
        
        <div x-show="page > questions.length" class="flex flex-col items-center gap-4">
            <h1 class="text-2xl font-bold">CONGRATULATIONS!</h1>
            <h2 class="text-4xl text-[#F4C300]"
                x-text="Math.round((score / questions.length) * 100) + '%'">
            </h2>
            <p class="text-center">
                Nakakuha ka ng <b x-text="score"></b> sa
                <b x-text="questions.length"></b> na tanong.
            </p>
        </div>
    </div>
</main>
```