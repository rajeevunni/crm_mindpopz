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
                    &nbsp;Search Guest
                </div>
                <div class="panel-body">                                 
                    <div class="input-group">
                        <input type="text" id="search_guest_enquiry" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                        <button class="btn btn-default">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="panel panel-warning">
                <div class="panel-heading result_vendor">
                    <i class="fa fa-bars"></i>
                    &nbsp;&nbsp; View Guests
                </div>
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
                    <!-- <a href="javascript:void(0);" class="btn btn-primary btn-sm" onclick="$('#our_datatable').tableExport({type:'excel',escape:'false'});">Export as Excel</a> -->
                    <!-- <div id="date_filter" class="pull-left" style="margin-top:-10px;">
                        <label>From: </label> <input type="text" name="datepicker_from" id="datepicker_from"/>
                        <label>To: </label> <input type="text" name="datepicker_to" id="datepicker_to"/>                        -->
                        <!-- <span id="date-label-to" class="date-label">To:<input class="date_range_filter date" type="text" id="datepicker_to" /> -->
                    <!-- </div> -->
                    <div class="btn-group pull-right" <?php echo $action; ?>>
                        <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" style=" font-size: 12px;" type="button" aria-expanded="false">BULK UPLOAD <span class="caret"></span>
                        </button>
                        <ul role="menu" class="dropdown-menu" style="margin-left: 10px;">
                            <li>
                                <a href="<?php echo base_url().'index.php/Guest/get_download_sheet' ?>" name="download_excel_sheet_private" id="download_excel_sheet_private" class="excel_sheet" > Create Excel Sheet </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" name="upload_excel_sheet" id="upload_excel_sheet" class="excel_sheet" data-toggle="modal"  data-target=".bulk_upload_file" onclick="upload_employee_reg_details()"> Upload Excel Sheet </a>
                            </li>
                        </ul>
                    </div>  
                </div>
                <br>            
                <hr>
                <table id="our_datatable" class="table table-striped dt-responsive nowrap table-hover"
                        cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th class="our_datatable_id">ID</td>
                            <th>Enquiry Date</th>
                            <th>Enquiry Ref.</th>
                            <th>Guest Id</th>
                            <th>Guest Name</th>
                            <th>CRM</th>
                            <th>Reference</th>
                            <th>Status</th>
                            <?php 
                            if($this->session->userdata('user_type')==1)
                            {
                                ?>
                                <th>Action</th> 
                                <?php
                            }
                            ?>                       
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($all_guest_details as $details) {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td class="our_datatable_id"><?php echo $details['id']?></td>
                            <td><?php echo date('d-M-Y', strtotime($details['enquiry_date'])); ?></td>
                            <td><?php echo $details['guest_enquiry_ref']; ?></td>
                            <td><?php echo $details['guest_details_ref']; ?></td>
                            <td><?php echo $details['guest_name']; ?></td>
                            <td><?php echo $details['crm_name'];?></td>
                            <td><?php echo $details['enquiry_reference'];?></td>
                            <td><?php echo $details['enquiry_status'];?></td>
                            <?php 
                            if($this->session->userdata('user_type')==1)
                            {
                                ?>
                                <td>
                                    <input type="hidden" id="guest_id" value="<?php echo $details['id']; ?>">
                                    <span <?php echo $action; ?> class="glyphicon glyphicon-trash action_icon delete_guest" value="<?php echo $details['id']; ?>" onclick="delete_enquiry(this)"></span>                           
                                </td>     
                                <?php
                            }
                            ?>                      
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
<!--Modal for bulk upload -->
<div class="modal fade bulk_upload_file" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content" id="bulk_upload_data">

		</div>
	</div>
</div>
<?php 
	$this->load->view('includes/footer');
?>