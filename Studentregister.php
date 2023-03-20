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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRATION</title>
    <link rel="stylesheet" href="reg.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
		<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
		<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <script src="https://kit.fontawesome.com/2bbac3a66c.js" crossorigin="anonymous" ></script>
</head>
<body>
    <form  id="create-account-form" action="" method="POST">
        
        <div class="title">
            <h2>Create Account</h2>
        </div>
		
        <!-- USERNAME -->
        <div class="input-group">
            <label for="username">Name</label>
            <input type="text" id="name"name="name" onkeyup="fnameValidation(this)">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <span id="username" class="new"  style="color: red; font-size: small;"></span>
            <p>Error Message</p>
        </div>
        <!-- EMAIL -->
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" onkeyup="emailValidation(this)" >
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <p>Error Message</p>
        </div>
        <div class="input-group">
            <label for="course">Course</label>
            <input type="course" id="course" name="course" required>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <p>Error Message</p>
        </div>
        <div class="input-group">
        <label>Gender</label>
            <select name="gender" id="gender" required>
              <option value="">Select</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
       </div> 

  <!--  <div class="input-group">
        <label>Role</label>
            <select name="role" id="role_type">
              <option value="" selected disabled >Select</option>
              <option value="0">teacher</option>
              <option value="1">Student</option>
            </select>
       </div>-->

        <div class="input-group">
            <label for="dob">DATE OF BIRTH</label>
            <input type="date" id="dob" name="dob" min="2006-01-01" max="2016-01-01" required >
            <script>
            function myFunction() {
              var x = document.getElementById("dob").max = "2016-01-01";
              document.getElementById("input-group").innerHTML = "The value of the max attribute was changed from '2006-01-01' to '2016-01-01'.";
            }
            </script>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <p>Error Message</p>
        </div>
        <div class="input-group">
            <label for="Phone">Phone</label>
            <input type="phone" id="phone" name="phone" onkeyup="phn_noValidation(this)" maxlength="10" required>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <p>Error Message</p>
            </div>
        <!-- PASSWORD -->
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password"name="password" onkeyup="passwordValidation(this)">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <p>Error Message</p>
        </div>
        <!-- CONFIRM PASSWORD -->
        <div class="input-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="cpassword" onkeyup="cpasswordValidation(this)">
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

 <script>
// Full name //

function fnameValidation(inputTxt){
     
     var regx = /^[a-zA-Z ]+$/ ;
     var textField = document.getElementById("username");
         
     if(inputTxt.value != '' ){
     
         if(inputTxt.value.length >= 2){
         
             if(inputTxt.value.match(regx)){
                 textField.textContent = '';
                 textField.style.color = "green";
                     
             }else{
                 textField.textContent = 'only characters are allowded to insert!';
                 textField.style.color = "red";
             }  
         }else{
             textField.textContent = 'your input must more than two chracters';
             textField.style.color = "red";
         }  
     }else{
         textField.textContent = 'your are not allowed  to leave a field  empty';
         textField.style.color = "red";
     }
    }

 

//email//

function emailValidation(inputTxt){
    // ^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$
    var regx = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    var textField = document.getElementById("email");
       
    if(inputTxt.value != '' ){
        if(inputTxt.value.match(regx)){
            textField.textContent = '';
            textField.style.color = "green";
        }else{
            textField.textContent = 'email id  is not valid!!! please insert a valid one';
            textField.style.color = "red";
        }  
    }else{
        textField.textContent = 'your are not allowed  to leave a field  empty';
        textField.style.color = "red";
    }
}

//pwd//

function passwordValidation(inputTxt){
   
    var regx = /(?=.\d)(?=.[a-z])(?=.*[A-Z]).{5,}/;
    var textField = document.getElementById("password");
       
    if(inputTxt.value != '' ){
            if(inputTxt.value.match(regx)){
                textField.textContent = '';
                textField.style.color = "green";
                   
            }else{
                textField.textContent = 'Must contain at least one number and one uppercase and lowercase letter and aleast 5 characters';
                textField.style.color = "green";
            }    
    }else{
        textField.textContent = 'your are not allowed  to leave a field  empty';
        textField.style.color = "red";
    }
}
//cpwd//

function cpasswordValidation(inputTxt){
   
    var regx =  document.getElementById("password").value;
    var regy =  document.getElementById("confirm-password").value;
    var textField = document.getElementById("confirm-password");
    var textField1 = document.getElementById("password");
       
    if(inputTxt.value != '' ){    
            if(regx == regy){
                textField.textContent = '';
                textField.style.color = "green";
                   
            }else{
                textField.textContent = 'Entered to passwords are not same!!';
                textField.style.color = "red";
            }  
        }else{
            textField.textContent = '';
            textField.style.color = "red";
        }  
}


//address//
function addressValidation(inputTxt){
     
     var regx = /^[a-zA-Z]+$/;
     var textField = document.getElementById("adrs");
         
     if(inputTxt.value != ''){
     
         if(inputTxt.value.length >= 2){
         
             if(inputTxt.value.match(regx)){
                 textField.textContent = '';
                 textField.style.color = "green";
                     
             }else{
                 textField.textContent = 'only characters are allowded to insert!';
                 textField.style.color = "red";
             }  
         }else{
             textField.textContent = 'your input must more than two chracters';
             textField.style.color = "red";
         }  
     }else{
         textField.textContent = 'your are not allowed  to leave a field  empty';
         textField.style.color = "red";
     }
    }

    function usernameValidation(inputTxt){
     
     var regx = /^[a-zA-Z]+$/;
     var textField = document.getElementById("uname");
         
     if(inputTxt.value != ''){
     
         if(inputTxt.value.length >= 2){
         
             if(inputTxt.value.match(regx)){
                 textField.textContent = '';
                 textField.style.color = "green";
                     
             }else{
                 textField.textContent = 'only characters are allowded to insert!';
                 textField.style.color = "red";
             }  
         }else{
             textField.textContent = 'your input must more than two chracters';
             textField.style.color = "red";
         }  
     }else{
         textField.textContent = 'your are not allowed  to leave a field  empty';
         textField.style.color = "red";
     }
    }




    //phone
 function phn_noValidation(inputTxt){
   
   var regx = /^\d{10}$/;
   var textField = document.getElementById("phone");
       
   if(inputTxt.value != '' ){
       if(inputTxt.value.match(regx)){
           textField.textContent = '';
           textField.style.color = "green";
       }else{
           textField.textContent = 'Your Mobile Number Is Not    Valid.';
           textField.style.color = "red";
       }  
   }else{
       textField.textContent = 'your are not allowed  to leave a field  empty';
       textField.style.color = "red";
   }
}
    </script>