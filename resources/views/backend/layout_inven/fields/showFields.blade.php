@extends('backend.layouts.app')
@section('content')
    <style type="text/css">
        .box {
            width: 30%;
            margin-left: 2%;
        }
    </style>
    <div class="row">

        <div class="box box-success col-md-4">
            <div class="box-header with-border">
                <h3 class="box-title">Groups</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /.box tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($group as $gp=>$value)
                    <tr>
                        <td>{{$gp+1}}</td>
                        <td>{{ $value->gp_name }}</td>
                        <td style="width: 50px; ">
                            {!! Form::open(['method' => 'DELETE','route' => ['DelGroup.destroy', $value->gp_id],'style'=>'display:inline']) !!}
                             <button type="submit" class="btn btn-danger">
                                 <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                             </button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#gp_modal">
                    Add Group
                </button>
            </div>
        </div><!--box box-success-->

{{--------------------------------------------------------------------------------------------------------------------}}
        <div class="box box-info col-md-4">
            <div class="box-header with-border">
                <h3 class="box-title">Categories</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /.box tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cat as $key=>$value)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $value->cat_name }}</td>
                        <td style="width: 50px; ">
                            {!! Form::open(['method' => 'DELETE','route' => ['DelCat.destroy', $value->cat_id],'style'=>'display:inline']) !!}
                            <button type="submit" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#cat_modal">
                    Add Category
                </button>
            </div>
        </div><!--box box-success-->

{{--------------------------------------------------------------------------------------------------------------------}}
        <div class="box box-warning col-md-4">
            <div class="box-header with-border">
                <h3 class="box-title">Brands</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /.box tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brand as $br=>$value)
                        <tr>
                            <td>{{ $br+1 }}</td>
                            <td>{{ $value->brand_name }}</td>
                            <td style="width: 50px; ">
                                {!! Form::open(['method' => 'DELETE','route' => ['DelBrand.destroy', $value->brands_id],'style'=>'display:inline']) !!}
                                <button type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#brand_modal">
                    Add Brand
                </button>
            </div>
        </div><!--box box-success-->
    </div>
    @include('backend.layout_inven.fields.popup.popupBrand')
    @include('backend.layout_inven.fields.popup.popupCategory')
    @include('backend.layout_inven.fields.popup.popupGroup')
@endsection