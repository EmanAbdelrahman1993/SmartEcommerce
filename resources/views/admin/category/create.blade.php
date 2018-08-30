@extends('admin.master')
@section('content')
<h1 class="text-center">Add New Category</h1>
<div class="container">
    <form class="form-horizontal" action="{{ route('category.store') }}" method="POST">
    {{ csrf_field() }}
        <!-- Start Name Field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10 col-md-6">
                <input type="text" name="name" class="form-control" value="{{old('name')}}" autocomplete="off" required="required" placeholder="Name Of The Category" />
            </div>
        </div>
        <!-- End Name Field -->
        <!-- Start Description Field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10 col-md-6">
                <input type="text" name="description" value="{{old('description')}}" class="form-control" placeholder="Describe The Category" />
            </div>
        </div>
        <!-- End Description Field -->

        <!-- Start Category Type -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Parent?</label>
            <div class="col-sm-10 col-md-6">
                <select name="parent">
                    <option value="0">None</option>
                   @foreach($category as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- End Category Type -->
        <!-- Start Visibility Field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Visible</label>
            <div class="col-sm-10 col-md-6">
                <div>
                    <input id="vis-yes" type="radio" name="status" value="1" checked />
                    <label for="vis-yes">Yes</label>
                </div>
                <div>
                    <input id="vis-no" type="radio" name="status" value="0" />
                    <label for="vis-no">No</label>
                </div>
            </div>
        </div>
        <!-- End Visibility Field -->

        <!-- Start Submit Field -->
        <div class="form-group form-group-lg">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" value="Add Category" class="btn btn-primary btn-lg" />
            </div>
        </div>
        <!-- End Submit Field -->
    </form>
</div>
@endsection