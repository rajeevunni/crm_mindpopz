<?php
$this->load->view('includes/head');
?>

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> -->

<div class="right_col" role="main" style="min-height: 600px;">
    <div class="page-title">
        <div class="title_left" style="width: 15%;" >
            <h3> Dashboard </h3>
        </div> 
    </div> 
    <br/><br/><br/>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12" >
            <div class="x_panel">
                <div class="x_title">
                    <h2> <i class="fa fa-bar-chart"></i>&nbsp; Company Wise Deal Details</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div id="company_wise" style="width:100%; height:250px;"></div>
                </div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12" >
            <div class="x_panel">
                <div class="x_title">
                    <h2> <i class="fa fa-line-chart"></i>&nbsp; CRM Wise Deal Details</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div id="crm_wise" style="width:100%; height:250px;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12" >
            <div class="panel panel-warning">
                <div class="panel-heading result_vendor">
                    <h2> <i class="fa fa-bars"></i>&nbsp; Pending Call Back Details</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                <div style="height:300px;">
                        <table id="callback" class="table table-striped table-no-spacing " cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <!-- <th style="width: 30px;">No.</th> -->
                                    <th style="width: 150px;">Guest Name</th>
                                    <th style="width: 150px;">Enquiry Date</th>
                                    <th style="width: 150px;">Enquiry Ref</th>
                                    <th style="width: 150px;">Call Back Date</th>
                                    <th style="width: 150px;">Call Back Time</th>
                                    <th style="width: 150px;">CRM</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    //$i = 1;
                                    foreach ($pending_call_back as $call_back) {
                                        ?>
                                        <tr value="<?php echo $call_back['id']; ?>" onclick="get_callback_edit(this)">
                                            <!-- <td></td> -->
                                            <td><?php echo $call_back['guest_name'];?></td>
                                            <td><?php echo date('d-M-Y', strtotime($call_back['enquiry_date']));?></td>  
                                            <td><?php echo $call_back['enquiry_reference'];?></td>
                                            <td><?php echo date('d-M-Y', strtotime($call_back['call_back_date'])); ?></td>
                                            <td><?php echo $call_back['call_back_time'];?></td>
                                            <td><?php echo $call_back['crm_name'];?></td>
                                        </tr>
                                        <?php
                                    
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12" >
            <div class="panel panel-warning">
                <div class="panel-heading result_vendor">
                    <h2> <i class="fa fa-bars"></i>&nbsp; Pending Enquiry Details</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <div style="height:300px;">
                        <table id="pending_enq" class="table table-striped table-no-spacing " cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <!-- <th style="width: 30px;">No.</th> -->
                                    <th style="width: 180px;">Enquiry Reference Number</th>
                                    <th style="width: 150px;">Guest Name</th>
                                    <th style="width: 150px;">CRM</th>
                                    <th style="width: 100px;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    //$i = 1;
                                    foreach ($all_pending_guest_details as $details) {
                                        ?>
                                        <tr value="<?php echo $details['id']; ?>" onclick="get_pending_edit(this)">
                                            <!-- <td></td> -->
                                            <td><?php echo $details['guest_enquiry_ref']; ?></td>
                                            <td><?php echo $details['guest_name']; ?></td>  
                                            <td><?php echo $details['crm_name']; ?></td>
                                            <td><?php echo $details['enquiry_status'];?></td>
                                        </tr>
                                        <?php
                                    // $i++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // $("#graphx1").css("height","100%")

    Morris.Bar({
        element: 'company_wise',
        data: [<?php echo $chartData; ?>],
        lineColors:['#ED5D5D'],
        xkey: 'month',
        ykeys: ['month_sum','month_total'],
        labels: ['Sum','Total Booking'],
        barColors: ['#49a9f1'],
        xLabelAngle: 0,
        xLabelAngle: 30,
        hideHover: 'auto',
        resize: true,
        redraw: true
    });

    Morris.Bar({
        element: 'crm_wise',
        data: <?php echo $CrmData; ?>,
        lineColors:['#ED5D5D'],
        xkey: 'xparameter',
        ykeys: 'name',
        labels: 'CRM',
        // barRatio: 0.4,
        barColors: ['#3980B5'],
        xLabelAngle: 0,
        // ymax:180,
        xLabelAngle: 60,
        hideHover: 'auto',
        // stacked: true,
        resize: true,
        redraw: true
    });

    // var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    // Morris.Area({
    //     element: 'graph_area1',
    //     hideHover: 'auto',
    //     resize: true,
    //     lineColors: ['#3980B5', '#26B99A'],
    //     data: <?php //echo $line_chart; ?>,
    //     xkey: 'm',
    //     ykeys: ['a', 'b'],
    //     labels: ['Resolved Tickets', 'Total Tickets'],
    //     // ymax:140,
    //     xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
    //         var month = months[x.getMonth()];
    //         return month;
    //     },
    //     dateFormat: function(x) {
    //         var month = months[new Date(x).getMonth()];
    //         return month;
    //     },
    // });

    // Morris.Donut({
    //     element: 'graph_donut1',
    //     colors: ['#ACADAC', '#3498DB', '#DD3233 ', '#26B99A', '#E7701F'],
    //     data: <?php //echo $donut_chart_ticket_status; ?>
        
    // });

</script>

<?php 
$this->load->view('includes/footer');
?>
             