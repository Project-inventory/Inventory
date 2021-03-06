@extends('backend.layouts.app')

@section('title')
    Suppliers/Edit
@endsection

@section('page-header')
    <h1>Supplier<small>Edit the supplier record</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('admin.suppliers.index') }}">Suppliers</a></li>
        <li class="active">Edit</li>
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
                    <h3 class="box-title"><b></i>Edit Supplier</b></h3>
                </div>

                <div class="box-body" style="padding-bottom: 4px">
                    <form action="{{ route('admin.suppliers.update') }}" method="POST" id="form-create-supplier" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="row">
                            {{--------------------------------------------------------------------------------------------}}
                            <div class="col-lg-10 col-md-10 col-sm-10 col-md-offset-1">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="suppName">Supplier Name</label>
                                        <input type="hidden" name="ven_id" id="ven_id" value="{{ $supplier->ven_id }}">
                                        <input type="text"  name="ven_name" id="ven_name" value="{{ $supplier->ven_name }}" class="form-control">
                                        <p class="text-danger">{{$errors->first("ven_name")}}</p>
                                    </div>
                                </div>
                                {{------------------------------------------------------------------------------------}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="suppCompany">Supplier Company</label>
                                        <input type="text" name="ven_company" id="ven_company" class="form-control" value="{{ is_null($supplier->ven_company)?'N/A':$supplier->ven_company }}">
                                    </div>
                                </div>
                                {{------------------------------------------------------------------------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" id="ven_address" name="ven_address" class="form-control" value="{{ is_null($supplier->ven_address)?'N/A':$supplier->ven_address}}">
                                    </div>
                                </div>
                                {{------------------------------------------------------------------------------------}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="SuppTel">Telephone</label>
                                        <input type="number" name="ven_tel" id="ven_tel" class="form-control" value="{{$supplier->ven_tel}}">
                                    </div>
                                </div>
                                {{------------------------------------------------------------------------------------}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="suppWeb">Website</label>
                                        <input type="text" name="ven_website" id="ven_website" class="form-control" value="{{ is_null($supplier->ven_website)?'N/A':$supplier->ven_website }}">
                                    </div>
                                </div>
                                {{------------------------------------------------------------------------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="SuppStatus">Status</label>
                                        <textarea name="ven_status" id="ven_status" cols="30" rows="5" class="form-control">{{ is_null($supplier->ven_status)?'N/A':$supplier->ven_status }}</textarea>
                                    </div>
                                </div>
                                {{------------------------------------------------------------------------------------}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="SuppDes">Description</label>
                                        <textarea name="ven_description" id="ven_description" cols="30" rows="5" class="form-control">{{ is_null($supplier->ven_description)?'N/A':$supplier->ven_description }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--------------------------------------------------------------------------------------------}}
                        <div class="box-footer pull-right" style="margin-top: 3%">
                            <button type="submit" class="btn btn-primary btn-save mybtn"><i class="fa fa-upload" aria-hidden="true"></i> Update</button>
                            <a href="{{ route('admin.suppliers.index') }}" class="btn btn-danger btn-back mybtn"><i class="fa fa-reply" aria-hidden="true"></i> Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection