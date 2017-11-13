<!-- Modal -->
<div class="modal fade" id="view{{$customer->cust_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Customer Details</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-responsive">
                    <tr>
                        <td style="width: 30%"><b>Name :</b></td>
                        <td>{{ $customer->cust_name }}</td>
                    </tr>
                    <tr>
                        <td><b>Gender :</b></td>
                        <td>{{$customer->cust_gender}}</td>
                    </tr>
                    <tr>
                        <td><b>Tel :</b></td>
                        <td>{{ $customer->cust_tel }}</td>
                    </tr>
                    <tr>
                        <td><b>City :</b></td>
                        <td>{{ is_null($customer->city)? 'N/A':$customer->city }}</td>
                    </tr>
                    <tr>
                        <td><b>Company :</b></td>
                        <td>{{ is_null($customer->company)? 'N/A':$customer->company }}</td>
                    </tr>
                    <tr>
                        <td><b>Creates Date :</b></td>
                        <td>{{ $customer->registerDate }}</td>
                    </tr>
                    <tr>
                        <td><b>Status :</b></td>
                        <td>{{ $customer->status }}</td>
                    </tr>
                    <tr>
                        <td><b>Address :</b></td>
                        <td><address>{{ is_null($customer->cust_address)? 'N/A':$customer->cust_address }}</address></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>