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
            if ($stmt->rowCount() > 0){
                $hashedpw = $result['admin_password'];
                if(password_verify($pass, $hashedpw)){
                    return true;
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

    public function verifyReceptionist($uname,$pass, PDO $conn): bool
    {
        try{
            $query = "SELECT receptionist_password FROM receptionist WHERE receptionist_username = :username;";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':username', $uname);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                $hashedpw = $result['receptionist_password'];
                if(password_verify($pass, $hashedpw)){
                    return true;
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

    public function getReceptionistDataByUsername (PDO $conn, $username)
    {
        try {
            $sql = "SELECT receptionist_name AS name, receptionist_email AS email FROM receptionist WHERE receptionist_username = :username";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException) {
            return null;
        }
    }

    public function getAdminDataByUsername (PDO $conn, $username)
    {
        try {
            $sql = "SELECT admin_name AS name, admin_email AS email FROM Admin WHERE admin_username = :username";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException) {
            return null;
        }
    }

    public function editProfilewithoutPW(PDO $conn, $name, $email, $username): bool
    {
        try {
            $query = 'UPDATE receptionist SET receptionist_name = ?, receptionist_email = ? WHERE receptionist_username = ?';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $username);
            $stmt->execute();
            $sql = 'UPDATE admin SET admin_name = ?, admin_email = ? WHERE admin_username = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $username);
            $stmt->execute();
            return true;
        } catch (PDOException) {
                return false;
        }
    }


    public function editProfilewithPW(PDO $conn, $name, $email, $hashedPW, $username): bool
    {
        try{
            $query = 'UPDATE receptionist SET receptionist_name = ?, receptionist_email = ?, receptionist_password = ? WHERE receptionist_username = ?';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $hashedPW);
            $stmt->bindParam(4,$username);
            $stmt->execute();
            $sql = 'UPDATE admin SET admin_name = ?, admin_email = ?, admin_password = ? WHERE admin_username = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $hashedPW);
            $stmt->bindParam(4,$username);
            $stmt->execute();
            return true;
        }catch (PDOException){
                return false;
        }
    }
}