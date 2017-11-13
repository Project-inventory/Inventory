<!-- Modal -->
<div class="modal fade" id="view{{$order->order_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Sale Details</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-responsive">
                    <tr>
                        <td><b>Product id :</b></td>
                        <td>{{ $order->pro_id }}</td>
                    </tr>
                    <tr>
                        <td><b>Product name :</b></td>
                        <td>{{ $order->pro_name }}</td>
                    </tr>
                    <tr>
                        <td><b>Customer name :</b></td>
                        <td>{{ is_null($order->cust_name)? 'N/A':$order->cust_name }}</td>
                    </tr>
                    <tr>
                        <td><b>Sale Quantity :</b></td>
                        <td>{{ $order->order_quantity}}</td>
                    </tr>
                    <tr>
                        <td><b>Tax :</b></td>
                        <td>$ {{ number_format($order->order_tax, 2) }}</td>
                    </tr>
                    <tr>
                        <td><b>Subtotal :</b></td>
                        <td>$ {{ number_format($order->order_subtotal, 2) }}</td>
                    </tr>
                    <tr>
                        <td><b>Amount :</b></td>
                        <td>$ {{ number_format($order->order_amount,2) }}</td>
                    </tr>
                    <tr>
                        <td><b>Discount :</b></td>
                        <td>{{ $order->discount }}%</td>
                    </tr>
                    <tr>
                        <td><b>Paid :</b></td>
                        <td>$ {{ number_format($order->paid, 2) }}</td>
                    </tr>
                    <tr>
                        <td><b>Change :</b></td>
                        <td>$ {{ number_format($order->change, 2) }}</td>
                    </tr>
                    <tr>
                        <td><b>Date :</b></td>
                        <td>{{ $order->order_date }}</td>
                    </tr>
                    <tr>
                        <td><b>Cashier :</b></td>
                        <td>{{ $order->user_name }}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>