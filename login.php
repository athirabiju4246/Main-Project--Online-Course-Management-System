<?php
session_start();

if(isset($_SESSION['logid'])){
    $islogged=$_SESSION['logid'];
    if($islogged==true){
        header('Location: index.php');
        
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    
    <link rel="stylesheet" href="styles.css">
  </head>
  
  <body>
    <form method="POST" action="lg.php">
<div class="wrapper">
    <div class="title">
      Login
    </div>
    <div class="form">
       <div class="inputfield">
          <label>Email</label>
          <input type="text" class="input" name="email" required>
       </div>   
       <div class="inputfield">
        <label>Password</label>
        <input type="text" class="input" name="password" required>
     </div>    
       <div class="inputfield">
        <label>Forgot Password?</label></div>
      <div class="inputfield">
        <input type="submit" value="Login" class="btn" <a href="index.html"></a>>
      </div>

    <div class="inputfield">
     <label>Not a member? <a href="projectregis.html">Signup</a></label>
    </div>
    </div>
</div>
</form>
</body>
</html>