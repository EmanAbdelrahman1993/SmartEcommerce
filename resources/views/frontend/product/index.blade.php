@extends('frontend.master')
@section('content')

    <div class="content">
    <section class="bar">
        <div class="bar-frame">
            <ul class="breadcrumbs">
                <li><a href="index.html">Home</a></li>
                <li>Product results</li>
            </ul>
        </div>
    </section>
    <div class="top-bar">
        <form class="form-sort" action="#">
            <fieldset>
                <div class="row">
                    <label for="sort">Sort by :</label>
                    <select id="sort">
                        <option>price</option>
                        <option>price</option>
                    </select>
                </div>
                <div class="row">
                    <label for="page">Products per page:</label>
                    <select id="page">
                        <option>8</option>
                        <option>8</option>
                    </select>
                </div>
                <div class="row">
                    <label for="page">Type of product:</label>
                    <select id="page">
                        <option>Boxed</option>
                        <option>Boxed</option>
                    </select>
                </div>
            </fieldset>
        </form>

    </div>
    <ul class="item-product">
        @if($products)
           @foreach($products as $product)
                    <li>
                        <div class="item">
                            <div class="image">
                                <img src="images/{{$product->image}}"  alt="" />
                            </div>
                            <span class="name">{{$product->name}}</span>
                            <span>{{$product->price}}</span>
                            <a href='/products/{{ $product->id }}' class='btn btn-xs btn-danger'>More</a>

                        </div>
                    </li>
            @endforeach
               <center>
                   {{$products->links()}}
               </center>

        @else
        <li>
            <div class="item">
                <p><h2>No Products To view</h2></p>
            </div>
        </li>
        @endif
    </ul>

</div>
@endsection