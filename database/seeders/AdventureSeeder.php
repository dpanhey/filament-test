<?php

namespace Database\Seeders;

use App\Models\Adventure;
use Illuminate\Database\Seeder;

class AdventureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Adventure::factory()->count(5)->create();
    }
}
