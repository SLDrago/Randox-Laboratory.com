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
            $hashedpw = $result['labtec_password'];
            if(password_verify($pass, $hashedpw)){
                return $result['labtec_role'];
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
}