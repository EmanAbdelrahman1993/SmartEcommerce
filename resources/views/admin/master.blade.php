<!DOCTYPE html>
<html lang="en">
@include('admin.partial.header')
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
@include('admin.partial.navbar')

<div class="container-fluid page-body-wrapper">
@include('admin.partial.sideMenu')

    <div class="main-panel">
        <div class="content-wrapper">

@include('admin.partial.messages')
@yield('content')
</div>
    </div>
    </div>

@include('admin.partial.scripts')
</body>

</html>




