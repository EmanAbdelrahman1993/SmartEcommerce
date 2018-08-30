@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Order Details</div>
                    <div class="panel-body">
                        <a href="{{url('User/cart')}}" class="btn btn-primary for pull-right">Back</a>
                        </br>
                        <form class="form-control" method="post" action="{{url('/order')}}">
                            @csrf




                            <div class="form-control">
                                <label>Address</label>
                                <textarea name="address" required >{{old('address')}}</textarea>
                            </div>
                            <div class="form-control">
                                <label>Mobile</label>
                                <input type="number" name="mobile" value="{{old('mobile')}}" required/>
                            </div>

                            <div class="form-control">
                                <input type="submit" class="btn btn-success" value="Order Now!!" />
                            </div>





                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection('content')


