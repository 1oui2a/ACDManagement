<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once "functions.php";
session_start();
$conn = db_connect();



if(isset($_POST['register'])){ 
    // echo "Register button was clicked.<br>";
    
    if (isset($_POST['username']) && isset($_POST['password'])){ // if set
        $username = $_POST['username']; // get
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

        // Check if username is empty
        if (empty($username)) {
            echo "Username cannot be empty.<br>";
        } else {
            // Check if username already exists
            $check_query = "SELECT * FROM users WHERE username = '$username'";
            $check_result = mysqli_query($conn, $check_query);
            if (mysqli_num_rows($check_result) > 0) { 
                echo "Username already exists.<br>";
            } else {
                $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')"; 

                if(mysqli_query($conn, $query)){ 
                    echo "Query was successful.<br>";

                    // Get the ID of the newly registered user
                    $user_id = mysqli_insert_id($conn); // last inserted id

                    // Set the user_id session variable
                    $_SESSION['user_id'] = $user_id;

                    header("Location: welcome.php"); 
                } else {
                    echo "Registration failed.<br>";
                    echo "Error: " . mysqli_error($conn); // Display the error
                }
            }
        }
    } else {
        echo "Username or password was not set.<br>";
    }
} else {
    // ...
}
?>




<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
    <style type="text/css">
        th {
            text-align: right;
        }

        h3 {
            text-align: center;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #45a049;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 5px;
            border: 1px solid #4CAF50;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <table cellpadding="5" cellspacing="10" align="center">
        <h3>Register Here</h3>
        <form method="post" action="registration.php">
            <tr>
                <th>Username</th>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="checkbox" name="remember" value="1">Remember Me</td>
            </tr>
            <tr>
                <td colspan="2" align="right"><input type="submit" value="Register" name="register"></td>
            </tr>
            <tr>
                <td colspan="2" align="right"><a href="welcome.php">Login</a></td>
            </tr>

        </form>
    </table>
</body> 

</html>