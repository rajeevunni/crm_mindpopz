<div class="col-md-3 left_col menu_fixed">
  <div class="left_col scroll-view">
    <!-- <div class="navbar nav_title" style="border: 0;">
    
    </div> -->
    <div class="clearfix"></div>
    <div style="background-color:#ededed;" id="logo">
      <img style="background-color:#ededed;margin-left:25px;" src="<?php echo base_url().'images/logo.png'; ?>">
    </div>
    <div style="background-color:#ededed;" id="logo-icon">
    </div>
    <!-- menu profile quick info -->
    <div class="profile clearfix">
      	<div class="profile_pic">
       	<?php
          if($propic=='')
          {
             $profile_img = base_url().'images/admin/profilepic/default.jpg';
          }
          else
          {
             $profile_img = base_url().'images/profile_pic/'.$propic;
          }
       ?>
       <img src="<?php echo $profile_img; ?>" class="img-circle profile_img" />
      </div>
      <div class="profile_info"> 
        <!-- <span>Welcome,</span>  -->
        <h2><?php echo $name; ?></h2>
        <?php
        if($this->session->userdata('user_type')==1)
        {
        ?>      
           <span><?php echo "Super Admin"; ?></span>
       <?php
       }
       if($this->session->userdata('user_type')==2)
       {
         ?>
          <span><?php echo "CRM / Employee"; ?></span>
         <?php
       }
       ?>
      </div>
    </div>
    <!-- /menu profile quick info -->
    <br />
    <?php 
      if($this->session->userdata('user_type')==2)
      {
        $display = "style=display:none";
      }
      else
      {
        $display = "";
      }
    ?>
    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <ul class="nav side-menu">
        <li><a href="<?php echo base_url().'index.php/Dashboard'; ?>"><i class="fa fa-dashboard (alias)"></i> Dashboard </a>
        <li><a><i class="fa fa-edit"></i> Guest Management <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="<?php echo base_url().'index.php/Guest' ?>">Add Guest Enquiry</a></li> 
            <li><a href="<?php echo base_url().'index.php/Guest/search_guest_enquiry' ?>">View Guest Enquiry </a></li> 
            <li><a href="<?php echo base_url().'index.php/Guest/filter_guest_enquiry' ?>">Advanced Search Enquiry</a></li>
            <!-- <li><a href="#">Send SMS <span class="label label-success pull-right">Coming Soon</span></a></li> -->
          </ul>
        </li>
        <li><a><i class="fa fa-hdd-o"></i> Vendor Management <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu"> 
            <li><a href="<?php echo base_url().'index.php/Vendor' ?>">Add Vendor</a></li>
            <li><a href="<?php echo base_url().'index.php/Vendor/search_vendor' ?>">Search Vendors</a></li>
            <li><a href="<?php echo base_url().'index.php/Vendor/search_accomodation' ?>">Search Accomodations</a></li>
            <!-- <li><a href="#">View Accomodations</a></li> -->
          </ul>
        </li>
        <li <?php echo $display; ?>><a><i class="fa fa-cog"></i> General Settings <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="<?php echo base_url().'index.php/Vendor/add_crm' ?>">Add CRM</a></li>
            <li><a href="<?php echo base_url().'index.php/Vendor/add_location' ?>">Add Details</a></li>
            
          </ul>
        </li>
        </ul>
      </div>
    </div>
    <!-- <div class="sidebar-footer hidden-small">
    <img style="margin-left:25px;" src="<?php echo base_url().'images/logo.png'; ?>">
    </div> -->
  </div>
</div>

