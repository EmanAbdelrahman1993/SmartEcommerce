<?php

namespace App;
use App\Order;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table ='order_details';
    


    public function Order()
    {
        return $this->hasMany('App\Order','order_id','id');
    }
}
