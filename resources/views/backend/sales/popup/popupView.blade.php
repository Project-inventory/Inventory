<!-- Modal -->
<div class="modal fade" id="view{{$order->order_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Sale Details</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="box-left col-md-3">
                        <p>Product id :</p>
                        <p>Product name :</p>
                        <p>Customer name :</p>
                        <p>Sale Quantity :</p>
                        <p>Tax :</p>
                        <p>Subtotal :</p>
                        <p>Amount :</p>
                        <p>Discount :</p>
                        <p>Paid :</p>
                        <p>Change :</p>
                        <p>Date :</p>
                        <p>Cashier :</p>
                    </div>
                    <div class="box-right col-md-9">
                        <p>{{ $order->pro_id }}</p>
                        <p>{{ $order->pro_name }}</p>
                        <p>{{ is_null($order->cust_name)? 'N/A':$order->cust_name }}</p>
                        <p>{{ $order->order_quantity}}</p>
                        <p>$ {{ number_format($order->order_tax, 2) }}</p>
                        <p>$ {{ number_format($order->order_subtotal, 2) }}</p>
                        <p>$ {{ number_format($order->order_amount,2) }}</p>
                        <p>{{ $order->discount }}%</p>
                        <p>$ {{ number_format($order->paid, 2) }}</p>
                        <p>$ {{ number_format($order->change, 2) }}</p>
                        <p>{{ $order->order_date }}</p>
                        <p>{{ $order->user_name }}</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>