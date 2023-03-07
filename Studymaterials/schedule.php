
<?php
	include 'db.php';
	
if(isset($_POST['submit']))
{
	
	
	$date = $_POST['date'];
  $time = $_POST['time'];
  $link = $_POST['link'];
	$sql = "INSERT INTO `tbl_schedule`(`date`, `time`, `link`) VALUES ('$date', '$time', '$link')";
	$result = mysqli_query($conn,$sql);
	if($result){
		//echo "New record added";
		//header('LOCATION:categoryview.php');
	}
	else{
	 echo mysqli_error($conn);
	}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylescadd.css">
  </head>
  
  <body>
  <section class="">
    <nav>
  <div class="profile-details">
        <img src="images/profile.jpg" alt="">
        <span class="admin_name">athira@gmail.com</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    <form method="POST" action="#">
<div class="wrapper">
    <div class="title">
      ADD SCHEDULES
    </div>
    <div class="form">
       <div class="inputfield">
          <label>Date:</label>
          <input type="Date" class="input" name="date" placeholder="" required>
       </div>  
       <div class="inputfield">
          <label>Time:</label>
          <input type="Time" class="input" name="time" placeholder="" required>
       </div> 
       <div class="inputfield">
          <label>Link:</label>
          <input type="Link" class="input" name="link" placeholder="" required>
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