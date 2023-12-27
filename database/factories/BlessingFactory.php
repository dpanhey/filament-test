<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Blessing;

class BlessingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blessing::class;

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
            'range' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'duration' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'target_category' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'url' => $this->faker->url(),
        ];
    }
}
