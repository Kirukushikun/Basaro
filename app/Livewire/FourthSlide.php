<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FourthSlide extends Component
{   
    public $lesson;

    public $questions = [
        1 => [
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q1.mp3',
                'prompt' => 'Sa anong letra maririnig ang sumusunod na tunog?',
                'choices' => ['S', 'M', 'E', 'T', 'A'],
                'answer' => 'S',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q2.mp3',
                'prompt' => 'Anong letra ang iyong narinig?',
                'choices' => ['M', 'A', 'P', 'D', 'O'],
                'answer' => 'M',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q3.mp3',
                'prompt' => 'Pakinggan mabuti. Aling letra ang tumutunog?',
                'choices' => ['E', 'I', 'U', 'B', 'G'],
                'answer' => 'E',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q4.mp3',
                'prompt' => 'Sa anong letra ang tunog na narinig mo?',
                'choices' => ['T', 'L', 'W', 'N', 'S'],
                'answer' => 'T',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q5.mp3',
                'prompt' => 'Anong letra ang narinig?',
                'choices' => ['A', 'E', 'I', 'O', 'U'],
                'answer' => 'A',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q6.mp3',
                'prompt' => 'Piliin ang tamang letra.',
                'choices' => ['P', 'B', 'D', 'G', 'M'],
                'answer' => 'P',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q7.mp3',
                'prompt' => 'Anong letra ang tumunog?',
                'choices' => ['D', 'T', 'P', 'B', 'N'],
                'answer' => 'D',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q8.mp3',
                'prompt' => 'Makinig at piliin ang letra.',
                'choices' => ['O', 'A', 'E', 'I', 'U'],
                'answer' => 'O',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q9.mp3',
                'prompt' => 'Aling letra ang iyong narinig?',
                'choices' => ['L', 'W', 'M', 'N', 'S'],
                'answer' => 'L',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q10.mp3',
                'prompt' => 'Pakinggan ang tunog at pumili.',
                'choices' => ['W', 'L', 'M', 'N', 'T'],
                'answer' => 'W',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q11.mp3',
                'prompt' => 'Anong letra ang narinig mo?',
                'choices' => ['I', 'A', 'E', 'O', 'U'],
                'answer' => 'I',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q12.mp3',
                'prompt' => 'Piliin ang tamang letra.',
                'choices' => ['B', 'P', 'D', 'G', 'M'],
                'answer' => 'B',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q13.mp3',
                'prompt' => 'Anong letra ang tumunog?',
                'choices' => ['U', 'A', 'E', 'I', 'O'],
                'answer' => 'U',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q14.mp3',
                'prompt' => 'Makinig mabuti at piliin.',
                'choices' => ['G', 'B', 'D', 'P', 'M'],
                'answer' => 'G',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q15.mp3',
                'prompt' => 'Sa anong letra ang tunog?',
                'choices' => ['N', 'M', 'L', 'W', 'S'],
                'answer' => 'N',
            ],
        ],

        2 => [
            [
                'type' => 'patinig_identification',
                'patinig' => 'A',
                'answer' => 'Ah',
            ],
            [
                'type' => 'patinig_identification',
                'patinig' => 'E',
                'answer' => 'Eh',
            ],
            [
                'type' => 'patinig_identification',
                'patinig' => 'I',
                'answer' => 'Ih',
            ],
            [
                'type' => 'patinig_identification',
                'patinig' => 'O',
                'answer' => 'Oh',
            ],
            [
                'type' => 'patinig_identification',
                'patinig' => 'U',
                'answer' => 'Uh',
            ],

            [
                'type' => 'image_identification',
                'image' => 'illustrations/aso.png',
                'answer' => 'A',
            ],
            [
                'type' => 'image_identification',
                'image' => 'illustrations/usa.png',
                'answer' => 'U',
            ],
            [
                'type' => 'image_identification',
                'image' => 'illustrations/elesi.png',
                'answer' => 'E',
            ],
            [
                'type' => 'image_identification',
                'image' => 'illustrations/ilong.png',
                'answer' => 'I',
            ],
            [
                'type' => 'image_identification',
                'image' => 'illustrations/oso.png',
                'answer' => 'O',
            ],
        ],

        3 => [
            ['kataga' => 'Ang'],
            ['kataga' => 'Si'],
            ['kataga' => 'Ay'],
            ['kataga' => 'Ng'],
            ['kataga' => 'Mga'],
            ['kataga' => 'At'],
            ['kataga' => 'Na'],
            ['kataga' => 'Kay'],
            ['kataga' => 'Ni'],
            ['kataga' => 'Mas'],
        ],
    ];

    public function mount($lesson)
    {
        $this->lesson = $lesson;
    }

    public function getLessonQuestionsProperty()
    {
        return $this->questions[$this->lesson] ?? [];
    }

    public function getStoryProperty()
    {
        $stories = [
            8 => 'May mga luya sa lamesa. Kay Tiya Sela ang mga luya. Isasama niya ang mga ito sa tinola. Tinola ang uulamin nila mamaya.',
        ];

        return $stories[$this->lesson] ?? '';
    }

    public function completePagtataya()
    {
        $user = Auth::user();
        
        if ($user) {
            // Only update if this is forward progress
            if ($user->current_progress < 100) {
                $user->update([
                    'current_progress' => 100, // Completed discussion slide
                ]);
            }
        }
    }
    
    public function render()
    {
        return view('livewire.fourth-slide');
    }
}
