<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Attribute;
use App\Models\AttributeCharacter;
use App\Models\Character;

class AttributeCharacterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AttributeCharacter::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'character_id' => Character::factory(),
            'attribute_id' => Attribute::factory(),
            'value' => $this->faker->word(),
        ];
    }
}
