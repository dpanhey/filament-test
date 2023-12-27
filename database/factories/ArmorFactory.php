<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Armor;

class ArmorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Armor::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'protection' => $this->faker->word(),
            'encumbrance' => $this->faker->word(),
            'additional_penalties' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'weight' => $this->faker->randomFloat(2, 0, 999999.99),
            'cost' => $this->faker->randomFloat(2, 0, 999999.99),
            'url' => $this->faker->url(),
        ];
    }
}
