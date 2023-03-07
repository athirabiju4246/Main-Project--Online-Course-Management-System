<?php
	include 'config.php';
	$targetDir="shopping/cimages/";
if(isset($_POST['submit']))
{
	
	$catid = $_POST['catid']; 
  $cname = $_POST['cname'];
  $subcatid = $_POST['subcatid'];
	$subcode = $_POST['subcode'];
	$cstart = $_POST['cstart'];
  $pimage=$_FILES["pimage"]["name"];
	$cend = $_POST['cend'];
	$fees = $_POST['fees'];	
	$description = $_POST['description'];
  $targetFilePath = $targetDir. $pimage;
  
  move_uploaded_file($_FILES["pimage"]['tmp_name'],$targetFilePath);

	$sql = "INSERT INTO `tbl_courseadd` (`catid`, `subcatid`, `cname`, `subcode`, `cstart`, `cend`, `fees`, `description`, `pimage`, `status`) VALUES ('$catid','$subcatid','$cname','$subcode','$cstart','$cend','$fees', '$description', '$pimage', '1')";
	$result = mysqli_query($conn,$sql);
	if($result){
		echo "New record added";
		header('LOCATION:courseadddisplay.php');
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
    <form method="POST" action="#" enctype="multipart/form-data">
<div class="wrapper">
    <div class="title">
      ADD COURSE
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
                                    <?php
                                    $con=mysqli_connect("localhost","root","","tutor");
                                    
                                    
                                    $sql=mysqli_query($con,"select * from tbl_subcategory WHERE status=1"); 
                                    ?>
                                    <label>Subcategory Name</label><br>
                                    
                                    
                                    <select   name="subcatid" id="sub_category" onchange="showResult(this.value)" class="form-control m-bot15" required >
                                    <option value="">--select--</option>
                                    <?php
                                    while($row=mysqli_fetch_array($sql))
                                    {
                                    
                                    ?>
                                    <option value="<?php echo $row[0] ?>" ><?php echo $row[2] ?></option>
                                    <?php
                                    
                                    }
                                    ?>
                                    
                                    </select></div>
       <div class="inputfield">
          <label>Course Name</label>
          <input type="text" class="input" name="cname" placeholder="Course name" onkeyup="this.value = this.value.toUpperCase();">
           
       </div>
       
       <div class="inputfield">
        <label>Subject Code</label>
        <input type="text" class="input" name="subcode" placeholder="Subject Code" onkeyup="this.value = this.value.toUpperCase(subcode);" >
     </div> 
       <div class="inputfield">
          <label>Start Date</label>
          <input type="date" class="input" name="cstart" placeholder="Start Date"  id="myDate" min="2023-03-02" max="" >
          <script>
            function myFunction() {
              var x = document.getElementById("myDate").max = "2014-01-01";
              document.getElementById("inputfield").innerHTML = "The value of the max attribute was changed from '2000-01-01' to '2014-01-01'.";
            }
            </script>
            
        </div>  
      <div class="inputfield">
          <label>End Date</label>
          <input type="date"  name="cend" class="input" min="2024-12-31">
           <script>
            function myFunction() {
              var x = document.getElementById("myDate").max = "2014-01-01";
              document.getElementById("inputfield").innerHTML = "The value of the max attribute was changed from '2000-01-01' to '2014-01-01'.";
            }
            </script>

       </div> 
      <div class="inputfield">
          <label>Fees</label>
          <input type="text" class="input" id="phone" name="fees" placeholder="Fees" onkeyup="phn_noValidation(this)" maxlength="4">
       </div> 
       <div class="inputfield">
        <label>Description</label>
        <input type="text" class="input" name="description" placeholder="Description">
     </div> 
     <div class="inputfield">           
                                        <label for="image">Course image</label>
                                        <input type="file" class="form-control" accept="image/gif, image/jpeg, image/png, image/jpg"  name="pimage" id="image" required>
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

<script>
  function phn_noValidation(inputTxt){
   
   var regx = /^\d{4}$/;
   var textField = document.getElementById("phone");
       
   if(inputTxt.value != '' ){
       if(inputTxt.value.match(regx)){
           textField.textContent = '';
           textField.style.color = "green";
       }else{
           textField.textContent = 'Your Mobile Number Is Not    Valid.';
           textField.style.color = "red";
       }  
   }else{
       textField.textContent = 'your are not allowed  to leave a field  empty';
       textField.style.color = "red";
   }
}
  </script>