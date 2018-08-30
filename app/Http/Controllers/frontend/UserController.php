<?php

namespace App\Http\Controllers\frontend;

use App\User;
use App\Order;
use App\Product;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }



    public function view_cart()
    {
        $user_id = auth()->user()->id;
        if (Session::has('cart')) {
           // dd(session()->get());
            foreach (session()->get('cart') as $order)

                $carts = [$order];

        }

        return view('frontend.cart')->with('carts',$carts);

    }
    public function add_to_cart(Request $request , $id)
    {
        //session()->put('cart', []);
        $product = Product::find($id);
        $qty = $request->quantity;

        $price= $product->price;

        $total_price = $price * $qty;

        $has_points = $product->has_points;

        $total_has_points = $has_points * $qty;

        $replacement_points = $product->replace_points;

        $total_replacement_points = $replacement_points * $qty;

        $data =[$product->id , $qty  , $price , $total_price , $total_has_points , $total_replacement_points];
        //dd($data);

        session()->push('cart', $data);

        return redirect('/cart');
    }

    public function viewOrders()
    {
        $user_id = auth()->user()->id;
        $orders = Order::where('user_id',$user_id);
        return view('frontend.order.index')->with('orders',$orders);

    }
}
