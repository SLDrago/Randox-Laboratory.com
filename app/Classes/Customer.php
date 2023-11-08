<?php


namespace Classes;

use PDO;
use PDOException;

class Customer

{
    private String $phone;
    private String $username;
    private String $password;
    private String $auth;
    private String $otp;

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getUsername(): string
    {
        return $this->username;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function getAuth(): string
    {
        return $this->auth;
    }
    public function getOtp(): string
    {
        return $this->otp;
    }

    public function authenticate($inputUsername, $inputPassword, PDO $pdo)
    {
        try {
            $hashedpw = null;
            // Prepare the SQL statement with placeholders
            $query = "SELECT password FROM customer WHERE username = :username;";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':username', $inputUsername);
            $stmt->execute();
            $result = $stmt->fetchAll((PDO::FETCH_ASSOC));
            if (count($result)){
                foreach ($result as $row){
                    $hashedpw = $row['password'];
                }
            }
            if(password_verify($inputPassword, $hashedpw)){
                return true;
            }else{
                return false;
            }

        } catch (PDOException $e) {
            return false;
        }
    }
    public function generateAuthToken()
    {
        $tokenLength = 20;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = '';

        for ($i = 0; $i < $tokenLength; $i++) {
            $token .= $characters[random_int(0, strlen($characters) - 1)];
        }

        return $token;
    }

    public function updateAuthToken(PDO $conn, $username, $authToken): bool
    {
        try {
            $query = "UPDATE customer SET auth_token = :authToken WHERE username = :username";
            $stmt = $conn->prepare($query);

            // Bind the new token and username to the placeholders
            $stmt->bindParam(':authToken', $authToken);
            $stmt->bindParam(':username', $username);

            // Execute the prepared statement
            $stmt->execute();
            return true;
        }catch (PDOException $e){
            return false;
        }
    }

    public function updateOTP(PDO $conn,$username,$otp_code)
    {
        try {
            $query = "UPDATE customer SET otp_code = :otpCode WHERE username = :username";
            $stmt = $conn->prepare($query);

            // Bind the new token and username to the placeholders
            $stmt->bindParam(':otpCode', $otp_code);
            $stmt->bindParam(':username', $username);

            // Execute the prepared statement
            $stmt->execute();
            return true;
        }catch (PDOException $e){
            return false;
        }
    }

    public  function getCustomerData(PDO $conn,$username){
        $customer = new Customer();
        try{
            $query = "SELECT * FROM customer WHERE username = ?";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1,$username);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row){
                $customer->phone = $row['customer_pnumber'];
            }
            return $customer;
        }catch (PDOException){
            return false;
        }
    }

    public function getOTPByUsername(PDO $conn,$username)
    {
        try {
            $dbotp = '';
            $query = "SELECT otp_code FROM customer WHERE username = ?";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $username);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $dbotp = $row['otp_code'];
            }
            return $dbotp;
        }catch (PDOException $e){
            return null;
        }
    }

    public function updatePassword(PDO $conn,$username,$hashedpass): bool
    {
        try{
            $query = 'UPDATE customer SET password = ? WHERE username = ?';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $hashedpass);
            $stmt->bindParam(2,$username);
            $stmt->execute();
            return true;
        }catch (PDOException){
            return false;
        }


    }

    public function getCustomerCount(PDO $conn)
    {
        try {
            $sql = "SELECT COUNT(*) as count FROM customer";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        } catch (PDOException) {
            return 0;
        }
    }
}


