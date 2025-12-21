<!-- Pagsasanay 2 -->
<div class="relative" x-data="{
    page: 1,
    selected: null,
    confirmed: false,
    showFeedback: false,
    score: 0,
    isRecording: false,
    questions: @js($questions),

    get current() {
        return this.page <= this.questions.length ? this.questions[this.page - 1] : null
    },

    confirm() {
        this.confirmed = true
        this.showFeedback = true
        // Only score for question types that have selectable answers
        if (['fill_blank_audio'].includes(this.current.type)) {
            if (this.selected === this.current.answer) this.score++
        }
    },

    next() {
        this.page++
        this.reset()
    },

    reset() {
        this.selected = null
        this.confirmed = false
        this.showFeedback = false
        this.isRecording = false
    },

    replay() {
        this.page = 1
        this.score = 0
        this.reset()
    }
}">

    <!-- Question Content -->
    <template x-if="current">
        <div class="flex-1 flex flex-col items-center gap-10 mt-10 w-full">

            <!-- Audio Icon (for audio-based questions) -->
            <i x-show="['mc_audio'].includes(current.type)"
               class="fa-solid fa-ear-listen !text-[#F4C300] alphabet"></i>
            


            <!-- TYPE: IMAGE GROUP AUDIO (Part 1 - Identification with Voice) -->
            <template x-if="current.type === 'image_group_audio'">
                <div class="flex flex-col items-center gap-6">
                    
                    <!-- Images Display -->
                    <div class="flex gap-6 justify-center">
                        <template x-for="img in current.images" :key="img.src">
                            <div class="text-center">
                                <img :src="img.src" class="w-32 mx-auto rounded-lg border-4 border-gray-300">
                            </div>
                        </template>
                    </div>

                    <!-- Success -->
                    <div x-show="confirmed"
                        x-transition
                        class="px-4 py-2 bg-green-500 text-white rounded-lg shadow-md text-lg font-semibold">
                        <i class="fa-solid fa-check"></i> Tama!
                    </div>

                    <p class="w-96 text-lg text-center font-semibold">Tukuyin ang patinig ng mga sumusunod na larawan. Subukang bigkasin ito nang tama at dahan-dahan</p>

                    <div class="flex flex-col items-center gap-4">
                        <div
                            @mousedown="!confirmed && (isRecording = true)"
                            @mouseup="
                                isRecording = false;
                                if (!confirmed) {
                                    setTimeout(() => confirmed = true, 1500)
                                }
                            "
                            @mouseleave="isRecording = false"
                            :class="{ 
                                'ring-4 ring-red-500 animate-pulse scale-110': isRecording,
                                'opacity-50 cursor-not-allowed': confirmed
                            }"
                            class="relative bg-gray-500 px-4 py-3 rounded-full cursor-pointer transition-transform hover:scale-110">
                            <i class="fa-solid fa-microphone text-white text-xl"></i>
                            <div x-show="isRecording"
                                class="absolute inset-0 bg-red-500 opacity-30 rounded-full animate-ping"></div>
                        </div>                        
                        <p class="!text-gray-400 text-xs">
                            Pindutin at hawakan ang mikropono habang nagbibigkas
                        </p>
                    </div>
                    <!-- Microphone Button (Hold to Record) -->

                </div>
            </template>

            <!-- TYPE: FILL BLANK AUDIO (Part 2 - Select Missing Vowel) -->
            <template x-if="current.type === 'fill_blank_audio'">
                <div class="flex flex-col items-center gap-6">
                    <img :src="current.image" class="w-40 rounded-lg border-4 border-gray-300">
                    <p class="text-6xl font-bold" x-text="current.word"></p>
                    <p class="text-lg text-center">Piliin ang tamang letra upang mabuo ang salita</p>

                    <!-- Vowel Choices -->
                    <div class="grid grid-cols-5 gap-4">
                        <template x-for="vowel in ['A', 'E', 'I', 'O', 'U']" :key="vowel">
                            <button
                                @click="!confirmed && (selected = vowel)"
                                :disabled="confirmed"
                                :class="{ 
                                    'bg-[#F4C300] !text-black': selected === vowel,
                                    'opacity-50 cursor-not-allowed': confirmed && selected !== vowel
                                }"
                                class="choice font-extrabold px-6 py-3 text-2xl !text-[#F4C300] border-2 !border-[#F4C300] rounded-lg hover:bg-[#F4C300] hover:!text-black transition-all disabled:hover:bg-transparent disabled:hover:!text-[#F4C300]">
                                <span x-text="vowel"></span>
                            </button>
                        </template>
                    </div>

                    <!-- Pronunciation Button (after correct answer) -->
                    <div x-show="showFeedback && selected === current.answer" class="flex flex-col items-center gap-3">
                        <p class="text-sm text-gray-300">Bigkasin ang salita:</p>
                        <div
                            @mousedown="isRecording = true"
                            @mouseup="isRecording = false"
                            @mouseleave="isRecording = false"
                            class="relative bg-gray-500 px-4 py-2 rounded-full cursor-pointer transition-transform hover:scale-110"
                            :class="{ 'ring-4 ring-red-500 animate-pulse scale-110': isRecording }">
                            <i class="fa-solid fa-microphone text-white"></i>
                            <div x-show="isRecording"
                                 class="absolute inset-0 bg-red-500 opacity-30 rounded-full animate-ping"></div>
                        </div>
                    </div>
                </div>
            </template>

            <!-- Confirm Button -->
            <button x-show="['fill_blank_audio'].includes(current.type) && selected && !confirmed"
                    @click="confirm"
                    class="px-6 py-2 bg-[#F4C300] text-black font-bold rounded-lg hover:bg-yellow-500 transition-colors">
                Kumpirmahin
            </button>

            <!-- Feedback -->
            <div x-show="['image_group_audio','fill_blank_audio'].includes(current.type) && showFeedback"
                class="px-4 py-2 rounded-lg text-lg font-semibold"
                :class="selected === current.answer ? 'bg-green-500 text-white' : 'bg-red-500 text-white'">
                <span x-show="selected === current.answer"><i class="fa-solid fa-check"></i> Tama!</span>
                <span x-show="selected !== current.answer">
                    <i class="fa-solid fa-x"></i> Mali. Ang tamang sagot ay <b x-text="current.answer"></b>
                </span>
            </div>

        </div>
    </template>

    <!-- Results Page -->
    @include('partials.pagsasanay-results')

    <!-- Navigation Buttons -->
    @include('partials.pagsasanay-navigation')

</div>