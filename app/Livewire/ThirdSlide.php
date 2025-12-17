<?php

namespace App\Livewire;

use Livewire\Component;

class ThirdSlide extends Component
{
    public $lesson;

    /**
     * Question bank per lesson
     * This mirrors how Slide 2 stores audio per page
     */
    protected $questions = [
        1 => [
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q1.mp3',
                'prompt' => 'Sa anong letra maririnig ang sumusunod na tunog?',
                'choices' => ['M', 'S', 'A', 'I', 'O'],
                'answer' => 'S',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q2.mp3',
                'prompt' => 'Anong letra ang iyong narinig?',
                'choices' => ['M', 'S', 'A', 'I', 'O'],
                'answer' => 'A',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q3.mp3',
                'prompt' => 'Pakinggan mabuti. Aling letra ang tumutunog?',
                'choices' => ['M', 'S', 'A', 'I', 'O'],
                'answer' => 'M',
            ],
        ],
        2 => [
            [
                'type' => 'image_group_audio',
                'prompt' => 'Tukuyin mo ang sumusunod na larawan.',
                'answer' => 'A',
                'images' => [
                    ['src' => 'illustrations/aso.jpg', 'label' => 'aso'],
                    ['src' => 'illustrations/araw.jpg', 'label' => 'araw'],
                    ['src' => 'illustrations/ahas.jpg', 'label' => 'ahas'],
                ],
            ],
            [
                'type' => 'image_group_audio',
                'prompt' => 'Tukuyin mo ang sumusunod na larawan.',
                'answer' => 'E',
                'images' => [
                    ['src' => 'illustrations/ekis.png', 'label' => 'ekis'],
                    ['src' => 'illustrations/espada.png', 'label' => 'espada'],
                    ['src' => 'illustrations/eroplano.png', 'label' => 'eroplano'],
                ],
            ],
            [
                'type' => 'image_group_audio',
                'prompt' => 'Tukuyin mo ang sumusunod na larawan.',
                'answer' => 'I',
                'images' => [
                    ['src' => 'illustrations/itlog.png', 'label' => 'itlog'],
                    ['src' => 'illustrations/ilong.png', 'label' => 'ilong'],
                    ['src' => 'illustrations/isa.png', 'label' => 'isa'],
                ],
            ],
            [
                'type' => 'image_group_audio',
                'prompt' => 'Tukuyin mo ang sumusunod na larawan.',
                'answer' => 'O',
                'images' => [
                    ['src' => 'illustrations/oso.png', 'label' => 'oso'],
                    ['src' => 'illustrations/ospital.png', 'label' => 'ospital'],
                    ['src' => 'illustrations/oregano.png', 'label' => 'oregano'],
                ],
            ],
            [
                'type' => 'image_group_audio',
                'prompt' => 'Tukuyin mo ang sumusunod na larawan.',
                'answer' => 'U',
                'images' => [
                    ['src' => 'illustrations/unan.png', 'label' => 'unan'],
                    ['src' => 'illustrations/ulan.png', 'label' => 'ulan'],
                    ['src' => 'illustrations/ube.png', 'label' => 'ube'],
                ],
            ],

            // ===== PART 2: Fill in the blank =====
            [
                'type' => 'fill_blank_audio',
                'word' => '_bas',
                'answer' => 'U',
                'image' => 'illustrations/ubas.png',
            ],
            [
                'type' => 'fill_blank_audio',
                'word' => '_lepante',
                'answer' => 'E',
                'image' => 'illustrations/elepante.png',
            ],
            [
                'type' => 'fill_blank_audio',
                'word' => '_poy',
                'answer' => 'A',
                'image' => 'illustrations/apoy.png',
            ],
            [
                'type' => 'fill_blank_audio',
                'word' => '_law',
                'answer' => 'I',
                'image' => 'illustrations/ilaw.png',
            ],
            [
                'type' => 'fill_blank_audio',
                'word' => '_kra',
                'answer' => 'O',
                'image' => 'illustrations/okra.png',
            ],
            [
                'type' => 'fill_blank_audio',
                'word' => '_rasan',
                'answer' => 'O',
                'image' => 'illustrations/orasan.png',
            ],
            [
                'type' => 'fill_blank_audio',
                'word' => '_po',
                'answer' => 'U',
                'image' => 'illustrations/upong.png',
            ],
            [
                'type' => 'fill_blank_audio',
                'word' => '_bon',
                'answer' => 'I',
                'image' => 'illustrations/ibon.png',
            ],
            [
                'type' => 'fill_blank_audio',
                'word' => '_sda',
                'answer' => 'I',
                'image' => 'illustrations/isda.png',
            ],
            [
                'type' => 'fill_blank_audio',
                'word' => '_tis',
                'answer' => 'A',
                'image' => 'illustrations/atis.png',
            ],
        ]
    ];

    public function mount($lesson)
    {
        $this->lesson = $lesson;
    }

    public function getLessonQuestionsProperty()
    {
        return $this->questions[$this->lesson] ?? [];
    }

    public function render()
    {
        return view('livewire.third-slide');
    }
}