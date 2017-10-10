@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info col-md-4">
                <div class="box-header with-border">
                    <h3 class="box-title">View Customer</h3>
                    <div class="box-tools pull-right">
                    </div><!-- /.box tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    Name : {{ $customer->cust_name }}<br>
                    Gender : {{$customer->cust_gender}}<br>
                    Address : {{$customer->cust_address}}<br>
                    Tel : {{$customer->cust_tel}}<br>
                    City : {{$customer->city}}<br>
                    Company : {{$customer->company}}<br>
                    Description :{{$customer->registerDate}}
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ URL::to('customer/list.html') }}" class="btn btn-danger btn-back mybtn pull-right">Back</a>
                </div>
            </div><!--box box-success-->
        </div>
    </div>
@endsection