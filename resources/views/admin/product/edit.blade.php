@extends('admin.master')
@section('content')

<h1 class="text-center">Edit product</h1>
<div class="container">
    <form class="form-horizontal" action="{{ route('product.update', $product->id) }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PATCH">
        <!-- Start Name Field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10 col-md-6">
                <input type="text" name="name" class="form-control" required="required" placeholder="Name of The product" value="{{ $product->name }}" />
            </div>
        </div>
        <!-- End Name Field -->
        <!-- Start Description Field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10 col-md-6">
                <input type="text" name="description" class="form-control" required="required" placeholder="Description of The product" value="{{ $product->description }}" />
            </div>
        </div>
        <!-- End Description Field -->
        <!-- Start Price Field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Price</label>
            <div class="col-sm-10 col-md-6">
                <input type="text" name="price" class="form-control" required="required" placeholder="Price of The product" value="{{ $product->price }}" />
            </div>
        </div>
        <!-- End Price Field -->

        <!-- Start Rating  Field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Rating | (From 1 : 10)</label>
            <div class="col-sm-10 col-md-6">
                <input type="number" name="rating" class="form-control" required="required" value="{{$product->rating}}" placeholder="Rating of The product" min='0' max='10'/>
            </div>
        </div>
        <!-- End Rating Field -->

        <!-- Start Has Points Field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Has Points</label>
            <div class="col-sm-10 col-md-6">
                <input type="number" name="has_points" class="form-control" required="required" value="{{$product->has_points}}" placeholder="Points of The product" />
            </div>
        </div>
        <!-- End Has Points Field -->

        <!-- Start Replace Points Field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Replace Points</label>
            <div class="col-sm-10 col-md-6">
                <input type="number" name="replace_points" class="form-control" required="required" value="{{$product->replace_points}}" placeholder="Replace Points of The product" />
            </div>
        </div>
        <!-- End Replace Points Field -->


        <!-- Start Country Field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Country</label>
            <div class="col-sm-10 col-md-6">
                <input type="text" name="country" class="form-control" required="required" placeholder="Country of Made" value="{{ $product->country_made }}" />
            </div>
        </div>
        <!-- End Country Field -->
        <!-- Start Status Field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Status</label>
            <div class="col-sm-10 col-md-6">
                <select name="status">
                    <option value="1" @if($product->status == 1) selected @endif> Active</option>
                    <option value="0" @if($product->status == 0) selected @endif> Hidden</option>

                </select>
            </div>
        </div>
        <!-- End Status Field -->
        {{--<!-- Start Members Field -->--}}
        {{--<div class="form-group form-group-lg">--}}
            {{--<label class="col-sm-2 control-label">Member</label>--}}
            {{--<div class="col-sm-10 col-md-6">--}}
                {{--<select name="member">--}}

                    {{--@foreach($users as $user)--}}
                        {{--<option value="{{ $user->id }}" @if($product->member_id == $user->id) selected @endif>{{ $user->name }}</option>--}}
                    {{--@endforeach--}}

                {{--</select>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- End Members Field -->--}}
        <!-- Start Categories Field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Category</label>
            <div class="col-sm-10 col-md-6">
                <select name="category">
                    <option value="0">...</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($product->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                        @foreach($childCategories as $childCategory)
                            @if($childCategory->parent == $category->id)
                                <option value="{{ $childCategory->id }}" @if($product->category_id == $childCategory->id) selected @endif >{{ $childCategory->name }}</option>
                            @endif
                        @endforeach
                    @endforeach
                </select>
            </div>
        </div>
        <!-- End Categories Field -->
        <!-- Start Tags Field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Tags</label>
            <div class="col-sm-10 col-md-6">
                <input type="text" name="tags" class="form-control" placeholder="Separate Tags With Comma (,)" value="{{ $product->tags }}" />
            </div>
        </div>
        <!-- End Tags Field -->
        <!-- Start Submit Field -->
        <div class="form-group form-group-lg">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" value="Save product" class="btn btn-primary btn-sm" />
            </div>
        </div>
        <!-- End Submit Field -->
    </form>

</div>

@endsection