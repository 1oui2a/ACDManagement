<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 function db_connect(){
     $servername = "localhost";
     $username = "louiza";
     $password = "root";
     $dbname = "acdmanagement";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }

    // Query the database
    function db_query($conn, $query){
        $result = mysqli_query($conn, $query);
        return $result;
    }

    $conn = db_connect();

// Get data from form
$firstName = $_POST["first_name"];
$lastName = $_POST["last_name"];
$email = $_POST["email"];
$date = $_POST["date"];
$time = $_POST["time"];

// Prepare and bind for security to prevent injection attacks
$stmt = $conn->prepare("INSERT INTO bookings (first_name, last_name, email, date, time) VALUES (?, ?, ?, ?, ?)"); // ? are placeholders for data to be inserted
$stmt->bind_param("sssss", $firstName, $lastName, $email, $date, $time); // s means string data type for each parameter to be inserted into the database

// Execute the prepared statement
if ($stmt->execute()) { // execute the statement
    echo "New record created successfully";
       // Send an email
       $to = "louizamoran@gmail.com";
       $subject = "New booking";
       $message = "New booking from $first_name $last_name on $date at $time.";
       $headers = "From: webmaster@example.com";
   
       if (mail($to, $subject, $message, $headers)) {
           echo "Email sent successfully";
       } else {
           echo "Error sending email";
         }
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
mysqli_close($conn);
?>