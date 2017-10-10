@extends('backend.layouts.app')
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
                <h3 class="box-title"><b></i>Add New Product</b></h3>
            </div>

            <div class="box-body" style="padding-bottom: 4px">
                <form action="{{ URL::to('product/store') }}" method="POST" id="form-create-product" enctype="multipart/form-data" files="true">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Product's Photo</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="photo" style="height: 220px">
                                            <img id="blah" src="#"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="btn-browse">
                                            <div>
                                                <label class="pull-left" style="margin-top: 5%">Select Image</label>
                                                <label class="pull-right">
                                                    <i class="fa fa-picture-o fa-3x" aria-hidden="true">
                                                        <input type='file'
                                                               name="pro_photo"
                                                               onchange="readURL(this);"
                                                               style="display: none"
                                                               accept="image/*"/>
                                                    </i>
                                                </label>

                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{--------------------------------------------------------------------------------------------}}
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            {{------------------------------------------------------------------------------------}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="productName">Product Name</label>
                                    <input type="text"  name="pro_name" id="pro_name" class="form-control" required>
                                </div>
                            </div>
                            {{------------------------------------------------------------------------------------}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="productUnit">Product Unit</label>
                                    <input type="text" name="pro_unit" id="pro_unit" class="form-control">
                                </div>
                            </div>
                            {{------------------------------------------------------------------------------------}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" id="quan" name="pro_quantity" class="form-control" required>
                                </div>
                            </div>
                            {{------------------------------------------------------------------------------------}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" name="pro_price" id="pro_price" class="form-control" required>
                                </div>
                            </div>
                            {{------------------------------------------------------------------------------------}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="barcode">Barcode</label>
                                    <input type="text" name="pro_barcode" id="pro_barcode" class="form-control">
                                </div>
                            </div>
                            {{------------------------------------------------------------------------------------}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="expiryDate">Expiry</label>
                                    <input type="date" name="pro_expiry" id="pro_expiry" class="form-control">
                                </div>
                            </div>
                            {{------------------------------------------------------------------------------------}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tax">Tax</label>
                                    <input type="number" name="pro_tax" id="pro_tax" class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label for="group">Group</label>
                                <div class="input-group">
                                    <select name="gp_id" id="gp_id" class="form-control">
                                        <option value=" ">-------------------------------------------------</option>
                                        @foreach($groups as $group=>$value)
                                            <option value="{{ $value->gp_id}}">{{ $value->gp_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label for="cattegory">Category</label>
                                <div class="input-group">
                                    <select name="cat_id" id="cat_id" class="form-control">
                                        <option value=" ">-------------------------------------------------</option>
                                        @foreach($categories as $category=>$value)
                                            <option value="{{ $value->cat_id}}">{{ $value->cat_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label for="brand">Brand</label>
                                <div class="input-group">
                                    <select name="brand_id" id="brand_id" class="form-control">
                                        <option value=" ">-------------------------------------------------</option>
                                        @foreach($brands as $brand=>$value)
                                            <option value="{{ $value->brands_id}}">{{ $value->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                        {{--------------------------------------------------------------------------------------------}}
                    <div class="box-footer pull-right" style="margin-top: 3%">
                        <button type="submit" class="btn btn-primary btn-save mybtn">Save</button>
                        <button type="button" class="btn btn-warning btn-reset mybtn" onclick="this.form.reset()">Reset</button>
                        <a href="{{ URL::to('product/list.html') }}" class="btn btn-danger btn-back mybtn">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                        .attr('src', e.target.result)
                        .width(228)
                        .height(203);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
