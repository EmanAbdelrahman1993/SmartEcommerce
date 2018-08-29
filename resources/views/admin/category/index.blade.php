@extends('admin.master')
@section('content')

    <h1 class="text-center">Manage Categories
        <a class="add-category btn btn-primary" href="/category/create"><i class="fa fa-plus"></i> Add New Category</a>
    </h1>

    @if(!empty($categories))
        <div class="container categories">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-edit"></i> Manage Categories  Ordering: [
                        <a class="" href="?sort=asc">Asc</a> |
                        <a class="" href="?sort=desc">Desc</a> ]
                    </div>
                </div>
        <hr>
                <div class="panel-body">
                    @foreach($categories as $category)

                            <ul class="list-group"> <h3><li class="list-group-item list-group-item-action">{{ $category->name }}


                                        <a href='/category/{{ $category->id }}/edit' class='btn btn-xs btn-primary'>Edit</a>

                                        <form class="form-horizontal" action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: inline;">

                                            <input name="_method" type="hidden" value="DELETE">
                                            {{ csrf_field() }}

                                            <input class="btn btn-danger btn btn-xs confirm" type="submit" value="Delete">
                                        </form>

                                    </li>
                            </h3>
                            <li class="list-group-item list-group-item-action">
                                <p>
                                    @if( $category->status == 0) Status : <h5>Hidden</h5>@else Status : <h5>Active</h5>@endif

                                @if($category->description == '') This category has no description @else Description : <h5> {{ $category->description }} </h5> @endif
                                </p>
                            </li>



                            </ul>
                    <br>
                            <h4 class='child-head'>Child Categories</h4>
                            <ul class='list-group'>
                                @foreach($childCategories as $cat)
                                    @if($category->id == $cat->parent)
                                        <li class='child-link'>
                                            <h5>{{ $cat->name }}
                                                <a href='/category/{{ $cat->id }}/edit' class='btn btn-xs btn-info' ><i class='fa fa-edit'></i> Edit</a>


                                                <form class="form-horizontal" action="{{ route('category.destroy', $cat->id) }}" method="POST" style="display: inline;">

                                                    <input name="_method" type="hidden" value="DELETE">
                                                    {{ csrf_field() }}

                                                    <input class="btn btn-danger btn btn-xs confirm" type="submit" value="Delete">
                                                </form>

                                            </h5>
                                            <br class='full-view'>
                                            <p>
                                                @if( $category->status == 0) Status : <h5>Hidden</h5>@else Status : <h5>Active</h5>@endif

                                            @if($category->description == '') This category has no description @else Description : <h5> {{ $category->description }} </h5> @endif
                                            </p>


                                    @endif


                                @endforeach



                        </div>
                        <hr>

                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="nice-message">There\'s No Categories To Show</div>
            <a href="/category/create" class="btn btn-primary">
                <i class="fa fa-plus"></i> New Category
            </a>
        </div>
    @endif
@endsection















