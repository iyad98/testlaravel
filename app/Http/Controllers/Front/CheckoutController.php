<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function index($total)
    {
        $session_user = request()->session()->get('user_cart');
        $carts = Cart::with('product')->where('user_session', $session_user)->get();
//        $cart = [];
//        foreach ($carts as $c) {
//            $products = Product::find($c->product_id);
//            $products->quantity = $c->quantity;
//            $cart[] = $products;
//        }
//        $priceAllProduct = 0;
//        foreach ($carts as $pr) {
//            $priceAllProduct = $priceAllProduct + $pr->finalPrice();
//        }
        $priceAllProduct = $total;
//        return $carts;
        return view('front.checkout.index', compact('carts', 'priceAllProduct'));
    }


}
