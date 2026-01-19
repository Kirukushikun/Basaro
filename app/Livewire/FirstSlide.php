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
            "Naibebenta ang tunog sa mga salitang naglalaman nito.",
            "Naiuugnay ang mga tunog sa pagbasa at pagsusuri ng mga simpleng salita."
        ],

        8 => [
            "Naiintindihan ang kahulugan ng binasang pangungusap.",
            "Natutukoy ang pangunahing ideya ng pangungusap.",
            "Nailalarawan ang kaisipan batay sa binasa.",
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
            "Naiuugnay ang salita sa larawan o sitwasyon.",
            "Nagagamit ang mga pangunahing salita sa simpleng pangungusap."
        ],

        11 => [
            "Naiuugnay ang salitang bago sa kahulugan nito.",
            "Nakikilala ang bagong bokabularyo sa binasa.",
            "Naiisa-isa ang mga salitang bago at ang kahulugan nito.",
            "Nailalapat ang mga bagong salita sa iba’t ibang sitwasyon."
        ],

        12 => [
            "Nakikilala ang mga diptonggo sa salita.",
            "Nabibigkas nang tama ang mga salitang may diptonggo.",
            "Natatukoy ang diptonggo sa binasang salita.",
            "Nagagamit ang kaalaman sa diptonggo sa pagbasa."
        ],

        13 => [
            "Nakikilala ang mga kambal katinig sa mga salita.",
            "Nabibigkas ang mga salitang may kambal katinig nang wasto.",
            "Natutukoy ang kambal katinig sa binasang salita.",
            "Nagagamit ang kambal katinig sa pagbasa ng mas mahahabang salita."
        ],

        14 => [
            "Nakikilala ang iba’t ibang uri ng panlapi.",
            "Natutukoy ang salitang-ugat sa loob ng salita.",
            "Nabubuo ang salita gamit ang angkop na panlapi.",
            "Naiuugnay ang mga nabubuong salita sa kahulugan nito."
        ],

        15 => [
            "Nauunawaan ang binasang karunungang-bayan.",
            "Natutukoy ang aral o mensahe nito.",
            "Naiuugnay ang karunungang-bayan sa sariling karanasan.",
            "Naipapakita ang pagpapahalaga sa kulturang Pilipino."
        ],

        16 => [
            "Nauunawaan ang binasang awiting-bayan.",
            "Nabibigkas ang bahagi nito nang may wastong himig.",
            "Natutukoy ang temang makikita sa awiting-bayan.",
            "Naiuugnay ang awiting-bayan sa kultura at tradisyon."
        ],

        17 => [
            "Naiintindihan ang elemento ng tula.",
            "Nabibigkas ang tula nang may tamang himig at damdamin.",
            "Natutukoy ang mensahe ng binasang tula.",
            "Nailalapat ang aral ng tula sa pang-araw-araw na buhay."
        ],

        18 => [
            "Nauunawaan ang banghay ng maikling kuwento.",
            "Natutukoy ang tauhan, tagpuan, at pangyayari.",
            "Naiisa-isa ang mahahalagang detalye ng kuwento.",
            "Naiuugnay ang aral sa sariling karanasan."
        ],

        19 => [
            "Natutukoy ang mga tauhan sa binasang diyalogo.",
            "Nauunawaan ang layunin ng bawat linya.",
            "Nabibigkas ang diyalogo nang may tamang damdamin.",
            "Naiuugnay ang diyalogo sa mga pang-araw-araw na sitwasyon."
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
