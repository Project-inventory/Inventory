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
                    <h3 class="box-title"><b></i>Add New Customer</b></h3>
                </div>

                <div class="box-body" style="padding-bottom: 4px">
                    <form action="{{ URL::to('customer/store') }}" method="GET" id="form-create-supplier" enctype="multipart/form-data">
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
                                        <fieldset>
                                            <legend>Gender</legend>
                                            <table class="tbl-gender">
                                                <tr class="tr-gender">
                                                    <td class="td-gender">
                                                        <label for="male">
                                                            <input type="radio" id="sex" name="sex" value="male" required>
                                                            Male
                                                        </label>
                                                    </td>
                                                    <td class="td-gender">
                                                        <label for="female">
                                                            <input type="radio" id="sex" name="sex" value="female" required>
                                                            Female
                                                        </label>
                                                    </td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                    </div>
                                </div>
                                {{------------------------------------------------------------------------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" id="cust_address" name="cust_address" class="form-control" value="{{ old("cust_address") }}" >
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="company">Comapny</label>
                                        <input type="text" name="company" id="company" class="form-control"  value="{{ old('company') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--------------------------------------------------------------------------------------------}}
                        <div class="box-footer pull-right" style="margin-top: 3%;">
                            <button type="submit" class="btn btn-primary btn-save mybtn">Save</button>
                            <button type="button" class="btn btn-warning btn-reset mybtn" onclick="this.form.reset()">Reset</button>
                            <a href="{{ URL::to('customer/list.html') }}" class="btn btn-danger btn-back mybtn">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection