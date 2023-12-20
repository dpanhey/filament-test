<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Character;
use App\Models\CharacterCloseWeapon;
use App\Models\CloseCombatWeapon;

class CharacterCloseWeaponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CharacterCloseWeapon::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'character_id' => Character::factory(),
            'close_weapon_id' => CloseCombatWeapon::factory(),
            'attack' => $this->faker->word(),
            'parry' => $this->faker->word(),
        ];
    }
}
