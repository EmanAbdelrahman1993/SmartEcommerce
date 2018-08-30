@extends('admin.master')
@section('content')
    <h1><center>Dashboard</center></h1>
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-account-location text-danger icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Total Members</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">
                                    <span><a href="/admin/user">{{ $users }}</a></span>
                                </h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-receipt text-warning icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Products</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">
                                    <span><a href="/product">{{ $products }}</a></span>
                                </h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-menu text-success icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Categories</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">
                                    <span><a href="/category">{{ $categories }}</a></span>
                                </h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-message-text text-info icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Comments</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">
                                    <span><a href="/comment">{{ $comments }}</a></span>
                                </h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop