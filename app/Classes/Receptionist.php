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
}