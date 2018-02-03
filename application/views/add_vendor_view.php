<?php 
  $this->load->view('includes/head');
?>
<div class="right_col" role="main" style="min-height: 600px;">
	<div class=''>
    	<div class="page-title">
        <div class="title_left" >
            <h3>Add Vendors</h3>
        </div>
   	 </div>   
    	<br/><br/><br/>
    	<div class="clearfix"></div>
		<div class="row">
		<div class="col-md-12 col-xs-12">
            <form action="" id="vendor_details" class="form-horizontal form-label-left" name="" enctype="multipart/form-data" method="post">           
                <div class="x_panel">
                    <div class="x_content">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Vendor Name*</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="" class="form-control" name="vendor_name" id="vendor_name" placeholder="Enter Vendor Name">
                                        <div id="error_vendor_name" class="val__msgbx"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label  col-md-3 col-sm-3 col-xs-12">Location*</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select name="location" id="location" class="form-control">
                                   <option value="">Select Location</option>
                                            <?php
                                            foreach($all_location as $type)
                                           {
                                            ?>
                                                <option value="<?php echo $type['id'] ?>" <?php if($this->input->get('location') == $type['id']){echo "selected";}?>><?php echo $type['location'] ?></option>
                                           <?php 
                                            } ?>
                                   </select>  
                                        <div id="error_location" class="val__msgbx"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub Location*</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="" class="form-control" name="sub_location" id="sub_location" placeholder="Enter Sub Location">
                                        <div id="" class="val__msgbx"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Type*</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select name="type" id="type" class="form-control">
                                            <option value="">Select Type</option>
                                            <?php
                                            foreach($all_vendor_type as $type)
                                            {
                                            ?>
                                                <option value="<?php echo $type['id'] ?>"><?php echo $type['type_name'] ?></option>
                                            <?php 
                                            } ?>
                                        </select>
                                        <div id="error_type" class="val__msgbx"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Category*</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select name="category" id="category" class="form-control">
                                            <option value="">Select Category</option>
                                            <?php
                                            foreach($all_vendor_category as $category)
                                            {
                                            ?>
                                                <option value="<?php echo $category['id'] ?>"><?php echo $category['category_name'] ?></option>
                                            <?php 
                                            } ?>
                                        </select>
                                        <div id="error_category" class="val__msgbx"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Priority</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="" class="form-control" name="priority" id="priority" placeholder="Enter Priority">
                                    </div>
                                </div>
                            </div>  
                        <!-- </form> -->
                    </div>
                </div>
                
                <div class="panel panel-warning">
                    <div class="panel-heading addinfo_vendor">
                        <i class="fa fa-edit"></i>
                        &nbsp;&nbsp;Vendor Information
                    </div>
                    <div class="x_panel">
                        <div class="x_content">
                        <!-- <form action="" id="add_vendor" style="margin-top:20px;margin-bottom:20px;" class="form-horizontal form-label-left" name="" enctype="multipart/form-data" method="post"> -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Resort Contact Name</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="" class="form-control" name="resort_contact" id="resort_contact" placeholder="Enter Resort Contact Name">
                                        <div id="error_resort_contact" class="val__msgbx"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label has-feedback col-md-3 col-sm-3 col-xs-12">Primrary Email</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="" class="form-control has-feedback-left" name="primary_email" id="primary_email" placeholder="Enter Primrary Email">
                                        <span class="fa fa-at form-control-feedback left" aria-hidden="true"></span>
                                        <div id="error_primary_email" class="val__msgbx"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Reservation Contact Name</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="" class="form-control" name="reservation_contact" id="reservation_contact" placeholder="Enter Reservation Contact Name">
                                        <div id="error_reservation_contact" class="val__msgbx"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label has-feedback col-md-3 col-sm-3 col-xs-12">Reservation Email</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="" class="form-control has-feedback-left" name="reservation_email" id="reservation_email" placeholder="Enter Reservation Email">
                                        <span class="fa fa-at form-control-feedback left" aria-hidden="true"></span>
                                        <div id="error_reservation_email" class="val__msgbx"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Website</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="" class="form-control has-feedback-left" name="website" id="website" placeholder="Enter Website Address">
                                        <span class="fa fa-globe form-control-feedback left" aria-hidden="true"></span>
                                        <div id="error_website" class="val__msgbx"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Number of Rooms</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="" class="form-control " name="number_rooms" id="number_rooms" placeholder="Enter no of rooms">
                                        <div id="" class="val__msgbx"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Input User</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="<?php echo $name;?>" class="form-control" name="input_user" id="input_user">
                                        <div id="error_input_user" class="val__msgbx"></div>
                                    </div>
                                </div>
                                

                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Resort Phone</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="" class="form-control has-feedback-left" name="resort_phone" id="resort_phone" placeholder="Enter Resort Phone">
                                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                        <div id="error_resort_phone" class="val__msgbx"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Secondary Email</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="" class="form-control has-feedback-left" name="secondary_email" id="secondary_email" placeholder="Enter Secondary Email">
                                        <span class="fa fa-at form-control-feedback left" aria-hidden="true"></span>
                                        <!-- <div id="error_secondary_email" class="val__msgbx"></div> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Reservation Phone</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="" class="form-control has-feedback-left" name="reservation_phone" id="reservation_phone" placeholder="Enter Reservation Phone">
                                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                        <div id="error_reservation_phone" class="val__msgbx"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Visited</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="" class="form-control" name="visited" id="visited" placeholder="Enter Visited">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Trip Advisor Link</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="" class="form-control has-feedback-left" name="trip_link" id="trip_link" placeholder="Enter Trip Advisor Link">
                                        <span class="fa fa-globe form-control-feedback left" aria-hidden="true"></span>
                                        <div id="" class="val__msgbx"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Star Rating</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select class="form-control" name="rating" id="rating">
                                            <option value="">Select Rating</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                        <div id="" class="val__msgbx"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Remarks</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <textarea class="form-control" name="remarks" id="remarks" placeholder="Enter Remark"></textarea>
                                        <div id="" class="val__msgbx"></div>
                                    </div>
                                </div>
                                <div class="form-group pull-right">
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" name="add_vendor" id="add_vendor" class="btn btn-success" onclick="return add_vendor_validation();">Save</button>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </form>
		</div>
		</div>
	</div>
</div>

<?php 
	$this->load->view('includes/footer');
?>