<?php
	include 'config.php';
	
if(isset($_POST['submit']))
{
	
	$cname = $_POST['cname'];
	$subcode = $_POST['subcode'];
	$cstart = $_POST['cstart'];
	$cend = $_POST['cend'];
	$fees = $_POST['fees'];	
	$description = $_POST['description'];	
	$sql = "INSERT INTO `tbl_courseadd`(`cname`, `subcode`, `cstart`, `cend`, `fees`, `description`,  `status`) VALUES ('$cname','$subcode','$cstart','$cend','$fees', '$description', '1')";
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