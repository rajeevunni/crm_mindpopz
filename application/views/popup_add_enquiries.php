<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Add Guest Enquires</h4>
</div>
<form class="form-horizontal form-label-left" method="post" id="bulkupadd_enquiriesload_emp" name="add_enquiries"
action="<?php echo base_url() . 'index.php/Guest/add_guest_enquiry_view' ?>" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Date </label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <input class="form-control" value="" type="text" name="call_back_date" id="call_back_date" >
                <div id="" class="val__msgbx"></div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Location </label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="location" id="location">
                    <option value="">Select Location</option>
                    <option value="Munnar" >Munnar</option>
                    <option value="Thekkady" >Thekkady</option>
                    <option value="Alappuzha" >Alappuzha</option>
                    <option value="Trivandrum" >Trivandrum</option>
                    <option value="Kumarakom" >Kumarakom</option>
                    <option value="Kovalam" >Kovalam</option>
                    <option value="Kanyakumari" >Kanyakumari</option>
                    <option value="Rameshwaram" >Rameshwaram</option>
                    <option value="Madurai" >Madurai</option>
                    <option value="Ooty" >Ooty</option>
                    <option value="Mysore" >Mysore</option>
                    <option value="Coorg" >Coorg</option>
                    <option value="Kodaikanal" >Kodaikanal</option>
                    <option value="Wayanad" >Wayanad</option>
                    <option value="Guruvayur" >Guruvayur</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Vendor Type </label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="vendor_type" id="vendor_type">
                    <option value="">Select Vendor Type</option>
                    <option value="Hotel" >Hotel</option>
                    <option value="Houseboat" >Houseboat</option>
                    <option value="Resort" >Resort</option>
                    <option value="Homestay" >Homestay</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"> No. of Rooms </label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="no_of_rooms" id="no_of_rooms">
                    <option value="0" >0</option>
                    <option value="1" >1</option>
                    <option value="2" >2</option>
                    <option value="3" >3</option>
                    <option value="4" >4</option>
                    <option value="5" >5</option>
                    <option value="6" >6</option>
                    <option value="7" >7</option>
                    <option value="8" >8</option>
                    <option value="9" >9</option>
                    <option value="10" >10</option>
                    <option value="11" >11</option>
                    <option value="12" >12</option>
                    <option value="13" >13</option>
                    <option value="14" >14</option>
                    <option value="15" >15</option>
                    <option value="16" >16</option>
                    <option value="17" >17</option>
                    <option value="18" >18</option>
                    <option value="19" >19</option>
                    <option value="20" >20</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Extra Beds </label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="extra_bed" id="extra_bed">
                    <option value="0" >0</option>
                    <option value="1" >1</option>
                    <option value="2" >2</option>
                    <option value="3" >3</option>
                    <option value="4" >4</option>
                    <option value="5" >5</option>
                    <option value="6" >6</option>
                    <option value="7" >7</option>
                    <option value="8" >8</option>
                    <option value="9" >9</option>
                    <option value="10" >10</option>
                    <option value="11" >11</option>
                    <option value="12" >12</option>
                    <option value="13" >13</option>
                    <option value="14" >14</option>
                    <option value="15" >15</option>
                    <option value="16" >16</option>
                    <option value="17" >17</option>
                    <option value="18" >18</option>
                    <option value="19" >19</option>
                    <option value="20" >20</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Extra  Children </label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="extra_children" id="extra_children">
                    <option value="0" >0</option>
                    <option value="1" >1</option>
                    <option value="2" >2</option>
                    <option value="3" >3</option>
                    <option value="4" >4</option>
                    <option value="5" >5</option>
                    <option value="6" >6</option>
                    <option value="7" >7</option>
                    <option value="8" >8</option>
                    <option value="9" >9</option>
                    <option value="10" >10</option>
                    <option value="11" >11</option>
                    <option value="12" >12</option>
                    <option value="13" >13</option>
                    <option value="14" >14</option>
                    <option value="15" >15</option>
                    <option value="16" >16</option>
                    <option value="17" >17</option>
                    <option value="18" >18</option>
                    <option value="19" >19</option>
                    <option value="20" >20</option>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <input type="hidden" name="enquiry_id" value="<?php echo $enquiry_id; ?>" >
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="reset">Reset</button>
        <input type="submit" name="add_enquiries" id="add_enquiries" class="btn btn-success" onclick="" value="Add"/>
    </div>
</form>
<script>
    $('input[name="call_back_date"]').daterangepicker(
        {
            singleDatePicker: !0,
            minDate: moment(),
            singleClasses: "picker_4"
        }
    );
    </script>
