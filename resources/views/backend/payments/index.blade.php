@extends('backend.layouts.app')

@section('page-header')
    <h1>Payment<small>The payment of prices</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('admin.sellings.index') }}">Order products</a></li>
        <li class="active">Payment</li>
    </ol>
@endsection

@section('content')
    <div class="box box-success col-md-12">
        <form action="{{ route('admin.payments.store') }}" method="POST">
            {{csrf_field()}}
            <div class="box-header with-border">
                <h3 class="box-title">Payment</h3>
                <div class="box-tool pull-right">
                    <select name="select_customer" id="select_customer">
                        <option value=""></option>
                        @foreach($customers as $key => $customer)
                        <option value="{{ $customer->cust_id }}">{{$customer->cust_name}}</option>
                        @endforeach
                    </select>
                </div><!-- /.box tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="box-payment col-md-11" style="margin: 0 4%">
                        <div>
                            <input type="hidden" value="{{ access()->user()->first_name }}" name="user_name">
                        </div>
                        <div>
                            <table  class="table table-striped table-responsive">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price ($)</th>
                                    <th style="width: 250px">Total ($)</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cartItems as $key=>$cartItem)
                                    <tr >
                                        <td>
                                            <p data-value="{{$cartItem->id}}">{{ $cartItem->name }}</p>
                                            <input type="hidden" name="item_id" value="{{$cartItem->id}}">
                                        </td>
                                        <td id="qty">{{ $cartItem->qty}}</td>
                                        <td id="price">${{ number_format($cartItem->price, 2) }}</td>
                                        <td id="total">${{number_format($cartItem->price * $cartItem->qty, 2)}}</td>
                                    </tr>
                                @endforeach
                                {{--@foreach($updateQtys as $key => $updateQty)--}}
                                    {{--<input type="hidden" value="{{$updateQty->pro_quantity }}" name="total_qty">--}}
                                {{--@endforeach--}}
                                <tr>
                                    <td>Item:</td>
                                    <td>{{Cart::count()}} Items</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3">Sub Total:</td>
                                    <td>$ {{number_format(Cart::subtotal(),2)}}</td>
                                    <input type="hidden" value="{{Cart::subtotal()}}" name="order_subtotal">
                                </tr>
                                <tr>
                                    <td colspan="3">Tax:</td>
                                    <td>$ {{number_format(Cart::tax(), 2)}}</td>
                                    <input type="hidden" name="order_tax" value="{{Cart::tax()}}">
                                </tr>
                                <tr>
                                    <td colspan="3">Grand Total:</td>
                                    <td>$ {{number_format(Cart::total(),2)}}</td>
                                    <input type="hidden" value="{{Cart::total()}}" id="amount" name="order_amount">
                                </tr>
                                <tr>
                                    <td colspan="3">Discount:</td>
                                    <td>
                                        <input type="text"  name="discount" class="form-controll" id="discount" value="" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">Amount to pay:</td>
                                    <td>
                                        <input type="text"  name="Amount_paid" class="form-controll" id="Amount_paid" value="" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">Paid:</td>
                                    <td>
                                        <input type="text"  name="paid" class="form-controll" id="paid" value="" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">Change:</td>
                                    <td>
                                        <input type="text" class="form-controll change" value="" disabled>
                                        <input type="hidden"  name="change" class="form-controll change" value="">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="pull-right">
                        <button class="btn btn-success" type="submit">Submit</button>
                        <a href="{{ route('admin.sellings.index') }}" class="btn btn-danger">Back</a>
                    </div>
                {{--================================================================================================--}}
                </div>
            </div><!-- /.box-body -->
        </form>
    </div><!--box box-success-->
@endsection
@section('after-scripts')
    <script type="text/javascript">
        //==============================================================================================================

        $(document).on('change keyup', '#discount', function () {
            var amount = parseFloat($('#amount').val());
            console.log(amount);
            var dis = 0;
            dis = ((amount * parseFloat($('#discount').val())))/100;
            var amt = amount - dis;
            $('#Amount_paid').val(parseFloat(amt).toFixed(2));
            $('.change').val(0);
            console.log(amt);
        });
        //==============================================================================================================
        $(document).on('change keyup', '#paid', function () {

            var amount = $('#Amount_paid').val();
            var pay = $('#paid').val();
            if(pay == '') { $('.change').val(0)}
            if(pay != '' && amount != '') {
                if (pay == amount){
                    $('.change').val(0);

                }else if (pay > amount || pay < amount) {
                    var change = pay - parseFloat(amount);
                    $('.change').val(parseFloat(change).toFixed(2));
                }
            }
            if( $('.change').val() < 0 ) {

                $('.change').css('color', 'red');
            }else {
                $('.change').css('color', 'black');
            }
        });
        //==============================================================================================================
        $('#select_customer').select2({
            placeholder: 'select a name',
            allowClear: true
        });
    </script>
@endsection