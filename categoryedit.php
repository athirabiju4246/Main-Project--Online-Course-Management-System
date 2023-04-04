<?php
session_start();
include ('config.php');

if(isset($_POST['submit']))
{
    $id=$_POST['catid'];
    $catname = $_POST['catname'];
        
$query="UPDATE tbl_category SET catname='$catname' where catid='$id'";
$query_run=mysqli_query($conn,$query);
if($query_run)
{
    $_SESSION['status'] = "Category updated successfully";
    header('location:categoryview.php');
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
     if(isset($_GET['catid']))
     {
$catid=$_GET['catid'];
$query=mysqli_query($conn,"select * from tbl_category where catid='$catid'");
while($row=mysqli_fetch_array($query))
{
?>

<div class="wrapper">
    <div class="title">
      UPDATE COURSE
    </div>
   
    <div class="form">
    <input type="hidden"name="catid"value="<?= $row['catid'] ?>">
       <div class="inputfield">
          <label>Category Name</label>
          <input type="text" class="input" name="catname" placeholder="Name" value="<?= $row['catname'] ?>" onkeypress="return validateInput(event);" required>
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
        <input type="submit" value="UPDATE" name="submit" class="btn">
      </div>
    </div>
    <?php }} ?> 
</div>
</form>
</body>
</html>


