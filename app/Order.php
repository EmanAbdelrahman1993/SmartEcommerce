<?php

namespace App;

use App\User;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table='order';

    public function User()
    {
        return $this->hasOne('App\User','id','user_id');
    }
    public function Product()
    {
        return $this->hasOne('App\Product','product_id','id');
    }

}
