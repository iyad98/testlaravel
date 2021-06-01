<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    //
    protected $guarded = [];
    protected $dates = ['created_at' , 'updated_at'];


    public function getStatus(){
        return $this->status == 1 ? 'مفعل' : 'غير مفعل';
    }
}
