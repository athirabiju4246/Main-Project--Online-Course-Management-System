<?php
session_start();
include('config.php');

if(isset($_POST['sub']))
{
  echo 0;
  $email=$_POST["email"];
  $password=$_POST["password"];

  $sql="SELECT * from tbl_login where (email='$email' and password='$password');";
  $result = mysqli_query($conn, $sql);


  if (mysqli_num_rows($result) > 0){
   echo 1;
    foreach($result as $data)
    {
      $email=$data['email'];
      $password=$data['password'];
      $role=$data['role'];
      $login_id= $data['logid'];

    }
    $_SESSION['role']="$role";
    $_SESSION['email']="$email";
    $_SESSION['login_id']= $login_id;
    $_SESSION['auth_user']=[
      'email'=>$email,
      'password'=>$password  
	];

    if($_SESSION['role']=='admin')
    {
      echo 2;
      $_SESSION['message']="Welcome";
      header("location:Adminpanel.php");
      exit(0);
    }
    else if($_SESSION['role']=='teacher')
    {
      echo 3;
      $_SESSION['message']="Welcome";
       header("location:index.php");
      exit(0);
    }
    else if($_SESSION['role']=='student')
    {
      echo 4;
      $_SESSION['message']="Welcome";
       header("location:deshome.html");
      exit(0);
    }
}
else
{
  echo 5;
    echo "Invalid Email ID/Password";
}
}
?>