<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Appel;
use App\Models\CategorieAppel;
use App\Models\Parution;

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
            'date_appel' => $this->faker->dateTime(),
            'date_limite' => $this->faker->dateTime(),
            'publie_dans' => $this->faker->word,
            'autorite' => $this->faker->word,
            'parution_id' => Parution::factory(),
            'categorie_appel_id' => CategorieAppel::factory(),
        ];
    }
}
