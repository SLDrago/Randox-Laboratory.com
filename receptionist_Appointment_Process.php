<?php

use Classes\Appointment;
use Classes\DbConnector;
use Classes\UserAccount;
use JetBrains\PhpStorm\NoReturn;

require_once 'vendor/autoload.php';

$db = new DbConnector();
$appointment = new Appointment();
$user = new UserAccount();
$conn = $db->getConnection();

if ($_POST['fname'] != '' && $_POST['bd'] != '' && $_POST['number'] != '' && $_POST['appointDate'] != '' && $_POST['timeslot'] != '') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $nic = $_POST['nic'];
    $bd = $_POST['bd'];

    $pattern = '/^94\d{9}$/';

    if (preg_match($pattern, $_POST['number'])) {
        $pNumber = $_POST['number'];
    } else {
        header("location: receptionist_Appointment.php?msg=Enter a Valid Phone Number");
        exit; // Stop the script
    }

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = $_POST['email'];
    } else {
        header("location: receptionist_Appointment.php?msg=Enter a Valid Email");
        exit; // Stop the script
    }

    $reportType = $_POST['reporttype'];
    $date = $_POST['appointDate'];
    $timeSlot = $_POST['timeslot'];
    $name = $fname . " " . $lname;

    $paymentId = 0;
    $appointmentId = $appointment->getUniqueAppointmentID($conn);
    $username = $user->createUserName($fname);
    $password = $user->createPW();
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    if (isset($_POST['proceedPayment']) || isset($_POST['skipPayment'])) {
        $customerId = $user->getCustomerID($conn, $pNumber);
        if ($customerId == null) {
            if ($user->addUser($conn, $name, $bd, $nic, $email, $pNumber, $username, $hashedPassword)) {
                $customerId = $user->getCustomerID($conn, $pNumber);
                $user->temporarySaveUserData($conn, $username, $password, $customerId);
            } else {
                header("location: receptionist_Appointment.php?msg=Server Error...");
                exit; // Stop the script
            }
        }

        if (isset($_POST['proceedPayment'])) {
            $appointment->addAppointmentEntry($conn, $appointmentId, $paymentId, $customerId, $reportType, $date, $timeSlot);
            proceedPayment($appointmentId);
        } elseif (isset($_POST['skipPayment'])) {
            $appointment->addAppointmentEntry($conn, $appointmentId, $paymentId, $customerId, $reportType, $date, $timeSlot);
            returnAppointment();
        }
    } else {
        header('location: receptionist_Appointment.php');
        exit; // Stop the script
    }
}

// Define the functions outside the main code block
function proceedPayment($appointmentId)
{
    header("location: receptionist_Payment.php?id=$appointmentId");
    exit; // Stop the script
}

function returnAppointment()
{
    header("location: receptionist_Appointment.php?msg=Appointment added Successfully.");
    exit; // Stop the script
}
