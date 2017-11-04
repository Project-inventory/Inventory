@extends('backend.layouts.app')
@section('content')
    @include('backend.layout_inven.css.customStyle')
    <div class="row">
        <div class="col-md-12">
            <p class="text-center">{!! session('message') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><b></i>Edit Customer</b></h3>
                </div>

                <div class="box-body" style="padding-bottom: 4px">
                    <form action="{{ route('admin.customers.update') }}" method="POST" id="form-create-supplier" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="row">
                            {{--------------------------------------------------------------------------------------------}}
                            <div class="col-lg-10 col-md-10 col-sm-10 col-md-offset-1">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cusName">Customer Name</label>
                                        <input type="hidden" id="cust_id" name="cust_id" value="{{$customer->cust_id}}">
                                        <input type="text"  name="cust_name" id="cust_name" class="form-control" value="{{$customer->cust_name}}">
                                    </div>
                                </div>
                                {{------------------------------------------------------------------------------------}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sex">Gender</label>
                                        <select name="cust_gender" id="cust_gender" class="form-control">
                                            @if($customer->cust_gender == 'male')
                                                <option value="male" selected>Male</option>
                                                <option value="female">Female</option>
                                            @else
                                                <option value="male">Male</option>
                                                <option value="female" selected>Female</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                {{------------------------------------------------------------------------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" id="cust_address" name="cust_address" class="form-control" value="{{$customer->cust_address}}">
                                    </div>
                                </div>
                                {{------------------------------------------------------------------------------------}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="SuppTel">Telephone</label>
                                        <input type="text" name="cust_tel" id="cust_tel" class="form-control" value="{{$customer->cust_tel}}">
                                    </div>
                                </div>
                                {{------------------------------------------------------------------------------------}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" name="city" id="city" class="form-control" value="{{$customer->city}}">
                                    </div>
                                </div>
                                {{------------------------------------------------------------------------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="company">Comapny</label>
                                        <input type="text" name="company" id="company" class="form-control" value="{{$customer->company}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--------------------------------------------------------------------------------------------}}
                        <div class="box-footer pull-right" style="margin-top: 3%">
                            <button type="submit" class="btn btn-primary btn-save mybtn">Update</button>
                            <a href="{{ route('admin.customers.index') }}" class="btn btn-danger btn-back mybtn">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection