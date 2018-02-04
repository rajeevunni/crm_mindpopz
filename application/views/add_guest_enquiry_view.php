<?php

$this->load->view('includes/head');

if($this->session->userdata('user_type')!=1)
{
    $read = 'readonly';
    $disable='disabled';
    $action_div = 'style="display:none"';
}
else{
    $read = '';
    $disable='';
    $action_div = 'style="display:block"';
}

if($this->session->userdata('user_type')!=1 && $filled_data['enquiry_status'] == 'BOOKED')
{
    $readbooked = 'readonly';
    $disablebooked='disabled';
}
else{
    $readbooked = '';
    $disablebooked='';
}




?>
    <div class="right_col" role="main" style="min-height: 600px;">
        <div class=''>
            <br/><br/><br/>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading addinfo_vendor">
                            <i class="fa fa-edit"></i>
                            &nbsp;&nbsp;Guest Details ID: <?php echo $filled_data["guest_details_ref"]; ?>
                        </div>
                        <div class="">
                            <form action="" style="margin-top:20px;margin-bottom:20px;" id="create_mail_template_form" class="form-horizontal form-label-left" name="" enctype="multipart/form-data" method="post">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Guest Name</label>

                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" value="<?php echo $filled_data['guest_name']; ?>" class="form-control" name="guest_name" id="guest_name" placeholder="Enter name">
                                        </div>
                                    </div>
                                    <?php
                                    if($this->session->userdata('user_type')!=1)
                                    {
                                        $readonly = 'readonly';
                                    }
                                    else{
                                        $readonly = '';
                                    }
                                    ?>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Email</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" value="<?php echo $filled_data['guest_email']; ?>" <?php echo $readonly; ?> class="form-control has-feedback-left" name="guest_email" id="guest_email">
                                            <span class="fa fa-at form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Address 1</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" value="<?php echo $filled_data['guest_address1']; ?>" class="form-control" name="guest_address1" id="guest_address1" placeholder="Enter Address 1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">City</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" value="<?php echo $filled_data['guest_city']; ?>" class="form-control" name="guest_city" id="guest_city" placeholder="Enter City">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Mobile</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" <?php echo $readonly; ?> value="<?php echo $filled_data['guest_mobile']; ?>" class="form-control has-feedback-left" name="guest_mobile" id="guest_mobile" placeholder="Enter mobile number">
                                            <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Alt Email</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" value="<?php echo $filled_data['guest_alt_email']; ?>" class="form-control has-feedback-left" name="guest_alt_email" id="guest_alt_email">
                                            <span class="fa fa-at form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Address 2</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" value="<?php echo $filled_data['guest_address2']; ?>" class="form-control" name="guest_address2" id="guest_address2" placeholder="Enter Address 2">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">State</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" value="<?php echo $filled_data['state']; ?>" class="form-control" name="state" id="state"  placeholder="Enter State">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Alt Mobile</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" value="<?php echo $filled_data['guest_alt_mobile']; ?>" class="form-control has-feedback-left" name="guest_alt_mobile" id="guest_alt_mobile" placeholder="Enter mobile number">
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
                                                <option value="" <?php if($filled_data['guest_country'] == ""){echo "selected";}?> >Select Country</option>
                                                <option value="1" <?php if($filled_data['guest_country'] == 1){echo "selected";}?> >India</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="pull-right">
                                            <input type="hidden" value="<?php echo $filled_data['guest_enq_id']; ?>"  name="enquiry_id"  >
                                            <?php   if($this->session->userdata('user_type')==1){?>
                                                <button class="btn btn-primary" type="reset">Reset</button>
                                                <button type="submit" name="update_guest_enquiry" id="add_guest_enquiry" class="btn btn-success" >Save</button>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="panel panel-warning" id="enquiry2">
                        <div class="panel-heading addinfo_vendor">
                            <i class="fa fa-edit"></i>
                            &nbsp;&nbsp;Enquiry Ref: <?php echo $filled_data['guest_enquiry_ref'];?>
                        </div>
                        <div class="">
                            <form action="" style="margin-top:20px;margin-bottom:20px;" id="create_mail_template_form" class="form-horizontal form-label-left" name="" enctype="multipart/form-data" method="post">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Enquiry Date</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" value="<?php echo date('d-M-Y', strtotime($filled_data['enquiry_date'])); ?>" class="form-control" name="enquiry_date" id="enquiry_date" readonly>
                                            <input type="hidden" value="<?php echo $filled_data['id']; ?>"  name="enquiry_id"  >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" value="<?php echo $filled_data['enquiry_status'];?>" name="preSts" />
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Status</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <select class="form-control" name="enquiry_status" id="enquiry_status" onchange="get_value(this.value)" <?php  echo  $readbooked.' '.$disablebooked;?>>
                                                <?php
                                                foreach($getall_enquiry_status as $enquiry_status)
                                                {
                                                    $selected = $enquiry_status['enquiry_status'] == $filled_data['enquiry_status']?'selected':'';
                                                    ?>
                                                    <option value="<?php echo $enquiry_status['enquiry_status']; ?>" <?php echo $selected; ?> ><?php echo $enquiry_status['enquiry_status'];?></option>
                                                    <?php
                                                } ?>

                                            </select>
                                        </div>
                                    </div>
                                    <?php
                                    if($filled_data['enquiry_status'] == 'BOOKED')
                                    {
                                        $style_b='style="display:block"';
                                    }
                                    else
                                    {
                                        $style_b='style="display:none"';
                                    }
                                    ?>
                                    <div class="form-group" id="booked_div" <?php echo $style_b; ?>>
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Booking Amount</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" value="<?php echo $filled_data['booking_amount']; ?>" class="form-control" name="booking_amount" id="booking_amount" <?php  echo  $readbooked.' '.$disablebooked;?>>
                                        </div>
                                    </div>
                                    <?php
                                    if($filled_data['enquiry_status'] == 'CALL BACK')
                                    {
                                        $style='style="display:block"';
                                    }
                                    else
                                    {
                                        $style='style="display:none"';
                                    }
                                    ?>
                                    <div class="form-group" id="callack_div1" <?php echo $style; ?>>
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Call Back Date</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" value="<?php echo date('d-M-Y', strtotime($filled_data['call_back_date'])); ?>" class="form-control" name="call_back_date" id="call_back_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Reference</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <select class="form-control" name="enquiry_reference" id="enquiry_reference" <?php  echo  $readbooked.' '.$disablebooked;?>>
                                                <option value="">Select Reference</option>
                                                <?php
                                                foreach($getall_references as $references)
                                                {
                                                    $selected = $references['reference_name'] == $filled_data['enquiry_reference']?'selected':'';
                                                    ?>
                                                    <option value="<?php echo $references['reference_name']; ?>" <?php echo $selected; ?>><?php echo $references['reference_name']; ?></option>
                                                    <?php
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">CRM</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <select class="form-control" name="enquiry_crm" id="enquiry_crm" <?php  echo  $readbooked.' '.$disablebooked;?> >
                                                <option value="">Select CRM</option>
                                                <?php
                                                foreach($getall_crm as $crm)
                                                {
                                                    $selected = $crm['id'] == $filled_data['enquiry_crm']?'selected':'';
                                                    ?>
                                                    <option value="<?php echo $crm['id'] ?>" <?php echo $selected; ?>><?php echo $crm['f_name'].' '.$crm['l_name'] ?></option>
                                                    <?php
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php
                                    if($filled_data['booking_date'] != 0)
                                    {
                                        $val = date('d-M-Y', strtotime($filled_data['booking_date']));
                                    }
                                    else
                                    {
                                        $val = date("d-M-Y");
                                    }
                                    ?>
                                    <div class="form-group" id="booked_div2" <?php echo $style_b; ?>>
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Booking Date</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" readonly value="<?php echo $val; ?>" class="form-control" name="booking_date" id="booking_date">
                                        </div>
                                    </div>
                                    <div class="form-group" id="callack_div2" <?php echo $style; ?>>
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Call Back Time</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="time" value="<?php echo $filled_data['call_back_time']; ?>" class="form-control" name="call_back_time" id="call_back_time">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Ext Ref No</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" value="<?php echo $filled_data['enquiry_ext_rfn_no']; ?>" class="form-control" name="enquiry_ext_rfn_no" id="enquiry_ext_rfn_no" placeholder="Enter External Reference " <?php echo $read; ?>>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Input By</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" value="<?php echo $name;?>" name="enquiry_input_by" id="enquiry_input_by" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12 ">Remarks</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <textarea class="form-control"  name="enquiry_remarks" id="remarks"><?php echo $filled_data['enquiry_remarks']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="pull-right">
                                            <input type="hidden" value="<?php echo $filled_data['guest_enq_id']; ?>"  name="enquiry_id"  >
                                            <button class="btn btn-primary" type="reset">Reset</button>
                                            <button type="submit" name="update_enquiry" id="add_enquiry" class="btn btn-success" >Save</button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>

                    <div class="panel panel-warning" id="enquiry_ref">
                        <div class="panel-heading addinfo_vendor">
                            <i class="fa fa-edit"></i>
                            &nbsp;&nbsp;Enquiry Master#Ref.
                        </div>
                        <div class="">
                            <form action="" id="add_guest_enquery" style="margin-top:20px;margin-bottom:20px;" class="form-horizontal form-label-left" name="" enctype="multipart/form-data" method="post">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Adults</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <select class="form-control" name="adults" id="adults">
                                                <option value="0">Number of Adults</option>
                                                <?php
                                                $value = 52;
                                                for($i=1; $i<$value; $i++)
                                                {
                                                    ?>
                                                    <option value="<?php echo $i; ?>" <?php if($filled_data['adults'] == $i){echo "selected";}?>><?php echo $i-1; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Rooms</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <select class="form-control" name="rooms" id="rooms">
                                                <option value="0">Number of Rooms</option>
                                                <?php
                                                $value = 17;
                                                for($i=1; $i<$value; $i++)
                                                {
                                                    ?>
                                                    <option value="<?php echo $i; ?>" <?php if($filled_data['rooms'] == $i){echo "selected";}?>><?php echo $i-1; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Add Extra Bed</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <select class="form-control" name="add_extra_bed" id="add_extra_bed">
                                                <option value="">Extra Bed</option>
                                                <option value="1" <?php if($filled_data['add_extra_bed'] == 1){echo "selected";}?>>Yes</option>
                                                <option value="2" <?php if($filled_data['add_extra_bed'] == 2){echo "selected";}?>>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Number of Days</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <select class="form-control" name="number_of_days" id="number_of_days">
                                                <option value="0">No of Days</option>
                                                <?php
                                                $value = 22;
                                                for($i=1; $i<$value; $i++)
                                                {
                                                    ?>
                                                    <option value="<?php echo $i; ?>" <?php if($filled_data['number_of_days'] == $i){echo "selected";}?>><?php echo $i-1; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">CRM</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                <input type="text" class="form-control" readonly value="<?php echo $select_crm['enquiry_crm']; ?>" >
                                </div>
                            </div> -->

                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Children</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <select class="form-control" name="children" id="children">
                                                <option value="0">No of Children</option>
                                                <?php
                                                $value = 22;
                                                for($i=1; $i<$value; $i++)
                                                {
                                                    ?>
                                                    <option value="<?php echo $i; ?>" <?php if($filled_data['children'] == $i){echo "selected";}?>><?php echo $i-1; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Extra Bed</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <select class="form-control" name="extra_bed" id="extra_bed">
                                                <option value="0">Extra Bed</option>
                                                <?php
                                                $value = 12;
                                                for($i=1; $i<$value; $i++)
                                                {
                                                    ?>
                                                    <option value="<?php echo $i; ?>" <?php if($filled_data['extra_bed'] == $i){echo "selected";}?>><?php echo $i-1; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Need Transport</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <select class="form-control" name="transport" id="transport" onchange="get_transport_value(this.value)">
                                                <option value="">Transport Needed</option>
                                                <option value="Yes" <?php if($filled_data['transport'] == 'Yes'){echo "selected";}?>>Yes</option>
                                                <option value="No" <?php if($filled_data['transport'] == 'No'){echo "selected";}?>>No</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Number of Nights</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <select class="form-control" name="number_of_nights" id="number_of_nights">
                                                <option value="0">No of Nights</option>
                                                <?php
                                                $value = 22;
                                                for($i=1; $i<$value; $i++)
                                                {
                                                    ?>
                                                    <option value="<?php echo $i; ?>" <?php if($filled_data['number_of_nights'] == $i){echo "selected";}?>><?php echo $i-1; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Small Children</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <select class="form-control" name="small_children" id="small_children">
                                                <option value="0">Small Children</option>
                                                <?php
                                                $value = 22;
                                                for($i=1; $i<$value; $i++)
                                                {
                                                    ?>
                                                    <option value="<?php echo $i; ?>" <?php if($filled_data['small_children'] == $i){echo "selected";}?>><?php echo $i-1; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Extra Children</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <select class="form-control" name="extra_children" id="extra_children">
                                                <option value="0">Extra Children</option>
                                                <?php
                                                $value = 22;
                                                for($i=1; $i<$value; $i++)
                                                {
                                                    ?>
                                                    <option value="<?php echo $i; ?>" <?php if($filled_data['extra_children'] == $i){echo "selected";}?>><?php echo $i-1; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Input By</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" value="<?php echo $filled_data['enquiry_input_by']; ?>" name="enquiry_input_by" id="enquiry_input_by" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <?php
                                    if($filled_data['transport']=='Yes')
                                    {
                                        $style_t = 'style="display:block"';
                                    }
                                    else{
                                        $style_t = 'style="display:none"';
                                    }
                                    ?>
                                    <div class="form-group" id="vehicle_type_id" <?php echo $style_t; ?> >
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Vehicle Type</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <select class="form-control" name="vehicle_type" id="vehicle_type">
                                                <?php
                                                foreach($getall_vehicle as $type)
                                                {
                                                    $selected = $type['vehicle_type'] == $filled_data['vehicle_type']?'selected':'';
                                                    ?>
                                                    <option value="<?php echo $type['vehicle_type']; ?>" <?php echo $selected; ?>><?php echo $type['vehicle_type']; ?></option>
                                                    <?php
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="pull-right">
                                            <?php
                                            if(sizeof($get_result_enquiry)>0)
                                            {
                                                $name = 'name="update_guest_enquery"';
                                            }
                                            else{
                                                $name = 'name="add_guest_enquery"';
                                            }
                                            ?>
                                            <input type="hidden" value="<?php echo $filled_data['guest_enq_id']; ?>" name="enquiry_id">
                                            <input type="hidden" value="<?php echo $filled_data['guest_enquiry_master_id']; ?>" name="guest_enquiry_master_id">
                                            <button class="btn btn-primary" type="reset">Reset</button>
                                            <button type="submit" <?php echo $name; ?> id="add_guest_enquery" class="btn btn-success" >Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="panel panel-warning" id="enquiries">
                        <div class="panel-heading addinfo_vendor">
                            <i class="fa fa-edit"></i>
                            &nbsp;&nbsp;Guest Plan
                        </div>
                        <div class="">
                            <table id="datatable" class="table table-striped dt-responsive nowrap table-hover"
                                   cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Location</th>
                                    <th>Vendor Type</th>
                                    <th>Hotel Name</th>
                                    <th>No. of Rooms</th>
                                    <th>Extra Beds</th>
                                    <th>Extra Children</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                foreach ($all_guest_enquiries_details as $details) {
                                    ?>
                                    <tr >
                                        <td><?php echo date('d-M-Y', strtotime($details['call_back_date'])); ?></td>
                                        <td><?php echo $details['location']; ?></td>
                                        <td><?php echo $details['vendor_type']; ?></td>
                                        <td><?php echo $details['hotel_name']; ?></td>
                                        <td><?php echo $details['no_of_rooms']; ?></td>
                                        <td><?php echo $details['extra_bed'];?></td>
                                        <td><?php echo $details['extra_children'];?></td>
                                        <td>
                                            <!-- <a href="#" data-toggle="modal"  data-target=".edit_enquires_popup" id="<?php echo $details['id']; ?>"
                                       onclick="get_enquiries_edit_popup(this.id)">
                                        <span class="glyphicon glyphicon-pencil action_icon edit_guest"></span>
                                    </a> -->
                                            <input type="hidden" id="enquirie_id" value="<?php echo $details['id']; ?>">
                                            <a  data-toggle="modal"  data-target=".edit_enquires_popup"> <span  class="glyphicon glyphicon-edit  delete_enquiry_table" id="<?php echo $details['id']; ?>" onclick="get_enquiries_edit_popup(this)"  value="<?php echo $details['id']; ?>"></span></a>
                                            <a> <span  style="margin-left:10px;" class="glyphicon glyphicon-trash  delete_enquiry_table" value="<?php echo $details['id']; ?>" onclick="delete_enquiry_table(this)"></span></a>
                                        </td>
                                    </tr>
                                    <?php
                                    // $i++;
                                }
                                ?>
                                </tbody>
                                <tbody>
                                <td>
                                    <input type="hidden" value="<?php echo $filled_data['guest_enq_id']; ?>" id="enquiry_id">
                                    <a class="glyphicon glyphicon-plus action_icon add_enquiries" data-toggle="modal"  data-target=".add_enquires_popup" value="" onclick="get_enquiries_popup()"> </a>
                                    <!-- <span class="glyphicon glyphicon-pencil action_icon add_enquiries"></span> -->
                                </td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Modal for add enquiries -->
    <div class="modal fade add_enquires_popup" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content" id="add_enquires_popup_data">

            </div>
        </div>
    </div>

    <!--Modal for add enquiries -->
    <div class="modal fade edit_enquires_popup" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content" id="edit_enquires_popup_data">

            </div>
        </div>
    </div>
<?php
$this->load->view('includes/footer');
?>