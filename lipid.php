<?php

require 'vendor/autoload.php';

use Classes\pdfGenerator;

$generator = new pdfGenerator();

$customer = "Kalana";
$appointmentNo = "345268";
$data = array("chol-total" => '190 mg/dL (4.91mmol/L)', "chol-tri" => '177mg/dL (2.00 mmol/L)', "chol-H" => '44mg/dL (1.14mmol/L)', "chol-L" => '111mg/dL (2.86mmol/L)' ,"chol-vldl"=>'35.4mg/dl', "chol/hdl"=>'4.32', "ldl/hdl"=>'2.51');

$generator->generatePDF($appointmentNo, $generator->generatelipidprofileTemplate($customer, $data));