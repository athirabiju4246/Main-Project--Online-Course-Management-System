<?php
    $servername = 'localhost';
    $username   = 'root'; // Username
    $password   = ''; // Password
    $dbname     = "tutuor";
    $conn       = mysqli_connect($servername,$username,$password,"$dbname");
    if(!$conn){
        die('Could not Connect MySql Server:' .mysql_error());
    }
?>