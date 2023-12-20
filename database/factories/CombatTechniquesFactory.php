<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CombatTechniques;
use App\Models\ImprovementCost;

class CombatTechniquesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CombatTechniques::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'primary_attribute' => $this->faker->randomElement(["DEX","AGI","STR"]),
            'improvement_cost_id' => ImprovementCost::factory(),
        ];
    }
}
