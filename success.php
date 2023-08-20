<?php
include 'app/Config/dbh.php';
require_once 'vendor/autoload.php';

use Models\Mail;

$merchant_id         = $_POST['merchant_id'];
$order_id            = $_POST['order_id'];
$payhere_amount      = $_POST['payhere_amount'];
$payhere_currency    = $_POST['payhere_currency'];
$status_code         = $_POST['status_code'];
$md5sig              = $_POST['md5sig'];

$merchant_secret = 'MzM4ODU2MTU0NDY3MTQyNDE5MjI4NDAzNDM0MDkyODI0NzMyODUw'; // Replace with your Merchant Secret

$local_md5sig = strtoupper(
    md5(
        $merchant_id .
        $order_id .
        $payhere_amount .
        $payhere_currency .
        $status_code .
        strtoupper(md5($merchant_secret))
    )
);

if (($local_md5sig === $md5sig) AND ($status_code == 2) ) {
    $query = "UPDATE payment SET status=1 WHERE appointment_id = $order_id";
    $query_run = mysqli_query($conn, $query);
    $mail = new Mail();
    $result = $mail->sendMail("dilshanoshada7@gmail.com", "payment success", "<html lang='en'><body><h1>Success: $order_id</h1></body></html>");
}
