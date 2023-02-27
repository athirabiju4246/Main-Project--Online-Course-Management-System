<?php
include('config.php');
if(isset($_POST['submit']))
{
  $email=$_POST["email"];
  $password=$_POST["password"];

  $sql="select * from tbl_login where (email='$email' or password='$password');";
  $result = mysqli_query($conn, $sql);


  if (mysqli_num_rows($result) > 0){
    session_start();
    $_SESSION['logid']=$fetch['logid'];
    echo $_SESSION['logid'];
	foreach($result as $data)
	{
	  $email=$data['email'];
	  $password=$data['password'];
	  $role=$data['role'];
	}
	$_SESSION['role']="$role";
	$_SESSION['email']="$email";
	$_SESSION['auth_user']=[
	  'email'=>$email,
	  'password'=>$password
	];

	if($_SESSION['role']=='admin')
	{
	  $_SESSION['message']="Welcome";
	  header("location:Adminpanel.html");
	  exit(0);
	}
	else if($_SESSION['role']=='user')
	{
	  $_SESSION['message']="Welcome";
	   header("location:userregister.php");
	  exit(0);
	}
}
  else
  {

    $_SESSION['status'] = "Invalid account details";

  }
}
?>
<?php
session_start();

if(isset($_SESSION['logid'])){
    $islogged=$_SESSION['logid'];
    if($islogged==false){
        header('Location: login.php');
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>,
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM VALIDATION</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
		<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
		<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <script src="https://kit.fontawesome.com/2bbac3a66c.js" crossorigin="anonymous" ></script>
</head>
<body>
    <form id="create-account-form" action="login.php" method="POST">
        
        <div class="title">
            <h2>Create Account</h2>
        </div>
		
        
        <!-- EMAIL -->
        <div class="input-group">
            <label for="mail">Email</label>
            <input type="email" id="mail" name="email" placeholder="Email">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <p>Error Message</p>
        </div>
        <!-- PASSWORD -->
        <div class="input-group">
            <label for="pass">Password</label>
            <input type="password" id="pass"name="password" placeholder="Password">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <p>Error Message</p>
        </div>
       
        <center>
		<p>Forgot password?<a href="forgot.php">Click here</a></p>
		</center><br>
        <button type="submit" name="submit"class="btn">Submit</button>
    </form>


    <!-- JAVASCRIPT -->
    <script src="login.js"></script>
    <script>
<?php
   /**********************index.php**/
   if(isset($_SESSION['status']))
     { 
	?>
	  alertify.set('notifier','position', 'top-center');
     alertify.success('<?= $_SESSION['status'];?>');
   	   <?php
	  unset($_SESSION['status']);
      //if user refresh index.php after 1st time it will not see the message
      }
      ?>
	  </script>
</body>
</html>

<!-- 

    <i class="fas fa-check-circle"></i>
    <i class="fas fa-exclamation-circle"></i>

 -->