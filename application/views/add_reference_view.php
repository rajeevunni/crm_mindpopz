<?php 
  $this->load->view('includes/head');
?>
<div class="right_col" role="main" style="min-height: 600px;">  
    <br/><br/><br/>
    <div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-xs-12">
            <div class="panel panel-warning">
                <div class="panel-heading search_guest">
                    <i class="fa fa-bars"></i>
                    &nbsp;Add Reference Name
                </div>
                <div class="panel-body">
                    <form action="" id="add_reference" class="form-horizontal form-label-left" name="" enctype="multipart/form-data" method="post">           
                        <div class="x_content">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Reference Name*</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="" class="form-control" name="f_name" id="f_name" placeholder="Enter Reference Name">
                                        <div id="error_f_name" class="val__msgbx"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label  col-md-3 col-sm-3 col-xs-12">Email ID*</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="" class="form-control" name="email" id="email" placeholder="Enter Email">
                                        <div id="error_email" class="val__msgbx"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Primary Contact Number*</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="" class="form-control" name="contact_no" id="contact_no" placeholder="Enter Primary Contact Number">
                                        <div id="error_contact_no" class="val__msgbx"></div>                                    
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success" id="add_reference" name="add_reference" onclick="return add_reference_validation()">Save</button>
                                    </div>
                                </div>
                            </div> 
                        </div> 
                    </form>                
                </div>
            </div>
            <div class="panel panel-warning">
                <div class="panel-heading result_vendor">
                    <i class="fa fa-bars"></i>
                    &nbsp;&nbsp; Reference Name List
                </div>
                <div class="panel-body">                                 
                    <div>
                        <table id="reference_view" class="table table-striped dt-responsive nowrap table-hover"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Reference Name</th>
                                    <th>Email ID</th>
                                    <th>Contact Number</th>
                                    <th>Created Date</th>
                                    <th>Status</th>
                                    <th>Action</th>                        
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $i = 1;
                                    foreach ($reference_details as $details) {
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo ucwords($details['reference_name']); ?></td>
                                    <td><?php echo $details['email']; ?></td>
                                    <td><?php echo $details['contact_number']; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($details['created_date']));?></td>
                                    <td><?php echo ($details['status']==0?'Disabled':'Enabled'); ?></td>
                                    <td>
                                        <a data-toggle="modal" id="<?php echo $details['id']; ?>" onclick="referenceeditpopup(this.id)" data-target=".edit_reference"><span class="glyphicon glyphicon-pencil action_icon edit_guest"></span></a>
                                        <input type="hidden" id="guest_id" value="<?php echo $details['id']; ?>">
                                        <!-- <span class="glyphicon glyphicon-trash action_icon delete_guest"></span>                            -->
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
<!--Modal for edit crm-->
<div class="modal fade edit_reference" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content" id="edit_reference_data">

		</div>
	</div>
</div>
<?php 
	$this->load->view('includes/footer');
?>