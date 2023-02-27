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
    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
    <div class="form">
       <div class="inputfield">
          <label>Email</label>
          <input type="text" class="input" name="email" required value="<?php echo $email ?>>
       </div>   
       <div class="inputfield">
        <label>Password</label>
        <input type="text" class="input" name="password" required>
     </div>    
       <div class="inputfield">
        <label <a href="forgot-password.php"></a>>Forgot Password? </label></div>
      <div class="inputfield">
        <input type="submit" name="login" value="Login" class="btn"  <a href="index.html"></a>>
      </div>

    <div class="inputfield">
     <label>Not a member? <a href="projectregis.html">Signup</a></label>
    </div>
    </div>
</div>
</form>
</body>
</html>

