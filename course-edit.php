<?php
session_start();
include ('config.php');

if(isset($_POST['submit']))
{
    $id=$_POST['cid'];
    $cname = $_POST['cname'];
	  $subcode = $_POST['subcode'];
	  $cstart = $_POST['cstart'];
	  $cend = $_POST['cend'];
	  $fees = $_POST['fees'];	
	  $description = $_POST['description']; 
        
$query="UPDATE tbl_courseadd SET cname='$cname',subcode='$subcode',cstart='$cstart',cend='$cend',fees='$fees',description='$description'  where cid='$id'";
$query_run=mysqli_query($conn,$query);
if($query_run)
{
    $_SESSION['status'] = "Category updated successfully";
    header('location:courseadddisplay.php');
}
else
{
    echo "no";
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
      UPDATE COURSE
    </div>
   
    <div class="form">
    <input type="hidden"name="cid"value="<?= $row['cid'] ?>">
       <div class="inputfield">
          <label>Course Name</label>
          <input type="text" class="input" name="cname" placeholder="Name" value="<?= $row['cname'] ?>" onkeyup="this.value = this.value.toUpperCase();"onkeypress="return validateInput(event);"required>
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
        <input type="text" class="input" name="subcode" placeholder="Subject Code" value="<?= $row['subcode'] ?>" required>
     </div> 
       <div class="inputfield">
          <label>Start Date</label>
          <input type="date" class="input" name="cstart" placeholder="Date" value="<?= $row['cstart'] ?>" required>
       </div>  
      <div class="inputfield">
          <label>End Date</label>
          <input type="date" name="cend" class="input" value="<?= $row['cend'] ?>">
       </div> 
      <div class="inputfield">
          <label>Fees</label>
          <input type="text" class="input" name="fees" placeholder="Fees" value="<?= $row['fees'] ?>" required>
       </div> 
       <div class="inputfield">
        <label>Description</label>
        <input type="text" class="input" name="description" placeholder="Description" value="<?= $row['description'] ?>" required>
     </div> 
      <div class="inputfield">
        <input type="submit" value="UPDATE" name="submit" class="btn">
      </div>
    </div>
    <?php }} ?> 
</div>
</form>
</body>
</html>


