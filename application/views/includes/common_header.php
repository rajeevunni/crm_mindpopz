<!-- top navigation -->
<div class="top_nav">
 <div class="nav_menu">
   <nav>
     <div class="nav toggle">
       <a id="menu_toggle" onclick="hidetheside()" ><i class="fa fa-bars"></i></a>
     </div>
     <ul class="nav navbar-nav navbar-right">
       <li class="">
         <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
           	<?php
	            if($propic=='')
	            {
	               $profile_img = base_url().'images/admin/profilepic/default.jpg';		// user/employee uploded profile picture
	            }
	            else
	            {
	               $profile_img = base_url().'images/profile_pic/'.$propic;					// user/employee default picture
	            }
	         ?>
	         <img src="<?php echo $profile_img; ?>" />Hi <?php echo $name; ?>		<!-- user/employee name -->
           <span class=" fa fa-angle-down"></span>
         </a>
         <ul class="dropdown-menu dropdown-usermenu pull-right">
          <li><a href="<?php echo base_url().'index.php/Profile'; ?>"> Profile</a></li>			<!-- user/employee profile -->
          <li><a href="<?php echo base_url().'index.php/Logout' ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
         </ul>
       </li>
     </ul>
   </nav>
 </div>
</div>

<!-- /top navigation -->