@extends('backend.layouts.app')
@section('content')
    <style type="text/css">
        .box {
            background: #d2d6de;
        }
        .div-left , .div-right {
            background: white;
            padding: 1%;
            margin: 2%;
        }
        .box-div {
            margin-bottom: 20px;
        }
        .box-payment {
            margin:5% auto;
        }
    </style>
    <div class="box box-success col-md-4">
        <div class="box-header with-border">
            <h3 class="box-title">Order's List</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-5 div-left">
                    <div>
                        <div class="box-header with-border box-div">
                            <h3 class="box-title">Search Product</h3>
                        </div><!-- /.box-header -->
                        {{--========================================================================================--}}
                        {{--Original--}}
                        <form method="get" action="{{ URL::to('order/search') }}" role="search" accept-charset="UTF-8">
                            <div class="form-group col-md-12">
                                <div class="input-group col-sm-12 col-xs-12">
                                    <input type="text" name="orderSearch" id="orderSearch" class="form-control" placeholder="Search product date....">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default" id="btnSearch"><i><span class="glyphicon glyphicon-search"></span></i></button>
                                    </div><!-- /itnput-group-btn -->
                                </div>	<!-- /input-group -->
                            </div><!-- /form-group -->
                        </form>
                        {{--========================================================================================--}}
                        {{--test--}}
                        {{--<form method="get" action=""  accept-charset="UTF-8">--}}
                            {{--<div class="form-group col-md-12">--}}
                                {{--<div class="input-group col-sm-12 col-xs-12">--}}
                                    {{--<input type="text" name="search" value="{{isset($_GET)}}" id="orderSearch" class="form-control" placeholder="Search product date....">--}}
                                    {{--<input type="hidden" name="page">--}}
                                {{--</div>	<!-- /input-group -->--}}
                            {{--</div><!-- /form-group -->--}}
                        {{--</form>--}}
                        {{--========================================================================================--}}
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price ($)</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $key=>$product)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $product->pro_name }}</td>
                                    <td>{{ $product->pro_quantity }}</td>
                                    <td>${{ number_format($product->pro_price,2) }}</td>
                                    <td>
                                        <a href="{{ route('order.edit', $product->pro_id) }}" class="btn btn-primary">Add</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div id="paginate">
                            {!! $products->appends(['orderSearch' => Request::get('orderSearch')])->links() !!}
                        </div>
                    </div>
                    {{--============================================================================================--}}
                    <div class="box-payment">
                        <div class="box-header with-border box-div">
                            <h3 class="box-title">Payment</h3>
                        </div><!-- /.box-header -->
                        <table class="table table-striped table-responsive">
                            <thead>
                                <th></th>
                                <th style="width:200px "></th>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Items:</td>
                                <td>{{Cart::count()}} Items</td>
                            </tr>
                            <tr>
                                <td>Tax:</td>
                                <td>$ {{Cart::tax()}}</td>
                            </tr>
                            <tr>
                                <td>Sub Total:</td>
                                <td>$ {{Cart::subtotal()}}</td>
                            </tr>
                            <tr>
                                <td>Grand Total:</td>
                                <td>$ {{Cart::total()}}</td>
                            </tr>
                            <tr>
                                <td>Discount:</td>
                                <td>
                                    <input type="number"  name="discount" class="form-controll">
                                </td>
                            </tr>
                            <tr>
                                <td>Paid:</td>
                                <td>
                                    <input type="number"  name="paid" class="form-controll">
                                </td>
                            </tr>
                            <tr>
                                <td>lack:</td>
                                <td>
                                    <input type="number"  name="lack" class="form-controll">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                {{--================================================================================================--}}
                <div class="col-md-6 div-right">
                    <div class="box-header with-border box-div">
                        <h3 class="box-title">Cart List</h3>
                    </div><!-- /.box-header -->
                    <table class="table table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th style="width: 150px">Quantity</th>
                            <th style="width: 100px">Price ($)</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cartItem as $key=>$cartItem)
                            <tr >
                                <td>
                                    <p style="margin: 5% 0" data-product-id="{{ $cartItem->id }}">{{ $cartItem->name }}</p>
                                </td>
                                <td>
                                    <form action="{{ URL::to('order').'/update/'.$cartItem->rowId }}" method="PUT" class="form-inline">
                                        <button type="button" class="btn btn-info btn-sm btn_plus">+</button>
                                        <div class="form-group" style="width: 50%">
                                            <input type="text" class="form-control " name="pro_qty" id="pro_qty" value="{{  $cartItem->qty }}" min="1" max="100" style="width: 97%; padding: 6px; margin: 0 3%">
                                        </div>
                                        <button type="button" class="btn btn-info btn-sm btn_sub">-</button>
                                        <button type="submit" class="btn btn-info btn-sm" i>add</button>
                                    </form>
                                </td>
                                <td>${{ number_format($cartItem->price, 2) }}</td>
                                <td>
                                    <form class="form-inline" action="{{ route('order.destroy', $cartItem->rowId ) }}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <input type="submit" class="btn btn-danger btn-sm" value="Del">
                                    </form>


                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection


@section('after-scripts')

    <script type="text/javascript">
        $(function () {
            $(document).on('click', '.btn_sub', function (e) {
                e.preventDefault();
                var input = $(this).prev().children();
                var tmp = input.val();
                if(tmp != 0){
                    tmp --;
                }
                input.val(tmp);
            });
            $(document).on('click', '.btn_plus', function (e) {
                e.preventDefault();
                var input = $(this).next().children();
//                console.log(input);
                var tmp = input.val();
                if(tmp >= 0){
                    tmp ++;
                }
                input.val(tmp);
            })
        })
    </script>

@endsection