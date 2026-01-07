<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ThirdSlide extends Component
{
    public $lesson;

    protected $questions = [
        1 => [
            [
                'type' => 'panuto',
                'audio' => 'audio/lesson1/L1P3.m4a'
            ],
            [
                'type' => 'alphabet',
                'alpabeto' => 'M',
                'answer' => 'm'
            ],
            [
                'type' => 'alphabet',
                'alpabeto' => 'S',
                'answer' => 's'
            ],
            [
                'type' => 'alphabet',
                'alpabeto' => 'A',
                'answer' => 'a'
            ],
            [
                'type' => 'alphabet',
                'alpabeto' => 'I',
                'answer' => 'i'
            ],
            [
                'type' => 'alphabet',
                'alpabeto' => 'O',
                'answer' => 'o'
            ],
            [
                'type' => 'alphabet',
                'alpabeto' => 'B',
                'answer' => 'b'
            ],
            [
                'type' => 'alphabet',
                'alpabeto' => 'E',
                'answer' => 'e'
            ],
            [
                'type' => 'alphabet',
                'alpabeto' => 'U',
                'answer' => 'u'
            ],
            [
                'type' => 'alphabet',
                'alpabeto' => 'T',
                'answer' => 't'
            ],

            [
                'type' => 'alphabet',
                'alpabeto' => 'K',
                'answer' => 'k'
            ],
            [
                'type' => 'alphabet',
                'alpabeto' => 'L',
                'answer' => 'l'
            ],
            [
                'type' => 'alphabet',
                'alpabeto' => 'Y',
                'answer' => 'y'
            ],
            [
                'type' => 'alphabet',
                'alpabeto' => 'N',
                'answer' => 'n'
            ],
            [
                'type' => 'alphabet',
                'alpabeto' => 'G',
                'answer' => 'g'
            ],
            [
                'alpabeto' => 'NG', 'answer' => 'ng'],
            [
                'type' => 'alphabet',
                'alpabeto' => 'P',
                'answer' => 'p'
            ],
            [
                'type' => 'alphabet',
                'alpabeto' => 'R',
                'answer' => 'r'
            ],
            [
                'type' => 'alphabet',
                'alpabeto' => 'D',
                'answer' => 'd'
            ],

            [
                'type' => 'alphabet',
                'alpabeto' => 'H',
                'answer' => 'h'
            ],
            [
                'type' => 'alphabet',
                'alpabeto' => 'W',
                'answer' => 'w'
            ],
            [
                'type' => 'alphabet',
                'alpabeto' => 'C',
                'answer' => 'c'
            ],
            [
                'type' => 'alphabet',
                'alpabeto' => 'F',
                'answer' => 'f'
            ],
            [
                'type' => 'alphabet',
                'alpabeto' => 'J',
                'answer' => 'j'
            ],
            [
                'type' => 'alphabet',
                'alpabeto' => 'Ñ',
                'answer' => 'ñ'
            ],
            [
                'type' => 'alphabet',
                'alpabeto' => 'Q',
                'answer' => 'q'
            ],
            [
                'type' => 'alphabet',
                'alpabeto' => 'V',
                'answer' => 'v'
            ],
            [
                'type' => 'alphabet',
                'alpabeto' => 'X',
                'answer' => 'x'
            ],
            [
                'type' => 'alphabet',
                'alpabeto' => 'Z',
                'answer' => 'z'
            ],

            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q1.mp3',
                'prompt' => 'Sa anong letra maririnig ang sumusunod na tunog?',
                'choices' => ['A', 'T', 'S', 'E', 'M'],
                'answer' => 'S',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q2.mp3',
                'prompt' => 'Anong letra ang iyong narinig?',
                'choices' => ['D', 'M', 'O', 'A', 'P'],
                'answer' => 'M',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q3.mp3',
                'prompt' => 'Pakinggan mabuti. Aling letra ang tumutunog?',
                'choices' => ['B', 'E', 'G', 'I', 'U'],
                'answer' => 'E',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q4.mp3',
                'prompt' => 'Sa anong letra ang tunog na narinig mo?',
                'choices' => ['N', 'T', 'S', 'L', 'W'],
                'answer' => 'T',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q5.mp3',
                'prompt' => 'Anong letra ang narinig?',
                'choices' => ['I', 'U', 'A', 'O', 'E'],
                'answer' => 'A',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q6.mp3',
                'prompt' => 'Piliin ang tamang letra.',
                'choices' => ['M', 'G', 'P', 'B', 'D'],
                'answer' => 'P',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q7.mp3',
                'prompt' => 'Anong letra ang tumunog?',
                'choices' => ['B', 'N', 'D', 'P', 'T'],
                'answer' => 'D',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q8.mp3',
                'prompt' => 'Makinig at piliin ang letra.',
                'choices' => ['E', 'O', 'U', 'A', 'I'],
                'answer' => 'O',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q9.mp3',
                'prompt' => 'Aling letra ang iyong narinig?',
                'choices' => ['S', 'L', 'N', 'M', 'W'],
                'answer' => 'L',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q10.mp3',
                'prompt' => 'Pakinggan ang tunog at pumili.',
                'choices' => ['N', 'W', 'T', 'L', 'M'],
                'answer' => 'W',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q11.mp3',
                'prompt' => 'Anong letra ang narinig mo?',
                'choices' => ['O', 'I', 'U', 'E', 'A'],
                'answer' => 'I',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q12.mp3',
                'prompt' => 'Piliin ang tamang letra.',
                'choices' => ['G', 'B', 'M', 'D', 'P'],
                'answer' => 'B',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q13.mp3',
                'prompt' => 'Anong letra ang tumunog?',
                'choices' => ['E', 'O', 'U', 'A', 'I'],
                'answer' => 'U',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q14.mp3',
                'prompt' => 'Makinig mabuti at piliin.',
                'choices' => ['P', 'M', 'G', 'D', 'B'],
                'answer' => 'G',
            ],
            [
                'type' => 'mc_audio',
                'audio' => 'audio/L1Q15.mp3',
                'prompt' => 'Sa anong letra ang tunog?',
                'choices' => ['W', 'S', 'N', 'L', 'M'],
                'answer' => 'N',
            ],

        ],


        2 => [
            // Part 1: Image Group Audio (5 questions - identify vowel sound)
            [
                'type' => 'image_group_audio',
                'answer' => 'a',
                'images' => [
                    ['src' => 'illustrations/aso.png', 'label' => 'aso'],
                    ['src' => 'illustrations/araw.png', 'label' => 'araw'],
                    ['src' => 'illustrations/ahas.png', 'label' => 'ahas'],
                ],
            ],
            [
                'type' => 'image_group_audio',
                'answer' => 'e',
                'images' => [
                    ['src' => 'illustrations/ekis.png', 'label' => 'ekis'],
                    ['src' => 'illustrations/espada.png', 'label' => 'espada'],
                    ['src' => 'illustrations/eroplano.png', 'label' => 'eroplano'],
                ],
            ],
            [
                'type' => 'image_group_audio',
                'answer' => 'i',
                'images' => [
                    ['src' => 'illustrations/itlog.png', 'label' => 'itlog'],
                    ['src' => 'illustrations/ilong.png', 'label' => 'ilong'],
                    ['src' => 'illustrations/isa.png', 'label' => 'isa'],
                ],
            ],
            [
                'type' => 'image_group_audio',
                'answer' => 'o',
                'images' => [
                    ['src' => 'illustrations/oso.png', 'label' => 'oso'],
                    ['src' => 'illustrations/ospital.png', 'label' => 'ospital'],
                    ['src' => 'illustrations/oregano.png', 'label' => 'oregano'],
                ],
            ],
            [
                'type' => 'image_group_audio',
                'answer' => 'u',
                'images' => [
                    ['src' => 'illustrations/unan.png', 'label' => 'unan'],
                    ['src' => 'illustrations/ulan.png', 'label' => 'ulan'],
                    ['src' => 'illustrations/ube.png', 'label' => 'ube'],
                ],
            ],
            
            // Part 2: Fill Blank + Pronounce Word (20 questions total - 10 pairs)
            
            // Pair 1: ubas
            [
                'type' => 'fill_blank_audio',
                'word' => '_bas',
                'answer' => 'U',
                'image' => 'illustrations/ubas.png',
            ],
            [
                'type' => 'pronounce_word',
                'full_word' => 'ubas',
                'image' => 'illustrations/ubas.png',
            ],
            
            // Pair 2: elepante
            [
                'type' => 'fill_blank_audio',
                'word' => '_lepante',
                'answer' => 'E',
                'image' => 'illustrations/elepante.png',
            ],
            [
                'type' => 'pronounce_word',
                'full_word' => 'elepante',
                'image' => 'illustrations/elepante.png',
            ],
            
            // Pair 3: apoy
            [
                'type' => 'fill_blank_audio',
                'word' => '_poy',
                'answer' => 'A',
                'image' => 'illustrations/apoy.png',
            ],
            [
                'type' => 'pronounce_word',
                'full_word' => 'apoy',
                'image' => 'illustrations/apoy.png',
            ],
            
            // Pair 4: ilaw
            [
                'type' => 'fill_blank_audio',
                'word' => '_law',
                'answer' => 'I',
                'image' => 'illustrations/ilaw.png',
            ],
            [
                'type' => 'pronounce_word',
                'full_word' => 'ilaw',
                'image' => 'illustrations/ilaw.png',
            ],
            
            // Pair 5: okra
            [
                'type' => 'fill_blank_audio',
                'word' => '_kra',
                'answer' => 'O',
                'image' => 'illustrations/okra.png',
            ],
            [
                'type' => 'pronounce_word',
                'full_word' => 'okra',
                'image' => 'illustrations/okra.png',
            ],
            
            // Pair 6: orasan
            [
                'type' => 'fill_blank_audio',
                'word' => '_rasan',
                'answer' => 'O',
                'image' => 'illustrations/orasan.png',
            ],
            [
                'type' => 'pronounce_word',
                'full_word' => 'orasan',
                'image' => 'illustrations/orasan.png',
            ],
            
            // Pair 7: upo
            [
                'type' => 'fill_blank_audio',
                'word' => '_po',
                'answer' => 'U',
                'image' => 'illustrations/upo.png',
            ],
            [
                'type' => 'pronounce_word',
                'full_word' => 'upo',
                'image' => 'illustrations/upo.png',
            ],
            
            // Pair 8: ibon
            [
                'type' => 'fill_blank_audio',
                'word' => '_bon',
                'answer' => 'I',
                'image' => 'illustrations/ibon.png',
            ],
            [
                'type' => 'pronounce_word',
                'full_word' => 'ibon',
                'image' => 'illustrations/ibon.png',
            ],
            
            // Pair 9: isda
            [
                'type' => 'fill_blank_audio',
                'word' => '_sda',
                'answer' => 'I',
                'image' => 'illustrations/isda.png',
            ],
            [
                'type' => 'pronounce_word',
                'full_word' => 'isda',
                'image' => 'illustrations/isda.png',
            ],
            
            // Pair 10: atis
            [
                'type' => 'fill_blank_audio',
                'word' => '_tis',
                'answer' => 'A',
                'image' => 'illustrations/atis.png',
            ],
            [
                'type' => 'pronounce_word',
                'full_word' => 'atis',
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
            // Part 1: Syllable Building
            ['type' => 'syllable_build', 'syllables' => ['Ba', 'so'], 'answer' => 'baso'],
            ['type' => 'syllable_build', 'syllables' => ['ba', 'sa'], 'answer' => 'basa'],
            
            // Part 2: Read Phrases
            ['type' => 'read_phrase', 'parirala' => 'iba ang abo'],
            ['type' => 'read_phrase', 'parirala' => 'ang mga baso'],
            
            // Part 3: Read Sentences & Comprehension
            ['type' => 'read_sentence', 'pangungusap' => 'Ang mga bao ay basa.'],
            ['type' => 'comprehension', 'tanong' => 'Ano ang basa?', 'answer' => 'ang mga bao'],

            ['type' => 'read_sentence', 'pangungusap' => 'Bababa si Sam.'],
            ['type' => 'comprehension', 'tanong' => 'Sino ang bababa?', 'answer' => 'si Sam'],
        ],

        7 => [
            ['type' => 'read_phrase', 'parirala' => 'Kalaro'],
            ['type' => 'read_phrase', 'parirala' => 'Masaya'],
            ['type' => 'read_phrase', 'parirala' => 'Kalabasa'],
            ['type' => 'read_phrase', 'parirala' => 'katutubo'],
            ['type' => 'read_phrase', 'parirala' => 'ninuno'],
            ['type' => 'read_phrase', 'parirala' => 'mata ng ibon'],
            ['type' => 'read_phrase', 'parirala' => 'yoyo sa tabo'],
            ['type' => 'read_phrase', 'parirala' => 'bola sa ilalim ng kama'],
            ['type' => 'read_phrase', 'parirala' => 'ang mga ubas'],
            ['type' => 'read_phrase', 'parirala' => 'lobo sa mesa'],
            ['type' => 'read_phrase', 'parirala' => 'luya ni yaya'],
            ['type' => 'read_phrase', 'parirala' => 'butas na bota'],
            ['type' => 'read_phrase', 'parirala' => 'yema ng bata'],
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
            ['type' => 'read_phrase', 'parirala' => 'Ang sinigang'],
            ['type' => 'read_phrase', 'parirala' => 'Dahil mabaho'],
            ['type' => 'read_phrase', 'parirala' => 'Walang pera'],
            ['type' => 'read_phrase', 'parirala' => 'ang kalabaw at palaka'],
            ['type' => 'read_phrase', 'parirala' => 'sawali at ipa'],
            ['type' => 'read_phrase', 'parirala' => 'sagana at mapayapa'],
            ['type' => 'read_phrase', 'parirala' => 'Si Lino'],
            ['type' => 'read_phrase', 'parirala' => 'Ang masiba'],
        ],  

        10 => [
            ['type' => 'fill_syllable', 'word' => 'Kale__', 'answer' => 'sa', 'image' => 'illustrations/kalesa.png', 'full_word' => 'Kalesa'],
            ['type' => 'read_word', 'full_word' => 'Kalesa'],
            
            ['type' => 'fill_syllable', 'word' => 'Ye__', 'answer' => 'ma', 'image' => 'illustrations/yema.png', 'full_word' => 'Yema'],
            ['type' => 'read_word', 'full_word' => 'Yema'],
            
            ['type' => 'fill_syllable', 'word' => 'Gi__ra', 'answer' => 'ta', 'image' => 'illustrations/gitara.png', 'full_word' => 'Gitara'],
            ['type' => 'read_word', 'full_word' => 'Gitara'],
            
            ['type' => 'fill_syllable', 'word' => 'Si__', 'answer' => 'li', 'image' => 'illustrations/sili.png', 'full_word' => 'Sili'],
            ['type' => 'read_word', 'full_word' => 'Sili'],
            
            ['type' => 'fill_syllable', 'word' => '__nika', 'answer' => 'ma', 'image' => 'illustrations/manika.png', 'full_word' => 'Manika'],
            ['type' => 'read_word', 'full_word' => 'Manika'],
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
                'type' => 'fill_syllable',
                'word' => 'Bah__',
                'full_word' => 'Bahay',
                'answer' => 'ay',
                'image' => 'illustrations/bahay.png',
            ],
            ['type' => 'read_word', 'full_word' => 'Bahay'],

            [
                'type' => 'fill_syllable',
                'word' => 'Kah__',
                'full_word' => 'Kahaw',
                'answer' => 'aw',
                'image' => 'illustrations/kahaw.png',
            ],
            ['type' => 'read_word', 'full_word' => 'Kahaw'],

            [
                'type' => 'fill_syllable',
                'word' => 'Kas__',
                'full_word' => 'Kasiw',
                'answer' => 'iw',
                'image' => 'illustrations/kasiw.png',
            ],
            ['type' => 'read_word', 'full_word' => 'Kasiw'],

            [
                'type' => 'fill_syllable',
                'word' => 'Am__',
                'full_word' => 'Amoy',
                'answer' => 'oy',
                'image' => 'illustrations/amoy.png',
            ],
            ['type' => 'read_word', 'full_word' => 'Amoy'],

            [
                'type' => 'fill_syllable',
                'word' => 'B__wang',
                'full_word' => 'Buywang',
                'answer' => 'uy',
                'image' => 'illustrations/buywang.png',
            ],
            ['type' => 'read_word', 'full_word' => 'Buywang'],

            [
                'type' => 'fill_syllable',
                'word' => 'Kil__',
                'full_word' => 'Kilay',
                'answer' => 'ay',
                'image' => 'illustrations/kilay.png',
            ],
            ['type' => 'read_word', 'full_word' => 'Kilay'],

            [
                'type' => 'fill_syllable',
                'word' => 'Gul__',
                'full_word' => 'Gulay',
                'answer' => 'ay',
                'image' => 'illustrations/gulay.png',
            ],
            ['type' => 'read_word', 'full_word' => 'Gulay'],

            [
                'type' => 'fill_syllable',
                'word' => 'Tul__',
                'full_word' => 'Tulay',
                'answer' => 'ay',
                'image' => 'illustrations/tulay.png',
            ],
            ['type' => 'read_word', 'full_word' => 'Tulay'],

            [
                'type' => 'fill_syllable',
                'word' => 'Ar__',
                'full_word' => 'Araw',
                'answer' => 'aw',
                'image' => 'illustrations/araw.png',
            ],
            ['type' => 'read_word', 'full_word' => 'Araw'],

            [
                'type' => 'fill_syllable',
                'word' => 'Bat__',
                'full_word' => 'Bata',
                'answer' => 'ay',
                'image' => 'illustrations/bata.png',
            ],
            ['type' => 'read_word', 'full_word' => 'Bata'],
        ],

        13 => [
            [
                'type' => 'fill_syllable',
                'word' => '__aka',
                'full_word' => 'Plaka',
                'answer' => 'pl',
                'image' => 'illustrations/plaka.png',
            ],
            ['type' => 'read_word', 'full_word' => 'Plaka'],

            [
                'type' => 'fill_syllable',
                'word' => '__oke',
                'full_word' => 'Bloke',
                'answer' => 'bl',
                'image' => 'illustrations/bloke.png',
            ],
            ['type' => 'read_word', 'full_word' => 'Bloke'],

            [
                'type' => 'fill_syllable',
                'word' => '__otsa',
                'full_word' => 'Brotsa',
                'answer' => 'br',
                'image' => 'illustrations/brotsa.png',
            ],
            ['type' => 'read_word', 'full_word' => 'Brotsa'],

            [
                'type' => 'fill_syllable',
                'word' => 'Ero__ano',
                'full_word' => 'Eroplano',
                'answer' => 'pl',
                'image' => 'illustrations/eroplano.png',
            ],
            ['type' => 'read_word', 'full_word' => 'Eroplano'],

            [
                'type' => 'fill_syllable',
                'word' => '__en',
                'full_word' => 'Tren',
                'answer' => 'tr',
                'image' => 'illustrations/tren.png',
            ],
            ['type' => 'read_word', 'full_word' => 'Tren'],
        ],

        14 => [
            [
                'type' => 'fill_syllable',
                'word' => '__bango',
                'full_word' => 'Mabango',
                'answer' => 'ma',
                'image' => 'illustrations/mabango.png',
            ],
            ['type' => 'read_word', 'full_word' => 'Mabango'],

            [
                'type' => 'fill_syllable',
                'word' => '__taas',
                'full_word' => 'Mataas',
                'answer' => 'ma',
                'image' => 'illustrations/mataas.png',
            ],
            ['type' => 'read_word', 'full_word' => 'Mataas'],

            [
                'type' => 'fill_syllable',
                'word' => '__dapa',
                'full_word' => 'Nadapa',
                'answer' => 'na',
                'image' => 'illustrations/nadapa.png',
            ],
            ['type' => 'read_word', 'full_word' => 'Nadapa'],

            [
                'type' => 'fill_syllable',
                'word' => '__sipag',
                'full_word' => 'Masipag',
                'answer' => 'ma',
                'image' => 'illustrations/masipag.png',
            ],
            ['type' => 'read_word', 'full_word' => 'Masipag'],

            [
                'type' => 'fill_syllable',
                'word' => '__tiyaga',
                'full_word' => 'Matiyaga',
                'answer' => 'ma',
                'image' => 'illustrations/matiyaga.png',
            ],
            ['type' => 'read_word', 'full_word' => 'Matiyaga'],
        ],

        15 => [
            // Part A: Classify proverbs
            [
                'type' => 'classify',
                'text' => 'Butas ang bulsa',
                'question' => 'Anong uri ng karunungang bayan ito?',
                'answer' => 'kasabihan',
                'choices' => ['kasabihan', 'salawikain', 'sawikain'],
            ],
            [
                'type' => 'classify',
                'text' => 'Ilaw ng tahanan',
                'question' => 'Anong uri ng karunungang bayan ito?',
                'answer' => 'salawikain',
                'choices' => ['kasabihan', 'salawikain', 'sawikain'],
            ],
            [
                'type' => 'classify',
                'text' => 'Kapag may tiyaga, may nilaga',
                'question' => 'Anong uri ng karunungang bayan ito?',
                'answer' => 'kasabihan',
                'choices' => ['kasabihan', 'salawikain', 'sawikain'],
            ],
            [
                'type' => 'classify',
                'text' => 'Ang anak na magalang, kayaman ng magulang.',
                'question' => 'Anong uri ng karunungang bayan ito?',
                'answer' => 'kasabihan',
                'choices' => ['kasabihan', 'salawikain', 'sawikain'],
            ],
            [
                'type' => 'classify',
                'text' => 'Malayo sa bituka',
                'question' => 'Anong uri ng karunungang bayan ito?',
                'answer' => 'salawikain',
                'choices' => ['kasabihan', 'salawikain', 'sawikain'],
            ],
            
            // Part B: Answer riddles
            [
                'type' => 'riddle',
                'text' => 'Dalawang bolang malalim, Malayo ang nararating.',
                'question' => 'Ano ito?',
                'answer' => 'mata',
            ],
            [
                'type' => 'riddle',
                'text' => 'Isang prinsesa, Nakaupo sa tasa.',
                'question' => 'Ano ito?',
                'answer' => 'tsa',
            ],
        ],

        16 => [
            // Part A: Vocabulary Matching
            [
                'type' => 'vocabulary',
                'word' => 'maningning',
                'question' => 'maningning',
                'answer' => 'a',
                'choices' => ['a. makislap', 'b. malabo', 'c. matigas'],
            ],
            [
                'type' => 'vocabulary',
                'word' => 'tumatanglaw',
                'question' => 'tumatanglaw',
                'answer' => 'b',
                'choices' => ['a. nagdidilim', 'b. nagbibigay-liwanag', 'c. nagbibigay'],
            ],
            [
                'type' => 'vocabulary',
                'word' => 'ampaw',
                'question' => 'ampaw',
                'answer' => 'b',
                'choices' => ['a. malaman', 'b. walang alam/laman', 'c. di-totoo'],
            ],
            [
                'type' => 'vocabulary',
                'word' => 'kamusmusan',
                'question' => 'kamusmusan',
                'answer' => 'a',
                'choices' => ['a. kabataan', 'b. katandaan', 'c. kawalan'],
            ],
            [
                'type' => 'vocabulary',
                'word' => 'pagkalinga',
                'question' => 'pagkalinga',
                'answer' => 'c',
                'choices' => ['a. pag-iisa', 'b. pagtulak', 'c. pag-aalaga'],
            ],
            [
                'type' => 'vocabulary',
                'word' => 'pumanaw',
                'question' => 'pumanaw',
                'answer' => 'b',
                'choices' => ['a. bumuhay', 'b. Nawala', 'c. umasa'],
            ],
            [
                'type' => 'vocabulary',
                'word' => 'karimlan',
                'question' => 'karimlan',
                'answer' => 'c',
                'choices' => ['a. kaliwanagan', 'b. ilawan', 'c. kadiliman'],
            ],
            
            // Part B: Comprehension
            [
                'type' => 'comprehension',
                'question' => 'Sino ang tinutukoy na maningning na ilaw sa tula?',
                'answer' => 'c',
                'choices' => ['a. tatay', 'b. literal na ilaw', 'c. nanay'],
            ],
            [
                'type' => 'comprehension',
                'question' => 'Ayon sa tula, ano ang hindi nawawala sa ginagawa ng isang ina?',
                'answer' => 'a',
                'choices' => ['a. pagkalinga', 'b. ampaw', 'c. ilaw'],
            ],
            [
                'type' => 'comprehension',
                'question' => 'Sino kaya ang nagsasalita sa tula?',
                'answer' => 'c',
                'choices' => ['a. nanay', 'b. tatay', 'c. anak'],
            ],
        ],

        17 => [
            // Part A: Vocabulary Matching (synonyms)
            [
                'type' => 'vocabulary_match',
                'word' => 'bumulong',
                'answer' => 'sumigaw',
                'choices' => ['umusal', 'sumigaw', 'bumati'],
            ],
            [
                'type' => 'vocabulary_match',
                'word' => 'itinakas',
                'answer' => 'ibinigay',
                'choices' => ['ipinagkaloob', 'ibinigay', 'isinalin'],
            ],
            [
                'type' => 'vocabulary_match',
                'word' => 'mahaba',
                'answer' => 'malaki',
                'choices' => ['munti', 'maiksi', 'malaki'],
            ],
            [
                'type' => 'vocabulary_match',
                'word' => 'sala',
                'answer' => 'hugasan',
                'choices' => ['batalan', 'hardin', 'hugasan'],
            ],
            [
                'type' => 'vocabulary_match',
                'word' => 'palibot',
                'answer' => 'papunta',
                'choices' => ['patungo', 'palabas', 'papunta'],
            ],
            
            // Part B: Comprehension (text input)
            [
                'type' => 'comprehension',
                'question' => 'Sino ang batang gumaganap sa kuwento?',
                'answer' => 'si Maria',
            ],
            [
                'type' => 'comprehension',
                'question' => 'Ano ang ginawa niya pagkagising sa umaga?',
                'answer' => 'bumangon at naglingkod',
            ],
            [
                'type' => 'comprehension',
                'question' => 'Saan siya dumiretso upang maghilamos at magsipilyo?',
                'answer' => 'sa ilog',
            ],
            [
                'type' => 'comprehension',
                'question' => 'Sino ang kaniyang nakasalubong at binati matapos maghilamos?',
                'answer' => 'ang lola niya',
            ],
            [
                'type' => 'comprehension',
                'question' => 'Ano ang kanilang hanapbuhay?',
                'answer' => 'mamimili ng prutas',
            ],
        ],

        18 => [
            // Part A: Comprehension (text input)
            [
                'type' => 'comprehension',
                'question' => 'Saan nakapagtapos ng Master of Arts in Education ang tinutukoy sa balita?',
                'answer' => 'sa Benguet State University',
            ],
            [
                'type' => 'comprehension',
                'question' => 'Sino ang ibinabalitang guro sa binasang balita?',
                'answer' => 'si Maria Santos',
            ],
            [
                'type' => 'comprehension',
                'question' => 'Ano ang hindi niya ikinahiya noong siya ay kumuha ng 18 units sa Filipino undergraduate?',
                'answer' => 'ang kanyang background',
            ],
            [
                'type' => 'comprehension',
                'question' => 'Anong taon siya nakapagtapos sa nasabing unibersidad?',
                'answer' => '2015',
            ],
            [
                'type' => 'comprehension',
                'question' => 'Ano sa kasalukuyan ang kaniyang posisyon?',
                'answer' => 'Master Teacher',
            ],
            [
                'type' => 'comprehension',
                'question' => 'Saang paaralan siya naglilingkod ngayon?',
                'answer' => 'sa Benguet High School',
            ],
            
            // Part B: Vocabulary/Acronym Matching
            [
                'type' => 'vocabulary_match',
                'word' => 'umangat',
                'answer' => 'tumaas',
                'choices' => ['bumaba', 'tumaas', 'umasa'],
            ],
            [
                'type' => 'vocabulary_match',
                'word' => 'nagsikap',
                'answer' => 'nagtiyaga',
                'choices' => ['nagtamad', 'nagtiyaga', 'nagpabaya'],
            ],
            [
                'type' => 'vocabulary_match',
                'word' => 'ganap',
                'answer' => 'tunay',
                'choices' => ['tunay', 'di-totoo', 'wala'],
            ],
            [
                'type' => 'vocabulary_match',
                'word' => 'MT',
                'answer' => 'Master Teacher',
                'choices' => ['Math Teacher', 'Music Teacher', 'Master Teacher'],
            ],
            [
                'type' => 'vocabulary_match',
                'word' => 'ECF',
                'answer' => 'Education Call Form',
                'choices' => ['Education Call Form', 'Edd Corp Filipino', 'Eduardo Cojuanco Foundation'],
            ],
        ],

        19 => [
            // Part A: Vocabulary Matching
            ['type' => 'vocabulary_match', 'word' => 'ilaan', 'answer' => 'Ibigay', 'choices' => ['Ibigay', 'Itakas']],
            ['type' => 'vocabulary_match', 'word' => 'mapupunan', 'answer' => 'mababawasan', 'choices' => ['mababawasan', 'maibibigay']],
            ['type' => 'vocabulary_match', 'word' => 'naaprubahan', 'answer' => 'nakapasa', 'choices' => ['nasasakupan', 'nakapasa']],
            
            // Part B: Comprehension (MC)
            ['type' => 'comprehension', 'question' => 'Magkano ang naaprubahang badyet sa taong 2025?', 'answer' => 'P793. 74 bilyon', 'choices' => ['P793. 74 bilyon', 'P973. 74 bilyon']],
            ['type' => 'comprehension', 'question' => 'Ilang porsyento ang itinaas nito kumpara sa nakaraang taon?', 'answer' => '3.93%', 'choices' => ['3.99%', '3.93%']],
            ['type' => 'comprehension', 'question' => 'Sino ang senador na nanguna sa naturang badyet ng DepEd?', 'answer' => 'Pia Cayetano', 'choices' => ['Mia Cayetano', 'Pia Cayetano']],
        ],

        20 => [
            // Part A: Vocabulary Matching (2 choices)
            ['type' => 'vocabulary_match', 'word' => 'tuso', 'answer' => 'madaya', 'choices' => ['mabait', 'madaya']],
            ['type' => 'vocabulary_match', 'word' => 'sumibol', 'answer' => 'lumitaw', 'choices' => ['lumitaw', 'lumubog']],
            ['type' => 'vocabulary_match', 'word' => 'lingid', 'answer' => 'lihim', 'choices' => ['ligaw', 'lihim']],
            ['type' => 'vocabulary_match', 'word' => 'pangamba', 'answer' => 'takot', 'choices' => ['sigla', 'takot']],
            ['type' => 'vocabulary_match', 'word' => 'humihipak', 'answer' => 'humahawi', 'choices' => ['humahawi', 'humihithit']],
            
            // Part B: Comprehension (MC)
            ['type' => 'comprehension', 'question' => 'Ano ang inilalarawan na kinaaadikan nina Totoy at ng kaniyang Tiyo?', 'answer' => 'Vape', 'choices' => ['Tape', 'Vape']],
            ['type' => 'comprehension', 'question' => 'Ano ang ibig sabihin ng akronim na WHO?', 'answer' => 'World Health Organization', 'choices' => ['World Health Office', 'World Health Organization']],
            ['type' => 'comprehension', 'question' => 'Ayon sa WHO, ilan ang gumagamit ng vape sa buong mundo?', 'answer' => '100 million', 'choices' => ['100 million', '200 million']],
            ['type' => 'comprehension', 'question' => 'Bakit madalas umanong mag-vape ang mga kabataan?', 'answer' => 'Dahil sa kuryosidad', 'choices' => ['Dahil sa kuryosidad', 'dahil walang magawa']],
            ['type' => 'comprehension', 'question' => 'Bakit hindi mabuti ang mag-vape?', 'answer' => 'Nagdudulot ng sakit', 'choices' => ['Nagdudulot ng sakit', 'nagpapalakas ng loob']],
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

    public function completePagsasanay()
    {
        $user = Auth::user();
        
        if ($user) {
            // Only update if this is forward progress
            if ($user->current_progress < 75) {
                $user->update([
                    'current_progress' => 75, // Completed discussion slide
                ]);
            }
        }
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