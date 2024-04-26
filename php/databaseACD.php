<?php
 function db_connect(){
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "databaseACD";

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

// Get data from form
$firstName = $_POST["first_name"];
$lastName = $_POST["last_name"];
$email = $_POST["email"];
$date = $_POST["date"];
$time = $_POST["time"];

// Prepare and bind for security to prevent injection attacks
$stmt = $conn->prepare("INSERT INTO bookings (first_name, last_name, email, date, time) VALUES (?, ?, ?, ?, ?)");
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