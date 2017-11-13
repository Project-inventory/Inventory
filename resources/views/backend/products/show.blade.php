@extends('backend.layouts.app')

@section('title')
    Products
@endsection

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
    <h1>Products<small>List all thelow quantity of the product's record</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Products</li>
    </ol>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Table The Low Quantity of The Products</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table class="table table-striped pull-right pull-left" id="products-table">
                <thead>
                <tr>
                    <th>ID</th>
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
                ajax: 'http://siyen.dev:8080/Inventory/public/admin/products/get-low-products',
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
                        title: 'List of Products'
                    },
                    {
                        extend: 'pdf',
                        text:      '<i class="fa fa-file-pdf-o"></i> PDF',
                        titleAttr: 'PDF',
                        title: 'List of Products'
                    },
                    {
                        extend:    'print',
                        text:      '<i class="fa fa-print" aria-hidden="true"></i> Print',
                        titleAttr: 'Print'
                    }
                ],
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