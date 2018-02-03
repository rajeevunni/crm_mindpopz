<?php 
  $this->load->view('includes/head');
?>
<div class="right_col" role="main" style="min-height: 600px;">
	<div class=''>
    	<div class="page-title">
        <div class="title_left" >
            <h3>Edit Accommodaton</h3>
        </div>
   	 </div>   
    	<br/><br/><br/>
    	<div class="clearfix"></div>
		<div class="row">
		<div class="col-md-12 col-xs-12">
            <div class="panel panel-warning">
                <div class="panel-heading addinfo_vendor">
                    <i class="fa fa-edit"></i>
                    &nbsp;&nbsp;Accomodation
                </div>
				<div class="">
                    <form action="" id="add_accomodation" style="margin-top:20px;margin-bottom:20px;" class="form-horizontal form-label-left" name="" enctype="multipart/form-data" method="post">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Start Date</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="<?php echo date('m/d/Y', strtotime($filled_data['start_date'])); ?>" readonly placeholder="Select Start Date" class="form-control" name="start_date" id="start_datepick">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Occupents</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="<?php echo $filled_data['occupents']; ?>" class="form-control" name="occupents" id="occupents" placeholder="Enter Occupents">
                                    <!-- <span class="fa fa-at form-control-feedback left" aria-hidden="true"></span> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Special Rate</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="<?php echo $filled_data['special_rate']; ?>" class="form-control" name="special_rate" id="special_rate" placeholder="Special Rate">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Comm. %</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="<?php echo $filled_data['comm']; ?>" class="form-control" name="comm" id="comm" placeholder="Comm. %">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Fridge</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <select class="form-control" name="fridge" id="fridge">
                                        <option value="">Select Fridge Status</option>
                                        <option value="Yes" <?php if($filled_data['fridge'] == 'Yes'){echo "selected";}?>>Yes</option>
                                        <option value="No" <?php if($filled_data['fridge'] == 'No'){echo "selected";}?>>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">End Date</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text"  value="<?php echo date('m/d/Y', strtotime($filled_data['end_date'])); ?>" readonly placeholder="Select End Date" class="form-control" name="end_date" id="expected_datepick">
                                    <!-- <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Food Plan</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <select class="form-control" name="food_plan" id="food_plan">
                                        <option value="">Select Food Plan</option>
                                        <option value="MAP" <?php if($filled_data['food_plan'] == 'MAP'){echo "selected";}?>>MAP</option>
                                        <option value="CP" <?php if($filled_data['food_plan'] == 'CP'){echo "selected";}?>>CP</option>
                                        <option value="AP" <?php if($filled_data['food_plan'] == 'AP'){echo "selected";}?>>AP</option>
                                        <option value="EP" <?php if($filled_data['food_plan'] == 'EP'){echo "selected";}?>>EP</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Extra Bed</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="<?php echo $filled_data['extra_bed']; ?>" placeholder="Enter Extra Bed" class="form-control" name="extra_bed" id="extra_bed" placeholder="Enter Extra Bed">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Currency</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <select class="form-control" name="currency" id="currency">
                                        <option value="">Select Currency</option>
                                        <option value="INR" <?php if($filled_data['currency'] == 'INR'){echo "selected";}?>>INR</option>
                                        <!-- <option value="No">No</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">TV</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <select class="form-control" name="tv" id="tv">
                                        <option value="">Select TV Status</option>
                                        <option value="Yes" <?php if($filled_data['tv'] == 'Yes'){echo "selected";}?>>Yes</option>
                                        <option value="No" <?php if($filled_data['tv'] == 'No'){echo "selected";}?>>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>  
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Room Type</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="<?php echo $filled_data['room_type']; ?>"  class="form-control" name="room_type" id="room_type">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Rack Rate</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="<?php echo $filled_data['rack_rate']; ?>" placeholder="Enter Rack Rate" class="form-control" name="rack_rate" id="rack_rate">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Extra Child</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" value="<?php echo $filled_data['extra_child']; ?>" placeholder="Enter Extra Child" class="form-control" name="extra_child" id="extra_child" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">A/C Status</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <select class="form-control" name="ac" id="ac">
                                        <option value="">Select A/C Status</option>
                                        <option value="Yes" <?php if($filled_data['ac'] == 'Yes'){echo "selected";}?>>Yes</option>
                                        <option value="No" <?php if($filled_data['ac'] == 'No'){echo "selected";}?>>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-6">
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" name="update_accomodation" id="add_accomodation" class="btn btn-success" onclick="">Save</button>
                                </div>
                            </div>
                        </div>
                    </form> 
                     
                </div>
            </div>
		</div>
		
		</div>
	</div>
</div>
<script>
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

    var checkin = $('#start_datepick').datepicker({
      onRender: function(date) {
        return date.valueOf() < now.valueOf() ? 'disabled' : '';
      }
    }).on('changeDate', function(ev) {
      if (ev.date.valueOf() > checkout.date.valueOf()) {
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        checkout.setValue(newDate);
      }
      checkin.hide();
      $('#expected_datepick')[0].focus();
    }).data('datepicker');
    var checkout = $('#expected_datepick').datepicker({
      onRender: function(date) {
        return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
      }
    }).on('changeDate', function(ev) {
      checkout.hide();
    }).data('datepicker');
</script>
<?php 
	$this->load->view('includes/footer');
?>