<?php

use Classes\Appointment;
use Classes\DbConnector;

require_once 'vendor/autoload.php';

$appointment = new Appointment();
$db = new DbConnector();

$conn = $db->getConnection();

if (isset($_POST['save'])) {
    $appointmentId = $_POST['id'];
    $date = $_POST['date'];
    $timeSlot = $_POST['timeslot'];

    $appointment->updateAppointment($conn, $appointmentId, $date, $timeSlot);
    header("location: receptionist_Appointment.php?msg=Appointment Updated Successfully");
    die();

}elseif (isset($_POST['remove'])) {
    $appointmentId = $_POST['id'];
    $appointment->removeAppointment($appointmentId, $conn);
    header("location: receptionist_Appointment.php?msg=Appointment Deleted Successfully");
    die();

}else{
    header("location: receptionist_Appointment.php");
    die();
}

