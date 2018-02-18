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
                    &nbsp;Search Accommodation
                </div>
                <div class="panel-body">                                 
                    <div class="">
                        <form action="" id="create_mail_template_form" class="form-horizontal form-label-left" name="" enctype="multipart/form-data" method="get">
                           <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Vendor Name</label>
                                   <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" value="<?php echo $this->input->get('vendor_name'); ?>" placeholder="Enter Vendor Name" class="form-control" name="vendor_name" id="vendor_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label  col-md-4 col-sm-4 col-xs-12">Location</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
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
                                        <!-- <input type="text" value="<?php echo $this->input->get('location'); ?>" placeholder="Enter Location" class="form-control" name="location" id="location"> -->
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Sub Location</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" value="<?php echo $this->input->get('sub_location'); ?>" placeholder="Enter Sub Location" class="form-control" name="sub_location" id="sub_location">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Special Rate Min</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" value="<?php echo $this->input->get('special_rate_min'); ?>" placeholder="Enter Min Rate" class="form-control" name="special_rate_min" id="special_rate">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Start Date</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" value="<?php echo $this->input->get('accomodation_start_date'); ?>" placeholder="Enter Start Date" class="form-control" name="accomodation_start_date" id="guest_start_date">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Type</label>
                                   <div class="col-md-8 col-sm-8 col-xs-12">
                                        <select name="type" id="type" class="form-control">
                                            <option value="">Select Type</option>
                                            <?php
                                            foreach($all_vendor_type as $type)
                                           {
                                            ?>
                                                <option value="<?php echo $type['id'] ?>" <?php if($this->input->get('type') == $type['id']){echo "selected";}?>><?php echo $type['type_name'] ?></option>
                                           <?php 
                                            } ?>
                                        </select>
                                        
                                   </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Category</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <select name="category" id="category" class="form-control">
                                            <option value="">Select Category</option>
                                           <?php
                                            foreach($all_vendor_category as $category)
                                            {
                                           ?>
                                                <option value="<?php echo $category['id'] ?>" <?php if($this->input->get('category') == $category['id']){echo "selected";}?>><?php echo $category['category_name'] ?></option>
                                           <?php 
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Room Type</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" value="<?php echo $this->input->get('room_type'); ?>" placeholder="Enter Room Type" class="form-control" name="room_type" id="room_type">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Special Rate Max</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" value="<?php echo $this->input->get('special_rate_max'); ?>" placeholder="Enter Max Rate" class="form-control" name="special_rate_max" id="special_rate">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">End Date</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" value="<?php echo $this->input->get('accomodation_end_date'); ?>" placeholder="Enter End Date" class="form-control" name="accomodation_end_date" id="guest_end_date">
                                    </div>
                                </div>
                               
                               <div class="form-group pull-right">
                                    <button type="submit" name="filter_accomodation" class="btn btn-success">Search</button>
                                    <input type="submit" class="btn btn-primary" value="Export as Excel" name="download_excel" >
                                </div>
                            </div>  
                        </form>
                    </div>                    
               </div>
            </div>
            <div class="panel panel-warning">
                <div class="panel-heading result_vendor">
                    <i class="fa fa-bars"></i>
                    &nbsp;&nbsp;Accommodation
                </div>
                <div>
                    
                   <div style="float:left;padding-right:15px;padding-top:10px; padding-bottom:10px;">
                        <?php
                        if(isset($_GET['vendor_name']) && $_GET['vendor_name']!='')
                        { ?>   
                           <div class="pull-left" style="margin-right:20px;"> 
                                <div style="background-color:#1ABB9C;color:#ffffff;padding:3px; border-radius:2px;" role="alert">
                                   <?php
                                        echo "Vendor Name";
                                    ?>
                                    <a href="<?php echo base_url().'index.php/Vendor/search_accomodation?vendor_name=&location='.$this->input->get('location').'&sub_location='.$this->input->get('sub_location').'&special_rate='.$this->input->get('special_rate').'&type='.$this->input->get('type').'&category='.$this->input->get('category').'&room_type='.$this->input->get('room_type').'&filter_accomodation==&'; ?>" aria-hidden="true" style="color:#2A3F54;"> &nbsp;&nbsp;x&nbsp;</a>
                                </div>
                            </div>
                            <?php 
                        }  
                        ?>
                    </div>

                    <div style="float:left;padding-right:15px;padding-top:10px; padding-bottom:10px;">
                        <?php
                        if(isset($_GET['location']) && $_GET['location']!='')
                        { ?>   
                            <div class="pull-left" style="margin-right:20px;"> 
                               <div style="background-color:#1ABB9C;color:#ffffff;padding:3px; border-radius:2px;" role="alert">
                                    <?php
                                        echo "Location";
                                    ?>
                                    <a href="<?php echo base_url().'index.php/Vendor/search_accomodation?vendor_name='.$this->input->get('vendor_name').'&location=&sub_location='.$this->input->get('sub_location').'&special_rate='.$this->input->get('special_rate').'&type='.$this->input->get('type').'&category='.$this->input->get('category').'&room_type='.$this->input->get('room_type').'&filter_accomodation==&'; ?>" aria-hidden="true" style="color:#2A3F54;"> &nbsp;&nbsp;x&nbsp;</a>
                                </div>
                            </div>
                            <?php 
                        }  
                        ?>
                    </div>
                    
                    <div style="float:left;padding-right:15px;padding-top:10px; padding-bottom:10px;">
                        <?php
                        if(isset($_GET['sub_location']) && $_GET['sub_location']!='')
                        { ?>   
                            <div class="pull-left" style="margin-right:20px;"> 
                                <div style="background-color:#1ABB9C;color:#ffffff;padding:3px; border-radius:2px;" role="alert">
                                    <?php
                                        echo "Sub Location";
                                    ?>
                                    <a href="<?php echo base_url().'index.php/Vendor/search_accomodation?vendor_name='.$this->input->get('vendor_name').'&location='.$this->input->get('location').'&special_rate='.$this->input->get('special_rate').'&sub_location=&type='.$this->input->get('type').'&category='.$this->input->get('category').'&room_type='.$this->input->get('room_type').'&filter_accomodation==&'; ?>" aria-hidden="true" style="color:#2A3F54;"> &nbsp;&nbsp;x&nbsp;</a>
                                </div>
                            </div>
                            <?php 
                        }  
                        ?>
                    </div>
                    <div style="float:left;padding-right:15px;padding-top:10px; padding-bottom:10px;">
                        <?php
                        if(isset($_GET['special_rate']) && $_GET['special_rate']!='')
                        { ?>   
                            <div class="pull-left" style="margin-right:20px;"> 
                                <div style="background-color:#1ABB9C;color:#ffffff;padding:3px; border-radius:2px;" role="alert">
                                    <?php
                                        echo "Sub Location";
                                    ?>
                                    <a href="<?php echo base_url().'index.php/Vendor/search_accomodation?vendor_name='.$this->input->get('vendor_name').'&location='.$this->input->get('location').'&sub_location='.$this->input->get('sub_location').'&special_rate=&type='.$this->input->get('type').'&category='.$this->input->get('category').'&room_type='.$this->input->get('room_type').'&filter_accomodation==&'; ?>" aria-hidden="true" style="color:#2A3F54;"> &nbsp;&nbsp;x&nbsp;</a>
                                </div>
                            </div>
                            <?php 
                        }  
                        ?>
                    </div>

                    <div style="float:left;padding-right:15px;padding-top:10px; padding-bottom:10px;">
                        <?php
                        if(isset($_GET['type']) && $_GET['type']!='')
                        { ?>   
                            <div class="pull-left" style="margin-right:20px;"> 
                                <div style="background-color:#1ABB9C;color:#ffffff;padding:3px; border-radius:2px;" role="alert">
                                    <?php
                                        echo "Type";
                                    ?>
                                    <a href="<?php echo base_url().'index.php/Vendor/search_accomodation?vendor_name='.$this->input->get('vendor_name').'&location='.$this->input->get('location').'&sub_location='.$this->input->get('sub_location').'&special_rate='.$this->input->get('special_rate').'&type=&category='.$this->input->get('category').'&room_type='.$this->input->get('room_type').'&filter_accomodation==&'; ?>" aria-hidden="true" style="color:#2A3F54;"> &nbsp;&nbsp;x&nbsp;</a>
                                </div>
                           </div>
                            <?php 
                        }  
                        ?>
                    </div>

                    <div style="float:left;padding-right:15px;padding-top:10px; padding-bottom:10px;">
                        <?php
                        if(isset($_GET['category']) && $_GET['category']!='')
                        { ?>   
                            <div class="pull-left" style="margin-right:20px;"> 
                                <div style="background-color:#1ABB9C;color:#ffffff;padding:3px; border-radius:2px;" role="alert">
                                    <?php
                                        echo "Category";
                                    ?>
                                    <a href="<?php echo base_url().'index.php/Vendor/search_accomodation?vendor_name='.$this->input->get('vendor_name').'&location='.$this->input->get('location').'&sub_location='.$this->input->get('sub_location').'&special_rate='.$this->input->get('special_rate').'&type='.$this->input->get('type').'&room_type='.$this->input->get('room_type').'&category=&filter_accomodation==&'; ?>" aria-hidden="true" style="color:#2A3F54;"> &nbsp;&nbsp;x&nbsp;</a>
                                </div>
                            </div>
                            <?php 
                        }  
                        ?>
                    </div>
                    <div style="float:left;padding-right:15px;padding-top:10px; padding-bottom:10px;">
                        <?php
                        if(isset($_GET['room_type']) && $_GET['room_type']!='')
                        { ?>   
                            <div class="pull-left" style="margin-right:20px;"> 
                                <div style="background-color:#1ABB9C;color:#ffffff;padding:3px; border-radius:2px;" role="alert">
                                    <?php
                                        echo "Category";
                                    ?>
                                    <a href="<?php echo base_url().'index.php/Vendor/search_accomodation?vendor_name='.$this->input->get('vendor_name').'&location='.$this->input->get('location').'&sub_location='.$this->input->get('sub_location').'&special_rate='.$this->input->get('special_rate').'&type='.$this->input->get('type').'&category='.$this->input->get('category').'&room_type=&filtefilter_accomodationr_guest==&'; ?>" aria-hidden="true" style="color:#2A3F54;"> &nbsp;&nbsp;x&nbsp;</a>
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
                         <table id="vendor_datatbale2" style="font-size:12px;" class="table table-striped dataTable no-footer" 
                        cellspacing="0" width="100%">
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
                                <th style="font-size:11px;">Vendor Name</th>
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
                                <!--<?php if($this->session->userdata('user_type')==1) 
                                {
                                    ?>
                                    <th style="font-size:11px;">Action</th>
                                    <?php
                                }
                                ?>-->
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                foreach ($filter_accomodation_details as $details) {
                                ?>
                                <tr value="<?php echo $details['id']; ?>">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $details['vendor_name']; ?></td>
                                <td><?php echo date('d-M-Y', strtotime($details['start_date'])); ?></td>
                                <td><?php echo date('d-M-Y', strtotime($details['end_date'])); ?></td>
                                <td><?php echo $details['room_type']; ?></td>
                                <td><?php echo $details['occupents']; ?></td>
                                <td><?php echo $details['food_plan']; ?></td>
                                <td><?php echo $details['rack_rate']; ?></td>
                                <td><?php echo $details['special_rate']; ?></td>
                                <td><?php echo $details['extra_bed']; ?></td>
                                <td><?php echo $details['extra_child']; ?></td>
                                <td><?php echo $details['currency']; ?></td>
                                <td><?php echo $details['ac']; ?></td>
                                <!--<?php if($this->session->userdata('user_type')==1) 
                                {
                                    ?>
                                    <td>
                                        <a href="<?php echo base_url() . 'index.php/Vendor/edit_accommodtion/'.$details['id']; ?>"><span class="glyphicon glyphicon-pencil action_icon edit_guest"></span></a>
                                        <input type="hidden" id="accommodation_id" value="<?php echo $details['id']; ?>">
                                        <a href="<?php echo $action; ?>"> <span  class="glyphicon glyphicon-trash action_icon delete_accommodation"></span></a>                      
                                    </td>
                                    <?php
                                }
                                ?>-->
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