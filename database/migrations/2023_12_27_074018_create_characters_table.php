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

        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->index()->comment('Owner of the character');
            $table->string('character_name', 100);
            $table->string('family', 100)->nullable();
            $table->string('place_of_birth', 100)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('age')->nullable();
            $table->string('sex', 100)->nullable();
            $table->foreignId('species_id')->nullable()->constrained();
            $table->decimal('size', 8, 2)->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->string('hair_color', 100)->nullable();
            $table->string('eye_color', 100)->nullable();
            $table->foreignId('culture_id')->nullable()->constrained();
            $table->foreignId('profession_id')->nullable()->constrained();
            $table->string('title', 100)->nullable();
            $table->string('social_status', 100)->nullable();
            $table->text('characteristics')->nullable();
            $table->text('backstory')->nullable();
            $table->text('other_information')->nullable();
            $table->foreignId('experience_level_id')->nullable()->constrained();
            $table->string('total_ap')->nullable();
            $table->string('ap_unused')->nullable();
            $table->string('ap_used')->nullable();
            $table->string('image', 255)->default('default.png')->nullable();
            $table->boolean('alive')->nullable();
            $table->foreignId('character_type_id')->nullable()->constrained();
            $table->foreignId('character_skill_id')->nullable()->constrained();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
