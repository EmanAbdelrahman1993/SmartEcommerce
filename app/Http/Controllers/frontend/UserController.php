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
            $total_price = 0;
            $product_no = 0;
            if(Session::has('cart')) {
                $product_no = count(Session::get('cart'));
                foreach (Session::get('cart') as $product) {
                    $total_price = $total_price + $product[4];
                }
            }

            $last_added_products = Product::orderBy('id', 'DESC')->get();

            return view('frontend.index')->with(['product_no'=>$product_no,'total_price'=>$total_price , 'last_added_products'=>$last_added_products]);
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
        return view('frontend.cart');
    }
    public function add_to_cart(Request $request , $id)
    {
        $product = Product::find($id);
        $qty = $request->quantity;

        $price= $product->price;

        $total_price = $price * $qty;

        $has_points = $product->has_points;

        $total_has_points = $has_points * $qty;

        $replacement_points = $product->replace_points;

        $total_replacement_points = $replacement_points * $qty;

        $data = collect([$product->id , $product->name , $qty  , $price , $total_price , $total_has_points , $total_replacement_points]);

        Session::push('cart', $data);

        //dd(Session::get('cart'));

        return redirect('/cart');
    }

    public function search(Request $request)
    {
        $this->validate($request,[

            's'=>'required',
        ]);

        $queryData = Product::where('name', 'like', '%'.$request['s'].'%' )
            ->orWhere('description','like','%'.$request['s'].'%')->get();
//
//        dd($queryData);

        return view('frontend.search_result')->with('queryData',$queryData);
    }


}
