<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Character;
use App\Models\CharacterPurse;
use App\Models\Purse;

class CharacterPurseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CharacterPurse::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'character_id' => Character::factory(),
            'purse_id' => Purse::factory(),
            'amount' => $this->faker->word(),
        ];
    }
}
