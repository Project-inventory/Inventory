@extends('backend.layouts.app')

@section('page-header')
        <h1>Dashboard<small>Control panel</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
@endsection

@section('content')
    <div class="row">

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$count_product}}</h3>

                    <p>Products</p>
                </div>
                <div class="icon">
                    <i class="fa fa-cubes"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{--========================================================================================================--}}
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$count_customer}}</h3>

                    <p>Customers</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{--========================================================================================================--}}
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$count_supplier}}</h3>

                    <p>Suppliers</p>
                </div>
                <div class="icon">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{--========================================================================================================--}}
        {{--<div class="col-md-4">--}}
            {{--<div class="info-box level level-info ">--}}
                {{--<span class="info-box-icon">--}}
                    {{--<i class="fa fa-signal" aria-hidden="true"></i>--}}
                {{--</span>--}}
                {{--<div class="info-box-content">--}}
                    {{--<span class="info-box-text">Product's quantity</span>--}}
                        {{--<span class="info-box-number">--}}
                            {{--afgshdjfgh--}}
                        {{--</span>--}}
                    {{--<div class="progress">--}}
                        {{--<div class="progress-bar" style=" width: 0%"></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--========================================================================================================--}}
        {{--<div class="col-md-4">--}}
            {{--<div class="info-box level level-info ">--}}
                {{--<span class="info-box-icon">--}}
                    {{--<i class="fa fa-user" aria-hidden="true"></i>--}}
                {{--</span>--}}
                {{--<div class="info-box-content">--}}
                    {{--<span class="info-box-text">Member</span>--}}
                        {{--<span class="info-box-number">--}}
                            {{--afgshdjfgh--}}
                        {{--</span>--}}
                    {{--<div class="progress">--}}
                        {{--<div class="progress-bar" style=" width: 0%"></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--========================================================================================================--}}
        {{--<div class="col-md-4">--}}
            {{--<div class="info-box level level-info ">--}}
                {{--<span class="info-box-icon">--}}
                    {{--<i class="fa fa-shopping-cart" aria-hidden="true"></i>--}}
                {{--</span>--}}
                {{--<div class="info-box-content">--}}
                    {{--<span class="info-box-text">Orders</span>--}}
                        {{--<span class="info-box-number">--}}
                            {{--afgshdjfgh--}}
                        {{--</span>--}}
                    {{--<div class="progress">--}}
                        {{--<div class="progress-bar" style=" width: 0%"></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    </div>
    {{--============================================================================================================--}}
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-star-o" aria-hidden="true"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Brands</span>
                    <span class="info-box-number">Total: {{$count_brand}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        {{--========================================================================================================--}}
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-tags" aria-hidden="true"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Categories</span>
                    <span class="info-box-number">Total: {{$count_category}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        {{--========================================================================================================--}}
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-tasks" aria-hidden="true"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Groups</span>
                    <span class="info-box-number">Total: {{$count_group}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        {{--========================================================================================================--}}

    </div>

@endsection