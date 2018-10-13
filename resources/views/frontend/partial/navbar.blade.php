
<header id="header">
    <span class="logo"><a href="{{url('/home')}}">Bambino</a></span>
    <div class="tools-nav_holder">
        <ul class="tools-nav">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}  - {{Auth::user()->email}}<span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest

        </ul>



        <div class="banner_box">
            <p>Take a part in our competition</p>
            <span>and get 80% discount for shopping</span>
        </div>

    </div>
    <div class="clear"></div>
    <a class="menu_trigger" href="#">menu</a>
    <nav id="nav">
        <ul class="navi">
            <li class="searc_li" >
                <div  class="ul_search li">
                    <a class="search" href="url{{('search')}}"><span>search</span></a>
                    <form method="get" class="searchform" action="{{ url('search') }}">
                        <input type="text" class="field" name="s" id="s" placeholder="What are you looking for?" />
                        <input type="submit" class="submit" value=""  />
                        <div class="clear"></div>
                    </form>
                </div >
            </li>
            <li><a href="{{url('/products')}}">Our collection</a></li>
            <li><a href="{{url('/home')}}">Top products </a></li>
            <li><a href="{{url('/cart')}}">Your Cart</a></li>
            <li><a href="{{url('/viewOrders')}}">Your Order</a></li>
            <li><a href="#">Promotions</a></li>
        </ul>
        <div  class="ul_search">
            <a class="search" href="#"><span>search</span></a>
            <form method="get" class="searchform" action="{{url('/search')}}" method="post">
                @csrf
                <input type="text" class="field" name="s" id="s" placeholder="What are you looking for?" />
                <input type="submit" class="submit" value=""  />
            </form>
        </div >
    </nav>
</header>
