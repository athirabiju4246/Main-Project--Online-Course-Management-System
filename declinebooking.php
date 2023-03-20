<?php
session_start();
include('config.php');
$id=$_REQUEST['bid'];

$sql3="UPDATE `tbl_booking` SET status='declined' where `bid`='$id'";
if(mysqli_query($conn,$sql3))
{
    $_SESSION['msg'] = "Course deactivated successfully";
}
header("Location: Bookingrequest.php");
?>