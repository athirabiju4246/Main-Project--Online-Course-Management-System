<?php
session_start();
include('config.php');

$id=$_REQUEST['carid'];

$sql4="DELETE FROM `tbl_carrier` WHERE carid='$id'";
if(mysqli_query($conn,$sql4))
{
    $_SESSION['msg2'] = "Category activated successfully";
}
header("Location: carrierview.php");
?>