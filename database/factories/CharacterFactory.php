<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Character;
use App\Models\CharacterSkill;
use App\Models\CharacterType;
use App\Models\Culture;
use App\Models\ExperienceLevel;
use App\Models\Profession;
use App\Models\Species;
use App\Models\User;

class CharacterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Character::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'character_name' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'family' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'place_of_birth' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'date_of_birth' => $this->faker->date(),
            'age' => $this->faker->word(),
            'sex' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'species_id' => Species::factory(),
            'size' => $this->faker->randomFloat(2, 0, 999999.99),
            'weight' => $this->faker->randomFloat(2, 0, 999999.99),
            'hair_color' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'eye_color' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'culture_id' => Culture::factory(),
            'profession_id' => Profession::factory(),
            'title' => $this->faker->sentence(4),
            'social_status' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'characteristics' => $this->faker->text(),
            'backstory' => $this->faker->text(),
            'other_information' => $this->faker->text(),
            'experience_level_id' => ExperienceLevel::factory(),
            'total_ap' => $this->faker->word(),
            'ap_unused' => $this->faker->word(),
            'ap_used' => $this->faker->word(),
            'image' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'alive' => $this->faker->boolean(),
            'character_type_id' => CharacterType::factory(),
            'character_skill_id' => CharacterSkill::factory(),
        ];
    }
}
