<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Character;
use App\Models\CharacterSpellRitual;
use App\Models\SpellRitual;

class CharacterSpellRitualFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CharacterSpellRitual::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'character_id' => Character::factory(),
            'spell_ritual_id' => SpellRitual::factory(),
            'skill_rating' => $this->faker->word(),
        ];
    }
}
