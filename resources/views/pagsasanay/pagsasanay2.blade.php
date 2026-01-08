<script>
    window.pagsasanay2Questions = @json($questions);
</script>

<!-- Pagsasanay 2 -->
<div class="relative" x-data="{
    page: 1,
    selected: null,
    confirmed: false,
    showFeedback: false,
    score: 0,
    recording: false,
    processing: false,
    transcription: '',
    mediaRecorder: null,
    audioChunks: [],
    questions: @js($questions),
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
            if (!this.current || !this.current.audio) return;
            
            const audioFiles = Array.isArray(this.current.audio) 
                ? this.current.audio 
                : [this.current.audio];
            
            let currentIndex = 0;
            
            const playNext = () => {
                if (currentIndex < audioFiles.length) {
                    this.currentPanutoAudio = new Audio(audioFiles[currentIndex]);
                    this.currentPanutoAudio.onended = () => {
                        currentIndex++;
                        playNext();
                    };
                    this.currentPanutoAudio.play();
                } else {
                    this.currentPanutoAudio = null;
                }
            };
            
            playNext();
        }
    },

    get current() {
        return this.page <= this.questions.length ? this.questions[this.page - 1] : null
    },

    confirm() {
        this.confirmed = true
        this.showFeedback = true
        
        // Score for vowel selection
        if (this.current.type === 'fill_blank_audio') {
            if (this.selected === this.current.answer) {
                this.score++
            }
        }
        
        // Score for pronunciation
        if (this.current.type === 'pronounce_word') {
            if (this.normalizeText(this.transcription) === this.normalizeText(this.current.full_word)) {
                this.score++
            }
        }
    },

    normalizeText(text) {
        return text.toLowerCase().trim().replace(/[.,!?]/g, '');
    },

    async startRecording() {
        if (this.confirmed) return;
        
        try {
            const stream = await navigator.mediaDevices.getUserMedia({ 
                audio: {
                    echoCancellation: true,
                    noiseSuppression: true,
                    sampleRate: 48000
                } 
            });
            
            this.mediaRecorder = new MediaRecorder(stream, {
                mimeType: 'audio/webm;codecs=opus'
            });
            
            this.audioChunks = [];
            
            this.mediaRecorder.ondataavailable = (event) => {
                if (event.data.size > 0) {
                    this.audioChunks.push(event.data);
                }
            };
            
            this.mediaRecorder.onstop = async () => {
                await this.processAudio();
            };
            
            this.mediaRecorder.start();
            this.recording = true;
            
            console.log('🎤 Recording started...');
        } catch (error) {
            console.error('❌ Error accessing microphone:', error);
            alert('Hindi ma-access ang microphone. Please allow microphone access.');
        }
    },

    stopRecording() {
        if (this.mediaRecorder && this.recording) {
            this.mediaRecorder.stop();
            this.recording = false;
            this.processing = true;
            
            console.log('⏹️ Recording stopped');
            
            this.mediaRecorder.stream.getTracks().forEach(track => track.stop());
        }
    },

    async processAudio() {
        const audioBlob = new Blob(this.audioChunks, { type: 'audio/webm' });
        
        console.log('📦 Audio blob size:', audioBlob.size, 'bytes');
        
        const reader = new FileReader();
        reader.readAsDataURL(audioBlob);
        reader.onloadend = async () => {
            const base64Audio = reader.result.split(',')[1];
            
            console.log('📤 Sending to API...');
            console.log('🎯 Expected answer:', this.current.full_word);
            
            try {
                const response = await fetch('/api/speech-to-text', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        audio: base64Audio,
                        language: 'tl-PH'
                    })
                });
                
                const data = await response.json();
                
                console.log('📥 API Response:', data);
                
                if (data.success) {
                    this.transcription = data.transcription;
                    console.log('🗣️ You said:', this.transcription);
                    this.confirm();
                } else {
                    console.error('❌ API Error:', data.error);
                    alert('May error sa pag-process ng audio: ' + data.error);
                    this.processing = false;
                }
            } catch (error) {
                console.error('❌ Fetch Error:', error);
                alert('May error sa pag-send ng audio.');
                this.processing = false;
            }
        };
    },

    next() {
        // Stop panuto audio if playing
        if (this.currentPanutoAudio) {
            this.currentPanutoAudio.pause();
            this.currentPanutoAudio.currentTime = 0; // Reset to beginning
            this.currentPanutoAudio = null;
        }

        // Auto-play next panuto audio if applicable
        this.$nextTick(() => {
            if (this.soundEnabled && this.isPanuto && this.current && this.current.audio) {
                this.currentPanutoAudio = new Audio(this.current.audio);
                this.currentPanutoAudio.play();
            }
        });

        this.page++
        this.reset()
    },

    reset() {
        this.selected = null
        this.confirmed = false
        this.showFeedback = false
        this.recording = false
        this.processing = false
        this.transcription = ''
        this.audioChunks = []
    },

    replay() {
        this.page = 1
        this.score = 0
        this.soundEnabled = false; // Reset sound for replay
        this.reset()
    }
}">


    <!-- Question Content -->
    <template x-if="current">
        <div class="flex-1 flex flex-col items-center gap-10 w-full lg:min-w-96">

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

            <!-- TYPE: IMAGE GROUP AUDIO (Identify vowel sound) -->
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

                    <!-- Success Feedback -->
                    <div x-show="confirmed"
                        x-transition
                        class="px-4 py-2 bg-green-500 text-white rounded-lg shadow-md text-lg font-semibold">
                        <i class="fa-solid fa-check"></i> Tama!
                    </div>

                    <p class="w-96 !text-base sm:!text-lg md:!text-lg lg:!text-xl text-center font-semibold">
                        Tukuyin ang patinig ng mga sumusunod na larawan. Subukang bigkasin ito nang tama at dahan-dahan
                    </p>

                    <!-- Microphone Button -->
                    <div class="flex flex-col items-center gap-4">
                        <button
                            @mousedown="startRecording()"
                            @mouseup="stopRecording()"
                            @touchstart.prevent="startRecording()"
                            @touchend.prevent="stopRecording()"
                            :disabled="confirmed || processing"
                            class="relative bg-gray-500 px-3 py-2 rounded-full cursor-pointer transition-all hover:scale-110 disabled:opacity-50 disabled:cursor-not-allowed shadow-lg"
                            :class="{ 
                                'scale-125 ring-4 ring-red-500 bg-red-500': recording,
                                'animate-pulse': processing
                            }">

                            <i class="fa-solid fa-microphone text-white text-xl"
                               :class="{ 'fa-spinner fa-spin': processing }"></i>

                            <div x-show="recording"
                                 class="absolute inset-0 rounded-full bg-red-500 opacity-30 animate-ping">
                            </div>
                        </button>
                        
                        <!-- Status text -->
                        <div class="text-center">
                            <p x-show="recording" class="text-red-500 font-semibold animate-pulse">
                                🔴 Nagrerekord...
                            </p>
                            <p x-show="processing" class="text-blue-500 font-semibold">
                                ⏳ Pinoproseso...
                            </p>
                            <p x-show="!recording && !processing && !confirmed" class="text-gray-400 text-sm">
                                Pindutin at hawakan ang mikropono habang nagbibigkas
                            </p>
                        </div>
                    </div>
                </div>
            </template>

            <!-- TYPE: FILL BLANK AUDIO (Select Missing Vowel) -->
            <template x-if="current.type === 'fill_blank_audio'">
                <div class="flex flex-col items-center gap-6">
                    <img :src="current.image" class="w-40 rounded-lg border-4 border-gray-300">
                    <p class="text-6xl font-bold" x-text="current.word"></p>
                    <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl text-center">Piliin ang tamang letra upang mabuo ang salita</p>

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
                                class="choice font-extrabold px-6 py-3 !text-xl sm:!text-2xl md:!text-3xl lg:!text-4xl !text-[#F4C300] border-2 !border-[#F4C300] rounded-lg hover:bg-[#F4C300] hover:!text-black transition-all disabled:hover:bg-transparent disabled:hover:!text-[#F4C300]">
                                <span x-text="vowel"></span>
                            </button>
                        </template>
                    </div>

                    <!-- Confirm Button -->
                    <button x-show="selected && !confirmed"
                            @click="confirm"
                            class="px-6 py-2 bg-[#F4C300] text-black font-bold rounded-lg hover:bg-yellow-500 transition-colors">
                        Kumpirmahin
                    </button>

                    <!-- Feedback -->
                    <div x-show="showFeedback"
                        class="px-4 py-2 rounded-lg text-lg font-semibold"
                        :class="selected === current.answer ? 'bg-green-500 text-white' : 'bg-red-500 text-white'">
                        <span x-show="selected === current.answer">
                            <i class="fa-solid fa-check"></i> Tama!
                        </span>
                        <span x-show="selected !== current.answer">
                            <i class="fa-solid fa-x"></i> Mali. Ang tamang sagot ay <b x-text="current.answer"></b>
                        </span>
                    </div>
                </div>
            </template>

            <!-- TYPE: PRONOUNCE WORD (Say the complete word) -->
            <template x-if="current.type === 'pronounce_word'">
                <div class="flex flex-col items-center gap-6">
                    <img :src="current.image" class="w-48 rounded-lg border-4 border-gray-300">
                    <p class="text-6xl font-bold !text-[#F4C300]" x-text="current.full_word"></p>
                    <p class="!text-base sm:!text-lg md:!text-lg lg:!text-xl text-center font-semibold">Bigkasin ang buong salita nang malinaw</p>

                    <!-- Feedback -->
                    <div x-show="confirmed" 
                         x-transition
                         class="w-full max-w-lg">
                        <div x-show="normalizeText(transcription) === normalizeText(current.full_word)"
                             class="px-6 py-4 bg-green-500 text-white rounded-lg shadow-md !text-base sm:!text-lg md:!text-lg lg:!text-xl font-semibold text-center">
                            ✅ Tama!
                            <div class="!text-xs sm:!text-sm md:!text-sm lg:!text-base mt-2">
                                Narinig: "<span x-text="transcription"></span>"
                            </div>
                        </div>
                        <div x-show="normalizeText(transcription) !== normalizeText(current.full_word)"
                             class="px-6 py-4 bg-red-500 text-white rounded-lg shadow-md !text-base sm:!text-lg md:!text-lg lg:!text-xl font-semibold text-center">
                            ❌ Mali
                            <div class="!text-xs sm:!text-sm md:!text-sm lg:!text-base mt-2">
                                <div>Narinig: "<span x-text="transcription"></span>"</div>
                                <div>Dapat: "<span x-text="current.full_word"></span>"</div>
                            </div>
                        </div>
                    </div>

                    <!-- Microphone Button -->
                    <div x-show="!confirmed" class="flex flex-col items-center gap-4">
                        <button
                            @mousedown="startRecording()"
                            @mouseup="stopRecording()"
                            @touchstart.prevent="startRecording()"
                            @touchend.prevent="stopRecording()"
                            :disabled="confirmed || processing"
                            class="relative bg-gray-500 px-3 py-2 rounded-full cursor-pointer transition-all hover:scale-110 disabled:opacity-50 disabled:cursor-not-allowed shadow-lg"
                            :class="{ 
                                'scale-125 ring-4 ring-red-500 bg-red-500': recording,
                                'animate-pulse': processing
                            }">

                            <i class="fa-solid fa-microphone text-white text-lg"
                               :class="{ 'fa-spinner fa-spin': processing }"></i>

                            <div x-show="recording"
                                 class="absolute inset-0 rounded-full bg-red-500 opacity-30 animate-ping">
                            </div>
                        </button>

                        <!-- Status text -->
                        <div class="text-center">
                            <p x-show="recording" class="text-red-500 font-semibold animate-pulse">
                                🔴 Nagrerekord...
                            </p>
                            <p x-show="processing" class="text-blue-500 font-semibold">
                                ⏳ Pinoproseso...
                            </p>
                            <p x-show="!recording && !processing" class="text-gray-400 text-sm">
                                Pindutin at hawakan ang mikropono habang nagbibigkas
                            </p>
                        </div>
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
