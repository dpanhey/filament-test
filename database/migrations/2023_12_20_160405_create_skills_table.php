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

        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skill_group_id')->constrained();
            $table->string('name', 100);
            $table->text('description');
            $table->set('check', ["COU","SGC","DEX","AGI","CON","STR",""]);
            $table->boolean('encumbrance');
            $table->foreignId('improvement_cost_id')->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
