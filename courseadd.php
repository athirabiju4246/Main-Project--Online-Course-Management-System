<?php
session_start();
	include 'config.php';
	$email=$_SESSION['email'];
	$sqlq="SELECT logid from tbl_login where email='$email'";
    $resu = mysqli_query($conn, $sqlq);
    $row = mysqli_fetch_assoc($resu);
	$logid= $row['logid'];
if(isset($_POST['submit']))
{
	$logid = $_POST['logid'];
	$cname = $_POST['cname'];
	$subcode = $_POST['subcode'];
	$cstart = $_POST['cstart'];
	$cend = $_POST['cend'];
	$fees = $_POST['fees'];	
	
	$description = $_POST['description'];	
	$sql = "INSERT INTO `tbl_courseadd`(`logid`, `cname`, `subcode`, `cstart`, `cend`, `fees`, `description`,  `status`) VALUES ($logid','$cname','$subcode','$cstart','$cend','$fees', '$description', '1')";
	$result = mysqli_query($conn,$sql);
	if($result){
		echo "New record added";
		header('LOCATION:courseadddisplay.php');
	}
	else{
	 echo mysqli_error($conn);
	}
}
?>