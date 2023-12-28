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

        Schema::create('character_combat_techniques', function (Blueprint $table) {
            $table->id();
            $table->foreignId('character_id')->constrained();
            $table->foreignId('combat_tech_id')->constrained('combat_techniques');
            $table->string('combat_technique_rating')->default('6');
            $table->string('attack')->nullable();
            $table->string('parry')->nullable();
            $table->string('ranged_combat')->nullable();
            $table->unique(['character_id', 'combat_tech_id']);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('character_combat_techniques');
    }
};
