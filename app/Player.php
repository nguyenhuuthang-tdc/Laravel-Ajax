<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    //
    protected $table = 'players';
    //
    //
    public function game() {
        return $this->belongsToMany('App\Game','players_games','game_id','player_id');
    }
}
