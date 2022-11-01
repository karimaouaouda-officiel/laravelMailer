<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer extends Controller
{
    protected static $mail ;
    protected static $from = "karimkimakimo@gmail.com";

    private static function setup(){
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp-relay.sendinblue.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'karimkimakimo@gmail.com';                     //SMTP username
            $mail->Password   = 'mqABRYTk2vcQMJIx';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}<br>";
        }

        self::$mail = $mail;
    }

    public static function send(string $to , string $sub , $body){
        self::setup();

        self::$mail->setFrom(self::$from, config("name"));
        self::$mail->addAddress($to);
        self::$mail->isHTML(true);
        self::$mail->Subject = $sub;
        self::$mail->Body = $body;

        try{
            self::$mail->send();
        }catch(Exception $e){
            echo "error occured : ".$e->getMessage();
            return false;
        }

        return true;
    }
}
