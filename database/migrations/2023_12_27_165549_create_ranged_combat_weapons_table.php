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

        Schema::create('ranged_combat_weapons', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->foreignId('weapon_type_id')->constrained();
            $table->foreignId('combat_technique_id')->constrained();
            $table->string('reload_time', 100);
            $table->string('damage_points', 100);
            $table->foreignId('ammunition_id')->constrained();
            $table->string('range_brackets', 100);
            $table->string('reach', 100);
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
        Schema::dropIfExists('ranged_combat_weapons');
    }
};
