<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylescadd.css">
  </head>
  
  <body>
    <form method="POST" action="#" enctype="multipart/form-data">
<div class="wrapper">
    <div class="title">
      Add carrier
    </div>
    <div class="form">
   
      <div class="inputfield">
          <label>Title</label>
          <input type="text" class="input" id="phone" name="title" placeholder="Title" onkeyup="phn_noValidation(this)">
       </div> 
       <div class="inputfield">
        <label>Description</label>
        <input type="text" class="input" name="description" row="5" placeholder="Description">
     </div> 
        <input type="submit" value="Apply" name="submit" class="btn">
      </div>
    </div>
</div>
</form>
<script type="text/javascript" src="date.js"></script>

</body>
</html>
<?php
session_start();
	include 'config.php';
	$email=$_SESSION['email'];
	$sqlq="SELECT logid from tbl_login where email='$email'";
    $resu = mysqli_query($conn, $sqlq);
    $row = mysqli_fetch_assoc($resu);
	$logid= $row['logid'];
if(isset($_POST['submit']))
{
	//$logid = $_POST['logid'];
	//$cname = $_POST['cname'];
	//$subcode = $_POST['subcode'];
	$title = $_POST['title'];	
	$description = $_POST['description'];	
	$sql = "INSERT INTO `tbl_carrier`(`title`,`description`) VALUES ('$title','$description')";
	$result = mysqli_query($conn,$sql);
	if($result){
		echo "New record added";
		header('LOCATION:carrierview.php');
	}
	else{
	 echo mysqli_error($conn);
	}
}
?>
