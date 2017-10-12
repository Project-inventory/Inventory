@extends('backend.layouts.app')
@section('content')
    <div class="box box-success col-md-4">
        <div class="box-header with-border">
            <h3 class="box-title">Product's List</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ URL::to('product/create.html') }}" class="btn btn-info pull-left">Add New Customer</a>
                </div>
                <div class="input-group pull-right col-md-8">
                    <form method="get" action="{{ URL::to('product/search') }}" role="search" accept-charset="UTF-8">
                        <div class="form-group col-md-6">
                            <div class="input-group col-sm-12 col-xs-12">
                                <input type="text" name="productSearch" id="productSearch" class="form-control" placeholder="Search product name, quantity....">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default" id="btnSearch"><i><span class="glyphicon glyphicon-search"></span></i></button>
                                </div><!-- /itnput-group-btn -->
                            </div>	<!-- /input-group -->
                        </div><!-- /form-group -->
                    </form>

                    <form method="get" action="{{ URL::to('product/search') }}" role="search" accept-charset="UTF-8">
                        <div class="form-group col-md-6">
                            <div class="input-group col-sm-12 col-xs-12">
                                <input type="date"  name="productSearch" id="productSearch" class="form-control" placeholder="Search product date....">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default" id="btnSearch"><i><span class="glyphicon glyphicon-search"></span></i></button>
                                </div><!-- /itnput-group-btn -->
                            </div>	<!-- /input-group -->
                        </div><!-- /form-group -->
                    </form>

                </div>
            </div>
            <br>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Barcode</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($products as $key=>$product)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $product->pro_name }}</td>
                            <td>{{ $product->pro_quantity }}</td>
                            <td>{{ $product->pro_barcode }}</td>
                            <td>
                                <a href="{{URL::to('product').'/show/'.$product->pro_id}}" class="btn btn-primary">View</a>
                                <a href="{{URL::to('product').'/edit/'.$product->pro_id}}" class="btn btn-success">Edit</a>
                                <a href="{{URL::to('product').'/delete/'.$product->pro_id}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div id="paginate">
                {!! $products->appends(['productSearch' => Request::get('productSearch')])->links() !!}
            </div>
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection