<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('experience_levels', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('adventure_points');
            $table->string('maximum_attribute_value');
            $table->string('maximum_skill_value');
            $table->string('maximum_combat_technique_value');
            $table->string('maximum_attribute_points');
            $table->string('total_number_spells_rituals');
            $table->string('number_foreign_spells');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experience_levels');
    }
};
