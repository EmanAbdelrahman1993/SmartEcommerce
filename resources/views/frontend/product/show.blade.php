@extends('frontend.master')
@section('content')


    <div class="content">
        <section class="bar">
            <div class="bar-frame">
                <ul class="breadcrumbs">
                    <li><a href="{{url('/home')}}">Home</a></li>
                    <li>Product page</li>
                </ul>
            </div>
        </section>
        <div class="details-info">
            <div class="slid_box">
                <ul class="bxslider">
                    <li><img src="{{url('/images/'.$product->image)}}"/></li>

                </ul>

            </div>
            <div class="description">
                <div class="head">
                    <h1 class="title">{{$product->name}}</h1>
                    <h3>{{$product->country_made}}</h3>
                    <h2>{{$product->price}}</h2>
                </div>
                <div class="section">
                    <form class="form-sort page" action="{{url('add_to_cart/'.$product->id)}}">
                        <fieldset>
                            <div class="row">
                                <label for="page">Quantity:</label>
                                <input type="number" name="quantity" class="form-control" min="1" max="10">
                                <div class="clear"></div>
                            </div>
                            <input type="submit" value="Add to cart" class="btn pink" />
                        </fieldset>
                    </form>
                </div>
                <div id="tabs">
                    <ul>
                        <li><a href="#tabs-1">Product information</a></li>
                        <li><a href="#tabs-2">How to use Points</a></li>
                        <li><a href="#tabs-3">Reviews</a></li>
                    </ul>
                    <div id="tabs-1">{{$product->description}}</div>
                    <div id="tabs-2">Product Give You <h2 style="color: deeppink">{{$product->has_points}} Points.</h2>  You Can replace this points with Products. </div>
                    <div id="tabs-3">
                        <ul class="reviews">
                            @foreach($product->comments as $comment)
                            <li>
                                <p class="name">{{$comment->user->name}}</p>
                                <p>Comment : {{$comment->comment}}</p>
                            </li>
                           @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>

@endsection