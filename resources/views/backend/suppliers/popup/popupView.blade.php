<!-- Modal -->
<div class="modal fade" id="view{{$supplier->ven_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Supplier Details</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="box-left col-md-3">
                        <p>Name :</p>
                        <p>Company name :</p>
                        <p>Tel :</p>
                        <p>Website :</p>
                        <p>Creates Date :</p>
                        <p>Address :</p>
                    </div>
                    <div class="box-right col-md-9">
                        <p>{{ $supplier->ven_name }}</p>
                        <p>{{ is_null($supplier->ven_company)? 'N/A':$supplier->ven_company }}</p>
                        <p>{{$supplier->ven_tel}}</p>
                        <p>{{ is_null($supplier->ven_website)? 'N/A':$supplier->ven_website }}</p>
                        <p>{{$supplier->insert_date}}</p>
                        <address>{{ is_null($supplier->ven_address)? 'N/A':$supplier->ven_address }}</address>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <p>Status :</p>
                    </div>
                    <div class="col-md-9">
                        <p>{{ is_null($supplier->ven_status)? 'N/A':$supplier->ven_status }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <p>Description :</p>
                    </div>
                    <div class="col-md-9">
                        <p>{{ is_null($supplier->ven_description)? 'N/a':$supplier->ven_description }}</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>