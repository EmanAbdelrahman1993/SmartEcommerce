@extends('frontend.master')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Order Details
                        <a href="{{url('/cart')}}" class="col-md-2 btn btn-primary pull-right">Back</a>
                    </div>
                    </br>
                    <div class="panel-body">
                        <form class="form-control" method="post" action="{{url('/order')}}">
                            @csrf
                            <div>
                                <label>Address</label>
                                <textarea name="address" required>{{old('address')}}</textarea>
                            </div>
                            <div>
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


