<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use App\Models\UserTrack;

class FourthSlide extends Component
{   
    public $lesson;

    public $questions = [
        1 => [
            [
                'type' => 'panuto',
                'audio' => 'audio/lesson1/L1P6.m4a',
                'header' => 'Kilalanin mo ang bawat letra, pagkatapos ay pindutin mo ang microphone button sa pagbigkas ng tunog ng mga ito',
                'body' => '',
            ],

            [
                'alpabeto' => 'K',
                'answer' => 'k'
            ],
            [
                'alpabeto' => 'L',
                'answer' => 'l'
            ],
            [
                'alpabeto' => 'Y',
                'answer' => 'y'
            ],
            [
                'alpabeto' => 'N',
                'answer' => 'n'
            ],
            [
                'alpabeto' => 'G',
                'answer' => 'g'
            ],
            [
                'alpabeto' => 'NG', 'answer' => 'ng'],
            [
                'alpabeto' => 'P',
                'answer' => 'p'
            ],
            [
                'alpabeto' => 'R',
                'answer' => 'r'
            ],
            [
                'alpabeto' => 'D',
                'answer' => 'd'
            ],
            [
                'alpabeto' => 'H',
                'answer' => 'h'
            ],
        ],

        2 => [
            [
                'type' => 'panuto',
                'audio' => ['audio/lesson2/L2P23.m4a', 'audio/lesson2/L2P24.m4a'],
                'header' => 'A.	Bigkasin mo ang tunog ng sumusunod na patinig.',
                'body' => 'Pindutin mo lamang ang microphone button sa pagbigkas mo ng tunog ng mga ito.',
            ],
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
                'type' => 'panuto',
                'audio' => 'audio/lesson2/L2P25.m4a',
                'header' => 'B.	Ano ang unang tunog ng sumusunod na larawan?',
                'body' => 'Bigkasin mo ang unang tunog sa pamamagitan ng pagpindot sa microphone button.',
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
            [
                'type' => 'panuto',
                'audio' => 'audio/lesson3/L4P37.m4a',
                'header' => 'Basahin mo ang sumusunod na pantulong na kataga.',
                'body' => 'Pindutin mo ang microphone button.',
            ],
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
            [
                'type' => 'panuto',
                'audio' => 'audio/lesson4/L4P15.m4a',
                'header' => 'A.	Basahin mo ang sumusunod na pantig.',
                'body' => 'Pindutin mo ang microphone button.',
            ],
            ['pantig' => 'Am'],
            ['pantig' => 'A'],
            ['pantig' => 'As'],
            ['pantig' => 'Mas'],
            ['pantig' => 'Sa'],
            ['pantig' => 'Ma'],
            ['pantig' => 'Sam'],

            [
                'type' => 'panuto',
                'audio' => 'audio/lesson4/L4P16.m4a',
                'header' => 'B.	Sa bawat pagbasa mo sa mga salita ay pipindutin mo ang microphone button.',
                'body' => '',
            ],
            ['pantig' => 'Masa'],
            ['pantig' => 'Ama'],
            ['pantig' => 'Asa'],
            ['pantig' => 'Mama'],
            ['pantig' => 'Ama'],
            ['pantig' => 'Sasama'],
            ['pantig' => 'Aasa'],
            ['pantig' => 'Masama'],
        ],

        5 => [
            [
                'type' => 'panuto',
                'audio' => 'audio/lesson5/L5P8.m4a',
                'header' => 'A.	Pindutin mo ang microphone button upang mabasa ang sumusunod na parirala.',
                'body' => '',
            ],
            ['type' => 'read_phrase', 'parirala' => 'sama-sama'],
            ['type' => 'read_phrase', 'parirala' => 'sasama'],
            ['type' => 'read_phrase', 'parirala' => 'aasa ang Mama'],
            ['type' => 'read_phrase', 'parirala' => 'ang mga mama'],
            ['type' => 'read_phrase', 'parirala' => 'ang Mama'],
            ['type' => 'read_phrase', 'parirala' => 'sa Ama'],
            ['type' => 'read_phrase', 'parirala' => 'ang sama'],
            ['type' => 'read_phrase', 'parirala' => 'kay Ama'],
            ['type' => 'read_phrase', 'parirala' => 'ng Mama'],

            [
                'type' => 'panuto',
                'audio' => 'audio/lesson5/L5P9.m4a',
                'header' => 'B.	Sagutin mo ang sumusunod na tanong pagkatapos mong basahin.',
                'body' => '',
            ],
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
            [
                'type' => 'panuto',
                'audio' => ['audio/lesson6/L6P17.m4a', 'audio/lesson6/L6P18.m4a',],
                'header' => 'A.	Basahin mo ang sumusunod na salita.',
                'body' => '',
            ],
            ['type' => 'read_phrase', 'parirala' => 'masiba'],
            ['type' => 'read_phrase', 'parirala' => 'mabisa'],
            ['type' => 'read_phrase', 'parirala' => 'bomba'],
            ['type' => 'read_phrase', 'parirala' => 'ibaba'],
            ['type' => 'read_phrase', 'parirala' => 'abo'],

            [
                'type' => 'panuto',
                'audio' => 'audio/lesson6/L6P19.m4a',
                'header' => 'B.	Basahin mo ang mga parirala.',
                'body' => '',
            ],
            ['type' => 'read_phrase', 'parirala' => 'sa iba'],
            ['type' => 'read_phrase', 'parirala' => 'may misa'],
            ['type' => 'read_phrase', 'parirala' => 'abo sa baso'],

            [
                'type' => 'panuto',
                'audio' => 'audio/lesson6/L6P20.m4a',
                'header' => 'C.	Basahin mo ang mga pangungusap at sagutin ang mga tanong.',
                'body' => '',
            ],
            ['type' => 'read_sentence', 'pangungusap' => 'Ang baba ni Sam ay basa.'],
            ['type' => 'comprehension', 'tanong' => 'Ano ang basa kay Sam?', 'answer' => 'Ang baba'],
            ['type' => 'read_sentence', 'pangungusap' => 'Bibo si Bombi.'],
            ['type' => 'comprehension', 'tanong' => 'Sino ang bibo?', 'answer' => 'si Bombi'],
        ],
    
        7 => [
            [
                'type' => 'panuto',
                'audio' => ['audio/lesson7/L7P42.m4a', 'audio/lesson7/L7P43.m4a'],
                'header' => 'Handa ka na bang sumagot sa mga tanong batay sa mga pangungusap na iyong babasahin?',
                'body' => '',
            ],
            ['type' => 'read_sentence', 'pangungusap' => 'Ang bola ay kay Lea.'],
            ['type' => 'multiple_choice', 'tanong' => 'Kanino ang bola?', 'choices' => ['Kay Lea', 'Kay Bea', 'Kay Ela'], 'answer' => 'Kay Lea'],
            
            ['type' => 'read_sentence', 'pangungusap' => 'Kakain ng kalabasa si Mina'],
            ['type' => 'multiple_choice', 'tanong' => 'Sino ang kakain ng kalabasa?', 'choices' => ['Si Tina', 'Si Lina', 'Si Mina'], 'answer' => 'Si Mina'],
            
            ['type' => 'read_sentence', 'pangungusap' => 'Nabasa ang tela ni Mayumi'],
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang nabasa?', 'choices' => ['Ang biko ni Mayumi', 'Si Mayumi', 'Ang Tela ni Mayumi'], 'answer' => 'Ang Tela ni Mayumi'],
            
            ['type' => 'read_sentence', 'pangungusap' => 'Nasa lamesa ang mga ubas.'],
            ['type' => 'multiple_choice', 'tanong' => 'Nasaan ang mga ubas?', 'choices' => ['Nasa tasa', 'Nasa lamesa', 'Nasa sala'], 'answer' => 'Nasa lamesa'],
            
            ['type' => 'read_sentence', 'pangungusap' => 'Yumuko sina tito at tita kay lola.'],
            ['type' => 'multiple_choice', 'tanong' => 'Kanino yumuko sina tito at tita?', 'choices' => ['Kay lolo', 'kay sela', 'Kay lola'], 'answer' => 'Kay lola'],
            
        ],

        8 => [
            [
                'type' => 'panuto',
                'audio' => 'audio/lesson8/L8P12.m4a',
                'header' => 'Basahin mo ang isa pang talata na nabuo sa mga letrang m, s, a, i, o, b, e, u, t, k, l, n, y.',
                'body' => '',
            ],
            ['tanong' => 'Sino-sino ang sama-sama?', 'answer' => 'lea leo at bea'],
            ['tanong' => 'Nasaan sila?', 'answer' => 'kusina'],
            ['tanong' => 'Sa ano abala si Bea?', 'answer' => 'sayote'],
            ['tanong' => 'Kailan sila kakain nang masaya?', 'answer' => 'mamaya'],
        ],

        9 => [
            [
                'type' => 'panuto',
                'audio' => 'audio/lesson9/L9P45.m4a',
                'header' => 'Sagutin ang sumusunod na tanong.',
                'body' => '',
            ],
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
            [
                'type' => 'panuto',
                'audio' => 'audio/lesson10/L10P5.m4a',
                'header' => 'Basahin mo ang sumusunod na pangunahing salita sa Filipino.',
                'body' => '',
            ],
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

        11 => [
            [
                'type' => 'panuto',
                'audio' => 'audio/lesson11/L11P10.m4a',
                'header' => 'Basahin mo ang sumusunod na salita. Pagkatapos ay sabihin mo kung ang mga ito ay magkasinkahulugan o magkasalungat',
                'body' => '',
            ],
            ['type' => 'read_pair', 'word1' => 'Lungkot', 'word2' => 'Panglaw'],
            ['type' => 'identify_relationship', 'word1' => 'Lungkot', 'word2' => 'Panglaw', 'answer' => 'Magkasingkahulugan'],
            
            ['type' => 'read_pair', 'word1' => 'Mabuti', 'word2' => 'Masama'],
            ['type' => 'identify_relationship', 'word1' => 'Mabuti', 'word2' => 'Masama', 'answer' => 'Magkasalungat'],
            
            ['type' => 'read_pair', 'word1' => 'Katoto', 'word2' => 'Kaibigan'],
            ['type' => 'identify_relationship', 'word1' => 'Katoto', 'word2' => 'Kaibigan', 'answer' => 'Magkasingkahulugan'],
            
            ['type' => 'read_pair', 'word1' => 'Batid', 'word2' => 'Alam'],
            ['type' => 'identify_relationship', 'word1' => 'Batid', 'word2' => 'Alam', 'answer' => 'Magkasingkahulugan'],
            
            ['type' => 'read_pair', 'word1' => 'Bata', 'word2' => 'Tiis'],
            ['type' => 'identify_relationship', 'word1' => 'Bata', 'word2' => 'Tiis', 'answer' => 'Magkasalungat'],
            
            ['type' => 'read_pair', 'word1' => 'Malamig', 'word2' => 'Mainit'],
            ['type' => 'identify_relationship', 'word1' => 'Malamig', 'word2' => 'Mainit', 'answer' => 'Magkasalungat'],
            
            ['type' => 'read_pair', 'word1' => 'Mahirap', 'word2' => 'Dukha'],
            ['type' => 'identify_relationship', 'word1' => 'Mahirap', 'word2' => 'Dukha', 'answer' => 'Magkasingkahulugan'],
            
            ['type' => 'read_pair', 'word1' => 'Kaibigan', 'word2' => 'Kaaway'],
            ['type' => 'identify_relationship', 'word1' => 'Kaibigan', 'word2' => 'Kaaway', 'answer' => 'Magkasalungat'],
            
            ['type' => 'read_pair', 'word1' => 'Sobra', 'word2' => 'Kulang'],
            ['type' => 'identify_relationship', 'word1' => 'Sobra', 'word2' => 'Kulang', 'answer' => 'Magkasalungat'],
            
            ['type' => 'read_pair', 'word1' => 'Yumao', 'word2' => 'Umalis'],
            ['type' => 'identify_relationship', 'word1' => 'Yumao', 'word2' => 'Umalis', 'answer' => 'Magkasalungat'],
        ],

        12 => [
            [
                'type' => 'panuto',
                'audio' => 'audio/lesson12/L12P5.m4a',
                'header' => 'A.	Basahin mo ang sumusunod na salitang may diptonggo.',
                'body' => '',
            ],
            ['type' => 'read_word', 'word' => 'Malay'],
            ['type' => 'read_word', 'word' => 'Bangaw'],
            ['type' => 'read_word', 'word' => 'Alay'],
            ['type' => 'read_word', 'word' => 'Halaw'],
            ['type' => 'read_word', 'word' => 'Okoy'],
            ['type' => 'read_word', 'word' => 'Bertdey'],
            ['type' => 'read_word', 'word' => 'Baduy'],
            ['type' => 'read_word', 'word' => 'Amoy'],
            ['type' => 'read_word', 'word' => 'Giliw'],
            ['type' => 'read_word', 'word' => 'Aguy'],

            [
                'type' => 'panuto',
                'audio' => 'audio/lesson12/L12P6.m4a',
                'header' => 'B.	Buoin mo ang salita. Pumili ng sagot na nasa kanan. Isulat mo sa patlang ang nabuong salita',
                'body' => '',
            ],
            ['type' => 'multiple_choice', 'tanong' => 'in', 'blank_position' => 'end', 'choices' => ['aw', 'ay', 'ey'], 'answer' => 'ay'],
            ['type' => 'multiple_choice', 'tanong' => 'sakl', 'blank_position' => 'end', 'choices' => ['uy', 'aw', 'oy'], 'answer' => 'aw'],
            ['type' => 'multiple_choice', 'tanong' => 'sal', 'blank_position' => 'end', 'choices' => ['iw', 'aw', 'ey'], 'answer' => 'iw'],
            ['type' => 'multiple_choice', 'tanong' => 'al', 'blank_position' => 'end', 'choices' => ['aw', 'iw', 'uy'], 'answer' => 'iw'],
            ['type' => 'multiple_choice', 'tanong' => 'burlol', 'blank_position' => 'end', 'choices' => ['oy', 'ay', 'ey'], 'answer' => 'oy'],
        ],

        13 => [
            [
                'type' => 'panuto',
                'audio' => 'audio/lesson13/L13P11.m4a',
                'header' => 'A.	Hanapin mo sa mga kambal-kanitig na nasa kanan ang pupuno sa bawat salita.',
                'body' => '',
            ],
            ['type' => 'multiple_choice', 'tanong' => 'am', 'blank_position' => 'start', 'choices' => ['ts', 'br', 'dr'], 'answer' => 'dr'],
            ['type' => 'multiple_choice', 'tanong' => 'atito', 'blank_position' => 'start', 'choices' => ['pl', 'pr', 'tr'], 'answer' => 'pl'],
            ['type' => 'multiple_choice', 'tanong' => 'apo', 'blank_position' => 'start', 'choices' => ['bl', 'tr', 'pl'], 'answer' => 'tr'],
            ['type' => 'multiple_choice', 'tanong' => 'umpeta', 'blank_position' => 'start', 'choices' => ['br', 'tr', 'dr'], 'answer' => 'tr'],
            ['type' => 'multiple_choice', 'tanong' => 'obo', 'blank_position' => 'start', 'choices' => ['gr', 'tr', 'gl'], 'answer' => 'gl'],

            [
                'type' => 'panuto',
                'audio' => 'audio/lesson13/L13P12.m4a',
                'header' => 'B.	Basahin mo ang mga salitang nabuo mo.',
                'body' => '',
            ],
            ['type' => 'read_word', 'word' => 'Drama'],
            ['type' => 'read_word', 'word' => 'Platito'],
            ['type' => 'read_word', 'word' => 'Trapo'],
            ['type' => 'read_word', 'word' => 'Trumpeta'],
            ['type' => 'read_word', 'word' => 'Globo'],
        ],

        14 => [
            [
                'type' => 'panuto',
                'audio' => 'audio/lesson14/L14P8.m4a',
                'header' => 'Basahin mo ang sumusunod na salita. Pagkatapos ay isulat mo sa patlang ang panlaping nasa loob ng salita',
                'body' => '',
            ],
            ['type' => 'read_word', 'salita' => 'Lumakas'],
            ['type' => 'input_panlapi', 'salita' => 'Lumakas', 'answer' => 'um'],
            
            ['type' => 'read_word', 'salita' => 'Matapang'],
            ['type' => 'input_panlapi', 'salita' => 'Matapang', 'answer' => 'ma'],
            
            ['type' => 'read_word', 'salita' => 'Maganda'],
            ['type' => 'input_panlapi', 'salita' => 'Maganda', 'answer' => 'ma'],
            
            ['type' => 'read_word', 'salita' => 'Nagbaklas'],
            ['type' => 'input_panlapi', 'salita' => 'Nagbaklas', 'answer' => 'nag'],
            
            ['type' => 'read_word', 'salita' => 'Sumayaw'],
            ['type' => 'input_panlapi', 'salita' => 'Sumayaw', 'answer' => 'um'],
            
            ['type' => 'read_word', 'salita' => 'Nagdusa'],
            ['type' => 'input_panlapi', 'salita' => 'Nagdusa', 'answer' => 'nag'],
            
            ['type' => 'read_word', 'salita' => 'Maligaya'],
            ['type' => 'input_panlapi', 'salita' => 'Maligaya', 'answer' => 'ma'],
            
            ['type' => 'read_word', 'salita' => 'Umibig'],
            ['type' => 'input_panlapi', 'salita' => 'Umibig', 'answer' => 'um'],
            
            ['type' => 'read_word', 'salita' => 'Binagyo'],
            ['type' => 'input_panlapi', 'salita' => 'Binagyo', 'answer' => 'in'],
            
            ['type' => 'read_word', 'salita' => 'Umayaw'],
            ['type' => 'input_panlapi', 'salita' => 'Umayaw', 'answer' => 'um'],
        ],

        15 => [
            [
                'type' => 'panuto',
                'audio' => 'audio/lesson15/L15P25.m4a',
                'header' => 'A.	Basahin mo ang mga sawikain. Pagkatapos ay isulat mo ang kanilang kahulugan.',
                'body' => '',
            ],
            // HANAY A: Read Sawikain + Write Kahulugan
            ['type' => 'read_sawikain', 'sawikain' => 'Anak-dalita'],
            ['type' => 'input_kahulugan', 'sawikain' => 'Anak-dalita', 'answer' => 'taong walang magulang o pamilya'],
            
            ['type' => 'read_sawikain', 'sawikain' => 'Nakahiga sa salapi'],
            ['type' => 'input_kahulugan', 'sawikain' => 'Nakahiga sa salapi', 'answer' => 'mayaman'],
            
            ['type' => 'read_sawikain', 'sawikain' => 'Pusong mamon'],
            ['type' => 'input_kahulugan', 'sawikain' => 'Pusong mamon', 'answer' => 'malambot ang puso'],
            
            ['type' => 'read_sawikain', 'sawikain' => 'Butas ang bulsa'],
            ['type' => 'input_kahulugan', 'sawikain' => 'Butas ang bulsa', 'answer' => 'walang pera'],
            
            ['type' => 'read_sawikain', 'sawikain' => 'Ilaw ng tahanan'],
            ['type' => 'input_kahulugan', 'sawikain' => 'Ilaw ng tahanan', 'answer' => 'ina'],
            
            [
                'type' => 'panuto',
                'audio' => 'audio/lesson15/L15P26.m4a',
                'header' => 'B.	Basahin mo ang isang kasabihan. Pagkatapos ay sagutin ang mga tanong.',
                'body' => '',
            ],
            // HANAY B: Kasabihan Page + Comprehension
            ['type' => 'kasabihan', 'kasabihan' => 'Kumain tayo ng prutas at gulay, Upang humaba ang ating buhay.'],
            ['type' => 'comprehension', 'tanong' => 'Ano-ano ang dapat na kainin ayon sa binasa?', 'answer' => 'prutas at gulay'],
            ['type' => 'comprehension', 'tanong' => 'Bakit kailangang kainin ang mga ito?', 'answer' => 'upang humaba ang ating buhay'],


            // HANAY C: Multiple Choice
            [
                'type' => 'panuto',
                'audio' => 'audio/lesson15/L15P27.m4a',
                'header' => 'C.	Basahin mo ang isang salawikain. Pagkatapos ay sagutin ang mga tanong.',
                'body' => '',
            ],
            ['type' => 'salawikain', 'salawikain' => 'Kapag may isinuksok, may madudukot.'],
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang kasingkahulugan ng salitang isinuksok?', 'choices' => ['itinipon', 'itinago', 'ibinato'], 'answer' => 'itinago'],
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang kahulugan ng salitang madurukot?', 'choices' => ['mahuhugot', 'mawawala', 'masasala'], 'answer' => 'mahuhugot'],
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang kadalasang isinusuksok o iniipon ng tao?', 'choices' => ['bahay', 'kotse', 'pera'], 'answer' => 'pera'],
            
        ],

        16 => [
            [
                'type' => 'panuto',
                'audio' => 'audio/lesson16/L16P14.m4a',
                'header' => 'Basahin at unawain ang sumusunod na katanungan o pahayag. Pindutin mo lang ang salita na sa palagay mo ay ang tamang sagot.',
                'body' => '',
            ],
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang kahulugan ng salitang kamusmusan?', 'choices' => ['Kabataan', 'Katandaan', 'Kawalan'], 'answer' => 'Kabataan'],
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang ibig sabihin ng salitang tumatanglaw', 'choices' => ['Nagdidilim', 'Nagbibigay-liwanag', 'Nagbibigay'], 'answer' => 'Nagbibigay-liwanag'],
            ['type' => 'multiple_choice', 'tanong' => 'Ito ay isang anyo ng sining o panitikan na naglalayong maipahayag ang damdamin sa malayang pagsusulat.', 'choices' => ['Dula', 'Kuwento', 'Tula'], 'answer' => 'Tula'],
            ['type' => 'multiple_choice', 'tanong' => 'Sa iyong palagay, sino ang nagsasalita sa tula?', 'choices' => ['Nanay', 'Tatay', 'Anak'], 'answer' => 'Anak'],
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang kasingkahulugan ng salitang karimlan?', 'choices' => ['Kaliwanagan', 'Ilawan', 'Kadiliman'], 'answer' => 'Kadiliman'],
        ],

        17 => [
            [
                'type' => 'panuto',
                'audio' => 'audio/lesson17/L17P12.m4a',
                'header' => 'Basahin at unawain ang sumusunod na tanong. Pindutin lang ang letra na tama ang sagot.',
                'body' => '',
            ],
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang ibig sabihin ng salitang patungo?', 'choices' => ['Papunta', 'Palabas', 'Palibot'], 'answer' => 'Papunta'],
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang pamagat ng kuwentong binasa?', 'choices' => ['Si Toto', 'Ang Mag-ina', 'Panalangin'], 'answer' => 'Panalangin'],
            ['type' => 'multiple_choice', 'tanong' => 'Sino ang gumaganap sa kuwento?', 'choices' => ['Berto', 'Toto', 'Tolits'], 'answer' => 'Toto'],
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang ginawa ng mag-anak bago kumain?', 'choices' => ['Naglaba', 'Nanalangin', 'Nagtinda'], 'answer' => 'Nanalangin'],
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang kahulugan ng salitang ipinagkaloob?', 'choices' => ['Ibinigay', 'Itinapon', 'Ikinalat'], 'answer' => 'Ibinigay'],
            ['type' => 'multiple_choice', 'tanong' => 'Saan nagbebenta ng prutas at gulay ang mag-anak?', 'choices' => ['Ospital', 'Bahay', 'Palengke'], 'answer' => 'Palengke'],
            ['type' => 'multiple_choice', 'tanong' => '“Umusal siya ng munting panalangin.” Ano ang kahulugan ng salitang munti?', 'choices' => ['Maikli', 'Mahaba', 'Malaki'], 'answer' => 'Maikli'],
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang kasingkahulugan ng salitang batalan?', 'choices' => ['Pahugasan', 'Hardin', 'Sala'], 'answer' => 'Pahugasan'],
        ],

        18 => [
            [
                'type' => 'panuto',
                'audio' => 'audio/lesson18/L18P10.m4a',
                'header' => 'Batay sa dalawang balitang binasa, basahin at sagutin ang sumusunod. Pindutin lang ang letra na tama ang sagot',
                'body' => '',
            ],
            ['type' => 'multiple_choice', 'tanong' => 'Ito ay isang uri ng trabaho o hanapbuhay.', 'choices' => ['Bokasyon', 'Propesyon', 'Okasyon'], 'answer' => 'Propesyon'],
            ['type' => 'multiple_choice', 'tanong' => 'Ito ay tumutukoy sa isang guro na may pinakamataas na ranggong akademiko sa kolehiyo o unibersidad.', 'choices' => ['Aperal', 'Kontraktor', 'Propesor'], 'answer' => 'Propesor'],
            ['type' => 'multiple_choice', 'tanong' => 'Nangangahulugang interbyu ang salitang ito.', 'choices' => ['Panayam', 'Payaman', 'Pamana'], 'answer' => 'Panayam'],
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang ibig sabihin ng akronim na ECF?', 'choices' => ['Education Call Form', 'Edd Corp Filipino', 'Eduardo Cojuangco Foundation'], 'answer' => 'Eduardo Cojuangco Foundation'],
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang kasingkahulugan ng salitang nagsikap?', 'choices' => ['Nagtamad', 'Nagtiyaga', 'Nagpabaya'], 'answer' => 'Nagtiyaga'],
            ['type' => 'multiple_choice', 'tanong' => 'Sino ang gurong Master Teacher I na ngayon sa Cristo Rey High School?', 'choices' => ['Jay-r Guinto', 'Joy C. Ramos', 'Anna Divina-Yusi'], 'answer' => 'Joy C. Ramos'],
            ['type' => 'multiple_choice', 'tanong' => 'Bakit siya nagsikap makapagtapos ng Post graduate?', 'choices' => ['Para umangat ang posisyon', 'Para umakyat sa opisina', 'Gusto lang niya'], 'answer' => 'Para umangat ang posisyon'],
            ['type' => 'multiple_choice', 'tanong' => 'Anong scholarship exam ang naipasa niya?', 'choices' => ['EDD', 'MT', 'ECF'], 'answer' => 'ECF'],
        ],

        19 => [
            [
                'type' => 'panuto',
                'audio' => 'audio/lesson19/L19P11.m4a',
                'header' => 'A. Sagutin ang sumusunod na tanong. Pindutin lang ang letra na kumakatawan sa tamang sagot.',
                'body' => 'Para sa bilang 1-5, ang mga tanong ay galing sa editoryal na pinamagatang “Edu-Aksyon."',
            ],
            // Edu-Aksyon (1–5)
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang katumbas na salita ng naaprubahan?', 'choices' => ['Nasasakupan', 'Naipasa', 'Naibalik'], 'answer' => 'Naipasa'],
            ['type' => 'multiple_choice', 'tanong' => 'Ayon sa editoryal, magkano ang naaprubahang badyet ng DepEd para sa taong 2025?', 'choices' => ['P793.74 bilyon', 'P973.74 bilyon', 'P749.93 bilyon'], 'answer' => 'P793.74 bilyon'],
            ['type' => 'multiple_choice', 'tanong' => 'Sino ang senador na nanguna sa paglalaan ng badyet para sa DepEd?', 'choices' => ['Mia Cayetano', 'Pia Cayetano', 'Lia Cayetona'], 'answer' => 'Pia Cayetano'],
            ['type' => 'multiple_choice', 'tanong' => '“Ilaan sa DepEd ang naturang badyet.” Ano ang kahulugan ng salitang nakasalungguhit?', 'choices' => ['Ayusin', 'Isakatuparan', 'Ibigay'], 'answer' => 'Ibigay'],
            ['type' => 'multiple_choice', 'tanong' => 'Alin ang kahulugan ng salitang mapupunan batay sa editoryal?', 'choices' => ['Mababawasan', 'Mabibigyan', 'Mawawala'], 'answer' => 'Mabibigyan'],

            [
                'type' => 'panuto',
                'audio' => 'audio/lesson1/L1P3.m4a',
                'header' => '',
                'body' => 'B. Para sa bilang 6-10. Ang mga tanong ay nagmula sa “Tuition Fee, Libre!”',
            ],
            // Tuition Fee, Libre! (6–10)
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang bill na ipinakilala ni Sen. Paolo Benigno “Bam” Aquino?', 'choices' => ['Senate Bill No. 177', 'Senate Bill No. 711'], 'answer' => 'Senate Bill No. 177'],
            ['type' => 'multiple_choice', 'tanong' => 'Sino lamang ang prayoridad ng libreng tuition fee ayon sa batas?', 'choices' => ['Estudyanteng mahihirap', 'Estudyanteng mayayaman'], 'answer' => 'Estudyanteng mahihirap'],
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang kasingkahulugan ng salitang pananaw?', 'choices' => ['Opinyon', 'Panaginip'], 'answer' => 'Opinyon'],
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang katumbas na salita ng estado?', 'choices' => ['Kasiyahan', 'Kalagayan'], 'answer' => 'Kalagayan'],
            ['type' => 'multiple_choice', 'tanong' => 'Ito ay nangangahulugang masinop.', 'choices' => ['Maingat', 'Maganda'], 'answer' => 'Maingat'],
        ],

        20 => [
            [
                'type' => 'panuto',
                'audio' => 'audio/lesson20/L20P9.m4a',
                'header' => 'Basahin at unawain ang mga talasalitaan. Hanapin mo ang kasingkahulugan ng mga ito sa kahon',
                'body' => '',
            ],
            [
                'word' => 'pangamba',
                'answer' => 'takot',
                'wordBank' => ['humihithit', 'takot', 'lihim', 'magkasama', 'pakinabang', 'maipatupad', 'walang sigla', 'kabutihan', 'Lumitaw', 'madaya']
            ],
            [
                'word' => 'sumibol',
                'answer' => 'Lumitaw',
                'wordBank' => ['humihithit', 'takot', 'lihim', 'magkasama', 'pakinabang', 'maipatupad', 'walang sigla', 'kabutihan', 'Lumitaw', 'madaya']
            ],
            [
                'word' => 'humihipak',
                'answer' => 'humihithit',
                'wordBank' => ['humihithit', 'takot', 'lihim', 'magkasama', 'pakinabang', 'maipatupad', 'walang sigla', 'kabutihan', 'Lumitaw', 'madaya']
            ],
            [
                'word' => 'lingid',
                'answer' => 'lihim',
                'wordBank' => ['humihithit', 'takot', 'lihim', 'magkasama', 'pakinabang', 'maipatupad', 'walang sigla', 'kabutihan', 'Lumitaw', 'madaya']
            ],
            [
                'word' => 'tuso',
                'answer' => 'madaya',
                'wordBank' => ['humihithit', 'takot', 'lihim', 'magkasama', 'pakinabang', 'maipatupad', 'walang sigla', 'kabutihan', 'Lumitaw', 'madaya']
            ],
            [
                'word' => 'kapakanan',
                'answer' => 'kabutihan',
                'wordBank' => ['humihithit', 'takot', 'lihim', 'magkasama', 'pakinabang', 'maipatupad', 'walang sigla', 'kabutihan', 'Lumitaw', 'madaya']
            ],
            [
                'word' => 'matamlay',
                'answer' => 'walang sigla',
                'wordBank' => ['humihithit', 'takot', 'lihim', 'magkasama', 'pakinabang', 'maipatupad', 'walang sigla', 'kabutihan', 'Lumitaw', 'madaya']
            ],
            [
                'word' => 'magkatuwang',
                'answer' => 'magkasama',
                'wordBank' => ['humihithit', 'takot', 'lihim', 'magkasama', 'pakinabang', 'maipatupad', 'walang sigla', 'kabutihan', 'Lumitaw', 'madaya']
            ],
            [
                'word' => 'bentahe',
                'answer' => 'pakinabang',
                'wordBank' => ['humihithit', 'takot', 'lihim', 'magkasama', 'pakinabang', 'maipatupad', 'walang sigla', 'kabutihan', 'Lumitaw', 'madaya']
            ],
            [
                'word' => 'mailunsad',
                'answer' => 'maipatupad',
                'wordBank' => ['humihithit', 'takot', 'lihim', 'magkasama', 'pakinabang', 'maipatupad', 'walang sigla', 'kabutihan', 'Lumitaw', 'madaya']
            ],
        ]

    ];

    public $score = 0;

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

            // Update or create user track record
            $userTrack = UserTrack::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'lesson_id' => $this->lesson, // Make sure you have this property
                ],
                [
                    'status' => 'completed',
                    'score' => $this->score,
                    'attempts' => DB::raw('attempts + 1'), // Increment attempts
                    'completed_at' => now(), // If you added this field
                ]
            );

            Log::info('Pagtataya completed', [
                'user_id' => $user->id,
                'lesson_id' => $this->lesson,
                'score' => $this->score,
                'attempts' => $userTrack->attempts,
            ]);
        }
    }
    
    public function render()
    {
        return view('livewire.fourth-slide');
    }
}
