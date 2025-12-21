<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ThirdSlide extends Component
{
    public $lesson;

    protected $questions = [
        1 => [
            ['alpabeto' => 'S', 'answer' => 'es'],
            ['alpabeto' => 'M', 'answer' => 'em'],
            ['alpabeto' => 'E', 'answer' => 'ih'],
            ['alpabeto' => 'T', 'answer' => 'ti'],
            ['alpabeto' => 'A', 'answer' => 'ey'],
            ['alpabeto' => 'P', 'answer' => 'pi'],
            ['alpabeto' => 'D', 'answer' => 'di'],
            ['alpabeto' => 'O', 'answer' => 'oo'],
            ['alpabeto' => 'L', 'answer' => 'el'],
            ['alpabeto' => 'W', 'answer' => 'dobolyu'],
            ['alpabeto' => 'I', 'answer' => 'ay'],
            ['alpabeto' => 'B', 'answer' => 'bi'],
            ['alpabeto' => 'U', 'answer' => 'yu'],
            ['alpabeto' => 'G', 'answer' => 'ji'],
            ['alpabeto' => 'N', 'answer' => 'en'],
        ],

        2 => [
            [
                'type' => 'image_group_audio',
                'answer' => 'A',
                'images' => [
                    ['src' => 'illustrations/aso.png', 'label' => 'aso'],
                    ['src' => 'illustrations/araw.png', 'label' => 'araw'],
                    ['src' => 'illustrations/ahas.png', 'label' => 'ahas'],
                ],
            ],
            [
                'type' => 'image_group_audio',
                'answer' => 'E',
                'images' => [
                    ['src' => 'illustrations/ekis.png', 'label' => 'ekis'],
                    ['src' => 'illustrations/espada.png', 'label' => 'espada'],
                    ['src' => 'illustrations/eroplano.png', 'label' => 'eroplano'],
                ],
            ],
            [
                'type' => 'image_group_audio',
                'answer' => 'I',
                'images' => [
                    ['src' => 'illustrations/itlog.png', 'label' => 'itlog'],
                    ['src' => 'illustrations/ilong.png', 'label' => 'ilong'],
                    ['src' => 'illustrations/isa.png', 'label' => 'isa'],
                ],
            ],
            [
                'type' => 'image_group_audio',
                'answer' => 'O',
                'images' => [
                    ['src' => 'illustrations/oso.png', 'label' => 'oso'],
                    ['src' => 'illustrations/ospital.png', 'label' => 'ospital'],
                    ['src' => 'illustrations/oregano.png', 'label' => 'oregano'],
                ],
            ],
            [
                'type' => 'image_group_audio',
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
                'image' => 'illustrations/upo.png',
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
                'type' => 'fill_syllable',
                'word' => '__aka',
                'full_word' => 'plaka',
                'answer' => 'pl',
                'image' => 'illustrations/plaka.png',
            ],
            [
                'type' => 'fill_syllable',
                'word' => '__oke',
                'full_word' => 'bloke',
                'answer' => 'bl',
                'image' => 'illustrations/bloke.png',
            ],
            [
                'type' => 'fill_syllable',
                'word' => '__otsa',
                'full_word' => 'brotsa',
                'answer' => 'br',
                'image' => 'illustrations/brotsa.png',
            ],
            [
                'type' => 'fill_syllable',
                'word' => 'Ero__ano',
                'full_word' => 'eroplano',
                'answer' => 'pl',
                'image' => 'illustrations/eroplano.png',
            ],
            [
                'type' => 'fill_syllable',
                'word' => '__en',
                'full_word' => 'tren',
                'answer' => 'tr',
                'image' => 'illustrations/tren.png',
            ],
        ],

        14 => [
            [
                'type' => 'fill_syllable',
                'word' => '__bango',
                'full_word' => 'mabango',
                'answer' => 'ma',
                'image' => 'illustrations/mabango.png',
            ],
            [
                'type' => 'fill_syllable',
                'word' => '__taas',
                'full_word' => 'mataas',
                'answer' => 'ma',
                'image' => 'illustrations/mataas.png',
            ],
            [
                'type' => 'fill_syllable',
                'word' => '__dapa',
                'full_word' => 'nadapa',
                'answer' => 'na',
                'image' => 'illustrations/nadapa.png',
            ],
            [
                'type' => 'fill_syllable',
                'word' => '__sipag',
                'full_word' => 'masipag',
                'answer' => 'ma',
                'image' => 'illustrations/masipag.png',
            ],
            [
                'type' => 'fill_syllable',
                'word' => '__tiyaga',
                'full_word' => 'matiyaga',
                'answer' => 'ma',
                'image' => 'illustrations/matiyaga.png',
            ],
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
            ['type' => 'vocabulary_match', 'word' => 'tuso', 'answer' => 'Ibigay', 'choices' => ['Ibigay', 'Itakas']],
            ['type' => 'vocabulary_match', 'word' => 'sumibol', 'answer' => 'mababawasan', 'choices' => ['mababawasan', 'mapupunan']],
            ['type' => 'vocabulary_match', 'word' => 'lingid', 'answer' => 'nasasakupan', 'choices' => ['nasasakupan', 'naaprubahan']],
            
            // Part B: Comprehension (MC)
            ['type' => 'comprehension', 'question' => 'Magkano ang naaprubahang badyet sa taong 2025?', 'answer' => 'P793. 74 bilyon', 'choices' => ['P793. 74 bilyon', 'P973. 74 bilyon']],
            ['type' => 'comprehension', 'question' => 'Ilang porsyento ang itinaas nito kumpara sa nakaraang taon?', 'answer' => '3.93%', 'choices' => ['3.99%', '3.93%']],
            ['type' => 'comprehension', 'question' => 'Sino ang senador na nanguna sa naturang badyet ng DepEd?', 'answer' => 'Pia Cayetano', 'choices' => ['Mia Cayetano', 'Pia Cayetano']],
        ],

        20 => [
            // Part A: Vocabulary Matching (2 choices)
            ['type' => 'vocabulary_match', 'word' => 'tuso', 'answer' => 'impostor', 'choices' => ['matalino', 'impostor']],
            ['type' => 'vocabulary_match', 'word' => 'sumibol', 'answer' => 'lumitaw', 'choices' => ['lumitaw', 'nawala']],
            ['type' => 'vocabulary_match', 'word' => 'lingid', 'answer' => 'lihim', 'choices' => ['malinaw', 'lihim']],
            ['type' => 'vocabulary_match', 'word' => 'pangamba', 'answer' => 'takot', 'choices' => ['saya', 'takot']],
            ['type' => 'vocabulary_match', 'word' => 'humihipak', 'answer' => 'umiihip', 'choices' => ['umiihip', 'tumitingin']],
            
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