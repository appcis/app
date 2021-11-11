<?php

namespace Database\Factories;

use App\Models\Sondage;
use Illuminate\Database\Eloquent\Factories\Factory;

class SondageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sondage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'libelle' => $this->faker->sentence,
            'description' => $this->faker->optional()->sentence
        ];
    }
}
