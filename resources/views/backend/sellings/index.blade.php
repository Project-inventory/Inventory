@extends('backend.layouts.app')

@section('title')
    Products Order
@endsection

@section('after-styles')
    <style type="text/css">
        #product-table_filter {
            float: right;
        }
        #product-table_length{
            float: left;
        }

        #ajaxSpinnerContainer {height:11px;}
        #ajaxSpinnerImage {display:none;}

    </style>
@endsection

@section('page-header')
    <h1>Product Orders<small>customer can order product here</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Order products</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 message">
            <p class="text-center">{!! session('message') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border box-div">
                    <h3 class="box-title">Search Product</h3>
                </div><!-- /.box-header -->
                {{--========================================================================================--}}
                <div class="box-body">
                    <table class="table table-striped " id="product-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price ($)</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            {{--================================================================================================--}}
        <div class="col-md-6 div-right">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Order List</h3>
                    <div class="box-tool pull-right">
                        <form action="{{ route('admin.sellings.clear') }}" method="GET" class="clear_cart_items" onsubmit="return confirmDelete()">
                            <button type="submit" class="btn btn-danger btn-sm" data-toggle="confirmation" title="Clear All Products"><i class="fa fa-times" aria-hidden="true"></i> Clear</button>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
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
                                    <form action="{{ route('admin.sellings.update')}}" method="POST" class="form-inline">
                                        {{ csrf_field() }}
                                        {{ method_field('POST') }}
                                        <input type="hidden" name="id" value="{{  $cartItem->rowId }}"/>
                                        <button type="button" class="btn btn-info btn-sm btn_sub pull-left">-</button>
                                        <div class="form-group" style="width: 50%">
                                            <input type="text" class="form-control" name="pro_qty" id="pro_qty" value="{{  $cartItem->qty }}" min="1" max="100" style="width: 97%; padding: 6px; margin: 0 12%; height: 30px">
                                        </div>
                                        <button type="button" class="btn btn-info btn-sm btn_plus pull-right">+</button>
                                        <button type="submit" class="btn btn-info btn-sm btn-block" style="margin-top: 3%">add</button>
                                    </form>
                                </td>
                                <td>${{ number_format($cartItem->price, 2) }}</td>
                                <td>
                                    <form class="form-inline" action="{{ route('admin.sellings.delete', $cartItem->rowId ) }}" method="GET">
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete"><i class="glyphicon glyphicon-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                            <tr>
                                <td>Items:</td>
                                <td colspan="3">{{Cart::count()}} Items</td>
                            </tr>
                            <tr>
                                <td colspan="2">Sub Total:</td>
                                <td colspan="2">$ {{Cart::subtotal()}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <a href="{{ route('admin.payments.index') }}" class="btn btn-primary"><i class="fa fa-money" aria-hidden="true"></i> Paid</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('after-scripts')

    <script type="text/javascript">

        $(function () {
            $('div.alert').delay(3000).slideUp(300);
        })

        function confirmDelete() {
            var result = confirm('Are you sure you want to delete?');

            if (result) {
                return true;
            } else {
                return false;
            }
        }

        $(function () {
            $(document).on('click', '.btn_plus', function (e) {
                e.preventDefault();
                var input = $(this).prev().children();
                var tmp = input.val();
                if(tmp != 0){
                    tmp ++;
                }
                input.val(tmp);
            });

            $(document).on('click', '.btn_sub', function (e) {
                e.preventDefault();
                var input = $(this).next().children();
//                console.log(input);
                var tmp = input.val();
                if(tmp >= 0){
                    tmp --;
                }
                input.val(tmp);
            })
        });

        $(function () {
            $('#product-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'http://siyen.dev:8080/Inventory/public/admin/sellings/get-products',
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                "columns": [
                    {data: 0, name: 'pro_id'},
                    {data: 1, name: 'pro_name'},
                    {data: 2, name: 'pro_quantity'},
                    {data: 3, name: 'pro_price'},
                    {data: 4, name: 'action'}
                ],
            });
        });

    </script>
@endsection