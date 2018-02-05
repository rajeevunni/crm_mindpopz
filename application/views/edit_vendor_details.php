<?php 
  $this->load->view('includes/head');
?>
<div class="right_col" role="main" style="min-height: 600px;">
	<div class=''>
    	<div class="page-title">
        <div class="title_left" >
            <h3>Edit Vendors</h3>
            <?php
            // echo "<pre>";
            // print_r($filled_data);
            ?>
        </div>
   	 </div>   
    	<br/><br/><br/>
    	<div class="clearfix"></div>
		<div class="row">
		<div class="col-md-12 col-xs-12">
            <div class="x_panel">
				<div class="x_content">
                    <form action="" id="vendor_details" class="form-horizontal form-label-left" name="" enctype="multipart/form-data" method="post">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Vendor Name*</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" readonly value="<?php echo $filled_data['vendor_name']; ?>" class="form-control" name="vendor_name" id="vendor_name">
                                    <div id="error_vendor_name" class="val__msgbx"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label  col-md-3 col-sm-3 col-xs-12">Location*</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    
                                    <select name="location" id="location" class="form-control">
                                        <option value="">Select type</option>
                                        <?php
                                        foreach($all_location as $type)
                                        {
                                            $selected = $type['id'] == $filled_data['location']?'selected':'';
                                        ?>
                                            <option value="<?php echo $type['id'] ?>" <?php echo $selected; ?>><?php echo $type['location']; ?></option>
                                        <?php 
                                        } ?>
                                    </select>
                                    <div id="error_location" class="val__msgbx"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub Location*</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $filled_data['sub_location']; ?>" class="form-control" name="sub_location" id="sub_location">
                                    <div id="error_sub_location" class="val__msgbx"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Type*</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select name="type" id="type" class="form-control">
                                        <option value="">Select type</option>
                                        <?php
                                        foreach($all_vendor_type as $type)
                                        {
                                            $selected = $type['id'] == $filled_data['type']?'selected':'';
                                        ?>
                                            <option value="<?php echo $type['id'] ?>" <?php echo $selected; ?>><?php echo $type['type_name']; ?></option>
                                        <?php 
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Category*</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Select category</option>
                                        <?php
                                        foreach($all_vendor_category as $category)
                                        {
                                            $selected = $category['id'] == $filled_data['category']?'selected':'';
                                        ?>
                                            <option value="<?php echo $category['id'] ?>" <?php echo $selected; ?>><?php echo $category['category_name'] ?></option>
                                        <?php 
                                        } ?>
                                    </select>
                                    <div id="error_category" class="val__msgbx"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Priority</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $filled_data['priority']; ?>" class="form-control" name="priority" id="priority">
                                </div>
                            </div>
                            <div class="form-group pull-right">
                                    <!-- <button type="button" class="btn btn-primary"><i class="fa fa-download"></i> Download</button> -->
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success" id="vendor_details" name="update_vendor_details" onclick="">Save</button>
                            </div>
                        </div>  
                    </form>
				</div>
            </div>
            
			<div class="panel panel-warning">
                <div class="panel-heading addinfo_vendor">
                    <i class="fa fa-edit"></i>
                    &nbsp;&nbsp;Vendor Information
                </div>
				<div>
                    <form action="" id="add_vendor" style="margin-top:20px;margin-bottom:20px;" class="form-horizontal form-label-left" name="" enctype="multipart/form-data" method="post">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Resort Contact Name</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="hidden" value="<?php echo $filled_data['id']; ?>" name ="id" id="id">
                                    <input type="text" value="<?php echo $filled_data['resort_contact']; ?>" class="form-control" name="resort_contact" id="resort_contact">
                                    <div id="error_resort_contact" class="val__msgbx"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label has-feedback col-md-3 col-sm-3 col-xs-12">Primrary Email</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $filled_data['primary_email']; ?>" class="form-control has-feedback-left" name="primary_email" id="primary_email">
                                    <span class="fa fa-at form-control-feedback left" aria-hidden="true"></span>
                                    <div id="error_primary_email" class="val__msgbx"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Reservation Contact Name</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $filled_data['reservation_contact']; ?>" class="form-control" name="reservation_contact" id="reservation_contact">
                                    <div id="error_reservation_contact" class="val__msgbx"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label has-feedback col-md-3 col-sm-3 col-xs-12">Reservation Email</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $filled_data['reservation_email']; ?>" class="form-control has-feedback-left" name="reservation_email" id="reservation_email">
                                    <span class="fa fa-at form-control-feedback left" aria-hidden="true"></span>
                                    <div id="error_reservation_email" class="val__msgbx"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Website</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $filled_data['website']; ?>" class="form-control has-feedback-left" name="website" id="website">
                                    <span class="fa fa-globe form-control-feedback left" aria-hidden="true"></span>
                                    <div id="error_website" class="val__msgbx"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Number of Rooms</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select class="form-control" name="number_rooms" id="number_rooms">
                                        <option value=""></option>
                                        <option value="1" <?php if($filled_data['number_rooms'] == 1){echo "selected";}?>>1</option>
                                        <option value="2" <?php if($filled_data['number_rooms'] == 2){echo "selected";}?>>2</option>
                                        <option value="3" <?php if($filled_data['number_rooms'] == 3){echo "selected";}?>>3</option>
                                        <option value="4" <?php if($filled_data['number_rooms'] == 4){echo "selected";}?>>4</option>
                                        <option value="5" <?php if($filled_data['number_rooms'] == 5){echo "selected";}?>>5</option>
                                        <option value="6" <?php if($filled_data['number_rooms'] == 6){echo "selected";}?>>6</option>
                                    </select>
                                    <div id="error_number_rooms" class="val__msgbx"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Input User</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" readonly value="<?php echo $filled_data['input_user']; ?>" class="form-control" name="input_user" id="input_user">
                                    <div id="error_input_user" class="val__msgbx"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Resort Phone</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $filled_data['resort_phone']; ?>" class="form-control has-feedback-left" name="resort_phone" id="resort_phone">
                                    <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                    <div id="error_resort_phone" class="val__msgbx"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Secondary Email</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $filled_data['secondary_email']; ?>" class="form-control has-feedback-left" name="secondary_email" id="secondary_email">
                                    <span class="fa fa-at form-control-feedback left" aria-hidden="true"></span>
                                    <!-- <div id="error_secondary_email" class="val__msgbx"></div> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Reservation Phone</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $filled_data['reservation_phone']; ?>" class="form-control has-feedback-left" name="reservation_phone" id="reservation_phone">
                                    <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                    <div id="error_reservation_phone" class="val__msgbx"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Visited</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $filled_data['visited']; ?>" class="form-control" name="visited" id="visited">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Trip Advisor Link</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $filled_data['trip_link']; ?>" class="form-control has-feedback-left" name="trip_link" id="trip_link">
                                    <span class="fa fa-globe form-control-feedback left" aria-hidden="true"></span>
                                    <div id="error_trip_link" class="val__msgbx"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Star Rating</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select class="form-control" name="rating" id="rating">
                                        <option value=""></option>
                                        <option value="1" <?php if($filled_data['rating'] == 1){echo "selected";}?>>1</option>
                                        <option value="2" <?php if($filled_data['rating'] == 2){echo "selected";}?>>2</option>
                                        <option value="3" <?php if($filled_data['rating'] == 3){echo "selected";}?>>3</option>
                                        <option value="4" <?php if($filled_data['rating'] == 4){echo "selected";}?>>4</option>
                                        <option value="5" <?php if($filled_data['rating'] == 5){echo "selected";}?>>5</option>
                                        <option value="6" <?php if($filled_data['rating'] == 6){echo "selected";}?>>6</option>
                                        <option value="7" <?php if($filled_data['rating'] == 7){echo "selected";}?>>7</option>
                                        <option value="8" <?php if($filled_data['rating'] == 8){echo "selected";}?>>8</option>
                                        <option value="9" <?php if($filled_data['rating'] == 9){echo "selected";}?>>9</option>
                                        <option value="10" <?php if($filled_data['rating'] == 10){echo "selected";}?>>10</option>
                                    </select>
                                    <div id="error_rating" class="val__msgbx"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Remarks</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea class="form-control" name="remarks" id="remarks"><?php echo $filled_data['remarks']; ?></textarea>
                                    <div id="error_remarks" class="val__msgbx"></div>
                                </div>
                            </div>
                            <div class="form-group pull-right">
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" name="update_vendor_information" id="update_vendor_information" class="btn btn-success" >Save</button>
                            </div>
                        </div>  
                    </form>
				</div>
            </div>
            <div class="panel panel-warning" id="acomadation">
                <div class="panel-heading addinfo_vendor">
                    <i class="fa fa-edit"></i>
                    &nbsp;&nbsp;Accomodation
                </div>
				<div class="">
                    <form action="" id="add_accomodation" style="margin-top:20px;margin-bottom:20px;" class="form-horizontal form-label-left" name="" enctype="multipart/form-data" method="post">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Start Date</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="" readonly placeholder="Select Start Date" class="form-control" name="start_date" id="start_datepick">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Occupents</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="" class="form-control" name="occupents" id="occupents" placeholder="Enter Occupents">
                                    <!-- <span class="fa fa-at form-control-feedback left" aria-hidden="true"></span> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Special Rate</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="" class="form-control" name="special_rate" id="special_rate" placeholder="Special Rate">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Currency</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <select class="form-control" name="currency" id="currency">
                                       
                                        <option value="INR">INR</option>
                                        <!-- <option value="No">No</option> -->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">End Date</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="" readonly placeholder="Select End Date" class="form-control" name="end_date" id="expected_datepick">
                                    <!-- <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Food Plan</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <select class="form-control" name="food_plan" id="food_plan">
                                        <option value="">Select Food Plan</option>
                                        <option value="AP">AP</option>
                                        <option value="EP">EP</option>
                                        <option value="CP">CP</option>
                                        <option value="MAP">MAP</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Extra Bed</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="" placeholder="Enter Extra Bed" class="form-control" name="extra_bed" id="extra_bed" placeholder="Enter Extra Bed">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">A/C Status</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <select class="form-control" name="ac" id="ac">
                                        <option value="">Select A/C Status</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>  
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Room Type</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value=""  class="form-control" name="room_type" id="room_type">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Rack Rate</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="" placeholder="Enter Rack Rate" class="form-control" name="rack_rate" id="rack_rate">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Extra Child</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="" placeholder="Enter Extra Child" class="form-control" name="extra_child" id="extra_child" placeholder="">
                                </div>
                            </div>
                            <div class="form-group pull-right">
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" name="add_accomodation" id="add_accomodation" class="btn btn-success" onclick="">Save</button>
                            </div>
                        </div>
                    </form> 
                     
                </div>
            </div>
            <div class="panel panel-warning">
                <div class="panel-heading addinfo_vendor">
                    <i class="fa fa-edit"></i>
                    &nbsp;&nbsp;Vendor Rates
                </div>
                <div class="panel-body">
                    <?php 
                    if($this->session->userdata('user_type')!=1)
                    {
                        $action = 'style="display:none"';
                    }
                    else{
                        $action = 'style="display:block"';
                    }
                    ?>
                    <!-- BULK UPLOAD -->
                    <div <?php echo $action; ?>>
                        <!-- <a href="javascript:void(0);" class="btn btn-primary btn-sm" onclick="$('#search_accommodation').tableExport({type:'excel',escape:'false'});">Export as Excel</a>
                        <div id="date_filter">
                            <label>From: </label> <input type="text" name="start_date" id="start_date"/>
                            <label>To: </label> <input type="text" name="end_date" id="end_date"/>                       
                        </div> -->
                        <div class="btn-group pull-right" >
                            <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" style=" font-size: 12px;" type="button" aria-expanded="false">BULK UPLOAD <span class="caret"></span>
                            </button>
                            <ul role="menu" class="dropdown-menu" style="margin-left: 10px;">
                                <li>
                                    <a href="<?php echo base_url().'index.php/Vendor/get_download_sheet' ?>" name="download_excel_sheet_private" id="download_excel_sheet_private" class="excel_sheet" > Create Excel Sheet </a>
                                </li>
                                <li>
                                <input type="hidden" value="<?php echo $filled_data['id']; ?>" id="vendor_id">
                                    <a href="javascript:void(0);" name="upload_excel_sheet" id="upload_excel_sheet" class="excel_sheet" data-toggle="modal"  data-target=".bulk_vendor_upload" onclick="upload_vendor_details()"> Upload Excel Sheet </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <table id="accommodation_view_table" style="font-size:12px;" class="table table-striped dataTable " role="grid" aria-describedby="datatable-fixed-header_info">
                        <thead> 
                            <?php 
                            if($this->session->userdata('user_type')!=1)
                            {
                                $action = 'style="display:none"';
                            }
                            else{
                                $action = 'style="display:block"';
                            }
                            ?>
                            <tr>
                                <th style="font-size:11px;">No.</th>
                                <th style="font-size:11px;">Start Date</th>
                                <th style="font-size:11px;">End Date</th>
                                <th style="font-size:11px;">Room Type</th>
                                <th style="font-size:11px;">Occupants</th>
                                <th style="font-size:11px;">Food Plan</th>
                                <th style="font-size:11px;">Rack Rate</th>
                                <th style="font-size:11px;">Special Rate</th>
                                <th style="font-size:11px;">Extra Bed</th>
                                <th style="font-size:11px;">Extra Child</th>
                                <th style="font-size:11px;">Currency</th>
                                <th style="font-size:11px;">A/C Status</th>
                                <th style="font-size:11px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($all_accommodation_details as $details) 
                            {
                            ?>
                                <tr value="<?php echo $details['id']; ?>" data-toggle="modal" data-target=".edit_accommodation" onclick="get_edit_accommodtion(this)" data-id="id">
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo date('d-M-Y', strtotime($details['start_date'])); ?></td>
                                    <td><?php echo date('d-M-Y', strtotime($details['end_date'])); ?></td>
                                    <td><?php echo $details['type']; ?></td>
                                    <td><?php echo $details['occupents']; ?></td>
                                    <td><?php echo $details['food_plan']; ?></td>
                                    <td><?php echo $details['rack_rate']; ?></td>
                                    <td><?php echo $details['special_rate']; ?></td>
                                    <td><?php echo $details['extra_bed']; ?></td>
                                    <td><?php echo $details['extra_child']; ?></td>
                                    <td><?php echo $details['currency']; ?></td>
                                    <td><?php echo $details['ac']; ?></td>
                                    <td>
                                        <input type="hidden" id="accommodation_id" value="<?php echo $details['id']; ?>">
                                        <a href="#"> <span <?php echo $action; ?> class="glyphicon glyphicon-trash action_icon " value="<?php echo $details['id']; ?>" onclick="delete_accommodation(this)"></span></a>
                                                            
                                    </td> 
                                </tr>
                                <?php
                                $i++;
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div> 
		</div>
    </div>
    </div>
    </div>
</div>
<!--Modal for bulk upload -->
<div class="modal fade bulk_vendor_upload" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content" id="bulk_vendor_upload_data">
		</div>
	</div>
</div>

<div class="modal fade edit_accommodation" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content" id="edit_accommodation_data">
		</div>
	</div>
</div>

<script>
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

    var checkin = $('#start_datepick').datepicker({
      onRender: function(date) {
        return date.valueOf() < now.valueOf() ? 'disabled' : '';
      }
    }).on('changeDate', function(ev) {
      if (ev.date.valueOf() > checkout.date.valueOf()) {
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        checkout.setValue(newDate);
      }
      checkin.hide();
      $('#expected_datepick')[0].focus();
    }).data('datepicker');
    var checkout = $('#expected_datepick').datepicker({
      onRender: function(date) {
        return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
      }
    }).on('changeDate', function(ev) {
      checkout.hide();
    }).data('datepicker');
</script>
<?php 
	$this->load->view('includes/footer');
?>