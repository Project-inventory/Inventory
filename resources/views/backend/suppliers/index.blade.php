@extends('backend.layouts.app')

@section('after-styles')
    <style type="text/css">
        #suppliers-table_filter {
            float: right;
        }
        #suppliers-table_length{
            float: left;
        }
    </style>
@endsection

@section('page-header')
    <h1>Suppliers<small>List all of suppliers record</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Suppliers</li>
    </ol>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Table Suppliers</h3>
            <div class="box-tools pull-right">
                <a href="{{ route('admin.suppliers.create') }}" class="btn btn-primary btn-sm">Add New Supplier</a>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <table class="table table-striped" id="suppliers-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Telephone</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>


                </tbody>
            </table>
        </div><!-- /.box-body -->
        @foreach($suppliers as $key=>$supplier)
            @include('backend.suppliers.popup.popupView')
        @endforeach
    </div><!--box box-success-->
@endsection

@section('after-scripts')
    <script type="text/javascript">
        $(function () {
            $(function() {
                $('#suppliers-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: 'http://siyen.dev:8080/Inventory/public/admin/suppliers/get-suppliers',
                    columns: [
                        {data: 0, name: 'ven_id'},
                        {data: 1, name: 'ven_name'},
                        {data: 2, name: 'ven_address'},
                        {data: 3, name: 'ven_tel'},
                        {data: 4, name: 'action'}
                    ]
                });
            });
        })
    </script>
@endsection