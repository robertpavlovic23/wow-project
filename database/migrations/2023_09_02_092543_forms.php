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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('age');

            $table->string('character_name');
            $table->string('role');
            
            // social
            $table->string('battle_net_tag');
            $table->string('discord_tag');

            // links
            $table->string('ui_vod');
            $table->string('warcraftlogs');
            $table->string('warcraftlogs_alt')->nullable();
            $table->string('raiderio');
            $table->string('raiderio_alt')->nullable();
            $table->string('wow_armory');  
            $table->string('wow_armory_alt')->nullable();        

            // textareas
            //$table->string('attendance'); // can you meet schedule
            $table->string('history'); 
            $table->string('plans'); // any planned events preventing play time
            $table->string('pick'); // reason to pick you
            
            $table->longText('additional')->nullable(); // general
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
