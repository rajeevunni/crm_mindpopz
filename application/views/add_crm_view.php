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
                    &nbsp;Add CRM
                </div>
                <div class="panel-body">
                    <form action="" id="add_crm" class="form-horizontal form-label-left" name="" enctype="multipart/form-data" method="post">           
                        <div class="x_content">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">First Name*</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="" class="form-control" name="f_name" id="f_name" placeholder="Enter First Name">
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
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Secondary Contact Number</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="" class="form-control" name="contact_no2" id="contact_no2" placeholder="Enter Secondary Contact Number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Last Name*</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="" class="form-control" name="l_name" id="l_name" placeholder="Enter Last Name">
                                        <div id="error_l_name" class="val__msgbx"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Primary Contact Number</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="" class="form-control" name="contact_no1" id="contact_no1" placeholder="Enter Primary Contact Number">
                                        <div id="error_contact_no1" class="val__msgbx"></div>                                    
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success" id="add_crm" name="add_crm" onclick="return add_crm_validation()">Save</button>
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
                    &nbsp;&nbsp; CRM List
                </div>
                <div class="panel-body">                                 
                    <div>
                        <table id="crm_view" class="table table-striped dt-responsive nowrap table-hover"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>CRM Name</th>
                                    <th>Email</th>
                                    <th>Primary Contact No.</th>
                                    <th>Secondary Contact No.</th>
                                    <th>Created Date</th>
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
                                    foreach ($crm_details as $details) {
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo ucwords($details['f_name'].' '.$details['l_name']); ?></td>
                                    <td><?php echo $details['email']; ?></td>
                                    <td><?php echo $details['primary_contact_no']; ?></td>
                                    <td><?php echo $details['secondary_contact_no']; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($details['created_date']));?></td>
                                    <td><?php echo ($details['status']==0?'Disabled':'Enabled'); ?></td>
                                    <td>
                                        <a data-toggle="modal" id="<?php echo $details['id']; ?>" onclick="crmeditpopup(this.id)" data-target=".edit_employee"><span class="glyphicon glyphicon-pencil action_icon edit_guest"></span></a>
                                        <input type="hidden" id="guest_id" value="<?php echo $details['id']; ?>">
                                        <span <?php echo $action; ?> class="glyphicon glyphicon-trash action_icon delete_crm"></span>                           
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
<div class="modal fade edit_employee" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content" id="edit_employee_data">

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