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

        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('character_id')->constrained();
            $table->string('courage');
            $table->string('sagacity');
            $table->string('intuition');
            $table->string('charisma');
            $table->string('dexterity');
            $table->string('agility');
            $table->string('constitution');
            $table->string('strength');
            $table->string('life_points');
            $table->string('arcane_energy');
            $table->string('karma_points');
            $table->string('spirit');
            $table->string('toughness');
            $table->string('dodge');
            $table->string('initiative');
            $table->string('movement');
            $table->string('fate_points');
            $table->string('carrying_capacity');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributes');
    }
};
