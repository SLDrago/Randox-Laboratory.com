<?php

namespace Classes;

use PDO;
use PDOException;

class Receptionist
{

    public function verifyAdmin($uname,$pass, PDO $conn): bool
    {
        try{
            $hashedpw = null;
            // Prepare the SQL statement with placeholders
            $query = "SELECT admin_password FROM admin WHERE admin_username = :username;";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':username', $uname);
            $stmt->execute();
            $result = $stmt->fetchAll((PDO::FETCH_ASSOC));
            if (count($result)){
                foreach ($result as $row){
                    $hashedpw = $row['admin_password'];
                }
            }
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