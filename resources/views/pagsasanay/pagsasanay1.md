```html
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('pagsasanay1Data', (questions) => ({
            page: 1,
            confirmed: false,
            recording: false,
            processing: false,
            score: 0,
            transcription: '',
            mediaRecorder: null,
            audioChunks: [],
            questions: questions,

            get current() {
                return this.page <= this.questions.length
                    ? this.questions[this.page - 1]
                    : null
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
                    console.error('<i class="fa-solid fa-x"></i> Error accessing microphone:', error);
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
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
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
                            console.error('<i class="fa-solid fa-x"></i> API Error:', data.error);
                            alert('May error sa pag-process ng audio: ' + data.error);
                            this.processing = false;
                        }
                    } catch (error) {
                        console.error('<i class="fa-solid fa-x"></i> Fetch Error:', error);
                        alert('May error sa pag-send ng audio. Check console for details.');
                        this.processing = false;
                    }
                };
            },

            checkAnswer() {
                this.confirmed = true;
                this.processing = false;
                
                if (this.isCorrect) {
                    this.score++;
                    console.log('<i class="fa-solid fa-check"></i> Correct! Score:', this.score);
                } else {
                    console.log('<i class="fa-solid fa-x"></i> Wrong answer');
                    console.log('Expected:', this.current.answer);
                    console.log('Got:', this.transcription);
                }
            },

            next() {
                if (this.confirmed) {
                    this.page++;
                    this.reset();
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
                this.reset();
            }
        }))
    });
</script>

<!-- Pagsasanay 1 -->
<div class="relative flex flex-col items-center"
     x-data='pagsasanay1Data(@json($questions))'>

    <template x-if="current">
        <div class="flex-1 flex flex-col items-center gap-10">

            <!-- Alphabet Display -->
            <h1 class="alphabet mt-10 !text-[#F4C300]"
                x-text="current.alpabeto"></h1>

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
                    <div class="!text-xs sm:!text-sm md:!text-sm lg:!text-base mt-2">
                        <div>Narinig: "<span x-text="transcription"></span>"</div>
                        <div>Dapat: "<span x-text="current.answer"></span>"</div>
                    </div>
                </div>
            </div>

            <!-- Instruction -->
            <p class="w-96 !text-base sm:!text-lg md:!text-lg lg:!text-xl text-center" x-show="!confirmed">
                Basahin nang malinaw ang alpabetong nasa itaas.
                Subukang bigkasin ito nang tama at dahan-dahan.
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
                        🔴 Nagrerekord... (Hawakan ang button)
                    </p>
                    <p x-show="processing" class="text-blue-500 font-semibold">
                        ⏳ Pinoproseso ang iyong boses...
                    </p>
                    <p x-show="!recording && !processing && !confirmed" class="!text-gray-400 text-xs">
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
```