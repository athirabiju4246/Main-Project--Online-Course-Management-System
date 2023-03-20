<?php
    $conn = mysqli_connect('localhost', 'root', '', 'tutor');
 
    if(!$conn){
        die("Error: Failed to connect to database!");
    }
?>