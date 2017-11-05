@extends('backend.layouts.app')

@section('after-styles')
    <style type="text/css">
        #customers-table_filter {
            float: right;
        }
        #customers-table_length{
            float: left;
        }
    </style>
@endsection

@section('page-header')
    <h1>Customers<small>List all of the customer's record</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Customers</li>
    </ol>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Table Customers</h3>
            <div class="box-tools pull-right">
                <a href="{{ route('admin.customers.create')}}" class="btn btn-primary btn-sm">Add New Customer</a>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
                <table class="table table-striped" id="customers-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Telephone</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
        </div><!-- /.box-body -->
        @foreach($customers as $key=>$customer)
            @include('backend.customers.popup.popupView')
        @endforeach
    </div><!--box box-success-->
@endsection

@section('after-scripts')
    <script type="text/javascript">
        $(function () {
            $(function() {
                $('#customers-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: 'http://siyen.dev:8080/Inventory/public/admin/customers/get-customers',
                    columns: [
                        {data: 0, name: 'cust_id'},
                        {data: 1, name: 'cust_name'},
                        {data: 2, name: 'cust_gender'},
                        {data: 3, name: 'cust_tel'},
                        {data: 4, name: 'action'}
                    ]
                });
            });
        })
    </script>
@endsection