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

        Schema::create('chant_ceremonies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->json('aspect_group')->nullable();
            $table->json('aspect')->nullable();
            $table->text('effect');
            $table->json('check')->nullable();
            $table->string('kp_cost', 100);
            $table->string('liturgical_time', 100);
            $table->string('range', 100);
            $table->string('duration', 100);
            $table->string('target_category', 100);
            $table->foreignId('improvement_cost_id')->constrained();
            $table->string('url', 100);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chant_ceremonies');
    }
};
