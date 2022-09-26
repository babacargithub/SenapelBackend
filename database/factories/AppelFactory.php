<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Appel;

class AppelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->word,
            'sous_titre' => $this->faker->word,
            'contenu' => $this->faker->text,
            'date_expiration' => $this->faker->dateTime(),
            'paru_dans' => $this->faker->word,
        ];
    }
}
