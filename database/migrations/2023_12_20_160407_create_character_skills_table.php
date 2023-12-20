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

        Schema::create('character_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('character_id')->constrained();
            $table->foreignId('skill_id')->constrained();
            $table->string('skill_rating')->default('0');
            $table->unique(['character_id', 'skill_id']);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('character_skills');
    }
};
