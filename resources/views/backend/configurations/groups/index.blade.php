@extends('backend.layouts.app')

@section('after-styles')
    <style type="text/css">
        #groups-table_filter {
            float: right;
        }
        #groups-table_length{
            float: left;
        }
    </style>
@endsection

@section('page-header')
    <h1>Group
        <small>List all groups record</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Configuration</li>
        <li class="active">Group</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Group</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#gp_modal">Add Group
                        </button>
                    </div><!-- /.box tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="groups-table" class="table table-striped">
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
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>

    @foreach( $groups as $key => $group)
        @include('backend.configurations.groups.edit')
    @endforeach
    @include('backend.configurations.popup.popupGroup')

@endsection

@section('after-scripts')
    <script type="text/javascript">
        $(function() {
            $('#groups-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'http://siyen.dev:8080/Inventory/public/admin/configurations/groups/get-groups',
                columns: [
                    {data: 0, name: 'gp_id'},
                    {data: 1, name: 'gp_name'},
                    {data: 2, name: 'action'}
                ]
            });
        });
    </script>
@endsection