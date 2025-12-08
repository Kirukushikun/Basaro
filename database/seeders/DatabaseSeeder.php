<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Lesson;
use App\Models\UserTrack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $user = User::create([
            'name' => 'Iverson Guno',
            'email' => 'iversoncraigg@gmail.com',
            'password' => Hash::make('Brookside2025'),
        ]);

        $lessonTitles = [
            'Ang Alpabetong Filipino',
            'Ang Mga Patinig',
            'Pantulong na Kataga',
            'Pagsasama-sama ng mga tunog (M, S, A)',
            'Pagbuo ng mga Parirala at Pangungusap',
            'M, S, A, I, O at B',
            'E, U, T, K, L, Y at N',
            'Pag-unawa sa Binasang Pangungusap',
            'Pagbasa ng mga Pantig',
            'Pagbasa ng mga Pangunahing Salita',
            'Pagpapalawak ng mga Bokabularyo',
            'Diptonggo',
            'Kambal Katinig',
            'Panlapi',
            'Pag-unawa sa Binasang Karunungang-bayan',
            'Pag-unawa sa Binasang Awiting-bayan',
            'Pag-unawa sa Binasang Tula',
            'Pag-unawa sa Binasang Maikling Kuwento',
            'Pag-unawa sa Binasang Diyalogo',
            'Pag-unawa sa Binasang Balita',
            'Pag-unawa sa Binasang Editoryal',
            'Pag-unawa sa Binasang Dula',
        ];

        $lessonDescriptions = [
            'Ang Alpabetong Filipino' => 'Pagkilala sa mga letra ng alpabetong Filipino at tamang pagbasa ng mga ito.',
            'Ang Mga Patinig' => 'Pagkilala at tamang pagbigkas ng limang pangunahing patinig.',
            'Pantulong na Kataga' => 'Pagkilala sa mga pantulong na kataga na ginagamit sa pangungusap.',
            'Pagsasama-sama ng mga tunog (M, S, A)' => 'Pagsasanay sa pagsasanib ng mga tunog upang makabuo ng mga pantig.',
            'Pagbuo ng mga Parirala at Pangungusap' => 'Pagbuo at pag-unawa ng simpleng parirala at pangungusap.',
            'M, S, A, I, O at B' => 'Pagkilala at pagbigkas sa mga tunog ng mga letrang M, S, A, I, O at B.',
            'E, U, T, K, L, Y at N' => 'Pagkilala at pagbigkas sa mga tunog ng mga letrang E, U, T, K, L, Y at N.',
            'Pag-unawa sa Binasang Pangungusap' => 'Pagsasanay sa pag-unawa ng kahulugan ng mga binasang pangungusap.',
            'Pagbasa ng mga Pantig' => 'Pagsasanay sa pagbasa at pagbuo ng iba’t ibang uri ng pantig.',
            'Pagbasa ng mga Pangunahing Salita' => 'Pagkilala at pagbasa ng mga salitang karaniwang ginagamit.',
            'Pagpapalawak ng mga Bokabularyo' => 'Pagkilala sa bagong salita at wastong paggamit ng mga ito.',
            'Diptonggo' => 'Pagkilala at pagbigkas ng mga salitang may diptonggo.',
            'Kambal Katinig' => 'Pagkilala sa mga salitang may kambal katinig at tamang pagbigkas.',
            'Panlapi' => 'Pagkilala sa mga panlapi at pagbubuo ng salita gamit ang mga ito.',
            'Pag-unawa sa Binasang Karunungang-bayan' => 'Pagkilala at pag-unawa sa mensahe ng mga karunungang-bayan.',
            'Pag-unawa sa Binasang Awiting-bayan' => 'Pag-unawa sa nilalaman at tema ng mga awiting-bayan.',
            'Pag-unawa sa Binasang Tula' => 'Pagkilala sa mensahe at damdamin na ipinahahayag sa tula.',
            'Pag-unawa sa Binasang Maikling Kuwento' => 'Pagkilala sa tauhan, lugar, at pangyayari sa isang maikling kuwento.',
            'Pag-unawa sa Binasang Diyalogo' => 'Pag-unawa sa usapan at sitwasyon sa isang diyalogo.',
            'Pag-unawa sa Binasang Balita' => 'Pag-unawa sa mahahalagang detalye ng isang balita.',
            'Pag-unawa sa Binasang Editoryal' => 'Pagkilala sa opinyon at layunin ng isang editoryal.',
            'Pag-unawa sa Binasang Dula' => 'Pagkilala sa kilos, tauhan, at tagpo sa isang dula.',
        ];

        foreach($lessonTitles as $index => $lesson){
            Lesson::create([
                'title' => $lesson,
                'description' => $lessonDescriptions[$lesson],
                'total_scores' => '35',
                'order' => $index + 1,
                'type' => null
            ]);
        }

        UserTrack::create([
            'user_id' => $user->id,
            'lesson_id' => 1,
            'score' => 0,
            'attempts' => 0,
        ]);
    }
}
