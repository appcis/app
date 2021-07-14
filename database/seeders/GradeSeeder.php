<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grades = collect([
            ['lib_court' => 'SAP', 'lib_long' => 'Sapeur'],
            ['lib_court' => 'SAP1', 'lib_long' => 'Sapeur 1cl'],
            ['lib_court' => 'CPL', 'lib_long' => 'Caporal'],
            ['lib_court' => 'CCH', 'lib_long' => 'Caporal-chef'],
            ['lib_court' => 'SGT', 'lib_long' => 'Sergent'],
            ['lib_court' => 'SCH', 'lib_long' => 'Sergent-chef'],
            ['lib_court' => 'ADJ', 'lib_long' => 'Adjudant'],
            ['lib_court' => 'ADC', 'lib_long' => 'Adjudant-chef'],
        ]);

        $grades->each(function ($grade) {
            Grade::create($grade);
        });
    }
}
