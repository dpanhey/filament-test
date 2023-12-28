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

        Schema::create('spell_rituals', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->text('effect');
            $table->json('check')->nullable();
            $table->string('ae_cost', 100);
            $table->string('casting_time', 100);
            $table->string('range', 100);
            $table->string('duration', 100);
            $table->string('target_category', 100);
            $table->foreignId('property_id')->constrained();
            $table->foreignId('improvement_cost_id')->constrained();
            $table->string('url', 100)->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spell_rituals');
    }
};
