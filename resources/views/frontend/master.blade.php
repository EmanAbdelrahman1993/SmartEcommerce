<!DOCTYPE html>
<!--[if lte IE 8]> <html class="oldie" lang="en"> <![endif]-->
<!--[if IE 9]> <html class="ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
@include('frontend.partial.header')

<div id="wrapper">
    <div class="wrapper-holder">
        <div class="header-holder">
@include('frontend.partial.navbar')
        </div>
        <section class="main">
            <div class="content">
@include('frontend.partial.messages')
@yield('content')
            </div>
</section>
    </div>
@include('frontend.partial.footer')
</div>
@include('frontend.partial.scripts')
</body>
</html>
