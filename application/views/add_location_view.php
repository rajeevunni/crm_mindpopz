<?php 
  $this->load->view('includes/head');
?>
<div class="right_col" role="main" style="min-height: 600px;">  
    <br/><br/><br/>
    <div class="clearfix"></div>
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12" style="height:400px; ">
            <div class="panel panel-warning">
                <div class="panel-heading search_guest" id="location">
                    <i class="fa fa-bars"></i>
                    &nbsp;Add Location
                </div>
                <div class="panel-body">
                    <form action="" id="add_crm" class="form-horizontal form-label-left" name="" enctype="multipart/form-data" method="post">           
                        <div class="x_content">
                            <div class="col-md-7 col-sm-7 col-xs-12 form-group">
                                <label class="control-label col-md-4 col-sm-4col-xs-12">Location*</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="" class="form-control" name="location" id="location" placeholder="Enter Location">
                                    <div id="error_f_name" class="val__msgbx"></div>
                                </div>
                            </div>
                            
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-0">
                                    <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                                    <button type="submit" class="btn btn-success" id="add_location" name="add_location" onclick="return add_crm_validation()">Save</button>
                                </div>
                            </div>
                        </div> 
                    </form> 
                    <hr>
                    <div style="height:200px;overflow: scroll;">
                        <table id="location" class="table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Location</th>
                                    <th>Action</th>                        
                                </tr>
                            </thead>
                            <?php 
                             if($this->session->userdata('user_type')!=1)
                                {
                                    $action = 'style="display:none"';
                                }
                             else
                                {
                                    $action = 'style="display:block"';
                                }
                            ?>
                            <tbody>
                                <?php
                                    $i = 1;
                                    foreach ($location_details as $details) {
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo ucwords($details['location']); ?></td>
                                    <td>
                                        <a data-toggle="modal" id="<?php echo $details['id']; ?>" onclick="locationeditpopup(this.id)" data-target=".edit_employee"><span class="glyphicon glyphicon-pencil action_icon edit_guest"></span></a>
                                        <input type="hidden" name="location_id" id="location_id" value="<?php echo $details['id']; ?>">
                                        <span <?php echo $action; ?> class="glyphicon glyphicon-trash action_icon" value="<?php echo $details['id']; ?>" onclick="delete_location(this)" ></span>                           
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

        <div class="col-md-6  col-sm-6 col-xs-12" style="height:400px;">
            <div class="panel panel-warning">
                <div class="panel-heading search_guest" id="type">
                    <i class="fa fa-bars"></i>
                    &nbsp;Vendor Type
                </div>
                <div class="panel-body">
                    <form action="" id="add_vendor" class="form-horizontal form-label-left" name="" enctype="multipart/form-data" method="post">           
                        <div class="x_content">
                            <!-- <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <div class="col-md-7 col-sm-7 col-xs-12 form-group">
                                    <label class="control-label col-md-5 col-sm-5 col-xs-12">Vendor Type*</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                        <input type="text" value="" class="form-control" name="vendor_type" id="vendor_type" placeholder="Vendor Type">
                                        <div id="error_f_name" class="val__msgbx"></div>
                                    </div>
                                </div>
                                
                                <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-0">
                                        <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                                        <button type="submit" class="btn btn-success" id="add_vendor_type" name="add_vendor_type" onclick="return add_crm_validation()">Save</button>
                                    </div>
                                </div>
                            <!-- </div> -->    
                        </div> 
                    </form> 
                    <hr>
                    <div style="height:200px;overflow: scroll;">
                        <table id="vendor_type" class="table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Vendor Type</th>
                                    <th>Action</th>                        
                                </tr>
                            </thead>
                            <?php 
                             if($this->session->userdata('user_type')!=1)
                                {
                                    $action = 'style="display:none"';
                                }
                             else
                                {
                                    $action = 'style="display:block"';
                                }
                            ?>

                            <tbody>
                                <?php
                                    $i = 1;
                                    foreach ($vendor_type_details as $details) {
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo ucwords($details['type_name']); ?></td>
                                    
                                    
                                    <td>
                                        <a data-toggle="modal" id="<?php echo $details['id']; ?>" onclick="vendortypepopup(this.id)" data-target=".edit_vendor_type"><span class="glyphicon glyphicon-pencil action_icon edit_guest"></span></a>
                                        <input type="hidden" id="guest_id" value="<?php echo $details['id']; ?>">
                                        <span <?php echo $action; ?> class="glyphicon glyphicon-trash action_icon delete_vendor_type" value="<?php echo $details['id']; ?>" onclick="delete_vendor_type(this)"  ></span>                           
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
        <div class="col-md-6  col-sm-6 col-xs-12" style="height:400px;">
            <div class="panel panel-warning">
                <div class="panel-heading search_guest" id="vehicle">
                    <i class="fa fa-bars"></i>
                    &nbsp;Vehicle Type
                </div>
                <div class="panel-body">
                    <form action="" id="add_vendor" class="form-horizontal form-label-left" name="" enctype="multipart/form-data" method="post">           
                        <div class="x_content">
                            <!-- <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <div class="col-md-7 col-sm-7 col-xs-12 form-group">
                                    <label class="control-label col-md-5 col-sm-5 col-xs-12">Vehicle Type*</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                        <input type="text" value="" class="form-control" name="vehicle_type" id="vehicle_type" placeholder="Vehicle Type">
                                        <div id="error_f_name" class="val__msgbx"></div>
                                    </div>
                                </div>
                                
                                <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-0">
                                        <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                                        <button type="submit" class="btn btn-success" id="add_vehicle_type" name="add_vehicle_type" onclick="return add_crm_validation()">Save</button>
                                    </div>
                                </div>
                            <!-- </div> -->    
                        </div> 
                    </form> 
                    <hr>
                    <div style="height:200px;overflow: scroll;">
                        <table id="vehicle_type" class="table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Vehicle</th>
                                    <th>Action</th>                        
                                </tr>
                            </thead>
                            <?php 
                             if($this->session->userdata('user_type')!=1)
                                {
                                    $action = 'style="display:none"';
                                }
                             else
                                {
                                    $action = 'style="display:block"';
                                }
                            ?>
                            <tbody>
                                <?php
                                    $i = 1;
                                    foreach ($vehicle_type_details as $details) {
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo ucwords($details['vehicle_type']); ?></td>
                                    <td>
                                        <a data-toggle="modal" id="<?php echo $details['id']; ?>" onclick="vehicletypepopup(this.id)" data-target=".edit_vehicle"><span class="glyphicon glyphicon-pencil action_icon edit_guest"></span></a>
                                        <input type="hidden" id="vehicle_type_id" value="<?php echo $details['id']; ?>">
                                        <span <?php echo $action; ?> class="glyphicon glyphicon-trash action_icon" value="<?php echo $details['id']; ?>" onclick="delete_vechile_type(this)"></span>                           
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
        <div class="col-md-6  col-sm-6 col-xs-12" style="height:400px;">
            <div class="panel panel-warning">
                <div class="panel-heading search_guest" id="category">
                    <i class="fa fa-bars"></i>
                    &nbsp;Vendor Category
                </div>
                <div class="panel-body">
                    <form action="" id="add_vendor" class="form-horizontal form-label-left" name="" enctype="multipart/form-data" method="post">           
                        <div class="x_content">
                            <!-- <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <div class="col-md-7 col-sm-7 col-xs-12 form-group">
                                    <label class="control-label col-md-6 col-sm-6 col-xs-12">Vendor Category*</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="" class="form-control" name="vendor_category" id="vendor_category" placeholder=" Vendor category">
                                        <div id="error_f_name" class="val__msgbx"></div>
                                    </div>
                                </div>
                                
                                <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-0">
                                        <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                                        <button type="submit" class="btn btn-success" id="add_vendor_category" name="add_vendor_category" onclick="return add_crm_validation()">Save</button>
                                    </div>
                                </div>
                            <!-- </div> -->    
                        </div> 
                    </form> 
                    <hr>
                    <div style="height:200px;overflow: scroll;">
                        <table id="vendor_category" class="table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Vendor_category</th>
                                    <th>Action</th>                        
                                </tr>
                            </thead>
                            <?php 
                             if($this->session->userdata('user_type')!=1)
                                {
                                    $action = 'style="display:none"';
                                }
                             else
                                {
                                    $action = 'style="display:block"';
                                }
                            ?>

                            <tbody>
                                <?php
                                    $i = 1;
                                    foreach ($all_vendor_category as $details) {
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo ucwords($details['category_name']); ?></td>
                                    
                                    
                                    <td>
                                        <a data-toggle="modal" id="<?php echo $details['id']; ?>" onclick="categorypopup(this.id)" data-target=".edit_vendor_category"><span class="glyphicon glyphicon-pencil action_icon edit_guest"></span></a>
                                        <input type="hidden" id="guest_id" value="<?php echo $details['id']; ?>">
                                        <span <?php echo $action; ?> class="glyphicon glyphicon-trash action_icon " value="<?php echo $details['id']; ?>" onclick="delete_category_type(this)"></span>                           
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

        <div class="col-md-6  col-sm-6 col-xs-12" style="height:400px;">
            <div class="panel panel-warning">
                <div class="panel-heading search_guest" id="reference" >
                    <i class="fa fa-bars"></i>
                    &nbsp;Add Reference
                </div>
                <div class="panel-body">
                    <form action="" id="add_vendor" class="form-horizontal form-label-left" name="" enctype="multipart/form-data" method="post">           
                        <div class="x_content">
                            <!-- <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <div class="col-md-7 col-sm-7 col-xs-12 form-group">
                                    <label class="control-label col-md-6 col-sm-6 col-xs-12">Reference</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="" class="form-control" name="reference" id="reference" placeholder=" Reference">
                                        <div id="error_f_name" class="val__msgbx"></div>
                                    </div>
                                </div>
                                
                                <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-0">
                                        <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                                        <button type="submit" class="btn btn-success" id="add_reference" name="add_reference" onclick="return add_crm_validation()">Save</button>
                                    </div>
                                </div>
                            <!-- </div> -->    
                        </div> 
                    </form> 
                    <hr>
                    <div style="height:200px;overflow: scroll;">
                        <table id="reference" class="table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Reference</th>
                                    <th>Action</th>                        
                                </tr>
                            </thead>
                            <?php 
                             if($this->session->userdata('user_type')!=1)
                                {
                                    $action = 'style="display:none"';
                                }
                             else
                                {
                                    $action = 'style="display:block"';
                                }
                            ?>

                            <tbody>
                                <?php
                                    $i = 1;
                                    foreach ($reference_details as $details) {
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo ucwords($details['reference_name']); ?></td>
                                    
                                    
                                    <td>
                                        <a data-toggle="modal" id="<?php echo $details['id']; ?>" onclick="referenceeditpopup(this.id)" data-target=".reference"><span class="glyphicon glyphicon-pencil action_icon edit_guest"></span></a>
                                        <input type="hidden" id="guest_id" value="<?php echo $details['id']; ?>">
                                        <span <?php echo $action; ?> class="glyphicon glyphicon-trash action_icon " value="<?php echo $details['id']; ?>" onclick="delete_reference(this)"></span>                           
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
        <div class="col-md-6  col-sm-6 col-xs-12" style="height:400px;">
            <div class="panel panel-warning">
                <div class="panel-heading search_guest" id="status" >
                    <i class="fa fa-bars"></i>
                    &nbsp;Add Enquiry Status
                </div>
                <div class="panel-body">
                    <form action="" id="add_vendor" class="form-horizontal form-label-left" name="" enctype="multipart/form-data" method="post">           
                        <div class="x_content">
                            <!-- <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <div class="col-md-7 col-sm-7 col-xs-12 form-group">
                                    <label class="control-label col-md-6 col-sm-6 col-xs-12">Enquiry Status</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="" class="form-control" name="enquiry_status" id="enquiry_status" placeholder=" Enquiry Status">
                                        <div id="error_f_name" class="val__msgbx"></div>
                                    </div>
                                </div>
                                
                                <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-0">
                                        <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                                        <button type="submit" class="btn btn-success" id="add_status" name="add_status" onclick="return add_crm_validation()">Save</button>
                                    </div>
                                </div>
                            <!-- </div> -->    
                        </div> 
                    </form> 
                    <hr>
                    <div style="height:200px;overflow: scroll;">
                        <table id="status" class="table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Status</th>
                                    <th>Action</th>                        
                                </tr>
                            </thead>
                            <?php 
                             if($this->session->userdata('user_type')!=1)
                                {
                                    $action = 'style="display:none"';
                                }
                             else
                                {
                                    $action = 'style="display:block"';
                                }
                            ?>

                            <tbody>
                                <?php
                                    $i = 1;
                                    foreach ($enquiry_status as $details) {
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo ucwords($details['enquiry_status']); ?></td>
                                    
                                    
                                    <td>
                                        <a data-toggle="modal" id="<?php echo $details['id']; ?>" onclick="enquiry_status_edit_popup(this.id)" data-target=".enquiry_status"><span class="glyphicon glyphicon-pencil action_icon edit_guest"></span></a>
                                        <input type="hidden" id="guest_id" value="<?php echo $details['id']; ?>">
                                        <span <?php echo $action; ?> class="glyphicon glyphicon-trash action_icon " value="<?php echo $details['id']; ?>" onclick="delete_enquiry_status(this)"></span>                           
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

        <div class="col-md-6  col-sm-6 col-xs-12" style="height:400px;">
            <div class="panel panel-warning">
                <div class="panel-heading search_guest" id="roomtype" >
                    <i class="fa fa-bars"></i>
                    &nbsp;Add Room Type
                </div>
                <div class="panel-body">
                    <form action="" id="add_roomtype" class="form-horizontal form-label-left" name="" enctype="multipart/form-data" method="post">
                        <div class="x_content">
                            <!-- <div class="col-md-6 col-sm-6 col-xs-12"> -->
                            <div class="col-md-7 col-sm-7 col-xs-12 form-group">
                                <label class="control-label col-md-6 col-sm-6 col-xs-12">Room Type</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="" class="form-control" name="room_type" id="room_type" placeholder="Room Type">
                                    <div id="error_f_name" class="val__msgbx"></div>
                                </div>
                            </div>

                            <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-0">
                                    <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                                    <button type="submit" class="btn btn-success" id="add_room_type" name="add_room_type" onclick="return add_crm_validation()">Save</button>
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                    </form>
                    <hr>
                    <div style="height:200px;overflow: scroll;">
                        <table id="status" class="table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>Room type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <?php
                            if($this->session->userdata('user_type')!=1)
                            {
                                $action = 'style="display:none"';
                            }
                            else
                            {
                                $action = 'style="display:block"';
                            }
                            ?>

                            <tbody>
                            <?php
                            $i = 1;
                            foreach ($roomtypes as $details) {
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo ucwords($details['type']); ?></td>


                                    <td>
                                        <a data-toggle="modal" id="<?php echo $details['id']; ?>" onclick="room_type_edit_popup(this.id)" data-target=".roomtype"><span class="glyphicon glyphicon-pencil action_icon edit_guest"></span></a>
                                        <input type="hidden" id="guest_id" value="<?php echo $details['id']; ?>">
                                        <span <?php echo $action; ?> class="glyphicon glyphicon-trash action_icon " value="<?php echo $details['id']; ?>" onclick="delete_room_type(this)"></span>
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
</div>

<!--Modal for edit crm-->
<div class="modal fade edit_employee" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content" id="edit_employee_data">

		</div>
	</div>
</div>
<!--Modal for edit crm-->
<div class="modal fade edit_vendor_type" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content" id="edit_vendor_data">

		</div>
	</div>
</div>

<!--Modal for edit crm-->
<div class="modal fade edit_vehicle" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content" id="edit_vehicle_data">

		</div>
	</div>
</div>
<!--Modal for edit crm-->
<div class="modal fade edit_vendor_category" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content" id="edit_category_data">

		</div>
	</div>
</div>
<div class="modal fade reference" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content" id="edit_reference_data">

		</div>
	</div>
</div>
<div class="modal fade enquiry_status" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content" id="edit_status_data">

		</div>
	</div>
</div>

<div class="modal fade roomtype" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content" id="edit_roomtype_data">

        </div>
    </div>
</div>

<!--<script>
$(document).ready(function(){
    $('#add_crm').DataTable();}
    
);

</script>-->

<?php 
	$this->load->view('includes/footer');
?>