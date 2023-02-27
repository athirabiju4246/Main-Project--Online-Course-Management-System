<?php
session_start();
include ('config.php');
if(isset($_POST['submit']))
{
$id = $_POST['cid'];
$cname = $_POST['cname'];
$subcode = $_POST['subcode'];
$cstart = $_POST['cstart'];
$cend = $_POST['cend'];
$fees = $_POST['fees'];
$description = $_POST['description'];
    
    
$query="UPDATE tbl_courseadd SET `cname`='$cname', `subcode`='$subcode', `cstart`='$cstart', `cend`='$cend',`fees`='$fees', `description`='$description' WHERE cid='$id'";
$query_run=mysqli_query($conn,$query);
if($query_run)
{
    $_SESSION['status'] = "Category updated successfully";
    //header('location:category.php');
    exit(0);
}
}
?>

