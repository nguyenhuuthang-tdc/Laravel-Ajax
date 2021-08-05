<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Game;
use App\Player_Game;
use App\Player;
use App\Category;

class PageController extends Controller
{
    public function getIndex() {
        $game = DB::table('players_games')->join('games','players_games.game_id','=','games.game_id')
        ->join('players','players_games.player_id','=','players.player_id')
        ->join('categories','games.cate_id','=','categories.cate_id')->get();
        $category = Category::all();
        return view('index',compact('game','category'));
    }
    //
    public function getProductByAjax(Request $request) {
        $query = DB::table('players_games')->join('games','players_games.game_id','=','games.game_id')
        ->join('players','players_games.player_id','=','players.player_id')
        ->join('categories','games.cate_id','=','categories.cate_id');
        $arrCheck = $request->checkCate;
        if($arrCheck == null) {
            $query = DB::table('players_games')->join('games','players_games.game_id','=','games.game_id')
            ->join('players','players_games.player_id','=','players.player_id')
            ->join('categories','games.cate_id','=','categories.cate_id');
        }
        else {
            if(count($arrCheck) == 1) {
                $query->where('categories.cate_id','=',$arrCheck[0]);
            }
            else {
                $query->where('categories.cate_id','=',$arrCheck[0]);
                for($i = 1; $i < count($arrCheck); $i++) {
                    $query->orWhere('categories.cate_id','=',$arrCheck[$i]);
                }
            }
        }         
        $game = $query->get();     
        return response()->json(array('game'=> $game), 200);
    }
    public function getDetailByAjax(Request $request) {
        $game_id = $request->game_id;
        $detail_game = Game::join('categories','games.cate_id','=','categories.cate_id')
        ->join('brands','games.brand_id','=','brands.brand_id')
        ->where('games.game_id','=',$game_id)->get();
        return response()->json(array('detail_game' => $detail_game), 200);
    }
    //
    public function getDetail() {
        return view('detail');
    }
    //
    public function getResultByAjax(Request $request) {
        $key = $request->key;
        $result = Game::where('game_name','like','%' . $key . '%')->get();
        return response()->json(array('result' => $result), 200);
    }
}
