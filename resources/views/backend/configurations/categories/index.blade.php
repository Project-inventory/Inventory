@extends('backend.layouts.app')

@section('after-styles')
    <style type="text/css">
        #categories-table_filter {
            float: right;
        }
        #categories-table_length{
            float: left;
        }
    </style>
@endsection

@section('page-header')
    <h1>Category
        <small>List all categories record</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Configuration</li>
        <li class="active">Category</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Category</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal"
                                data-target="#cat_modal">
                            Add Category
                        </button>
                    </div><!-- /.box tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="categories-table" class="table table-striped">
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
    @foreach($categories as $key => $category)
        @include('backend.configurations.categories.edit')
    @endforeach
    @include('backend.configurations.popup.popupCategory')

@endsection

@section('after-scripts')
    <script type="text/javascript">
        $(function() {
            $('#categories-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'http://siyen.dev:8080/Inventory/public/admin/configurations/categories/get-categories',
                columns: [
                    {data: 0, name: 'cat_id'},
                    {data: 1, name: 'cat_name'},
                    {data: 2, name: 'action'}
                ]
            });
        });
    </script>
@endsection