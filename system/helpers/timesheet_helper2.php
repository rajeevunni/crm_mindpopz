<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

ini_set('memory_limit', '-1');
ini_set('max_execution_time', 500);


/* fraud vehicle */

function create_employee_details($folder, $filename) {
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
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Place');
    $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Category');
    $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Hotel');
    $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Start Date');
    $objPHPExcel->getActiveSheet()->setCellValue('F1', 'End Date');
    $objPHPExcel->getActiveSheet()->setCellValue('G1', 'Room Type');
    $objPHPExcel->getActiveSheet()->setCellValue('H1', 'Occupants');
    $objPHPExcel->getActiveSheet()->setCellValue('I1', 'Food Plan');
    $objPHPExcel->getActiveSheet()->setCellValue('J1', 'Rack Rate');
    $objPHPExcel->getActiveSheet()->setCellValue('K1', 'Special Rate');
    $objPHPExcel->getActiveSheet()->setCellValue('L1', 'Extra Bed');


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
    
    $objPHPExcel->getActiveSheet()->getStyle('A1:M1')->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => '840516')
                )
            )
    );


    $objPHPExcel->getActiveSheet()->getStyle('A1:L1')->applyFromArray($heading);


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
    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);


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
         'H' => '', 'I' => '','J' => '', 'K' => '', 'L' => ''
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
