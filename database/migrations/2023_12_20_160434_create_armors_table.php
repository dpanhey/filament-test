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

        Schema::create('armors', function (Blueprint $table) {
            $table->id();
            $table->enum('armor_type', ["Normal clothing","Heavy clothing","Cloth armor","Leather armor","Chain mail","Scale mail","Plate mail"]);
            $table->string('name', 100);
            $table->text('description');
            $table->string('protection');
            $table->string('encumbrance');
            $table->string('additional_penalties', 100);
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
        Schema::dropIfExists('armors');
    }
};
