<?php
session_start();
include('config.php');

$id=$_REQUEST['bid'];

$sql4="UPDATE tbl_Booking set status='accepted' where bid='$id'";
if(mysqli_query($conn,$sql4))
{
    $_SESSION['msg2'] = "activated successfully";
}
header("Location: Bookingrequest.php");
?>