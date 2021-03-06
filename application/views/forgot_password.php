<?php 
  $this->load->view('includes/head_home');
?>
   <body class="bg1" style="height:70%; margin: 0;">
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="col-md-6 col-sm-6 col-xs-12 login_wrapper" style="left:50px; max-width: 450px;top: -35px;">
            <div class="x_panel">
               <section class="login_content">
                  <div class="x_content">
                     <img style="margin-left:25px;" src="<?php echo base_url().'images/logo.png'; ?>">
                     <form action="" method="post" name="password_retrieve" id="password_retrieve">
                        <h1>Forgot Password</h1>
                        <div class="val__log_msgbx" style="text-align: center; color: #E74C3C;margin-bottom: 15px;">
                           <?php echo $error; ?>
                           <?php echo $success; ?>
                        </div>
                        <div>
                           <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="" />
                           <div id="error_ls_username" class="val__msgbx" style="margin-right: 300px;margin-top: 0px;"></div>
                        </div>
                        <div class="col-md-offset-0 col-xs-offset-0 col-sm-offset-0" >
                           <button class="btn btn-success submit" type="submit" name="forgetpassword" id="forgetpassword" class="btn btn-success login_btn_style" value="Forget Password" >Retrieve</button>
                        </div>
                     </form>
                  </div>
                  <div class="clearfix"></div>
               </section>
            </div>
         </div>
         <div class="col-md-6 col-sm-6 col-xs-12" style="position: relative; margin: 12% auto 0;float:right;color:#fff;font-size:40px;text-align:right;line-height: 60px;">
            <b>"A true traveler</b> enjoys each and <br/>
            every moment of <b>his travel."</b>
         </div>
      </div>
   </body>
</html>