@extends('frontend.master')
@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class=" card-header"><h3>Your Orders</h3></div>

                    <div class="table-responsive">
                        @if(count($orders) >0)
                        <table class="main-table text-center table table-bordered">
                        <thead>
                        <tr>

                            <td>
                                 Order #
                            </td>
                            <td>Order Status</td>
                            <td>Created At</td>
                            <td>View Details</td>
                        </tr>
                        </thead>
                        <tbody>


                            @foreach($orders as $order)
                                <tr>

                                    <td>{{$order->id}}</td>
                                    <td>{{$order->order_status}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td><a href='/order/details/{{ $order->id }}' class='btn btn-xs btn-primary'>View</a>
                                    </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                        @else
                            <div class="alert alert-danger">
                                <p class="text-center">
                                <h1>No Orders YOu Make <a href="{{url('products')}}">Shopping Now !</a> </h1>
                                </p>
                            </div>

                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>







@endsection('content')