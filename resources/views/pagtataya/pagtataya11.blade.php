<script>
    window.pagtataya11Questions = @json($questions);
</script>

<!-- Pagtataya 11: Read Word Pairs + Identify Relationship with Speech-to-Text API -->
<div class="relative flex flex-col items-center"
     x-data="{
        page: 1,
        selected: null,
        confirmed: false,
        recording: false,
        processing: false,
        score: @entangle('score'),
        transcription: '',
        mediaRecorder: null,
        audioChunks: [],
        questions: window.pagtataya11Questions,
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
            return this.page <= this.questions.length
                ? this.questions[this.page - 1]
                : null
        },

        get isCorrect() {
            if (!this.confirmed) return false;
            
            if (this.current.type === 'read_pair') {
                // For word pairs, check if both words were said
                const expected = this.normalizeText(current.word1 + ' ' + current.word2);
                return this.normalizeText(this.transcription) === expected;
            } else if (this.current.type === 'identify_relationship') {
                return this.selected === this.current.answer;
            }
            
            return false;
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
                
                const expected = this.current.word1 + ' ' + this.current.word2;
                console.log('📤 Sending to API...');
                console.log('🎯 Expected answer:', expected);
                
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
                        this.checkAnswer();
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

        checkAnswer() {
            this.confirmed = true;
            this.processing = false;
            
            if (this.isCorrect) {
                this.score++;
                console.log('✅ Correct! Score:', this.score);
            } else {
                console.log('❌ Wrong answer');
                if (this.current.type === 'read_pair') {
                    console.log('Expected:', this.current.word1 + ' ' + this.current.word2);
                    console.log('Got:', this.transcription);
                } else {
                    console.log('Expected:', this.current.answer);
                    console.log('Got:', this.selected);
                }
            }
        },

        handleRelationshipConfirm() {
            if (this.current.type === 'identify_relationship' && this.selected) {
                this.checkAnswer();
            }
        },

        next() {
            if (!this.confirmed) {
                // For panuto, just proceed
                if (this.current.type === 'panuto') {
                    this.page++;
                    this.reset();
                    
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
                }
                // For multiple_choice, submit the answer
                else if (this.current.type === 'identify_relationship') {
                    this.handleRelationshipConfirm();
                }
            } else {
                this.page++;
                this.reset();

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
            }
        },

        reset() {
            this.selected = null;
            this.confirmed = false;
            this.recording = false;
            this.processing = false;
            this.transcription = '';
            this.audioChunks = [];
        },

        replay() {
            this.page = 1;
            this.score = 0;
            this.reset();
        }
     }">

    <template x-if="current">
        <div class="flex-1 flex flex-col items-center gap-10 w-full lg:min-w-96">

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

            <!-- TYPE: READ PAIR -->
            <template x-if="current.type === 'read_pair'">
                <div class="flex-1 flex flex-col items-center gap-10">

                    <!-- Word Pair Display -->
                    <div class="flex items-center gap-6 mt-10">
                        <h1 class="text-6xl font-bold !text-[#F4C300]" x-text="current.word1"></h1>
                        <span class="text-5xl !text-gray-400">-</span>
                        <h1 class="text-6xl font-bold !text-[#F4C300]" x-text="current.word2"></h1>
                    </div>

                    <!-- Feedback -->
                    <div x-show="confirmed" 
                         x-transition
                         class="w-full max-w-lg">
                        <div x-show="isCorrect"
                             class="px-6 py-4 bg-green-500 text-white rounded-lg shadow-md text-lg font-semibold text-center">
                            <i class="fa-solid fa-check"></i> Tama!
                            <div class="text-sm mt-2">
                                Narinig: "<span x-text="transcription"></span>"
                            </div>
                        </div>
                        <div x-show="!isCorrect"
                             class="px-6 py-4 bg-red-500 text-white rounded-lg shadow-md text-lg font-semibold text-center">
                            <i class="fa-solid fa-xmark"></i> Mali
                            <div class="text-sm mt-2">
                                <div>Narinig: "<span x-text="transcription"></span>"</div>
                            </div>
                        </div>
                    </div>

                    <!-- Instruction -->
                    <p class="w-96 text-lg text-center" x-show="!confirmed">
                        Basahin nang malinaw ang dalawang salita.
                        Subukang bigkasin ang mga ito nang tama at dahan-dahan.
                    </p>

                    <!-- Microphone -->
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
                            <p x-show="!recording && !processing" class="text-gray-400 text-xs">
                                Pindutin at hawakan ang mikropono habang nagbibigkas
                            </p>
                        </div>
                    </div>

                </div>
            </template>

            <!-- TYPE: IDENTIFY RELATIONSHIP -->
            <template x-if="current.type === 'identify_relationship'">
                <div class="flex-1 flex flex-col items-center gap-8 mt-10">

                    <!-- Word Pair (smaller, as reference) -->
                    <div class="flex items-center gap-4 bg-gray-800 px-8 py-4 rounded-xl border-2 border-[#F4C300]">
                        <span class="text-3xl font-bold text-white" x-text="current.word1"></span>
                        <span class="text-2xl !text-gray-400">-</span>
                        <span class="text-3xl font-bold text-white" x-text="current.word2"></span>
                    </div>

                    <!-- Question -->
                    <div class="max-w-2xl px-4">
                        <h3 class="text-2xl font-bold !text-[#F4C300] text-center mb-2">
                            Ang dalawang salitang ito ay:
                        </h3>
                    </div>

                    <!-- Answer Choices -->
                    <div class="flex flex-col gap-4 items-center max-w-xl w-full px-4">
                        <button
                            @click="!confirmed && (selected = 'Magkasingkahulugan')"
                            :disabled="confirmed"
                            :class="{
                                'bg-[#F4C300] !text-black border-[#F4C300]': selected === 'Magkasingkahulugan' && !confirmed,
                                'bg-green-500 !text-white border-green-500': confirmed && 'Magkasingkahulugan' === current.answer,
                                'bg-red-500 !text-white border-red-500': confirmed && selected === 'Magkasingkahulugan' && 'Magkasingkahulugan' !== current.answer,
                                'opacity-50 cursor-not-allowed': confirmed && 'Magkasingkahulugan' !== current.answer && selected !== 'Magkasingkahulugan'
                            }"
                            class="w-full px-6 py-4 border-2 border-[#F4C300] !text-[#F4C300] font-bold rounded-lg hover:bg-[#F4C300] hover:!text-black transition-all text-center disabled:hover:bg-transparent disabled:hover:!text-[#F4C300] text-lg">
                            Magkasingkahulugan
                        </button>

                        <button
                            @click="!confirmed && (selected = 'Magkasalungat')"
                            :disabled="confirmed"
                            :class="{
                                'bg-[#F4C300] !text-black border-[#F4C300]': selected === 'Magkasalungat' && !confirmed,
                                'bg-green-500 !text-white border-green-500': confirmed && 'Magkasalungat' === current.answer,
                                'bg-red-500 !text-white border-red-500': confirmed && selected === 'Magkasalungat' && 'Magkasalungat' !== current.answer,
                                'opacity-50 cursor-not-allowed': confirmed && 'Magkasalungat' !== current.answer && selected !== 'Magkasalungat'
                            }"
                            class="w-full px-6 py-4 border-2 border-[#F4C300] !text-[#F4C300] font-bold rounded-lg hover:bg-[#F4C300] hover:!text-black transition-all text-center disabled:hover:bg-transparent disabled:hover:!text-[#F4C300] text-lg">
                            Magkasalungat
                        </button>
                    </div>

                    <!-- Confirm Button -->
                    <button x-show="selected && !confirmed"
                            @click="next"
                            class="px-8 py-3 bg-[#F4C300] text-black font-bold rounded-lg hover:opacity-90 transition-all">
                        Kumpirmahin
                    </button>

                    <!-- Feedback -->
                    <div x-show="confirmed"
                         x-transition
                         class="mt-4 px-6 py-3 rounded-lg text-lg font-semibold"
                         :class="selected === current.answer ? 'bg-green-500 text-white' : 'bg-red-500 text-white'">
                        <span x-show="selected === current.answer">
                            <i class="fa-solid fa-check"></i> Tama! Magaling!
                        </span>
                        <span x-show="selected !== current.answer">
                            <i class="fa-solid fa-x"></i> Mali.
                        </span>
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