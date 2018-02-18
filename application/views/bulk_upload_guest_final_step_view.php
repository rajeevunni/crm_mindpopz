<?php
$this->load->view('includes/head');
?>
<div class="right_col" role="main" style="min-height: 600px;">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <label style="font-size: 18px"> Bulk Upload Guest - Final Step </label>
                <!-- <input type="button" name="" class="add_button" onclick="categoryaddpopup()" value="Add">  -->
                <div class="clearfix"></div>
            </div>
            <!-- <div class="val__log_msgbx" style="color: #005DA8;">
                <?php echo $error; ?>
                <?php echo $success; ?>
            </div> -->
            <?php
            if (sizeof($temp_guest_details) > 0)
            {
            ?>
            <form class="" method="post" id="bulkupload_employee_registration" name="bulkupload_employee_registration" action="<?php echo base_url() . 'index.php/Guest/create_guest_bulkupload' ?>">
              <div class="x_content">
                <script>
                $(document).ready(function(){
                  $('#bulkupload').dataTable( {
                      "pageLength": 100
                  } );
                } );
                </script>
                <table id="bulkupload" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable-fixed-header_info">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Enquiry Date</th>
                      <th>Guest Details Ref</th>
                      <th>Guest Enquiry Ref</th>
                      <th>Guest Name</th>
                      <th>Guest Mobile</th>
                      <th>Guest Email</th>
                      <th>Guest City</th>
                      <th>Enquiry Reference</th>
                      <th>Enquiry Ext Ref No</th>
                      <th>Enquiry CRM</th>
                      <th>Enquiry Remarks</th>
                      <th>Enquiry Status</th>
                      <th>Booking Date</th>
                      <th>Booking Amount</th>
                      <th>Call Back Date</th>
                      <th>Call Back Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    foreach ($temp_guest_details as $employee) 
                    {
                      ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td>
                          <input type="text" name="employee[<?= $i ?>][enquiry_date]" id="enquiry_date" class="check_fields_name" value="<?php echo $employee['enquiry_date']; ?>">
                        </td>
                        <td>
                          <input type="text" name="employee[<?= $i ?>][guest_details_ref]" id="guest_details_ref" class="" value="<?php echo $employee['guest_details_ref']; ?>">
                        </td>
                        <td>
                          <input type="text" name="employee[<?= $i ?>][guest_enquiry_ref]" id="guest_enquiry_ref" class="check_fields_name" value="<?php echo $employee['guest_enquiry_ref']; ?>">
                        </td>
                        <td>
                          <input type="text" name="employee[<?= $i ?>][guest_name]" id="guest_name" class="check_fields_name" value="<?php echo $employee['guest_name']; ?>">
                         
                        </td>
                        <td>
                          <input type="text" name="employee[<?= $i ?>][guest_mobile]" class="check_fields_name check_fields_phone" id="primary_contact_no" value="<?php echo $employee['guest_mobile']; ?>">
                        </td>
                        <td>
                          <input type="text" data-ival="<?= $i ?>" data-name="employee_email" name="employee[<?= $i ?>][guest_email]" class="check_fields_name check_fields_email" id="guest_email" value="<?php echo $employee['guest_email']; ?>">
                          <div id="email_valid_msg-<?= $i ?>" style="color:red; font-weight:200;" ></div>
                        </td>
                        <td>
                          <input type="text" name="employee[<?= $i ?>][guest_city]" id="guest_city" class="" value="<?php echo $employee['guest_city']; ?>">
                        </td>
                        <td>
                          <input type="text" name="employee[<?= $i ?>][enquiry_reference]" id="enquiry_reference" class="" value="<?php echo $employee['enquiry_reference']; ?>">
                        </td>
                        <td>
                          <input type="text" name="employee[<?= $i ?>][enquiry_ext_rfn_no]" id="enquiry_ext_rfn_no" class="" value="<?php echo $employee['enquiry_ext_rfn_no']; ?>">
                        </td>
                        <td>
                          <input type="text" name="employee[<?= $i ?>][enquiry_crm]" id="enquiry_crm" class="" value="<?php echo $employee['enquiry_crm']; ?>">
                        </td>
                        <td>
                          <input type="text" name="employee[<?= $i ?>][enquiry_remarks]" id="enquiry_remarks" class="" value="<?php echo $employee['enquiry_remarks']; ?>">
                        </td>
                        <td>
                          <input type="text" name="employee[<?= $i ?>][enquiry_status]" id="enquiry_status" class="check_fields_name " value="<?php echo $employee['enquiry_status']; ?>">
                        </td>
                        <td>
                          <input type="text" name="employee[<?= $i ?>][booking_date]" id="enquiry_extbooking_date_rfn_no" class="" value="<?php echo $employee['booking_date']; ?>">
                        </td>
                        <td>
                          <input type="text" name="employee[<?= $i ?>][booking_amount]" id="booking_amount" class="" value="<?php echo $employee['booking_amount']; ?>">
                        </td>
                        <td>
                          <input type="text" name="employee[<?= $i ?>][call_back_date]" id="call_back_date" class="" value="<?php echo $employee['call_back_date']; ?>">
                        </td>
                        <td>
                          <input type="text" name="employee[<?= $i ?>][call_back_time]" id="call_back_time" class="" value="<?php echo $employee['call_back_time']; ?>">
                        </td>
                      </tr>
                      <?php
                      $i++;
                      }
                      ?>
                    </tbody>
                </table>
                <?php
                }
                else {
                  echo '<div style="margin-left:50px;color:#005DA8;float: left;">Data Not Found </div>';
                }
                ?>
            </div>  
              <input type="hidden" name="bulk_upload">           
              <button class="btn btn-primary" type="reset">Reset</button>
              <button type="submit" name="bulk_upload" id="bulk_upload" class="btn btn-success bulk_upload_data">Final Submit</button>
          </form>
        </div>
    </div>
</div>
<?php
  $this->load->view('includes/footer');
?>
