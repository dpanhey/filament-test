<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Attribute;
use App\Models\Character;

class AttributeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attribute::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'character_id' => Character::factory(),
            'courage' => $this->faker->word(),
            'sagacity' => $this->faker->word(),
            'intuition' => $this->faker->word(),
            'charisma' => $this->faker->word(),
            'dexterity' => $this->faker->word(),
            'agility' => $this->faker->word(),
            'constitution' => $this->faker->word(),
            'strength' => $this->faker->word(),
            'life_points' => $this->faker->word(),
            'arcane_energy' => $this->faker->word(),
            'karma_points' => $this->faker->word(),
            'spirit' => $this->faker->word(),
            'toughness' => $this->faker->word(),
            'dodge' => $this->faker->word(),
            'initiative' => $this->faker->word(),
            'movement' => $this->faker->word(),
            'fate_points' => $this->faker->word(),
            'carrying_capacity' => $this->faker->word(),
        ];
    }
}
