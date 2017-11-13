<!-- Modal -->
<div class="modal fade" id="view{{$supplier->ven_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Supplier Details</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-responsive">
                    <tr>
                        <td style="width: 25%"><b>Name :</b></td>
                        <td>{{ $supplier->ven_name }}</td>
                    </tr>
                    <tr>
                        <td><b>Company name :</b></td>
                        <td>{{ is_null($supplier->ven_company)? 'N/A':$supplier->ven_company }}</td>
                    </tr>
                    <tr>
                        <td><b>Tel :</b></td>
                        <td>{{$supplier->ven_tel}}</td>
                    </tr>
                    <tr>
                        <td><b>Website :</b></td>
                        <td>{{ is_null($supplier->ven_website)? 'N/A':$supplier->ven_website }}</td>
                    </tr>
                    <tr>
                        <td><b>Created Date :</b></td>
                        <td>{{$supplier->insert_date}}</td>
                    </tr>
                    <tr>
                        <td><b>Address :</b></td>
                        <td>{{ is_null($supplier->ven_address)? 'N/A':$supplier->ven_address }}</td>
                    </tr>
                    <tr>
                        <td><b>Status :</b></td>
                        <td>{{ is_null($supplier->ven_status)? 'N/A':$supplier->ven_status }}</td>
                    </tr>
                    <tr>
                        <td><b>Description :</b></td>
                        <td>{{ is_null($supplier->ven_description)? 'N/a':$supplier->ven_description }}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>