<?php

namespace Classes;

use PDO;
use PDOException;

class Report
{
    public function getReportFileNameByAppointmentID (PDO $conn, $appointmentId) {
        try {
            $query = "SELECT * FROM report WHERE appointment_id = :appointmentId";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':appointmentId', $appointmentId);
            $stmt->execute();
            $result =  $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['report_filename'];
        } catch (PDOException) {
            return null;
        }
    }

    public function getReportCount(PDO $conn)
    {
        try {
            $sql = "SELECT COUNT(*) as count FROM report";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        } catch (PDOException) {
            return 0;
        }
    }
}