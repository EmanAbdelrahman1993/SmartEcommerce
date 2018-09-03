@extends('admin.master')
@section('content')


    <h1 class="text-center">Edit Order</h1>
    <div class="container">

    <form class="form-horizontal" action="{{ route('order.update', $order->id) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PATCH">

            <!-- Start Status Field -->
            <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label">Status</label>
                <div class="col-sm-10 col-md-6">
                    <select name="status">
                        <option value="pending" @if($order->order_status == "pending") selected @endif> Pending</option>
                        <option value="accept" @if($order->order_status == "accept") selected @endif> Accept</option>
                        <option value="cancel" @if($order->order_status == "cancel") selected @endif> Cancel</option>

                    </select>
                </div>
            </div>
            <!-- End Status Field -->

        <!-- Start Submit Field -->
        <div class="form-group form-group-lg">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" value="Save" class="btn btn-primary btn-sm" />
            </div>
        </div>
        <!-- End Submit Field -->
    </form>
</div>

@endsection