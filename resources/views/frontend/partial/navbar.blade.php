
<header id="header">
    <span class="logo"><a href="{{url('/home')}}">Bambino</a></span>
    <div class="tools-nav_holder">
        <ul class="tools-nav">
            <li><a href="#">{!! Auth::user()->name !!}</a></li>
            <li class="login"><a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

        </ul>
        <div class="checkout">
            <span>3 products, <span class="pink">$380,50</span></span>
            <a href="cart.html" class="btn btn_checkout">Checkout</a>
        </div>
    </div>
    <div class="clear"></div>
    <a class="menu_trigger" href="#">menu</a>
    <nav id="nav">
        <ul class="navi">
            <li class="searc_li" >
                <div  class="ul_search li">
                    <a class="search" href="#"><span>search</span></a>
                    <form method="get" class="searchform" action="#">
                        <input type="text" class="field" name="s" id="s" placeholder="What are you looking for?" />
                        <input type="submit" class="submit" value=""  />
                        <div class="clear"></div>
                    </form>
                </div >
            </li>
            <li><a href="{{url('/products')}}">Our collection</a></li>
            <li><a href="products.html">Top products </a></li>
            <li><a href="products.html">Best sellers</a></li>
            <li><a href="products.html">Gifts</a></li>
            <li><a href="products.html">Promotions</a></li>
        </ul>
        <div  class="ul_search">
            <a class="search" href="#"><span>search</span></a>
            <form method="get" class="searchform" action="#">
                <input type="text" class="field" name="s" id="s" placeholder="What are you looking for?" />
                <input type="submit" class="submit" value=""  />
            </form>
        </div >
    </nav>
</header>
