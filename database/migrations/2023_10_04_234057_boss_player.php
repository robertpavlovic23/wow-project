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
        Schema::create('boss_player', function (Blueprint $table) {
            $table->unsignedBigInteger('boss_id');
            $table->unsignedBigInteger('player_id');
            $table->string('role')->nullable();

            $table->primary((['boss_id','player_id']));

            $table->foreign('boss_id')->references('id')->on('bosses')->onDelete('cascade');
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boss_player');
    }
};
