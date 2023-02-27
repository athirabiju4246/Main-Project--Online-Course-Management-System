<?php
include('config.php');

if(isset($_POST['submit']))
{
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$course = $_POST['course'];
$gender = $_POST['gender'];
//$role= $_POST['role_type'];
$dob = $_POST['dob'];
$password = $_POST['password'];
$cpassword =$_POST['cpassword'];
$sql="select * from tbl_studentregister where (email='$email' or cpassword='$password');";



$sql1 = "INSERT INTO tbl_login (`email`,`password`,`role`) VALUES ('$email','$password','tutor')";

 $result=$conn->query($sql1);
 
 if($result)
 {
  $logid = $conn->insert_id;
  $sql2 = "INSERT INTO tbl_studentregister (`logid`,`name`,`phone`,`course`,`gender`,`dob`,`cpassword`) VALUES ('$logid', '$name', '$phone', '$course', '$gender', '$dob', '$cpassword')";
  $result = $conn->query($sql2); 
  if($result){
    session_start();
    $_SESSION['islogged']=true;
    $_SESSION['uname']= $name;
    header('location:index.php');
  }
  
}
  
else{
    $message = "error";
  }
}
?>