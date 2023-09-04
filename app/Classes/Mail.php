<?php

namespace Classes;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

class Mail
{
    private string $sendMailFrom;
    private string $emailAppPassword;
    private string $companyName;

    public function __construct()
    {
        $this->sendMailFrom = "randoxlaboratories571@gmail.com";
        $this->emailAppPassword = "dkcujmsfnjkxpiuu";
        $this->companyName = "Randox-Laboratories";
    }

    public function sendMail($email, $subject, $body): int|string
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = $this->sendMailFrom;                     //SMTP username
            $mail->Password = $this->emailAppPassword;                               //SMTP password 'RandoxLaboratories!123'
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($this->sendMailFrom, $this->companyName);
            $mail->addAddress($email);

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body;

            $mail->send();

            return 1;

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}