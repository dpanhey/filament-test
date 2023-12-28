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

        Schema::create('character_adventures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('adventure_id')->constrained();
            $table->foreignId('character_id')->constrained();
            $table->unique(['adventure_id', 'character_id']);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('character_adventures');
    }
};
