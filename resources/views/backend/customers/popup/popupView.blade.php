<!-- Modal -->
<div class="modal fade" id="view{{$customer->cust_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Customer Details</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="box-left col-md-3">
                        <p>Name :</p>
                        <p>Gender :</p>
                        <p>Tel :</p>
                        <p>City :</p>
                        <p>Company :</p>
                        <p>Creates Date :</p>
                        <p>Address :</p>
                    </div>
                    <div class="box-right col-md-9">
                        <p>{{ $customer->cust_name }}</p>
                        <p>{{$customer->cust_gender}}</p>
                        <p>{{ $customer->cust_tel }}</p>
                        <p>{{ $customer->city }}</p>
                        <p>{{ $customer->company }}</p>
                        <p>{{ $customer->registerDate }}</p>
                        <address>{{ $customer->cust_address }}</address>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>