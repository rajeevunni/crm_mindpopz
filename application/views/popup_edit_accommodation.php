<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Edit Record</h4>
</div>
<form class="form-horizontal form-label-left" method="post"  id="edit_crm" name="edit_crm" action="<?php echo base_url() . 'index.php/Vendor/edit_vendor_details'; ?>" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Start Date</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <input class="form-control" readonly value="<?php echo date('d-M-Y', strtotime($accom_details['start_date'])); ?>" name="start_date" id="start_date" placeholder="Enter Start Date" type="text">
                <!-- <div id="error_edf_name" class="val__msgbx"></div> -->
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">End Date</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <input class="form-control" value="<?php echo date('d-M-Y', strtotime($accom_details['end_date'])); ?>" name="end_date" id="end_date" placeholder="Enter End Date" type="text">
                <!-- <div id="error_edl_name" class="val__msgbx"></div> -->
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Room Type</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="room_type" id="room_type">
                    <option value="">Select Room Type</option>
                    <option value="Executive" <?php if($accom_details['room_type'] == 'Executive'){echo "selected";}?>>Executive</option>
                    <option value="Standaard" <?php if($accom_details['room_type'] == 'Standaard'){echo "selected";}?>>Standaard</option>
                    <option value="Honeymoon Suite" <?php if($accom_details['room_type'] == 'Honeymoon Suite'){echo "selected";}?>>Honeymoon Suite</option>
                </select>
                <!-- <input class="form-control" readonly value="<?php echo $accom_details['room_type']; ?>" name="room_type" id="room_type" placeholder="Enter Room Type" type="text"> -->
                <!-- <div id="error_ed_email" class="val__msgbx"></div> -->
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Occupants</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <input class="form-control" readonly  value="<?php echo $accom_details['occupents']; ?>" name="occupents" id="occupents" placeholder="Enter Occupants" type="text">
                <!-- <div id="error_edcontact_no1" class="val__msgbx"></div> -->
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Food Plan</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="food_plan" id="food_plan">
                    <option value="">Select Food Plan</option>
                    <option value="AP" <?php if($accom_details['food_plan'] == 'AP'){echo "selected";}?>>AP</option>
                    <option value="EP" <?php if($accom_details['food_plan'] == 'EP'){echo "selected";}?>>EP</option>
                    <option value="CP" <?php if($accom_details['food_plan'] == 'CP'){echo "selected";}?>>CP</option>
                    <option value="MAP" <?php if($accom_details['food_plan'] == 'MAP'){echo "selected";}?>>MAP</option>
                </select>
                <!-- <input class="form-control"  value="<?php echo $accom_details['food_plan']; ?>"  name="food_plan" id="food_plan" placeholder="Enetr Food Plan" type="text"> -->
                <!-- <div id="error_edcontact_no2 " class="val__msgbx"></div> -->
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Rack Rate</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <input class="form-control"  value="<?php echo $accom_details['rack_rate']; ?>"  name="rack_rate" id="rack_rate" placeholder="Enter Rack Rate" type="text">
                <!-- <div id="error_edcontact_no2 " class="val__msgbx"></div> -->
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Special Rate</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <input class="form-control"  value="<?php echo $accom_details['special_rate']; ?>"  name="special_rate" id="special_rate" placeholder="Enter Special Rate" type="text">
                <!-- <div id="error_edcontact_no2 " class="val__msgbx"></div> -->
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Extra Bed</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <input class="form-control"  value="<?php echo $accom_details['extra_bed']; ?>"  name="extra_bed" id="extra_bed" placeholder="Enter Extra Bed" type="text">
                <!-- <div id="error_edcontact_no2 " class="val__msgbx"></div> -->
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Extra Child</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <input class="form-control"  value="<?php echo $accom_details['extra_child']; ?>"  name="extra_child" id="extra_child" placeholder="Enter Extra Child" type="text">
                <!-- <div id="error_edcontact_no2 " class="val__msgbx"></div> -->
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Currency</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="currency" id="currency">
                    <option value="">Select Currency</option>
                    <option value="INR" <?php if($accom_details['currency'] == 'INR'){echo "selected";}?>>INR</option>
                </select>
                <!-- <input class="form-control"  value="<?php echo $accom_details['currency']; ?>"  name="currency" id="currency" placeholder="Enter Currency" type="text"> -->
                <!-- <div id="error_edcontact_no2 " class="val__msgbx"></div> -->
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">AC Status</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="ac" id="ac">
                    <option value="">Select A/C Status</option>
                    <option value="Yes" <?php if($accom_details['ac'] == 'Yes'){echo "selected";}?>>Yes</option>
                    <option value="No" <?php if($accom_details['ac'] == 'No'){echo "selected";}?>>No</option>
                </select>
                <!-- <input class="form-control"  value="<?php echo $accom_details['ac']; ?>"  name="ac" id="ac" placeholder="Enter AC Status" type="text"> -->
                <!-- <div id="error_edcontact_no2 " class="val__msgbx"></div> -->
            </div>
        </div>
        <!-- <input type="hidden" id="accommodation_id" value="<?php echo $accom_details['id']; ?>">
        Delete this accommodation - <a href="#"> <span  class="glyphicon glyphicon-trash action_icon delete_accommodation1"></span></a> -->
    </div>
    <div class="modal-footer">
        <input type="hidden" value="<?php echo $accom_details['id']; ?>" name="vendor_id" id="vendor_id">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="edit_accommodation" id="edit_accommodation" onclick="" class="btn btn-primary">Update</button>
    </div>
</form>
