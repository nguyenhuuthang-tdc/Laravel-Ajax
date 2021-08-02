<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players_games', function (Blueprint $table) {
            $table->unsignedInteger('player_id');
            $table->unsignedInteger('game_id');
            $table->foreign('player_id')->references('player_id')->on('players');
            $table->foreign('game_id')->references('game_id')->on('games');
            $table->integer('watching');
            $table->integer('live');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players_games');
    }
}
