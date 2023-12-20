<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ChantCeremony;
use App\Models\ChantCeremonyCharacter;
use App\Models\Character;

class ChantCeremonyCharacterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChantCeremonyCharacter::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'character_id' => Character::factory(),
            'chant_ceremony_id' => ChantCeremony::factory(),
            'skill_rating' => $this->faker->word(),
        ];
    }
}
