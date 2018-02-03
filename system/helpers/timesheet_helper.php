<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

ini_set('memory_limit', '-1');
ini_set('max_execution_time', 500);

function download_guest_details($folder, $filename, $guest_details) {
    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);

    define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
    date_default_timezone_set('Europe/London');

    require_once dirname(__FILE__) . '/Classes/PHPExcel.php';

    $objPHPExcel = new PHPExcel();

    $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
            ->setLastModifiedBy("Maarten Balliauw")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setSubject("Office 2007 XLSX Test Document")
            ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Test result file");

    $heading = array(
        'font' => array(
            'bold' => true,
            'color' => array('rgb' => 'FFFFFF'),
            'size' => 10,
            'name' => 'Calibri'
        ),
        'alignment' => array(
            'wrap' => true,
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        ),
    );
    $categoryheaderstyle = array(
        'font' => array(
            'bold' => true,
            'color' => array('rgb' => '000000'),
            'size' => 12,
            'name' => 'Calibri'
        ),
        'alignment' => array(
            'wrap' => true,
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        ),
    );

    $columnheaderstyle = array(
        'font' => array(
            'bold' => true,
            'color' => array('rgb' => '000000'),
            'size' => 12,
            'name' => 'Calibri'
        ),
        'alignment' => array(
            'wrap' => true,
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        ),
    );
    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);

    $i = 2;
    $same = 0;
    $count = 0;
    
    if(sizeof($guest_details)>0 )
    {
        $i = 2;
        $j =1;
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Sl No.');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Date');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Guest Id');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Enq Ref No.');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Guest Name');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Mob: number');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'E-Mail');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'City');
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'Reference');
        $objPHPExcel->getActiveSheet()->setCellValue('J1', 'Ext Ref No.');
        $objPHPExcel->getActiveSheet()->setCellValue('K1', 'CRM');
        $objPHPExcel->getActiveSheet()->setCellValue('L1', 'Remark');
        $objPHPExcel->getActiveSheet()->setCellValue('M1', 'Status');
        $objPHPExcel->getActiveSheet()->setCellValue('N1', 'Booking Date');
        $objPHPExcel->getActiveSheet()->setCellValue('O1', 'Booking Amount');
        $objPHPExcel->getActiveSheet()->setCellValue('P1', 'Call Back Date');
        $objPHPExcel->getActiveSheet()->setCellValue('Q1', 'Call Back Time');

        foreach ($guest_details as $data) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $j);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, date('d-M-Y', strtotime($data['enquiry_date'])));
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $data['guest_details_ref']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $data['guest_enquiry_ref']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $data['guest_name']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $data['guest_mobile']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $data['guest_email']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $data['guest_city']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $data['enquiry_reference']);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $i, $data['enquiry_ext_rfn_no']);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $i, $data['crm_name']);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $i, $data['enquiry_remarks']);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $i, $data['enquiry_status']);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $i, $data['booking_date']);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $i, $data['booking_amount']);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $i, $data['call_back_date']);
            $objPHPExcel->getActiveSheet()->setCellValue('Q' . $i, $data['call_back_time']);
            $i++;
            $j++;
        }

        $objPHPExcel->getActiveSheet()->getStyle('A1:Q1')->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'FF9802')
                )
            )
        );
        $objPHPExcel->getActiveSheet()->getStyle('A1:Q1')->applyFromArray($heading);

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
        

        $objPHPExcel->getActiveSheet()
        ->getStyle('A')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
        ->getStyle('B')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

        $objPHPExcel->getActiveSheet()
        ->getStyle('C')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
        ->getStyle('D')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
        ->getStyle('E')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
        ->getStyle('F')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
        ->getStyle('G')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
        ->getStyle('H')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
        ->getStyle('I')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
        ->getStyle('J')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
        ->getStyle('K')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
        ->getStyle('L')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
        ->getStyle('M')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
        ->getStyle('N')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
        ->getStyle('O')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
        ->getStyle('P')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
        ->getStyle('Q')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    }

    $objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HPlease treat this document as confidential!');
    $objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');

    $objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    $objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);

    $objPHPExcel->getActiveSheet()->setTitle('Printing');

    $objPHPExcel->setActiveSheetIndex(0);

    $callStartTime = microtime(true);

    $file = $filename . date('dmY');

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save($folder . '/' . $file . '.xlsx');

    return($file);
}


function download_accomodation_details($folder, $filename, $accomodation_details) {
    // echo "<pre>"; print_r($accomodation_details); die;
    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);

    define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
    date_default_timezone_set('Europe/London');

    require_once dirname(__FILE__) . '/Classes/PHPExcel.php';

    $objPHPExcel = new PHPExcel();

    $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
            ->setLastModifiedBy("Maarten Balliauw")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setSubject("Office 2007 XLSX Test Document")
            ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Test result file");

    $heading = array(
        'font' => array(
            'bold' => true,
            'color' => array('rgb' => 'FFFFFF'),
            'size' => 10,
            'name' => 'Calibri'
        ),
        'alignment' => array(
            'wrap' => true,
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        ),
    );
    $categoryheaderstyle = array(
        'font' => array(
            'bold' => true,
            'color' => array('rgb' => '000000'),
            'size' => 12,
            'name' => 'Calibri'
        ),
        'alignment' => array(
            'wrap' => true,
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        ),
    );

    $columnheaderstyle = array(
        'font' => array(
            'bold' => true,
            'color' => array('rgb' => '000000'),
            'size' => 12,
            'name' => 'Calibri'
        ),
        'alignment' => array(
            'wrap' => true,
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        ),
    );
    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);

    $i = 2;
    $same = 0;
    $count = 0;
    
    if(sizeof($accomodation_details)>0 )
    {
        $i = 2;
        $j =1;

        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'No'); 
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Hotel Name');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Start Date');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'End Date');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Room Type');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Occupants');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'Food Plan');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'Rack Rate');
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'Special Rate');
        $objPHPExcel->getActiveSheet()->setCellValue('J1', 'Extra Bed');
        $objPHPExcel->getActiveSheet()->setCellValue('K1', 'Extra Children');

        foreach ($accomodation_details as $data) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $j);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $data['vendor_name']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, date('d-M-Y', strtotime($data['start_date'])));
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, date('d-M-Y', strtotime($data['end_date'])));
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $data['room_type']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $data['occupents']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $data['food_plan']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $data['rack_rate']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $data['special_rate']);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $i, $data['extra_bed']);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $i, $data['extra_child']);
            $i++;
            $j++;
        }

        $objPHPExcel->getActiveSheet()->getStyle('A1:K1')->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'FF9802')
                )
            )
        );
        $objPHPExcel->getActiveSheet()->getStyle('A1:K1')->applyFromArray($heading);

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
        
        

        $objPHPExcel->getActiveSheet()
        ->getStyle('A')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
        ->getStyle('B')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

        $objPHPExcel->getActiveSheet()
        ->getStyle('C')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
        ->getStyle('D')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
        ->getStyle('E')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
        ->getStyle('F')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
        ->getStyle('G')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
        ->getStyle('H')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
        ->getStyle('I')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
        ->getStyle('J')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
        ->getStyle('K')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    }

    $objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HPlease treat this document as confidential!');
    $objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');

    $objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    $objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);

    $objPHPExcel->getActiveSheet()->setTitle('Printing');

    $objPHPExcel->setActiveSheetIndex(0);

    $callStartTime = microtime(true);

    $file = $filename . date('dmY');

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save($folder . '/' . $file . '.xlsx');

    return($file);
}


function create_guest_details($folder, $filename) {
    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);

    define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
    date_default_timezone_set('Europe/London');

    require_once dirname(__FILE__) . '/Classes/PHPExcel.php';

    $objPHPExcel = new PHPExcel();

    $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
            ->setLastModifiedBy("Maarten Balliauw")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setSubject("Office 2007 XLSX Test Document")
            ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Test result file");

    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'No');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Date');
    $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Guest Id');
    $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Enq Ref No.');
    $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Guest Name');
    $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Mob: number');
    $objPHPExcel->getActiveSheet()->setCellValue('G1', 'E-Mail');
    $objPHPExcel->getActiveSheet()->setCellValue('H1', 'City');
    $objPHPExcel->getActiveSheet()->setCellValue('I1', 'Reference');
    $objPHPExcel->getActiveSheet()->setCellValue('J1', 'Ext Ref No.');
    $objPHPExcel->getActiveSheet()->setCellValue('K1', 'CRM');
    $objPHPExcel->getActiveSheet()->setCellValue('L1', 'Remark');
    $objPHPExcel->getActiveSheet()->setCellValue('M1', 'Status');
    $objPHPExcel->getActiveSheet()->setCellValue('N1', 'Booking Date');
    $objPHPExcel->getActiveSheet()->setCellValue('O1', 'Booking Amount');
    $objPHPExcel->getActiveSheet()->setCellValue('P1', 'Call Back Date');
    $objPHPExcel->getActiveSheet()->setCellValue('Q1', 'Call Back Time');


    $heading = array(
        'font' => array(
            'bold' => true,
            'color' => array('rgb' => '000000'),
            'size' => 10,
            'name' => 'Calibri'
        ),
        'alignment' => array(
            'wrap' => true,
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        ),
    );
    $categoryheaderstyle = array(
        'font' => array(
            'bold' => true,
            'color' => array('rgb' => '000000'),
            'size' => 12,
            'name' => 'Calibri'
        ),
        'alignment' => array(
            'wrap' => true,
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        ),
    );

    $columnheaderstyle = array(
        'font' => array(
            'bold' => true,
            'color' => array('rgb' => '000000'),
            'size' => 12,
            'name' => 'Calibri'
        ),
        'alignment' => array(
            'wrap' => true,
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        ),
    );
    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);


    $i = 2;
    $same = 0;
    $count = 0;
    
    $objPHPExcel->getActiveSheet()->getStyle('A1:Q1')->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'FF9802')
                )
            )
    );


    $objPHPExcel->getActiveSheet()->getStyle('A1:Q1')->applyFromArray($heading);


    $objPHPExcel->getActiveSheet()
            ->getStyle('A')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $objPHPExcel->getActiveSheet()
            ->getStyle('B')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);



    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(50);
    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);


    $objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HPlease treat this document as confidential!');
    $objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');

    $objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    $objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);

    $objPHPExcel->getActiveSheet()->setTitle('Printing');

    $objPHPExcel->setActiveSheetIndex(0);

    $callStartTime = microtime(true);

    $file = $filename . date('dmY');

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save($folder . '/' . $file . '.xlsx');

    return($file);
}

function create_vendor_details($folder, $filename) {
    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);

    define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
    date_default_timezone_set('Europe/London');

    require_once dirname(__FILE__) . '/Classes/PHPExcel.php';

    $objPHPExcel = new PHPExcel();

    $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
            ->setLastModifiedBy("Maarten Balliauw")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setSubject("Office 2007 XLSX Test Document")
            ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Test result file");

    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'No');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Start Date');
    $objPHPExcel->getActiveSheet()->setCellValue('C1', 'End Date');
    $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Room Type');
    $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Occupants');
    $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Food Plan');
    $objPHPExcel->getActiveSheet()->setCellValue('G1', 'Rack Rate');
    $objPHPExcel->getActiveSheet()->setCellValue('H1', 'Special Rate');
    $objPHPExcel->getActiveSheet()->setCellValue('I1', 'Extra Bed');
    $objPHPExcel->getActiveSheet()->setCellValue('J1', 'Extra Child');

    $heading = array(
        'font' => array(
            'bold' => true,
            'color' => array('rgb' => '000000'),
            'size' => 10,
            'name' => 'Calibri'
        ),
        'alignment' => array(
            'wrap' => true,
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        ),
    );
    $categoryheaderstyle = array(
        'font' => array(
            'bold' => true,
            'color' => array('rgb' => '000000'),
            'size' => 12,
            'name' => 'Calibri'
        ),
        'alignment' => array(
            'wrap' => true,
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        ),
    );

    $columnheaderstyle = array(
        'font' => array(
            'bold' => true,
            'color' => array('rgb' => '000000'),
            'size' => 12,
            'name' => 'Calibri'
        ),
        'alignment' => array(
            'wrap' => true,
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        ),
    );
    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);


    $i = 2;
    $same = 0;
    $count = 0;
    
    $objPHPExcel->getActiveSheet()->getStyle('A1:J1')->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'ba2a2a')
                )
            )
    );


    $objPHPExcel->getActiveSheet()->getStyle('A1:J1')->applyFromArray($heading);


    $objPHPExcel->getActiveSheet()
            ->getStyle('A')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $objPHPExcel->getActiveSheet()
            ->getStyle('B')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);



    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);


    $objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HPlease treat this document as confidential!');
    $objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');

    $objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    $objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);

    $objPHPExcel->getActiveSheet()->setTitle('Printing');

    $objPHPExcel->setActiveSheetIndex(0);

    $callStartTime = microtime(true);

    $file = $filename . date('dmY');

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save($folder . '/' . $file . '.xlsx');

    return($file);
}


function read_sheet($file) {
    require_once dirname(__FILE__) . '/Classes/PHPExcel/IOFactory.php';


    $inputFileName = $file;

    //  Read your Excel workbook
    try {
        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFileName);
    } catch (Exception $e) {
        die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
    }

    $rowIterator = $objPHPExcel->getActiveSheet()->getRowIterator();
    $array_data = array();

    $index = 0;
    foreach ($rowIterator as $row) {

        $cellIterator = $row->getCellIterator();

        $rowIndex = $row->getRowIndex();
        $array_data[$rowIndex] = array('A' => '', 'B' => '', 'C' => '', 'D' => '', 'E' => '', 'F' => '', 'G' => '',
         'H' => '', 'I' => '','J' => '', 'K' => '', 'L' => '', 'M' => '', 'N' => '', 'O' => '', 'P' => '', 'Q' => ''
        );


        foreach ($cellIterator as $cell) {
            if ('A' == $cell->getColumn()) {
                $array_data[$rowIndex][$cell->getColumn()] = $cell->getCalculatedValue();
            } else if ('B' == $cell->getColumn()) {
                $array_data[$rowIndex][$cell->getColumn()] = $cell->getCalculatedValue();
            } else if ('C' == $cell->getColumn()) {
                $array_data[$rowIndex][$cell->getColumn()] = $cell->getCalculatedValue();
            } else if ('D' == $cell->getColumn()) {
                $array_data[$rowIndex][$cell->getColumn()] = $cell->getCalculatedValue();
            } else if ('E' == $cell->getColumn()) {
                $array_data[$rowIndex][$cell->getColumn()] = $cell->getCalculatedValue();
            } else if ('F' == $cell->getColumn()) {
                $array_data[$rowIndex][$cell->getColumn()] = $cell->getCalculatedValue();
            } else if ('G' == $cell->getColumn()) {
                $array_data[$rowIndex][$cell->getColumn()] = $cell->getCalculatedValue();
            } else if ('H' == $cell->getColumn()) {
                $array_data[$rowIndex][$cell->getColumn()] = $cell->getCalculatedValue();
            } else if ('I' == $cell->getColumn()) {
                $array_data[$rowIndex][$cell->getColumn()] = $cell->getCalculatedValue();
            } else if ('J' == $cell->getColumn()) {
                $array_data[$rowIndex][$cell->getColumn()] = $cell->getCalculatedValue();
            } else if ('K' == $cell->getColumn()) {
                $array_data[$rowIndex][$cell->getColumn()] = $cell->getCalculatedValue();
            } else if ('L' == $cell->getColumn()) {
                $array_data[$rowIndex][$cell->getColumn()] = $cell->getCalculatedValue();
            } else if ('M' == $cell->getColumn()) {
                $array_data[$rowIndex][$cell->getColumn()] = $cell->getCalculatedValue();
            }else if ('N' == $cell->getColumn()) {
                $array_data[$rowIndex][$cell->getColumn()] = $cell->getCalculatedValue();
            }else if ('O' == $cell->getColumn()) {
                $array_data[$rowIndex][$cell->getColumn()] = $cell->getCalculatedValue();
            }else if ('P' == $cell->getColumn()) {
                $array_data[$rowIndex][$cell->getColumn()] = $cell->getCalculatedValue();
            }else if ('Q' == $cell->getColumn()) {
                $array_data[$rowIndex][$cell->getColumn()] = $cell->getCalculatedValue();
            }
        }

        $index++;
        if ($index == 100) {
            break;
        }
    }

    return $array_data;
}

?>
