<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Character;
use App\Models\CharacterCombatTechniques;
use App\Models\CombatTechnique;

class CharacterCombatTechniquesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CharacterCombatTechniques::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'character_id' => Character::factory(),
            'combat_tech_id' => CombatTechnique::factory(),
            'combat_technique_rating' => $this->faker->word(),
            'attack' => $this->faker->word(),
            'parry' => $this->faker->word(),
            'ranged_combat' => $this->faker->word(),
        ];
    }
}
