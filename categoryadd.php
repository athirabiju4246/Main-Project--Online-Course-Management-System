
<?php
	include 'config.php';
	
if(isset($_POST['submit']))
{
	
	
	$catname = $_POST['catname'];
	$sql = "INSERT INTO `tbl_category`(`catname`, `status`) VALUES ('$catname','1')";
	$result = mysqli_query($conn,$sql);
	if($result){
		echo "New record added";
		header('LOCATION:categoryview.php');
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
    <form method="POST" action="#">
<div class="wrapper">
    <div class="title">
      ADD COURSE
    </div>
    <div class="form">
       <div class="inputfield">
          <label>Category Name:</label>
          <input type="text" class="input" name="catname" placeholder="Category Name" onkeypress="return validateInput(event);"required>
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