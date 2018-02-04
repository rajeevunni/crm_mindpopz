<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Edit Guest Plan</h4>
</div>
<?php //print_r($getall_guest_enquiry);?>
<form class="form-horizontal form-label-left" method="post" id="bulkupadd_enquiriesload_emp" name="add_enquiries"
action="<?php echo base_url() . 'index.php/Guest/edit_guest_enquiries' ?>" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Date </label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <input class="form-control" value="<?php echo date('m-d-Y', strtotime($getall_guest_enquiry['call_back_date'])); ?>" type="text" name="call_back_date" id="call_back_date" >
                <div id="" class="val__msgbx"></div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Location </label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="location" id="location">
                <?php
                foreach($getall_location as $location)
                {
                    $selected = $location['location'] == $getall_guest_enquiry['location']?'selected':'';
                ?>
                    <option value="<?php echo $location['location'] ;?>" <?php echo $selected; ?>><?php echo $location['location']; ?></option>
                <?php 
                } ?> 
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Vendor Type </label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="vendor_type" id="vendor_type">
                <?php
                foreach($getall_vendor_type as $type)
                {
                    $selected = $type['type_name'] == $getall_guest_enquiry['vendor_type']?'selected':'';
                ?>
                    <option value="<?php echo $type['type_name'] ;?>" <?php echo $selected; ?>><?php echo $type['type_name']; ?></option>
                <?php 
                } ?> 
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Hotel Name </label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" class="form-control" value="<?php echo $getall_guest_enquiry['hotel_name']; ?>" name="hotel_name" id="hotel_name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"> No. of Rooms </label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="no_of_rooms" id="no_of_rooms">
                    <option value="0" <?php if($getall_guest_enquiry['no_of_rooms'] == 0){echo "selected";}?> >0</option>
                    <option value="1" <?php if($getall_guest_enquiry['no_of_rooms'] == 1){echo "selected";}?> >1</option>
                    <option value="2" <?php if($getall_guest_enquiry['no_of_rooms'] == 2){echo "selected";}?> >2</option>
                    <option value="3" <?php if($getall_guest_enquiry['no_of_rooms'] == 3){echo "selected";}?> >3</option>
                    <option value="4" <?php if($getall_guest_enquiry['no_of_rooms'] == 4){echo "selected";}?> >4</option>
                    <option value="5" <?php if($getall_guest_enquiry['no_of_rooms'] == 5){echo "selected";}?> >5</option>
                    <option value="6" <?php if($getall_guest_enquiry['no_of_rooms'] == 6){echo "selected";}?> >6</option>
                    <option value="7" <?php if($getall_guest_enquiry['no_of_rooms'] == 7){echo "selected";}?> >7</option>
                    <option value="8" <?php if($getall_guest_enquiry['no_of_rooms'] == 8){echo "selected";}?> >8</option>
                    <option value="9" <?php if($getall_guest_enquiry['no_of_rooms'] == 9){echo "selected";}?> >9</option>
                    <option value="10" <?php if($getall_guest_enquiry['no_of_rooms'] == 10){echo "selected";}?> >10</option>
                    <option value="11" <?php if($getall_guest_enquiry['no_of_rooms'] == 11){echo "selected";}?> >11</option>
                    <option value="12" <?php if($getall_guest_enquiry['no_of_rooms'] == 12){echo "selected";}?> >12</option>
                    <option value="13" <?php if($getall_guest_enquiry['no_of_rooms'] == 13){echo "selected";}?> >13</option>
                    <option value="14" <?php if($getall_guest_enquiry['no_of_rooms'] == 14){echo "selected";}?> >14</option>
                    <option value="15" <?php if($getall_guest_enquiry['no_of_rooms'] == 15){echo "selected";}?> >15</option>
                    <option value="16" <?php if($getall_guest_enquiry['no_of_rooms'] == 16){echo "selected";}?> >16</option>
                    <option value="17" <?php if($getall_guest_enquiry['no_of_rooms'] == 17){echo "selected";}?> >17</option>
                    <option value="18" <?php if($getall_guest_enquiry['no_of_rooms'] == 18){echo "selected";}?> >18</option>
                    <option value="19" <?php if($getall_guest_enquiry['no_of_rooms'] == 19){echo "selected";}?> >19</option>
                    <option value="20" <?php if($getall_guest_enquiry['no_of_rooms'] == 20){echo "selected";}?> >20</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Extra Beds </label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="extra_bed" id="extra_bed">
                    <option value="0" <?php if($getall_guest_enquiry['extra_bed'] == 0){echo "selected";}?> >0</option>
                    <option value="1" <?php if($getall_guest_enquiry['extra_bed'] == 1){echo "selected";}?> >1</option>
                    <option value="2" <?php if($getall_guest_enquiry['extra_bed'] == 2){echo "selected";}?> >2</option>
                    <option value="3" <?php if($getall_guest_enquiry['extra_bed'] == 3){echo "selected";}?> >3</option>
                    <option value="4" <?php if($getall_guest_enquiry['extra_bed'] == 4){echo "selected";}?> >4</option>
                    <option value="5" <?php if($getall_guest_enquiry['extra_bed'] == 5){echo "selected";}?> >5</option>
                    <option value="6" <?php if($getall_guest_enquiry['extra_bed'] == 6){echo "selected";}?> >6</option>
                    <option value="7" <?php if($getall_guest_enquiry['extra_bed'] == 7){echo "selected";}?> >7</option>
                    <option value="8" <?php if($getall_guest_enquiry['extra_bed'] == 8){echo "selected";}?> >8</option>
                    <option value="9" <?php if($getall_guest_enquiry['extra_bed'] == 9){echo "selected";}?> >9</option>
                    <option value="10" <?php if($getall_guest_enquiry['extra_bed'] == 10){echo "selected";}?> >10</option>
                    <option value="11" <?php if($getall_guest_enquiry['extra_bed'] == 11){echo "selected";}?> >11</option>
                    <option value="12" <?php if($getall_guest_enquiry['extra_bed'] == 12){echo "selected";}?> >12</option>
                    <option value="13" <?php if($getall_guest_enquiry['extra_bed'] == 13){echo "selected";}?> >13</option>
                    <option value="14" <?php if($getall_guest_enquiry['extra_bed'] == 14){echo "selected";}?> >14</option>
                    <option value="15" <?php if($getall_guest_enquiry['extra_bed'] == 15){echo "selected";}?> >15</option>
                    <option value="16" <?php if($getall_guest_enquiry['extra_bed'] == 16){echo "selected";}?> >16</option>
                    <option value="17" <?php if($getall_guest_enquiry['extra_bed'] == 17){echo "selected";}?> >17</option>
                    <option value="18" <?php if($getall_guest_enquiry['extra_bed'] == 18){echo "selected";}?> >18</option>
                    <option value="19" <?php if($getall_guest_enquiry['extra_bed'] == 19){echo "selected";}?> >19</option>
                    <option value="20" <?php if($getall_guest_enquiry['extra_bed'] == 20){echo "selected";}?> >20</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Extra  Children </label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="extra_children" id="extra_children">
                    <option value="0" <?php if($getall_guest_enquiry['extra_children'] == 0){echo "selected";}?> >0</option>
                    <option value="1" <?php if($getall_guest_enquiry['extra_children'] == 1){echo "selected";}?> >1</option>
                    <option value="2" <?php if($getall_guest_enquiry['extra_children'] == 2){echo "selected";}?> >2</option>
                    <option value="3" <?php if($getall_guest_enquiry['extra_children'] == 3){echo "selected";}?> >3</option>
                    <option value="4" <?php if($getall_guest_enquiry['extra_children'] == 4){echo "selected";}?> >4</option>
                    <option value="5" <?php if($getall_guest_enquiry['extra_children'] == 5){echo "selected";}?> >5</option>
                    <option value="6" <?php if($getall_guest_enquiry['extra_children'] == 6){echo "selected";}?> >6</option>
                    <option value="7" <?php if($getall_guest_enquiry['extra_children'] == 7){echo "selected";}?> >7</option>
                    <option value="8" <?php if($getall_guest_enquiry['extra_children'] == 8){echo "selected";}?> >8</option>
                    <option value="9" <?php if($getall_guest_enquiry['extra_children'] == 9){echo "selected";}?> >9</option>
                    <option value="10" <?php if($getall_guest_enquiry['extra_children'] == 10){echo "selected";}?> >10</option>
                    <option value="11" <?php if($getall_guest_enquiry['extra_children'] == 11){echo "selected";}?> >11</option>
                    <option value="12" <?php if($getall_guest_enquiry['extra_children'] == 12){echo "selected";}?> >12</option>
                    <option value="13" <?php if($getall_guest_enquiry['extra_children'] == 13){echo "selected";}?> >13</option>
                    <option value="14" <?php if($getall_guest_enquiry['extra_children'] == 14){echo "selected";}?> >14</option>
                    <option value="15" <?php if($getall_guest_enquiry['extra_children'] == 15){echo "selected";}?> >15</option>
                    <option value="16" <?php if($getall_guest_enquiry['extra_children'] == 16){echo "selected";}?> >16</option>
                    <option value="17" <?php if($getall_guest_enquiry['extra_children'] == 17){echo "selected";}?> >17</option>
                    <option value="18" <?php if($getall_guest_enquiry['extra_children'] == 18){echo "selected";}?> >18</option>
                    <option value="19" <?php if($getall_guest_enquiry['extra_children'] == 19){echo "selected";}?> >19</option>
                    <option value="20" <?php if($getall_guest_enquiry['extra_children'] == 20){echo "selected";}?> >20</option>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <input type="hidden" value="<?php echo $getall_guest_enquiry['id']; ?>" name="id"> 
        <input type="hidden" value="<?php echo $getall_guest_enquiry['guest_enquiry_id']; ?>" name="enquieries_id">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="reset">Reset</button>
        <input type="submit" name="edit_enquiries" id="edit_enquiries" class="btn btn-success" onclick="" value="Update"/>
    </div>
</form>
<script>
    $('input[name="call_back_date"]').daterangepicker(
        {
            singleDatePicker: !0,
            singleClasses: "picker_4"
        }
    );
    </script>
