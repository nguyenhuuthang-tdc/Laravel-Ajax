<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Game;

class CartController extends Controller
{
    //
    public function addCart(Request $request) {
        $game_id = $request->game_id;
        $game = Game::where('game_id','=',$game_id)->first();
        $cart = session()->get('cart');
        if(isset($cart[$game_id])) {
            return response()->json(array('cart' => $cart,'total' => count($cart),'message' => 'This game has been already exist in your cart !'),200);
            // dd($message)
        }
        else {
            $cart[$game_id] = [
                'image' => $game->game_image,
                'name' => $game->game_name,
                'price' => $game->price
            ];
            session()->put('cart',$cart);
            $cart = session()->get('cart');
            $result = "";
            foreach($cart as $item) {
                $result .= '
                <div class="element-cart">
                    <div class="cart-image">
                        <img src="'.$item['image'].'" alt="">
                    </div>
                    <div class="element-content">
                        <div class="cart-name">
                            <p>'.$item['name'].'</p>
                        </div>
                        <div class="cart-price">
                            <p>'.number_format($item['price'],0).' Đ</p>
                        </div>
                    </div>
                    <div class="delete-cart">Delete</div>
                </div>
                ';
            }
            return response()->json(array('result'=> $result,'total'=> count($cart), 'success'=> 'Add cart successfully !!!'), 200);
        }
    }
}
