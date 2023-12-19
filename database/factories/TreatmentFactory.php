<?php

namespace Database\Factories;

use App\Models\Treatment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TreatmentFactory extends Factory
{
    protected $model = Treatment::class;

    public function definition()
    {
        return [
            'description' => $this->faker->text(),
            'notes' => $this->faker->word(),
            'patient_id' => $this->faker->randomNumber(),
            'price' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
