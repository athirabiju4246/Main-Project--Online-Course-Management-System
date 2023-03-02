<?php
session_start();
include ('db.php');

if(isset($_POST['submit']))
{
    $id=$_POST['smid'];
    $title = $_POST['title'];      
$query="UPDATE tbl_studymaterials SET title='$title' where smid='$id'";
$query_run=mysqli_query($conn,$query);
if($query_run)
{
    $_SESSION['status'] = "Category updated successfully";
    //header('location:courseadddisplay.php');
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
$query=mysqli_query($conn,"select * from tbl_studymaterials where smid='$smid'");
while($row=mysqli_fetch_array($query))
{
?>

<div class="wrapper">
    <div class="title">
      UPDATE COURSE
    </div>
   
    <div class="form">
    <input type="hidden"name="smid"value="<?= $row['smid'] ?>">
       <div class="inputfield">
          <label>Title</label>
          <input type="text" class="input" name="cname" placeholder="Name" value="<?= $row['title'] ?>" required>
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


