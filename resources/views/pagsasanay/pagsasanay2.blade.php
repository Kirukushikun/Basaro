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
    },

    next() {
        if (!this.showFeedback) {
            this.showFeedback = true
            // Only score for question types that have selectable answers
            if (['mc_audio', 'fill_blank_audio'].includes(this.current.type)) {
                if (this.selected === this.current.answer) this.score++
            }
        } else {
            this.page++
            this.reset()
        }
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
            <i x-show="['mc_audio','fill_blank_audio'].includes(current.type)"
               class="fa-solid fa-ear-listen !text-[#F4C300] alphabet"></i>

            <!-- TYPE: MC AUDIO -->
            <template x-if="current.type === 'mc_audio'">
                <div class="flex flex-col items-center gap-8">
                    <div class="grid grid-cols-5 gap-4">
                        <template x-for="choice in current.choices" :key="choice">
                            <button
                                @click="selected = choice; confirmed = false; showFeedback = false"
                                :class="{ 'bg-[#F4C300] !text-black': selected === choice }"
                                class="choice font-extrabold px-4 py-2 text-xl !text-[#F4C300] border-2 !border-[#F4C300] rounded-lg hover:bg-[#F4C300] hover:!text-black transition-all">
                                <span x-text="choice"></span>
                            </button>
                        </template>
                    </div>
                    <p class="w-96 text-lg text-center" x-text="current.prompt"></p>
                </div>
            </template>

            <!-- TYPE: IMAGE GROUP AUDIO (Part 1 - Identification with Voice) -->
            <template x-if="current.type === 'image_group_audio'">
                <div class="flex flex-col items-center gap-6">
                    <p class="text-lg text-center font-semibold" x-text="current.prompt"></p>
                    
                    <!-- Images Display -->
                    <div class="flex gap-6 justify-center">
                        <template x-for="img in current.images" :key="img.src">
                            <div class="text-center">
                                <img :src="img.src" class="w-32 mx-auto rounded-lg border-4 border-gray-300">
                                <p class="mt-2 font-bold" x-text="img.label"></p>
                            </div>
                        </template>
                    </div>

                    <!-- Microphone Button (Hold to Record) -->
                    <div
                        @mousedown="isRecording = true"
                        @mouseup="
                            isRecording = false;
                            setTimeout(() => confirmed = true, 1500)
                        "
                        @mouseleave="isRecording = false"
                        class="relative bg-gray-500 px-4 py-3 rounded-full cursor-pointer transition-transform hover:scale-110"
                        :class="{ 'ring-4 ring-red-500 animate-pulse scale-110': isRecording }">
                        <i class="fa-solid fa-microphone text-white text-xl"></i>
                        <div x-show="isRecording"
                             class="absolute inset-0 bg-red-500 opacity-30 rounded-full animate-ping"></div>
                    </div>

                    <p class="text-sm text-gray-400 italic">(Hold to record)</p>
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
                                @click="selected = vowel; confirmed = false; showFeedback = false"
                                :class="{ 'bg-[#F4C300] !text-black': selected === vowel }"
                                class="choice font-extrabold px-6 py-3 text-2xl !text-[#F4C300] border-2 !border-[#F4C300] rounded-lg hover:bg-[#F4C300] hover:!text-black transition-all">
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
            <button x-show="['mc_audio', 'fill_blank_audio'].includes(current.type) && selected && !confirmed"
                    @click="confirm"
                    class="px-6 py-2 bg-[#F4C300] text-black font-bold rounded-lg">
                Kumpirmahin
            </button>

            <!-- Feedback -->
            <div x-show="['mc_audio', 'fill_blank_audio'].includes(current.type) && showFeedback"
                class="mt-4 px-4 py-2 rounded-lg text-lg font-semibold"
                :class="selected === current.answer ? 'bg-green-500 text-white' : 'bg-red-500 text-white'">
                <span x-show="selected === current.answer">✅ Tama!</span>
                <span x-show="selected !== current.answer">
                    ❌ Mali. Ang tamang sagot ay <b x-text="current.answer"></b>
                </span>
            </div>

        </div>
    </template>

    <!-- Results Page -->
    @include('partials.pagsasanay-results')

    <!-- Navigation Buttons -->
    @include('partials.pagsasanay-navigation')

</div>