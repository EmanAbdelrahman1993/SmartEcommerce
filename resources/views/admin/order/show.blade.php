@extends('admin.master')
@section('content')

    <h1 class="text-center">Order {{$order->id}}
    </h1>
    <div class="container">
       <div class="row col-md-10 border">
           <div class="col-md-5">Member Name:</div>
           <div class="col-md-5">{{$order->user->name}}</div>
       </div>
       <div class="row col-md-10 border">
           <div class="col-md-5">Order Status:</div>
           <div class="col-md-5">{{$order->order_status}} <a href='/order/{{ $order->id }}/edit' class='btn btn-md btn-danger'>Edit</a>
           </div>
       </div>
       <div class="row col-md-10 border">
           <div class="col-md-5">Order Date:</div>
           <div class="col-md-5">{{$order->created_at}}</div>
       </div>
       <div class="row col-md-10 border">
           <div class="col-md-5">Total Cost:</div>
           <div class="col-md-5">{{$total_cost}}</div>
       </div>
       <div class="row col-md-10 border">
           <div class="col-md-5">Total Gives Points:</div>
           <div class="col-md-5">{{$total_has_points}}</div>
       </div>
       <div class="row col-md-10 border">
           <div class="col-md-5">Total Replacement Points:</div>
           <div class="col-md-5">{{$total_replace_points}}</div>
       </div>

    <hr>
        <h1 class="text-center">Order Details</h1>
        <br>

        @foreach($orders_details as $order_details)
        <h2 class="text-center">Order {{$order->id}}</h2>
            <div class="row col-md-10 border">
                <div class="col-md-5">Product Name:</div>
                <div class="col-md-5">{{ App\Product::find($order_details->product_id)->name }}</div>
            </div>
            <div class="row col-md-10 border">
                <div class="col-md-5">Quantity:</div>
                <div class="col-md-5">{{$order_details->quantity}}</div>
            </div>
            <div class="row col-md-10 border">
                <div class="col-md-5">Price:</div>
                <div class="col-md-5">{{$order_details->price}}</div>
            </div>
            <div class="row col-md-10 border">
                <div class="col-md-5">Total Price:</div>
                <div class="col-md-5">{{$order_details->total_price}}</div>
            </div>
            <div class="row col-md-10 border">
                <div class="col-md-5">Total Gives Points:</div>
                <div class="col-md-5">{{$order_details->total_has_points}}</div>
            </div>
            <div class="row col-md-10 border">
                <div class="col-md-5">Total Replacement Points:</div>
                <div class="col-md-5">{{$order_details->total_replace_points}}</div>
            </div>
            <div class="row col-md-10 border">
                <div class="col-md-5">Member Address:</div>
                <div class="col-md-5">{{$order_details->user_address}}</div>
            </div>
            <div class="row col-md-10 border">
                <div class="col-md-5">Member Mobile:</div>
                <div class="col-md-5">{{$order_details->mobile}}</div>
            </div>

            @endforeach

        </div>

@endsection