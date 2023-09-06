<?php

namespace Classes;


use Exception;
use PDO;
use PDOException;

class UserAccount
{
    private string $username;
    private string $password;
    private string $customerName;
    private string $customerBD;
    private string $customerNIC;
    private string $customerPNumber;
    private string $customerEmail;
    private string $profilePic;

    public function getCustomerName(): string
    {
        return $this->customerName;
    }

    public function getCustomerBD(): string
    {
        return $this->customerBD;
    }

    public function getCustomerNIC(): string
    {
        return $this->customerNIC;
    }

    public function getCustomerPNumber(): string
    {
        return $this->customerPNumber;
    }

    public function getCustomerEmail(): string
    {
        return $this->customerEmail;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getProfilePic(): string
    {
        return $this->profilePic;
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

    public function addUser(PDO $conn,$name,$bd,$nic,$email,$pnumber,$username,$hashedpassword): bool
    {
        try {
            $check = "SELECT * FROM customer WHERE customer_pnumber = ?";
            $stmt = $conn->prepare($check);
            $stmt->bindParam(1, $pnumber);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!(count($result) > 0)) {
                $query = "INSERT INTO customer (customer_name,customer_bd,customer_nic,customer_email,customer_pnumber,username,password) VALUES (:customerName,:customerBd,:customerNIC,:customerEmail,:customerPNumber,:userName,:HashedPassword);";
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
            }else{
                return True;
            }
        }catch (PDOException $ex){
            error_log("Database error: " . $ex->getMessage());
            return false;
        }
    }

    public function getCustomerID(PDO $conn,$pnumber)
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

    public function getCustomerDataByAuthToken(PDO $conn,$authToken): ?UserAccount
    {
        $user = new UserAccount();
        try{
            $query = "SELECT customer_name,customer_bd,customer_nic,customer_pnumber,customer_email,username,profile_pic FROM customer WHERE auth_token = ?;";
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
                    $user->profilePic = $row['profile_pic'];
                }
            }
            return $user;
        }catch (PDOException $ex){
            error_log("Database error: " . $ex->getMessage());
            return null;
        }
    }

    public function saveProfilePic(PDO $conn,$authToken,$role,$username,$oldPicName,$profilePic,$uploadPath): bool
    {
        $img_name = $_FILES['profilepic']['name'];
        $tmp_name = $_FILES['profilepic']['tmp_name'];
        $error = $_FILES['profilepic']['error'];

        if ($error === 0) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_to_lc = strtolower($img_ex);
            $allowed_exs = array('jpg', 'jpeg', 'png');

            if (in_array($img_ex_to_lc, $allowed_exs)) {
                $new_img_name = uniqid(str_replace(' ', '', $username), true) . '.' . $img_ex_to_lc;
                $img_upload_path = $uploadPath. $new_img_name;

                $defaultImageName = "default_profile.png";

                if ($oldPicName != $defaultImageName){
                    unlink($uploadPath.$oldPicName);
                }

                // Move the uploaded file to the destination folder
                if (move_uploaded_file($tmp_name, $img_upload_path)) {
                    $query = "UPDATE $role SET profile_pic = ? WHERE auth_token = ?;";
                    $stmt = $conn->prepare($query);
                    $stmt->bindParam(1, $new_img_name);
                    $stmt->bindParam(2, $authToken);
                    $stmt->execute();
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function updateUser(PDO $conn, $name, $bd, $email, $pnumber, $hashedpassword, $authToken): bool
    {
        try {
            if (isset($hashedpassword)) {
                $query = "UPDATE customer SET customer_name = :customerName, customer_bd = :customerBd, customer_pnumber = :customerPNumber, customer_email = :customerEmail, password = :HashedPassword WHERE auth_token = :authToken;";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':customerName', $name);
                $stmt->bindParam(':customerBd', $bd);
                $stmt->bindParam(':customerEmail', $email);
                $stmt->bindParam(':customerPNumber', $pnumber);
                $stmt->bindParam(':HashedPassword', $hashedpassword);
                $stmt->bindParam(':authToken', $authToken);
                $stmt->execute();
            } else {
                $query = "UPDATE customer SET customer_name = :customerName, customer_bd = :customerBd, customer_pnumber = :customerPNumber, customer_email = :customerEmail WHERE auth_token = :authToken;";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':customerName', $name);
                $stmt->bindParam(':customerBd', $bd);
                $stmt->bindParam(':customerEmail', $email);
                $stmt->bindParam(':customerPNumber', $pnumber);
                $stmt->bindParam(':authToken', $authToken);
                $stmt->execute();
            }
            return true;
        } catch (PDOException $ex) {
            error_log("Database error: " . $ex->getMessage());
            return $ex->getMessage();
        }
    }


}