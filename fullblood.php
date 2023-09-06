<?php
require 'vendor/autoload.php';
use Classes\pdfGenerator;

$generator = new pdfGenerator();

$customer = "Kalana";
$appointmentNo = "345268";
$data = array("blood-haemoglobin" =>'3.87%', "wbc" =>'4.56%' , "platelets"=>'45.5%', "mcv"=>'45.5%', "pcv"=>'1.34%',"rdw"=>'11.6%');

$generator->generatePDF($appointmentNo,$generator->generateFullBloodTemplate($customer, $data));