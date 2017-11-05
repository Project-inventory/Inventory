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
                <a href="{{ route('admin.products.index') }}" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{--========================================================================================================--}}
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{$count_customer}}</h3>

                    <p>Customers</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <a href="{{ route('admin.customers.index') }}" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{--========================================================================================================--}}
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{$count_supplier}}</h3>

                    <p>Suppliers</p>
                </div>
                <div class="icon">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                </div>
                <a href="{{ route('admin.suppliers.index') }}" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        {{--========================================================================================================--}}
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$count_sale}}</h3>

                    <p>Sales</p>
                </div>
                <div class="icon">
                    <i class="fa fa-usd" aria-hidden="true"></i>
                </div>
                <a href="{{ route('admin.sales.index') }}" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    {{--============================================================================================================--}}
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Area Chart</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <div id="container1" style="width:100%; height:400px;"></div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
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

@section('after-scripts')
    <script type="text/javascript">
        $(function () {
            var myChart = Highcharts.chart('container1', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Monthly Average Temperature'
                },
                subtitle: {
                    text: 'Source: WorldClimate.com'
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                yAxis: {
                    title: {
                        text: 'Temperature (°C)'
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                    name: 'Tokyo',
                    data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                }, {
                    name: 'London',
                    data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                }]
            });
        })
    </script>
@endsection