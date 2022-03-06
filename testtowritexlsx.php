<?php
//load phpSpreadsheet
require 'vendor/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//load spreadsheet
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('CRA.xlsx');
 
//get data
$mysql = new mysqli("localhost","root","","mdc");
$counttd="SELECT id FROM patient";
$countnm="SELECT Nama FROM patient";
$countic="SELECT IC FROM patient";
$counttp="SELECT Telephone FROM patient";
$countsx="SELECT Sex FROM patient";
$result=mysqli_query($mysql,$counttd);
$result1=mysqli_query($mysql,$countnm);
$result2=mysqli_query($mysql,$countic);
$result3=mysqli_query($mysql,$counttd);
$result4=mysqli_query($mysql,$countsx);
$rowcount=mysqli_num_rows($result);
$rowcount1=mysqli_num_rows($result1);
$rowcount2=mysqli_num_rows($result2);
$rowcount3=mysqli_num_rows($result3);
$rowcount4=mysqli_num_rows($result4);

//insert data to spreadsheet
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('D4', '2022');
$sheet->setCellValue('D5', 'KPDK');
$sheet->setCellValue('D6', 'Tabika Kemas Taman Nilam');
$sheet->setCellValue('D10', $rowcount);
$sheet->setCellValue('D11', $rowcount1);
$sheet->setCellValue('D12', $rowcount2);
$sheet->setCellValue('D13', $rowcount3);
$sheet->setCellValue('D14', $rowcount4);

//insert formula to spreadsheet
$sheet->setCellValue("D15", "=SUM(D10:14)");
 
//write it again to Filesystem with the same name (=replace)
$writer = new Xlsx($spreadsheet);
$writer->save('yourspreadsheet.xlsm');
header('Location: yourspreadsheet.xlsm');
?>