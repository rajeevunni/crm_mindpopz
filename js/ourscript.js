
var sitebaseurl = "http://localhost/crm-mindpopz/crm_mindpopz";
$(document).ready(function(){
    
    var mytable=$('#our_datatable').DataTable({
        "oLanguage": {
            "sSearch": "Filter Data"
          },
          "iDisplayLength": -1,
          "sPaginationType": "full_numbers",
    });

    $('#our_datatable tbody').on( 'dblclick', 'tr', function (event) {
      
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            mytable.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }  
        var id = mytable.row(this).data();      
        console.log("add_guest_enquiry_view/" + id[1])        
        document.location = "add_guest_enquiry_view/" + id[1];

    } );
     var mytable1=$('#vendor_datatbale').DataTable();
     $('#vendor_datatbale tbody').on( 'dblclick', 'tr', function (event) {
      
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            mytable1.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }  
        var id = mytable1.row(this).data(); 
        console.log("edit_vendor_details/" + id[1])        
        document.location = "edit_vendor_details/" + id[1];

    } );

    $('#vendor_search').on( 'keyup', function () {
        mytable1.search( this.value ).draw();
        
    });  
   
    $('#search_guest_enquiry').on( 'keyup', function () {
        mytable.search( this.value ).draw();
    });  
   
    $('#our_datatable tbody .delete_guest').on('click', function (event) {
        var guest_id = $('#guest_id').val();
        
        var result = window.confirm("Do you want to delete?");
        if(result== true) 
        {
            var pathstring = String(window.location);
            var patharray = pathstring.split("/");
            var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
            // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];
            var url = path + "/index.php/Guest/delete_guest";
            $.post(url, {guest_id:guest_id}, function (data) 
            { 	
                if (data!='') 
                {
                }
            });
            window.alert("This guest was successfully deleted.");
            window.location.reload();
        }
    });

    $('#our_datatable tbody .delete_vendor').on('click', function (event) {
        var vendor_id = $('#vendor_id').val();
        var result = window.confirm("Do you want to delete?");
        if(result== true) 
        {
            var pathstring = String(window.location);
            var patharray = pathstring.split("/");
            var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
            // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];
            var url = path + "/index.php/Vendor/delete_vendor";
            $.post(url, {vendor_id:vendor_id}, function (data) 
            { 	
                if (data!='') 
                {
                }
            });
            window.alert("This vendor was successfully deleted.");
            window.location.reload();
        }
    });

   
    
    
    
    
    $('#crm_view').DataTable();

    $('#crm_view tbody .delete_crm').on('click', function (event) {
        var guest_id = $('#guest_id').val();
        //alert(guest_id);
        var result = window.confirm("Do you want to delete?");
        if(result== true) 
        {
            var pathstring = String(window.location);
  
            var patharray = pathstring.split("/");
            var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
            // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];
            var url = path + "/index.php/Vendor/delete_crm";
            $.post(url, {guest_id:guest_id}, function (data) 
            { 	
                if (data!='') 
                {
                }
            });
            window.alert("This CRM was successfully deleted.");
            window.location.reload();
        }
    });
    $('#reference_view').DataTable();
    $('#search_accommodation').DataTable();

    var dateStart = null;
    var dateStop = null;

    $('input[name="datepicker_to"]').daterangepicker(
        {
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                cancelLabel: 'Clear',
                format: 'DD-MM-YYYY'
              },              
        },
        function(start, end, label) {
            dateStop = start._d
            mytable.draw();
            // alert("A new date range was chosen: " + start.format('DD-MMMM-YYYY') + ' to ' + end.format('DD-MMMM-YYYY'));
        }
    );
    $('input[name="datepicker_from"]').daterangepicker(
        {
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                cancelLabel: 'Clear',
                format: 'DD-MM-YYYY'
              },              
        },
        function(start, end, label) {
            dateStart = start._d
            mytable.draw();
            // alert("A new date range was chosen: " + start.format('DD-MMMM-YYYY') + ' to ' + end.format('DD-MMMM-YYYY'));
        }
    ); 

    $('#datepicker_from, #datepicker_to').val("")

    $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {            
            var min = dateStart;          
            var max = dateStop;
            var startDate = new Date(data[2]);
            if (min == null && max == null) { return true; }
            if (min == null && startDate <= max) { return true;}
            if(max == null && startDate >= min) {return true;}
            if (startDate <= max && startDate >= min) { return true; }
    });
    
    var accommodation=$('#accommodation_view_table').DataTable({
        "oLanguage": {
            "sSearch": "Filter Data"
          },
          "iDisplayLength": -1,
          "sPaginationType": "full_numbers",
          
    });
    var start_date = null;
    var end_date = null;

    $('input[name="end_date"]').daterangepicker(
        {
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                cancelLabel: 'Clear',
                format: 'DD-MM-YYYY'
              },              
        },
        function(start, end, label) {
            end_date = start._d
            accommodation.draw();
            // alert("A new date range was chosen: " + start.format('DD-MMMM-YYYY') + ' to ' + end.format('DD-MMMM-YYYY'));
        }
    );
    $('input[name="start_date"]').daterangepicker(
        {
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                cancelLabel: 'Clear',
                format: 'DD-MM-YYYY'
              },              
        },
        function(start, end, label) {
            start_date = start._d
            accommodation.draw();
            // alert("A new date range was chosen: " + start.format('DD-MMMM-YYYY') + ' to ' + end.format('DD-MMMM-YYYY'));
        }
    ); 

    $('#start_date, #end_date').val("")

    $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {            
            var min = start_date;          
            var max = end_date;
            var startDate = new Date(data[2]);
            if (min == null && max == null) { return true; }
            if (min == null && startDate <= max) { return true;}
            if(max == null && startDate >= min) {return true;}
            if (startDate <= max && startDate >= min) { return true; }
    });
});

function delete_vechile_type(targetData)
{
    var vehicle_id = targetData.getAttribute('value');
    var result = window.confirm("Do you want to delete?");
    if(result== true) 
    {
        var pathstring = String(window.location);
        var patharray = pathstring.split("/");
        var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
        // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];
        var url = path + "/index.php/Vendor/delete_vehicle";
        $.post(url, {vehicle_id:vehicle_id}, function (data) 
        { 	
            if (data!='') 
            {
            }
        }); 
        window.location.reload();
    }
}


function delete_location(targetData)
{
    var location_id = targetData.getAttribute('value');
    var result = window.confirm("Do you want to delete?");
    if(result== true) 
    {
        var pathstring = String(window.location);
        var patharray = pathstring.split("/");
        var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
        // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];
        var url = path + "/index.php/Vendor/delete_location";
        $.post(url, {location_id:location_id}, function (data) 
        { 	
            if (data!='') 
            {
            }
        }); 
        window.location.reload();
    }
}
function delete_vendor_type(targetData)
{
    var vendor_type_id = targetData.getAttribute('value');
    var result = window.confirm("Do you want to delete?");
    if(result== true) 
    {
        var pathstring = String(window.location);
        var patharray = pathstring.split("/");
        var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
        // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];
        var url = path + "/index.php/Vendor/delete_vendor_type";
        $.post(url, {vendor_type_id:vendor_type_id}, function (data) 
        { 	
            if (data!='') 
            {
            }
        }); 
        window.location.reload();
    }
}
function delete_category_type(targetData)
{
    var vendor_category_id = targetData.getAttribute('value'); alert(vendor_category_id)
   
    var result = window.confirm("Do you want to delete?");
    if(result== true) 
    {
        var pathstring = String(window.location);
        var patharray = pathstring.split("/");
        var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
        // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];
        var url = path + "/index.php/Vendor/delete_category_type";
        $.post(url, {vendor_category_id:vendor_category_id}, function (data) 
        { 	
            if (data!='') 
            {
            }
        }); 
        window.location.reload();
    }
}
function delete_reference(targetData)
{
    var reference_id = targetData.getAttribute('value');
    // alert(reference_id);
    var result = window.confirm("Do you want to delete?");
    if(result== true) 
    {
        var pathstring = String(window.location);
        var patharray = pathstring.split("/");
        var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
        // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];
        var url = path + "/index.php/Vendor/delete_reference";
        $.post(url, {reference_id:reference_id}, function (data) 
        { 	
            if (data!='') 
            {
            }
        }); 
        window.location.reload();
    }
}
function delete_enquiry_status(targetData)
{
    var status_id = targetData.getAttribute('value');
    var result = window.confirm("Do you want to delete?");
    if(result== true) 
    {
        var pathstring = String(window.location);
        var patharray = pathstring.split("/");
        var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
        // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];
        var url = path + "/index.php/Vendor/delete_enquiry_status";
        $.post(url, {status_id:status_id}, function (data) 
        { 	
            if (data!='') 
            {
            }
        }); 
        window.location.reload();
    }
}

function delete_enquiry (targetData)
{
    var guest_enquiry_id = targetData.getAttribute('value');
    // alert(guest_enquiry_id);
    var result = window.confirm("Do you want to delete?");
    if(result== true) 
    {
        var pathstring = String(window.location);
        var patharray = pathstring.split("/");
        var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
        // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];
        var url = path + "/index.php/Guest/delete_guest";
        $.post(url, {guest_enquiry_id:guest_enquiry_id}, function (data) 
        { 	
            if (data!='') 
            {
            }
        }); 
        window.location.reload();
    }
}
function delete_accommodation (targetData)
{
    var accommodation_id = targetData.getAttribute('value');
  
    var result = window.confirm("Do you want to delete?");
    if(result== true) 
    {
        var pathstring = String(window.location);
        var patharray = pathstring.split("/");
        var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3];
        // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];
        var url = path + "/index.php/Vendor/delete_accommodation";
        $.post(url, {accommodation_id:accommodation_id}, function (data) 
        { 	
            if (data!='') 
            {
            }
        }); 
        window.location.reload();
    }
}

function delete_enquiry_table (targetData)
{
    var guest_enquiry_table_id = targetData.getAttribute('value');
     //alert(guest_enquiry_table_id);
    var result = window.confirm("Do you want to delete?");
    if(result== true)
    {
        //var pathstring = String(window.location);
        //var patharray = pathstring.split("/");
        //var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3]+ '/' + patharray[4];
        // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];
        var url = sitebaseurl + "/index.php/Guest/delete_guest_enquiry_table";
        //alert(url);
        $.post(url, {guest_enquiry_table_id:guest_enquiry_table_id}, function (data)
        {
            //console.log(data);

            if (data!='')
            {
                window.location.reload();
            }
        });

    }
}

function delete_room_type (targetData)
{
    var roomtypeid = targetData.getAttribute('value');
    //alert(guest_enquiry_table_id);
    var result = window.confirm("Do you want to delete?");
    if(result== true)
    {
        //var pathstring = String(window.location);
        //var patharray = pathstring.split("/");
        //var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3]+ '/' + patharray[4];
        // var path = patharray[0] + '//' + patharray[2] + '/' + patharray[3] + '/' + patharray[4];
        var url = sitebaseurl + "/index.php/Vendor/delete_roomtype";
        //alert(url);
        $.post(url, {roomtypeid:roomtypeid}, function (data)
        {
            //console.log(data);

            if (data!='')
            {
                window.location.reload();
            }
        });

    }
}
