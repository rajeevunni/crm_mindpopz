<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Edit Reference</h4>
</div>
<form class="form-horizontal form-label-left" method="post"  id="edit_crm" name="edit_crm" action="<?php echo base_url() . 'index.php/Vendor/add_location'; ?>" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Reference Name</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <input class="form-control"  value="<?php echo $user_details['reference_name']; ?>" name="reference" id="reference" placeholder=" First Name" type="text">
                <div id="error_f_name" class="val__msgbx"></div>
            </div>
        </div>
        
    </div>
    <div class="modal-footer">
        <input type="hidden" value="<?php echo $user_details['id']; ?>" name="reference_id" id="reference_id">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="edit_reference" id="edit_reference" onclick="" class="btn btn-primary">Update</button>
    </div>
</form>
