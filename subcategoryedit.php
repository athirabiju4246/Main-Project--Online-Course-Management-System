<?php
session_start();
include ('config.php');

if(isset($_POST['sub']))
{
    $id=$_POST['subcatid'];
    $class = $_POST['class'];
        
$query="UPDATE tbl_subcategory SET class='$class' where subcatid='$id'";
$query_run=mysqli_query($conn,$query);
if($query_run)
{
    $_SESSION['status'] = "Category updated successfully";
    header('location:subcategoryview.php');
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
     if(isset($_GET['subcatid']))
     {
$subcatid=$_GET['subcatid'];
$query=mysqli_query($conn,"select * from tbl_subcategory where subcatid='$subcatid'");
while($row=mysqli_fetch_array($query))
{
?>

<div class="wrapper">
    <div class="title">
      UPDATE COURSE
    </div>
   
    <div class="form">
    <input type="hidden"name="subcatid" value="<?= $row['subcatid'] ?>">
       <div class="inputfield">
          <label>Category Name</label>
          <input type="text" class="input" name="class" placeholder="Name" value="<?= $row['class'] ?>" required>
       </div>      
      <div class="inputfield">
        <input type="submit" value="UPDATE" name="sub" class="btn">
      </div>
    </div>
    <?php }} ?> 
</div>
</form>
</body>
</html>


