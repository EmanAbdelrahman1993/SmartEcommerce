@extends('admin.master')
@section('content')

    @if($orders)
    <h1 class="text-center">Manage Orders</h1>
    <div class="container">
        <div class="table-responsive">
            <table class="main-table text-center table table-bordered">
                <tr>
                    <td>ID</td>
                    <td>UserName</td>
                    <td>Status</td>
                    <td>Order Date</td>
                    <td>Control</td>
                </tr>

                @foreach($orders as $order)
                    <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->order_status }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        <a href='/order/{{ $order->id }}' class='btn btn-md btn-primary'>View</a>

                        <a href='/order/{{ $order->id }}/edit' class='btn btn-md btn-primary'>Edit</a>

                        <form class="form-horizontal" action="{{ route('order.destroy', $order->id) }}" method="POST" style="display: inline;">

                                     <input name="_method" type="hidden" value="DELETE">
                                     @csrf

                                    <input class="btn btn-danger btn  confirm" type="submit" value="Delete">
                        </form>

                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@else
            <div class="container">
                <div class="nice-message">There\'s No Order To Show</div>
            </div>
@endif
@endsection