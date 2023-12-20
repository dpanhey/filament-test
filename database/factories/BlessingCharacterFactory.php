<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Blessing;
use App\Models\BlessingCharacter;
use App\Models\Character;

class BlessingCharacterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlessingCharacter::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'character_id' => Character::factory(),
            'blessing_id' => Blessing::factory(),
        ];
    }
}
