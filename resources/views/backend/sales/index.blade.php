@extends('backend.layouts.app')

@section('after-styles')
    <style type="text/css">
        #sales-table_filter {
            float: right;
        }
        #sales-table_length{
            float: left;
        }
    </style>
@endsection

@section('page-header')
    <h1>Sales<small>List all of sales record</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sales</li>
    </ol>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Table Sales</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table class="table table-striped" id="sales-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Customer Name</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>


                </tbody>
            </table>
        </div><!-- /.box-body -->
        {{--@foreach($sales as $key=>$sales)--}}
            {{--@include('backend.sales.popup.popupView')--}}
        {{--@endforeach--}}
    </div><!--box box-success-->
@endsection

@section('after-scripts')
    <script type="text/javascript">
        $(function () {
            $(function() {
                $('#sales-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: 'http://siyen.dev:8080/Inventory/public/admin/sales/get-sales',
                    columns: [
                        {data: 0, name: 'order_id'},
                        {data: 1, name: 'pro_name'},
                        {data: 2, name: 'cust_name'},
                        {data: 3, name: 'order_quantity'},
                        {data: 4, name: 'order_amount'},
                        {data: 5, name: 'action'}
                    ]
                });
            });
        })
    </script>
@endsection