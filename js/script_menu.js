jQuery(function($) {
    $('#general_settings').click(function () {
        $("#general__mlinks").toggle("slow", function () {
            $('#general__mlinks').css({
                'background-color': '#005DA8'
            });
        });
    });

    
    $('#user_management').click(function () {
        $("#internal_user_mlinks").toggle("slow", function () {
            $('#internal_user_mlinks').css({
                'background-color': '#DB7676'
            });
        });
    });

    $('#mail_template').click(function () {
        $("#mail_template_mlinks").toggle("slow", function () {
            $('#mail_template_mlinks').css({
                'background-color': '#537751'
            });
        });
    });

    $('#mail_box').click(function () {
        $("#mail_box_mlinks").toggle("slow", function () {
            $('#mail_box_mlinks').css({
                'background-color': '#537751'
            });
        });
    });


    /*----------------------------------*/

    //For Toggle + and - in menu
    $('.dblink__wrp').click(function () {

        if ($(this).find('em').hasClass('minus'))
        {
            $(this).find('em').removeClass('minus');
        }
        else
        {
            $(this).find('em').addClass('minus');
        }
    });
//For Toggle + and - in menu end

    ////Menu End///
});
