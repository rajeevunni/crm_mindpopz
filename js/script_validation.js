function add_vendor_validation() {
    if (formsubmit('', 'vendor_details', 
            [
                ['required', 'vendor_name', 'location', 'type', 'category', 'resort_contact', 'primary_email', 'reservation_contact', 'reservation_email', 'website',
                 'resort_phone' , 'reservation_phone'], 
                ['email', 'primary_email'], ['email', 'reservation_email'], ['telno', 'resort_phone'], ['telno', 'reservation_phone']
            ], '')
        ) 
        {
        return true;
        }
        else {
            return false;
        }
}
function add_guest_enquiry_validation() {
    if (formsubmit('', 'add_guest', [['required', 'guest_name', 'guest_email', 'guest_mobile','state','guest_country','enquiry_status','enquiry_reference'], ['email', 'guest_email'], ['telno', 'guest_mobile']], '')) {

        return true;
    }

    else {
        var email =  $('#guest_email').val();
        var pathstring = String(window.location);
        var patharray = pathstring.split("/");
        var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];
        var url = path + "/Guest/check_email";
        $.post(url, {email: email}, function (data) {
            if (data == 1) 
            {
                $('#error_guest_email').html("Email Already Exists");
                $('#add_guest_enquiry').attr("disabled", "disabled");
            }
            else 
            {
                $('#error_guest_email').html("");
                $('#add_guest_enquiry').removeAttr("disabled");
                return true;
            }
        });
        var mobile = $('#guest_mobile').val();
        var url = path + "/Guest/check_mobile";
        $.post(url, {mobile: mobile}, function (data) {
            if (data == 1) 
            {
                $('#error_guest_mobile').html("Mobile Number Already Exists");
                $('#add_guest_enquiry').attr("disabled", "disabled");
            }
            else 
            {
                $('#error_guest_mobile').html("");
                $('#add_guest_enquiry').removeAttr("disabled");
                return true;
            }
        });
        return false;
    }
}
function add_crm_validation() {
    
    if (formsubmit('', 'add_crm', [['required', 'f_name', 'l_name', 'email', 'contact_no1'], ['email', 'email'], ['telno', 'contact_no1']], '')) {

        return true;
    }

    else {
        return false;
    }
}
    
function add_reference_validation() {
    
    if (formsubmit('', 'add_reference', [['required', 'f_name', 'email', 'contact_no'], ['email', 'email'], ['telno', 'contact_no']], '')) {

        return true;
    }

    else {
        return false;
    }
}

function bulk_upload_individual_emp_validation() {
    if (formsubmit('', 'bulkupload_emp', [['required', 'file_upload', 'category']], '')) {

        return true;
    }
    else {
        return false;
    }
}