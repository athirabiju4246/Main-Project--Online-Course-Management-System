<?php  
session_start();
include('config.php');

    if(isset($_POST['submit'])) 
    {  

     $username= $_POST['username'];
     $email=$_POST['email'];
     $password_1=md5($_POST['password_1']);
     $password_2=md5($_POST['password_2']);
    

     $sql="select * from userreg where (username='$username' or cpassword='$password_2');";

      $res=mysqli_query($conn,$sql);

      if (mysqli_num_rows($res) > 0) {
        
        $row = mysqli_fetch_assoc($res);
        if($password_2==isset($row['cpassword']) || ($username==isset($row['username'])))
        {
            $_SESSION['status'] = "You already have an account.Login to continue";
          
        }
	
		}
    else{
    $sql2 = "INSERT INTO login (email, password,role,status) VALUES ('$email','$password_1','user',1)";
		$result = $conn->query($sql2);
		
	if($result)
		{
		$logid= $conn->insert_id;
		$sql1 = "INSERT INTO userreg (username,cpassword,logid ) VALUES ('$username','$password_2','$logid')";  
		$result = $conn->query($sql1);
        $_SESSION['msg'] = "Account created successfully";
	} 
  else{
		$message = "error";
}
    }
  } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM VALIDATION</title>
    <link rel="stylesheet" href="userregister.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
		<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
		<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <script src="https://kit.fontawesome.com/2bbac3a66c.js" crossorigin="anonymous" ></script>
</head>
<body>
    <form  id="create-account-form" action="userregister.php" method="POST">
        
        <div class="title">
            <h2>Create Account</h2>
        </div>
		
        <!-- USERNAME -->
        <div class="input-group">
            <label for="username">Name</label>
            <input type="text" id="username"name="username" placeholder="Name">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <p>Error Message</p>
        </div>
        <!-- EMAIL -->
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <p>Error Message</p>
        </div>
        <!-- PASSWORD -->
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password"name="password_1" placeholder="Password">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <p>Error Message</p>
        </div>
        <!-- CONFIRM PASSWORD -->
        <div class="input-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="password_2" placeholder="Password">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <p>Error Message</p>
        </div>
        <center>
		<p>Already have an account?<a href="login.php">Login</a></p>
		</center><br>
        <button type="submit" name="submit"class="btn">Submit</button>
    </form>


    <!-- JAVASCRIPT -->
    <script src="user.js"></script>
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
	  <script>
<?php
   /**********************index.php**/
   if(isset($_SESSION['msg']))
     { 
	?>
	  alertify.set('notifier','position', 'top-center');
     alertify.success('<?= $_SESSION['msg'];?>');
   	   <?php
	  unset($_SESSION['msg']);
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