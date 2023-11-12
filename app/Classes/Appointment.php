<?php

namespace Classes;

use PDO;
use PDOException;

class Appointment
{
    private int $maxAttempts = 999999999; // Maximum number of attempts to find a unique ID
    private string $uniqueId = '';
    private int $attempts = 0;

    public function generateUniqueId($length = 10): string
    {
        $characters = '0123456789';
        $uniqueId = '';
        $charCount = strlen($characters);

        for ($i = 0; $i < $length; $i++) {
            $uniqueId .= $characters[rand(0, $charCount - 1)];
        }

        return $uniqueId;
    }

    public function isAppointmentIdTaken($conn,$appointmentId): bool
    {
        $query = "SELECT * FROM appointment WHERE appointment_id = :appointmentId";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':appointmentId',$appointmentId);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            return true;
        }
        return false;
    }

    public function getUniqueAppointmentID($conn): string
    {
        while ($this->attempts < $this->maxAttempts) {
            $potentialId = $this->generateUniqueId();

            if (!$this->isAppointmentIdTaken($conn,$potentialId)) {
                $this->uniqueId = $potentialId;
                break;
            }

            $this->attempts++;
        }

        return $this->uniqueId;
    }

    public function addAppointmentEntry($conn, $appointment_id, $paymentId, $customerId, $reportType, $appointmentDate, $appointmentTimeslot)
    {
        try {
            $query = "INSERT INTO appointment (appointment_id,payment_id,customer_id,report_type,appinment_date,appointment_time) VALUES (:appointmentID,:paymenttID,:customerID,:reportType,:appoinmentDate,:appointmentTimeslot)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':appointmentID', $appointment_id);
            $stmt->bindParam(':paymenttID', $paymentId);
            $stmt->bindParam(':customerID', $customerId);
            $stmt->bindParam(':reportType', $reportType);
            $stmt->bindParam(':appoinmentDate', $appointmentDate);
            $stmt->bindParam(':appointmentTimeslot', $appointmentTimeslot);
            return $stmt->execute();
        }catch (PDOException $e){
            return false;
        }
    }

    public function getAppointmentData(PDO $conn)
    {
        try{
            $query = "SELECT appinment_date as date,appointment_time,payment_id,customer_name,test_name,appointment_id FROM appointment INNER JOIN customer c on appointment.customer_id = c.customer_id INNER JOIN tests t on appointment.report_type = t.test_id ";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException){
            return null;
        }
    }

    public function removeAppointment($appointment_id, PDO $conn ): bool
    {
        try{
            $query = "DELETE FROM appointment WHERE appointment_id = :appointmentId";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':appointmentId',$appointment_id);
            $stmt->execute();
            return true;
        }catch (PDOException){
            return  false;
        }

    }

    public function getAppointmentInfoById(PDO $conn, $appointmentId)
    {
        try{
            $query = "SELECT appinment_date as date, appointment_time, customer_name, test_name, c.customer_id 
                  FROM appointment 
                  INNER JOIN customer c on appointment.customer_id = c.customer_id 
                  INNER JOIN tests t on appointment.report_type = t.test_id 
                  WHERE appointment_id = :appointmentId";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':appointmentId', $appointmentId);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException){
            return null;
        }
    }

    public function updatePaymentId(PDO $conn, $appointmentId, $paymentId): bool
    {
        try {
            $query = "UPDATE appointment SET payment_id = :paymentId WHERE appointment_id = :appointmentId;";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':paymentId', $paymentId);
            $stmt->bindParam(':appointmentId', $appointmentId);
            $stmt->execute();
            return true;
        }catch (PDOException){
            return false;
        }
    }

    public function updateAppointment(PDO $conn, $appointmentId, $date, $timeSlot): bool
    {
        try {
            $query = "UPDATE appointment SET appinment_date = :appointmentDate, appointment_time = :appointmentTime WHERE appointment_id = :appointmentId;";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':appointmentDate', $date);
            $stmt->bindParam(':appointmentTime', $timeSlot);
            $stmt->bindParam(':appointmentId', $appointmentId);
            $stmt->execute();
            return true;
        }catch (PDOException){
            return false;
        }
    }

    public function getTodayAppointmentCount(PDO $conn)
    {
        try {
            $sql = "SELECT COUNT(*) AS appointment_count
            FROM appointment
            WHERE DATE(appinment_date) = CURDATE()";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['appointment_count'];

        } catch (PDOException) {
            return 0;
        }
    }

}