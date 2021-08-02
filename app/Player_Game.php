<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player_Game extends Model
{
    protected $table = 'players_games';
    //
    public function product() {
        return $this->hasMany('games','cate_id','cate_id');
    }
}
