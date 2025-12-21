<!-- Pagtataya 2 -->
<div class="relative flex flex-col items-center"
     x-data="{
        page: 1,
        confirmed: false,
        recording: false,
        score: 0,
        userInput: '',
        questions: @js($questions),

        get current() {
            return this.page <= this.questions.length
                ? this.questions[this.page - 1]
                : null
        },

        next() {
            if (!this.confirmed) {
                this.confirmed = true
                // Score for patinig_identification and image_identification auto-pass for now
                if (['patinig_identification', 'image_identification'].includes(this.current.type)) {
                    this.score++
                }
                // Score for comprehension if correct (for future use)
                if (this.current.type === 'comprehension' && this.userInput.toLowerCase().trim() === this.current.answer.toLowerCase().trim()) {
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
            this.confirmed = false
            this.recording = false
            this.userInput = ''
        },

        replay() {
            this.page = 1
            this.score = 0
            this.reset()
        }
     }">

    <template x-if="current">
        <div class="w-full">
            <!-- Patinig Identification -->
            <template x-if="current.type === 'patinig_identification'">
                <div class="flex-1 flex flex-col items-center gap-10">

                    <!-- patinig -->
                    <h1 class="alphabet mt-10 !text-[#F4C300]"
                        x-text="current.patinig"></h1>

                    <!-- Success -->
                    <div x-show="confirmed"
                        x-transition
                        class="px-4 py-2 bg-green-500 text-white rounded-lg shadow-md text-lg font-semibold">
                        <i class="fa-solid fa-check"></i> Tama!
                    </div>

                    <!-- Instruction -->
                    <p class="w-96 text-lg text-center">
                        Basahin nang malinaw ang patinig nasa itaas.
                        Subukang bigkasin ito nang tama at dahan-dahan.
                    </p>

                    <!-- Microphone -->
                    <div class="flex flex-col items-center gap-4">
                        <div
                            @mousedown="recording = true"
                            @mouseup="
                                recording = false;
                                setTimeout(() => confirm(), 1500)
                            "
                            @mouseleave="recording = false"
                            class="relative bg-gray-500 px-3 py-2 rounded-full cursor-pointer transition-transform hover:scale-110"
                            :class="{ 'scale-125 ring-4 ring-red-500 animate-pulse': recording }">

                            <i class="fa-solid fa-microphone text-white text-xl"></i>

                            <div x-show="recording"
                                class="absolute inset-0 rounded-full bg-red-500 opacity-30 animate-ping">
                            </div>
                        </div>

                        <div class="text-center">
                            <p class="!text-gray-400 text-xs">
                                Pindutin at hawakan ang mikropono habang nagbibigkas
                            </p>
                        </div>                
                    </div>
                
                </div>
            </template>

            <!-- Image Identification -->
            <template x-if="current.type === 'image_identification'">
                <div class="flex-1 flex flex-col items-center gap-10">
                    
                    <!-- Image -->
                    <img :src="current.image" class="w-40 mt-10 rounded-lg border-4 border-gray-300">
                    
                    <!-- Success -->
                    <div x-show="confirmed"
                        x-transition
                        class="px-4 py-2 bg-green-500 text-white rounded-lg shadow-md text-lg font-semibold">
                        <i class="fa-solid fa-check"></i> Tama!
                    </div>

                    <!-- Instruction -->
                    <p class="w-96 text-lg text-center">
                        Bigkasin mo ang unang tunog sa pamamagitan ng pagpindot sa microphone button
                    </p>

                    <!-- Microphone -->
                    <div class="flex flex-col items-center gap-4">
                        <div
                            @mousedown="recording = true"
                            @mouseup="
                                recording = false;
                                setTimeout(() => confirm(), 1500)
                            "
                            @mouseleave="recording = false"
                            class="relative bg-gray-500 px-3 py-2 rounded-full cursor-pointer transition-transform hover:scale-110"
                            :class="{ 'scale-125 ring-4 ring-red-500 animate-pulse': recording }">

                            <i class="fa-solid fa-microphone text-white text-xl"></i>

                            <div x-show="recording"
                                class="absolute inset-0 rounded-full bg-red-500 opacity-30 animate-ping">
                            </div>
                        </div>

                        <div class="text-center">
                            <p class="!text-gray-400 text-xs">
                                Pindutin at hawakan ang mikropono habang nagbibigkas
                            </p>
                        </div>                
                    </div>
                </div>
            </template>
        </div>
    </template>

    <!-- Results Page -->
    @include('partials.pagtataya-results')

    <!-- Navigation Buttons -->
    @include('partials.pagtataya-navigation')

</div>