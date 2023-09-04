<?php

namespace Classes;

use PDO;
use PDOException;

class Appointment
{
    private int $maxAttempts = 100; // Maximum number of attempts to find a unique ID
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


}