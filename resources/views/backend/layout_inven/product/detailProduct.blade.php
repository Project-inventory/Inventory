@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info col-md-4">
                <div class="box-header with-border">
                    <h3 class="box-title">View Product</h3>
                    <div class="box-tools pull-right">
                    </div><!-- /.box tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    Name : {{ $product->pro_name }}<br>
                    Product unit : {{$product->pro_unit}}<br>
                    Quantity : {{$product->pro_quantity}}<br>
                    Storage Date: {{$product->pro_date_storage}}<br>
                    Price : {{$product->pro_price}}<br>
                    Barcode : {{$product->pro_barcode}}<br>
                    Expiry : {{$product->pro_expiry}}<br>
                    Tax : {{$product->pro_tax}}<br>
                    Group : {{is_null($product->group)?'N/A': $product->group->gp_name}}<br>
                    Category : {{is_null($product->category)?'N/A': $product->category->cat_name}}<br>
                    Brand : {{is_null($product->brand)?'N/A': $product->brand->brand_name}}
                    <img src="product_img/{{$product->pro_photo}}" alt="qwerty">
                    {{--{{$product->pro_photo}}--}}
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ URL::to('product/list.html') }}" class="btn btn-danger btn-back mybtn pull-right">Back</a>
                </div>
            </div><!--box box-success-->
        </div>
    </div>
@endsection