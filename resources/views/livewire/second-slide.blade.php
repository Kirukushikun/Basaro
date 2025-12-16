<main 
    class="flex-1 pb-[50px]" 
    x-data="{ 
        page: @entangle('page'),
        audio: null,
        soundEnabled: false,
        audios: @js($audios), // All audios passed from backend
        
        playAudio(page) {
            if (!this.soundEnabled) return;
            if (this.audio) this.audio.pause();
            
            const audioFile = this.audios[page];
            if (audioFile) {
                this.audio = new Audio('{{ asset('') }}' + audioFile);
                this.audio.play();
            }
        },
        
        handleAudio() {
            if (!this.soundEnabled) return;
            this.playAudio(this.page);
        }
    }"
    x-init="$watch('page', () => handleAudio())"
>

    <!-- Enable Sound Overlay -->
    <template x-if="!soundEnabled">
        <div class="absolute inset-0 bg-black/90 flex items-center justify-center z-50">
            <button 
                @click="soundEnabled = true; handleAudio();" 
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
            
        @endif
        
    </div>
</main>