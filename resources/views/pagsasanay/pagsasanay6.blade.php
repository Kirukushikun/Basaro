<script>
    window.pagsasanay6Questions = @json($questions);
</script>

<!-- Pagsasanay 6: Syllable Building + Reading Comprehension -->
<div class="relative flex flex-col items-center"
     x-data="{
        page: 1,
        confirmed: false,
        recording: false,
        processing: false,
        score: 0,
        userInput: '',
        transcription: '',
        mediaRecorder: null,
        audioChunks: [],
        questions: window.pagsasanay6Questions,

        get current() {
            return this.page <= this.questions.length
                ? this.questions[this.page - 1]
                : null
        },

        get word() {
            return this.current && this.current.syllables ? this.current.syllables.join('') : ''
        },

        get isCorrect() {
            if (!this.confirmed) return false;
            
            // For comprehension (text input)
            if (this.current.type === 'comprehension') {
                return this.normalizeText(this.userInput) === this.normalizeText(this.current.answer);
            }
            
            // For voice-based questions
            if (!this.transcription) return false;
            
            const userSaid = this.normalizeText(this.transcription);
            let expected = '';
            
            if (this.current.type === 'syllable_build') {
                expected = this.normalizeText(this.current.answer);
            } else if (this.current.type === 'read_phrase') {
                expected = this.normalizeText(this.current.parirala);
            } else if (this.current.type === 'read_sentence') {
                expected = this.normalizeText(this.current.pangungusap);
            }
            
            return userSaid === expected;
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
                
                let expected = '';
                if (this.current.type === 'syllable_build') {
                    expected = this.current.answer;
                } else if (this.current.type === 'read_phrase') {
                    expected = this.current.parirala;
                } else if (this.current.type === 'read_sentence') {
                    expected = this.current.pangungusap;
                }
                
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
            }
        },

        confirm() {
            if (this.current.type === 'comprehension') {
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
            this.confirmed = false;
            this.recording = false;
            this.processing = false;
            this.userInput = '';
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

            <!-- TYPE: SYLLABLE BUILD -->
            <template x-if="current.type === 'syllable_build'">
                <div class="flex-1 flex flex-col items-center gap-8 mt-10">

                    <!-- Syllables with + sign -->
                    <div class="flex gap-2 items-center">
                        <template x-for="(s, index) in current.syllables" :key="index">
                            <div class="flex items-center gap-2">
                                <div class="items-center justify-center alphabet !text-8xl">
                                    <span x-text="s"></span>
                                </div>
                                <span x-show="index < current.syllables.length - 1" class="text-4xl font-bold !text-[#F4C300]">+</span>
                            </div>
                        </template>
                    </div>

                    <!-- Formed Word -->
                    <p x-show="confirmed" x-transition class="text-3xl font-extrabold !text-[#F4C300]" x-text="word"></p>

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
                                <div>Dapat: "<span x-text="current.answer"></span>"</div>
                            </div>
                        </div>
                    </div>

                    <!-- Instruction -->
                    <p x-show="!confirmed" class="w-96 text-center text-lg">
                        Pagdugtungin ang mga pantig upang makabuo ng salita. Pagkatapos ay subukan mo itong basahin.
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

            <!-- TYPE: READ PHRASE -->
            <template x-if="current.type === 'read_phrase'">
                <div class="flex-1 flex flex-col items-center gap-10">

                    <!-- Parirala -->
                    <h1 class="text-7xl font-bold mt-10 !text-[#F4C300]"
                        x-text="current.parirala"></h1>
                        
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
                                <div>Dapat: "<span x-text="current.parirala"></span>"</div>
                            </div>
                        </div>
                    </div>

                    <!-- Instruction -->
                    <p x-show="!confirmed" class="w-96 text-lg text-center">
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
                            <p x-show="!recording && !processing" class="!text-gray-400 text-xs">
                                Pindutin at hawakan ang mikropono habang nagbibigkas
                            </p>
                        </div>
                    </div>

                </div>
            </template>

            <!-- TYPE: READ SENTENCE -->
            <template x-if="current.type === 'read_sentence'">
                <div class="flex-1 flex flex-col items-center gap-10">

                    <!-- Pangungusap -->
                    <h1 class="text-5xl font-bold mt-10 !text-[#F4C300] text-center px-4"
                        x-text="current.pangungusap"></h1>
                        
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
                                <div>Dapat: "<span x-text="current.pangungusap"></span>"</div>
                            </div>
                        </div>
                    </div>

                    <!-- Instruction -->
                    <p x-show="!confirmed" class="w-96 text-lg text-center">
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
                            <p x-show="!recording && !processing" class="!text-gray-400 text-xs">
                                Pindutin at hawakan ang mikropono habang nagbibigkas
                            </p>
                        </div>
                    </div>

                </div>
            </template>

            <!-- TYPE: COMPREHENSION -->
            <template x-if="current.type === 'comprehension'">
                <div class="flex-1 flex flex-col items-center gap-10">

                    <!-- Question -->
                    <div class="mt-10 max-w-2xl px-4">
                        <h2 class="text-5xl font-bold !text-[#F4C300] mb-6 text-center"
                            x-text="current.tanong"></h2>
                    </div>
                        
                    <!-- Success/Error -->
                    <div x-show="confirmed"
                        x-transition>
                        <div x-show="isCorrect"
                            class="px-4 py-2 bg-green-500 text-white rounded-lg shadow-md text-lg font-semibold">
                            ✅ Tama!
                        </div>
                        <div x-show="!isCorrect"
                            class="px-4 py-2 bg-red-500 text-white rounded-lg shadow-md text-lg font-semibold">
                            ❌ Mali. Ang tamang sagot ay: "<span x-text="current.answer"></span>"
                        </div>
                    </div>

                    <!-- Instruction -->
                    <p x-show="!confirmed" class="w-96 text-lg text-center">
                        Sagutin ang tanong sa pamamagitan ng pagsulat ng iyong sagot sa ibaba.
                    </p>

                    <!-- Input Field -->
                    <div class="w-96">
                        <input 
                            type="text"
                            x-model="userInput"
                            :disabled="confirmed"
                            placeholder="Isulat ang iyong sagot dito..."
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg text-lg focus:outline-none focus:border-[#F4C300] disabled:bg-gray-100"
                            @keyup.enter="!confirmed && confirm()">
                    </div>

                    <!-- Confirm Button -->
                    <button x-show="userInput && !confirmed"
                            @click="confirm"
                            class="px-6 py-2 bg-[#F4C300] text-black font-bold rounded-lg hover:bg-yellow-500 transition">
                        Kumpirmahin
                    </button>

                </div>
            </template>

        </div>
    </template>

    <!-- Results Page -->
    @include('partials.pagsasanay-results')

    <!-- Navigation Buttons -->
    @include('partials.pagsasanay-navigation')

</div>