<script>
    window.pagtataya12_13Questions = @json($questions);
</script>

<!-- Pagtataya 12 & 13: Complete a word + Multiple Choice + Read Word with Speech-to-Text API -->
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
        questions: window.pagtataya12_13Questions,

        get current() {
            return this.page <= this.questions.length
                ? this.questions[this.page - 1]
                : null
        },

        get isCorrect() {
            if (!this.confirmed) return false;
            
            if (this.current.type === 'read_word') {
                return this.normalizeText(this.transcription) === this.normalizeText(this.current.word);
            } else if (this.current.type === 'multiple_choice') {
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
                
                const expected = this.current.word;
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
                if (this.current.type === 'read_word') {
                    console.log('Expected:', this.current.word);
                    console.log('Got:', this.transcription);
                } else {
                    console.log('Expected:', this.current.answer);
                    console.log('Got:', this.selected);
                }
            }
        },

        handleMultipleChoiceConfirm() {
            if (this.current.type === 'multiple_choice' && this.selected) {
                this.checkAnswer();
            }
        },

        next() {
            if (!this.confirmed) {
                if (this.current.type === 'multiple_choice') {
                    this.handleMultipleChoiceConfirm();
                }
            } else {
                this.page++;
                this.reset();
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
        <div class="flex-1 flex flex-col items-center gap-10 w-full">

            <!-- TYPE: READ WORD -->
            <template x-if="current.type === 'read_word'">
                <div class="flex-1 flex flex-col items-center gap-10">

                    <!-- word -->
                    <h1 class="text-5xl font-bold mt-10 !text-[#F4C300] text-center px-4 max-w-3xl"
                        x-text="current.word"></h1>

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
                                <div>Dapat: "<span x-text="current.word"></span>"</div>
                            </div>
                        </div>
                    </div>

                    <!-- Instruction -->
                    <p class="w-96 text-lg text-center" x-show="!confirmed">
                        Basahin nang malinaw ang salita na nasa itaas.
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

            <!-- TYPE: MULTIPLE CHOICE -->
            <template x-if="current.type === 'multiple_choice'">
                <div class="flex-1 flex flex-col items-center gap-8 mt-10">

                    <!-- Question with Dynamic Blank Position -->
                    <div class="flex items-center gap-2 max-w-2xl px-4">
                        <!-- Blank at START (for lesson 13) -->
                        <div x-show="current.blank_position === 'start'" 
                             class="min-w-[100px] h-16 flex items-center justify-center border-b-4 border-[#F4C300] text-4xl font-bold !text-[#F4C300]">
                            <span x-show="confirmed" x-text="current.answer"></span>
                            <span x-show="!confirmed"></span>
                        </div>

                        <!-- Main Word -->
                        <h3 class="text-4xl font-bold !text-[#F4C300] text-center" 
                            x-text="current.tanong"></h3>

                        <!-- Blank at END (for lesson 12) -->
                        <div x-show="current.blank_position === 'end'" 
                             class="min-w-[100px] h-16 flex items-center justify-center border-b-4 border-[#F4C300] text-4xl font-bold !text-[#F4C300]">
                            <span x-show="confirmed" x-text="current.answer"></span>
                            <span x-show="!confirmed"></span>
                        </div>
                    </div>

                    <p class="text-xl mb-4 font-semibold">Buoin mo ang salita. Pumili ng sagot na nasa ibaba:</p>

                    <!-- Answer Choices -->
                    <div class="flex flex-col gap-4 items-center max-w-xl w-full px-4">
                        <template x-for="choice in current.choices" :key="choice">
                            <button
                                @click="!confirmed && (selected = choice)"
                                :disabled="confirmed"
                                :class="{
                                    'bg-[#F4C300] !text-black border-[#F4C300]': selected === choice && !confirmed,
                                    'bg-green-500 !text-white border-green-500': confirmed && choice === current.answer,
                                    'bg-red-500 !text-white border-red-500': confirmed && selected === choice && choice !== current.answer,
                                    'opacity-50': confirmed && choice !== current.answer && choice !== selected
                                }"
                                class="w-full px-6 py-4 border-2 border-[#F4C300] !text-[#F4C300] font-bold rounded-lg hover:bg-[#F4C300] hover:!text-black transition-all text-center disabled:cursor-not-allowed text-lg">
                                <span x-text="choice"></span>
                            </button>
                        </template>
                    </div>

                    <!-- Feedback -->
                    <div x-show="confirmed"
                         x-transition
                         class="mt-4 px-6 py-3 rounded-lg text-lg font-semibold"
                         :class="selected === current.answer ? 'bg-green-500 text-white' : 'bg-red-500 text-white'">
                        <span x-show="selected === current.answer">
                            <i class="fa-solid fa-check"></i> Tama! Magaling!
                        </span>
                        <span x-show="selected !== current.answer">
                            <i class="fa-solid fa-x"></i> Mali. Ang tamang sagot ay <b x-text="current.answer"></b>
                        </span>
                    </div>

                </div>
            </template>

        </div>
    </template>

    <!-- Results Page -->
    @include('partials.pagtataya-results')

    <!-- Navigation Buttons -->
    <div x-show="page <= questions.length" class="absolute -bottom-[110px] flex items-center justify-between w-[450px]">
        <!-- Page Counter -->
        <p>
            <span x-text="page"></span>/<span x-text="questions.length"></span>
        </p>
        
        <div class="flex gap-3">
            <button 
                x-show="(selected && !confirmed) || confirmed" 
                @click="next" 
                :disabled="!selected && !confirmed"
                class="px-4 py-2 bg-[#F4C300] rounded-md font-bold whitespace-nowrap disabled:opacity-50 disabled:cursor-not-allowed">
                <span x-show="confirmed" class="!text-black">Susunod</span>
                <span x-show="selected && !confirmed" class="!text-black">Kumpirmahin</span>
                <i class="fa-solid fa-arrow-right !text-black"></i>
            </button>
        </div>
    </div>

</div>