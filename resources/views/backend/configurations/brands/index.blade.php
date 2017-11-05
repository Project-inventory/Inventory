@extends('backend.layouts.app')

@section('after-styles')
    <style type="text/css">
        #brands-table_filter {
            float: right;
        }
        #brands-table_length{
            float: left;
        }
    </style>
@endsection

@section('page-header')
    <h1>Brand
        <small>List all brands record</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Configuration</li>
        <li class="active">Brand</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Brand</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#brand_modal">Add Brand
                        </button>
                    </div><!-- /.box tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="brands-table" class="table table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div>
        </div>
    </div>
    @foreach($brands as $key => $brand)
        @include('backend.configurations.brands.edit')
    @endforeach

    @include('backend.configurations.popup.popupBrand')

@endsection

@section('after-scripts')
    <script type="text/javascript">
        $(function() {
            $('#brands-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'http://siyen.dev:8080/Inventory/public/admin/configurations/brands/get-brands',
                columns: [
                    {data: 0, name: 'brands_id'},
                    {data: 1, name: 'brand_name'},
                    {data: 2, name: 'action'}
                ]
            });
        });
    </script>
@endsection