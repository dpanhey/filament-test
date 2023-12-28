<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\PhysicalSkill;

class PhysicalSkillFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PhysicalSkill::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'body_control' => $this->faker->word(),
            'carousing' => $this->faker->word(),
            'climbing' => $this->faker->word(),
            'dancing' => $this->faker->word(),
            'feat_of_strength' => $this->faker->word(),
        ];
    }
}
