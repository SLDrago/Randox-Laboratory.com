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
}