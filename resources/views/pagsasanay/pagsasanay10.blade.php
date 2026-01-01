<script>
    window.pagsasanay10Questions = @json($questions);
</script>

<!-- Pagsasanay 10: Fill Syllable + Reading -->
<div class="relative flex flex-col items-center"
     x-data="{
        page: 1,
        userInput: '',
        confirmed: false,
        recording: false,
        processing: false,
        score: 0,
        transcription: '',
        mediaRecorder: null,
        audioChunks: [],
        questions: window.pagsasanay10Questions,
        
        get current() {
            return this.page <= this.questions.length
                ? this.questions[this.page - 1]
                : null
        },

        get isCorrect() {
            if (!this.confirmed) return false;
            
            // For fill_syllable (text input)
            if (this.current.type === 'fill_syllable') {
                return this.normalizeText(this.userInput) === this.normalizeText(this.current.answer);
            }
            
            // For read_word (voice)
            if (this.current.type === 'read_word' && this.transcription) {
                const userSaid = this.normalizeText(this.transcription);
                const expected = this.normalizeText(this.current.full_word);
                return userSaid === expected;
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
            }
        },
        
        confirm() {
            if (this.current.type === 'fill_syllable') {
                this.confirmed = true;
                if (this.isCorrect) {
                    this.score++;
                }
            }
        },

        next() {
            if (this.confirmed) {
                this.page++;
                this.reset();
            }
        },
        
        reset() {
            this.userInput = '';
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
        <div class="flex-1 flex flex-col items-center gap-10 w-full">

            <!-- TYPE: FILL SYLLABLE -->
            <template x-if="current.type === 'fill_syllable'">
                <div class="flex-1 flex flex-col items-center gap-8 mt-10">

                    <!-- Image -->
                    <img :src="current.image" 
                         :alt="current.full_word" 
                         class="w-48 h-48 object-contain rounded-lg border-4 border-[#F4C300]">

                    <!-- Incomplete Word with Input -->
                    <div class="text-center">
                        <p class="text-xl mb-4 font-semibold">Punan ang nawawalang pantig:</p>
                        <div class="flex items-center justify-center gap-2">
                            <template x-for="(part, index) in current.word.split('__')" :key="index">
                                <div class="flex items-center">
                                    <span class="text-5xl font-bold !text-[#F4C300]" x-text="part"></span>
                                    <template x-if="index < current.word.split('__').length - 1">
                                        <input 
                                            type="text" 
                                            x-model="userInput"
                                            :disabled="confirmed"
                                            @keyup.enter="!confirmed && userInput.trim() && confirm()"
                                            class="w-24 h-16 text-4xl font-bold text-center border-4 border-[#F4C300] rounded-md mx-1 focus:outline-none focus:ring-4 focus:ring-yellow-300 disabled:bg-gray-100"
                                            maxlength="3"
                                        >
                                    </template>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Feedback -->
                    <div x-show="confirmed"
                         x-transition
                         class="px-6 py-3 text-white rounded-lg shadow-md text-lg font-semibold"
                         :class="isCorrect ? 'bg-green-500' : 'bg-red-500'">
                        <span x-show="isCorrect">
                            ✅ Tama!
                        </span>
                        <span x-show="!isCorrect">
                            ❌ Mali. Ang tamang sagot ay "<b x-text="current.answer"></b>"
                        </span>
                    </div>

                    <!-- Confirm Button -->
                    <button x-show="userInput.trim() && !confirmed"
                            @click="confirm" 
                            class="px-8 py-3 bg-[#F4C300] text-black font-bold rounded-lg hover:opacity-90 transition-all">
                        Kumpirmahin
                    </button>

                </div>
            </template>

            <!-- TYPE: READ WORD -->
            <template x-if="current.type === 'read_word'">
                <div class="flex-1 flex flex-col items-center gap-10">

                    <!-- Full Word -->
                    <h1 class="!text-7xl !font-bold !text-[#F4C300] mt-10" x-text="current.full_word"></h1>
                    
                    <!-- Feedback -->
                    <div x-show="confirmed" 
                         x-transition
                         class="w-full max-w-lg">
                        <div x-show="isCorrect"
                             class="px-6 py-4 bg-green-500 text-white rounded-lg shadow-md text-lg font-semibold text-center">
                            ✅ Tama!
                            <div class="text-sm mt-2">
                                Narinig: "<span x-text="transcription"></span>"
                            </div>
                        </div>
                        <div x-show="!isCorrect"
                             class="px-6 py-4 bg-red-500 text-white rounded-lg shadow-md text-lg font-semibold text-center">
                            ❌ Mali
                            <div class="text-sm mt-2">
                                <div>Narinig: "<span x-text="transcription"></span>"</div>
                                <div>Dapat: "<span x-text="current.full_word"></span>"</div>
                            </div>
                        </div>
                    </div>

                    <!-- Instruction -->
                    <p x-show="!confirmed" class="w-96 text-lg text-center">
                        Basahin nang malinaw ang salitang nasa itaas.
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