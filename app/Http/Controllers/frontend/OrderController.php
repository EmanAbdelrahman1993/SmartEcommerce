<?php

namespace App\Http\Controllers\frontend;

use App\User;
use App\Order;
use App\Product;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OrderDetails;
use Response;


class OrderController extends Controller
{
    public function orderNow(Request $request)
    {
        if (Session::has('cart')) {
            $price = 0;
            $total_gives_points = 0;
            $total_replace_points = 0;


            foreach (Session::get('cart') as $order) {
                //dd($order);
                $price = $price + $order[3];
                //dd($price);
                $total_gives_points = $total_gives_points + $order[4];
                $total_replace_points = $total_replace_points + $order[5];


            }
            //dd($total_replace_points);


        }

        $obj = new Order();
        $obj->user_id = auth()->user()->id;
        $obj->order_status = "pending";
        $obj->save();

        //dd($obj->id);


        if (Session::has('cart')) {
            foreach (Session::get('cart') as $order)
                dd($order);
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

    public function viewOrders()
    {
        $user_id = auth()->user()->id;
        $orders = Order::where('user_id',$user_id);
        return view('frontend.order.index')->with('orders',$orders);

    }
}
