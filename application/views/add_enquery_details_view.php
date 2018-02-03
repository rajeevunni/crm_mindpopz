<?php 
  $this->load->view('includes/head');
?>
<div class="right_col" role="main" style="min-height: 600px;">
	<div class=''>
    	<!-- <div class="page-title">
        <div class="title_left" >
            <h3>Add Vendors</h3>
        </div> -->
   	 </div>   
    	<br/><br/><br/>
    	<div class="clearfix"></div>
		<div class="row">
		<div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title" >
					<label style="font-size: 18px"> <i class="fa fa-bars"></i> &nbsp; Search Enquiries </label>
					<div class="val__log_msgbx" style="color: #005DA8;">
						<?php echo $error; ?>
						<?php echo $success; ?>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
                    <form action="" id="create_mail_template_form" class="form-horizontal form-label-left" name="" enctype="multipart/form-data" method="post">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Guest Id</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="" placeholder="Enter Guest id" class="form-control" name="guest_id" id="guest_id">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label  col-md-3 col-sm-3 col-xs-12">Guest Name</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="" placeholder="Enter Guest Name" class="form-control" name="guest_name" id="guest_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Enquiry Date</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="" placeholder="Enter Enquiry Date" class="form-control" name="enquiry_date" id="enquiry_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Enquiry Ref.No.</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="" placeholder="Enter Enquery Reference No."
                                    class="form-control" name="enquiry_reference_no" id="enquiry_reference_no">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">CRM</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="" placeholder="Enter CRM User" class="form-control" name="crm_user" id="crm_user">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Enquiry Status</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="form-control" name="enquiry_status" id="enquiry_status">
                                        <option value="">Enquiry Status</option>
                                        <option value="1">A</option>
                                        <option value="2">B</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Reference</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="form-control" name="reference" id="reference">
                                        <option value="">Reference</option>
                                        <option value="1">A</option>
                                        <option value="2">B</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Callback Date</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="" class="form-control" name="callback_date" id="callback_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-10commit">
                                    <!-- <button type="button" class="btn btn-primary"><i class="fa fa-download"></i> Download</button> -->
                                    <button type="submit" class="btn btn-success">Search</button>
                                </div>
                            </div>
                        </div>  
                    </form>
				</div>
			</div>
			
		</div>
		
		</div>
	</div>
</div>

<?php 
	$this->load->view('includes/footer');
?>