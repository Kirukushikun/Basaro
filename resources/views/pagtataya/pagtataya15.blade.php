<script>
    window.pagtataya15Questions = @json($questions);
</script>

<!-- Pagtataya 15: Sawikain + Kasabihan with Comprehension with Speech-to-Text API -->
<div class="relative flex flex-col items-center lg:min-w-96 p-6"
     x-data="{
        page: 1,
        userInput: '',
        confirmed: false,
        recording: false,
        processing: false,
        score: @entangle('score'),
        transcription: '',
        mediaRecorder: null,
        audioChunks: [],
        questions: window.pagtataya15Questions,
        soundEnabled: false,
        currentPanutoAudio: null,
        selectedChoice: null,

        get isPanuto() {
            return this.current && this.current.type === 'panuto';
        },

        get showSoundOverlay() {
            return !this.soundEnabled && this.isPanuto;
        },

        enableSound() {
            this.soundEnabled = true;
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
            
            if (this.current.type === 'read_sawikain') {
                return this.normalizeText(this.transcription) === this.normalizeText(this.current.sawikain);
            } else if (['input_kahulugan', 'comprehension'].includes(this.current.type)) {
                return this.normalizeText(this.userInput) === this.normalizeText(this.current.answer);
            } else if (this.current.type === 'multiple_choice') {
                return this.selectedChoice === this.current.answer;
            } else if (['kasabihan', 'salawikain'].includes(this.current.type)) {
                return true;
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
                
                const expected = this.current.sawikain;
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

        handleTextInputConfirm() {
            if (['input_kahulugan', 'comprehension'].includes(this.current.type) && this.userInput.trim()) {
                this.checkAnswer();
            }
        },

        handleReadingPageNext() {
            if (['kasabihan', 'salawikain'].includes(this.current.type)) {
                this.confirmed = true;
                this.score++;
                console.log('✅ Reading page completed! Score:', this.score);
            }
        },

        handleMultipleChoiceConfirm() {
            if (this.current.type === 'multiple_choice' && this.selectedChoice) {
                this.checkAnswer();
            }
        },

        next() {
            if (this.isPanuto) {
                this.page++
                this.reset()
                
                if (this.currentPanutoAudio) {
                    this.currentPanutoAudio.pause();
                    this.currentPanutoAudio.currentTime = 0;
                    this.currentPanutoAudio = null;
                }

                this.$nextTick(() => {
                    if (this.soundEnabled && this.isPanuto && this.current && this.current.audio) {
                        this.currentPanutoAudio = new Audio(this.current.audio);
                        this.currentPanutoAudio.play();
                    }
                });
            } else if (!this.confirmed) {
                if (['kasabihan', 'salawikain'].includes(this.current.type)) {
                    this.handleReadingPageNext();
                } else if (['input_kahulugan', 'comprehension'].includes(this.current.type)) {
                    this.handleTextInputConfirm();
                } else if (this.current.type === 'multiple_choice') {
                    this.handleMultipleChoiceConfirm();
                }
            } else {
                this.page++;
                this.reset();
                
                if (this.currentPanutoAudio) {
                    this.currentPanutoAudio.pause();
                    this.currentPanutoAudio.currentTime = 0;
                    this.currentPanutoAudio = null;
                }

                this.$nextTick(() => {
                    if (this.soundEnabled && this.isPanuto && this.current && this.current.audio) {
                        this.currentPanutoAudio = new Audio(this.current.audio);
                        this.currentPanutoAudio.play();
                    }
                });
            }
        },

        reset() {
            this.userInput = '';
            this.confirmed = false;
            this.recording = false;
            this.processing = false;
            this.transcription = '';
            this.audioChunks = [];
            this.selectedChoice = null;
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

            <!-- TYPE: READ SAWIKAIN -->
            <template x-if="current.type === 'read_sawikain'">
                <div class="flex-1 flex flex-col items-center gap-10">

                    <!-- Sawikain -->
                    <h1 class="text-5xl font-bold mt-10 !text-[#F4C300] text-center px-4"
                        x-text="current.sawikain"></h1>

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
                    <p class="w-96 text-lg text-center font-semibold" x-show="!confirmed">
                        Basahin nang malinaw ang sawikain sa itaas.
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

            <!-- TYPE: INPUT KAHULUGAN -->
            <template x-if="current.type === 'input_kahulugan'">
                <div class="flex-1 flex flex-col items-center gap-10">

                    <!-- Show the sawikain again -->
                    <h1 class="text-5xl font-bold mt-10 !text-[#F4C300] text-center px-4"
                        x-text="current.sawikain"></h1>

                    <!-- Instruction -->
                    <p class="w-96 text-lg text-center font-semibold">
                        Isulat sa patlang ang <span class="!text-[#F4C300]">kahulugan</span> ng sawikain na ito.
                    </p>

                    <!-- Input Field -->
                    <div class="w-full max-w-xl px-4">
                        <input 
                            type="text"
                            x-model="userInput"
                            :disabled="confirmed"
                            placeholder="Isulat ang kahulugan dito..."
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg text-lg focus:outline-none focus:border-[#F4C300] disabled:bg-gray-800 text-center"
                            @keyup.enter="userInput && !confirmed && next()">
                    </div>

                    <!-- Feedback -->
                    <div x-show="confirmed"
                         x-transition
                         class="mt-4 px-6 py-3 rounded-lg text-lg font-semibold"
                         :class="isCorrect ? 'bg-green-500 text-white' : 'bg-red-500 text-white'">
                        <span x-show="isCorrect">
                            <i class="fa-solid fa-check"></i> Tama! Ang kahulugan ay "<span x-text="current.answer"></span>"
                        </span>
                        <span x-show="!isCorrect">
                            <i class="fa-solid fa-x"></i> Mali. Ang tamang kahulugan ay "<b x-text="current.answer"></b>"
                        </span>
                    </div>

                </div>
            </template>

            <!-- TYPE: KASABIHAN PAGE -->
            <template x-if="current.type === 'kasabihan'">
                <div class="flex-1 flex flex-col items-center justify-center gap-10 w-full px-4">
                    
                    <h2 class="text-4xl font-bold !text-[#F4C300]">Basahin ang Kasabihan</h2>

                    <div class="max-w-3xl bg-gray-800 p-10 rounded-xl border-4 border-[#F4C300] shadow-2xl">
                        <p class="text-2xl leading-relaxed text-white text-center" x-text="current.kasabihan"></p>
                    </div>

                    <p class="text-lg text-center max-w-xl opacity-80">
                        Basahin nang mabuti ang kasabihan. Pagkatapos, sasagutin mo ang mga tanong tungkol dito.
                    </p>

                </div>
            </template>

            <!-- TYPE: SALAWIKAIN PAGE -->
            <template x-if="current.type === 'salawikain'">
                <div class="flex-1 flex flex-col items-center justify-center gap-10 w-full px-4">
                    
                    <h2 class="text-4xl font-bold !text-[#F4C300]">Basahin ang Salawikain</h2>

                    <div class="max-w-3xl bg-gray-800 p-10 rounded-xl border-4 border-[#F4C300] shadow-2xl">
                        <p class="text-2xl leading-relaxed text-white text-center" x-text="current.salawikain"></p>
                    </div>

                    <p class="text-lg text-center max-w-xl opacity-80">
                        Basahin nang mabuti ang salawikain. Pagkatapos, sasagutin mo ang mga tanong tungkol dito.
                    </p>

                </div>
            </template>

            <!-- TYPE: COMPREHENSION -->
            <template x-if="current.type === 'comprehension'">
                <div class="flex-1 flex flex-col items-center gap-10 mt-10 w-full px-4">

                    <!-- Question -->
                    <div class="max-w-2xl">
                        <h2 class="text-4xl font-bold !text-[#F4C300] mb-6 text-center"
                            x-text="current.tanong"></h2>
                    </div>

                    <!-- Feedback -->
                    <div x-show="confirmed"
                        x-transition
                        class="px-6 py-3 rounded-lg text-lg font-semibold"
                        :class="isCorrect ? 'bg-green-500 text-white' : 'bg-red-500 text-white'">
                        <span x-show="isCorrect">
                            <i class="fa-solid fa-check"></i> Tama!
                        </span>
                        <span x-show="!isCorrect">
                            <i class="fa-solid fa-x"></i> Mali.
                        </span>
                    </div>

                    <!-- Instruction -->
                    <p class="w-96 text-lg text-center">
                        Sagutin ang tanong sa pamamagitan ng pagsulat ng iyong sagot sa ibaba.
                    </p>

                    <!-- Input Field -->
                    <div class="w-full max-w-xl">
                        <input 
                            type="text"
                            x-model="userInput"
                            :disabled="confirmed"
                            placeholder="Isulat ang iyong sagot dito..."
                            class="w-full px-6 py-4 border-2 border-[#F4C300] rounded-lg text-xl focus:outline-none focus:ring-3 focus:ring-yellow-300 disabled:bg-gray-800"
                            @keyup.enter="!confirmed && userInput.trim() && next()">
                    </div>

                </div>
            </template>

            <!-- TYPE: MULTIPLE CHOICE -->
            <template x-if="current.type === 'multiple_choice'">
                <div class="flex-1 flex flex-col items-center gap-10 mt-10 w-full px-4">

                    <!-- Question -->
                    <div class="max-w-2xl">
                        <h2 class="text-3xl font-bold !text-[#F4C300] mb-6 text-center"
                            x-text="current.tanong"></h2>
                    </div>

                    <!-- Feedback -->
                    <div x-show="confirmed"
                        x-transition
                        class="px-6 py-3 rounded-lg text-lg font-semibold"
                        :class="isCorrect ? 'bg-green-500 text-white' : 'bg-red-500 text-white'">
                        <span x-show="isCorrect">
                            <i class="fa-solid fa-check"></i> Tama!
                        </span>
                        <span x-show="!isCorrect">
                            <i class="fa-solid fa-x"></i> Mali.
                        </span>
                    </div>

                    <!-- Choices -->
                    <div class="w-full max-w-xl space-y-3">
                        <template x-for="(choice, index) in current.choices" :key="index">
                            <button
                                @click="!confirmed && (selectedChoice = choice)"
                                :disabled="confirmed"
                                class="w-full px-6 py-4 border-2 rounded-lg text-lg font-medium transition-all disabled:cursor-not-allowed"
                                :class="{
                                    'border-[#F4C300] bg-[#F4C300] !text-black': selectedChoice === choice && !confirmed,
                                    'border-green-500 bg-green-500 text-white': confirmed && choice === current.answer,
                                    'border-red-500 bg-red-500 text-white': confirmed && selectedChoice === choice && choice !== current.answer,
                                    'border-gray-300 hover:border-[#F4C300]': selectedChoice !== choice && !confirmed,
                                    'border-gray-600 opacity-50': confirmed && choice !== current.answer && selectedChoice !== choice
                                }"
                                x-text="choice">
                            </button>
                        </template>
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
        <p x-show="!['kasabihan', 'salawikain'].includes(current.type)">
            <span x-text="page"></span>/<span x-text="questions.length"></span>
        </p>
        <p x-show="current.type === 'kasabihan'" class="text-sm opacity-70">Kasabihan</p>
        <p x-show="current.type === 'salawikain'" class="text-sm opacity-70">Salawikain</p>
        
        <div class="flex gap-3">
            <button 
                x-show="(['kasabihan', 'salawikain'].includes(current.type) && !confirmed) || (['input_kahulugan', 'comprehension'].includes(current.type) && userInput && !confirmed) || (current.type === 'multiple_choice' && selectedChoice && !confirmed) || confirmed" 
                @click="next" 
                :disabled="(['input_kahulugan', 'comprehension'].includes(current.type) && !userInput && !confirmed) || (current.type === 'multiple_choice' && !selectedChoice && !confirmed)"
                class="px-4 py-2 bg-[#F4C300] rounded-md font-bold whitespace-nowrap disabled:opacity-50 disabled:cursor-not-allowed">
                <span x-show="confirmed" class="!text-black">Susunod</span>
                <span x-show="['kasabihan', 'salawikain'].includes(current.type) && !confirmed" class="!text-black">Susunod</span>
                <span x-show="['input_kahulugan', 'comprehension'].includes(current.type) && userInput && !confirmed" class="!text-black">Kumpirmahin</span>
                <span x-show="current.type === 'multiple_choice' && selectedChoice && !confirmed" class="!text-black">Kumpirmahin</span>
                <i class="fa-solid fa-arrow-right !text-black"></i>
            </button>
        </div>
    </div>

</div>