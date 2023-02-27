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
//$sql1 = "INSERT INTO tbl_login (`email`,`password`,`role`) VALUES ('$email','$password','teacher')";
$sql="select * from tbl_login where (email='$email' or password='$password');";

$res=mysqli_query($conn,$sql);

if (mysqli_num_rows($res) > 0) {
  
  $row = mysqli_fetch_assoc($res);
  if($password==isset($row['password']) || ($email==isset($row['email'])))
  {
      $_SESSION['status'] = "You already have an account.Login to continue";
      
     header('LOCATION:Studentregister.php');
  }

}
else{
  
$sql1 = "INSERT INTO tbl_studentregister (`logid`,`name`,`phone`,`course`,`gender`,`dob`,`cpassword`) VALUES ('$logid', '$name', '$phone', '$course', '$gender', '$dob', '$cpassword')";

$sql2 = "INSERT INTO tbl_login (email,password,role,status) VALUES ('$email','$password','teacher',0)";
if(mysqli_query($conn, $sql2)){
echo "Records added successfully.";
header('LOCATION:index.php');
} else{
echo "ERROR: Could not able to execute $sql2. " . mysqli_error($conn);
}
}
}



?>
