<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

        11 => [
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

            ['type' => 'multiple_choice', 'tanong' => 'in', 'blank_position' => 'end', 'choices' => ['aw', 'ay', 'ey'], 'answer' => 'ay'],
            ['type' => 'multiple_choice', 'tanong' => 'sakl', 'blank_position' => 'end', 'choices' => ['uy', 'aw', 'oy'], 'answer' => 'aw'],
            ['type' => 'multiple_choice', 'tanong' => 'sal', 'blank_position' => 'end', 'choices' => ['iw', 'aw', 'ey'], 'answer' => 'iw'],
            ['type' => 'multiple_choice', 'tanong' => 'al', 'blank_position' => 'end', 'choices' => ['aw', 'iw', 'uy'], 'answer' => 'iw'],
            ['type' => 'multiple_choice', 'tanong' => 'burlol', 'blank_position' => 'end', 'choices' => ['oy', 'ay', 'ey'], 'answer' => 'oy'],
        ],

        13 => [
            ['type' => 'multiple_choice', 'tanong' => 'am', 'blank_position' => 'start', 'choices' => ['ts', 'br', 'dr'], 'answer' => 'dr'],
            ['type' => 'multiple_choice', 'tanong' => 'atito', 'blank_position' => 'start', 'choices' => ['pl', 'pr', 'tr'], 'answer' => 'pl'],
            ['type' => 'multiple_choice', 'tanong' => 'apo', 'blank_position' => 'start', 'choices' => ['bl', 'tr', 'pl'], 'answer' => 'tr'],
            ['type' => 'multiple_choice', 'tanong' => 'umpeta', 'blank_position' => 'start', 'choices' => ['br', 'tr', 'dr'], 'answer' => 'tr'],
            ['type' => 'multiple_choice', 'tanong' => 'obo', 'blank_position' => 'start', 'choices' => ['gr', 'tr', 'gl'], 'answer' => 'gl'],

            ['type' => 'read_word', 'word' => 'Drama'],
            ['type' => 'read_word', 'word' => 'Platito'],
            ['type' => 'read_word', 'word' => 'Trapo'],
            ['type' => 'read_word', 'word' => 'Trumpeta'],
            ['type' => 'read_word', 'word' => 'Globo'],
        ],

        14 => [
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
            
            // HANAY B: Kasabihan Page + Comprehension
            ['type' => 'kasabihan', 'kasabihan' => 'Kumain tayo ng prutas at gulay, Upang humaba ang ating buhay.'],
            ['type' => 'comprehension', 'tanong' => 'Ano-ano ang dapat na kainin ayon sa binasa?', 'answer' => 'prutas at gulay'],
            ['type' => 'comprehension', 'tanong' => 'Bakit kailangang kainin ang mga ito?', 'answer' => 'upang humaba ang ating buhay'],
        ],

        16 => [
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang kahulugan ng salitang kamusmusan?', 'choices' => ['Kabataan', 'Katandaan', 'Kawalan'], 'answer' => 'Kawalan'],
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang ibig sabihin ng salitang tumatanglaw', 'choices' => ['Nagdidilim', 'Nagbibigay-liwanag', 'Nagbibigay'], 'answer' => 'Nagbibigay-liwanag'],
            ['type' => 'multiple_choice', 'tanong' => 'Ito ay isang anyo ng sining o panitikan na naglalayong maipahayag ang damdamin sa malayang pagsusulat.', 'choices' => ['Dula', 'Kuwento', 'Tula'], 'answer' => 'Tula'],
            ['type' => 'multiple_choice', 'tanong' => 'Sa iyong palagay, sino ang nagsasalita sa tula?', 'choices' => ['Nanay', 'Tatay', 'Anak'], 'answer' => 'Anak'],
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang kasingkahulugan ng salitang karimlan?', 'choices' => ['Kaliwanagan', 'Ilawan', 'Kadiliman'], 'answer' => 'Kadiliman'],
        ],

        17 => [
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
            // Edu-Aksyon (1–5)
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang katumbas na salita ng naaprubahan?', 'choices' => ['Nasasakupan', 'Naipasa', 'Naibalik'], 'answer' => 'Naipasa'],
            ['type' => 'multiple_choice', 'tanong' => 'Ayon sa editoryal, magkano ang naaprubahang badyet ng DepEd para sa taong 2025?', 'choices' => ['P793.74 bilyon', 'P973.74 bilyon', 'P749.93 bilyon'], 'answer' => 'P793.74 bilyon'],
            ['type' => 'multiple_choice', 'tanong' => 'Sino ang senador na nanguna sa paglalaan ng badyet para sa DepEd?', 'choices' => ['Mia Cayetano', 'Pia Cayetano', 'Lia Cayetona'], 'answer' => 'Pia Cayetano'],
            ['type' => 'multiple_choice', 'tanong' => '“Ilaan sa DepEd ang naturang badyet.” Ano ang kahulugan ng salitang nakasalungguhit?', 'choices' => ['Ayusin', 'Isakatuparan', 'Ibigay'], 'answer' => 'Ibigay'],
            ['type' => 'multiple_choice', 'tanong' => 'Alin ang kahulugan ng salitang mapupunan batay sa editoryal?', 'choices' => ['Mababawasan', 'Mabibigyan', 'Mawawala'], 'answer' => 'Mabibigyan'],

            // Tuition Fee, Libre! (6–10)
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang bill na ipinakilala ni Sen. Paolo Benigno “Bam” Aquino?', 'choices' => ['Senate Bill No. 177', 'Senate Bill No. 711'], 'answer' => 'Senate Bill No. 177'],
            ['type' => 'multiple_choice', 'tanong' => 'Sino lamang ang prayoridad ng libreng tuition fee ayon sa batas?', 'choices' => ['Estudyanteng mahihirap', 'Estudyanteng mayayaman'], 'answer' => 'Estudyanteng mahihirap'],
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang kasingkahulugan ng salitang pananaw?', 'choices' => ['Opinyon', 'Panaginip'], 'answer' => 'Opinyon'],
            ['type' => 'multiple_choice', 'tanong' => 'Ano ang katumbas na salita ng estado?', 'choices' => ['Kasiyahan', 'Kalagayan'], 'answer' => 'Kalagayan'],
            ['type' => 'multiple_choice', 'tanong' => 'Ito ay nangangahulugang masinop.', 'choices' => ['Maingat', 'Maganda'], 'answer' => 'Maingat'],
        ],

        20 => [
            [
                'word' => 'pangamba',
                'answer' => 'takot',
                'wordBank' => ['Humihithit', 'takot', 'lihim', 'magkatuwang', 'bentahe', 'mailunsad', 'Matamlay', 'kapakanan', 'Lumitaw', 'madaya']
            ],
            [
                'word' => 'sumibol',
                'answer' => 'Lumitaw',
                'wordBank' => ['Humihithit', 'takot', 'lihim', 'magkatuwang', 'bentahe', 'mailunsad', 'Matamlay', 'kapakanan', 'Lumitaw', 'madaya']
            ],
            [
                'word' => 'humihipak',
                'answer' => 'Humihithit',
                'wordBank' => ['Humihithit', 'takot', 'lihim', 'magkatuwang', 'bentahe', 'mailunsad', 'Matamlay', 'kapakanan', 'Lumitaw', 'madaya']
            ],
            [
                'word' => 'lingid',
                'answer' => 'lihim',
                'wordBank' => ['Humihithit', 'takot', 'lihim', 'magkatuwang', 'bentahe', 'mailunsad', 'Matamlay', 'kapakanan', 'Lumitaw', 'madaya']
            ],
            [
                'word' => 'tuso',
                'answer' => 'madaya',
                'wordBank' => ['Humihithit', 'takot', 'lihim', 'magkatuwang', 'bentahe', 'mailunsad', 'Matamlay', 'kapakanan', 'Lumitaw', 'madaya']
            ],
            [
                'word' => 'kapakanan',
                'answer' => 'kapakanan',
                'wordBank' => ['Humihithit', 'takot', 'lihim', 'magkatuwang', 'bentahe', 'mailunsad', 'Matamlay', 'kapakanan', 'Lumitaw', 'madaya']
            ],
            [
                'word' => 'matamlay',
                'answer' => 'Matamlay',
                'wordBank' => ['Humihithit', 'takot', 'lihim', 'magkatuwang', 'bentahe', 'mailunsad', 'Matamlay', 'kapakanan', 'Lumitaw', 'madaya']
            ],
            [
                'word' => 'magkatuwang',
                'answer' => 'magkatuwang',
                'wordBank' => ['Humihithit', 'takot', 'lihim', 'magkatuwang', 'bentahe', 'mailunsad', 'Matamlay', 'kapakanan', 'Lumitaw', 'madaya']
            ],
            [
                'word' => 'bentahe',
                'answer' => 'bentahe',
                'wordBank' => ['Humihithit', 'takot', 'lihim', 'magkatuwang', 'bentahe', 'mailunsad', 'Matamlay', 'kapakanan', 'Lumitaw', 'madaya']
            ],
            [
                'word' => 'mailunsad',
                'answer' => 'mailunsad',
                'wordBank' => ['Humihithit', 'takot', 'lihim', 'magkatuwang', 'bentahe', 'mailunsad', 'Matamlay', 'kapakanan', 'Lumitaw', 'madaya']
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
        }

        Log::info('Pagtataya completed' . 'Score: ' . $this->score);
    }
    
    public function render()
    {
        return view('livewire.fourth-slide');
    }
}
