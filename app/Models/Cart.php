<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //

    protected $guarded = [];
    protected $dates = ['created_at' , 'updated_at'];


    /************************   START RELATIONSHIP  ***********************/

    public function product(){
        return $this->belongsTo(Product::class , 'product_id' , 'id');


    }

    /************************   END RELATIONSHIP  ***********************/


    public function finalPrice(){
        $qyt = $this->quantity;
        $price = $this->product->price;
        return $qyt*$price;
    }

    public static function total(){
        $carts = Cart::with('product')->where('user_session' , request()->session()->get('user_cart'))->get();
        $total = 0 ;

        foreach ($carts as $cart){
            $total = $total + $cart->finalPrice();
        }
        return $total;

    }
}
