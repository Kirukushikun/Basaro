<?php

namespace App\Livewire;

use Livewire\Component;

class FirstSlide extends Component
{   
    public $lesson;

    public $lessonLayunin = [
        1 => [
            "Nakikilala ang bawat letra sa Alpabetong Filipino.",
            "Nabibigkas ang wastong tunog ng mga letra.",
            "Nakakasunod sa mga simpleng tagubilin patungkol sa pagbasa at pagbigkas.",
            "Nabibigyang-halaga ang patuloy na pagsasanay bilang bahagi ng pagkatuto sa pagbasa."
        ],

        2 => [
            "Nakikilala ang limang patinig ng Filipino.",
            "Nabibigkas nang malinaw ang tunog ng bawat patinig.",
            "Naipapakita ang pag-unawa sa pagkakaiba ng mga tunog-patinig.",
            "Nailalapat ang kaalaman sa patinig sa mga simpleng gawain sa pagbasa."
        ],

        3 => [
            "Nakikilala ang mga pantulong na kataga.",
            "Nababasa ang mga pantulong na kataga.",
            "Nauuanwaang ang kahulugan ng mga pantulong na kataga.",
        ],

        4 => [
            "Nakabubuo ng mga pantig gamit ang tunog ng M, S, at A.",
            "Nabibigkas nang tama ang mga tunog na M, S, at A.",
            "Nakababasa ng mga pantig at salita gamit ang M, S, at A.",
        ],

        5 => [
            "Nalalaman ang parirala at pangungusap.",
            "Nababasa ang mga parirala at pangungusap.",
        ],

        6 => [
            "Nakikilala ang mga letrang M, S, A, I, O at B.",
            "Nabibigkas ang tamang tunog ng bawat letra.",
            "Nababasa ang mga salitang mabuo mula sa M, S, A, I, O at B.",
        ],

        7 => [
            "Nakikilala ang mga letrang E, U, T, K, L, Y at N.",
            "Nabibigkas ang wastong tunog ng bawat isa.",
            "Nababasa ang mga salitang nabuo mula sa mga tunog ng E, U, T, K, L, Y at N.",
        ],

        8 => [
            "Nalalaman ang kahulugan ng talata",
            "Nababasa ang talata",
            "Naipapakita ang pag-unawa sa pamamagitan ng pagsagot sa mga tanong."
        ],

        9 => [
            "Nakikilala ang mga pantig sa isang salita.",
            "Naihahati ang salita ayon sa tamang pagpapantig.",
            "Nabibigkas ang mga pantig nang malinaw at wasto.",
            "Nagagamit ang kaalaman sa pantig sa pagbasa ng mga salita."
        ],

        10 => [
            "Nakikilala ang mga pangunahing salitang karaniwang ginagamit.",
            "Nabibigkas nang tama ang mga salitang ito.",
        ],

        11 => [
            "Natutukoy ang kasing kahulugan at kasalungat ng mga salita.",
            "Nababasa ang mga magkakasing kahulugan at magkakasalungat na salita.",
        ],

        12 => [
            "Nakikilala ang mga diptonggo sa salita.",
            "Nabibigkas nang tama ang mga salitang may diptonggo.",
            "Nababasa ang mga salita na may diptonggo.",
        ],

        13 => [
            "Nakikilala ang mga kambal katinig sa mga salita.",
            "Nabibigkas ang mga salitang may kambal katinig nang wasto.",
            "Natutukoy ang kambal katinig sa binasang salita.",
        ],

        14 => [
            "Nakikilala ang iba’t ibang uri ng panlapi.",
            "Nababasa ang mga salitang may panlapi.",
        ],

        15 => [
            "Nauunawaan ang binasang karunungang-bayan.",
            "Naipapakita ang pagpapahalaga sa kulturang Pilipino."
        ],

        16 => [
            "Nakakabasa ng mga tula.",
            "Nauunawaan ang mga binasang tula.",
        ],

        17 => [
            "Nakababasa ng mga maikling kwento.",
            "Nauunawaan ang mga binasang maikling kuwento.",
        ],

        18 => [
            "Nakababasa ng mga balita.",
            "Nauunawaan ang mga binasang balita.",
            "Nahihimay ang mahahalagang detalye sa mga binasang balita.",
        ],

        19 => [
            "Natutukoy ang kahulugan ng editoryal.",
            "Nakakabasa ng artikulong editoryal.",
            "Nauunawaan ang mga binasang artikulo.",
        ],

        20 => [
            "Naitutukoy ang kahulugan ng artikulong pang-agham at teknolohiya.",
            "Nakababasa nang may pang-unawa sa mga artikulong pang-agham at teknolohiya.",
            "Nahihimay ang mga mahahalagang detalye sa mga binasang artikulo.",
        ],
    ];

    public $layunin;

    public $page = 1;

    public function mount($lesson){
        $this->lesson = $lesson;

        if($lesson != 1){
            // Skip page 1 if not lesson 1
            $this->page = 2;
        }

        $this->layunin = $this->lessonLayunin[$lesson];
    }
    public function render()
    {
        return view('livewire.first-slide');
    }
}
