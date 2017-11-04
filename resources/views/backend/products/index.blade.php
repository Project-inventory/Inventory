@extends('backend.layouts.app')

@section('after-styles')
    <style type="text/css">
        #products-table_filter {
            float: right;
        }
        #products-table_length{
            float: left;
        }
    </style>
@endsection

@section('page-header')
    <h1>Products<small>List all products record</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">products</li>
    </ol>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Table Products</h3>
            <div class="box-tools pull-right">
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">Add New Customer</a>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <table class="table table-striped pull-right pull-left" id="products-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Barcode</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div><!-- /.box-body -->
    </div><!--box box-success-->
    @foreach($products as $product)
        @include('backend.products.popup.popupView')
    @endforeach
@endsection

@section('after-scripts')

    <script type="text/javascript">
        $(function() {
            $('#products-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'http://siyen.dev:8080/Inventory/public/admin/products/get-products',
                columns: [
                    {data: 0, name: 'pro_id'},
                    {data: 1, name: 'pro_name'},
                    {data: 2, name: 'pro_quantity'},
                    {data: 3, name: 'pro_barcode'},
                    {data: 4, name: 'action'}
                ]
            });
        });
    </script>
@endsection