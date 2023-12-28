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

        Schema::create('physical_skills', function (Blueprint $table) {
            $table->id();
            $table->string('body_control');
            $table->string('carousing');
            $table->string('climbing');
            $table->string('dancing');
            $table->string('feat_of_strength');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('physical_skills');
    }
};
