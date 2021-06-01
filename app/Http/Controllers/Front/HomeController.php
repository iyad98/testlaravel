<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function index(){
        $products = Product::get();

        return view('front.home.index' , compact('products'));

    }


    public function add_cart(Request $request)
    {
        $product_id = $request->id ;
        if (request()->session()->exists('user_cart')) {
            $session_user = request()->session()->get('user_cart');
            $carts = Cart::where('product_id', $product_id)->where('user_session', $session_user)->get()->first();
            $count = 0;
            foreach (Cart::where('user_session', $session_user)->get() as $c){
                $count = $count + $c->quantity;
            }
            if (!$carts) {
                Cart::create([
                    'user_session' => $session_user,
                    'product_id' => $product_id,
                    'quantity' => 0 + 1
                ]);
                return response() -> json([
                    'status' => true,
                    'msg' => 'تم الاضافة بنجاح',
                    'count' => $count
                ]);
            } else {
                $carts->update([
                    'quantity' => $carts->quantity + 1
                ]);
                $count = 0;
                foreach (Cart::where('user_session', $session_user)->get() as $c){
                    $count = $count + $c->quantity;
                }
                return response() -> json([
                    'status' => true,
                    'msg' => 'تم الاضافة بنجاح',
                    'count' => $count
                ]);
            }
        } else {
            $hash = bin2hex(random_bytes(16));
            request()->session()->put('user_cart', $hash);
            $session_user = request()->session()->get('user_cart');
            $carts = Cart::where('product_id', $product_id)->where('user_session', $session_user)->get()->first();
            if (!$carts) {
                Cart::create([
                    'user_session' => $session_user,
                    'product_id' => $product_id,
                    'quantity' => 0 + 1
                ]);
                return redirect()->back()->with(['success' => 'تمت اضافة المنتج بنجاح']);
            } else {
                $carts->update([
                    'quantity' => $carts->quantity + 1
                ]);
                return redirect()->back()->with(['success' => 'تمت اضافة المنتج بنجاح']);
            }


        }


    }

}
