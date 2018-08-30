@extends('admin.master')
@section('content')

<h1 class="text-center">Add New product</h1>
<div class="container">
    <form class="form-horizontal" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <!-- Start Name Field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10 col-md-6">
                <input type="text" name="name" class="form-control" value="{{old('name')}}" required="required" placeholder="Name of The product" />
            </div>
        </div>
        <!-- End Name Field -->
        <!-- Start Description Field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10 col-md-6">
                <input type="text" name="description" class="form-control" value="{{old('description')}}" required="required" placeholder="Description of The product" />
            </div>
        </div>
        <!-- End Description Field -->

            <!-- Start Has Points Field -->
            <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label">Has Points</label>
                <div class="col-sm-10 col-md-6">
                    <input type="number" name="has_points" class="form-control" required="required" value="{{old('has_points')}}" placeholder="Points of The product" />
                </div>
            </div>
            <!-- End Has Points Field -->

            <!-- Start Replace Points Field -->
            <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label">Replace Points</label>
                <div class="col-sm-10 col-md-6">
                    <input type="number" name="replace_points" class="form-control" required="required" value="{{old('replace_points')}}" placeholder="Replace Points of The product" />
                </div>
            </div>
            <!-- End Replace Points Field -->

            <!-- Start Price Field -->
            <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label">Price</label>
                <div class="col-sm-10 col-md-6">
                    <input type="text" name="price" class="form-control" required="required" value="{{old('price')}}" placeholder="Price of The product" />
                </div>
            </div>
            <!-- End Price Field -->

        <!-- Start Country Field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Country</label>
            <div class="col-sm-10 col-md-6">
                <input type="text" name="country" class="form-control" required="required" value="{{old('country')}}" placeholder="Country of Made" />
            </div>
        </div>
        <!-- End Country Field -->

            <!-- Start Rating  Field -->
            <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label">Rating | (From 1 : 10)</label>
                <div class="col-sm-10 col-md-6">
                    <input type="number" name="rating" class="form-control" required="required" value="{{old('rating')}}" placeholder="Rating of The product" min='0' max='10'/>
                </div>
            </div>
            <!-- End Rating Field -->
        <!-- Start Status Field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Status</label>
            <div class="col-sm-10 col-md-6">
                <select name="status">
                    <option value="0">Hidden</option>
                    <option value="1">Active</option>
                </select>
            </div>
        </div>
        <!-- End Status Field -->
        {{--<!-- Start Members Field -->--}}
        {{--<div class="form-group form-group-lg">--}}
            {{--<label class="col-sm-2 control-label">Member</label>--}}
            {{--<div class="col-sm-10 col-md-6">--}}
                {{--<select name="member">--}}
                    {{--<option value="">...</option>--}}
                    {{--@foreach($users as $user)--}}
                        {{--<option value="{{ $user->id }}">{{ $user->name }}</option>--}}
                    {{--@endforeach--}}
                {{--</select>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- End Members Field -->--}}
        <!-- Start Categories Field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Category</label>
            <div class="col-sm-10 col-md-6">
                <select name="category" required>
                    <option value="0">...</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @foreach($childCategories as $childCategory)
                            @if($childCategory->parent == $category->id)
                                <option value="{{ $childCategory->id }}">{{ $childCategory->name }}</option>
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
                <input type="text" name="tags" class="form-control" value="{{old('tags')}}" placeholder="Separate Tags With Comma (,)" />
            </div>
        </div>
        <!-- End Tags Field -->

            <!-- Start Image Field -->
            <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label">Image</label>
                <div class="col-sm-10 col-md-6">
                    <input type="file" class="form-control" name="image" required/>
                </div>
            </div>
            <!-- End Image Field -->


        <!-- Start Submit Field -->
        <div class="form-group form-group-lg">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" value="Add product" class="btn btn-primary btn-sm" />
            </div>
        </div>
        <!-- End Submit Field -->
    </form>
</div>
@endsection