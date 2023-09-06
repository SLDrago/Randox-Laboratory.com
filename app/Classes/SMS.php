<?php

namespace Classes;
require_once 'vendor/autoload.php';
require_once('vendor/notifylk/notify-php/autoload.php');

use Exception;
use NotifyLk\Api\SmsApi;
class SMS
{
    private string $user_id = "25609";
    private string $api_key = "92WAh2w8fPJoBTIJIjPc";
    private string $sender_id = "NotifyDEMO";

    public function sendSMS($phone,$message)
    {
        $api_instance = new SmsApi();
        $user_id = $this->user_id; // string | API User ID - Can be found in your settings page.
        $api_key = $this->api_key; // string | API Key - Can be found in your settings page.
        // string | Text of the message. 320 chars max.
        $to = $phone; // string | Number to send the SMS. Better to use 9471XXXXXXX format.
        $sender_id = $this->sender_id; // string | This is the from name recipient will see as the sender of the SMS. Use \\\"NotifyDemo\\\" if you have not ordered your own sender ID yet.
        $contact_fname = ""; // string | Contact First Name - This will be used while saving the phone number in your Notify contacts (optional).
        $contact_lname = ""; // string | Contact Last Name - This will be used while saving the phone number in your Notify contacts (optional).
        $contact_email = ""; // string | Contact Email Address - This will be used while saving the phone number in your Notify contacts (optional).
        $contact_address = ""; // string | Contact Physical Address - This will be used while saving the phone number in your Notify contacts (optional).
        $contact_group = 0; // int | A group ID to associate the saving contact with (optional).
        $type = null; // string | Message type. Provide as unicode to support unicode (optional).

        try {
            $api_instance->sendSMS($user_id, $api_key, $message, $to, $sender_id, $contact_fname, $contact_lname, $contact_email, $contact_address, $contact_group, $type);
            return true;
        } catch (Exception $e) {
            echo "Error: ". $e->getMessage();
            return false;
        }
    }

    public function sendOTP($username,$phone)
    {
        $otp_code = $this->generateOTP();
        $customer = new Customer();
        $db = new DbConnector();
        $conn = $db->getConnection();
        if($customer->updateOTP($conn,$username,$otp_code)){
            $message = "Randox Laboratory Badulla"."      ".$username . " your OTP " . $otp_code;
            $this->sendSMS($phone,$message);
            return true;
        }else{
            return false;
        }

    }

    public function generateOTP()
    {
        return mt_rand(10000,99999);
    }


}