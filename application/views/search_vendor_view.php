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
                    &nbsp;Search Vendor
                </div>
                <div class="panel-body">                                 
                    <div class="">
                        <form action="" id="create_mail_template_form" class="form-horizontal form-label-left" name="" enctype="multipart/form-data" method="get">
                           <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Vendor Name</label>
                                   <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="<?php echo $this->input->get('vendor_name'); ?>" placeholder="Enter Vendor Name" class="form-control" name="vendor_name" id="vendor_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label  col-md-3 col-sm-3 col-xs-12">Location</label>
                                   <div class="col-md-9 col-sm-9 col-xs-12">
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
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub Location</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="<?php echo $this->input->get('sub_location'); ?>" placeholder="Enter Sub Location" class="form-control" name="sub_location" id="sub_location">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Type</label>
                                   <div class="col-md-9 col-sm-9 col-xs-12">
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
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Category</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
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
                                <div class="form-group pull-right">
                                    <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                                    <!-- <button type="button" class="btn btn-primary"><i class="fa fa-download"></i> Download</button> -->
                                    <button type="submit" name="filter_vendor" class="btn btn-success">Search</button>
                                </div>
                            </div>  
                        </form>
                    </div>                    
               </div>
            </div>
            <div class="panel panel-warning">
                <div class="panel-heading result_vendor">
                    <i class="fa fa-bars"></i>
                    &nbsp;&nbsp;Vendors
                </div>
                <div style="float:left;padding-right:15px;padding-top:10px; padding-bottom:10px;">
                    <?php
                    if(isset($_GET['vendor_name']) && $_GET['vendor_name']!='')
                    { ?>   
                        <div class="pull-left" style="margin-right:20px;"> 
                            <div style="background-color:#1ABB9C;color:#ffffff;padding:3px; border-radius:2px;" role="alert">
                                <?php
                                    echo "Vendor Name";
                                ?>
                                <a href="<?php echo base_url().'index.php/Vendor/search_vendor?vendor_name=&location='.$this->input->get('location').'&sub_location='.$this->input->get('sub_location').'&type='.$this->input->get('type').'&category='.$this->input->get('category').'&filter_vendor==&'; ?>" aria-hidden="true" style="color:#2A3F54;"> &nbsp;&nbsp;x&nbsp;</a>
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
                                <a href="<?php echo base_url().'index.php/Vendor/search_vendor?vendor_name='.$this->input->get('vendor_name').'&location=&sub_location='.$this->input->get('sub_location').'&type='.$this->input->get('type').'&category='.$this->input->get('category').'&filter_vendor==&'; ?>" aria-hidden="true" style="color:#2A3F54;"> &nbsp;&nbsp;x&nbsp;</a>
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
                                <a href="<?php echo base_url().'index.php/Vendor/search_vendor?vendor_name='.$this->input->get('vendor_name').'&location='.$this->input->get('location').'&sub_location=&type='.$this->input->get('type').'&category='.$this->input->get('category').'&filter_vendor==&'; ?>" aria-hidden="true" style="color:#2A3F54;"> &nbsp;&nbsp;x&nbsp;</a>
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
                                <a href="<?php echo base_url().'index.php/Vendor/search_vendor?vendor_name='.$this->input->get('vendor_name').'&location='.$this->input->get('location').'&sub_location='.$this->input->get('sub_location').'&type=&category='.$this->input->get('category').'&filter_vendor==&'; ?>" aria-hidden="true" style="color:#2A3F54;"> &nbsp;&nbsp;x&nbsp;</a>
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
                                <a href="<?php echo base_url().'index.php/Vendor/search_vendor?vendor_name='.$this->input->get('vendor_name').'&location='.$this->input->get('location').'&sub_location='.$this->input->get('sub_location').'&type='.$this->input->get('type').'&category=&filter_guest==&'; ?>" aria-hidden="true" style="color:#2A3F54;"> &nbsp;&nbsp;x&nbsp;</a>
                            </div>
                        </div>
                        <?php 
                    }  
                    ?>
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
                    <table id="vendor_datatbale" class="table table-striped dt-responsive nowrap table-hover" cellspacing="0" width="100%">
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
                                <th>NO</th>
                                <th class="our_datatable_id">ID</td>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Location</th>
                                <th>Sublocation</th>
                                <th>Category</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                            foreach ($filter_vendor_details as $details) {
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td class="our_datatable_id"><?php echo $details['id']?></td>
                                <td><?php echo $details['vendor_name']; ?></td>
                                <td><?php echo $details['type_name']; ?></td>
                                <td><?php echo $details['location_name']; ?></td>
                                <td><?php echo $details['sub_location']; ?></td>
                                <td><?php echo $details['category_name'];?></td>
                                <td>
                                    <!-- <a href="<?php echo base_url() . 'index.php/Vendor/edit_vendor_details/'.$details['id']; ?>"><span class="glyphicon glyphicon-pencil action_icon edit_guest"></span></a> -->
                                    <input type="hidden" id="vendor_id" value="<?php echo $details['id']; ?>">
                                    <span <?php echo $action; ?> class="glyphicon glyphicon-trash action_icon delete_vendor"></span>                           
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

<?php 
	$this->load->view('includes/footer');
?>