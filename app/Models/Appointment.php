<?php

namespace Models;

class Appointment
{
    private $maxAttempts = 100; // Maximum number of attempts to find a unique ID
    private $uniqueId = '';
    private $attempts = 0;
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function generateUniqueId($length = 10): string
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $uniqueId = '';
        $charCount = strlen($characters);

        for ($i = 0; $i < $length; $i++) {
            $uniqueId .= $characters[rand(0, $charCount - 1)];
        }

        return $uniqueId;
    }

    public function isAppointmentIdTaken($appointmentId): int
    {
        $query = "SELECT * FROM appointment WHERE appointment_id = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 's', $appointmentId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            return 1;
        }

        return 0;
    }

    public function getUniqueAppointmentID(): string
    {
        while ($this->attempts < $this->maxAttempts) {
            $potentialId = $this->generateUniqueId();

            if (!$this->isAppointmentIdTaken($potentialId)) {
                $this->uniqueId = $potentialId;
                break;
            }

            $this->attempts++;
        }

        return $this->uniqueId;
    }


}