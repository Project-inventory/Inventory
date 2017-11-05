@extends('backend.layouts.app')

@section('page-header')
    <h1>Customers<small>Add new customer record</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('admin.customers.index') }}">Customers</a></li>
        <li class="active">Add new customer</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="text-center">{!! session('message') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><b></i>Add New Customer</b></h3>
                </div>

                <div class="box-body" style="padding-bottom: 4px">
                    <form action="{{ route('admin.customers.store') }}" method="POST" id="form-create-supplier" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="row">
                            {{--------------------------------------------------------------------------------------------}}
                            <div class="col-lg-10 col-md-10 col-sm-10 col-md-offset-1">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cusName">Customer Name</label>
                                        <input type="text"  name="cust_name" id="cust_name" value="{{ old("cust_name") }}" class="form-control" required>
                                        <p class="text-danger">{{$errors->first("cust_name")}}</p>
                                    </div>
                                </div>
                                {{------------------------------------------------------------------------------------}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sex">Gender</label>
                                        <select name="cust_gender" id="cust_gender" class="form-control" required>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                {{------------------------------------------------------------------------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" id="cust_address" name="cust_address" class="form-control" value="{{ old("cust_address") }}">
                                    </div>
                                </div>
                                {{------------------------------------------------------------------------------------}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="SuppTel">Telephone number</label>
                                        <input type="number" name="cust_tel" id="cust_tel" class="form-control" value="{{ old('cust_tel') }}" required>
                                        <p class="text-danger">{{$errors->first("cust_tel")}}</p>
                                    </div>
                                </div>
                                {{------------------------------------------------------------------------------------}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}">
                                    </div>
                                </div>
                                {{------------------------------------------------------------------------------------}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company">Comapny</label>
                                        <input type="text" name="company" id="company" class="form-control"  value="{{ old('company') }}">
                                    </div>
                                </div>
                                {{------------------------------------------------------------------------------------}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company">Status</label>
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="not member">Not Member</option>
                                            <option value="member">Member</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--------------------------------------------------------------------------------------------}}
                        <div class="box-footer pull-right" style="margin-top: 3%;">
                            <button type="submit" class="btn btn-primary btn-save mybtn">Save</button>
                            <a href="{{ route('admin.customers.index') }}" class="btn btn-danger btn-back mybtn">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('after-scripts')
    <script type="text/javascript">

        $('#cust_gender').select2({
            placeholder: 'select a name',
            allowClear: true
        });

    </script>
@endsection