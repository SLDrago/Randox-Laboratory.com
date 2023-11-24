<?php

namespace Classes;

use PDO;
use PDOException;

class Labtechnician
{
    public function verifyLabTech($uname,$pass, PDO $conn)
    {
        try{
            $query = "SELECT labtec_password,labtec_role FROM lab_technician WHERE labtec_username = :username;";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':username', $uname);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                $hashedpw = $result['labtec_password'];
                if(password_verify($pass, $hashedpw)){
                    return $result['labtec_role'];
                }else{
                    return false;
                }
            }else{
                return false;
            }

        }catch (PDOException){
            return false;
        }

    }

    public function updateOTP(PDO $conn,$username,$otp_code): bool
    {
        try {
            $query = "UPDATE lab_technician SET otp_code = :otpCode WHERE labtec_username = :username";
            $stmt = $conn->prepare($query);

            $stmt->bindParam(':otpCode', $otp_code);
            $stmt->bindParam(':username', $username);

            $stmt->execute();
            return true;
        }catch (PDOException $e){
            return false;
        }
    }

    public function getOTPByUsername(PDO $conn,$username)
    {
        try {
            $query = "SELECT otp_code FROM lab_technician WHERE labtec_username = ?";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $username);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['otp_code'];
        }catch (PDOException){
            return null;
        }
    }

    public function updatePassword(PDO $conn,$username,$hashedPW): bool
    {
        try{
            $query = 'UPDATE lab_technician SET labtec_password = ? WHERE labtec_username = ?';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $hashedPW);
            $stmt->bindParam(2,$username);
            $stmt->execute();
            return true;
        }catch (PDOException){
            return false;
        }
    }

    public function getEmailByUsername (PDO $conn, $username)
    {
        try {
            $sql = "SELECT labtec_email FROM lab_technician WHERE labtec_username = :username";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['labtec_emaill'];
        } catch (PDOException) {
            return null;
        }
    }

    public function editProfileWithoutPW(PDO $conn, $name, $email, $username): bool
    {
        try {
            $query = 'UPDATE lab_technician SET labtec_name = ?, labtec_email = ? WHERE labtec_username = ?';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $username);
            $stmt->execute();
            return true;
        } catch (PDOException) {
            return false;
        }
    }

    public function editProfileWithPW(PDO $conn, $name, $email, $hashedPW, $username): bool
    {
        try {
            $query = 'UPDATE lab_technician SET labtec_name = ?, labtec_email = ?, labtec_password = ? WHERE labtec_username = ?';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $hashedPW);
            $stmt->bindParam(4, $username);
            $stmt->execute();
            return true;
        } catch (PDOException) {
            return false;
        }
    }

    public function getLabTecDataByUsername(PDO $conn, mixed $username)
    {
        try {
            $sql = "SELECT labtec_name AS name, labtec_email AS email FROM lab_technician WHERE labtec_username = :username";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException) {
            return null;
        }
    }

    public function temporaryAddReportData (PDO $conn, $appointmentId, $testId, $dataArray): bool
    {
        $serializedArray = serialize($dataArray);
        try {
            $sql = "INSERT INTO temp_report (test_id,appointment_id,data) VALUES (:testId,:appointmentId,:data)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":testId",$testId);
            $stmt->bindParam(":appointmentId",$appointmentId);
            $stmt->bindParam(":data", $serializedArray);
            $stmt->execute();
            return true;
        } catch (PDOException) {
            return false;
        }
    }

    public function getAllTemporyReportData (PDO $conn)
    {
        try {
            $sql = "SELECT temp_id, a.appointment_id, customer_name, report_type,test_name, data FROM temp_report inner join randox_laboratory.appointment a on temp_report.appointment_id = a.appointment_id inner join randox_laboratory.customer c on a.customer_id = c.customer_id inner join randox_laboratory.tests t on temp_report.test_id = t.test_id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException) {
            return null;
        }
    }
}