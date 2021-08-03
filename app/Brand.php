<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    protected $table = "brands";
    //
    public function game() {
        return $this->hasMany('App\Game','brand_id','brand_id');
    }

}
