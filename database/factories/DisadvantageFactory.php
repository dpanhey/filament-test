<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Disadvantage;

class DisadvantageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Disadvantage::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'rules' => $this->faker->text(),
            'requirements' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'ap_value' => $this->faker->word(),
            'url' => $this->faker->url(),
        ];
    }
}
