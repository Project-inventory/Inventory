@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info col-md-4">
                <div class="box-header with-border">
                    <h3 class="box-title">View Supplier</h3>
                    <div class="box-tools pull-right">
                    </div><!-- /.box tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    Name : {{ $supplier->ven_name }}<br>
                    Company name : {{$supplier->ven_company}}<br>
                    Address : {{$supplier->ven_address}}<br>
                    Tel : {{$supplier->ven_tel}}<br>
                    Website : {{$supplier->ven_website}}<br>
                    Status : {{$supplier->ven_status}}<br>
                    Description :{{$supplier->ven_description}}<br>
                    Created Date: {{$supplier->insert_date}}
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ URL::to('supplier/list.html') }}" class="btn btn-danger btn-back mybtn pull-right">Back</a>
                </div>
            </div><!--box box-success-->
        </div>
    </div>
@endsection