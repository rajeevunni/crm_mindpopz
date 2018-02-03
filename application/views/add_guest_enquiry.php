<?php 
  $this->load->view('includes/head');
?>
<div class="right_col" role="main" style="min-height: 600px;">
	<div class=''>
    	<br/><br/><br/>
    	<div class="clearfix"></div>
		<div class="row">
		<!-- <div class="col-md-12 col-xs-12"> -->
            <form action="<?php echo base_url() . 'index.php/Guest' ?>" id="add_guest" class="form-horizontal form-label-left" name="" enctype="multipart/form-data" method="post">
                <div class="panel panel-warning">
                    <div class="panel-heading addinfo_vendor">
                        <i class="fa fa-bars"></i>
                        &nbsp;&nbsp;Guest Details
                    </div>
                    <div class="panel-body">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Guest Name*</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="" class="form-control" name="guest_name" id="guest_name" placeholder="Enter Name">
                                    <div id="error_guest_name" class="val__msgbx"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Email</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="" autocomplete="off"  onkeyup="checkguestemail(this.value)" class="form-control has-feedback-left" name="guest_email" id="guest_email" placeholder="Enter Email ID">
                                    <span class="fa fa-at form-control-feedback left" aria-hidden="true"></span>
                                    <div id="error_guest_email" class="val__msgbx"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Address 1</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="" class="form-control" name="guest_address1" id="guest_address1" placeholder="Enter Address 1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">City</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="" class="form-control" name="guest_city" id="guest_city" placeholder="Enter City">
                                    <div id="" class="val__msgbx"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Mobile</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="" autocomplete="off"      onkeyup="checkmobile(this.value)" class="form-control has-feedback-left" name="guest_mobile" id="guest_mobile" placeholder="Enter mobile number">
                                    <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                    <div id="error_guest_mobile" class="val__msgbx"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Alt Email</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="" autocomplete="off"  class="form-control has-feedback-left" name="guest_alt_email" id="guest_alt_email" placeholder="Enter Alternative Email ID">
                                    <span class="fa fa-at form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Address 2</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="" class="form-control" name="guest_address2" id="guest_address2" placeholder="Enter Address 2">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">State</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="" class="form-control" name="state" id="state"  placeholder="Enter State">
                                    <div id="error_state" class="val__msgbx"></div>
                                </div>
                            </div>
                        </div>  
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Alt Mobile</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="" autocomplete="off"  class="form-control has-feedback-left" name="guest_alt_mobile" id="guest_alt_mobile" placeholder="Enter mobile number">
                                    <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Input User</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="<?php echo $name;?>" class="form-control" name="input_user" id="input_user" readonly>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Country</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <select class="form-control" name="guest_country"id="guest_country">
                                        <option value="">Select Country</option>
                                        <option value="1">India</option>
                                    </select>
                                    <div id="error_guest_country" class="val__msgbx"></div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="panel panel-warning">
                    <div class="panel-heading addinfo_vendor">
                        <i class="fa fa-bars"></i>
                        &nbsp;&nbsp;Enquiry
                    </div>
                    <div class="panel-body">                    
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Enquiry Date</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="<?php echo date("d-m-Y");?>" class="form-control" 
                                        name="enquiry_date" id="enquiry_date" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Status</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <select class="form-control" name="enquiry_status" id="enquiry_status" onchange="get_value(this.value)">
                                        <!-- <option value="">Select Status</option> -->
                                        <?php
                                        foreach($getall_enquiry_status as $status)
                                        {
                                        ?>
                                            <option value="<?php echo $status['enquiry_status'] ?>" <?php if($status['enquiry_status'] == 'INPUTTED'){echo "selected";}?>><?php echo $status['enquiry_status'] ?></option>
                                        <?php 
                                        } ?>
                                    </select>
                                    <div id="error_enquiry_status" class="val__msgbx"></div>
                                </div>
                            </div>
                            <div class="form-group" id="booked_div" style="display:none">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Booking Amount</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="" class="form-control" name="booking_amount" id="booking_amount">
                                </div>
                            </div>
                            <div class="form-group" id="callack_div1" style="display:none">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Call Back Date</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="" class="form-control" name="call_back_date" id="call_back_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Reference</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <select class="form-control" name="enquiry_reference" id="enquiry_reference">
                                        <option value="">Select Reference</option>
                                        <?php
                                        foreach($getall_references as $reference)
                                        {
                                        ?>
                                            <option value="<?php echo $reference['reference_name'] ?>"><?php echo $reference['reference_name'] ?></option>
                                        <?php 
                                        } ?>
                                    </select>
                                    <div id="error_enquiry_reference" class="val__msgbx"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">CRM</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <select class="form-control" name='enquiry_crm' id='enquiry_crm'>
                                        <option value="">Select CRM</option>
                                        <?php
                                        foreach($getall_crm as $crm)
                                        {
                                        ?>
                                            <option value="<?php echo $crm['id']; ?>"><?php echo $crm['f_name'].' '.$crm['l_name']; ?></option>
                                        <?php 
                                        } ?>
                                    </select>
                                    <div id="" class="val__msgbx"></div>
                                </div>
                            </div>
                            <div class="form-group" id="booked_div2" style="display:none">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Booking Date</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" readonly value="<?php echo date("d-m-Y");?>" class="form-control" name="booking_date" id="booking_date">
                                </div>
                            </div>
                            <div class="form-group" id="callack_div2" style="display:none">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Call Back Time</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="time" value="" class="form-control" name="call_back_time" id="call_back_time">
                                </div>
                            </div>
                        </div>  
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Ext Ref No</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="" class="form-control" name="enquiry_ext_rfn_no" 
                                        id="enquiry_ext_rfn_no" placeholder="Enter External Reference ">                                        
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Input By</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="<?php echo $name;?>"  
                                        name='enquiry_input_by' class="form-control" 
                                        <?php 
                                            if($this->session->userdata('user_type') != 1){
                                                echo "readonly";
                                            }
                                        ?>
                                    >
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12 ">Remarks</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <textarea class="form-control" name="enquiry_remarks" id="enquiry_remarks"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group pull-right">
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" name="add_guest_enquiry" id="add_guest_enquiry" class="btn btn-success" onclick="return add_guest_enquiry_validation()">Save</button>
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