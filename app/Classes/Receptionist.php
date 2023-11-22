<?php

namespace Classes;

use PDO;
use PDOException;

class Receptionist
{

    public function verifyAdmin($uname,$pass, PDO $conn): bool
    {
        try{
            $query = "SELECT admin_password FROM admin WHERE admin_username = :username;";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':username', $uname);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashedpw = $result['admin_password'];
            if(password_verify($pass, $hashedpw)){
                return true;
            }else{
                return false;
            }
        }catch (PDOException){
            return false;
        }

    }

    public function verifyReceptionist($uname,$pass, PDO $conn): bool
    {
        try{
            $hashedpw = null;
            $query = "SELECT receptionist_password FROM receptionist WHERE receptionist_username = :username;";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':username', $uname);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashedpw = $result['receptionist_password'];
            if(password_verify($pass, $hashedpw)){
                return true;
            }else{
                return false;
            }
        }catch (PDOException){
            return false;
        }

    }

    public function updateOTP(PDO $conn,$username,$otp_code)
    {
        try {
            $query = "UPDATE receptionist SET otp_code = :otpCode WHERE receptionist_username = :username";
            $stmt = $conn->prepare($query);

            $stmt->bindParam(':otpCode', $otp_code);
            $stmt->bindParam(':username', $username);

            $stmt->execute();
            return true;
        }catch (PDOException){
            return false;
        }
    }

    public function getOTPByUsername(PDO $conn,$username)
    {
        try {
            $query = "SELECT otp_code FROM receptionist WHERE receptionist_username = ?";
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
            $query = 'UPDATE receptionist SET receptionist_password = ? WHERE receptionist_username = ?';
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
            $sql = "SELECT receptionist_email FROM receptionist WHERE receptionist_username = :username";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['receptionist_email'];
        } catch (PDOException) {
            return null;
        }
    }
}