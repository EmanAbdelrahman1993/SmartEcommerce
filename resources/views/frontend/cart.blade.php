
@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class=" card-header">Your Cart  <center><button><a href="/home" class="btn btn-success">Back To Home</a></button></center></div>

                    <table class="table table-bordered table-responsive-sm table-hover">

                        <thead>
                        <tr>

                            <td>Product Name</td>
                            <td>Quantity</td>
                            <td>Size</td>
                            <td>Price</td>
                            <td>total</td>
                        </tr>
                        </thead>
                        <tbody>




                        @foreach($carts as $cart)
                            <tr>

                                <td>{{$cart[0]}}</td>
                                <td>{{$cart[1]}}</td>
                                <td>{{$cart[2]}}</td>
                                <td>{{$cart[3]}}</td>
                                <td>{{$cart[4]}}</td>


                            </tr>
                        @endforeach
                        </tbody>

                </table>
                    <div align="center">
                    <button><a href="/userview" class="btn btn-primary">Continue Shopping</a></button>
                    <button><a href="/order_details" class="btn btn-danger">Order Now!</a></button>
                    </div>

                </div>
        </div>
    </div>
    </div>







@endsection('content')