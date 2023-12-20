<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Ammunition;
use App\Models\CombatTechnique;
use App\Models\RangedCombatWeapon;
use App\Models\WeaponType;

class RangedCombatWeaponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RangedCombatWeapon::class;

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
            'reload_time' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'damage_points' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'ammunition_id' => Ammunition::factory(),
            'range_brackets' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'reach' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'weight' => $this->faker->randomFloat(2, 0, 999999.99),
            'cost' => $this->faker->randomFloat(2, 0, 999999.99),
            'url' => $this->faker->url(),
        ];
    }
}
