<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Edit CRM</h4>
</div>
<form class="form-horizontal form-label-left" method="post"  id="edit_crm" name="edit_crm" action="<?php echo base_url() . 'index.php/Vendor/add_crm'; ?>" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"> First Name</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <input class="form-control"  value="<?php echo $user_details['f_name']; ?>" name="f_name" id="f_name" placeholder=" First Name" type="text">
                <div id="error_edf_name" class="val__msgbx"></div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Last Name</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <input class="form-control" value="<?php echo $user_details['l_name']; ?>" name="l_name" id="l_name" placeholder="Last Name" type="text">
                <div id="error_edl_name" class="val__msgbx"></div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <input class="form-control" readonly value="<?php echo $user_details['email']; ?>" name="email" id="email" placeholder="Email" type="text">
                <div id="error_ed_email" class="val__msgbx"></div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Primary Contact Number</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <input class="form-control"  value="<?php echo $user_details['primary_contact_no']; ?>" name="contact_no1" id="contact_no1" placeholder="Primary Contact Number" type="text">
                <div id="error_edcontact_no1" class="val__msgbx"></div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Secondary Contact Number</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <input class="form-control"  value="<?php echo $user_details['secondary_contact_no']; ?>"  name="contact_no2" id="contact_no2" placeholder="Secondary Contact Number" type="text">
                <div id="error_edcontact_no2 " class="val__msgbx"></div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="estatus" id="estatus">
                    <option value="0" <?php echo $disableselect; ?> >Disable</option>
                    <option value="1" <?php echo $enableselect; ?>>Enable</option>													
                </select>	
            </div>
        </div>
        <div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12">Created Date</label>
			<div class="col-md-9 col-sm-9 col-xs-12">
			<input class="form-control" disabled="disabled" value="<?php echo $createddatetime; ?>" type="text">
			</div>
		</div>
    </div>
    <div class="modal-footer">
        <input type="hidden" value="<?php echo $user_details['emp_id']; ?>" name="user_id" id="user_id">
        <input type="hidden" value="<?php echo $user_details['id']; ?>" name="employee_id" id="employee_id">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="edit_crm" id="edit_crm" onclick="" class="btn btn-primary">Update</button>
    </div>
</form>
