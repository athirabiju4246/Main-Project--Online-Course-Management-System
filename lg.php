<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="tutor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['sub']))
{

$email= $_POST['email'];
$password=$_POST['password'];

$sql = "SELECT *from tbl_login where email = '$email' and password = '$password'";  
$result = mysqli_query($conn, $sql);  
$fetch = mysqli_fetch_array($result);  
$count = mysqli_num_rows($result); 
//echo md5("admins"); 
  
if($count > 0){
  session_start();
  $_SESSION['logid']=$fetch['logid'];
     //echo $_SESSION['logid'];
 header('location:Adminpanel.html');
}
}
else{
  echo "<h1>Login failed .Invalid email or password </h1> ";
}

?>