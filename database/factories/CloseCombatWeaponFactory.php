<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CloseCombatWeapon;
use App\Models\CombatTechnique;
use App\Models\WeaponType;

class CloseCombatWeaponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CloseCombatWeapon::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'weapon_type_id' => WeaponType::factory(),
            'combat_technique_id' => CombatTechnique::factory(),
            'conductive_property' => $this->faker->randomElement(["DEX","AGI","STR"]),
            'damage_threshold' => $this->faker->word(),
            'damage_points' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'attack_modification' => $this->faker->word(),
            'parry_modification' => $this->faker->word(),
            'reach' => $this->faker->randomElement(["short","medium","long"]),
            'weight' => $this->faker->randomFloat(2, 0, 999999.99),
            'cost' => $this->faker->randomFloat(2, 0, 999999.99),
            'url' => $this->faker->url(),
        ];
    }
}
