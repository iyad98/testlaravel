<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //

    protected $guarded = [];
    protected $dates = ['created_at' , 'updated_at'];


    /************************   START RELATIONSHIP  ***********************/



    public function product(){
        return $this->belongsTo(Product::class , 'product_id' , 'id');
    }

    /************************   END RELATIONSHIP  ***********************/
}
