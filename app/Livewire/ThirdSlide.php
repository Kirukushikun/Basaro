<?php

namespace App\Livewire;

use Livewire\Component;

class ThirdSlide extends Component
{
    public $lesson;

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
        ],

        3 => [
            ['kataga' => 'si'],
            ['kataga' => 'ang'],
            ['kataga' => 'kay'],
            ['kataga' => 'ay'],
            ['kataga' => 'mga'],
            ['kataga' => 'ng'],
            ['kataga' => 'mo'],
            ['kataga' => 'mas'],
            ['kataga' => 'at'],
            ['kataga' => 'na'],
            ['kataga' => 'may'],
            ['kataga' => 'sila'],
            ['kataga' => 'ni'],
            ['kataga' => 'kina'],
            ['kataga' => 'sina'],
        ],

        4 => [
            [
                'syllables' => ['A', 'sa'],
                'answer' => 'asa',
            ],
            [
                'syllables' => ['Ma', 'sa'],
                'answer' => 'masa',
            ],
            [
                'syllables' => ['A', 'a', 'sa'],
                'answer' => 'aasa',
            ],
            [
                'syllables' => ['Sa', 'ma'],
                'answer' => 'sama',
            ],
            [
                'syllables' => ['Ma', 'ma'],
                'answer' => 'mama',
            ],
            [
                'syllables' => ['Sa', 'sa', 'ma'],
                'answer' => 'sasama',
            ],
            [
                'syllables' => ['Ma', 'sa', 'ma'],
                'answer' => 'masama',
            ],
        ],

        5 => [
            ['type' => 'read_phrase', 'kataga' => 'Sama-sama'],
            ['type' => 'read_phrase', 'kataga' => 'sasama'],
            ['type' => 'read_phrase', 'kataga' => 'aasa ang Mama'],
            ['type' => 'read_phrase', 'kataga' => 'ang mga mama'],
            ['type' => 'read_phrase', 'kataga' => 'Ang Mama'],
            ['type' => 'read_phrase', 'kataga' => 'sa ama'],
            ['type' => 'read_phrase', 'kataga' => 'ang sama'],
            ['type' => 'read_phrase', 'kataga' => 'kay ama'],
            ['type' => 'read_phrase', 'kataga' => 'ng mama'],
            ['type' => 'read_sentence', 'text' => 'Sama-sama ang mga mama.'],
            ['type' => 'read_sentence', 'text' => 'Sasama si Mama kay ama.'],
            ['type' => 'read_sentence', 'text' => 'Aasa ang mama sa ama.'],
            ['type' => 'read_sentence', 'text' => 'Masama ang mama.'],
            ['type' => 'read_sentence', 'text' => 'Masasama kay ama ang mama.'],
            ['type' => 'comprehension', 'question' => 'Sino ang sama-sama?', 'answer' => 'ang mga mama'],
            ['type' => 'comprehension', 'question' => 'Sino ang sasama kay ama?', 'answer' => 'si Mama'],
            ['type' => 'comprehension', 'question' => 'Kanino aasa ang mama?', 'answer' => 'sa ama'],
            ['type' => 'comprehension', 'question' => 'Sino ang masama?', 'answer' => 'ang mama'],
            ['type' => 'comprehension', 'question' => 'Sino ang masasama kay ama?', 'answer' => 'ang mama'],
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

    public function render()
    {
        return view('livewire.third-slide');
    }
}