<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ImprovementCost;
use App\Models\SpellRitual;

class SpellRitualFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SpellRitual::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'effect' => $this->faker->text(),
            'check' => $this->faker->randomElement(["COU","SGC","DEX","AGI","CON","STR",""]),
            'ae_cost' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'casting_time' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'range' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'duration' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'target_category' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'property' => $this->faker->randomElement(["Anti-Magic","Clairvoyance","Demonic","Elemental","Healing","Illusion","Influence","Object","Spheres","Telekinesis","Transformation"]),
            'improvement_cost_id' => ImprovementCost::factory(),
            'url' => $this->faker->url(),
        ];
    }
}
