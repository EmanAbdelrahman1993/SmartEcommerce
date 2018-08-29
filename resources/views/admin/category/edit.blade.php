@extends('admin.master')
@section('content')

<h1 class="text-center">Edit Category</h1>
<div class="container">
    <form class="form-horizontal" action="{{ route('category.update', $category->id) }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PATCH">
        <!-- Start Name Field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10 col-md-6">
                <input type="text" name="name" class="form-control" required="required" placeholder="Name Of The Category" value="{{ $category->name }}" />
            </div>
        </div>
        <!-- End Name Field -->
        <!-- Start Description Field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10 col-md-6">
                <input type="text" name="description" class="form-control" placeholder="Describe The Category" value="{{ $category->description }}" />
            </div>
        </div>
        <!-- End Description Field -->

        <!-- Start Category Type -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Parent?</label>
            <div class="col-sm-10 col-md-6">
                <select name="parent">
                    <option value="0" @if($category->parent == 0) selected @endif> None</option>
                    @foreach($allCategories as $Cat)
                        <option value='{{ $Cat->id }}'
                        @if ($category->parent == $Cat->id) selected @endif >{{ $Cat->name }} </option>
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
                    {{--{{dd($category->status)}}--}}

                    <input id="vis-no" type="radio" name="status" value="1" @if ($category->status == 1) checked @endif />
                    <label for="vis-no">Yes</label>

                </div>
                <div>
                    <input id="vis-yes" type="radio" name="status" value="0"  @if ($category->status == 0) checked @endif  />
                    <label for="vis-yes">No</label>
                </div>
            </div>
        </div>
        <!-- End Visibility Field -->

        <!-- Start Submit Field -->
        <div class="form-group form-group-lg">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" value="Update" class="btn btn-primary btn-lg" />
            </div>
        </div>
        <!-- End Submit Field -->
    </form>
</div>
@endsection