<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\SpecialAbility;

class SpecialAbilityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SpecialAbility::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'ability_type' => $this->faker->randomElement(["General Special Ability","Magical Special Ability","Blessed Special Ability","Combat Special Ability"]),
            'rules' => $this->faker->text(),
            'requirements' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'ap_value' => $this->faker->word(),
            'url' => $this->faker->url(),
        ];
    }
}
