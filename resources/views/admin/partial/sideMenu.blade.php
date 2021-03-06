<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="user-wrapper">
                    <div class="profile-image">
                        <img src="{{url('/')}}/backend/images/faces/face1.jpg" alt="profile image">
                    </div>
                    <div class="text-wrapper">
                        <p class="profile-name">{{auth::user()->name}}</p>
                        <div>
                            <small class="designation text-muted">Super-Admin</small>
                            <span class="status-indicator online"></span>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success btn-block">Admin Dashboard

                </button>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/admin')}}">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-account"></i>
                <span class="menu-title">Admin Functionality</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item"><a class="nav-link" href="{{ url('/admin/user') }}">Manage Users</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/admin/role') }}">Manage Role</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/admin/permission') }}">Manage Permissions</a></li>

                </ul>


            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/category">
                <i class="menu-icon mdi mdi-table"></i>
                <span class="menu-title">Categories</span>
            </a>
        </li>
        {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="pages/tables/basic-table.html">--}}
                {{--<i class="menu-icon mdi mdi-table"></i>--}}
                {{--<span class="menu-title">Tables</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        <li class="nav-item">
            <a class="nav-link" href="/product">
                <i class="menu-icon mdi mdi-sticker"></i>
                <span class="menu-title">Products</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/comment">
                <i class="menu-icon mdi mdi-backup-restore"></i>
                <span class="menu-title">Comments</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/order">
                <i class="menu-icon mdi mdi-checkbox-marked-circle"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/home">
                <i class="menu-icon mdi mdi-tag-faces"></i>
                <span class="menu-title">Front End View</span>
            </a>
        </li>

        {{--<li class="nav-item">--}}
            {{--<a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">--}}
                {{--<i class="menu-icon mdi mdi-restart"></i>--}}
                {{--<span class="menu-title">User Pages</span>--}}
                {{--<i class="menu-arrow"></i>--}}
            {{--</a>--}}
            {{--<div class="collapse" id="auth">--}}
                {{--<ul class="nav flex-column sub-menu">--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="pages/samples/login.html"> Login </a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="pages/samples/register.html"> Register </a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="pages/samples/error-404.html"> 404 </a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="pages/samples/error-500.html"> 500 </a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</li>--}}
    </ul>
</nav>
<!-- partial -->