
@extends('frontend.master')
@section('content')


    <div class="container">

                    <h1 align="center">Your Cart</h1>
        <div class="clearfix"></div>

                    <table class=" table table-bordered table-hover">

                        <thead>
                        <tr class="col-md-12">
                            <td class="col-md-2">Product Name</td>
                            <td class="col-md-2">Quantity</td>
                            <td class="col-md-2">Price</td>
                            <td class="col-md-2">Total Price</td>
                            <td class="col-md-2">Total Gives Points</td>
                            <td class="col-md-2">Total Replacement Points</td>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($carts as $cart)
                            <tr class="col-md-12">

                                <td class="col-md-2">{{$cart[0]}}</td>
                                <td class="col-md-2">{{$cart[1]}}</td>
                                <td class="col-md-2">{{$cart[2]}}</td>
                                <td class="col-md-2">{{$cart[3]}}</td>
                                <td class="col-md-2">{{$cart[4]}}</td>
                                <td class="col-md-2">{{$cart[5]}}</td>

                            </tr>
                        @endforeach
                        </tbody>

                </table>
        <div class="clearfix"></div>
                    <div align="center">
                    <button><a href="/products" class="btn btn-primary">Continue Shopping</a></button>
                    <button><a href="/order_details" class="btn btn-danger">Order Now!</a></button>
                    </div>


    </div>


@endsection('content')