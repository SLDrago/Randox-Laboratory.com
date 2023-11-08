<?php

namespace Classes;
use PDO;
use PDOException;

include 'app/Config/dbh.php';

class Payment
{
    private string $merchant_id = "1223771";
    private string $currency = "LKR";
    private string $merchant_secret = "MzM4ODU2MTU0NDY3MTQyNDE5MjI4NDAzNDM0MDkyODI0NzMyODUw";
    private string $return_url = "http://localhost:8080/Randox-Laboratory.com/user_Home.php";
    private string $cancel_url  = "http://localhost:8080/Randox-Laboratory.com/user_Home.php";
    private string $notify_url = "http://localhost:8080/Randox-Laboratory.com/success.php";
    private $hash;

    public function getMerchantId(): string
    {
        return $this->merchant_id;
    }

    public function getMerchantSecret(): string
    {
        return $this->merchant_secret;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getReturnUrl(): string
    {
        return $this->return_url;
    }

    public function getCancelUrl(): string
    {
        return $this->cancel_url;
    }

    public function getNotifyUrl(): string
    {
        return $this->notify_url;
    }


    public function generateHash($order_id,$amount): string
    {
        $this->hash = strtoupper(
            md5(
                $this->merchant_id .
                $order_id .
                number_format($amount, 2, '.', '') .
                $this->currency .
                strtoupper(md5($this->merchant_secret))
            )
        );
        return $this->hash;
    }

    public function getPaymentID(PDO $conn,$order_id)
    {
        $check = "SELECT * FROM payment WHERE appointment_id = ?";
        $stmt = $conn->prepare($check);
        $stmt->bindParam(1, $order_id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $paymentID = '';
        if($result){
            foreach ($result as $row) {
                $paymentID = $row['payment_id'];
            }
            return $paymentID;
        }else{
            return null;
        }
    }

    public function addPaymentEntry($conn, $customerId, $order_id, $currentDate, $currentTime, $amount): bool
    {
        $query = "INSERT INTO payment (customer_id,appointment_id,payment_date,payment_time,payment_amount) VALUES (:customerID,:appointmentID,:paymentDate,:paymentTime,:paymentAmount);";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':customerID',$customerId);
        $stmt->bindParam(':appointmentID',$order_id);
        $stmt->bindParam(':paymentDate',$currentDate);
        $stmt->bindParam(':paymentTime',$currentTime);
        $stmt->bindParam(':paymentAmount',$amount);
        if ($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getMonthlyIncome(PDO $conn)
    {
        try {
            $sql = "SELECT SUM(payment_amount) AS total_payment_amount
            FROM payment
            WHERE YEAR(payment_date) = YEAR(CURDATE()) AND MONTH(payment_date) = MONTH(CURDATE())";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total_payment_amount'];
        } catch (PDOException) {
            return 0;
        }
    }


}