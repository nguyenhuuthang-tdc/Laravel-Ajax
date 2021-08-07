<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(Category::class);
        $this->call(Brand::class);
        $this->call(Player::class);
        $this->call(Game::class);
        $this->call(Player_Game::class);
    }
}
//class category
class Category extends Seeder {
    public function run() {
        DB::table('categories')->insert([
            ['cate_name'=>'Survival'],
            ['cate_name'=>'Tactic'],
            ['cate_name'=>'Action']
        ]);
    }
}
//class brand
class Brand extends Seeder {
    public function run() {
        DB::table('brands')->insert([
            ['brand_name'=>'Riot Game'],
            ['brand_name'=>'Tencent'],
            ['brand_name'=>'Garena']
        ]);
    }
}
//class category
class Player extends Seeder {
    public function run() {
        DB::table('players')->insert([
            ['player_name'=>'Huu Thang','player_image'=>'https://ui8-unity-gaming.herokuapp.com/img/ava-1.png'],
            ['player_name'=>'Tran Nam','player_image'=>'https://ui8-unity-gaming.herokuapp.com/img/ava-1.png'],
            ['player_name'=>'Pewdie Pie','player_image'=>'https://ui8-unity-gaming.herokuapp.com/img/ava-1.png'],
            ['player_name'=>'Sofm','player_image'=>'https://ui8-unity-gaming.herokuapp.com/img/ava-1.png'],
            ['player_name'=>'Tuan Tran','player_image'=>'https://ui8-unity-gaming.herokuapp.com/img/ava-1.png'],
            ['player_name'=>'Hoai Linh','player_image'=>'https://ui8-unity-gaming.herokuapp.com/img/ava-1.png']
        ]);
    }
}
//class game
class Game extends Seeder {
    public function run() {
        DB::table('games')->insert([
            ['cate_id'=>1,'brand_id'=>1,'game_name'=>'Call of Duty','description'=>'2020 World Champs Gaming Warzone','game_des'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.','dow_quantity'=>12000000,'origin_page'=>'https://www.callofduty.com/','game_image'=>'https://ui8-unity-gaming.herokuapp.com/img/card-pic-1.png','price'=>500000],
            ['cate_id'=>2,'brand_id'=>2,'game_name'=>'Garena of Vallor','description'=>'2023 World Champs Gaming Warzone','game_des'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.','dow_quantity'=>2400000,'origin_page'=>'https://lienquan.garena.vn/','game_image'=>'https://ui8-unity-gaming.herokuapp.com/img/card-pic-2.png','price'=>250000],
            ['cate_id'=>3,'brand_id'=>3,'game_name'=>'CSGO','description'=>'2019 World Champs Gaming Warzone','game_des'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.','dow_quantity'=>12000000,'origin_page'=>'https://blog.counter-strike.net/','game_image'=>'https://ui8-unity-gaming.herokuapp.com/img/card-pic-3.png','price'=>780000],
            ['cate_id'=>1,'brand_id'=>2,'game_name'=>'Free Fire','description'=>'2017 World Champs Gaming Warzone','game_des'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.','dow_quantity'=>18600000,'origin_page'=>'https://ff.garena.vn/','game_image'=>'https://ui8-unity-gaming.herokuapp.com/img/player-pic-3.png','price'=>620000],
            ['cate_id'=>2,'brand_id'=>1,'game_name'=>'League of Legends','description'=>'2014 World Champs Gaming Warzone','game_des'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.','dow_quantity'=>50600000,'origin_page'=>'https://na.leagueoflegends.com/en-us/','game_image'=>'https://mediamaster.vandal.net/m/7-2020/2020729521097_1.jpg','price'=>1200000],
            ['cate_id'=>2,'brand_id'=>1,'game_name'=>'League of Legends','description'=>'2014 World Champs Gaming Warzone','game_des'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.','dow_quantity'=>50600000,'origin_page'=>'https://na.leagueoflegends.com/en-us/','game_image'=>'https://mediamaster.vandal.net/m/7-2020/2020729521097_1.jpg','price'=>1200000],
            ['cate_id'=>2,'brand_id'=>1,'game_name'=>'League of Legends','description'=>'2014 World Champs Gaming Warzone','game_des'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.','dow_quantity'=>50600000,'origin_page'=>'https://na.leagueoflegends.com/en-us/','game_image'=>'https://mediamaster.vandal.net/m/7-2020/2020729521097_1.jpg','price'=>1200000],
            ['cate_id'=>2,'brand_id'=>1,'game_name'=>'League of Legends','description'=>'2014 World Champs Gaming Warzone','game_des'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.','dow_quantity'=>50600000,'origin_page'=>'https://na.leagueoflegends.com/en-us/','game_image'=>'https://mediamaster.vandal.net/m/7-2020/2020729521097_1.jpg','price'=>1200000],
            ['cate_id'=>2,'brand_id'=>1,'game_name'=>'League of Legends','description'=>'2014 World Champs Gaming Warzone','game_des'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.','dow_quantity'=>50600000,'origin_page'=>'https://na.leagueoflegends.com/en-us/','game_image'=>'https://mediamaster.vandal.net/m/7-2020/2020729521097_1.jpg','price'=>1200000]
        ]);
    }
}
//class player_game
class Player_Game extends Seeder {
    public function run() {
        DB::table('players_games')->insert([
            ['player_id'=>1,'game_id'=>1,'watching'=>3600,'live'=>0],
            ['player_id'=>2,'game_id'=>2,'watching'=>1200,'live'=>1],
            ['player_id'=>3,'game_id'=>3,'watching'=>2500,'live'=>1],
            ['player_id'=>4,'game_id'=>2,'watching'=>6700,'live'=>0],
            ['player_id'=>5,'game_id'=>1,'watching'=>4800,'live'=>0],
            ['player_id'=>6,'game_id'=>4,'watching'=>5400,'live'=>1],
            ['player_id'=>1,'game_id'=>5,'watching'=>5400,'live'=>0],
            ['player_id'=>4,'game_id'=>5,'watching'=>5400,'live'=>1],
            ['player_id'=>2,'game_id'=>1,'watching'=>5400,'live'=>0]
            
        ]);
    }
}