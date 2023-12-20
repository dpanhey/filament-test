<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Adventure;
use App\Models\Character;
use App\Models\CharacterAdventure;

class CharacterAdventureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CharacterAdventure::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'adventure_id' => Adventure::factory(),
            'character_id' => Character::factory(),
        ];
    }
}
