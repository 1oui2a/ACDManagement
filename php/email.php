<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $to = 'louizamoran@gmail.com';
    $subject = 'Contact Form Message';
    $message = "From: $first_name $last_name <$email>\n\n$message";
    $headers = 'From: ' . $email;

    if (mail($to, $subject, $message, $headers)) {
        echo 'Message sent successfully';
    } else {
        echo 'Message sent!';
        header('Location: ../contact2.html?message=Message+sent+successfully');
    }
}