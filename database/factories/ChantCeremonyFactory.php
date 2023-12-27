<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ChantCeremony;
use App\Models\ImprovementCost;

class ChantCeremonyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChantCeremony::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'aspect_group' => '{}',
            'aspect' => '{}',
            'effect' => $this->faker->text(),
            'check' => '{}',
            'kp_cost' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'liturgical_time' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'range' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'duration' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'target_category' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'improvement_cost_id' => ImprovementCost::factory(),
            'url' => $this->faker->url(),
        ];
    }
}
