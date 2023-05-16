<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Facebook Style Header Notification using PHP Ajax Bootstrap</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../styleA.css">
 </head>
 <body>
 <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">EduWell</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="Adminpanel.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="courseadddisplay.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Course</span>
          </a>
        </li>
       <li>
          <a href="Bookingrequest.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Booking Course</span>
          </a>
        </li>
      <li>
          <a href="tutorcourses.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Tutors</span>
          </a>
        </li>
       <li>
          <a href="booking.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">carrier</span>
          </a>
        </li>
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

  
 
