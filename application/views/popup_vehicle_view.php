<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Edit Location</h4>
</div>
<form class="form-horizontal form-label-left" method="post"  id="edit_vehicle" name="edit_vehicle" action="<?php echo base_url() . 'index.php/Vendor/add_location'; ?>" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Vechile Type</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <input class="form-control"  value="<?php echo $user_details['vehicle_type']; ?>" name="vehicle_type" id="vehicle_type" placeholder=" Enter Location" type="text">
                <div id="error_edf_name" class="val__msgbx"></div>
            </div>
        </div>
        
    </div>
    <div class="modal-footer">
    <input type="hidden" value="<?php echo $user_details['id']; ?>" name="vehicle_id" id="vehicle_id">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="edit_vehicle" id="edit_vehicle" onclick="" class="btn btn-primary">Update</button>
    </div>
</form>
