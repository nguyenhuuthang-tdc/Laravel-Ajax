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
        $this->call(Player::class);
        $this->call(Game::class);
        $this->call(Player_Game::class);
    }
}
//class category
class Category extends Seeder {
    public function run() {
        DB::table('categories')->insert([
            ['cate_id'=>1,'name'=>'Survival'],
            ['cate_id'=>2,'name'=>'Tactic'],
            ['cate_id'=>3,'name'=>'Action']
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
            ['cate_id'=>1,'game_name'=>'Call of Duty','description'=>'2020 World Champs Gaming Warzone','game_image'=>'https://ui8-unity-gaming.herokuapp.com/img/card-pic-1.png'],
            ['cate_id'=>2,'game_name'=>'Garena of Vallor','description'=>'2023 World Champs Gaming Warzone','game_image'=>'https://ui8-unity-gaming.herokuapp.com/img/card-pic-2.png'],
            ['cate_id'=>3,'game_name'=>'CSGO','description'=>'2019 World Champs Gaming Warzone','game_image'=>'https://ui8-unity-gaming.herokuapp.com/img/card-pic-3.png'],
            ['cate_id'=>1,'game_name'=>'Free Fire','description'=>'2017 World Champs Gaming Warzone','game_image'=>'https://ui8-unity-gaming.herokuapp.com/img/player-pic-3.png']
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
            ['player_id'=>6,'game_id'=>4,'watching'=>5400,'live'=>1]
            
        ]);
    }
}