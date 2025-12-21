<!-- Pagsasanay 4 -->
<div class="relative flex flex-col items-center"
     x-data="{
        page: 1,
        confirmed: false,
        recording: false,
        score: 0,
        questions: @js($questions),

        get current() {
            return this.page <= this.questions.length
                ? this.questions[this.page - 1]
                : null
        },

        get word() {
            return this.current ? this.current.syllables.join('') : ''
        },

        next() {
            if (!this.confirmed) {
                this.confirmed = true
                this.score++
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
        },

        replay() {
            this.page = 1
            this.score = 0
            this.reset()
        }
     }">

    <!-- Question Container -->
    <template x-if="current">
        <div class="flex-1 flex flex-col items-center gap-8 mt-10">

            <!-- Syllables with + sign -->
            <div class="flex gap-2 items-center">
                <template x-for="(s, index) in current.syllables" :key="index">
                    <div class="flex items-center gap-2">
                        <div class="items-center justify-center alphabet">
                            <span x-text="s"></span>
                        </div>
                        <span x-show="index < current.syllables.length - 1" class="text-3xl font-bold !text-[#F4C300]">+</span>
                    </div>
                </template>
            </div>

            <!-- Formed Word -->
            <p x-show="confirmed" x-transition class="text-3xl font-extrabold !text-[#F4C300]" x-text="word"></p>

            <!-- Success Message -->
            <div x-show="confirmed"
                 x-transition
                 class="bg-green-500 text-white px-6 py-2 rounded-lg font-bold text-lg shadow-md">
                <i class="fa-solid fa-check"></i> Tama!
            </div>

            <!-- Instruction -->
            <p class="w-96 text-center text-lg">
                Pagdugtungin ang mga pantig upang makabuo ng salita. Pagkatapos ay subukan mo itong basahin.
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

    <!-- Results Page -->
    @include('partials.pagsasanay-results')

    <!-- Navigation Buttons -->
    @include('partials.pagsasanay-navigation')

</div>