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
                    <h3 class="box-title"><b></i>Add New Supplier</b></h3>
                </div>

                <div class="box-body" style="padding-bottom: 4px">
                    <form action="{{ URL::to('supplier/store') }}" method="GET" id="form-create-supplier" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="row">
                            {{--------------------------------------------------------------------------------------------}}
                            <div class="col-lg-10 col-md-10 col-sm-10 col-md-offset-1">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="suppName">Supplier Name</label>
                                        <input type="text"  name="ven_name" id="ven_name" value="{{ old("ven_name") }}" class="form-control" required>
                                        <p class="text-danger">{{$errors->first("ven_name")}}</p>
                                    </div>
                                </div>
                                {{------------------------------------------------------------------------------------}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="suppCompany">Supplier Company</label>
                                        <input type="text" name="ven_company" id="ven_company" class="form-control">
                                    </div>
                                </div>
                                {{------------------------------------------------------------------------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" id="ven_address" name="ven_address" class="form-control" >
                                    </div>
                                </div>
                                {{------------------------------------------------------------------------------------}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="SuppTel">Telephone</label>
                                        <input type="number" name="ven_tel" id="ven_tel" class="form-control" required>
                                    </div>
                                </div>
                                {{------------------------------------------------------------------------------------}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="suppWeb">Website</label>
                                        <input type="text" name="ven_website" id="ven_website" class="form-control">
                                    </div>
                                </div>
                                {{------------------------------------------------------------------------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="SuppStatus">Status</label>
                                        <textarea name="ven_status" id="ven_status" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                                {{------------------------------------------------------------------------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="SuppDes">Description</label>
                                        <textarea name="ven_description" id="ven_description" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--------------------------------------------------------------------------------------------}}
                        <div class="box-footer pull-right" style="margin-top: 3%">
                            <button type="submit" class="btn btn-primary btn-save mybtn">Save</button>
                            <button type="button" class="btn btn-warning btn-reset mybtn" onclick="this.form.reset()">Reset</button>
                            <a href="{{ URL::to('supplier/list.html') }}" class="btn btn-danger btn-back mybtn">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection