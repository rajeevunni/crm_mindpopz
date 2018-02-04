jQuery(function ($) {
    var name = /^[a-zA-Z]{3,15}$/i;
    var email = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    var phone = /^[0-9]{10}$/i;

    var path = window.location;

    $('input[name="call_back_date"]').daterangepicker(
        {
            singleDatePicker: !0,
            minDate: moment(),
            singleClasses: "picker_4"
        }
    ); 

    $('input[name="enquiry_dates"]').datepicker(
        {
            singleDatePicker: !0,
            minDate: 0,
            //singleClasses: "picker_4"
        }
    ); 

    $('input[name="callback_dates"]').datepicker(
        {
            singleDatePicker: !0,
            minDate: moment(),
            singleClasses: "picker_4"
        }
    );
    $('input[name="guest_start_date"]').datepicker(
        {
            singleDatePicker: !0,
            cancelLabel: 'Clear',
            minDate: moment(),
            singleClasses: "picker_4"
        }
    );
    $('input[name="guest_end_date"]').datepicker(
        {
            singleDatePicker: !0,
            cancelLabel: 'Clear',
            minDate: moment(),
            singleClasses: "picker_4"
        }
    );
    $('input[name="accomodation_start_date"]').datepicker(
        {
            singleDatePicker: !0,
            cancelLabel: 'Clear',
            minDate: moment(),
            singleClasses: "picker_4"
        }
    );
    $('input[name="accomodation_end_date"]').datepicker(
        {
            singleDatePicker: !0,
            cancelLabel: 'Clear',
            minDate: moment(),
            singleClasses: "picker_4"
        }
    );
    $('.enquiry_date').val();

    /** View tickets data filtering */
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        var datatableResponsive = $('#datatable-responsive');

        var table = datatableResponsive.DataTable({
            "aaSorting":[],
            drawCallback: function () {
                $('.popoverButton').popover({
                    "html": true,
                    trigger: 'manual',
                    placement: 'left',
                    "content": function () {
                        return "<div>Popover content</div>";
                    }
                })
            }
        });       
      

        datatableResponsive.find('tbody').on('mouseenter', 'td', function () {
            var colIdx = table.cell(this).index().column;

            $(table.cells().nodes()).removeClass('highlight');
            $(table.column(colIdx).nodes()).addClass('highlight');
        });

        $('table').on('click', function (e) {
            if ($('.popoverButton').length > 1)
                $('.popoverButton').popover('hide');
            $(e.target).popover('toggle');

        });

        table.on('order.dt', function () {
            var order = table.order();
            var colIdx = order[0][0];
            $(table.cells().nodes()).removeClass('highlight');
            $(table.column(colIdx).nodes()).addClass('highlight');
        });

        datatableResponsive.find('tfoot th').each(function () {
            var title = $(this).text();
            if (title != "ACTION")
                $(this).html('<input style="box-sizing: border-box !important;" type="text" placeholder="' + title + '" />');
            else {
                $(this).html('');
            }
        });

        // Apply the search
        // table.columns().every(function () {
        //     var that = this;
        //     $('input', this.footer()).on('keyup change', function () {
        //         if (that.search() !== this.value) {
        //             that.search(this.value).draw();
        //         }
        //     });
        // });
        // datatableResponsive.find('tfoot').css('display', 'table-header-group')


    });

    $('.popup-background').click(function (event) {
        $('.popup-background').removeClass('popup-widget-overlay');
        $('.popup-popup-content').css({
            'display': 'none'
        });
        $('.popup-more-content').css({
            'display': 'none'
        });
        $('.popup__content').html('');
    });

    $('.required').blur(function () {
        var id = $(this).attr('id');
        fieldcheck(id, ['required']);
    });
    $('.email').blur(function () {
        var id = $(this).attr('id');
        fieldcheck(id, ['required', 'email']);
    });

    $('.required_unique_id').blur(function () {
        var id = $(this).attr('id');
        fieldcheck(id, ['required']);
    });

    $('.required_email_id').blur(function () {
        var id = $(this).attr('id');
        fieldcheck(id, ['required', 'email']);
    });

    $('.required_mobile_no').blur(function () {
        var id = $(this).attr('id');
        fieldcheck(id, ['required', 'telno']);
    });

    $('.username').blur(function () {
        var id = $(this).attr('id');
        fieldcheck(id, ['required', 'username']);
    });
    $('.password').blur(function () {
        var id = $(this).attr('id');
        fieldcheck(id, ['required', 'password']);
    });

    $('.confirm_password').on('keyup', function () {
        var id = $(this).attr('id');
        fieldcheck(id, ['required', 'confirm_password']);
    });


})
;

var pathstring = String(window.location);
var patharray = pathstring.split("/");
var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];

function popupcontent_injection1(data) {
    $("html, body").animate({scrollTop: 0}, 500);
    $('.popup-popup-content').css({
        'background-color': '#fcfcfc',
        'opacity': '1',
        'border': '1px solid #c5c5c5',
        'display': 'block',
        'height': 'auto',
        'left': '40%',
        'position': 'absolute',
        'top': '108px',
        'width': '535px',
        'z-index': '999'
    });
    $('.popup__content').html(data);
    $('.popup-background').addClass('popup-widget-overlay');
    $('.main').css({
        'min-height': '670px'
    });
}

function popupcontent_injection2(data) {
    $("html, body").animate({scrollTop: 0}, 500);
    $('.popup-popup-content').css({
        'background-color': '#fcfcfc',
        'opacity': '1',
        'border': '1px solid #c5c5c5',
        'display': 'block',
        'height': 'auto',
        'left': '23%',
        'position': 'absolute',
        'top': '74px',
        'width': 'auto',
        'z-index': '999'
    });
    $('.popup__content').html(data);
    $('.popup-background').addClass('popup-widget-overlay');
    $('.main').css({
        'min-height': '670px'
    });
}

function popupcontent_injection3(data) {
    $("html, body").animate({scrollTop: 0}, 500);
    $('.popup-popup-content').css({
        'background-color': '#F4F8FB',
        'opacity': '1',
        'border': '0px solid #c5c5c5',
        'display': 'block',
        'height': 'auto',
        'left': '36%',
        'position': 'absolute',
        'top': '120px',
        'width': 'auto',
        'z-index': '999'
    });
    $('.popup__content').html(data);
    $('.popup-background').addClass('popup-widget-overlay');
    $('.main').css({
        'min-height': '670px'
    });
}

function popupcontent_injection(data) {
    $("html, body").animate({scrollTop: 0}, 500);
    $('.popup-popup-content').css({
        'background-color': '#F4F8FB',
        'opacity': '1',
        'border': '0px solid #c5c5c5',
        'display': 'block',
        'height': 'auto',
        'left': '36%',
        'position': 'absolute',
        'top': '127px',
        'width': 'auto',
        'z-index': '999'
    });
    $('.popup__content').html(data);
    $('.popup-background').addClass('popup-widget-overlay');
    $('.main').css({
        'min-height': '670px'
    });
}

function popupcontent_ajax(data) {
    $("html, body").animate({scrollTop: 0}, 500);
    $('.popup__content').html(data);
    $('.popup-background').addClass('popup-widget-overlay');
    $('.main').css({
        'min-height': '670px'
    });
    $('.popup-popup-content').css({
        'background-color': 'transparent',
        'opacity': '0.68',
        'border': 'none',
        'display': 'block',
        'height': 'auto',
        'left': '22%',
        'position': 'absolute',
        'top': '17px',
        'width': 'auto',
        'z-index': '999'
    });
}

function closePopup() {
    $('.popup-background').removeClass('popup-widget-overlay');
    $('.popup-popup-content').css({
        'display': 'none'
    });
    $('.popup-more-content').css({
        'display': 'none'
    });
    $('.popup__content').html('');
    $('.more__content').html('');
}

function closemorePopup() {
    $('.popup-more-content').css({
        'display': 'none'
    });
    $(".popup-popup-content").animate({left: "33%"}, 800);
    $('.more__content').html('');
}


function checkrequired(id) {
    // var fname = document.getElementById("name").value;
    var fname = $('#' + id).val();
    var fname = $('#' + id).val();

    if (fname == "") {
        if (fname == "") {
            $('#' + id).addClass('input__error');
            return true;
        } else {
            $('#' + id).removeClass('input__error');
            return false;
        }
    }
}

function checkemail(id) {
    var nameRegex = /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i;
    // var fname = document.getElementById("name").value;
    var fname = $('#' + id).val();
    var fname = $('#' + id).val();

    if (fname == "") {
        if (fname == "") {
            $('#' + id).addClass('input__error');
            return true;
        } else if (!(nameRegex.test(fname))) {
            $('#' + id).addClass('input__error');
            return true;
        } else {
            $('#' + id).removeClass('input__error');
            return false;
        }
    }
    ;
}

function fieldcheck(element_id, ruleArray) {
    var total = 0;
    var total = ruleArray.length - 1;
    for (i = 0; i < ruleArray.length; i++) {
        if (ruleArray[i] == 'required') {
            if (document.getElementById(element_id).value.trim() != '' && i == total) {
                success_border(element_id);
                document.getElementById('error_' + element_id).innerHTML = '';
            }
            else if (document.getElementById(element_id).value.trim() != '' && i != total) {
                continue;
            }
            else {
                document.getElementById('error_' + element_id).innerHTML = 'Required';
                fail_border(element_id);
                break;
            }
        }
        if (ruleArray[i] == 'email') 
        {
            if (document.getElementById(element_id).value.trim() != '') 
            {
                if (/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i.test(document.getElementById(element_id).value) && i == total) 
                {
                    success_border(element_id);
                    document.getElementById('error_' + element_id).innerHTML = '';
                    var pathstring = String(window.location);
                    var patharray = pathstring.split("/");
                    var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];

                    var field_name = document.getElementById('email').name;
                    var email = document.getElementById('email').value;
                    if (field_name == 'email') 
                    {
                        var url = path + "/index.php/Manage_ticket/check_email_admin";
                    }
                    var url = path + "/index.php/Manage_ticket/check_email_admin";

                    $.post(url, {email: email, field_name: field_name}, function (data) {
                        if (data == 1) 
                        {
                            $('#error_email').html("Email Already Exists");
                            $('#create_user').attr("disabled", "disabled");
                            // $('#edit_user').prop("disabled",true);
                        }
                        else 
                        {
                            $('#error_email').html("");
                            $('#error_c_email').html("");
                            $('#create_user').removeAttr("disabled");
                            // $('#edit_user').prop("disabled",false);
                        }
                    });
                }
                else if (/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i.test(document.getElementById(element_id).value) && i != total) {
                    continue;
                }
                else 
                {
                    document.getElementById('error_' + element_id).innerHTML = 'Enter a valid email';
                    fail_border(element_id);
                    break;
                }
            }
            else {
                back_toclearBorder(element_id);
            }
        }
        if (ruleArray[i] == 'username') {
            if (document.getElementById(element_id).value.trim() != '') {
                if (document.getElementById(element_id).value.length >= 6 && document.getElementById(element_id).value.length < 26) {
                    if (/^[a-zA-Z0-9\_\.]+$/i.test(document.getElementById(element_id).value) && i == total) {
                        success_border(element_id);
                        document.getElementById('error_' + element_id).innerHTML = '';

                        var pathstring = String(window.location);
                        var patharray = pathstring.split("/");
                        var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];

                        var username = document.getElementById(element_id).value;
                        var email = document.getElementById('email').value;
                        var email_name = document.getElementById('email').name;
                        if (email_name == 'e_email') {
                            var url = path + "/index.php/client/user/get_existing_username";
                        }
                        else if (email_name == 'c_email') {
                            var url = path + "/index.php/client_registration/get_existing_username";
                        }
                        else {
                            var url = path + "/index.php/jobseeker_registration/get_existing_username";
                        }

                        $.post(url, {username: username, email: email}, function (data) {
                            if (data == 'existing') {
                                $('#error_username').html("Username Already Exists");
                                $("#user_registration").submit(function (e) {
                                    e.preventDefault();
                                });
                            }
                            else {
                                $('#error_username').html("");
                            }
                        });
                    }
                    else if (/^[a-zA-Z0-9\_\.]+$/i.test(document.getElementById(element_id).value) && i != total) {
                        continue;
                    }
                    else {
                        document.getElementById('error_' + element_id).innerHTML = 'you can use only letters (a-z), numbers, and periods';
                        fail_border(element_id);
                        break;
                    }
                }
                else {
                    document.getElementById('error_' + element_id).innerHTML = 'Please use between 6 and 25 characters.';
                    fail_border(element_id);
                    break;
                }
            }
            else {
                back_toclearBorder(element_id);
            }
        }
        if (ruleArray[i] == 'password') {
            if (document.getElementById(element_id).value.trim() != '') {
                if (document.getElementById(element_id).value.length >= 6 && i == total) {
                    success_border(element_id);
                    document.getElementById('error_' + element_id).innerHTML = '';
                }
                else if (document.getElementById(element_id).value.length >= 6 && i != total) {
                    continue;
                }
                else {
                    document.getElementById('error_' + element_id).innerHTML = 'password must be at least 6 characters long';
                    fail_border(element_id);
                    break;
                }
            }
            else {
                back_toclearBorder(element_id);
            }
        }

        if (ruleArray[i] == 'confirm_password') {
            if (document.getElementById(element_id).value.trim() != '') {
                if ($('#password').val() == $('#confirm_password').val()) {
                    document.getElementById('error_' + element_id).innerHTML = '';
                }
                else {
                    document.getElementById('error_' + element_id).innerHTML = 'Not Matching';
                }
            }
            else {
                back_toclearBorder(element_id);
            }
        }

        if (ruleArray[i] == 'telno') {
            if (document.getElementById(element_id).value.trim() != '') {
                if (/^[0-9]{10}$/i.test(document.getElementById(element_id).value) && i == total) {
                    success_border(element_id);
                    document.getElementById('error_' + element_id).innerHTML = '';
                }
                else if (/^[0-9]{10}$/i.test(document.getElementById(element_id).value) && i != total) {
                    continue;
                }
                else if (/^[0-9]{10}$/i.test(document.getElementById(element_id).value.length >= 6) && (/^[0-9]{10}$/i.test(document.getElementById(element_id).value.length <= 12))) {
                    document.getElementById('error_' + element_id).innerHTML = 'Please use 10 to 12 characters.';
                    fail_border(element_id);
                    break;
                }
                else {
                    document.getElementById('error_' + element_id).innerHTML = 'only numbers';
                    fail_border(element_id);
                    break;
                }
            }
            else {
                back_toclearBorder(element_id);
            }
        }
        if (ruleArray[i] == 'alpha') {
            if (document.getElementById(element_id).value.trim() != '') {
                if (/^[a-zA-Z]+$/i.test(document.getElementById(element_id).value) && i == total) {
                    success_border(element_id);
                }
                else if (/^[a-zA-Z]+$/i.test(document.getElementById(element_id).value) && i != total) {
                    continue;
                }
                else {
                    document.getElementById('error_' + element_id).innerHTML = 'only alphabets';
                    fail_border(element_id);
                    break;
                }
            }
            else {
                back_toclearBorder(element_id);
            }
        }
        if (ruleArray[i] == 'dropdown') {
            if (document.getElementById(element_id).value != 0 && i == total) {
                success_border(element_id);
            }
            else if (document.getElementById(element_id).value != 0 && i != total) {
                continue;
            }
            else {
                document.getElementById('error_' + element_id).innerHTML = 'select';
                fail_border(element_id);
                break;
            }
        }
        if (ruleArray[i] == 'none') {
            back_toclearBorder(element_id);
        }
    }
}

/*Entire Form Validation*/

function formsubmit(NowBlock, formName, reqFieldArr, nextAction) {
    var curForm = new formObj(NowBlock, formName, reqFieldArr, nextAction);
    if (curForm.valid) {
        return true;
    }

    else {
        return false;
        curForm.paint();
        curForm.listen();
    }
}

function formObj(NowBlock, formName, reqFieldArr, nextAction) {

    var filledCount = 0;
    var fieldArr = new Array();
    var k = 0;
    this.formNM = formName;

    /*if(document.forms[this.formNM].elements['submit_tp'].value == '1ax')
    {
        this.nextaction = nextAction;
        this.now = NowBlock;
    }*/

    for (i = 0; i < reqFieldArr.length; i++) {
        if (reqFieldArr[i][0] == 'required') {
            for (j = reqFieldArr[i].length - 1; j >= 1; j--) {
                fieldArr[k] = new fieldObj(this.formNM, reqFieldArr[i][j], 'required');
                if (fieldArr[k].filled == true) {
                    filledCount++;
                }
                k++;
            }
        }
        if (reqFieldArr[i][0] == 'email') {
            for (j = reqFieldArr[i].length - 1; j >= 1; j--) {
                fieldArr[k] = new fieldObj(this.formNM, reqFieldArr[i][j], 'email');
                if (fieldArr[k].filled == true) {
                    filledCount++;
                }
                k++;
            }
        }
        if (reqFieldArr[i][0] == 'username') {
            for (j = reqFieldArr[i].length - 1; j >= 1; j--) {
                fieldArr[k] = new fieldObj(this.formNM, reqFieldArr[i][j], 'username');
                if (fieldArr[k].filled == true) {
                    filledCount++;
                }
                k++;
            }
        }
        if (reqFieldArr[i][0] == 'password') {
            for (j = reqFieldArr[i].length - 1; j >= 1; j--) {
                fieldArr[k] = new fieldObj(this.formNM, reqFieldArr[i][j], 'password');
                if (fieldArr[k].filled == true) {
                    filledCount++;
                }
                k++;
            }
        }
        if (reqFieldArr[i][0] == 'telno') {
            for (j = reqFieldArr[i].length - 1; j >= 1; j--) {
                fieldArr[k] = new fieldObj(this.formNM, reqFieldArr[i][j], 'telno');
                if (fieldArr[k].filled == true) {
                    filledCount++;
                }
                k++;
            }
        }
        if (reqFieldArr[i][0] == 'alpha') {
            for (j = reqFieldArr[i].length - 1; j >= 1; j--) {
                fieldArr[k] = new fieldObj(this.formNM, reqFieldArr[i][j], 'alpha');
                if (fieldArr[k].filled == true) {
                    filledCount++;
                }
                k++;
            }
        }
        if (reqFieldArr[i][0] == 'equal') {
            for (j = reqFieldArr[i].length - 1; j >= 1; j--) {
                fieldArr[k] = new fieldObj(this.formNM, reqFieldArr[i][j], 'equal');
                if (fieldArr[k].filled == true) {
                    filledCount++;
                }
                k++;
            }
        }
        if (reqFieldArr[i][0] == 'notequal') {
            for (j = reqFieldArr[i].length - 1; j >= 1; j--) {
                fieldArr[k] = new fieldObj(this.formNM, reqFieldArr[i][j], 'notequal');
                if (fieldArr[k].filled == true) {
                    filledCount++;
                }
                k++;
            }
        }
    }
    if (filledCount == fieldArr.length) {
        this.valid = true;
    }
    else {
        this.valid = false;
    }


    this.paint = function () {
        for (i = fieldArr.length - 1; i >= 0; i--) {
            if (fieldArr[i].filled == false)
                fieldArr[i].paintInRed();
            else
                fieldArr[i].unPaintInRed();
        }
    }
    this.listen = function () {
        for (i = fieldArr.length - 1; i >= 0; i--) {
            fieldArr[i].fieldListen();
        }
    }
}

formObj.prototype.send = function () {
    if (document.forms[this.formNM].elements['submit_tp'].value == '1ax') {
        var to = document.forms[this.formNM].elements['submit_action'].value;
        var tofunction = document.forms[this.formNM].elements['submit_fn'].value;
        var now = this.now;
        var next = this.nextaction;

        var str = $('#' + this.formNM).serialize();

        var url = path + "index.php/" + to + "/" + tofunction;
        $.post(url, {fieldval: str}, function (data) {
            if (data == 'next') {
                if (next != 'none') {
                    document.getElementById(now).style.display = "none";
                    document.getElementById(next).style.display = "block";
                    return true;
                }
            }
            else {
                //document.getElementById('set_notset').value = 'notset';
            }
        });
    }

    if (document.getElementById('submit_tp').value == '') {
        document.forms[this.formNM].submit();
        return true;
    }
};

function fieldObj(formName, fName, typeOchk) {

    if (typeOchk != 'equal' && typeOchk != 'notequal') {
        var curField = document.forms[formName].elements[fName];
    }
    this.filled = getValueBool(typeOchk);

    this.paintInRed = function () {
        //document.getElementById('error_'+fName).innerHTML = 'required';
        //curField.addClassName('red');
    }

    this.unPaintInRed = function () {
        //curField.removeClassName('red');
        //document.getElementById('error_'+fName).innerHTML = '';
    }

    this.fieldListen = function () {
        curField.onkeyup = function () {
            if (curField.value != '') {
                curField.removeClassName('red');
            }
            else {
                curField.addClassName('red');
            }
        }
    }

    function getValueBool(type) {
        if (type == 'required') {
            if ($.trim(curField.value) != '') {
                document.getElementById('error_' + fName).innerHTML = '';
                return true;
            }
            else {
                var chkvalue = document.getElementById('error_' + fName).innerHTML.trim();
                if (chkvalue == '') {
                    //document.getElementById('error_' + fName).innerHTML = 'Required';
                    fail_border(fName);
                }
                return false;
            }
        }
        if (type == 'email') {
            if ($.trim(curField.value) != '') {
                if (/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i.test(curField.value)) {
                    document.getElementById('error_' + fName).innerHTML = '';
                    return true;
                }
                else {
                    var chkvalue = document.getElementById('error_' + fName).innerHTML.trim();

                    if (chkvalue == '') {
                        document.getElementById('error_' + fName).innerHTML = 'Enter a valid email';
                        fail_border(fName);
                    }
                    return false;
                }
            }
            else {
                return true;
            }
        }
        if (type == 'username') {
            if ($.trim(curField.value) != '') {
                if (curField.value.length >= 6 && curField.value.length < 26) {
                    if (/^[a-zA-Z0-9\_\.]+$/i.test(curField.value)) {
                        document.getElementById('error_' + fName).innerHTML = '';
                        return true;
                    }
                    else {
                        var chkvalue = document.getElementById('error_' + fName).innerHTML.trim();

                        if (chkvalue == '') {
                            document.getElementById('error_' + fName).innerHTML = 'you can use only letters (a-z), numbers, and periods';
                            fail_border(fName);
                        }
                        return false;
                    }
                }
                else {
                    var chkvalue = document.getElementById('error_' + fName).innerHTML.trim();

                    if (chkvalue == '') {
                        document.getElementById('error_' + fName).innerHTML = 'Please use between 6 and 25 characters.';
                        fail_border(fName);
                    }
                    return false;
                }
            }
            else {
                return true;
            }
        }
        if (type == 'password') {
            if ($.trim(curField.value) != '') {
                if (curField.value.length >= 6) {
                    document.getElementById('error_' + fName).innerHTML = '';
                    return true;
                }
                else {
                    var chkvalue = document.getElementById('error_' + fName).innerHTML.trim();

                    if (chkvalue == '') {
                        document.getElementById('error_' + fName).innerHTML = 'password must be at least 6 characters long';
                        fail_border(fName);
                    }
                    return false;
                }
            }
            else {
                return true;
            }
        }
        if (type == 'telno') {
            if ($.trim(curField.value) != '') {
                if (/^[0-9]{10}$/i.test(curField.value)) {
                    document.getElementById('error_' + fName).innerHTML = '';
                    return true;
                }
                else {
                    var chkvalue = document.getElementById('error_' + fName).innerHTML.trim();

                    if (chkvalue == '') {
                        document.getElementById('error_' + fName).innerHTML = 'Enter a valid phone number';
                        fail_border(fName);
                    }
                    return false;
                }
            }
            else {
                return true;
            }
        }
        if (type == 'alpha') {
            if ($.trim(curField.value) != '') {
                if (/^[a-zA-Z]+$/i.test(curField.value)) {
                    document.getElementById('error_' + fName).innerHTML = '';
                    return true;
                }
                else {
                    var chkvalue = document.getElementById('error_' + fName).innerHTML.trim();

                    if (chkvalue == '') {
                        document.getElementById('error_' + fName).innerHTML = 'sholud be a charector';
                        fail_border(fName);
                    }
                    return false;
                }
            }
            else {
                return true;
            }
        }
        if (type == 'equal') {

            FfName = fName[0];
            LfName = fName[1];
            var FcurField = document.forms[formName].elements[FfName];
            var LcurField = document.forms[formName].elements[LfName];
            if ($.trim(FcurField.value) != '') {
                if ($.trim(FcurField.value) == $.trim(LcurField.value)) {
                    document.getElementById('error_' + LfName).innerHTML = '';
                    return true;
                }
                else {
                    var chkvalue = document.getElementById('error_' + LfName).innerHTML.trim();
                    if (chkvalue == '') {
                        document.getElementById('error_' + LfName).innerHTML = 'sholud be same';
                        fail_border(LfName);
                    }
                    return false;
                }
            }
            else {
                return true;
            }
        }
        if (type == 'notequal') {
            var FfName = fName[0];
            var Fvalue = document.forms[formName].elements[FfName].value;
            var Tvalue = fName[1];

            if (Fvalue != Tvalue) {
                elem = document.forms[formName].elements[FfName].setAttribute("style", "border: 1px solid #ccc; box-shadow: none;");
                return true;
            }
            else {
                elem = document.forms[formName].elements[FfName].setAttribute("style", "border: 1px solid #EF672F; box-shadow: 0 0 2px #EF672F;");
                return false;
            }
        }
    }
}

/*END*/


function success_border(id) {
    $('#' + id).removeClass('input__error');
    // elem = document.getElementById(id);
    // elem.setAttribute("style","border: 1px solid #D3D3D3; box-shadow: none;");
    // document.getElementById('error_'+id).innerHTML = '';
    // document.getElementById('error_'+id).style.display = 'none';
}

function fail_border(id) {
    $('#' + id).addClass('input__error');
    // elem = document.getElementById(id);
    // elem.setAttribute("style","border: 1px solid #EF672F; box-shadow: 0 0 2px #EF672F;");
    // document.getElementById('error_'+id).style.display = 'block';
}

function focus_border(id) {
    elem = document.getElementById(id);
    elem.setAttribute("style", "outline:none; border-color: #4D90FE; box-shadow: 0 0 2px #4D90FE;");
}

function back_toclearBorder(id) {
    elem = document.getElementById(id);
    elem.setAttribute("style", "border: 1px solid #D3D3D3; box-shadow: none;");
}


/* Deparment */
function departmentaddpopup() {
    var url = path + "/index.php/Department/add";
    $.post(url, {}, function (data) {
        if (data != '') {
            popupcontent_injection(data);
        }
        else {
            var form = 'Invalid Request';
        }
    });
}

function departmenteditpopup(department_id) {
    var url = path + "/index.php/Department/edit";
    $.post(url, {department_id: department_id}, function (data) {
        if (data != '') {
            $('#edit_department_data').html(data);
        }
        else {
            $('#edit_department_data').html('Invalid');
        }
    });
}

function institutedepartmenteditpopup(department_id) {
    var url = path + "/index.php/Department/edit_insitute_department";
    $.post(url, {department_id: department_id}, function (data) {
        if (data != '') {
            $('#edit_institute_department_data').html(data); 
        }
        else {
            $('#edit_institute_department_data').html('Invalid');
        }
    });
}

function departmentheadeditpopup(department_id) {
    var url = path + "/index.php/Manage_user/edit_department_head";
    $.post(url, {department_id: department_id}, function (data) {
        if (data != '') {
            $('#edit_dept_head_data').html(data);
        }
        else {
            $('#edit_dept_head_data').html('Invalid');
        }
    });
}

function useraddpopup() {
    var url = path + "/index.php/User/add";
    $.post(url, {}, function (data) {
        if (data != '') {
            popupcontent_injection(data);
        }
        else {
            var form = 'Invalid Request';
        }
    });
}

function usereditpopup(user_id) {
    var url = path + "/index.php/User/edit";
    $.post(url, {user_id: user_id}, function (data) {
        if (data != '') {
            $('#edit_employee_data').html(data);
        }
        else {
            $('#edit_employee_data').html('Invalid Data');
        }
    });
}

function instituteusereditpopup(id) {
    var category_id = document.getElementById('category').value;
    var url = path + "/index.php/Registration/edit";
    $.post(url, {id: id, category_id: category_id}, function (data) {
        if (data != '') {
            $('#edit_employee_data').html(data);
        }
        else {
            $('#edit_employee_data').html('Invalid');
        }
    });
}

/*--- function role mapping ---*/
function mappingaddpopup() {
    popupcontent_ajax('<div class="image_loader" style=""></div>');

    var url = path + "/index.php/Function_role_mapping/add";
    $.post(url, {}, function (data) {
        if (data != '') {
            popupcontent_injection(data);
        }
        else {
            var form = 'Invalid Request';
        }
    });
}

function mappingeditpopup(id) {
    var ids = id.split("_");
    var mapping_id = ids[0];
    var category_id = ids[1];
    var role_id = ids[2];
    // var department_id = ids[1];

    popupcontent_ajax('<div class="image_loader" style=""></div>');

    var url = path + "/index.php/Function_role_mapping/edit";
    $.post(url, {mapping_id: mapping_id, category_id: category_id, role_id: role_id}, function (data) {
        if (data != '') {
            popupcontent_injection(data);
        }
        else {
            var form = 'Invalid Request';
        }
    });
}

function get_existing_username(sel) {
    var username = sel.value;

    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
    var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    var url = path + "/index.php/User/get_existing_username";
    var email = document.getElementById('email').value;

    $.post(url, {username: username, email: email}, function (data) {
        if (data == 'existing') {
            $('#error_username').html("Username Already Exists");
        }
        else {
            $('#error_username').html("");
        }
    });
}

function roleaddpopup() {
    popupcontent_ajax('<div class="image_loader" style=""></div>');

    var url = path + "/index.php/Role/add";
    $.post(url, {}, function (data) {
        if (data != '') {
            popupcontent_injection(data);
        }
        else {
            var form = 'Invalid Request';
        }
    });
}

function roleeditpopup(id) {
    popupcontent_ajax('<div class="image_loader" style=""></div>');

    var url = path + "/index.php/Role/edit";
    $.post(url, {id: id}, function (data) {
        if (data != '') {
            $('#edit_role_data').html(data);
        }
        else {
            $('#edit_role_data').html('Invalid');
        }
    });
}

function categoryaddpopup() {
    popupcontent_ajax('<div class="image_loader" style=""></div>');

    var url = path + "/index.php/Category/add";
    $.post(url, {}, function (data) {
        if (data != '') {
            popupcontent_injection(data);
        }
        else {
            var form = 'Invalid Request';
        }
    });
}

function categoryeditpopup(id) {
    popupcontent_ajax('<div class="image_loader" style=""></div>');

    var url = path + "/index.php/Category/edit";
    $.post(url, {id: id}, function (data) {
        if (data != '') {
            $('#edit_category_data').html(data);
        }
        else {
            $('#edit_category_data').html('Invalid');
        }
    });
}

function categoryadmineditpopup(id) {
    popupcontent_ajax('<div class="image_loader" style=""></div>');

    var url = path + "/index.php/Category/admin_edit";
    $.post(url, {id: id}, function (data) {
        if (data != '') {
            $('#edit_admin_category_data').html(data);
        }
        else {
            $('#edit_admin_category_data').html('Invalid');
        }
    });
}

function managmentusereditpopup(id) {
    popupcontent_ajax('<div class="image_loader" style=""></div>');

    var url = path + "/index.php/Category/management_user_edit";
    $.post(url, {id: id}, function (data) {
        if (data != '') {
            $('#edit_managment_user_data').html(data);
        }
        else {
            $('#edit_managment_user_data').html('Invalid');
        }
    });
}

function categorypocpopup(id) {
    popupcontent_ajax('<div class="image_loader" style=""></div>');

    var url = path + "/index.php/Manage_user/edit_poc_category";
    $.post(url, {id: id}, function (data) {
        if (data != '') {
            $('#edit_poc_data').html(data);
        }
        else {
            $('#edit_poc_data').html(data);
        }
    });
}

function managenormaluserpopup(id) {
    popupcontent_ajax('<div class="image_loader" style=""></div>');

    var url = path + "/index.php/Manage_user/normal_user_view";
    $.post(url, {id: id}, function (data) {

        if (data != '') {
            $('#edit_normal_user_data').html(data);
        }
        else {
            $('#edit_normal_user_data').html(data);
        }
    });
}

function manageexternaluserpopup(id) {
    popupcontent_ajax('<div class="image_loader" style=""></div>');
    var url = path + "/index.php/Manage_user/external_user_view1";
    $.post(url, {id: id}, function (data) {
        if (data != '') {
            $('#edit_external_user_data').html(data);
        }
        else {
            $('#edit_external_user_data').html(data);
        }
    });
}

function filter_category(cat_id) {
    if (cat_id != '') {
        var url = path + "/index.php/Manage_user/manage_department";
        $.post(url, {cat_id: cat_id}, function (data) {
            if (data != '') {
                // $('#rtable').DataTable().reload();
                // 	$('html').html(data);
                // 	$("#rtable").dataTable({
                // 	"pageLength": 10,
                // 	"aaSorting": [],

                // });
                $("#rtable").dataTable();
                $('#rtable').html(data);
                $('#rtable_info').show();
            }
            else {
                $('#rtable').html('');
                $('.msg__box').html('No Data Found');
            }
        });
    }
    else {
        window.location.reload();
    }
}

function get_user_category(category_type_id) {
    var url = path + "/index.php/User/get_category";
    $.post(url, {category_type_id: category_type_id}, function (data) {
        if (data != '') {
            $('#category_').html(data);
        }
        else {
            $('#category_').html('No Data Found');
        }
    });
}

function dept_id(sel , type) {
    if(type == 2)
    {
        var edit = 'edit_';
    }
    else
    {
        var edit = '';
    }
    var id = sel.id;
    var dept = id.split("_");
    var category_id = dept[1];
   
    var inputElements = document.getElementsByClassName('dept_'+edit+category_id);
    var a = '';
    var cat_id = '';
    var lenghtOfUnchecked = $('.dept_'+edit+category_id + ':not(:checked)').length;

    if (document.getElementById('dept_count_'+edit +category_id).value != lenghtOfUnchecked) {
        for (var i = 0; inputElements[i]; ++i) {
            if (inputElements[i].checked == true) { 
                checkedValue = inputElements[i].value;
                if (cat_id != category_id) {
                    if (i == 0) {
                        a = checkedValue;
                    }
                    else {
                        if (a != '') {
                            a = a + ',' + checkedValue;
                        }
                        else {
                            a = checkedValue;
                        }
                    }
                    $('#dept_'+edit+category_id).attr("value", a);
                }
                else {
                    if (i == 0) {
                        a = checkedValue;
                    }
                    else {
                        if (a != '') {
                            a = a + ',' + checkedValue;
                        }
                        else {
                            a = checkedValue;
                        }
                    }
                    $('#dept_'+edit+category_id).attr("value", a);
                }
            }
            else {
                //$('#institute').attr("value", '');
            }
        }
    }
    else {
        $('#dept_'+edit+category_id).attr("value", '');

    }
}

function get_user_role(category, type) {
    var category_id = category.value;
    var a = '';
    if(type==2)
    {
        var lenghtOfUnchecked = $('.institute_category_edit:not(:checked)').length;
        var inputElements = document.getElementsByClassName('institute_category_edit');
        var institute = $('#institute_edit');
        var category_count = document.getElementById('category_count_edit');
    }
    else
    {
        var lenghtOfUnchecked = $('.institute_category:not(:checked)').length;
        var inputElements = document.getElementsByClassName('institute_category');
        var institute = $('#institute');
        var category_count = document.getElementById('category_count');
    }
   
    if (category_count.value != lenghtOfUnchecked) {
        for (var i = 0; inputElements[i]; ++i) { 
            if (inputElements[i].checked == true) {
                checkedValue = inputElements[i].value;
                if (i == 0) {
                    a = checkedValue;
                }
                else {
                    if (a != '') {
                        a = a + ',' + checkedValue
                    }
                    else {
                        a = checkedValue
                    }
                }
                institute.attr("value", a);
            }
            else {
                //$('#institute').attr("value", '');
            }
        }
    }
    else {
        institute.attr("value", '');
    }

    var url = path + "/index.php/User/get_user_category_role";
    $.post(url, {category_id: category_id, type:type}, function (data) {
        if (data) {
            if ($(category).prop('checked') == true) {
                $('.category_dept_' + category_id).html(data);
                $('.category_dept_' + category_id).show();
            } else if ($(category).prop('checked') == false) {
                $('.category_dept_' + category_id).hide();
                $('.category_dept_' + category_id).html('');
            } 

        }
    });
}

function get_category_role(category_id) {
    var url = path + "/index.php/Department/get_category_role";
    $.post(url, {category_id: category_id}, function (data) {
        if (data != '') {
            $('#category_role').html(data);
        }
        else {
            $('#category_role').html('No Data Found');
        }
    });
}

function get_function_role_department(category_id) {
    var url = path + "/index.php/Function_role_mapping/get_fn_category_role";

    $.post(url, {category_id: category_id}, function (data) {

        if (data != '') {
            $('#fn_role_dept').html(data);
        }
        else {
            $('#fn_role_dept').html('No Data Found');
        }

    });
}

// category department
function get_category_department(category_id) {
    var url = path + "/index.php/Manage_ticket/get_category_department";
    $.post(url, {category_id: category_id}, function (data) {
        if (data != '') {
            $('#department').html(data);
        }
        else {
            $('#department').html('<option value="">No Data Found</option>');
        }
    });
}

// category department
function get_category_department_employee(category_id) {
    var url = path + "/index.php/Manage_ticket/get_category_department";
    $.post(url, {category_id: category_id}, function (data) {
        if (data != '') {
            $('#department').html(data);
        }
        else {
            $('#department').html('<option value="">No Data Found</option>');
        }
    });
}


function get_category_employee(category_id, type) {
    type = typeof type !== 'undefined' ? type : 0;

    var url = path + "/index.php/Manage_ticket/get_category_employee_role";
    $.post(url, {category_id: category_id, type: type}, function (data) {
        if (data != '') {
            $('#assigned_role').html(data);
        }
        else {
            $('#assigned_role').html('<option value="">No Data Found</option>');
        }
    });
}

function get_required_employee(role_id) {
    var url = path + "/index.php/Manage_ticket/required_employee";
    $.post(url, {role_id: role_id}, function (data) {
        if (data != '') {
            $('#assigned_to').html(data);
        }
        else {
            $('#assigned_to').html('<option value="">No Data Found</option>');
        }
    });
}

// Ticket Re-assign
function reassign_ticket(ticket_id) {
    var url = path + "/index.php/Manage_ticket/ticket_reassign";
    $.post(url, {ticket_id: ticket_id}, function (data) {
        if (data != '') {

            $('#ticket_histories').hide();
            $('#ticket_user_description').hide();
            $('#ticket_comments').hide();
            $('#ticket_attachments').hide();
            $('#assign_ticket').show();
            $('#assign_ticket').html(data);
        }
        else {
            $('#ticket_histories').hide();
            $('#ticket_user_description').hide();
            $('#ticket_comments').hide();
            $('#ticket_attachments').hide();
            $('#assign_ticket').hide();
            $('#assign_ticket').html('NO DATA FOUND');
        }
    });
}

//Child ticket 

function child_ticket(ticket_id) {
    var url = path + "/index.php/Manage_ticket/ticket_reassign";
    $.post(url, {ticket_id: ticket_id}, function (data) {
        if (data != '') {
            $('#child_ticket').show();
            $('#child_ticket').html(data);
        }
        else {
            $('#child_ticket').hide();
            $('#child_ticket').html('NO DATA FOUND');
        }
    });
}

//User Email Validation
// function uservalidationpopup()
// {
//     // popupcontent_ajax('<div class="image_loader" style=""></div>');
//     var uri_segment_value = $('#uri_segment_value').val();
//     var ticket_data = $('#ticket_create').serialize();
//     if($('#attachment').val()!='')
//     {
//     	var ticket_attachment = $('#attachment').val();

//     }
//     else
//     {
//     	var ticket_attachment = '';
//     }

//     var file = $('#attachment')[0].files[0];
//     console.log(file.name);
//     var attachment_name = file.name;
//     var attachment_temp_name = file.tmp_name;


//     // var attachment_temp_name = $('#attachment').prop('files')[0]['tmp_name'];
//     var url = path + "/index.php/Manage_ticket/user_validation";
//     $.post(url, {ticket_data:ticket_data, ticket_attachment:ticket_attachment, uri_segment_value:uri_segment_value, attachment_temp_name:attachment_temp_name, attachment_name:attachment_name}, function (data) {
//         if (data != '')
//         {
//             popupcontent_injection(data);
//         }
//         else
//         {
//             var form = 'Invalid Request';
//         }
//     });
// }

//check email
function checkuseremail(email) {
    var url = path + "/index.php/Manage_ticket/check_user_email";
    $.post(url, {}, function (data) {
    });
}

function checkemailvalid() {
    var email = document.getElementById('ls_username').value;
    var url = path + "/index.php/Manage_ticket/checking_existinguser";
    $.post(url, {email: email}, function (data) {
        if (data == 1) {
            $('.msg_signup').hide();
            $('.msg_login').show();
            $('.user_password').show();
            $('.check_email_btn').show();
            $('.signup_form').hide();
            $('.adminlogin').val('Login');
            $('.normal_user__registration').attr("id", "normal_user_login");
            $('.normal_user__registration').attr("action", path + "/index.php/Manage_ticket");
            $('.adminlogin').attr("name", "adminlogin");
            $('.adminlogin').attr("id", "adminlogin1");
            $('.adminlogin').attr("onclick", "return normal_user_registration_login_validate()");
            $('#existing_user').val(1);
            $('.validate_email').attr("onblur", "checkemailvalid()");
            $('#go_btn').hide();
        }
        if (data == 0) {
            $('.msg_signup').show();
            $('.msg_login').hide();
            $('.user_password').hide();
            $('.check_email_btn').show();
            $('.signup_form').show();
            $('.adminlogin').val('Submit');
            $('.normal_user__registration').attr("id", "normal_user_registration");
            $('.normal_user__registration').attr("action", path + "/index.php/Normal_user/reg");
            $('.adminlogin').attr("name", "normal_user");
            $('.adminlogin').attr("id", "adminlogin");
            $('.adminlogin').attr("onclick", "return normal_user_registration_validate(); ");
            // $('.adminlogin').attr("onsubmit", "closePopup();");
            $('#existing_user').val(0);
            $('.validate_email').attr("onblur", "checkemailvalid()");
            $('#go_btn').hide();
        }
        if (data == '') {
            $('.msg_signup').hide();
            $('.msg_login').hide();
            $('.user_password').hide();
            $('.check_email_btn').hide();
            $('.signup_form').hide();
            $('#existing_user').val(0);
            $('#go_btn').show();
        }
    });
}

function view_ticket_details(detail_type) {
    if (detail_type == 0) {
        $('#ticket_user_description').show();
        $('#ticket_comments').hide();
        $('#ticket_attachments').hide();
        $('#ticket_histories').hide();
        $('#assign_ticket').hide();
        $('#child_tickets').hide();
        $('#parent_tickets').hide();
        // $('.detail_content_div').toggle();
    }
    else if (detail_type == 1) {
        $('#ticket_comments').show();
        $('#ticket_user_description').hide();
        $('#ticket_attachments').hide();
        $('#ticket_histories').hide();
        $('#assign_ticket').hide();
        $('#child_tickets').hide();
        $('#parent_tickets').hide();
        // $('.detail_content_div').toggle();
    }
    else if (detail_type == 2) {
        $('#ticket_attachments').show();
        $('#ticket_user_description').hide();
        $('#ticket_comments').hide();
        $('#ticket_histories').hide();
        $('#assign_ticket').hide();
        $('#child_tickets').hide();
        $('#parent_tickets').hide();
        // $('.detail_content_div').toggle();
    }
    else if (detail_type == 3) {
        $('#ticket_histories').show();
        $('#ticket_user_description').hide();
        $('#ticket_comments').hide();
        $('#ticket_attachments').hide();
        $('#assign_ticket').hide();
        $('#child_tickets').hide();
        $('#parent_tickets').hide();
        // $('.detail_content_div').toggle();
    }
    else if (detail_type == 4) {
        $('#child_tickets').show();
        $('#ticket_histories').hide();
        $('#ticket_user_description').hide();
        $('#ticket_comments').hide();
        $('#ticket_attachments').hide();
        $('#assign_ticket').hide();
        $('#parent_tickets').hide();
        // $('.detail_content_div').toggle();
    }
}

function mailbox_view_details(detail_type) {
    if (detail_type == 1) {
        $('.mailbox_compose').slideToggle("slow");
    }
}

jQuery(function ($) {
    $('body').on('click', '.detailed_view', function () {
        $(this).children().slideToggle("slow");
    });
});

function mailbox_replay_details() {
    $('#mailbox_replay').slideToggle("slow");
}

// department escalation
function get_defined_no_of_levels(sel) {
    var entered_no = sel.value;
    var severitylevel_id = sel.id;
    var severity = severitylevel_id.split("_");
    var severity_id = severity[2];

    var department_id = document.getElementById('department').value;

    var url = path + "/index.php/Department_escalation/get_entered_field_levels";
    $('.levels_on_severity_' + severity_id).html('');
    $.post(url, {
        entered_no: entered_no,
        severity_id: severity_id,
        department_id: department_id
    }, function (data) {
        if (data != '') {
            $('.levels_on_severity_' + severity_id).html(data);
            $('.error_severity_level_' + severity_id).html('');

        }
        else {
            $('.levels_on_severity_' + severity_id).html('');
            $('.error_severity_level_' + severity_id).html('Level Exceeds');
        }
    });
}


// adding emails for selected employee
jQuery(function ($) {
    $('body').on('change', '.change_employee', function () {
        var sel = $(this);
        var severity_level = $(this).attr('list');
        var severity = severity_level.split("_");
        var severity_id = severity[1];
        var level_id = severity[2];
        var emp_id = '#employee_' + severity_id + '_' + level_id;

        var x = $(sel).val();
        var z = emp_id;
        var valu = $(z).find('option[value="' + x + '"]');
        var employee_id = valu.attr('id');
        var employee_email = x;

        var url = path + "/index.php/Department_escalation/get_employee_email";
        $.post(url, {
            employee_id: employee_id,
            employee_email: employee_email,
            severity_id: severity_id,
            level_id: level_id
        }, function (data) {
            if (data != '') {
                sel.parent().parent().find('.emails').html(data);
            }
            else {
                $('#employee_' + employee_id).show();
                $('#employee_' + employee_id).html(data);
            }
        });
    });
});


//  more employee adding option
jQuery(function ($) {
    $('body').on('click', '.add_more_employee', function () {
        var department_id = document.getElementById('department').value;

        var severity_level = $(this).attr('id');
        var severity = severity_level.split("_");

        var severity_id = severity[0];
        var level = severity[1];

        var url = path + "/index.php/Department_escalation/get_more_employee_to_level";
        $.post(url, {
            severity_id: severity_id,
            level: level,
            department_id: department_id
        }, function (data) {
            if (data != '') {
                $('.add_more_employee_' + severity_id + '_' + level).append(data);
                $("employee_" + severity_id + '_' + level + " option:selected").remove();
            }
            else {
                $('.add_more_employee_' + severity_id + '_' + level).append('');
            }
        });
    });
});

// removal option for added employee
jQuery(function ($) {
    $('body').on('click', '.remove', function () {
        $(this).parent().parent().remove();
    });
});

// fetching existing escalation data
function get_existing_escalation_data(sel) {
    department_id = sel.value;
    var url = path + "/index.php/Department_escalation/existing_escalation_data";
    $.post(url, {department_id: department_id}, function (data) {
        if (data != '') {
            // $('#new_data').hide();
            // $('#existing_data').show();
            //$('#existing_data').html(data);
            $('#new_data').html(data);
        }
        else {
            $('#new_data').html('');
            // $('#existing_data').html('');
            //    $('#existing_data').hide();
            //$('#new_data').show();
        }
    });
}

// manager popupss
function manageraddpopup() {
    popupcontent_ajax('<div class="image_loader" style=""></div>');

    var url = path + "/index.php/Manage_user/manager_add";
    $.post(url, {}, function (data) {
        if (data != '') {
            popupcontent_injection(data);
        }
        else {
            var form = 'Invalid Request';
        }
    });
}

function managereditpopup(id) {
    popupcontent_ajax('<div class="image_loader" style=""></div>');

    var url = path + "/index.php/Manage_user/manager_edit";
    $.post(url, {id: id}, function (data) {
        if (data != '') {
            $('#edit_manager_data').html(data);
        }
        else {
            $('#edit_manager_data').html('Invalid');
        }
    });
}

// category for selected type
function get_category(category_type_id) {
    var url = path + "/index.php/Manage_user/get_category";
    $.post(url, {category_type_id: category_type_id}, function (data) {
        if (data != '') {
            $('#category').html(data);
        }
        else {
            $('#category').html('<option value="">No Data Found</option>');
        }
    });
}

// category_employee
function get_manager_employee(category_id) {
    var url = path + "/index.php/Manage_user/get_category_employee";
    $.post(url, {category_id: category_id}, function (data) {
        if (data != '') {
            $('#manager').html(data);
        }
        else {
            $('#manager').html('<option value="">No Data Found</option>');
        }
    });
}

// button enabling features
function get_proper_button(ticket_status) {
    if (ticket_status == 5 || ticket_status == 6 || ticket_status == 7) {
        $('#fwd_to_manager_btn').show();
        $('#fwd_to_user_btn').hide();
        $('#create_ticket_btn').hide();
    }
    else if (ticket_status == 8 || ticket_status == 9 || ticket_status == 12 || ticket_status == 14) {
        $('#fwd_to_user_btn').show();
        $('#fwd_to_manager_btn').hide();
        $('#create_ticket_btn').hide();
    }
    else {
        $('#create_ticket_btn').show();
        $('#fwd_to_manager_btn').hide();
        $('#fwd_to_user_btn').hide();
    }

    $('#split_no').hide();
    $('#assign_updation').show('slow');
    // $('#hide_action_click').hide();
    $('.ticket_status').val(ticket_status);
    $('#ticket_cmt').show()
}

// expected date and attachement for assigning to HD or employee
function get_additional_field_date_attach(ticket_status) {
    if (ticket_status == 2 || ticket_status == 3) {
        $('#expected_date_div').show();
        $('#attachment_div').show();
    }
    else {
        $('#expected_date_div').hide();
        $('#attachment_div').hide();
    }
}

function get_all_employees_dept(department_id) {
    var url = path + "/index.php/Manage_ticket/get_department_employees";
    $.post(url, {department_id: department_id}, function (data) {
        if (data != '') {
            $('.department_employees').html(data);
        }
        else {
            $('.department_employees').html('<option value="">No Data Found</option>');
        }
    });
}


function get_dept_employees(ticket_status) {
    if (ticket_status == 3 || ticket_status == 4) {
        var department_id = document.getElementById('department').value;
        var url = path + "/index.php/Manage_ticket/get_department_employees";
        $.post(url, {department_id: department_id}, function (data) {
            if (data != '') {
                $('.department_employees').html(data);
            }
            else {
                $('.department_employees').html('Invalid... select a department ');
            }
        });
    }
    else {
        $('.department_employees').html('');
    }
}

function splitticket(ticket_id) {
    var url = path + "/index.php/Manage_ticket/";
}

// get parent ticket of a child
function get_parent_ticket(ticket_id) {
    var url = path + "/index.php/Manage_ticket/get_parent_ticket_details";
    $.post(url, {ticket_id: ticket_id}, function (data) {

        if (data != '') {
            $('#parent_tickets').show();
            $('#parent_tickets').html(data);
            $('#ticket_histories').hide();
            $('#ticket_user_description').hide();
            $('#ticket_comments').hide();
            $('#ticket_attachments').hide();
            $('#assign_ticket').hide();
            $('#child_tickets').hide();
        }
        else {
            $('#parent_tickets').hide();
            $('#parent_tickets').html('No Data Found');
            $('#ticket_histories').hide();
            $('#ticket_user_description').hide();
            $('#ticket_comments').hide();
            $('#ticket_attachments').hide();
            $('#assign_ticket').hide();
            $('#child_tickets').hide();
        }
    });
}

// Advance Search
// function get_advance_search_to_view()
// {

//     popupcontent_ajax('<div class="image_loader" style=""></div>');

//     var data = '<div class="pg__mainform" style="padding: 25px 0px;"><div class="close__btn" onclick="closePopup()" style="margin-bottom:6px;"></div><div class="form__heading" ><h2>Advanced Search</h2></div><div class="loginmsg__box"></div><form action="" enctype="multipart/form-data" method="post"><div class="form">';
//     var data = data + '<div class="field" role="user-name"><label style="padding:0;">Keyword</label><div class="input__area"><input type="text" value="" class="input" name="keyword" id="keyword" placeholder="Keyword"></div><div class="clear"></div></div>'
//     var data = data + '<div class="field" role="user-name"><label style="padding:0;">Search By</label><div class="input__area"><select class="inputselect" name="search_mode" id="search_mode"><option value="">Select</option><option value="1">Institute</option><option value="2">Department</option><option value="3">Ticket No</option></select></div><div class="clear"></div></div>';
//     var data = data + '<div class="field" role="user-name"><label style="padding:0;">&nbsp;</label><input type="submit" name="search" id="search" class="submit__button" style="float:none;" value="Search"></div>';
//     var data = data + '</form></div>';

//     popupcontent_injection(data);
// }

// function filter_category_view_ticket(cat_id)
// {
// 	if(cat_id!='')
// 	{
// 		//var table = $('#rtable').DataTable().destroy();

// 	 	var url = path + "/index.php/Manage_ticket/view_ticket";
// 	 	$.post(url, {cat_id:cat_id}, function (data) {

// 		});
// 	}
// 	else
// 	{
// 	 	window.location.reload();
// 	}
// }

function add_more_attachement(ticket_id) {
    var url = path + "/index.php/Manage_ticket/get_more_attachements";
    $.post(url, {ticket_id: ticket_id}, function (data) {
        if (data != '') {
            $('#add_more_attachment').html(data);
        }
        else {
            $('#add_more_attachment').html("Invalid");
        }
    });
}

function get_normal_user_category(category_type_id) {
    var url = path + "/index.php/Normal_user/get_normal_user_category";
    $.post(url, {category_type_id: category_type_id}, function (data) {
        if (data != '') {
            $('#category').html(data);
        }
        else {
            $('#category').html('<option value="">No Data Found</option>');
        }
    });
}

function filter_category_view_ticket(cat_id) {
    var severity_id = $('#severity').val();
    var status_id = $('#ticket_status').val();

    var url = path + "/index.php/Manage_ticket/filter_ticket_details";
    $.post(url, {cat_id: cat_id, severity_id: severity_id, status_id: status_id}, function (data) {
        if (cat_id != '') {
            $('#view_ticket_details').html(data);
        }
        else {
            $('#view_ticket_details').html(data);
        }
    });
}

function filter_severity_view_ticket(severity_id) {
    var cat_id = $('#category').val();
    var status_id = $('#ticket_status').val();

    var url = path + "/index.php/Manage_ticket/filter_ticket_details";
    $.post(url, {cat_id: cat_id, severity_id: severity_id, status_id: status_id}, function (data) {
        if (severity_id != '') {
            $('#view_ticket_details').html(data);
        }
        else {
            $('#view_ticket_details').html(data);
        }
    });
}

function filter_status_view_ticket(status_id) {
    var severity_id = $('#severity').val();
    var cat_id = $('#category').val();

    var url = path + "/index.php/Manage_ticket/filter_ticket_details";
    $.post(url, {cat_id: cat_id, severity_id: severity_id, status_id: status_id}, function (data) {
        if (status_id != '') {
            $('#view_ticket_details').html(data);
        }
        else {
            $('#view_ticket_details').html(data);
        }
    });
}

function get_split_tickets(ticket_id, category_id) {
    $('#split_no').show('slow');
    $('#assign_updation').hide();

    $('#parent_ticket_id').val(ticket_id);
    $('#parent_category').val(category_id);
}

// Institute filter_category
function filter_category_type(category_type_id) {
    var url = path + "/index.php/Category/filter_category_type";
    $.post(url, {category_type_id: category_type_id}, function (data) {
        if (category_type_id != '') {
            $('#category_details').html(data);
        }
        else {
            $('#category_details').html(data);
        }
    });
}

// manager filter_category
function manager_filter_category_type(category_type_id) {
    var url = path + "/index.php/Manage_user/filter_category_type";
    $.post(url, {category_type_id: category_type_id}, function (data) {
        if (category_type_id != '') {
            $('#manager_details').html(data);
        }
        else {
            $('#manager_details').html(data);
        }
    });
}


// poc filter_category
function poc_filter_category_type(category_type_id) {
    var url = path + "/index.php/Manage_user/poc_filter_category_type";
    $.post(url, {category_type_id: category_type_id}, function (data) {
        if (category_type_id != '') {
            $('#poc_details').html(data);
        }
        else {
            $('#poc_details').html(data);
        }
    });
}


// Role filter_category
function filter_category_role(cat_id) {

    var url = path + "/index.php/Role/filter_category_role";
    $.post(url, {cat_id: cat_id}, function (data) {
        if (cat_id != '') {
            $('#role_details').html(data);
        }
        else {
            $('#role_details').html(data);
        }
    });
}

// Department filter_category
function filter_category_department(cat_id, type) {
    type = typeof type !== 'undefined' ? type : 0;

    var url = path + "/index.php/Department/filter_category_department";
    $.post(url, {cat_id: cat_id, type: type}, function (data) {
        if (cat_id != '') {
            $('#department_details').html(data);
        }
        else {
            $('#department_details').html(data);
        }
    });
}

function filter_category_department_head(cat_id, type) {
    type = typeof type !== 'undefined' ? type : 0;

    var url = path + "/index.php/Manage_user/filter_category_department_head";
    $.post(url, {cat_id: cat_id, type: type}, function (data) {
        if (cat_id != '') {
            $('#department_details').html(data);
        }
        else {
            $('#department_details').html(data);
        }
    });
}


//Category filter in employee

function filter_employee_department(cat_id) {
    var url = path + "/index.php/User/filter_employee_department";
    $.post(url, {cat_id: cat_id}, function (data) {
        if (cat_id != '') {
            $('#user_details').html(data);
        }
        else {
            $('#user_details').html(data);
        }
    });
}

//Category filter in normal user

function filter_category_normal_user(cat_id) {
    var url = path + "/index.php/Manage_user/filter_category_normal_user";
    $.post(url, {cat_id: cat_id}, function (data) {
        if (cat_id != '') {
            $('#normal_user_details').html(data);
        }
        else {
            $('#normal_user_details').html(data);
        }
    });
}

//Category filter in external user

function filter_category_external_user(cat_id) {
    var url = path + "/index.php/Manage_user/filter_category_external_user";
    $.post(url, {cat_id: cat_id}, function (data) {
        if (cat_id != '') {
            $('#normal_user_details').html(data);
        }
        else {
            $('#normal_user_details').html(data);
        }
    });
}

function filter_department_employee(department_id) {

    var url = path + "/index.php/User/filter_employee_department";
    $.post(url, {department_id: department_id}, function (data) {
        if (data != '') {
            $('#user_details').html(data);
        }
        else {
            $('#user_details').html(data);
        }
    });
}


function filter_department(department_id, type) {
    type = typeof type !== 'undefined' ? type : 0;

    var url = path + "/index.php/Department/filter_category_department";
    $.post(url, {department_id: department_id, type: type}, function (data) {
        if (data != '') {
            $('#department_details').html(data);
        }
        else {
            $('#department_details').html(data);
        }
    });
}

function filter_department_head(department_id, type) {
    type = typeof type !== 'undefined' ? type : 0;

    var url = path + "/index.php/Manage_user/filter_category_department_head";
    $.post(url, {department_id: department_id, type: type}, function (data) {
        if (data != '') {
            $('#department_details').html(data);
        }
        else {
            $('#department_details').html(data);
        }
    });
}

// function role mapping filters

function filter_category_fn_role(category_id) {
    var url = path + "/index.php/Function_role_mapping/filter_category_fn_role";
    $.post(url, {category_id: category_id}, function (data) {
        if (category_id != '') {
            $('#fn_role_details').html(data);
        }
        else {
            $('#fn_role_details').html(data);
        }
    });
}

function clickit(id) {
    var $txt = jQuery("#body_content");
    var caretPos = $txt[0].selectionStart;
    var textAreaTxt = $txt.val();
    var txtToAdd = id;
    $txt.val(textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos));
}

// mail box cc 

function cc_mail_box() {
    $('#cc_mail_box').show();
    $('.cc').hide();

}

function mailboxviewpopup(id) {
    popupcontent_ajax('<div class="image_loader" style=""></div>');

    var url = path + "/index.php/Mail_box/view_mail_box_inbox_detail";
    $.post(url, {id: id}, function (data) {

        if (data != '') {
            popupcontent_injection(data);
        }
        else {
            var form = 'Invalid Request';
        }
    });
}

jQuery(function ($) {
    $('body').on('click', '.ticket_detail_sub_link_visiting', function () {
        var sel = $(this);
        $('.ticket_detail_sub_link_visited').removeClass('ticket_detail_sub_link_visited');
        sel.addClass('ticket_detail_sub_link_visited');
    });
});

//   jQuery(function ($) {
// 	$('body').on('click', '.mail_details_sub_link_visiting', function() {
// 		var sel = $(this);
// 		$('.ticket_detail_sub_link_visited').removeClass('ticket_detail_sub_link_visited');
// 		sel.addClass('ticket_detail_sub_link_visited');
// 	});
// });

function forgetpasswordpopup() {
    var url = path + "/index.php/Manage_ticket/forgetpassword";
    $.post(url, {}, function (data) {
        if (data != '') {
            popupcontent_injection3(data);
        }
        else {
            var form = 'Invalid Request';
        }
    });
}

jQuery(function ($) {
    $('.submit_button_toassigns').click(function () {
        $(".submit_button_toassigns").css("background-color", "#005da8");
        $(this).css({
            'background-color': '#677C8A'
        });
    });
});

jQuery(function ($) {
    $('.some-popover-link').popover({
        container: 'body',
        html: true,
        placement: 'bottom'
    });

    $(document).click(function (e) {
        $('.some-popover-link').each(function () {
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                $(this).popover('hide');
                return;
            }
        });
    });
});

function unread_email() {

    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
    var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    var url = path + "/index.php/Dashboard/get_unread_email";
    $.post(url, {}, function (data) {

        if (data != '') {
            $('#email_unread_popover').attr('data-html', true);
            $('#email_unread_popover').attr('data-content', data);
            $('#email_unread_popover').popover('show');
        }
        else {
            $('.popover').html('');
        }
    });
}

function unread_notification() {

    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
    var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    var url = path + "/index.php/Dashboard/get_unread_notification";
    $.post(url, {}, function (data) {

        if (data != '') {
            $('#notificationl_unread_popover').attr('data-html', true);
            $('#notificationl_unread_popover').attr('data-content', data);
            $('#notificationl_unread_popover').popover('show');
        }
        else {
            $('.popover').html('');
        }
    });
}

function draft_mail(draft_mail_id) {
    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
    var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    var url = path + "/index.php/Manage_ticket/get_draft_mail";
    $.post(url, {draft_mail_id: draft_mail_id}, function (data) {

    });
}

function mail_template(mail_id) {
    var ticket_id = document.getElementById("email_ticket_id").value;
    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
    var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    var url = path + "/index.php/Manage_ticket/get_mail_templates";
    $.post(url, {mail_id: mail_id, ticket_id: ticket_id}, function (data) {
        if (data != '') {
            $('#mail_templates_disp').html(data);
        }
        else {
            $('#subject').attr('value', ''); 
            $('#content').html('');
        }
    });
}

var _validFileExtensions = [".jpg", ".jpeg", ".png", ".pdf"];

function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
        if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }

            if (!blnValid) {
                alert("Sorry, the selected file is invalid.");
                oInput.value = "";
                return false;
            }
        }
    }
    return true;
}
var _validFileExtensionsprofilepic = [".jpg", ".jpeg"];

function ValidateSingleInputprofilepic(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
        if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensionsprofilepic.length; j++) {
                var sCurExtension = _validFileExtensionsprofilepic[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }

            if (!blnValid) {
                alert("Sorry, the selected file is invalid.");
                oInput.value = "";
                return false;
            }
        }
    }
    return true;
}

jQuery(function ($) {

    $('body').on('click', '#adminlogin', function (e) {
        // Disable the submit button while evaluating if the form should be submitted
        // $('#adminlogin').prop('disabled', true);

        // var valid = true;
        var a = normal_user_registration_validate();
        if (a) {
            $(this).hide();
            return true;
        }
        else {
            return false;
        }
        // if (!valid) {
        //     // Prevent form from submitting if validation failed
        //     e.preventDefault();

        //     // Reactivate the button if the form was not submitted
        //     $('#adminlogin').prop('disabled', false);
        // }
    });
});

function department_select(department_id)
{ 
    var dept_count = $('input.departments:checked').length;
    
    if(dept_count == 0)
    {
        $('#department_id').val();
        $('#create_user').attr("disabled", "disabled");
    }
    else
    {
        $('#department_id').val(1);
        $('#create_user').removeAttr("disabled");
    }
}
function department_bulkupload_emp_select(department_id)
{
    var sel = $('input[type=checkbox]:checked').map(function(_, el) {
        return $(el).val();
    }).get();

    var dept_count = $('input.departments:checked').length;
    
    if(dept_count == 0)
    {
        $('#department_bulk_upload_id').attr('value', '');
        $('#bulk_upload').attr("disabled", "disabled");
    }
    else
    {
        $('#department_bulk_upload_id').attr('value', sel);
        $('#bulk_upload').removeAttr("disabled");
    }
}
function department_select_emp(department_id)
{ 
    var dept_count = $('input.department_emp:checked').length;
    if(dept_count == 0)
    {
        $('#department_id_emp').val();
        $('#edit_user').attr("disabled", "disabled");
    }
    else
    {
        $('#department_id_emp').val(1);
        $('#edit_user').removeAttr("disabled");
    }
}

function selected_poc(user_id) {
    var user = user_id.split("_");
    var user_id = user[0];
    var employee_id = user[1];
    $('#user_id').attr("value", user_id);
}

function show_create_upload_div() {
    $('#upload_links').slideToggle();
}


function setcategoryid(category_id) {
    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
    var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    var url = path + "/index.php/Registration/department_registration";
    $.post(url, {category_id: category_id}, function (data) {
        if (data != '') {
            window.location.href = url;
        }
    });
}

var _validFileExtensions1 = [".xlsx"];

function ValidateBulkuploadInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
        if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions1.length; j++) {
                var sCurExtension = _validFileExtensions1[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }

            if (!blnValid) {
                alert("Sorry, the selected file is invalid.");
                oInput.value = "";
                return false;
            }
        }
    }
    return true;
}

// jQuery(function($) {

// 	$('body').on('click','#split_no', function (e) {
// 	var aa = $('#split_no').val();
// 	alert(aa);
// });
// });

// $('#split_cout_id').click(function(e)
// { alert("ss");
// 	var aa = document.getElementsByClassName('split_no').value;
// 	alert(aa);
// });

function validatenumber(value) {
    var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
    if (numberRegex.test(value)) {
        $('#error_split_no').html('');
        $('#split_count').prop("disabled", false);
    }
    else {
        $('#error_split_no').html('Only enter valid number');
        $('#split_count').prop("disabled", true);
    }
}

function checkcategory(value) {
    var category = value;
    var expression = /^[0-9A-Za-z_ ,-]+$/;
    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
    var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    var url = path + "/index.php/Category/check_category";
    $.post(url, {category: category}, function (data) {
        if (data != 1) {
            $('#error_category').html('');
            $('#create_category').prop("disabled", false);
            if (expression.test(category)) {
                $('#error_category').html('');
                $('#create_category').prop("disabled", false);
            }
            else {
                $('#error_category').html('Invalid Name');
                $('#create_category').prop("disabled", true);
            }
        }
        else {
            $('#error_category').html('Already Exist');
            $('#create_category').prop("disabled", true);
        }
    });
}

function requireddaysnumber(value) {
    var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
    if (numberRegex.test(value)) {

        // $('#error_split_no').html('');
        // $('#split_count').prop("disabled",false);
    }
    else {
        alert("Enter valid number");
        // $('#error_split_no').html('Only valid number');
        // $('#split_count').prop("disabled",true);
    }
}

function addexternalemployee() {
    // var email = document.getElementsByClassName('escalation_email').value;
    var category = document.getElementById('category').value;
    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
    var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    var url = path + "/index.php/Department_escalation/addexternalemployee";
    $.post(url, {category: category}, function (data) {
        if (data != '') {
            popupcontent_injection(data);
        }
        else {
            var form = 'Invalid Request';
        }
    });

}

function change(id) {
    var cname = document.getElementById(id).className;
    var ab = document.getElementById(id + "_hidden").value;
    document.getElementById(cname + "rating").innerHTML = ab;

    for (var i = ab; i >= 1; i--) {
        document.getElementById(cname + i).src = "star2.png";
    }
    var id = parseInt(ab) + 1;
    for (var j = id; j <= 5; j++) {
        document.getElementById(cname + j).src = "star1.png";
    }
}

function select_rating(value) {
    $('#rating').attr("value", value);
}

function notcomplete() {
    alert("Institute registration not completed.")
}

// function checkexixtmanager()
// {
// 	var manager_id = document.getElementById("manager").value;
// 	alert(manager_id)
// }

function chechpocmanager() {
    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
    var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    base_url = path + "/index.php/Registration/department_head_registration";
    var poc = document.getElementById("poc").value;
    var manager = document.getElementById("manager").value;
    if ((poc && manager) == '') {
        $('.popup_submit_button').attr("href", "javascript:void(0)");
        if (poc == '') {
            $('#error_poc').html('Required');
        }
        else {
            $('#error_poc').html('');
        }
        if (manager == '') {
            $('#error_manager').html('Required');
        }
        else {
            $('#error_manager').html('');
        }
    }
    else {
        $('.popup_submit_button').attr("href", base_url);
    }
}

function checkdepartment(value) {
    var department = value;
    var category = document.getElementById("category").value;

    var expression = /^[0-9A-Za-z_ ,-]+$/;
    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
    var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    var url = path + "/index.php/Department/check_department";
    $.post(url, {department: department, category: category}, function (data) {
        if (data != 1) {
            $('#error_department').html('');
            $('#create_department').prop("disabled", false);
            if (expression.test(department)) {
                $('#error_department').html('');
                $('#create_department').prop("disabled", false);
            }
            else {
                $('#error_department').html('Invalid Name');
                $('#create_department').prop("disabled", true);
            }
        }
        else {
            $('#error_department').html('Already Exist');
            $('#create_department').prop("disabled", true);
        }
    });
}

function checkdepartmentcode(value) {
    var department_code = value;
    var category = document.getElementById("category").value;
    var expression = /^[0-9A-Za-z_ ,-]+$/;
    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
    var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    var url = path + "/index.php/Department/check_department_code";
    $.post(url, {department_code: department_code, category: category}, function (data) {
        if (data != 1) {

            $('#error_department_code').html('');
            $('#create_department').prop("disabled", false);
            if (expression.test(department_code)) {
                $('#error_department_code').html('');
                $('#department_code').prop("disabled", false);
            }
            else {
                $('#error_department_code').html('Invalid Name');
                $('#department_code').prop("disabled", false);
            }
        }
        else {
            $('#error_department_code').html('Already Exist');
            $('#create_department').prop("disabled", true);
        }
    });
}

function checkdepartmentedit(value) {
    var department = value;
    var department_id = document.getElementById("id").value;
    var category = document.getElementById("category").value;
    var expression = /^[0-9A-Za-z_ ,-]+$/;
    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
    var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    var url = path + "/index.php/Department/check_department_edit";
    $.post(url, {
        department: department,
        category: category,
        department_id: department_id
    }, function (data) {
        if (data != 1) {
            $('#error_edepartment').html('');
            $('#edit_department').prop("disabled", false);
            if (expression.test(department)) {
                $('#error_edepartment').html('');
                $('#edit_department').prop("disabled", false);
            }
            else {
                $('#error_edepartment').html('Invalid Name');
                $('#edit_department').prop("disabled", true);
            }
        }
        else {
            $('#error_edepartment').html('Already Exist');
            $('#edit_department').prop("disabled", true);
        }
    });
}

function checkdepartmentcodeedit(value) {
    var department_code = value;
    var department_id = document.getElementById("id").value;
    var category = document.getElementById("category").value;
    var expression = /^[0-9A-Za-z_ ,-]+$/;
    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
    var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    var url = path + "/index.php/Department/check_department_code_edit";
    $.post(url, {
        department_code: department_code,
        category: category,
        department_id: department_id
    }, function (data) {
        if (data != 1) {
            $('#error_edepartment_code').html('');
            $('#edit_department').prop("disabled", false);
            if (expression.test(department_code)) {
                $('#error_edepartment_code').html('');
                $('#edit_department').prop("disabled", false);
            }
            else {
                $('#error_edepartment_code').html('Invalid Name');
                $('#edit_department').prop("disabled", true);
            }
        }
        else {
            $('#error_edepartment_code').html('Already Exist');
            $('#edit_department').prop("disabled", true);
        }
    });
}

//  more employee adding option
jQuery(function ($) {
    $('body').on('click', '#add_more_file_attachement', function () {
        var department_id = document.getElementById('department').value;

        var url = path + "/index.php/Manage_ticket/get_more_file_attachment";
        $.post(url, {}, function (data) {
            if (data != '') {
                $('#add_more_attachement').append(data);
                // $("employee_"+severity_id+'_'+level+" option:selected").remove();
            }
            else {
                $('#add_more_attachement').append(data);
            }
        });
    });
});


function get_ticket_details(id) {
    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
    var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    var url = path + "/index.php/Manage_ticket/ticket_more_details";
    $.post(url, {id: id}, function (data) {
        if (data != '') {
            $('.ticket_details').attr('data-html', true);
            $('.ticket_details').attr('data-content', data);
            $('.ticket_details').popover({
                placement : 'right',
                html : true,
                trigger : 'hover',
                delay: { 
                     show: 5000
                }
            });
            // $('.ticket_details').popover('show');
        }
        else {
            $('.popover').html('');
        }
    });
}

function loadFunction() {
    var content = document.getElementById('editor').innerHTML;
    $('#mailcontent').attr("value", content);
}

function getdetailedmail(id) {
    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
    var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    var url = path + "/index.php/Manage_ticket/maildetaildview";
    $.post(url, {id: id}, function (data) {
        if (data != '') {
            $('#maildetaildview').html(data);
        }
        else {
            $('#maildetaildview').html('');
        }
    });
}

$(document).ready(function () {
    $('[data-toggle="popover"]').popover();
});


function hidetheside() {
    $('#logo').toggle();
    $('#logo-icon').toggle();
}

function checkcategoryadmin(category_id) 
{

    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
    var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    var url = path + "/index.php/Category/check_category_admin";
    $.post(url, {category_id: category_id}, function (data) {
        if (data != 1) 
        {
            $('#main_content').show();
            $('#error_category').html('');
            // $('#email').removeAttr("disabled");
            $('#create_user_admin').prop("disabled", false);
        } 
        else 
        {
            $('#main_content').hide();
            $('#error_category').html('Admin is already exist for selected institute.');
            // $('#email').attr("disabled", "disabled");
            $('#create_user_admin').prop("disabled", true);
        }
    });
}


function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;  
    return re.test(email);
}


function upload_institute_employee_reg_details() {

    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
    var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];

    var url = path + "/index.php/Registration/upload_institute_employee_details";
    $.post(url, {}, function (data) {
        if (data != '') {
            $('#bulk_upload_data').html(data);
        }
        else {
            $('#bulk_upload_data').html('Invalid');
        }
    });
}

$(document).ready(function () {
    $('#poc_detailed').on( "change", function() {
        var op = $( this ).val();
        $('#manager_detailed option').prop('disabled', false);
        $('#manager_detailed option[value='+op+']').prop('disabled', true);
    });
    $('#manager_detailed').on( "change", function() {
        var op = $( this ).val();
        $('#poc_detailed option').prop('disabled', false);
        $('#poc_detailed option[value='+op+']').prop('disabled', true);
    });
});

function get_emp_dept(user_id)
{
    var url = path + "/index.php/User/get_emp_dept";
    $.post(url, {user_id: user_id}, function (data) {
        if (data != '') {
            // $('#' + ticket_id).attr('data-html', true);
            $('#' + user_id).attr('data-content', data);
            $('#' + user_id).popover('show');
        }
        else {
            $('#' + user_id).html('');
        }
    });
}

function disp_lablel_heading(label)
{
    $('#disp_lablel_heading1').html(label + ' Ticket');
    $('#disp_lablel_heading').html(label + ' Ticket');
}

// for logout script starts
var timer = 0;
function auto_logout() {

    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
    var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    var url = path + "/index.php/Logout";
    // this function will redirect the user to the logout script
    window.location = url;
}

function reset_interval1() {
    //resets the timer. The timer is reset on each of the below events:
    // 1. mousemove   2. mouseclick   3. key press 4. scroliing
    //first step: clear the existing timer

    if (timer != 0) {
        clearInterval(timer);
        // second step: implement the timer again
        timer = setInterval("auto_logout()", 1800000);
        // completed the reset of the timer
    }
}

jQuery(function ($) {

    $("body").ready(function () {
        timer = setInterval("auto_logout()", 1800000);
    });

    $(document).on('scroll', function () {
        reset_interval1();
    });

    $("body").on('keypress', function () {
        reset_interval1();
    });

    $("body").on('mousemove', function () {
        reset_interval1();
    });

    $("body").on('click', function () {
        reset_interval1();
    });
});
// logout script ends

function get_all_departments(category_id)
{
    if(category_id !='')
    {
        $('#department_select_cat_id').attr('value', category_id);
        var url = path + "/index.php/User/get_all_departments";
        $.post(url, {category_id: category_id}, function (data) {
            if (data != '') {
                $('.department_details').html(data);
            }
            else {
                $('.department_details').html('No Data Found');
            }
        });
    }
    else{
        $('#department_select_cat_id').attr('value', '');
        $('.department_details').html('');
    }
}

function department_bulkupload_emp_induvidual_select(department_id)
{
    var sel = $('input[type=checkbox]:checked').map(function(_, el) {
        return $(el).val();
    }).get();

    var dept_count = $('input.departments:checked').length;
    
    if(dept_count == 0)
    {
        $('#department_bulk_upload_emp_individual_id').attr('value', '');
        $('#bulk_upload_emp').attr("disabled", "disabled");
    }
    else
    {
        $('#department_bulk_upload_emp_individual_id').attr('value', sel);
        $('#bulk_upload_emp').removeAttr("disabled");
    }
}

function clearformdatas()
{
    $('#f_name').val('');
    $('#error_f_name').html('');
    $('#m_name').val('');
    $('#error_m_name').html('');
    $('#l_name').val('');
    $('#error_l_name').html('');
    $('#email').val('');
    $('#error_email').html('');
    $('#contact_no1').val('');
    $('#error_contact_no1').html('');
    $('#contact_no2').val('');
    $('#error_contact_no2').html('');

}

function init_morris_charts() {
    "undefined" != typeof Morris && (console.log("init_morris_charts"), $("#graph_bar").length && Morris.Bar({
        element: "graph_bar",
        data: [{
            device: "iPhone 4",
            geekbench: 380
        }, {
            device: "iPhone 4S",
            geekbench: 655
        }, {
            device: "iPhone 3GS",
            geekbench: 275
        }, {
            device: "iPhone 5",
            geekbench: 1571
        }, {
            device: "iPhone 5S",
            geekbench: 655
        }, {
            device: "iPhone 6",
            geekbench: 2154
        }, {
            device: "iPhone 6 Plus",
            geekbench: 1144
        }, {
            device: "iPhone 6S",
            geekbench: 2371
        }, {
            device: "iPhone 6S Plus",
            geekbench: 1471
        }, {
            device: "Other",
            geekbench: 1371
        }],
        xkey: "device",
        ykeys: ["geekbench"],
        labels: ["Geekbench"],
        barRatio: .4,
        barColors: ["#26B99A", "#34495E", "#ACADAC", "#3498DB"],
        xLabelAngle: 35,
        hideHover: "auto",
        resize: !0
    }), $("#graph_bar_group").length && Morris.Bar({
        element: "graph_bar_group",
        data: [{
            period: "2016-10-01",
            licensed: 807,
            sorned: 660
        }, {
            period: "2016-09-30",
            licensed: 1251,
            sorned: 729
        }, {
            period: "2016-09-29",
            licensed: 1769,
            sorned: 1018
        }, {
            period: "2016-09-20",
            licensed: 2246,
            sorned: 1461
        }, {
            period: "2016-09-19",
            licensed: 2657,
            sorned: 1967
        }, {
            period: "2016-09-18",
            licensed: 3148,
            sorned: 2627
        }, {
            period: "2016-09-17",
            licensed: 3471,
            sorned: 3740
        }, {
            period: "2016-09-16",
            licensed: 2871,
            sorned: 2216
        }, {
            period: "2016-09-15",
            licensed: 2401,
            sorned: 1656
        }, {
            period: "2016-09-10",
            licensed: 2115,
            sorned: 1022
        }],
        xkey: "period",
        barColors: ["#26B99A", "#34495E", "#ACADAC", "#3498DB"],
        ykeys: ["licensed", "sorned"],
        labels: ["Licensed", "SORN"],
        hideHover: "auto",
        xLabelAngle: 60,
        resize: !0
    }), $("#graphx").length && Morris.Bar({
        element: "graphx",
        data: [{
            x: "2015 Q1",
            y: 2,
            z: 3,
            a: 4
        }, {
            x: "2015 Q2",
            y: 3,
            z: 5,
            a: 6
        }, {
            x: "2015 Q3",
            y: 4,
            z: 3,
            a: 2
        }, {
            x: "2015 Q4",
            y: 2,
            z: 4,
            a: 5
        }],
        xkey: "x",
        ykeys: ["y", "z", "a"],
        barColors: ["#26B99A", "#34495E", "#ACADAC", "#3498DB"],
        hideHover: "auto",
        labels: ["Y", "Z", "A"],
        resize: !0
    }).on("click", function(a, b) {
        console.log(a, b)
    }), $("#graph_area").length && Morris.Area({
        element: "graph_area",
        data: [{
            period: "2014 Q1",
            iphone: 2666,
            ipad: null,
            itouch: 2647
        }, {
            period: "2014 Q2",
            iphone: 2778,
            ipad: 2294,
            itouch: 2441
        }, {
            period: "2014 Q3",
            iphone: 4912,
            ipad: 1969,
            itouch: 2501
        }, {
            period: "2014 Q4",
            iphone: 3767,
            ipad: 3597,
            itouch: 5689
        }, {
            period: "2015 Q1",
            iphone: 6810,
            ipad: 1914,
            itouch: 2293
        }, {
            period: "2015 Q2",
            iphone: 5670,
            ipad: 4293,
            itouch: 1881
        }, {
            period: "2015 Q3",
            iphone: 4820,
            ipad: 3795,
            itouch: 1588
        }, {
            period: "2015 Q4",
            iphone: 15073,
            ipad: 5967,
            itouch: 5175
        }, {
            period: "2016 Q1",
            iphone: 10687,
            ipad: 4460,
            itouch: 2028
        }, {
            period: "2016 Q2",
            iphone: 8432,
            ipad: 5713,
            itouch: 1791
        }],
        xkey: "period",
        ykeys: ["iphone", "ipad", "itouch"],
        lineColors: ["#26B99A", "#34495E", "#ACADAC", "#3498DB"],
        labels: ["iPhone", "iPad", "iPod Touch"],
        pointSize: 2,
        hideHover: "auto",
        resize: !0
    }), $("#graph_donut").length && Morris.Donut({
        element: "graph_donut",
        data: [{
            label: "Jam",
            value: 25
        }, {
            label: "Frosted",
            value: 40
        }, {
            label: "Custard",
            value: 25
        }, {
            label: "Sugar",
            value: 10
        }],
        colors: ["#26B99A", "#34495E", "#ACADAC", "#3498DB"],
        formatter: function(a) {
            return a + "%"
        },
        resize: !0
    }), $("#graph_line").length && (Morris.Line({
        element: "graph_line",
        xkey: "year",
        ykeys: ["value"],
        labels: ["Value"],
        hideHover: "auto",
        lineColors: ["#26B99A", "#34495E", "#ACADAC", "#3498DB"],
        data: [{
            year: "2012",
            value: 20
        }, {
            year: "2013",
            value: 10
        }, {
            year: "2014",
            value: 5
        }, {
            year: "2015",
            value: 5
        }, {
            year: "2016",
            value: 20
        }],
        resize: !0
    }), $MENU_TOGGLE.on("click", function() {
        $(window).resize()
    })))
}

function init_flot_chart() {
    if ("undefined" != typeof $.plot) {
        console.log("init_flot_chart");
        for (var a = [
                [gd(2012, 1, 1), 17],
                [gd(2012, 1, 2), 74],
                [gd(2012, 1, 3), 6],
                [gd(2012, 1, 4), 39],
                [gd(2012, 1, 5), 20],
                [gd(2012, 1, 6), 85],
                [gd(2012, 1, 7), 7]
            ], b = [
                [gd(2012, 1, 1), 82],
                [gd(2012, 1, 2), 23],
                [gd(2012, 1, 3), 66],
                [gd(2012, 1, 4), 9],
                [gd(2012, 1, 5), 119],
                [gd(2012, 1, 6), 6],
                [gd(2012, 1, 7), 9]
            ], d = [], e = [
                [0, 1],
                [1, 9],
                [2, 6],
                [3, 10],
                [4, 5],
                [5, 17],
                [6, 6],
                [7, 10],
                [8, 7],
                [9, 11],
                [10, 35],
                [11, 9],
                [12, 12],
                [13, 5],
                [14, 3],
                [15, 4],
                [16, 9]
            ], f = 0; f < 30; f++) d.push([new Date(Date.today().add(f).days()).getTime(), randNum() + f + f + 10]);
        var g = {
                series: {
                    lines: {
                        show: !1,
                        fill: !0
                    },
                    splines: {
                        show: !0,
                        tension: .4,
                        lineWidth: 1,
                        fill: .4
                    },
                    points: {
                        radius: 0,
                        show: !0
                    },
                    shadowSize: 2
                },
                grid: {
                    verticalLines: !0,
                    hoverable: !0,
                    clickable: !0,
                    tickColor: "#d5d5d5",
                    borderWidth: 1,
                    color: "#fff"
                },
                colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
                xaxis: {
                    tickColor: "rgba(51, 51, 51, 0.06)",
                    mode: "time",
                    tickSize: [1, "day"],
                    axisLabel: "Date",
                    axisLabelUseCanvas: !0,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: "Verdana, Arial",
                    axisLabelPadding: 10
                },
                yaxis: {
                    ticks: 8,
                    tickColor: "rgba(51, 51, 51, 0.06)"
                },
                tooltip: !1
            },
            h = {
                grid: {
                    show: !0,
                    aboveData: !0,
                    color: "#3f3f3f",
                    labelMargin: 10,
                    axisMargin: 0,
                    borderWidth: 0,
                    borderColor: null,
                    minBorderMargin: 5,
                    clickable: !0,
                    hoverable: !0,
                    autoHighlight: !0,
                    mouseActiveRadius: 100
                },
                series: {
                    lines: {
                        show: !0,
                        fill: !0,
                        lineWidth: 2,
                        steps: !1
                    },
                    points: {
                        show: !0,
                        radius: 4.5,
                        symbol: "circle",
                        lineWidth: 3
                    }
                },
                legend: {
                    position: "ne",
                    margin: [0, -25],
                    noColumns: 0,
                    labelBoxBorderColor: null,
                    labelFormatter: function(a, b) {
                        return a + "&nbsp;&nbsp;"
                    },
                    width: 40,
                    height: 1
                },
                colors: ["#96CA59", "#3F97EB", "#72c380", "#6f7a8a", "#f7cb38", "#5a8022", "#2c7282"],
                shadowSize: 0,
                tooltip: !0,
                tooltipOpts: {
                    content: "%s: %y.0",
                    xDateFormat: "%d/%m",
                    shifts: {
                        x: -30,
                        y: -50
                    },
                    defaultTheme: !1
                },
                yaxis: {
                    min: 0
                },
                xaxis: {
                    mode: "time",
                    minTickSize: [1, "day"],
                    timeformat: "%d/%m/%y",
                    min: d[0][0],
                    max: d[20][0]
                }
            },
            i = {
                series: {
                    curvedLines: {
                        apply: !0,
                        active: !0,
                        monotonicFit: !0
                    }
                },
                colors: ["#26B99A"],
                grid: {
                    borderWidth: {
                        top: 0,
                        right: 0,
                        bottom: 1,
                        left: 1
                    },
                    borderColor: {
                        bottom: "#7F8790",
                        left: "#7F8790"
                    }
                }
            };
        $("#chart_plot_01").length && (console.log("Plot1"), $.plot($("#chart_plot_01"), [a, b], g)), $("#chart_plot_02").length && (console.log("Plot2"), $.plot($("#chart_plot_02"), [{
            label: "Email Sent",
            data: d,
            lines: {
                fillColor: "rgba(150, 202, 89, 0.12)"
            },
            points: {
                fillColor: "#fff"
            }
        }], h)), $("#chart_plot_03").length && (console.log("Plot3"), $.plot($("#chart_plot_03"), [{
            label: "Registrations",
            data: e,
            lines: {
                fillColor: "rgba(150, 202, 89, 0.12)"
            },
            points: {
                fillColor: "#fff"
            }
        }], i))
    }
}


function get_value(input_value)
{ //alert(input_value)
    if(input_value=='BOOKED')
    {
        $('#booked_div').show();
        $('#booked_div2').show();
        $('#callack_div1').hide();
        $('#callack_div2').hide();
    }
    else if(input_value=='CALL BACK')
    {
        $('#callack_div1').show();
        $('#callack_div2').show();
        $('#booked_div').hide();
        $('#booked_div2').hide();
    }

    else{
        $('#booked_div').hide();
        $('#callack_div1').hide();
        $('#callack_div2').hide();
        $('#booked_div2').hide();
    }
}

$(document).ready(function () {
    $('.bulk_upload_data').click(function (e) {
        e.preventDefault();
            var isValid = true;
            $('.check_fields_name').each(function () {
                if ($.trim($(this).val()) == '') {
                    isValid = false;
                    $(this).css({
                        "border": "1px solid red",
                        // "background": "#FFCECE"
                    });
                }
                else {
                    $(this).css({
                        "border": "",
                        "background": ""
                    });
                }
            });
            var allTextBoxes = [];
            $('.check_fields_email').each(function () {
                allTextBoxes.push($(this).val());
            });
            var dup_emails = [];
            var sorted_arr = allTextBoxes.sort();
            for (var i = 0; i < allTextBoxes.length - 1; i++) {
                if (sorted_arr[i + 1] == sorted_arr[i]) {
                    dup_emails.push(sorted_arr[i]);
                    
                    isValid = false; 
                }
            }  
           
            

            $('.check_fields_email').each(function () { 

                if($.inArray($(this).val(), dup_emails)!=-1) {
                    $( "#email_valid_msg-" + $(this).data('ival') ).html('Email repeting');
                    $(this).css({
                        'border': '1px solid red'
                    });
                }
                else{
                    $( "#email_valid_msg-" + $(this).data('ival') ).html('');
                    $(this).css({
                        'border': ''
                    });
                }

                if ($.trim($(this).val()) != '') { 
                    if (!validateEmail($(this).val()) || $(this).val() == '') {
                        e.preventDefault();
                        $( "#email_valid_msg-" + $(this).data('ival') ).html('Invalid Email');
                        $(this).css({
                            'border': '1px solid red'
                        });                   
                        isValid = false;
                        // return false;
                    }       
                }        
                if($.inArray($(this).val(), dup_emails)!=-1) {
                    $( "#email_valid_msg-" + $(this).data('ival') ).html('Email repeting');
                }                
                    
            });
  
                var emails = $('[data-name="employee_email"]').serialize();
                var pathstring = String(window.location);
                var patharray = pathstring.split("/");
                var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
                // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];
                var url = path + "/index.php/Guest/check_guest_email";
                $.post(url, {email: emails}, function (data) {
                    var data = JSON.parse(data);
                    $('.check_fields_email').each(function () {
                        var e_this =  $(this);
                        var e_this_val =  $(this).val();                                
                        if($.inArray(e_this_val, data)!=-1) {
                            $( "#email_valid_msg-" + $(this).data('ival') ).html('Email is already existing');
                            e_this.css({
                                'border': '1px solid red'
                            });
                            isValid = false; 
                        }else {
                            // $( "#email_valid_msg-" + $(this).data('ival') ).html('');
                            // e_this.css({
                            //     'border': ''
                            // });                                    
                        }
                    }); 
                    if(isValid) {                                 
                        $('#bulkupload_employee_registration').submit();
                    }
                });

            if (isValid == false)
                e.preventDefault();

        });
});

function checkguestemail(email)
{
    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
    var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];
    var url = path + "/index.php/Guest/check_guest_email";
    $.post(url, {email: email}, function (data) {
        if (data == 1) 
        {
            alert("This Email Already Exist");
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
}

function checkmobile(mobile)
{
    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
    var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];
    var url = path + "/index.php/Guest/check_mobile";
    $.post(url, {mobile: mobile}, function (data) {
        if (data == 1) 
        {
            alert("This Mobile Already Exist");
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
}

function get_transport_value(input_value)
{ 
    if(input_value=='Yes')
    {
        $('#vehicle_type_id').show();
    }
    else{
        $('#vehicle_type_id').hide();
    }
}

function upload_employee_reg_details() {
    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
    var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];

    var url = path + "/index.php/Guest/upload_guest_details";
    $.post(url, {}, function (data) {
        if (data != '') {
            $('#bulk_upload_data').html(data);
        }
        else {
            $('#bulk_upload_data').html('Invalid');
        }
    });
}

function upload_vendor_details(id) { 
    var vendor_id = $("#vendor_id").val();
    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
    var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];

    var url = path + "/index.php/Vendor/upload_vendor_details";
    $.post(url, {vendor_id:vendor_id}, function (data) {
        if (data != '') {
            $('#bulk_vendor_upload_data').html(data);
        }
        else {
            $('#bulk_vendor_upload_data').html('Invalid');
        }
    });
}

function get_enquiries_popup()
{
    var enquiry_id = $("#enquiry_id").val();
    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
    var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];

    var url = path + "/index.php/Guest/add_enquires_popup";
    $.post(url, {enquiry_id:enquiry_id}, function (data) {
        if (data != '') {
            $('#add_enquires_popup_data').html(data);
        }
        else {
            $('#add_enquires_popup_data').html('Invalid');
        }
    });
}

function get_enquiries_edit_popup(targetData)
{
    var guest_enquiry_table_id = targetData.getAttribute('value');
    ///var pathstring = String(window.location);
    //var patharray = pathstring.split("/");
    //var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];

    var url = sitebaseurl + "/index.php/Guest/edit_enquires_popup";
    //alert(guest_enquiry_table_id);
    $.post(url, {id:guest_enquiry_table_id}, function (data) {
        if (data != '') {
            $('#edit_enquires_popup_data').html(data);
        }
        else {
            $('#edit_enquires_popup_data').html('Invalid');
        }
    });
}

function crmeditpopup(user_id) {
    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
     var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];
    var url = path + "/index.php/Vendor/edit_crm";
    $.post(url, {user_id: user_id}, function (data) {
        if (data != '') { 
            $('#edit_employee_data').html(data);
        }
        else {
            $('#edit_employee_data').html('Invalid Data');
        }
    });
}
function locationeditpopup(id) {
    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
     var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];
    var url = path + "/index.php/Vendor/edit_location";
    $.post(url, {id: id}, function (data) {
        if (data != '') { 
            $('#edit_employee_data').html(data);
        }
        else {
            $('#edit_employee_data').html('Invalid Data');
        }
    });
}

function referenceeditpopup(id) {
    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
     var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];
    var url = path + "/index.php/Vendor/edit_reference";
    $.post(url, {id: id}, function (data) {
        if (data != '') { 
            $('#edit_reference_data').html(data);
        }
        else {
            $('#edit_reference_data').html('Invalid Data');
        }
    });
}

function get_edit_accommodtion(targetData)
{
    
    var trid = targetData.getAttribute('value'); // table row ID 
    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
     var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];
    var url = path + "/index.php/Vendor/edit_accommodation";
    $.post(url, {trid: trid}, function (data) {
        if (data != '') { 
            $('#edit_accommodation_data').html(data);
        }
        else {
            $('#edit_accommodation_data').html('Invalid Data');
        }
    });
    // var id = $(this).attr('id');
    // alert(id);
}

function get_callback_edit(targetData)
{
    var trid = targetData.getAttribute('value');
    var div_id= '#enquiry2';
    $('#callback tbody').on( 'dblclick', 'tr', function (event) {
        document.location = "Guest/add_guest_enquiry_view/" + trid+div_id;
    });
}
function get_pending_edit(targetData)
{
    var trid = targetData.getAttribute('value');
    var div_id= '#enquiry2';
    $('#pending_enq tbody').on( 'dblclick', 'tr', function (event) {
        document.location = "Guest/add_guest_enquiry_view/" + trid+div_id;
    });
}
//Edit vendor type popup
function vendortypepopup(id) 
{
    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
     var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];
    var url = path + "/index.php/Vendor/edit_vendor_type";
    $.post(url, {id: id}, function (data) {
        if (data != '') { 
            $('#edit_vendor_data').html(data);
        }
        else {
            $('#edit_vendor_data').html('Invalid Data');
        }
    });
}

function vehicletypepopup(id) 
{
    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
     var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];
    var url = path + "/index.php/Vendor/edit_vehicle";
    $.post(url, {id: id}, function (data) {
        if (data != '') { 
            $('#edit_vehicle_data').html(data);
        }
        else {
            $('#edit_vehicle_data').html('Invalid Data');
        }
    });
}
function categorypopup(id) 
{
    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
     var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    //  var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];
    var url = path + "/index.php/Vendor/edit_category_type";
    $.post(url, {id: id}, function (data) {
        if (data != '') { 
            $('#edit_category_data').html(data);
        }
        else {
            $('#edit_category_data').html('Invalid Data');
        }
    });
}
function enquiry_status_edit_popup(id) 
{ 
    var pathstring = String(window.location);
    var patharray = pathstring.split("/");
     var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
    //  var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];
    var url = path + "/index.php/Vendor/edit_status";
    $.post(url, {id: id}, function (data) {
        
        if (data != '') { 
            $('#edit_status_data').html(data);
        }
        else {
            $('#edit_status_data').html('Invalid Data');
        }
    });
}