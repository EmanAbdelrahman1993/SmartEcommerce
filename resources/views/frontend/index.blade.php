@extends('frontend.master')
@section('content')

        <div class="box_images">
            <a href="#"><img src="{{url('/')}}/frontend/images/pic_01.png" alt="" ></a>
        </div>
        <ul class="box_image_list">
            <li><a href="#"><img src="{{url('/')}}/frontend/images/pic_02.png" alt="" ></a></li>
            <li><a href="#"><img src="{{url('/')}}/frontend/images/pic_03.png" alt="" ></a></li>
            <li><a href="#"><img src="{{url('/')}}/frontend/images/pic_04.png" alt="" ></a></li>
        </ul>
        <div class="clear"></div>
        <section class="container">
            <div class="bottom-slider">
                <a href="#" class="btn-left"></a>
                <div class="slides">
                    <p>Last added products</p>
                    <ul class="item-list">
                        @if($last_added_products)
                            @foreach($last_added_products as $product)
                                <li>
                                    <div class="item">
                                        <div class="image">
                                            <img src="images/{{$product->image}}" height="42" width="42" alt="" />
                                        </div>
                                        <span>{{$product->name}} - Price: {{$product->price}}</span>
                                        <a href='/products/{{ $product->id }}' class='btn btn-xs btn-danger'>More</a>

                                    </div>
                                </li>

                                @endforeach
                            @else
                            <p>No Product to View !</p>
                            @endif
                    </ul>
                </div>
                <a href="#" class="btn-right"></a>
            </div>





        </section>
        <div class="block-advice">
            <div class="advice-holder">
                <p>Join our newsletter</p>
            </div>
            <form action="#" class="form-newsletter">
                <fieldset>
                    <input type="text" placeholder="Put your email..." />
                    <input class="btn black normal" type="submit" value="Subscribe" />
                </fieldset>
            </form>
        </div>

        <div class="checkout">
            <span>{{$product_no}} Products | <span class="pink">{{$total_price}} $</span></span>
            <a href="{{url('/cart')}}" class="btn btn_checkout">Checkout</a>
        </div>


        <div class="clear"></div>

    @stop