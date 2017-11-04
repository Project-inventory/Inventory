<!-- Modal -->
<div class="modal fade" id="gp_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Group</h4>
            </div>
            <form action="{{ route('admin.groups.store') }}" method="POST" id="form-create-gp">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="group">Group</label>
                                <input type="text" class="form-control" name="groups" id="groups" placeholder="Group...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>