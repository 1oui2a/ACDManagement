<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "databaseACD";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from form
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$date = $_POST["date"];
$time = $_POST["time"];

// Prepare and bind for security to prevent injection attacks
$stmt = $conn->prepare("INSERT INTO booking (firstName, lastName, email, date, time) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $firstName, $lastName, $email, $date, $time);

// Execute the prepared statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>