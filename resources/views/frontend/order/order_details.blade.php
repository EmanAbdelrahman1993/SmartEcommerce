@extends('frontend.master')
@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class=" card-header"><h3>Your Orders</h3></div>

                    <br class="table-responsive">
                        <table class="main-table text-center table table-bordered">
                        <thead>
                        <tr>
                            <td>Order #</td>
                            <td>Product Name</td>
                            <td>Quantity</td>
                            <td>Price</td>
                            <td>Total Price</td>
                            <td>Total Has Points</td>
                            <td>Total Replacement Points</td>
                        </tr>
                        </thead>
                        <tbody>
                        {{--{{dd(count($orders_details))}}--}}
                        @foreach($orders_details as $order_details)
                            <tr>
                                <td>1</td>
                                {{--<td>{{$order_details->product_id}}</td>--}}
                                <td>{{ App\Product::find($order_details->product_id)->name }}</td>
                                <td>{{$order_details->quantity}}</td>
                                <td>{{$order_details->price}}</td>
                                <td>{{$order_details->total_price}}</td>
                                <td>{{$order_details->total_has_points}}</td>
                                <td>{{$order_details->total_replace_points}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
<hr>
                    </br>
                    <div class="row col-md-12">
                        <div class="col-md-6">Total Cost of Order : </div>
                        <div class="col-md-6">{{$total_cost}}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Total Gives Points</div>
                        <div class="col-md-9">{{$total_has_points}}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Total Replacement Points</div>
                        <div class="col-md-9">{{$total_replace_points}}</div>
                    </div>

                    </div>
                </div>

            </div>
        </div>
    </div>







@endsection('content')