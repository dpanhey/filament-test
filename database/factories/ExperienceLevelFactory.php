<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ExperienceLevel;

class ExperienceLevelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExperienceLevel::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'adventure_points' => $this->faker->word(),
            'maximum_attribute_value' => $this->faker->word(),
            'maximum_skill_value' => $this->faker->word(),
            'maximum_combat_technique_value' => $this->faker->word(),
            'maximum_attribute_points' => $this->faker->word(),
            'total_number_spells_rituals' => $this->faker->word(),
            'number_foreign_spells' => $this->faker->word(),
        ];
    }
}
