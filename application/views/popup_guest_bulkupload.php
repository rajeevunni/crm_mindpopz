<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Bulk Guest Upload</h4>
</div>
<form class="form-horizontal form-label-left" method="post" id="bulkupload_emp" name="bulkupload_emp"
      action="<?php echo base_url() . 'index.php/Guest/guest_bulkupload' ?>" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Upload File </label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <input class="form-control" value="" type="file" name="file_upload" id="file_upload"
                       onchange="ValidateBulkuploadInput(this);">
                <div id="error_file_upload" class="val__msgbx"></div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="reset">Reset</button>
        <input type="submit" name="bulk_upload" id="bulk_upload_emp" class="btn btn-success" onclick="return bulk_upload_individual_emp_validation()" value="Upload"/>
    </div>
</form>
