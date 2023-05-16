
<?php
include 'config.php';

if(isset($_POST['submit']))
{
$catid = $_POST['catid'];
$class = $_POST['class'];
$sql="select * from tbl_subcategory where (catid='$catid' or class='$class');";

$res=mysqli_query($conn,$sql);

if (mysqli_num_rows($res) > 0) {
  
  $row = mysqli_fetch_assoc($res);
  if($class==isset($row['class']) || ($catid==isset($row['catid'])))
  {
      $_SESSION['status'] = "You already have an account.Login to continue";
      echo "Already Registered";
      
  }

}
else{
$sql1 = "INSERT INTO `tbl_Subcategory`(`catid`,`class`, `status`) VALUES ('$catid','$class','1')";
$result = mysqli_query($conn,$sql1);
if($result){
   // echo "New record added";
    //header('LOCATION:');
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
</head>

<body>
<form method="POST" action="#">
<div class="wrapper">
<div class="title">
  ADD CLASS
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
      <label>Class Name:</label>
      <input type="text" class="input" name="class" placeholder="Class Name" onkeyup="this.value = this.value.toUpperCase();" onkeypress="return validateInput(event);" required>
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
    <input type="submit" value="Apply" name="submit" class="btn">
  </div>
</div>
</div>
</form>
<script type="text/javascript" src="date.js"></script>
</body>
</html>