<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\AchatParution;
use App\Models\Client;
use App\Models\Parution;

class AchatParutionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AchatParution::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'prix' => $this->faker->numberBetween(-10000, 10000),
            'paye_par' => $this->faker->word,
            'parution_id' => Parution::factory(),
            'client_id' => Client::factory(),
        ];
    }
}
