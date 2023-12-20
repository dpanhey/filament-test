<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ImprovementCost;
use App\Models\Skill;
use App\Models\SkillGroup;

class SkillFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Skill::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'skill_group_id' => SkillGroup::factory(),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'check' => $this->faker->randomElement(["COU","SGC","DEX","AGI","CON","STR",""]),
            'encumbrance' => $this->faker->boolean(),
            'improvement_cost_id' => ImprovementCost::factory(),
        ];
    }
}
