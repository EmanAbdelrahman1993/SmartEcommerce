@extends('admin.master')
@section('content')

@if(!empty($products))
    <h1 class="text-center">Manage products</h1>
    <div class="container">
        <div class="table-responsive">
            <table class="main-table text-center table table-bordered">
                <tr>
                    <td>#ID</td>
                    <td>product Name</td>
                    <td>Description</td>
                    <td>Price</td>
                    <td>Adding Date</td>
                    <td>Category</td>
                    <td>Username</td>
                    <td>Control</td>
                </tr>
                @foreach($products as $product)
                <tr>

                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->category['name'] }}</td>
                    <td>{{ App\User::find($product->member_id)->name }}</td>

                    <td>
										<a href='/admin/product/{{ $product->id }}/edit' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>


                        <form class="form-horizontal" action="{{ route('product.destroy', $product->id) }}" method="POST">
                            <input name="_method" type="hidden" value="DELETE">
                            {{ csrf_field() }}
                            <input class="btn btn-danger confirm" type="submit" value="Delete">
                        </form>

                        {{--<a href='/admin/product/{{ $product->id }}/delete' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete </a>--}}
                    @if ($product->approve == 0)
                        <a href='product/{{ $product->id }}/active'
													class='btn btn-info activate'>
													<i class='fa fa-check'></i> Approve</a>
                    @endif
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <a href="/admin/product/create" class="btn btn-sm btn-primary">
            <i class="fa fa-plus"></i> New product
        </a>
    </div>
@else
    <div class="container">
        <div class="nice-message">There\'s No products To Show</div>
        <a href="/admin/product/create" class="btn btn-sm btn-primary">
                <i class="fa fa-plus"></i> New product
            </a>
    </div>
@endif
@endsection