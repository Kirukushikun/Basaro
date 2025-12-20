<div class="relative"
     x-data="{
        page: 1,
        userInput: '',
        confirmed: false,
        showFeedback: false,
        recording: false,
        score: 0,
        questions: @js($questions),
        
        get current() {
            return this.page <= this.questions.length
                ? this.questions[this.page - 1]
                : null
        },
        
        next() {
            if (!this.showFeedback) {
                this.showFeedback = true
                // Score if answer is correct
                if (this.userInput.toLowerCase().trim() === this.current.answer.toLowerCase()) {
                    this.score++
                }
            } else {
                this.page++
                this.reset()
            }
        },
        
        confirm() {
            this.confirmed = true
        },
        
        reset() {
            this.userInput = ''
            this.confirmed = false
            this.showFeedback = false
            this.recording = false
        },
        
        replay() {
            this.page = 1
            this.score = 0
            this.reset()
        }
     }">

    <template x-if="current">
        <div class="flex-1 flex flex-col items-center gap-8 mt-10 w-full">

            <!-- Image -->
            <img :src="current.image" 
                 :alt="current.full_word" 
                 class="w-48 h-48 object-contain rounded-lg border-2 border-gray-300">

            <!-- Incomplete Word with Input -->
            <div class="text-center">
                <p class="text-lg mb-4">Punan ang salita:</p>
                <div class="flex items-center justify-center gap-2">
                    <template x-for="(part, index) in current.word.split('__')" :key="index">
                        <div class="flex items-center">
                            <span class="text-4xl font-bold" x-text="part"></span>
                            <template x-if="index < current.word.split('__').length - 1">
                                <input 
                                    type="text" 
                                    x-model="userInput"
                                    :disabled="showFeedback"
                                    @keyup.enter="next"
                                    class="w-20 h-14 text-3xl font-bold text-center border-2 border-gray-400 rounded-md mx-1 focus:outline-none focus:ring-2 focus:ring-[#F4C300]"
                                    :class="{'bg-gray-200': showFeedback}"
                                    maxlength="3"
                                >
                            </template>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Confirm Button (before feedback) -->
            <button x-show="!showFeedback && userInput.trim()" 
                    @click="next" 
                    class="px-8 py-3 bg-[#F4C300] text-black font-bold rounded-lg hover:opacity-90 transition-all">
                Kumpirmahin
            </button>

            <!-- Feedback Section -->
            <template x-if="showFeedback">
                <div class="flex flex-col items-center gap-6">
                    
                    <!-- Feedback Message -->
                    <div :class="userInput.toLowerCase().trim() === current.answer.toLowerCase() ? 'bg-green-500' : 'bg-red-500'"
                         x-transition
                         class="px-4 py-2 text-white rounded-lg shadow-md text-lg font-semibold">
                        <span x-show="userInput.toLowerCase().trim() === current.answer.toLowerCase()">✅ Tama!</span>
                        <span x-show="userInput.toLowerCase().trim() !== current.answer.toLowerCase()">❌ Mali</span>
                    </div>

                    <!-- Full Word Display -->
                    <h1 class="alphabet !text-[#F4C300]" x-text="current.full_word"></h1>

                    <!-- Instruction -->
                    <p class="w-96 text-lg text-center">
                        Basahin nang malinaw ang salitang nasa itaas.
                        Subukang bigkasin ito nang tama at dahan-dahan.
                    </p>

                    <!-- Microphone (Hold to Record) -->
                    <div x-show="!confirmed"
                        @mousedown="recording = true"
                        @mouseup="
                            recording = false;
                            setTimeout(() => confirmed = true, 1500)
                        "
                        @mouseleave="recording = false"
                        class="relative bg-gray-500 px-3 py-2 rounded-full cursor-pointer transition-transform hover:scale-110"
                        :class="{ 'scale-125 ring-4 ring-red-500 animate-pulse': recording }">

                        <i class="fa-solid fa-microphone text-white text-xl"></i>

                        <div x-show="recording"
                             class="absolute inset-0 rounded-full bg-red-500 opacity-30 animate-ping">
                        </div>
                    </div>

                    <!-- Recording Complete -->
                    <div x-show="confirmed"
                         x-transition
                         class="px-4 py-2 bg-green-500 text-white rounded-lg shadow-md text-lg font-semibold">
                        ✅ Naitala!
                    </div>

                </div>
            </template>

        </div>
    </template>

    <!-- Results Page -->
    @include('partials.pagsasanay-results')

    <!-- Navigation Buttons -->
    @include('partials.pagsasanay-navigation')

</div>