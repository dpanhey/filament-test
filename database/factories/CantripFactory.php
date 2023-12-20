<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Cantrip;

class CantripFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cantrip::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'range' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'duration' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'target_category' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'property' => $this->faker->randomElement(["Anti-Magic","Clairvoyance","Demonic","Elemental","Healing","Illusion","Influence","Object","Spheres","Telekinesis","Transformation"]),
            'url' => $this->faker->url(),
        ];
    }
}
