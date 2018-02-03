<!DOCTYPE html>
<html lang="en" style="height:100%; margin: 0;">
    <head>

    	<meta charset="utf-8">
    	<!-- Meta, title, CSS, favicons, etc. -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">	
      	<meta name="viewport" content="width=device-width, initial-scale=1">
     	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    	<link media="all" type="text/css" rel="stylesheet" href="<?php echo base_url().'css/style.css';?>">
    	
        <!-- bootstrap-daterangepicker -->
        <link href="<?php echo base_url();?>css/daterangepicker.css" rel="stylesheet">
        <!-- bootstrap-datetimepicker -->
        <link href="<?php echo base_url();?>css/bootstrap-datetimepicker.css" rel="stylesheet">
         <!-- Bootstrap -->
        <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo base_url();?>css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?php echo base_url();?>css/nprogress.css" rel="stylesheet">
        <!-- jQuery custom content scroller -->
        <link href="<?php echo base_url();?>css/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css" rel="stylesheet"/>

        <!-- Custom Theme Style -->
        <link href="<?php echo base_url();?>css/custom.min.css" rel="stylesheet">

        <!-- iCheck -->
        <link href="<?php echo base_url();?>css/icheck-flat/green.css" rel="stylesheet">
        <!-- Datatables -->
        <link href="<?php echo base_url();?>css/datatables/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>css/datatables/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>css/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>css/datatables/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>css/datatables/scroller.bootstrap.min.css" rel="stylesheet">

        <!-- PNotify -->
        <link href="<?php echo base_url();?>css/pnotify/pnotify.css" rel="stylesheet">
        <link href="<?php echo base_url();?>css/pnotify/pnotify.buttons.css" rel="stylesheet">
        <link href="<?php echo base_url();?>css/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
        <!-- Dropzone.css -->
        <link href="<?php echo base_url();?>css/dropzone/dropzone.min.css" rel="stylesheet">
        <!-- Custom Theme Style -->
        
    	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/datatable/jquery.dataTables.min.js"></script>
    	
        <!-- Bootstrap -->
        <script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script type="text/javascript" src="<?php echo base_url();?>js/fastclick.js"></script>
        <!-- NProgress -->
        <script type="text/javascript" src="<?php echo base_url();?>js/nprogress.js"></script>
        <!-- jQuery custom content scroller -->
        <script type="text/javascript" src="<?php echo base_url();?>js/moment.min.js"></script>

        <!-- Dropzone.js -->
        <script type="text/javascript" src="<?php echo base_url();?>js/dropzone/dropzone.min.js"></script>
        
        <!-- Datatables -->
        <script type="text/javascript" src="<?php echo base_url();?>js/daterangepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/bootstrap-datetimepicker.min.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url();?>js/datatable/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/datatable/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/datatable/buttons.flash.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/datatable/dataTables.responsive.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/datatable/responsive.bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/datatable/dataTables.scroller.min.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url();?>js/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery.hotkeys.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/prettify.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery.smartWizard.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/script.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/script_validation.js"></script>

        
        <!-- PNotify -->
        <script type="text/javascript" src="<?php echo base_url();?>js/pnotify/pnotify.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/pnotify/pnotify.buttons.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/pnotify/pnotify.nonblock.js"></script>
        
          
    <?php
        if(isset($success) && $success!='')
        { ?>

        <script>
        jQuery(function ($) { 
            new PNotify({
                      title: '<?php echo $success ?>',
                      type: 'success',
                      styling: 'bootstrap3',
                      delay: 5000
                  });
        });

        </script>
        <?php } ?>
         <?php
        if(isset($error)  && $error!='')
        { ?>

        <script>
        jQuery(function ($) { 
            new PNotify({
                      title: '<?php echo $error ?>',
                      type: 'error',
                      styling: 'bootstrap3',
                      delay: 5000
                  });
        });
        </script>
        <?php } ?>
    <title>CRM - Mindpopz</title>
  </head>