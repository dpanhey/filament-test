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

        Schema::create('blessings', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description');
            $table->string('range', 100);
            $table->string('duration', 100);
            $table->string('target_category', 100);
            $table->set('aspect_group', ["Praios","Rondra","Boron","Hesinde","Phex","Peraine"]);
            $table->set('aspect', ["\"Anti-magic\"","Order","Shield","Storm","Death","Dream","Magic","Knowledge","Commerce","Shadow","Healing","Agriculture"]);
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
        Schema::dropIfExists('blessings');
    }
};
