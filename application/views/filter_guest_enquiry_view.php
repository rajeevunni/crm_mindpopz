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
                    &nbsp;Search Guest Enquiry
                </div>
                <div class="panel-body">                                 
                    <div class="">
                        <form action="" id="create_mail_template_form" class="form-horizontal form-label-left" name="" enctype="multipart/form-data" method="get">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Guest Id</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="<?php echo $this->input->get('guest_id'); ?>" placeholder="Enter Guest id" class="form-control" name="guest_id" id="guest_id">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label  col-md-3 col-sm-3 col-xs-12">Guest Name</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="<?php echo $this->input->get('guest_name'); ?>" placeholder="Enter Guest Name" class="form-control" name="guest_name" id="guest_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Enquiry Date</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="<?php echo $this->input->get('enquiry_dates'); ?>" placeholder="Enter Enquiry Date" class="form-control" name="enquiry_dates" id="enquiry_date">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Enquiry Ref.No.</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="<?php echo $this->input->get('enquiry_reference_no'); ?>" placeholder="Enter Enquery Reference No."
                                        class="form-control" name="enquiry_reference_no" id="enquiry_reference_no">
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Start Date</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="<?php echo $this->input->get('guest_start_date'); ?>" placeholder="Enter Start Date" class="form-control" name="guest_start_date" id="guest_start_date">
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Start Date</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="<?php echo $this->input->get('start_date'); ?>" readonly placeholder="Select Start Date" class="form-control" name="start_date" id="startdate">
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">CRM</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select name="crm_user" id="crm_user" class="form-control">
                                   <option value="">Select Status</option>
                                            <?php
                                            foreach($getall_crm as $type)
                                           {
                                            ?>
                                                <option value="<?php echo $type['id']; ?>" <?php if($this->input->get('crm_user') == $type['id']){echo "selected";}?>><?php echo $type['f_name'].' '.$type['l_name']; ?></option>
                                           <?php 
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Enquiry Status</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        
                                        <select name="enquiry_status" id="enquiry_status" class="form-control">
                                   <option value="">Select Status</option>
                                            <?php
                                            foreach($getall_enquiry_status as $type)
                                           {
                                            ?>
                                                <option value="<?php echo $type['enquiry_status'] ?>" <?php if($this->input->get('enquiry_status') == $type['enquiry_status']){echo "selected";}?>><?php echo $type['enquiry_status'] ?></option>
                                           <?php 
                                            } ?>
                                   </select>  
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Reference</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                       <select name="reference" id="reference" class="form-control">
                                   <option value="">Select Reference</option>
                                            <?php
                                            foreach($getall_references as $type)
                                           {
                                            ?>
                                                <option value="<?php echo $type['reference_name'] ?>" <?php if($this->input->get('reference') == $type['reference_name']){echo "selected";}?>><?php echo $type['reference_name'] ?></option>
                                           <?php 
                                            } ?>
                                   </select>  
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Callback Date</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="<?php echo $this->input->get('callback_dates'); ?>" placeholder="Enter callback date" class="form-control" name="callback_dates" id="callback_date">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">End Date</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="<?php echo $this->input->get('guest_end_date'); ?>" placeholder="Enter end date" class="form-control" name="guest_end_date" id="guest_end_date">
                                    </div>
                                </div>
                            </div> 
                            <div class="form-group pull-right">
                                <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-0">
                                    <input type="submit" class="btn btn-primary" value="Export as Excel" name="download_excel" >
                                    <button type="submit" name="filter_guest" class="btn btn-success">Search</button>
                                </div>
                            </div> 
                        </form>
                    </div>                    
                </div>
            </div>
            <div class="panel panel-warning">
                <div class="panel-heading result_vendor">
                    <i class="fa fa-bars"></i>
                    &nbsp;Guest Enquiries
                </div>
                <div>
                    
                    <div style="float:left;padding-right:15px;padding-top:10px; padding-bottom:10px;">
                        <?php
                        if(isset($_GET['guest_id']) && $_GET['guest_id']!='')
                        { ?>   
                            <div class="pull-left" style="margin-right:20px;"> 
                                <div style="background-color:#1ABB9C;color:#ffffff;padding:3px; border-radius:2px;" role="alert">
                                    <?php
                                        echo "Guest Id";
                                    ?>
                                    <a href="<?php echo base_url().'index.php/Guest/filter_guest_enquiry?guest_id=&guest_name='.$this->input->get('guest_name').'&enquiry_dates='.$this->input->get('enquiry_dates').'&enquiry_reference_no='.$this->input->get('enquiry_reference_no').'&crm_user='.$this->input->get('crm_user').'&enquiry_status='.$this->input->get('enquiry_status').'&reference='.$this->input->get('reference').'&callback_dates='.$this->input->get('callback_dates').'&filter_guest==&'; ?>" aria-hidden="true" style="color:#2A3F54;"> &nbsp;&nbsp;x&nbsp;</a>
                                </div>
                            </div>
                            <?php 
                        }  
                        ?>
                    </div>

                    <div style="float:left;padding-right:15px;padding-top:10px; padding-bottom:10px;">
                        <?php
                        if(isset($_GET['guest_name']) && $_GET['guest_name']!='')
                        { ?>   
                            <div class="pull-left" style="margin-right:20px;"> 
                                <div style="background-color:#1ABB9C;color:#ffffff;padding:3px; border-radius:2px;" role="alert">
                                    <?php
                                        echo "Guest Name";
                                    ?>
                                    <a href="<?php echo base_url().'index.php/Guest/filter_guest_enquiry?guest_id='.$this->input->get('guest_id').'&guest_name=&enquiry_dates='.$this->input->get('enquiry_dates').'&enquiry_reference_no='.$this->input->get('enquiry_reference_no').'&crm_user='.$this->input->get('crm_user').'&enquiry_status='.$this->input->get('enquiry_status').'&reference='.$this->input->get('reference').'&callback_dates='.$this->input->get('callback_dates').'&filter_guest==&'; ?>" aria-hidden="true" style="color:#2A3F54;"> &nbsp;&nbsp;x&nbsp;</a>
                                </div>
                            </div>
                            <?php 
                        }  
                        ?>
                    </div>
                    
                    <div style="float:left;padding-right:15px;padding-top:10px; padding-bottom:10px;">
                        <?php
                        if(isset($_GET['enquiry_dates']) && $_GET['enquiry_dates']!='')
                        { ?>   
                            <div class="pull-left" style="margin-right:20px;"> 
                                <div style="background-color:#1ABB9C;color:#ffffff;padding:3px; border-radius:2px;" role="alert">
                                    <?php
                                        echo "Enquiry Date";
                                    ?>
                                    <a href="<?php echo base_url().'index.php/Guest/filter_guest_enquiry?guest_id='.$this->input->get('guest_id').'&guest_name='.$this->input->get('guest_name').'&enquiry_dates=&enquiry_reference_no='.$this->input->get('enquiry_reference_no').'&crm_user='.$this->input->get('crm_user').'&enquiry_status='.$this->input->get('enquiry_status').'&reference='.$this->input->get('reference').'&callback_dates='.$this->input->get('callback_dates').'&filter_guest==&'; ?>" aria-hidden="true" style="color:#2A3F54;"> &nbsp;&nbsp;x&nbsp;</a>
                                </div>
                            </div>
                            <?php 
                        }  
                        ?>
                    </div>

                    <div style="float:left;padding-right:15px;padding-top:10px; padding-bottom:10px;">
                        <?php
                        if(isset($_GET['enquiry_reference_no']) && $_GET['enquiry_reference_no']!='')
                        { ?>   
                            <div class="pull-left" style="margin-right:20px;"> 
                                <div style="background-color:#1ABB9C;color:#ffffff;padding:3px; border-radius:2px;" role="alert">
                                    <?php
                                        echo "Enquiry Reference Number";
                                    ?>
                                    <a href="<?php echo base_url().'index.php/Guest/filter_guest_enquiry?guest_id='.$this->input->get('guest_id').'&guest_name='.$this->input->get('guest_name').'&enquiry_dates='.$this->input->get('enquiry_dates').'&enquiry_reference_no=&crm_user='.$this->input->get('crm_user').'&enquiry_status='.$this->input->get('enquiry_status').'&reference='.$this->input->get('reference').'&callback_dates='.$this->input->get('callback_dates').'&filter_guest==&'; ?>" aria-hidden="true" style="color:#2A3F54;"> &nbsp;&nbsp;x&nbsp;</a>
                                </div>
                            </div>
                            <?php 
                        }  
                        ?>
                    </div>

                    <div style="float:left;padding-right:15px;padding-top:10px; padding-bottom:10px;">
                        <?php
                        if(isset($_GET['crm_user']) && $_GET['crm_user']!='')
                        { ?>   
                            <div class="pull-left" style="margin-right:20px;"> 
                                <div style="background-color:#1ABB9C;color:#ffffff;padding:3px; border-radius:2px;" role="alert">
                                    <?php
                                        echo "CRM";
                                    ?>
                                    <a href="<?php echo base_url().'index.php/Guest/filter_guest_enquiry?guest_id='.$this->input->get('guest_id').'&guest_name='.$this->input->get('guest_name').'&enquiry_dates='.$this->input->get('enquiry_dates').'&enquiry_reference_no='.$this->input->get('enquiry_reference_no').'&crm_user=&enquiry_status='.$this->input->get('enquiry_status').'&reference='.$this->input->get('reference').'&callback_dates='.$this->input->get('callback_dates').'&filter_guest==&'; ?>" aria-hidden="true" style="color:#2A3F54;"> &nbsp;&nbsp;x&nbsp;</a>
                                </div>
                            </div>
                            <?php 
                        }  
                        ?>
                    </div>

                    <div style="float:left;padding-right:15px;padding-top:10px;  padding-bottom:10px;">
                        <?php
                        if(isset($_GET['enquiry_status']) && $_GET['enquiry_status']!='')
                        { ?>   
                            <div class="pull-left" style="margin-right:20px;"> 
                                <div style="background-color:#1ABB9C;color:#ffffff;padding:3px; border-radius:2px;" role="alert">
                                    <?php
                                        echo "Enquiry Status";
                                    ?>
                                    <a href="<?php echo base_url().'index.php/Guest/filter_guest_enquiry?guest_id='.$this->input->get('guest_id').'&guest_name='.$this->input->get('guest_name').'&enquiry_dates='.$this->input->get('enquiry_dates').'&enquiry_reference_no='.$this->input->get('enquiry_reference_no').'&crm_user='.$this->input->get('crm_user').'&enquiry_status=&reference='.$this->input->get('reference').'&callback_dates='.$this->input->get('callback_dates').'&filter_guest==&'; ?>" aria-hidden="true" style="color:#2A3F54;"> &nbsp;&nbsp;x&nbsp;</a>
                                </div>
                            </div>
                            <?php 
                        }  
                        ?>
                    </div>

                    <div style="float:left;padding-right:15px;padding-top:10px;  padding-bottom:10px;">
                        <?php
                        if(isset($_GET['reference']) && $_GET['reference']!='')
                        { ?>   
                            <div class="pull-left" style="margin-right:20px;"> 
                                <div style="background-color:#1ABB9C;color:#ffffff;padding:3px; border-radius:2px;" role="alert">
                                    <?php
                                        echo "Reference";
                                    ?>
                                    <a href="<?php echo base_url().'index.php/Guest/filter_guest_enquiry?guest_id='.$this->input->get('guest_id').'&guest_name='.$this->input->get('guest_name').'&enquiry_dates='.$this->input->get('enquiry_dates').'&enquiry_reference_no='.$this->input->get('enquiry_reference_no').'&crm_user='.$this->input->get('crm_user').'&enquiry_status='.$this->input->get('enquiry_status').'&reference=&callback_dates='.$this->input->get('callback_dates').'&filter_guest==&'; ?>" aria-hidden="true" style="color:#2A3F54;"> &nbsp;&nbsp;x&nbsp;</a>
                                </div>
                            </div>
                            <?php 
                        }  
                        ?>
                    </div>
                    
                    <div style="float:left;padding-right:15px;padding-top:10px; padding-bottom:10px;">
                        <?php
                        if(isset($_GET['callback_dates']) && $_GET['callback_dates']!='')
                        { ?>   
                            <div class="pull-left" style="margin-right:20px;"> 
                                <div style="background-color:#1ABB9C;color:#ffffff;padding:3px; border-radius:2px;" role="alert">
                                    <?php
                                        echo "Callback Date";
                                    ?>
                                    <a href="<?php echo base_url().'index.php/Guest/filter_guest_enquiry?guest_id='.$this->input->get('guest_id').'&guest_name='.$this->input->get('guest_name').'&enquiry_dates='.$this->input->get('enquiry_dates').'&enquiry_reference_no='.$this->input->get('enquiry_reference_no').'&crm_user='.$this->input->get('crm_user').'&enquiry_status='.$this->input->get('enquiry_status').'&reference='.$this->input->get('reference').'&callback_dates=&filter_guest==&'; ?>" aria-hidden="true" style="color:#2A3F54;"> &nbsp;&nbsp;x&nbsp;</a>
                                </div>
                            </div>
                            <?php 
                        }  
                        ?>
                    </div>
                    
                </div>              
                <div class="panel-body">   
                
                    <div class="">
                        <?php 
                        if($this->session->userdata('user_type')!=1)
                        {
                            $action = 'style="display:none"';
                        }
                        else{
                            $action = 'style="display:block"';
                        }
                        ?>
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
                                            <span <?php echo $action; ?> class="glyphicon glyphicon-trash action_icon delete_enquiry"  value="<?php echo $details['id']; ?>" onclick="delete_enquiry(this)"></span>                           
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
</div>  
<?php 
	$this->load->view('includes/footer');
?>