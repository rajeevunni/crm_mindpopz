<?php 
  $this->load->view('includes/head');
?>
<div class="right_col" role="main" style="min-height: 600px;">
   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_title">
              <h2>User Profile</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                  <div class="profile_img">
                     <div id="crop-avatar">
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
      			         <img src="<?php echo $profile_img; ?>" class="img-responsive avatar-view" />
                     </div>
                  </div>
                  <h3><?php echo $name; ?></h3>
                  <ul class="list-unstyled user_data">
                    <!-- <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $profile_array['']; ?>
                     </li> -->
                     <li>
                        <i class="fa fa-briefcase user-profile-icon"></i> 
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
                     </li>
                     <li class="m-top-xs">
                        <i class="fa fa-external-link user-profile-icon"></i>
                        <a href="#" target="_blank"><?php echo $profile_array['email']; ?></a>
                     </li>
                  </ul>
                  <!--<a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>-->
                  <br />
               </div>
               <div class="col-md-9 col-sm-9 col-xs-12">
                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                     <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Basic Details</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Password Change</a>
                        </li>
                     </ul>
            			<div class="val__log_msgbx" style="color: #005DA8;">
            				<?php echo $error; ?>
            				<?php echo $success; ?>
            			</div>
                     <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                      <!-- start recent activity -->
                               <div class="x_panel">
            				  <div class="x_content">
            					<br />
            					<form action="" enctype="multipart/form-data" method="post" name="profile_edit_validation" id="profile_edit_validation" data-parsley-validate class="form-horizontal form-label-left">

            					  <div class="form-group">
            						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
            						</label>
            						<div class="col-md-6 col-sm-6 col-xs-12">
            							<input type="text" class="form-control has-feedback-left" value="<?php echo $profile_array['f_name']; ?>" name="f_name" id="f_name" placeholder="First Name">
            							<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            							<div id="error_f_name" class="val__msgbx"></div>
            						</div>
            					  </div>
            					  <div class="form-group">
            						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="middle-name-name">Middle Name / Initial
            						</label>
            						<div class="col-md-6 col-sm-6 col-xs-12">
            						  <input type="text" class="form-control has-feedback-left" value="<?php echo $profile_array['m_name']; ?>" name="m_name" id="m_name" placeholder="Middle Name Name">
            							<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            							<div id="error_m_name" class="val__msgbx"></div>
            						</div>
            					  </div>
            					  <div class="form-group">
            						<label for="last-name" class="control-label col-md-3 col-sm-3 col-xs-12">Last Name <span class="required">*</span></label>
            						<div class="col-md-6 col-sm-6 col-xs-12">
            						  <input type="text" class="form-control has-feedback-left" value="<?php echo $profile_array['l_name']; ?>" name="l_name" id="l_name" placeholder="Last Name">
            							<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            							<div id="error_l_name" class="val__msgbx"></div>
            						</div>
            					  </div>
            					  <div class="form-group">
            						<label for="last-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</label>
            						<div class="col-md-6 col-sm-6 col-xs-12">
            							<input type="text" class="form-control has-feedback-left" readonly="readonly" value="<?php echo $profile_array['email']; ?>" name="email" id="email" placeholder="Email">
            							<span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
            						</div>
            					  </div>
            					  <div class="form-group">
            						<label class="control-label col-md-3 col-sm-3 col-xs-12">Phone <span class="required">*</span>
            						</label>	
            						<div class="col-md-6 col-sm-6 col-xs-12">
            							<?php	
            							if($this->session->userdata('user_type') == 4)
            							{
            							?>
            								<input type="text" class="form-control has-feedback-left" value="<?php echo $profile_array['concat_number']; ?>" name="primary_contact_no" id="primary_contact_no" placeholder="Phone">
            								<span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
            								<div id="error_primary_contact_no" class="val__msgbx"></div>
            							<?php
            							}
            							else
            							{
            							?>
            								<input type="text" class="form-control has-feedback-left" value="<?php echo $profile_array['primary_contact_no']; ?>" class="input" name="primary_contact_no" id="primary_contact_no" placeholder="Phone">
            								<span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
            								<div id="error_primary_contact_no" class="val__msgbx"></div>
            							<?php
            							}
            							?>
            						</div>
            					  </div>
            					  <div class="form-group">
            						<label class="control-label col-md-3 col-sm-3 col-xs-12">Profile Picture Upload
            						</label>
            						<div class="col-md-6 col-sm-6 col-xs-12">
            							<input type="file" class="" onchange="ValidateSingleInputprofilepic(this);" name="profile_pic" id="profile_pic">
            							<!-- <span class="fa fa-upload form-control-feedback left" aria-hidden="true"></span> -->
            							<div id="error_profile_pic" class="val__msgbx"></div>
            						</div>
            					  </div>
            					  <div class="ln_solid"></div>
            					  <div class="form-group">
            						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            						  <button class="btn btn-primary" type="reset">Reset</button>
            						  <button type="submit" name="editprofile_employee" id="editprofile_employee" onclick="return employee_profile_edit_validation()" class="btn btn-success">Submit</button>
            						</div>
            					  </div>
            					</form>
            				  </div>
            				</div>
                        </div>
                     <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        <div class="x_panel">
            				   <div class="x_content">
            					   <br />
               					<form action="" id="profile_edit_password_validation" enctype="multipart/form-data" method="post" data-parsley-validate class="form-horizontal form-label-left">
               					   <div class="form-group">
                  						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password <span class="required">*</span>
                  						</label>
                  						<div class="col-md-6 col-sm-6 col-xs-12">
                  							<input type="password" class="form-control has-feedback-left" name="n_password" id="n_password" placeholder="Password" autocomplete='off'>
                  							<span class="fa fa-ellipsis-h form-control-feedback left" aria-hidden="true"></span>
                  							<div id="error_n_password" class="val__msgbx"></div>
                  						</div>
               					   </div>
               					   <div class="form-group">
                  						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="middle-name-name">Re Password <span class="required">*</span>
                  						</label>
                  						<div class="col-md-6 col-sm-6 col-xs-12">
                  						  <input type="password" class="form-control has-feedback-left" name="re_password" id="re_password" placeholder="Re-Password" autocomplete='off'>
                  							<span class="fa fa-ellipsis-h form-control-feedback left" aria-hidden="true"></span>
                  							<div id="error_re_password" class="val__msgbx"></div>
                  						</div>
               					   </div>
               					   <div class="ln_solid"></div>
               					   <div class="form-group">
                  						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  						   <button class="btn btn-primary" type="reset">Reset</button>
                  						   <button type="submit" name="changepassword" id="changepassword"  onclick="return employee_profile_edit_password_validation()" class="btn btn-success">Submit</button>
                  						</div>
               					   </div>
               					</form>
            				  </div>
            				</div>
                     </div>
                  </div>
                </div>
              </div>
            </div>
         </div>
      </div>
   </div>
</div>
		
<?php 
   $this->load->view('includes/footer');
?>