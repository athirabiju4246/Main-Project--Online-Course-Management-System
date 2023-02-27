<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sql4="UPDATE tbl_Booking set status='1' where bid='$id'";
if(mysqli_query($conn,$sql4))
{
    $_SESSION['msg2'] = "Category activated successfully";
}
header("Location: Bookingrequest.php");
?>