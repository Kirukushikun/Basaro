<script>
    window.pagsasanay3Questions = @json($questions);
</script>

<!-- Pagsasanay 3 with Speech-to-Text API -->
<div class="relative"
    x-data="{
        page: 1,
        confirmed: false,
        recording: false,
        processing: false,
        score: 0,
        transcription: '',
        userInput: '',
        mediaRecorder: null,
        audioChunks: [],
        questions: window.pagsasanay3Questions,
        soundEnabled: false,
        currentPanutoAudio: null,
        functionWordMap: {
            'si': ['si', 'see', 'c', 'sea'],
            'ang': ['ang', 'ung', 'ong'],
            'kay': ['kay', 'kaye', 'kai'],
            'ay': ['ay', 'i', 'eye', 'aye'],
            'mga': ['mga', 'manga'],
            'ng': ['ng', 'n g', 'nang'],
            'mo': ['mo', 'mow'],
            'mas': ['mas', 'mass', 'mas'],
            'at': ['at', 'at'],
            'na': ['na', 'nah'],
            'may': ['may', 'maye', 'mai'],
            'sila': ['sila', 'cila', 'seela'],
            'ni': ['ni', 'nee', 'knee'],
            'kina': ['kina', 'keena'],
            'sina': ['sina', 'seena', 'cina']
        },

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
            return this.page <= this.questions.length
                ? this.questions[this.page - 1]
                : null
        },

        get isCorrect() {
            if (!this.confirmed) return false;
            
            if (this.current.type === 'comprehension') {
                return this.normalizeText(this.userInput) === this.normalizeText(this.current.answer);
            }
            
            // For read_kataga - use function word mapping
            if (this.current.type === 'read_kataga') {
                const expected = this.current.kataga.toLowerCase();
                const normalized = this.normalizeText(this.transcription);
                
                // Check if word has variations in the map
                if (this.functionWordMap[expected]) {
                    return this.functionWordMap[expected].some(variant => 
                        normalized === variant || normalized.includes(variant)
                    );
                }
                
                // Default exact match
                return normalized === expected;
            }
            
            // For read_phrase and read_sentence - exact match for now
            const expected = this.current.parirala || this.current.pangungusap;
            return this.normalizeText(this.transcription) === this.normalizeText(expected);
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
                
                const expected = this.current.parirala || this.current.pangungusap || this.current.kataga;
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
                console.log('Expected:', this.current.parirala || this.current.pangungusap || this.current.kataga || this.current.answer);
                console.log('Got:', this.transcription || this.userInput);
            }
        },

        handleComprehensionSubmit() {
            if (this.current.type === 'comprehension' && this.userInput.trim()) {
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
                // For comprehension, submit the answer
                else if (this.current.type === 'comprehension') {
                    this.handleComprehensionSubmit();
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
            this.confirmed = false;
            this.recording = false;
            this.processing = false;
            this.transcription = '';
            this.userInput = '';
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
            
            <!-- Pagsasanay 3 - Basic Word Reading -->
            <template x-if="current.type === 'read_kataga'">
                <div class="flex flex-col items-center gap-6">

                    <!-- Kataga -->
                    <h1 class="alphabet mt-10 !text-[#F4C300] text-center"
                        x-text="current.kataga"></h1>

                    <!-- Feedback -->
                    <div x-show="confirmed" 
                        x-transition
                        class="w-full max-w-lg">
                        <div x-show="isCorrect"
                            class="px-6 py-4 bg-green-500 text-white rounded-lg shadow-md !text-base sm:!text-lg md:!text-lg lg:!text-xl font-semibold text-center">
                            <i class="fa-solid fa-check"></i> Tama!
                            <div class="!text-xs sm:!text-sm md:!text-sm lg:!text-base mt-2">
                                Narinig: "<span x-text="transcription"></span>"
                            </div>
                        </div>
                        <div x-show="!isCorrect"
                            class="px-6 py-4 bg-red-500 text-white rounded-lg shadow-md !text-base sm:!text-lg md:!text-lg lg:!text-xl font-semibold text-center">
                            <i class="fa-solid fa-x"></i> Mali
                            <div class="!text-xs sm:!text-sm md:!text-sm lg:!text-base mt-2 flex gap-2 justify-center">
                                <div>Narinig: "<span x-text="transcription"></span>"</div> -
                                <div>Dapat: "<span x-text="current.kataga"></span>"</div>
                            </div>
                            
                            <button 
                                @click="reset()" 
                                class="mt-3 px-4 py-2 text-xs bg-yellow-400 text-black font-bold rounded-lg hover:bg-yellow-500 transition">
                                <i class="fa-solid fa-rotate-right"></i> Subukan Ulit
                            </button>
                        </div>
                    </div>

                    <!-- Instruction -->
                    <p class="w-96 !text-base sm:!text-lg md:!text-lg lg:!text-xl text-center" x-show="!confirmed">
                        Basahin nang malinaw ang katagang nasa itaas.
                        Subukang bigkasin ito nang tama at dahan-dahan.
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

            <!-- Pagsasanay 5 - Read Phrase -->
            <template x-if="current.type === 'read_phrase'">
                <div class="flex flex-col items-center gap-6">

                    <!-- Parirala -->
                    <h1 class="!text-4xl sm:!text-5xl md:!text-6xl lg:!text-7xl font-bold mt-10 !text-[#F4C300]"
                        x-text="current.parirala"></h1>

                    <!-- Feedback -->
                    <div x-show="confirmed" 
                        x-transition
                        class="w-full max-w-lg">
                        <div x-show="isCorrect"
                            class="px-6 py-4 bg-green-500 text-white rounded-lg shadow-md !text-base sm:!text-lg md:!text-lg lg:!text-xl font-semibold text-center">
                            <i class="fa-solid fa-check"></i> Tama!
                            <div class="!text-xs sm:!text-sm md:!text-sm lg:!text-base mt-2">
                                Narinig: "<span x-text="transcription"></span>"
                            </div>
                        </div>
                        <div x-show="!isCorrect"
                            class="px-6 py-4 bg-red-500 text-white rounded-lg shadow-md !text-base sm:!text-lg md:!text-lg lg:!text-xl font-semibold text-center">
                            <i class="fa-solid fa-x"></i> Mali
                            <div class="!text-xs sm:!text-sm md:!text-sm lg:!text-base mt-2 flex gap-2 justify-center">
                                <div>Narinig: "<span x-text="transcription"></span>"</div>
                            </div>
                            
                            <button 
                                @click="reset()" 
                                class="mt-3 px-4 py-2 text-xs bg-yellow-400 text-black font-bold rounded-lg hover:bg-yellow-500 transition">
                                <i class="fa-solid fa-rotate-right"></i> Subukan Ulit
                            </button>
                        </div>
                    </div>

                    <!-- Instruction -->
                    <p class="w-96 text-lg text-center" x-show="!confirmed">
                        Basahin nang malinaw ang pariralang nasa itaas.
                        Subukang bigkasin ito nang tama at dahan-dahan.
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

            <!-- Read Sentence -->
            <template x-if="current.type === 'read_sentence'">
                <div class="flex flex-col items-center gap-6">

                    <!-- Pangungusap -->
                    <h1 class="!text-2xl sm:!text-3xl md:!text-4xl lg:!text-5xl font-bold mt-10 !text-[#F4C300] text-center px-4"
                        x-text="current.pangungusap"></h1>

                    <!-- Feedback -->
                    <div x-show="confirmed" 
                        x-transition
                        class="w-full max-w-lg">
                        <div x-show="isCorrect"
                            class="px-6 py-4 bg-green-500 text-white rounded-lg shadow-md !text-base sm:!text-lg md:!text-lg lg:!text-xl font-semibold text-center">
                            <i class="fa-solid fa-check"></i> Tama!
                            <div class="!text-xs sm:!text-sm md:!text-sm lg:!text-base mt-2">
                                Narinig: "<span x-text="transcription"></span>"
                            </div>
                        </div>
                        <div x-show="!isCorrect"
                            class="px-6 py-4 bg-red-500 text-white rounded-lg shadow-md !text-base sm:!text-lg md:!text-lg lg:!text-xl font-semibold text-center">
                            <i class="fa-solid fa-x"></i> Mali
                            <div class="!text-xs sm:!text-sm md:!text-sm lg:!text-base mt-2 flex gap-2 justify-center">
                                <div>Narinig: "<span x-text="transcription"></span>"</div>
                            </div>
                            
                            <button 
                                @click="reset()" 
                                class="mt-3 px-4 py-2 text-xs bg-yellow-400 text-black font-bold rounded-lg hover:bg-yellow-500 transition">
                                <i class="fa-solid fa-rotate-right"></i> Subukan Ulit
                            </button>
                        </div>
                    </div>

                    <!-- Instruction -->
                    <p class="w-96 font-bold text-lg text-center" x-show="!confirmed">
                        Basahin nang malinaw ang pangungusap na nasa itaas.
                        Subukang bigkasin ito nang tama at dahan-dahan.
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

            <!-- Comprehension -->
            <template x-if="current.type === 'comprehension'">
                <div class="flex flex-col items-center gap-6">

                    <!-- Question -->
                    <div class="mt-10 max-w-2xl px-4">
                        <h2 class="text-xl lg:!text-2xl font-bold !text-[#F4C300] mb-6 text-center"
                            x-text="current.tanong"></h2>
                    </div>

                    <!-- Feedback -->
                    <div x-show="confirmed"
                        x-transition
                        class="w-full max-w-lg">
                        <div x-show="isCorrect"
                            class="px-6 py-4 bg-green-500 text-white rounded-lg shadow-md !text-base sm:!text-lg md:!text-lg lg:!text-xl font-semibold text-center">
                            <i class="fa-solid fa-check"></i> Tama!
                        </div>
                        <div x-show="!isCorrect"
                            class="px-6 py-4 bg-red-500 text-white rounded-lg shadow-md !text-base sm:!text-lg md:!text-lg lg:!text-xl font-semibold text-center">
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
                    <p class="w-96 !text-base sm:!text-lg md:!text-lg lg:!text-xl text-center" x-show="!confirmed">
                        Sagutin ang tanong sa pamamagitan ng pagsulat ng iyong sagot sa ibaba.
                    </p>

                    <!-- Input Field -->
                    <div class="w-96">
                        <input 
                            type="text"
                            x-model="userInput"
                            :disabled="confirmed"
                            placeholder="Isulat ang iyong sagot dito..."
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg text-lg focus:outline-none focus:border-[#F4C300] disabled:bg-gray-800"
                            @keyup.enter="!confirmed && next()">
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