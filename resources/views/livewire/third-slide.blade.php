<main class="flex-1 pb-[50px]">
    <div class="lg:h-full lg:flex lg:items-center lg:justify-center">
        <div class="card flex flex-col items-center gap-5 relative text-lg">
            
            <!-- Title Section (Shared across all lessons) -->
            <div class="absolute -top-6 left-1/2 -translate-x-1/2 w-full max-w-xs sm:max-w-sm px-4">
                <div class="relative inline-block w-full">
                    <h1 class="relative z-10 bg-[#F4C300] px-8 sm:px-12 md:px-16 lg:px-20 py-1 !text-black text-sm sm:text-base md:text-lg lg:text-xl font-bold rounded-md border-2 border-[#31343A] text-center whitespace-nowrap">
                        PAGSASANAY
                    </h1>
                    <img class="absolute z-0 -left-4 sm:-left-5 md:-left-6 lg:-left-7 top-0 w-8 sm:w-10 md:w-12 lg:w-[55px]" src="{{asset('img/ribbon.png')}}" alt="">
                    <img class="absolute z-0 -right-4 sm:-right-5 md:-right-6 lg:-right-7 top-0 rotate-180 w-8 sm:w-10 md:w-12 lg:w-[55px]" src="{{asset('img/ribbon.png')}}" alt="">
                </div>
            </div>

            <!-- 
                PAGSASANAY GAME ENGINES & MECHANICS
                
                PAGSASANAY 1: Multiple Choice Audio
                - Mechanic: Click letter button to select answer
                - Question Type: mc_audio
                - Flow: Select → Confirm → Feedback → Score → Next
                - Recording: None
                - Lessons: 1
                
                PAGSASANAY 2: Image Recognition + Vowel Fill
                - Mechanic: Hold-to-record for images, Click vowel for blanks
                - Question Types: image_group_audio, fill_blank_audio
                - Flow: Select/Record → Auto-confirm (1.5s) → Feedback → Score → Next
                - Recording: Hold-to-record (mousedown/mouseup)
                - Lessons: 2
                
                PAGSASANAY 3: Reading Comprehension
                - Mechanic: Hold-to-record phrases/sentences, Type answers for comprehension
                - Question Types: read_phrase, read_sentence, comprehension
                - Flow: Record/Type → Auto-confirm (1.5s) → Feedback → Score → Next
                - Recording: Hold-to-record for reading, Text input for questions
                - Lessons: 3, 5
                
                PAGSASANAY 4: Syllable Building
                - Mechanic: Hold-to-record pronunciation of built words
                - Question Type: syllable_build
                - Flow: Record → Auto-confirm (1.5s) → Feedback → Score → Next
                - Recording: Hold-to-record
                - Lessons: 4
                
                PAGSASANAY 6: Syllable Building + Reading Combo
                - Mechanic: Type syllable answers, Hold-to-record readings, Type comprehension
                - Question Types: syllable_build, read_phrase, read_sentence, comprehension
                - Flow: Input/Record → Confirm → Feedback → Score → Next
                - Recording: Hold-to-record for reading, Text input for build/comprehension
                - Lessons: 6
                
                STATE FLOW (Unified Across All):
                Question Display → User Responds → Confirm → Show Feedback 
                → Increment Score (if correct) → User Clicks Next 
                → Reset State → Next Question or Results
                
                REUSE LOGIC: If a new lesson uses identical mechanics to existing pagsasanay,
                just add the data array and point to the existing component.
            -->

            <!-- Dynamic Lesson Content -->
            @if($lesson == 1)
                @include('pagsasanay.pagsasanay1', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 2)
                @include('pagsasanay.pagsasanay2', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 3)
                @include('pagsasanay.pagsasanay3', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 4)
                @include('pagsasanay.pagsasanay4', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 5)
                @include('pagsasanay.pagsasanay3', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 6)
                @include('pagsasanay.pagsasanay6', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 7)
                @include('pagsasanay.pagsasanay3', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 8)
                @include('pagsasanay.pagsasanay8', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 9)
                @include('pagsasanay.pagsasanay6', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 10)
                @include('pagsasanay.pagsasanay10', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 11)
                @include('pagsasanay.pagsasanay11', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 12)
                @include('pagsasanay.pagsasanay10', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 13)
                @include('pagsasanay.pagsasanay10', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 14)
                @include('pagsasanay.pagsasanay10', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 15)
                @include('pagsasanay.pagsasanay15', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 16)
                @include('pagsasanay.pagsasanay16', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 17)
                @include('pagsasanay.pagsasanay17', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 18)
                @include('pagsasanay.pagsasanay17', ['questions' => $this->lessonQuestions])    
            @elseif($lesson == 19)
                @include('pagsasanay.pagsasanay19', ['questions' => $this->lessonQuestions])
            @elseif($lesson == 20)
                @include('pagsasanay.pagsasanay20', ['questions' => $this->lessonQuestions])
            @endif

        </div>
    </div>
</main>