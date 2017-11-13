@extends('backend.layouts.app')

@section('title')
    Sales
@endsection

@section('after-styles')
    <style type="text/css">
        #sales-table_filter {
            float: right;
        }
        #sales-table_length{
            float: left;
        }
        .my_class {
            display: none;
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
                    <th hidden>#</th>
                    <th>Product id</th>
                    <th>Product name</th>
                    <th>Customer name</th>
                    <th>Quantity</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>


                </tbody>
            </table>
        </div><!-- /.box-body -->
        @foreach($orders as $key=>$order)
            @include('backend.sales.popup.popupView')
        @endforeach
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
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend:    'copy',
                            text:      '<i class="fa fa-files-o"></i> Copy',
                            titleAttr: 'Copy'
                        },
                        {
                            extend: 'excel',
                            text:      '<i class="fa fa-file-excel-o"></i> Excel',
                            titleAttr: 'Excel',
                            title: 'List of Sales'
                        },
                        {
                            extend: 'pdf',
                            text:      '<i class="fa fa-file-pdf-o"></i> PDF',
                            titleAttr: 'PDF',
                            title: 'List of Sales'
                        },
                        {
                            extend:    'print',
                            text:      '<i class="fa fa-print" aria-hidden="true"></i> Print',
                            titleAttr: 'Print'
                        }
                    ],
                    orderFixed: [5, 'asc'],
                    rowGroup: {
                        startRender: function ( rows, group ) {
                            return 'Date: ' + group +' ( Items: '+rows.count()+' )';
                        },
                        dataSrc: 5
                    },
                    columns: [
                        { className: "my_class", "targets": [ 0 ] },
                        {data: 1, name: 'pro_id'},
                        {data: 2, name: 'pro_name'},
                        {data: 3, name: 'cust_name'},
                        {data: 4, name: 'order_quantity'},
                        {data: 5, name: 'order_date'},
                        {data: 6, name: 'action'}
                    ]
                });
            });
        })
    </script>
@endsection