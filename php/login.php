<?php
include_once "functions.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$conn = db_connect() or die('Cannot connect to database!');


if(isset($_POST['login'])){ // Check if the login form is submitted
    $username = $_POST['username']; // Get the username and password
    $password = $_POST['password']; // Get the username and password

    // declare and run query to select user with the entered username
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    // if the query returns a single row, check if the entered password matches the hashed password in the database
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {// if the password matches
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            header("Location: welcome.php");
        }
    }
}
?>



<!DOCTYPE html>
<html>

<head>
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
        <h3>Login here</h3>
        <form method="post" action="login.php">
            <tr>
                <th>Username</th>
                <td><input type="text" name="username" id="username"></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="checkbox" name="remember" value="1">Remember Me</td>
            </tr>
            <tr>
                <td colspan="2" align="right"><input type="submit" value="login" name="login"></td>
            </tr>
            <tr>
                <td colspan="2" align="right"><a href="php">Register</a></td>
            </tr>

        </form>
    </table>
</body>

</html>