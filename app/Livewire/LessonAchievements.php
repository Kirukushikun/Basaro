<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Achievement;
use Illuminate\Support\Facades\Auth;

class LessonAchievements extends Component
{
    public $achievementHeaders = [
        // Lesson 1: Ang Alpabetong Filipino
        1 => [
            'pagsasanay' => [
                'gold' => 'Dalubhasa sa Alpabeto',
                'silver' => 'Mahusay sa Alpabeto', 
                'bronze' => 'Nakapagsanay sa Alpabeto'
            ],
            'pagtataya' => [
                'gold' => 'Perpekto sa Pagsusulit ng Alpabeto',
                'silver' => 'Mahusay sa Pagsusulit ng Alpabeto',
                'bronze' => 'Nakatapos ng Pagsusulit ng Alpabeto'
            ]
        ],
        
        // Lesson 2: Ang Mga Patinig
        2 => [
            'pagsasanay' => [
                'gold' => 'Dalubhasa sa mga Patinig',
                'silver' => 'Mahusay sa mga Patinig',
                'bronze' => 'Nakapagsanay sa mga Patinig'
            ],
            'pagtataya' => [
                'gold' => 'Perpekto sa Pagsusulit ng mga Patinig',
                'silver' => 'Mahusay sa Pagsusulit ng mga Patinig',
                'bronze' => 'Nakatapos ng Pagsusulit ng mga Patinig'
            ]
        ],

        // Lesson 3: Pantulong na Kataga
        3 => [
            'pagsasanay' => [
                'gold' => 'Dalubhasa sa Pantulong na Kataga',
                'silver' => 'Mahusay sa Pantulong na Kataga',
                'bronze' => 'Nakapagsanay sa Pantulong na Kataga'
            ],
            'pagtataya' => [
                'gold' => 'Perpekto sa Pagsusulit ng Pantulong na Kataga',
                'silver' => 'Mahusay sa Pagsusulit ng Pantulong na Kataga',
                'bronze' => 'Nakatapos ng Pagsusulit ng Pantulong na Kataga'
            ]
        ],

        // Lesson 4: Pagsasama-sama ng mga tunog
        4 => [
            'pagsasanay' => [
                'gold' => 'Dalubhasa sa Pagsasama ng mga Tunog',
                'silver' => 'Mahusay sa Pagsasama ng mga Tunog',
                'bronze' => 'Nakapagsanay sa Pagsasama ng mga Tunog'
            ],
            'pagtataya' => [
                'gold' => 'Perpekto sa Pagsusulit ng Pagsasama ng Tunog',
                'silver' => 'Mahusay sa Pagsusulit ng Pagsasama ng Tunog',
                'bronze' => 'Nakatapos ng Pagsusulit ng Pagsasama ng Tunog'
            ]
        ],

        // Lesson 5: Pagbuo ng mga Parirala at Pangungusap
        5 => [
            'pagsasanay' => [
                'gold' => 'Dalubhasa sa Pagbuo ng Pangungusap',
                'silver' => 'Mahusay sa Pagbuo ng Pangungusap',
                'bronze' => 'Nakapagsanay sa Pagbuo ng Pangungusap'
            ],
            'pagtataya' => [
                'gold' => 'Perpekto sa Pagsusulit ng Pagbuo ng Pangungusap',
                'silver' => 'Mahusay sa Pagsusulit ng Pagbuo ng Pangungusap',
                'bronze' => 'Nakatapos ng Pagsusulit ng Pagbuo ng Pangungusap'
            ]
        ],

        // Lesson 6: M, S, A, I, O at B
        6 => [
            'pagsasanay' => [
                'gold' => 'Dalubhasa sa mga Letrang M, S, A, I, O at B',
                'silver' => 'Mahusay sa mga Letrang M, S, A, I, O at B',
                'bronze' => 'Nakapagsanay sa mga Letrang M, S, A, I, O at B'
            ],
            'pagtataya' => [
                'gold' => 'Perpekto sa Pagsusulit ng M, S, A, I, O at B',
                'silver' => 'Mahusay sa Pagsusulit ng M, S, A, I, O at B',
                'bronze' => 'Nakatapos ng Pagsusulit ng M, S, A, I, O at B'
            ]
        ],

        // Lesson 7: E, U, T, K, L, Y at N
        7 => [
            'pagsasanay' => [
                'gold' => 'Dalubhasa sa mga Letrang E, U, T, K, L, Y at N',
                'silver' => 'Mahusay sa mga Letrang E, U, T, K, L, Y at N',
                'bronze' => 'Nakapagsanay sa mga Letrang E, U, T, K, L, Y at N'
            ],
            'pagtataya' => [
                'gold' => 'Perpekto sa Pagsusulit ng E, U, T, K, L, Y at N',
                'silver' => 'Mahusay sa Pagsusulit ng E, U, T, K, L, Y at N',
                'bronze' => 'Nakatapos ng Pagsusulit ng E, U, T, K, L, Y at N'
            ]
        ],

        // Lesson 8: Pag-unawa sa Binasang Talata
        8 => [
            'pagsasanay' => [
                'gold' => 'Dalubhasa sa Pag-unawa ng Talata',
                'silver' => 'Mahusay sa Pag-unawa ng Talata',
                'bronze' => 'Nakapagsanay sa Pag-unawa ng Talata'
            ],
            'pagtataya' => [
                'gold' => 'Perpekto sa Pagsusulit ng Pag-unawa ng Talata',
                'silver' => 'Mahusay sa Pagsusulit ng Pag-unawa ng Talata',
                'bronze' => 'Nakatapos ng Pagsusulit ng Pag-unawa ng Talata'
            ]
        ],

        // Lesson 9: Pagbasa ng mga Pantig
        9 => [
            'pagsasanay' => [
                'gold' => 'Dalubhasa sa Pagbasa ng mga Pantig',
                'silver' => 'Mahusay sa Pagbasa ng mga Pantig',
                'bronze' => 'Nakapagsanay sa Pagbasa ng mga Pantig'
            ],
            'pagtataya' => [
                'gold' => 'Perpekto sa Pagsusulit ng Pagbasa ng Pantig',
                'silver' => 'Mahusay sa Pagsusulit ng Pagbasa ng Pantig',
                'bronze' => 'Nakatapos ng Pagsusulit ng Pagbasa ng Pantig'
            ]
        ],

        // Lesson 10: Pagbasa ng mga Pangunahing Salita
        10 => [
            'pagsasanay' => [
                'gold' => 'Dalubhasa sa Pagbasa ng mga Salita',
                'silver' => 'Mahusay sa Pagbasa ng mga Salita',
                'bronze' => 'Nakapagsanay sa Pagbasa ng mga Salita'
            ],
            'pagtataya' => [
                'gold' => 'Perpekto sa Pagsusulit ng Pagbasa ng Salita',
                'silver' => 'Mahusay sa Pagsusulit ng Pagbasa ng Salita',
                'bronze' => 'Nakatapos ng Pagsusulit ng Pagbasa ng Salita'
            ]
        ],

        // Lesson 11: Pagpapalawak ng mga Bokabularyo
        11 => [
            'pagsasanay' => [
                'gold' => 'Dalubhasa sa Pagpapalawak ng Bokabularyo',
                'silver' => 'Mahusay sa Pagpapalawak ng Bokabularyo',
                'bronze' => 'Nakapagsanay sa Pagpapalawak ng Bokabularyo'
            ],
            'pagtataya' => [
                'gold' => 'Perpekto sa Pagsusulit ng Bokabularyo',
                'silver' => 'Mahusay sa Pagsusulit ng Bokabularyo',
                'bronze' => 'Nakatapos ng Pagsusulit ng Bokabularyo'
            ]
        ],

        // Lesson 12: Diptonggo
        12 => [
            'pagsasanay' => [
                'gold' => 'Dalubhasa sa Diptonggo',
                'silver' => 'Mahusay sa Diptonggo',
                'bronze' => 'Nakapagsanay sa Diptonggo'
            ],
            'pagtataya' => [
                'gold' => 'Perpekto sa Pagsusulit ng Diptonggo',
                'silver' => 'Mahusay sa Pagsusulit ng Diptonggo',
                'bronze' => 'Nakatapos ng Pagsusulit ng Diptonggo'
            ]
        ],

        // Lesson 13: Kambal Katinig
        13 => [
            'pagsasanay' => [
                'gold' => 'Dalubhasa sa Kambal Katinig',
                'silver' => 'Mahusay sa Kambal Katinig',
                'bronze' => 'Nakapagsanay sa Kambal Katinig'
            ],
            'pagtataya' => [
                'gold' => 'Perpekto sa Pagsusulit ng Kambal Katinig',
                'silver' => 'Mahusay sa Pagsusulit ng Kambal Katinig',
                'bronze' => 'Nakatapos ng Pagsusulit ng Kambal Katinig'
            ]
        ],

        // Lesson 14: Panlapi
        14 => [
            'pagsasanay' => [
                'gold' => 'Dalubhasa sa Panlapi',
                'silver' => 'Mahusay sa Panlapi',
                'bronze' => 'Nakapagsanay sa Panlapi'
            ],
            'pagtataya' => [
                'gold' => 'Perpekto sa Pagsusulit ng Panlapi',
                'silver' => 'Mahusay sa Pagsusulit ng Panlapi',
                'bronze' => 'Nakatapos ng Pagsusulit ng Panlapi'
            ]
        ],

        // Lesson 15: Pag-unawa sa Binasang Karunungang-bayan
        15 => [
            'pagsasanay' => [
                'gold' => 'Dalubhasa sa Karunungang-bayan',
                'silver' => 'Mahusay sa Karunungang-bayan',
                'bronze' => 'Nakapagsanay sa Karunungang-bayan'
            ],
            'pagtataya' => [
                'gold' => 'Perpekto sa Pagsusulit ng Karunungang-bayan',
                'silver' => 'Mahusay sa Pagsusulit ng Karunungang-bayan',
                'bronze' => 'Nakatapos ng Pagsusulit ng Karunungang-bayan'
            ]
        ],

        // Lesson 16: Pag-unawa sa Binasang Tula
        16 => [
            'pagsasanay' => [
                'gold' => 'Dalubhasa sa Pag-unawa ng Tula',
                'silver' => 'Mahusay sa Pag-unawa ng Tula',
                'bronze' => 'Nakapagsanay sa Pag-unawa ng Tula'
            ],
            'pagtataya' => [
                'gold' => 'Perpekto sa Pagsusulit ng Pag-unawa ng Tula',
                'silver' => 'Mahusay sa Pagsusulit ng Pag-unawa ng Tula',
                'bronze' => 'Nakatapos ng Pagsusulit ng Pag-unawa ng Tula'
            ]
        ],

        // Lesson 17: Pag-unawa sa Binasang Maikling Kuwento
        17 => [
            'pagsasanay' => [
                'gold' => 'Dalubhasa sa Pag-unawa ng Kuwento',
                'silver' => 'Mahusay sa Pag-unawa ng Kuwento',
                'bronze' => 'Nakapagsanay sa Pag-unawa ng Kuwento'
            ],
            'pagtataya' => [
                'gold' => 'Perpekto sa Pagsusulit ng Pag-unawa ng Kuwento',
                'silver' => 'Mahusay sa Pagsusulit ng Pag-unawa ng Kuwento',
                'bronze' => 'Nakatapos ng Pagsusulit ng Pag-unawa ng Kuwento'
            ]
        ],

        // Lesson 18: Pag-unawa sa Binasang Balita
        18 => [
            'pagsasanay' => [
                'gold' => 'Dalubhasa sa Pag-unawa ng Balita',
                'silver' => 'Mahusay sa Pag-unawa ng Balita',
                'bronze' => 'Nakapagsanay sa Pag-unawa ng Balita'
            ],
            'pagtataya' => [
                'gold' => 'Perpekto sa Pagsusulit ng Pag-unawa ng Balita',
                'silver' => 'Mahusay sa Pagsusulit ng Pag-unawa ng Balita',
                'bronze' => 'Nakatapos ng Pagsusulit ng Pag-unawa ng Balita'
            ]
        ],

        // Lesson 19: Pag-unawa sa Binasang Editoryal
        19 => [
            'pagsasanay' => [
                'gold' => 'Dalubhasa sa Pag-unawa ng Editoryal',
                'silver' => 'Mahusay sa Pag-unawa ng Editoryal',
                'bronze' => 'Nakapagsanay sa Pag-unawa ng Editoryal'
            ],
            'pagtataya' => [
                'gold' => 'Perpekto sa Pagsusulit ng Pag-unawa ng Editoryal',
                'silver' => 'Mahusay sa Pagsusulit ng Pag-unawa ng Editoryal',
                'bronze' => 'Nakatapos ng Pagsusulit ng Pag-unawa ng Editoryal'
            ]
        ],

        // Lesson 20: Pag-unawa sa Binasang Artikulong Pang-agham
        20 => [
            'pagsasanay' => [
                'gold' => 'Dalubhasa sa Artikulong Pang-agham',
                'silver' => 'Mahusay sa Artikulong Pang-agham',
                'bronze' => 'Nakapagsanay sa Artikulong Pang-agham'
            ],
            'pagtataya' => [
                'gold' => 'Perpekto sa Pagsusulit ng Artikulong Pang-agham',
                'silver' => 'Mahusay sa Pagsusulit ng Artikulong Pang-agham',
                'bronze' => 'Nakatapos ng Pagsusulit ng Artikulong Pang-agham'
            ]
        ],
    ];

    public $lessonTitles = [
        'Ang Alpabetong Filipino',
        'Ang Mga Patinig',
        'Pantulong na Kataga',
        'Pagsasama-sama ng mga tunog (M, S, A)',
        'Pagbuo ng mga Parirala at Pangungusap',

        'M, S, A, I, O at B',
        'E, U, T, K, L, Y at N',
        'Pag-unawa sa Binasang Talata',
        'Pagbasa ng mga Pantig',
        'Pagbasa ng mga Pangunahing Salita',

        'Pagpapalawak ng mga Bokabularyo',
        'Diptonggo',
        'Kambal Katinig',
        'Panlapi',
        'Pag-unawa sa Binasang Karunungang-bayan',

        'Pag-unawa sa Binasang Tula',
        'Pag-unawa sa Binasang Maikling Kuwento',
        'Pag-unawa sa Binasang Balita',
        'Pag-unawa sa Binasang Editoryal',
        'Pag-unawa sa Binasang Artikulong Pang-agham at Teknolohiya',
    ];

    public function render()
    {
        $achievements = Achievement::where('user_id', Auth::id())
            ->orderBy('lesson')
            ->orderBy('type')
            ->orderByRaw("FIELD(medal, 'gold', 'silver', 'bronze')")
            ->get();

        return view('livewire.lesson-achievements', [
            'achievements' => $achievements
        ]);
    }

    public function getAchievementDescription($lesson, $type, $medal)
    {
        $lessonTitle = $this->lessonTitles[$lesson - 1];
        
        $medalText = match($medal) {
            'gold' => 'gintong',
            'silver' => 'pilak na',
            'bronze' => 'tansong',
        };
        
        $typeText = match($type) {
            'pagsasanay' => 'natapos mo ang pagsasanay',
            'pagtataya' => 'pumasa ka sa pagtataya',
        };
        
        return "Nakuha mo ang {$medalText} ribbon sa Sesyon {$lesson}: {$lessonTitle} nang {$typeText} sa araling ito.";
    }

    public function getMedalImage($medal)
    {
        return match($medal) {
            'gold' => 'img/gold.png',
            'silver' => 'img/silver.png',
            'bronze' => 'img/bronze.png',
            default => 'img/bronze.png'
        };
    }
}
