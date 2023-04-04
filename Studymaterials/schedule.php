
<?php
session_start();
	include 'db.php';
$email=$_SESSION['email'];
                                         $sqlq="SELECT logid from tbl_login where email='$email'";
                                         $resu = mysqli_query($conn, $sqlq);
                                         $row = mysqli_fetch_assoc($resu);
                                           $logid= $row['logid'];
                                           
if(isset($_POST['submit']))
{
	
	$logid= $_REQUEST['logid'];
  $cid= $_REQUEST['cid'];
	$date = $_POST['date'];
  $time = $_POST['time'];
  $etime = $_POST['etime'];
  //$added_on = $_POST['added_on'];
  $link = $_POST['link'];
	$sql = "INSERT INTO `tbl_schedule`(`logid`, `cid`, `date`, `time`,`etime`, `link`) VALUES ('$logid', '$cid', '$date', '$time','$etime','$link')";
	$result = mysqli_query($conn,$sql);
	if($result){
		echo "New record added";
		header('LOCATION:scheduleview.php');
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
                                    <?php
                                    $con=mysqli_connect("localhost","root","","tutor");
                                    
                                    
                                    if(isset($_GET['cid']))
                                    {
                                    $cid=$_GET['cid'];
                                    $email=$_SESSION['email'];
                                         $sqlq="SELECT logid from tbl_login where email='$email'";
                                         $resu = mysqli_query($conn, $sqlq);
                                         $row = mysqli_fetch_assoc($resu);
                                           $logid= $row['logid'];
                                           
                                   // $logid=$_POST['logid'];
                                    $query=mysqli_query($conn,"SELECT tbl_booking.bid, tbl_login.email, tbl_courseadd.cname,tbl_courseadd.cid,tbl_subcategory.class,tbl_booking.status FROM tbl_booking INNER JOIN tbl_login ON tbl_booking.logid = tbl_login.logid INNER JOIN tbl_courseadd ON tbl_booking.cid = tbl_courseadd.cid INNER JOIN tbl_subcategory ON tbl_subcategory.subcatid = tbl_courseadd.subcatid");
                                    while($row=mysqli_fetch_array($query))
                                    {
                                    ?>

      
                                     <label>Course Name :</label>
                                     <?php echo htmlentities($row['cname']);?>
                                    <input type="hidden" name="cid" class="form-control" placeholder="name" value="<?php echo $row['cid'];?>">
                                    <?php }} ?> 
                                    
                                    
                                    </select></div>
       <div class="inputfield">
          <label>Date:</label>
          <input type="Date" class="input" name="date" placeholder="" required>
       </div> 
       <div class="inputfield">
          <label>Start Time:</label>
          <input type="Time" class="input" name="time" placeholder="" required>
       </div>  
       <div class="inputfield">
          <label>End Time:</label>
          <input type="Time" class="input" name="etime" placeholder="" required>
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