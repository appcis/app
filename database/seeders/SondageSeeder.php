<?php

namespace Database\Seeders;

use App\Models\Sondage;
use Illuminate\Database\Seeder;

class SondageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sondages = [
            ['libelle' => 'Arbre de noël', 'reponses' => ['Participera', 'Ne participera pas']],
            ['libelle' => 'Ski 2022', 'description' => 'WE au Marmotel à Praloup', 'reponses' => ['Participera', 'Ne participera pas']]
        ];

        foreach ($sondages as $sondage) {
            Sondage::create($sondage);
        }
    }
}
