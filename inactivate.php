<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sql3="UPDATE tbl_courseadd set status='0' where cid='$id'";
if(mysqli_query($conn,$sql3))
{
    $_SESSION['msg'] = "Course deactivated successfully";
}
header("Location: courseadddisplay.php");
?>