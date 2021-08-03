<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    //
    public function game() {
        return $this->hasMany('App\Game','cate_id','cate_id');
    }
}
