<?php
session_start();
unset($_SESSION['logid']);  
header('location: MultiLogin.php');
?>