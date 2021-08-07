<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('game_id');
            $table->unsignedInteger('cate_id');
            $table->foreign('cate_id')->references('cate_id')->on('categories');
            $table->unsignedInteger('brand_id');
            $table->foreign('brand_id')->references('brand_id')->on('brands');
            $table->string('game_name');
            $table->string('description');
            $table->string('game_des');
            $table->integer('dow_quantity');
            $table->string('origin_page');
            $table->string('game_image');
            $table->integer('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
