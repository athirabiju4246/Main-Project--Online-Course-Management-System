      <?php
session_start();
include ('config.php');

if(isset($_POST['submit']))
{
    $login_id= $_SESSION['login_id'];
    $id=$_POST['cid'];
    $sid= $_GET['sid'];

    $booking_res= mysqli_query($conn,"INSERT INTO tbl_booking VALUES(null,$login_id,$id,'pending')");
    if($booking_res){
        echo "<script>
        alert('Booked successfully');
        window.location.href='../shopping/sub-category.php?sid=$sid';
        </script>";
    }
    else{
        echo "<script>alert('Booking failed');</script>";
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
    <form method="POST" action="#">
    <?php
     if(isset($_GET['cid']))
     {
$cid=$_GET['cid'];
$query=mysqli_query($conn,"select * from tbl_courseadd where cid='$cid'");
while($row=mysqli_fetch_array($query))
{
?>

<div class="wrapper">
    <div class="title">
      BOOK COURSE
    </div>
   
    <div class="form">
    <input type="hidden"name="cid"value="<?= $row['cid'] ?>">
       <div class="inputfield">
          <label>Course Name :</label>
          <?php echo htmlentities($row['cname']);?>
          
       </div>   
       <div class="inputfield">
        <label>Subject Code</label>
        <td><?php echo htmlentities($row['subcode']);?></td>
     </div> 
       <div class="inputfield">
          <label>Start Date</label>
          <td><?php echo htmlentities($row['cstart']);?></td>
       </div>  
      <div class="inputfield">
          <label>End Date</label>
          <td> <?php echo htmlentities($row['cend']);?></td>
       </div> 
      <div class="inputfield">
          <label>Fees</label>
          <td><?php echo htmlentities($row['fees']);?></td>
       </div> 
       <div class="inputfield">
        <label>Description</label>
        <td><?php echo htmlentities($row['description']);?>
     </div> 
      <div class="inputfield">
        <input type="submit" value="Book" name="submit" class="btn">
      </div>
    </div>
    <?php }} ?> 
</div>
</form>
</body>
</html>