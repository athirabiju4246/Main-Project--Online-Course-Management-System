<?php
session_start();

include('config.php');

if(isset($_POST['sub']))
{
    $email= $_POST["email"];
    $newpassword=$_POST["Password"];
    $result = mysqli_query($conn,"SELECT * FROM tbl_login WHERE email='$email' and role='teacher'");
     
    if(mysqli_num_rows($result)==0)
      {
          $_SESSION['wrong'] = " Email does not exists";
      }
  
      else{
      $sql=mysqli_query($conn,"UPDATE tbl_login,tbl_studentregister SET tbl_login.password='$password'where tbl_login.logid=tbl_studentregister.logid");
      $_SESSION['change'] = "Password changed successfully";
      }
    
  }

?>

<!Doctype HTML>
    <html>
    <head>
        <title></title>
        <link rel="stylesheet" href="styl.css" type="text/css"/>
        <link rel="stylesheet" href="pagecss.css" type="text/css"/>
     
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="mainheader.css" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>

.cardStyle {
    width: 530px;
    border-color: white;
    background: #fff;
    padding: 40px 0;
    border-radius: 4px;
    margin: 80px 0;
    box-shadow: 10px 10px 10px 10px rgba(108, 105, 105, 0.25);
  }
.formTitle{
  font-weight: 600;
  margin-top: 20px;
  color: #2F2D3B;
  text-align: center;
}
.inputLabel {
  font-size: 12px;
  color: #555;
  margin-bottom: 6px;
  margin-top: 24px;
}
  .inputDiv {
    width: 70%;
    display: flex;
    flex-direction: column;
    margin: auto;
  }
input {
  height: 40px;
  font-size: 18px;
  border-radius: 4px;
  border: none;
  border: solid 1px #ccc;
  padding: 0 11px;
}
input:disabled {
  cursor: not-allowed;
  border: solid 1px #eee;
}
.buttonWrapper {
  margin-top: 40px;
}
  .submitButton {
    width: 70%;
    height: 40px;
    margin: auto;
    display: block;
    color: #fff;
    background-color: #065492;
    border-color: #065492;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.12);
    box-shadow: 0 2px 0 rgba(0, 0, 0, 0.035);
    border-radius: 4px;
    font-size: 14px;
    cursor: pointer;
  }
.submitButton:disabled,
button[disabled] {
  border: 1px solid #cccccc;
  background-color: #cccccc;
  color: #666666;
}

#loader {
  position: absolute;
  z-index: 1;
  margin: -2px 0 0 10px;
  border: 4px solid #f3f3f3;
  border-radius: 50%;
  border-top: 4px solid #666666;
  width: 14px;
  height: 14px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}
         </style>
        
    </head>

<center>

        <div class="cardStyle">
          <form action="#" method="post"onsubmit="return validate();">
            
            <img src="" id="signupLogo"/>
            
            <h2 class="formTitle">
              Change password
            </h2>

            <div class="inputDiv">
            <label style="font-size:15px;" class="inputLabel" for="password">Enter your Registered email id</label>
            <input type="email" id="email" name="email" required pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" oninvalid="setCustomValidity('Enter a valid Email !!')" 
                        oninput="setCustomValidity('')">
          </div>

            
          <div class="inputDiv">
            <label style="font-size:15px;"class="inputLabel" for="Password">Enter Your New Password</label>
            <input type="password" id="Password" name="Password"required oninvalid="setCustomValidity('Enter a valid password of minimum length 3 !!')" 
                        oninput="setCustomValidity('')" minlength="3">
          </div>
          
          <div class="buttonWrapper">
            <button type="sub" id="sub"name="sub">
              <span style="color:black;font-weight:bold">CHANGE</span>
            </button>
          </div>
            
        </form>
        </div>
      
</center>
    

<script>
    function validate($check) {

    var reg_email = document.getElementById("reg_email");
    var password = document.getElementById("password ");
    var Password  = document.getElementById("Password ");
    
}
</script>



    </body>


    </html>