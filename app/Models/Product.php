<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    protected $guarded = [];
    protected $dates = ['created_at' , 'updated_at'];


    /************************   START RELATIONSHIP  ***********************/

    public function productImages(){
        return $this->hasMany(ProductImage::class , 'product_id' , 'id');


    }
    public function cart(){
        return $this->hasMany(Cart::class , 'product_id' , 'id');
    }
    /************************   END RELATIONSHIP  ***********************/

    public function getStatus(){
        return $this->status == 1 ? 'مفعل' : 'غير مفعل';
    }
}
