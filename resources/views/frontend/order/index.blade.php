@extends('frontend.master')
@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class=" card-header"><h3>Your Orders</h3></div>

                    <div class="table-responsive">
                        <table class="main-table text-center table table-bordered">
                        <thead>
                        <tr>

                            <td>
                                 Order #
                            </td>
                            <td>Order Status</td>
                            <td>Total Price Of Order</td>
                            <td>View Details</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>

                                <td>{{$order->id}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>{{$order->total_price_of_orders}}</td>
                                <td></td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>

            </div>
        </div>
    </div>







@endsection('content')