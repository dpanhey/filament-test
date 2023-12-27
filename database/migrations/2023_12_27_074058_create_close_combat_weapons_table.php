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

        Schema::create('close_combat_weapons', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->foreignId('weapon_type_id')->constrained();
            $table->foreignId('combat_technique_id')->constrained();
            $table->json('conductive_property')->nullable();
            $table->string('damage_threshold');
            $table->string('damage_points', 100);
            $table->string('attack_modification');
            $table->string('parry_modification');
            $table->decimal('weight', 8, 2);
            $table->decimal('cost', 8, 2);
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
        Schema::dropIfExists('close_combat_weapons');
    }
};
