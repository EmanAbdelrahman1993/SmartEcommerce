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
        //dd($request->all());
        if (Session::has('cart')) {
            $total_price = 0;
            $total_gives_points = 0;
            $total_replace_points = 0;


            foreach (Session::get('cart') as $order) {
//                dd($order);

                $total_price = $total_price + $order[3];
                $total_gives_points = $total_gives_points + $order[4];
                $total_replace_points = $total_replace_points + $order[5];
            }
//            dd($total_replace_points);
        }

        $obj = new Order();
        $obj->user_id = auth()->user()->id;
        $obj->order_status = "pending";
        $obj->save();

        //dd($obj->id);


        if (Session::has('cart')) {
            //dd(count(Session::get('cart')));
            foreach (Session::get('cart') as $order) {
                    //dd($order);
                    $data = new OrderDetails();
                    $data->order_id = $obj->id;
                    $data->product_id = $order[0];
                    $data->quantity = $order[2];
                    $data->price = $order[3];
                    $data->total_price = $order[4];
                    $data->total_has_points = $order[5];
                    $data->total_replace_points = $order[6];
                    $data->user_address = $request->address;
                    $data->mobile = $request->mobile;
                    $data->save();
                //}
            }
        }
		
		//destroy cart session
		 Session::pull('cart');
		
		
        session()->flash('success','Order Added Successfully , We Will Accept It Soon !!');
        return redirect('/viewOrders');


    }


    public function orderDetails()
    {
        return view('frontend.order.details');
    }

    public function viewOrders()
    {
        $user_id = auth()->user()->id;
        $orders = Order::where('user_id',$user_id)->get();
        //dd(count($orders));
        return view('frontend.order.index')->with('orders',$orders);

    }
    public function viewOrderDetails($order_id)
    {
        $orders_details = OrderDetails::where('order_id',$order_id)->get();
        $total_cost = 0;
        $total_has_points = 0;
        $total_replace_points = 0;

        foreach ($orders_details as $order_details)
        {
            $total_cost = $total_cost + $order_details['total_price'];
            $total_has_points = $total_has_points + $order_details['total_has_points'];
            $total_replace_points = $total_replace_points + $order_details['total_replace_points'];
        }
       // dd($total_replace_points);

        return view('frontend.order.order_details')->with(['orders_details'=>$orders_details,'total_cost'=>$total_cost , 'total_has_points'=> $total_has_points, 'total_replace_points'=> $total_replace_points ]);

    }
}
