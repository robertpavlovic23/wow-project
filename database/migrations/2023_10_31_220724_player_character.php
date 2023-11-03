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
        Schema::create('player_character', function (Blueprint $table) {
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('character_id');
            // $table->string('role')->nullable();
            // $table->string('class')->nullable();

            $table->primary((['boss_id','player_id']));

            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('character_id')->references('id')->on('characters');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_character');
    }
};
