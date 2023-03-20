<?php
session_start();
include('config.php');

$id=$_REQUEST['bid'];

$sql4="INSERT INTO `tbl_tutorcourse`(`cid`, `logid`, `status`) VALUES ('cid','$logid','1')";
if(mysqli_query($conn,$sql4))
{
    $_SESSION['msg2'] = "Category activated successfully";
}
header("Location: Bookingrequest.php");
?>