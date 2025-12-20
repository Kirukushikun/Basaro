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

        6 => [
            // Part 1: Syllable Building
            ['type' => 'syllable_build', 'syllables' => ['Ba', 'so'], 'answer' => 'baso'],
            ['type' => 'syllable_build', 'syllables' => ['ba', 'sa'], 'answer' => 'basa'],
            // ... more syllables ...
            
            // Part 2: Read Phrases
            ['type' => 'read_phrase', 'text' => 'iba ang abo'],
            ['type' => 'read_phrase', 'text' => 'ang mga baso'],
            // ... more phrases ...
            
            // Part 3: Read Sentences
            ['type' => 'read_sentence', 'text' => 'Ang mga bao ay basa.'],
            ['type' => 'read_sentence', 'text' => 'Bababa si Sam.'],
            // ... more sentences ...
            
            // Part 4: Comprehension
            ['type' => 'comprehension', 'question' => 'Sino ang bababa?', 'answer' => 'si Sam'],
            ['type' => 'comprehension', 'question' => 'Ano ang mga masisiba?', 'answer' => 'ang mga oso'],
            // ... more questions ...
        ],

        7 => [
            ['type' => 'read_phrase', 'kataga' => 'Kalaro'],
            ['type' => 'read_phrase', 'kataga' => 'Masaya'],
            ['type' => 'read_phrase', 'kataga' => 'Kalabasa'],
            ['type' => 'read_phrase', 'kataga' => 'katutubo'],
            ['type' => 'read_phrase', 'kataga' => 'ninuno'],
            ['type' => 'read_phrase', 'kataga' => 'mata ng ibon'],
            ['type' => 'read_phrase', 'kataga' => 'yoyo sa tabo'],
            ['type' => 'read_phrase', 'kataga' => 'bola sa ilalim ng kama'],
            ['type' => 'read_phrase', 'kataga' => 'ang mga ubas'],
            ['type' => 'read_phrase', 'kataga' => 'lobo sa mesa'],
            ['type' => 'read_phrase', 'kataga' => 'luya ni yaya'],
            ['type' => 'read_phrase', 'kataga' => 'butas na bota'],
            ['type' => 'read_phrase', 'kataga' => 'yema ng bata'],
        ], 
        
        8 => [
            [
                'question' => 'Kanino ang mga luya?',
                'answer' => 'kay Tiya Sela',
                'choices' => ['mamaya', 'kay Tiya Sela', 'sa lamesa', 'tinola'],
            ],
            [
                'question' => 'Nasaan ang mga luya?',
                'answer' => 'sa lamesa',
                'choices' => ['mamaya', 'kay Tiya Sela', 'sa lamesa', 'tinola'],
            ],
            [
                'question' => 'Ano ang uulamin nila?',
                'answer' => 'tinola',
                'choices' => ['mamaya', 'kay Tiya Sela', 'sa lamesa', 'tinola'],
            ],
            [
                'question' => 'Kailan nila ito uulamin?',
                'answer' => 'mamaya',
                'choices' => ['mamaya', 'kay Tiya Sela', 'sa lamesa', 'tinola'],
            ],
        ],

        9 => [
            // Part 1: Syllable Building (6 questions)
            ['type' => 'syllable_build', 'syllables' => ['Ma', 'wa', 'wa', 'la'], 'answer' => 'mawawala'],
            ['type' => 'syllable_build', 'syllables' => ['Du', 'ma', 'ra', 'an'], 'answer' => 'dumaraan'],
            ['type' => 'syllable_build', 'syllables' => ['Pe', 'ra'], 'answer' => 'pera'],
            ['type' => 'syllable_build', 'syllables' => ['Wa', 'gay', 'way'], 'answer' => 'wagayway'],
            ['type' => 'syllable_build', 'syllables' => ['Na', 'hi', 'hi', 'ya'], 'answer' => 'nahihiya'],
            ['type' => 'syllable_build', 'syllables' => ['Ha', 'ba', 'gat'], 'answer' => 'habagat'],
            
            // Part 2: Read Phrases (8 questions)
            ['type' => 'read_phrase', 'text' => 'Ang sinigang'],
            ['type' => 'read_phrase', 'text' => 'Dahil mabaho'],
            ['type' => 'read_phrase', 'text' => 'Walang pera'],
            ['type' => 'read_phrase', 'text' => 'ang kalabaw at palaka'],
            ['type' => 'read_phrase', 'text' => 'sawali at ipa'],
            ['type' => 'read_phrase', 'text' => 'sagana at mapayapa'],
            ['type' => 'read_phrase', 'text' => 'Si Lino'],
            ['type' => 'read_phrase', 'text' => 'Ang masiba'],
        ],  

        10 => [
            ['type' => 'fill_syllable', 'word' => 'Kale__', 'answer' => 'sa', 'image' => 'illustrations/kalesa.png', 'full_word' => 'Kalesa'],
            ['type' => 'fill_syllable', 'word' => 'Ye__', 'answer' => 'ma', 'image' => 'illustrations/yema.png', 'full_word' => 'Yema'],
            ['type' => 'fill_syllable', 'word' => 'Gi__ra', 'answer' => 'ta', 'image' => 'illustrations/gitara.png', 'full_word' => 'Gitara'],
            ['type' => 'fill_syllable', 'word' => 'Si__', 'answer' => 'li', 'image' => 'illustrations/sili.png', 'full_word' => 'Sili'],
            ['type' => 'fill_syllable', 'word' => '__nika', 'answer' => 'ma', 'image' => 'illustrations/manika.png', 'full_word' => 'Manika'],
        ],

        11 => [
            // Part 1: Synonym Matching
            [
                'type' => 'synonym_match',
                'word' => 'Dukha',
                'answer' => 'D',
                'choices' => [
                    ['letter' => 'A', 'meaning' => 'lungkot'],
                    ['letter' => 'B', 'meaning' => 'gusto'],
                    ['letter' => 'C', 'meaning' => 'natigil'],
                    ['letter' => 'D', 'meaning' => 'mahirap'],
                    ['letter' => 'E', 'meaning' => 'kaibigan'],
                    ['letter' => 'F', 'meaning' => 'tuwa'],
                    ['letter' => 'G', 'meaning' => 'salungat'],
                    ['letter' => 'H', 'meaning' => 'alaga'],
                    ['letter' => 'I', 'meaning' => 'sinungaling'],
                    ['letter' => 'J', 'meaning' => 'alam'],
                ],
            ],
            [
                'type' => 'synonym_match',
                'word' => 'Ibig',
                'answer' => 'B',
                'choices' => [
                    ['letter' => 'A', 'meaning' => 'lungkot'],
                    ['letter' => 'B', 'meaning' => 'gusto'],
                    ['letter' => 'C', 'meaning' => 'natigil'],
                    ['letter' => 'D', 'meaning' => 'mahirap'],
                    ['letter' => 'E', 'meaning' => 'kaibigan'],
                    ['letter' => 'F', 'meaning' => 'tuwa'],
                    ['letter' => 'G', 'meaning' => 'salungat'],
                    ['letter' => 'H', 'meaning' => 'alaga'],
                    ['letter' => 'I', 'meaning' => 'sinungaling'],
                    ['letter' => 'J', 'meaning' => 'alam'],
                ],
            ],
            [
                'type' => 'synonym_match',
                'word' => 'Batid',
                'answer' => 'J',
                'choices' => [
                    ['letter' => 'A', 'meaning' => 'lungkot'],
                    ['letter' => 'B', 'meaning' => 'gusto'],
                    ['letter' => 'C', 'meaning' => 'natigil'],
                    ['letter' => 'D', 'meaning' => 'mahirap'],
                    ['letter' => 'E', 'meaning' => 'kaibigan'],
                    ['letter' => 'F', 'meaning' => 'tuwa'],
                    ['letter' => 'G', 'meaning' => 'salungat'],
                    ['letter' => 'H', 'meaning' => 'alaga'],
                    ['letter' => 'I', 'meaning' => 'sinungaling'],
                    ['letter' => 'J', 'meaning' => 'alam'],
                ],
            ],
            [
                'type' => 'synonym_match',
                'word' => 'Panglaw',
                'answer' => 'A',
                'choices' => [
                    ['letter' => 'A', 'meaning' => 'lungkot'],
                    ['letter' => 'B', 'meaning' => 'gusto'],
                    ['letter' => 'C', 'meaning' => 'natigil'],
                    ['letter' => 'D', 'meaning' => 'mahirap'],
                    ['letter' => 'E', 'meaning' => 'kaibigan'],
                    ['letter' => 'F', 'meaning' => 'tuwa'],
                    ['letter' => 'G', 'meaning' => 'salungat'],
                    ['letter' => 'H', 'meaning' => 'alaga'],
                    ['letter' => 'I', 'meaning' => 'sinungaling'],
                    ['letter' => 'J', 'meaning' => 'alam'],
                ],
            ],
            [
                'type' => 'synonym_match',
                'word' => 'Kalinga',
                'answer' => 'H',
                'choices' => [
                    ['letter' => 'A', 'meaning' => 'lungkot'],
                    ['letter' => 'B', 'meaning' => 'gusto'],
                    ['letter' => 'C', 'meaning' => 'natigil'],
                    ['letter' => 'D', 'meaning' => 'mahirap'],
                    ['letter' => 'E', 'meaning' => 'kaibigan'],
                    ['letter' => 'F', 'meaning' => 'tuwa'],
                    ['letter' => 'G', 'meaning' => 'salungat'],
                    ['letter' => 'H', 'meaning' => 'alaga'],
                    ['letter' => 'I', 'meaning' => 'sinungaling'],
                    ['letter' => 'J', 'meaning' => 'alam'],
                ],
            ],
            [
                'type' => 'synonym_match',
                'word' => 'Katoto',
                'answer' => 'E',
                'choices' => [
                    ['letter' => 'A', 'meaning' => 'lungkot'],
                    ['letter' => 'B', 'meaning' => 'gusto'],
                    ['letter' => 'C', 'meaning' => 'natigil'],
                    ['letter' => 'D', 'meaning' => 'mahirap'],
                    ['letter' => 'E', 'meaning' => 'kaibigan'],
                    ['letter' => 'F', 'meaning' => 'tuwa'],
                    ['letter' => 'G', 'meaning' => 'salungat'],
                    ['letter' => 'H', 'meaning' => 'alaga'],
                    ['letter' => 'I', 'meaning' => 'sinungaling'],
                    ['letter' => 'J', 'meaning' => 'alam'],
                ],
            ],
            [
                'type' => 'synonym_match',
                'word' => 'Bulaan',
                'answer' => 'I',
                'choices' => [
                    ['letter' => 'A', 'meaning' => 'lungkot'],
                    ['letter' => 'B', 'meaning' => 'gusto'],
                    ['letter' => 'C', 'meaning' => 'natigil'],
                    ['letter' => 'D', 'meaning' => 'mahirap'],
                    ['letter' => 'E', 'meaning' => 'kaibigan'],
                    ['letter' => 'F', 'meaning' => 'tuwa'],
                    ['letter' => 'G', 'meaning' => 'salungat'],
                    ['letter' => 'H', 'meaning' => 'alaga'],
                    ['letter' => 'I', 'meaning' => 'sinungaling'],
                    ['letter' => 'J', 'meaning' => 'alam'],
                ],
            ],
            [
                'type' => 'synonym_match',
                'word' => 'Galak',
                'answer' => 'F',
                'choices' => [
                    ['letter' => 'A', 'meaning' => 'lungkot'],
                    ['letter' => 'B', 'meaning' => 'gusto'],
                    ['letter' => 'C', 'meaning' => 'natigil'],
                    ['letter' => 'D', 'meaning' => 'mahirap'],
                    ['letter' => 'E', 'meaning' => 'kaibigan'],
                    ['letter' => 'F', 'meaning' => 'tuwa'],
                    ['letter' => 'G', 'meaning' => 'salungat'],
                    ['letter' => 'H', 'meaning' => 'alaga'],
                    ['letter' => 'I', 'meaning' => 'sinungaling'],
                    ['letter' => 'J', 'meaning' => 'alam'],
                ],
            ],
            [
                'type' => 'synonym_match',
                'word' => 'Taliwas',
                'answer' => 'G',
                'choices' => [
                    ['letter' => 'A', 'meaning' => 'lungkot'],
                    ['letter' => 'B', 'meaning' => 'gusto'],
                    ['letter' => 'C', 'meaning' => 'natigil'],
                    ['letter' => 'D', 'meaning' => 'mahirap'],
                    ['letter' => 'E', 'meaning' => 'kaibigan'],
                    ['letter' => 'F', 'meaning' => 'tuwa'],
                    ['letter' => 'G', 'meaning' => 'salungat'],
                    ['letter' => 'H', 'meaning' => 'alaga'],
                    ['letter' => 'I', 'meaning' => 'sinungaling'],
                    ['letter' => 'J', 'meaning' => 'alam'],
                ],
            ],
            [
                'type' => 'synonym_match',
                'word' => 'Nauntol',
                'answer' => 'C',
                'choices' => [
                    ['letter' => 'A', 'meaning' => 'lungkot'],
                    ['letter' => 'B', 'meaning' => 'gusto'],
                    ['letter' => 'C', 'meaning' => 'natigil'],
                    ['letter' => 'D', 'meaning' => 'mahirap'],
                    ['letter' => 'E', 'meaning' => 'kaibigan'],
                    ['letter' => 'F', 'meaning' => 'tuwa'],
                    ['letter' => 'G', 'meaning' => 'salungat'],
                    ['letter' => 'H', 'meaning' => 'alaga'],
                    ['letter' => 'I', 'meaning' => 'sinungaling'],
                    ['letter' => 'J', 'meaning' => 'alam'],
                ],
            ],
            
            // Part 2: Antonym Selection
            [
                'type' => 'antonym_select',
                'word' => 'Kaibigan',
                'answer' => 'kaaway',
                'choices' => ['kapatid', 'kaaway', 'kasangga'],
            ],
            [
                'type' => 'antonym_select',
                'word' => 'Kaibig-ibig',
                'answer' => 'kasuklam-suklam',
                'choices' => ['kasuklam-suklam', 'katanggap-tanggap', 'kaaliw-aliw'],
            ],
            [
                'type' => 'antonym_select',
                'word' => 'Masunurin',
                'answer' => 'suwail',
                'choices' => ['suwail', 'mabait', 'mapagpakumbaba'],
            ],
            [
                'type' => 'antonym_select',
                'word' => 'Malamig',
                'answer' => 'mainit',
                'choices' => ['mahalumigmig', 'presko', 'mainit'],
            ],
            [
                'type' => 'antonym_select',
                'word' => 'Mabilis',
                'answer' => 'mabagal',
                'choices' => ['mabagal', 'matulin', 'humahagibis'],
            ],
        ],

        12 => [
            [
                'word' => 'bah__',
                'full_word' => 'bahay',
                'answer' => 'ay',
                'image' => 'illustrations/bahay.png',
            ],
            [
                'word' => 'kah__',
                'full_word' => 'kahaw',
                'answer' => 'aw',
                'image' => 'illustrations/kahaw.png',
            ],
            [
                'word' => 'kas__',
                'full_word' => 'kasiw',
                'answer' => 'iw',
                'image' => 'illustrations/kasiw.png',
            ],
            [
                'word' => 'am__',
                'full_word' => 'amoy',
                'answer' => 'oy',
                'image' => 'illustrations/amoy.png',
            ],
            [
                'word' => 'b__wang',
                'full_word' => 'buyung',
                'answer' => 'uy',
                'image' => 'illustrations/buyung.png',
            ],
            [
                'word' => 'kil__',
                'full_word' => 'kiley',
                'answer' => 'ey',
                'image' => 'illustrations/kiley.png',
            ],
            [
                'word' => 'gil__',
                'full_word' => 'gilay',
                'answer' => 'ay',
                'image' => 'illustrations/gilay.png',
            ],
            [
                'word' => 'tul__',
                'full_word' => 'tulay',
                'answer' => 'ay',
                'image' => 'illustrations/tulay.png',
            ],
            [
                'word' => 'ar__',
                'full_word' => 'araw',
                'answer' => 'aw',
                'image' => 'illustrations/araw.png',
            ],
            [
                'word' => 'bat__',
                'full_word' => 'batay',
                'answer' => 'ay',
                'image' => 'illustrations/batay.png',
            ],
        ],

        13 => [
            [
                'word' => '_ _aka',
                'full_word' => 'plaka',
                'answer' => 'pl',
                'image' => 'illustrations/plaka.png',
            ],
            [
                'word' => '_ _oke',
                'full_word' => 'bloke',
                'answer' => 'bl',
                'image' => 'illustrations/bloke.png',
            ],
            [
                'word' => '_ _otsa',
                'full_word' => 'brotsa',
                'answer' => 'br',
                'image' => 'illustrations/brotsa.png',
            ],
            [
                'word' => 'Ero_ _ano',
                'full_word' => 'eroplano',
                'answer' => 'pl',
                'image' => 'illustrations/eroplano.png',
            ],
            [
                'word' => '_ _en',
                'full_word' => 'tren',
                'answer' => 'tr',
                'image' => 'illustrations/tren.png',
            ],
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

    // Pagsasanay 8
    public function getStoryProperty()
    {
        $stories = [
            8 => 'May mga luya sa lamesa. Kay Tiya Sela ang mga luya. Isasama niya ang mga ito sa tinola. Tinola ang uulamin nila mamaya.',
        ];

        return $stories[$this->lesson] ?? '';
    }

    public function render()
    {
        return view('livewire.third-slide');
    }
}