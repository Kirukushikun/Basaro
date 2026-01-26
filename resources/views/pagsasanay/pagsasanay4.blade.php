<script>
    window.pagsasanay4Questions = @json($questions);
</script>

<!-- Pagsasanay 4 -->
<div class="relative"
     x-data="{
        page: 1,
        confirmed: false,
        recording: false,
        processing: false,
        score: 0,
        transcription: '',
        mediaRecorder: null,
        audioChunks: [],
        questions: window.pagsasanay4Questions,
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

        get word() {
            return this.current ? this.current.syllables.join('') : ''
        },

        get isCorrect() {
            if (!this.confirmed || !this.transcription) return false;
            
            const userSaid = this.normalizeText(this.transcription);
            const correctAnswer = this.normalizeText(this.current.answer);
            
            return userSaid === correctAnswer;
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
                console.log('🎯 Expected answer:', this.current.answer);
                
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
                console.log('Expected:', this.current.answer);
                console.log('Got:', this.transcription);
            }
        },

        next() {
            // For panuto, allow navigation even if not confirmed
            if (this.isPanuto && !this.confirmed) {
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
            // For regular questions, only proceed if confirmed
            else if (this.confirmed) {
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
            this.confirmed = false;
            this.recording = false;
            this.processing = false;
            this.transcription = '';
            this.audioChunks = [];
        },

        replay() {
            this.page = 1;
            this.score = 0;
            this.soundEnabled = false; // Reset sound for replay
            this.reset();
        }
     }">

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
            
            <!-- Question Container -->
            <template x-if="!current.type">
                <div class="flex-1 flex flex-col items-center gap-8 mt-10">

                    <!-- Syllables with + sign -->
                    <div class="flex gap-2 items-center">
                        <template x-for="(s, index) in current.syllables" :key="index">
                            <div class="flex items-center gap-2">
                                <div class="items-center justify-center alphabet !text-6xl sm:!text-7xl md:!text-8xl lg:!text-8xl">
                                    <span x-text="s"></span>
                                </div>
                                <span x-show="index < current.syllables.length - 1" class="!text-2xl sm:!text-3xl md:!text-4xl lg:!text-4xl font-bold !text-[#F4C300]">+</span>
                            </div>
                        </template>
                    </div>

                    <!-- Formed Word (shown after confirmation) -->
                    <p x-show="confirmed && isCorrect" x-transition class="!text-2xl sm:!text-3xl md:!text-4xl lg:!text-5xl font-extrabold !text-[#F4C300]" x-text="word"></p>

                    <!-- Feedback -->
                    <div x-show="confirmed"
                        x-transition
                        class="w-full max-w-lg">
                        <div x-show="isCorrect"
                            class="px-6 py-4 bg-green-500 text-white rounded-lg shadow-md !text-base sm:!text-lg md:!text-lg lg:!text-xl font-semibold text-center">
                            <i class="fa-solid fa-check"></i> Tama!
                        </div>
                        <div x-show="!isCorrect"
                            class="px-6 py-4 bg-red-500 text-white rounded-lg shadow-md !text-base sm:!text-lg md:!text-lg lg:!text-xl font-semibold text-center ">
                            <i class="fa-solid fa-x"></i> Mali
                            <div class="!text-xs sm:!text-sm md:!text-sm lg:!text-base mt-2">
                                Ang tamang sagot ay: "<span x-text="current.answer"></span>"
                            </div>
                            
                            <button 
                                @click="reset()" 
                                class="mt-3 px-4 py-2 text-xs bg-yellow-400 text-black font-bold rounded-lg hover:bg-yellow-500 transition">
                                <i class="fa-solid fa-rotate-right"></i> Subukan Ulit
                            </button>
                        </div>
                    </div>

                    <!-- Instruction -->
                    <p x-show="!confirmed" class="w-96 !text-base sm:!text-lg md:!text-lg lg:!text-xl text-center">
                        Pagdugtungin ang mga pantig upang makabuo ng salita. Pagkatapos ay subukan mo itong basahin.
                    </p>

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

                            <i class="fa-solid fa-microphone text-white text-xl"
                            :class="{ 'fa-spinner fa-spin': processing }"></i>

                            <!-- Recording indicator -->
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
                            <p x-show="!recording && !processing" class="!text-gray-400 text-xs">
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