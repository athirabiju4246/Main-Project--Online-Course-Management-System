<?php	
  session_start();
	include 'config.php';
	$email=$_SESSION['email'];
	$sqlq="SELECT logid from tbl_login where email='$email'";
    $resu = mysqli_query($conn, $sqlq);
    $row = mysqli_fetch_assoc($resu);
	  $logid= $row['logid'];
	//echo $logid;
	$targetDir="shopping/cimages/";
if(isset($_POST['submit']))
{
	 
	$catid = $_POST['catid']; 
  $cname = $_POST['cname'];
  $subcatid = $_POST['subcatid'];
	$subcode = $_POST['subcode'];
	$cstart = $_POST['cstart'];
  $pimage=$_FILES["pimage"]["name"];
	$cend = $_POST['cend'];
	$fees = $_POST['fees'];	
	$description = $_POST['description'];
  $targetFilePath = $targetDir. $pimage;
  
  move_uploaded_file($_FILES["pimage"]['tmp_name'],$targetFilePath);
  $sql="select * from tbl_courseadd where (cname='$cname' or subcode='$subcode');";

  $res=mysqli_query($conn,$sql);

  if (mysqli_num_rows($res) > 0) {
    
    $row = mysqli_fetch_assoc($res);
    if($subcode==isset($row['subcode']) || ($cname==isset($row['cname'])))
    {
        $_SESSION['status'] = "You already have an account.Login to continue";
        echo "Already Registered";
        
    }

}
else{
	$sql2 = "INSERT INTO `tbl_courseadd` (`logid`, `catid`, `subcatid`, `cname`, `subcode`, `cstart`, `cend`, `fees`, `description`, `pimage`, `status`) VALUES ('$logid','$catid','$subcatid','$cname','$subcode','$cstart','$cend','$fees', '$description', '$pimage', '1')";
	$result = mysqli_query($conn,$sql2);
	if($result){
		echo "New record added";
		header('LOCATION:courseadddisplay.php');
	}
	else{
	 echo mysqli_error($conn);
	}
}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylescadd.css">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styleA.css">
    
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  
  <body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">EduWell</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="categoryadd.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">category</span>
          </a>
        </li>
        <li>
          <a href="subcategory.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Subactegory</span>
          </a>
        </li>
        <li>
          <a href="courseregister.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Courses</span>
          </a>
        </li>
        <li>
          <a href="categoryview.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Category View</span>
          </a>
        </li>
        <li>
          <a href="subcategoryview.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Subcategory view</span>
          </a>
        </li>
       <!-- <li>
          <a href="#">
            <i class='bx bx-user' ></i>
            <span class="links_name">Team</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Favrorites</span>
          </a>
        </li>-->
        <li>
          <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span>
          </a>
        </li>
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
     <!-- <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>-->
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name">Admin</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
</div>
    </nav>
</div>
<div class="row header" style="text-align:center;color:black;backgroundcolor:white" >
    <div>
    <form method="POST" action="#" enctype="multipart/form-data">
<div class="wrapper">
    <div class="title">
      ADD COURSE
    </div>
    <div class="form">
    <div class="inputfield">
                                    <?php
                                    $con=mysqli_connect("localhost","root","","tutor");
                                    
                                    
                                    $sql=mysqli_query($conn,"select * from tbl_category WHERE status=1"); 
                                    ?>
                                    <label>Category Name</label><br>
                                    
                                    
                                    <select   name="catid" id="category" onchange="showResult(this.value)" class="form-control m-bot15" required >
                                    <option value=" ">--select--</option>
                                    <?php
                                    while($row=mysqli_fetch_array($sql))
                                    {
                                    
                                    ?>
                                    <option value="<?php echo $row[0] ?>"> <?php echo $row[1] ?></option>
                                    
                                    <?php
                                    
                                    }
                                    ?>
                                    
                                    </select></div>
                                    <div class="inputfield">
                                    <?php
                                    $con=mysqli_connect("localhost","root","","tutor");
                                    
                                    
                                    $sql=mysqli_query($con,"select * from tbl_subcategory WHERE status=1"); 
                                    ?>
                                    <label>Subcategory Name</label><br>
                                    
                                    
                                    <select   name="subcatid" id="sub_category" onchange="showResult(this.value)" class="form-control m-bot15" required >
                                    <option value="">--select--</option>
                                    <?php
                                    while($row=mysqli_fetch_array($sql))
                                    {
                                    
                                    ?>
                                    <option value="<?php echo $row[0] ?>" ><?php echo $row[2] ?></option>
                                    <?php
                                    
                                    }
                                    ?>
                                    
                                    </select></div>
       <div class="inputfield">
          <label>Course Name</label>
          <input type="text" class="input" name="cname" placeholder="Course name" onkeyup="this.value = this.value.toUpperCase();"onkeypress="return validateInput(event);">
           
       </div>
       <script>
function validateInput(event) {
  var char = event.which || event.keyCode;
  if (char >= 48 && char <= 57) {
    event.preventDefault();
    return false;
  }
  return true;
}
</script>
       
       <div class="inputfield">
        <label>Subject Code</label>
        <input type="text" class="input" name="subcode" placeholder="Subject Code" onkeyup="this.value = this.value.toUpperCase(subcode);" >
     </div> 
       <div class="inputfield">
          <label>Start Date</label>
          <input type="date" class="input" name="cstart" placeholder="Start Date"  id="myDate" min="2023-04-04" max="" required>
          <script>
            function myFunction() {
              var x = document.getElementById("myDate").max = "2014-01-01";
              document.getElementById("inputfield").innerHTML = "The value of the max attribute was changed from '2000-01-01' to '2014-01-01'.";
            }
            </script>
            
        </div>  
      <div class="inputfield">
          <label>End Date</label>
          <input type="date"  name="cend" class="input" min="2024-01-01" required>
           <script>
            function myFunction() {
              var x = document.getElementById("myDate").max = "2014-01-01";
              document.getElementById("inputfield").innerHTML = "The value of the max attribute was changed from '2000-01-01' to '2014-01-01'.";
            }
            </script>

       </div> 
      <div class="inputfield">
          <label>Fees</label>
          <input type="text" class="input" id="phone" name="fees" placeholder="Fees" onkeyup="phn_noValidation(this)" maxlength="4" required>
       </div> 
       <div class="inputfield">
        <label>Description</label>
        <input type="text" class="input" name="description" placeholder="Description" required>
     </div> 
     <div class="inputfield">           
                                        <label for="image">Course image</label>
                                        <input type="file" class="form-control" accept="image/gif, image/jpeg, image/png, image/jpg"  name="pimage" id="image" required>
                                    </div>
      <div class="inputfield">
        <input type="submit" value="Apply" name="submit" class="btn">
      </div>
    </div>
</div>
</form>
<script type="text/javascript" src="date.js"></script>

</body>
</html>

<script>
  function phn_noValidation(inputTxt){
   
   var regx = /^\d{4}$/;
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