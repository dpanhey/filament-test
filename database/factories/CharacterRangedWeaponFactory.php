<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Character;
use App\Models\CharacterRangedWeapon;
use App\Models\RangedCombatWeapon;

class CharacterRangedWeaponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CharacterRangedWeapon::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'character_id' => Character::factory(),
            'ranged_weapon_id' => RangedCombatWeapon::factory(),
            'ranged_combat' => $this->faker->word(),
        ];
    }
}
