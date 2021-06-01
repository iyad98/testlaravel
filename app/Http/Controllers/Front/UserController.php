<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function myCart()
    {

        $session_user = request()->session()->get('user_cart');
        $carts = Cart::with('product')->where('user_session', $session_user)->get();

//            return $carts;
        $qut = 0;
        $total = 0;
        foreach ($carts as $cart){
            $qut = $qut + $cart->finalPrice();
            $total = $cart->total();
        }
//        return $carts;

        return view('front.user.my-cart', compact('carts' , 'qut' , 'total'));


    }

    public function coupon_discount(Request $request){

        $discount_number = $request->coupon_discount;
        $coupon = Coupon::where('code' , $discount_number)->first();

        if (!$coupon) {
            return redirect()->back()->with(['error' => 'هذا الكوبون غير موجود']);

        }
        $session_user = request()->session()->get('user_cart');

        $carts = Cart::with('product')->where('user_session', $session_user)->get();
        $total = 0;
        $qut = 0;

        foreach ($carts as $cart){
            $qut = $qut + $cart->finalPrice();
            $total = $cart->total();
        }

        $total = ($total*$coupon->rate)/100 ;


        return view('front.user.my-cart', compact('carts' , 'qut' , 'total'));




    }

    public function addQuantity(Request $request){

        $cart = Cart::where('product_id' , $request->id)->update(['quantity'=>$request->qty]);


        if ($cart){
            return response() -> json([
                'status' => true,
                'msg' => 'تم التعديل بنجاح',
                'id' => $request->id
            ]);
        }else{
            return response() -> json([
                'status' => false,
                'msg' => 'فشل الحفظ يرجى المحاولة فيما بعد'
            ]);
        }
    }
    public function deleteQuantity(Request $request){

        $cart = Cart::where('product_id' , $request->id)->update(['quantity'=>$request->qty]);


        if ($cart){
            return response() -> json([
                'status' => true,
                'msg' => 'تم التعديل بنجاح',
                'id' => $request->id
            ]);
        }else{
            return response() -> json([
                'status' => false,
                'msg' => 'فشل الحفظ يرجى المحاولة فيما بعد'
            ]);
        }
    }

    public function deleteproductfromcart ($id) {

        $session_user = request()->session()->get('user_cart');
        $carts = Cart::with('product')->where('user_session', $session_user)->where('product_id' , $id)->first();

        $carts->delete();


        return redirect()->back();


    }


}

