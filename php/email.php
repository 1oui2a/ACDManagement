<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $mail = new PHPMailer(true);


    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->isSMTP();                                      
        $mail->Host       = 'smtp.gmail.com';  
        $mail->SMTPAuth   = true;                             
        $mail->Username   = 'louizamoran@gmail.com';          
        $mail->Password = getenv('GMAIL_PASSWORD');        
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                            
        $mail->Port       = 587;                             
    
        //Rest of your code...
                           

        //Recipients
        $mail->setFrom($email, "$first_name $last_name");
        $mail->addAddress('louizamoran1@gmail.com');     

        // Content
        $mail->isHTML(true);                                  
        $mail->Subject = "New message from $first_name $last_name";
        $mail->Body    = $message;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>