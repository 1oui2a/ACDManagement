<?php
 function db_connect(){
     $servername = "localhost";
     $username = "louiza";
     $password = "";
     $dbname = "acdmanagement";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }
    function db_query($conn, $query){
        $result = mysqli_query($conn, $query);
        return $result;
    }


 