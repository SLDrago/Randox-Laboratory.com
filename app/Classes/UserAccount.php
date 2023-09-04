<?php

namespace Classes;


use Exception;
use PDO;
use PDOException;

class UserAccount
{
    private string $username;
    private string $password;
    private $customerName;
    private $customerBD;
    private $customerNIC;
    private $customerPNumber;
    private $customerEmail;

    public function getCustomerName()
    {
        return $this->customerName;
    }

    public function getCustomerBD()
    {
        return $this->customerBD;
    }

    public function getCustomerNIC()
    {
        return $this->customerNIC;
    }

    public function getCustomerPNumber()
    {
        return $this->customerPNumber;
    }

    public function getCustomerEmail()
    {
        return $this->customerEmail;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function createRandomString($length): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

    public function createUserName($name): string {
        // Generate a unique ID of length 6
        $uniqueId = $this->createRandomString(6);
        $this->username = $name . $uniqueId;
        return $this->username;
    }

    public function createPW(): string {
        $this->password = $this->createRandomString(13);
        return $this->password;
    }

    public function addUser($conn,$name,$bd,$nic,$email,$pnumber,$username,$hashedpassword): bool
    {
        try {
            $check = "SELECT * FROM customer WHERE customer_pnumber = ?";
            $stmt = $conn->prepare($check);
            $stmt->bindParam(1, $pnumber);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($result) > 0) {
                $query = "UPDATE customer SET customer_name = :customerName,customer_bd = :customerBd,customer_nic = :customerNIC,customer_email = :customerEmail, username = :userName, password = :HashedPassword WHERE customer_pnumber = :customerPNumber;";
            } else {
                $query = "INSERT INTO customer (customer_name,customer_bd,customer_nic,customer_email,customer_pnumber,username,password) VALUES (:customerName,:customerBd,:customerNIC,:customerEmail,:customerPNumber,:userName,:HashedPassword);";
            }
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':customerName', $name);
            $stmt->bindParam(':customerBd', $bd);
            $stmt->bindParam(':customerNIC', $nic);
            $stmt->bindParam(':customerEmail', $email);
            $stmt->bindParam(':customerPNumber', $pnumber);
            $stmt->bindParam(':userName', $username);
            $stmt->bindParam(':HashedPassword', $hashedpassword);
            $stmt->execute();
            return True;
        }catch (PDOException $ex){
            error_log("Database error: " . $ex->getMessage());
            return false;
        }
    }

    public function getCustomerID($conn,$pnumber)
    {
        $customerId = null;
        try {
            $customerquery = "SELECT * FROM customer WHERE customer_pnumber = ?";
            $stmt = $conn->prepare($customerquery);
            $stmt->bindParam(1, $pnumber);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                foreach ($result as $row) {
                    $customerId = $row['customer_id'];
                }
            }
            return $customerId;
        }catch (PDOException $e){
            error_log("Database error: " . $e->getMessage());
            return null;
        }
    }

    public function getCustomerDataByAuthToken($conn,$authToken): ?UserAccount
    {
        $user = new UserAccount();
        try{
            $query = "SELECT customer_name,customer_bd,customer_nic,customer_pnumber,customer_email,username FROM customer WHERE auth_token = ?;";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1,$authToken);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($results)>0){
                foreach ($results as $row){
                    $user->customerName = $row['customer_name'];
                    $user->customerBD = $row['customer_bd'];
                    $user->customerNIC = $row['customer_nic'];
                    $user->customerPNumber = $row['customer_pnumber'];
                    $user->customerEmail = $row['customer_email'];
                    $user->username = $row['username'];
                }
            }
            return $user;
        }catch (PDOException $ex){
            error_log("Database error: " . $ex->getMessage());
            return null;
        }
    }
}