<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;

use App\User;
use App\Order;
use App\OrderDetails;
use Session;
use Response;


use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderNow(Request $request)
    {
        if (Session::has('cart')) {
            //dd(session()->get('cart'));
            $price = 0;
            foreach (session()->get('cart') as $order)
                $price = $price + $order[4];



        }

        $obj = new Order();

        $obj->user_id = auth()->user()->id;

        $obj->order_status = "pending";
        $obj->user_address= $request->address;
        $obj->mobile = $request->mobile;
        $obj->total_price_of_orders = $price;
        $obj->save();

        //dd($obj->id);


        if (Session::has('cart')) {
            foreach (session()->get('cart') as $order)
                $arr[] =$order;
                //dd($arr);
                //dd( count($arr));
                for($i=0 ; $i < count($arr); $i++) {
                    $data = new OrderDetails();
                    $data->order_id = $obj->id;

                    $data->product_id = $arr[$i][0];
                    //dd($data->product_id);
                     $data->quantity = $arr[$i][1];
                     $data->size = $arr[$i][2];
                     $data->price = $arr[$i][3];
                     $data->total_price = $arr[$i][4];
                     $data->save();
                }
        }

        session()->flash('success','Order Added Successfully');
        return redirect('/viewOrders');


    }


    public function orderDetails()
    {
        return view('order.details');
    }
}
