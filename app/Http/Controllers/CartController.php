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
            return response()->json(array('message' => 'This game has been already exist in your cart !'));
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
            $grand_price = 0;
            foreach($cart as $key => $item) {
                $grand_price += $item['price'];
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
                    <div class="delete-cart" onclick="deleteCart('.$key.')">Delete</div>
                </div>';
            }
            return response()->json(array('grand_price' =>$grand_price,'result'=> $result,'total'=> count($cart), 'message'=> 'Add cart successfully !!!'));
        }
    }
    //
    public function deleteCart(Request $request) {
        $game_id = $request->game_id;
        $cart = session()->get('cart');
        unset($cart[$game_id]);
        session()->put('cart',$cart);
        $result = "";
            $grand_price = 0;
            foreach($cart as $key => $item) {
                $grand_price += $item['price'];
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
                    <div class="delete-cart" onclick="deleteCart('.$key.')">Delete</div>
                </div>';
            }
        return response()->json(array('grand_price' =>$grand_price,'result'=> $result,'total'=> count($cart), 'message'=> 'Delete cart successfully !!!'));
    }
}
