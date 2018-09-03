<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetails;
use App\Product;
use Auth;
use Session;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.order.index')->with('orders',$orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        $orders_details = OrderDetails::where('order_id',$order->id)->get();

        $total_cost = 0;
        $total_has_points = 0;
        $total_replace_points = 0;

        foreach ($orders_details as $order_details)
        {
            $total_cost = $total_cost + $order_details['total_price'];
            $total_has_points = $total_has_points + $order_details['total_has_points'];
            $total_replace_points = $total_replace_points + $order_details['total_replace_points'];
        }



        return view('admin.order.show')->with(['order'=>$order , 'orders_details'=>$orders_details , 'total_cost'=>$total_cost , 'total_has_points'=> $total_has_points, 'total_replace_points'=> $total_replace_points]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.edit')->with('order',$order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->status);
        $order = Order::find($id);
        $order->order_status = $request->status;
        $order->save();
        Session::flash('success', 'Status  was successfully Updated.');
        return redirect('order');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        Session::flash('success', 'The Order was successfully deleted.');
        return redirect('orders');

    }

    public function approve($id)
    {
        $order = Order::find($id);
        //dd($comment);
        $order->order_status = 'Accepted';
        $order->save();

        Session::flash('success', 'Order  was successfully Accepted.');
        return redirect('orders');

    }

    public function close($id)
    {
        $order = Order::find($id);
        //dd($comment);
        $order->order_status = 'Cancelled';
        $order->save();

        Session::flash('error', 'Order  was  Cancelled.');
        return redirect('orders');

    }
}
