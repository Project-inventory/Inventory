@extends('backend.layouts.app')
@section('content')
    <style type="text/css">
        .box {
            background: #d2d6de;
        }
        .div-left , .div-right {
            background: white;
            padding: 1%;
            margin: 2%;
        }
    </style>
    <div class="box box-success col-md-4">
        <div class="box-header with-border">
            <h3 class="box-title">Order's List</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 div-left">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search product" aria-describedby="basic-addon2">
                        <span class="input-group-addon" id="basic-addon2">
                            <span class="glyphicon glyphicon-search"></span>
                        </span>
                    </div>
                </div>
                <div class="col-md-5 div-right">

                </div>
            </div>
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection