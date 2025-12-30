<main 
    class="flex-1 pb-[50px]" 
    x-data="{ 
        page: @entangle('page'),
        currentAudio: null,
        currentAudioIndex: 0,
        audioQueue: [],
        soundEnabled: false,
        audios: @js($audios),
        
        // Prepare audio queue for current page
        prepareAudioQueue(page) {
            const audioData = this.audios[page];
            
            // If it's an array, use it as is
            if (Array.isArray(audioData)) {
                this.audioQueue = audioData;
            } 
            // If it's a string, wrap it in an array
            else if (audioData) {
                this.audioQueue = [audioData];
            } 
            // No audio for this page
            else {
                this.audioQueue = [];
            }
            
            this.currentAudioIndex = 0;
        },
        
        // Play audio from queue
        playNextAudio() {
            if (!this.soundEnabled || this.audioQueue.length === 0) return;
            
            // Stop current audio if playing
            if (this.currentAudio) {
                this.currentAudio.pause();
                this.currentAudio = null;
            }
            
            // Check if there are more audios to play
            if (this.currentAudioIndex < this.audioQueue.length) {
                const audioFile = this.audioQueue[this.currentAudioIndex];
                this.currentAudio = new Audio('{{ asset('') }}' + audioFile);
                
                // When audio ends, play next one automatically
                this.currentAudio.addEventListener('ended', () => {
                    this.currentAudioIndex++;
                    this.playNextAudio();
                });
                
                this.currentAudio.play().catch(err => {
                    console.error('Audio play error:', err);
                });
            }
        },
        
        // Handle page change
        handlePageChange() {
            if (!this.soundEnabled) return;
            
            // Stop any current audio
            if (this.currentAudio) {
                this.currentAudio.pause();
                this.currentAudio = null;
            }
            
            // Prepare and play new page audio
            this.prepareAudioQueue(this.page);
            this.playNextAudio();
        }
    }"
    x-init="$watch('page', () => handlePageChange())"
>

    <!-- Enable Sound Overlay -->
    <template x-if="!soundEnabled">
        <div class="absolute inset-0 bg-black/90 flex items-center justify-center z-50">
            <button 
                @click="soundEnabled = true; handlePageChange();" 
                class="px-6 py-3 bg-[#F4C300] !text-black font-bold rounded-lg text-lg shadow-lg"
            >
                <i class="fa-solid fa-volume-high !text-black"></i> I-enable ang Tunog
            </button>
        </div>
    </template>

    <div class="h-full flex items-center justify-center">
        
        @if ($lesson == 1)
            <!-- ========== LESSON 1 CONTENT ==========  -->
            
            @include('lessons.lesson1')

        @elseif ($lesson == 2)

            <!-- ========== LESSON 2 CONTENT ==========  -->
            @include('lessons.lesson2')
            
        @elseif ($lesson == 3)

            <!-- ========== LESSON 3 CONTENT ==========  -->
            @include('lessons.lesson3')
            
        @elseif ($lesson == 4)

            <!-- ========== LESSON 4 CONTENT ==========  -->
            @include('lessons.lesson4')
            
        @elseif ($lesson == 5)

            <!-- ========== LESSON 5 CONTENT ==========  -->
            @include('lessons.lesson5')
            
        @elseif ($lesson == 6)

            <!-- ========== LESSON 6 CONTENT ==========  -->
            @include('lessons.lesson6')
            
        @elseif ($lesson == 7)

            <!-- ========== LESSON 7 CONTENT ==========  -->
            @include('lessons.lesson7')
            
        @elseif ($lesson == 8)

            <!-- ========== LESSON 8 CONTENT ==========  -->
            @include('lessons.lesson8')
            
        @elseif ($lesson == 9)

            <!-- ========== LESSON 9 CONTENT ==========  -->
            @include('lessons.lesson9')
            
        @elseif ($lesson == 10)

            <!-- ========== LESSON 10 CONTENT ==========  -->
            @include('lessons.lesson10')
            
        @elseif ($lesson == 11)

            <!-- ========== LESSON 11 CONTENT ==========  -->
            @include('lessons.lesson11')
            
        @elseif ($lesson == 12)

            <!-- ========== LESSON 12 CONTENT ==========  -->
            @include('lessons.lesson12')
            
        @elseif ($lesson == 13)

            <!-- ========== LESSON 13 CONTENT ==========  -->
            @include('lessons.lesson13')
            
        @elseif ($lesson == 14)

            <!-- ========== LESSON 14 CONTENT ==========  -->
            @include('lessons.lesson14')
            
        @elseif ($lesson == 15)

            <!-- ========== LESSON 15 CONTENT ==========  -->
            @include('lessons.lesson15')
            
        @elseif ($lesson == 16)

            <!-- ========== LESSON 16 CONTENT ==========  -->
            @include('lessons.lesson16')
            
        @elseif ($lesson == 17)

            <!-- ========== LESSON 17 CONTENT ==========  -->
            @include('lessons.lesson17')
            
        @elseif ($lesson == 18)

            <!-- ========== LESSON 18 CONTENT ==========  -->
            @include('lessons.lesson18')
            
        @elseif ($lesson == 19)

            <!-- ========== LESSON 19 CONTENT ==========  -->
            @include('lessons.lesson19')
            
        @elseif ($lesson == 20)

            <!-- ========== LESSON 20 CONTENT ==========  -->
            @include('lessons.lesson20')
            
        @endif
        
    </div>
</main>