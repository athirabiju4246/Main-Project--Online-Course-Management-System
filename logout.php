<?php
session_start();
unset($_SESSION['logid']);
//$_SESSION = array();
session_unset(); 
session_destroy(); 
header('location: MultiLogin.php');
exit();
?>