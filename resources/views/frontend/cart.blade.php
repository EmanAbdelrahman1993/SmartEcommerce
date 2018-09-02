
@extends('frontend.master')
@section('content')

    <div class="container">
        <h1 align="center">Your Cart</h1>
        @if(Session::get('cart'))
        <table class=" table table-bordered table-hover">

                        <thead>
                        <tr class="col-md-12">
                            <td class="col-md-2">Product Id</td>
                            <td class="col-md-2">Product Name</td>
                            <td class="col-md-2">Quantity</td>
                            <td class="col-md-2">Price</td>
                            <td class="col-md-2">Total Price</td>
                            <td class="col-md-2">Total Gives Points</td>
                            <td class="col-md-2">Total Replacement Points</td>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach (Session::get('cart') as $product)
                                <tr class="col-md-12">
                                    @for($i=0; $i<count($product); $i++)
                                    <td>{{$product[$i]}}</td>
                                    @endfor
                                </tr>
                            @endforeach

                        </tbody>

                </table>
        @else
            <div class="alert alert-danger" >
                <p class="text-center">
                <h2>No Products Added To Your Cart!</h2>
                </p>
            </div>

        @endif
                    <div align="center">
                    <button><a href="/products" class="btn btn-primary">Continue Shopping</a></button>
                    <button><a href="/order_details" class="btn btn-danger">Complete To Order!</a></button>
                    </div>

    </div>

@endsection('content')