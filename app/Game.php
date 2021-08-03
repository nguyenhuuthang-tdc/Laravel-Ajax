<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games';
    //
    public function category() {
        return $this->belongsTo('App\Category','cate_id','cate_id');
    }
    public function brand() {
        return $this->belongsTo('App\Brand','brand_id','brand_id');
    }
    //
    public function player() {
        return $this->belongsToMany('App\Player','players_games','game_id','player_id');
    }
}
