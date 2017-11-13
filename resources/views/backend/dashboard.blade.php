@extends('backend.layouts.app')

@section('title')
    Dashboard
@endsection

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
                    <h3>{{is_null($count_product)? '0':$count_product}}</h3>

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
                    <h3>{{is_null($count_customer)?'0':$count_customer}}</h3>

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
                    <h3>{{is_null($count_supplier)?'0':$count_supplier}}</h3>

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
                    <h3>{{is_null($count_sale)?'0':$count_sale}}</h3>

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
        <div class="col-md-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-align-left" aria-hidden="true"></i>
                    <h3 class="box-title">Progress bars</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="box-body">
                    <div class="progress-group">
                        <span class="progress-text"><a href="{{ route('admin.products.show') }}">Products has Low Quantity in Stock</a></span>
                        <span class="progress-number"><b>{{is_null($count_lowProduct)?'0':$count_lowProduct}}</b>/{{is_null($count_product)?'0':$count_product}}</span>

                        <div class="progress">
                            <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: {{$lowProducts}}%"></div>
                        </div>
                    </div>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                        <span class="progress-text"><a href="{{ route('admin.customers.show') }}">Members</a></span>
                        <span class="progress-number"><b>{{is_null($count_member)?'0':$count_member}}</b>/{{is_null($count_customer)?'0':$count_customer}}</span>

                        <div class="progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped" style="width: {{$members}}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--============================================================================================================--}}
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
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
                    <span class="info-box-number">Total: {{is_null($count_category)?'0':$count_category}}</span>
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
                    <span class="info-box-number">Total: {{is_null($count_group)?'0':$count_group}}</span>
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
            var data_monthlySales = <?php echo $monthly_sale; ?>;
            var data_months = <?php echo $months; ?>;
            var months = [];
            for (var i=0; i<data_months.length; i++ ) {
                months.push(data_months[i].month);
            }
            var myChart = Highcharts.chart('container1', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Monthly Sales List'
                },
                subtitle: {
                    text: 'Source: report sales product'
                },
                xAxis: {
                    categories: months,
                },
                yAxis: {
                    title: {
                        text: 'Number of Sales'
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
                    name: 'Sales Product',
                    data: data_monthlySales
                }]
            });
        })
    </script>
@endsection