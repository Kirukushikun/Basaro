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

        4 => [
            ['kataga' => 'Am'],
            ['kataga' => 'A'],
            ['kataga' => 'As'],
            ['kataga' => 'Mas'],
            ['kataga' => 'Sa'],
            ['kataga' => 'Ma'],
            ['kataga' => 'Sam'],

            ['kataga' => 'Masa'],
            ['kataga' => 'Ama'],
            ['kataga' => 'Asa'],
            ['kataga' => 'Mama'],
            ['kataga' => 'Aama'],
            ['kataga' => 'Sasama'],
            ['kataga' => 'Aasa'],
            ['kataga' => 'Masama'],
        ],

        5 => [
            ['type' => 'read_phrase', 'parirala' => 'sama-sama'],
            ['type' => 'read_phrase', 'parirala' => 'sasama'],
            ['type' => 'read_phrase', 'parirala' => 'aasa ang Mama'],
            ['type' => 'read_phrase', 'parirala' => 'ang mga mama'],
            ['type' => 'read_phrase', 'parirala' => 'ang Mama'],
            ['type' => 'read_phrase', 'parirala' => 'sa Ama'],
            ['type' => 'read_phrase', 'parirala' => 'ang sama'],
            ['type' => 'read_phrase', 'parirala' => 'kay Ama'],
            ['type' => 'read_phrase', 'parirala' => 'ng Mama'],
            ['type' => 'read_sentence', 'pangungusap' => 'Sama-sama ang mga mama.'],
            ['type' => 'comprehension', 'tanong' => 'Sino ang sama-sama?', 'answer' => 'ang mga mama'],
            ['type' => 'read_sentence', 'pangungusap' => 'Sasama si Mama kay Ama.'],
            ['type' => 'comprehension', 'tanong' => 'Sino ang sasama kay Ama?', 'answer' => 'si Mama'],
            ['type' => 'read_sentence', 'pangungusap' => 'Aasa ang Mama sa Ama.'],
            ['type' => 'comprehension', 'tanong' => 'Kanino aasa ang Mama?', 'answer' => 'sa Ama'],
            ['type' => 'read_sentence', 'pangungusap' => 'Masama ang mama.'],
            ['type' => 'comprehension', 'tanong' => 'Sino ang masama?', 'answer' => 'ang mama'],
            ['type' => 'read_sentence', 'pangungusap' => 'Masasama kay Ama ang mama.'],
            ['type' => 'comprehension', 'tanong' => 'Sino ang masasama kay Ama?', 'answer' => 'ang mama'],
        ],
        6 => [
            ['type' => 'read_phrase', 'parirala' => 'masiba'],
            ['type' => 'read_phrase', 'parirala' => 'mabisa'],
            ['type' => 'read_phrase', 'parirala' => 'bomba'],
            ['type' => 'read_phrase', 'parirala' => 'ibaba'],
            ['type' => 'read_phrase', 'parirala' => 'abo'],
            ['type' => 'read_phrase', 'parirala' => 'sa iba'],
            ['type' => 'read_phrase', 'parirala' => 'may misa'],
            ['type' => 'read_phrase', 'parirala' => 'abo sa baso'],
            ['type' => 'read_sentence', 'pangungusap' => 'Ang baba ni Sam ay basa.'],
            ['type' => 'comprehension', 'tanong' => 'Ano ang basa kay Sam?', 'answer' => 'Ang baba'],
            ['type' => 'read_sentence', 'pangungusap' => 'Bibo si Bombi.'],
            ['type' => 'comprehension', 'tanong' => 'Sino ang bibo?', 'answer' => 'si Bombi'],
        ],
    
        7 => [
            ['type' => 'read_sentence', 'pangungusap' => 'Ang aso ay tumatahol.'],
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang ginagawa ng aso?', 'choices' => ['Tumatahol', 'Tumatagal', 'Tumakbo', 'Kumakain'], 'answer' => 'Tumatahol'],
            
            ['type' => 'read_sentence', 'pangungusap' => 'Si Maria ay bumili ng saging.'],
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang binili ni Maria?', 'choices' => ['Mansanas', 'Saging', 'Dalandan', 'Ubas'], 'answer' => 'Saging'],
            
            ['type' => 'read_sentence', 'pangungusap' => 'Masaya ang mga bata sa palaruan.'],
            ['type' => 'multiple_choice', 'tanong' => 'Saan masaya ang mga bata?', 'choices' => ['Sa bahay', 'Sa paaralan', 'Sa palaruan', 'Sa tindahan'], 'answer' => 'Sa palaruan'],
            
            ['type' => 'read_sentence', 'pangungusap' => 'Kumakain ng gulay si Juan.'],
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang kinakain ni Juan?', 'choices' => ['Prutas', 'Gulay', 'Karne', 'Tinapay'], 'answer' => 'Gulay'],
            
            ['type' => 'read_sentence', 'pangungusap' => 'Ang bulaklak ay mabango at maganda.'],
            ['type' => 'multiple_choice', 'tanong' => 'Paano inilarawan ang bulaklak?', 'choices' => ['Malaki at maliit', 'Mabango at maganda', 'Masarap at matamis', 'Malamig at mainit'], 'answer' => 'Mabango at maganda'],
        ],

        8 => [
            ['tanong' => 'Sino-sino ang sama-sama?', 'answer' => 'lea leo at bea'],
            ['tanong' => 'Nasaan sila?', 'answer' => 'kusina'],
            ['tanong' => 'Sa ano abala si Bea?', 'answer' => 'sayote'],
            ['tanong' => 'Kailan sila kakain nang masaya?', 'answer' => 'mamaya'],
        ],

        9 => [
            ['type' => 'read_sentence', 'pangungusap' => 'Ang mga kalabaw ay kay Bino.'],
            ['type' => 'comprehension', 'tanong' => 'Kanino ang mga kalabaw?', 'answer' => 'bino'],

            ['type' => 'read_sentence', 'pangungusap' => 'Masiba ang tigre na namamaga ang mata.'],
            ['type' => 'comprehension', 'tanong' => 'Ano ang masiba?', 'answer' => 'tigre'],
            ['type' => 'comprehension', 'tanong' => 'Ano ang namamaga sa tigre?', 'answer' => 'mata'],

            ['type' => 'read_sentence', 'pangungusap' => 'Sagana sila sa mga prutas at gulay.'],
            ['type' => 'comprehension', 'tanong' => 'Sa ano sila sagana?', 'answer' => 'gulay'],

            ['type' => 'read_sentence', 'pangungusap' => 'Nakangiti ang dalaga sa mga tao.'],
            ['type' => 'comprehension', 'tanong' => 'Sino ang nakangiti sa mga tao?', 'answer' => 'dalaga'],
            
            ['type' => 'read_sentence', 'pangungusap' => 'Kawawa ang kabayo na nadapa.'],
            ['type' => 'comprehension', 'tanong' => 'Napano ang kabayo?', 'answer' => 'nadapa'],
        ],

        10 => [
            ['kataga' => 'Haligi'],
            ['kataga' => 'Lahi'],
            ['kataga' => 'Guro'],
            ['kataga' => 'Sakuna'],
            ['kataga' => 'Ligaya'],
            ['kataga' => 'Diwa'],
            ['kataga' => 'Pera'],

            ['kataga' => 'Malayo'],
            ['kataga' => 'Banga'],
            ['kataga' => 'Maya'],
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
            8 => 'Sama-sama sa kusina sina Lea, Leo at Bea. Iluluto nila ang manok. Ititinola nila ito. Binabalatan nina Leo at Lea ang luya. Samantala, si Bea ay abala naman sa mga sayote. Mamaya ay kakain sila nang masaya.',
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
