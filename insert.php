<?php
        include 'db.php';
        session_start();
        $email=$_SESSION['email'];
        $sqlq="SELECT logid from tbl_login where email='$email'";
          $resu = mysqli_query($conn, $sqlq);
          $row = mysqli_fetch_assoc($resu);
          $logid= $row['logid'];
        echo $email;
        if (isset($_POST['submit'])) {
          $cid = $_REQUEST['cid'];
          $Title = $_POST['Title'];
          $sdate = $_POST['sdate'];
          $edate = $_POST['edate'];
          $stime = $_POST['stime'];
          $send = $_POST['send'];
          $pdf=$_FILES['pdf']['name'];
          $pdf_type=$_FILES['pdf']['type'];
          $pdf_size=$_FILES['pdf']['size'];
          $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
          $pdf_store="pdf/".$pdf;
          move_uploaded_file($pdf_tem_loc,$pdf_store);

          $sql="INSERT INTO pdf_file(`logid`,`cid`, `pdf`, `Title`, `sdate`, `edate`, `stime`, `send`) values('$logid','$cid','$pdf','$Title', '$sdate', '$edate', '$stime', '$send')";
      
          $query=mysqli_query($conn,$sql);
        }
         ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylescadd.css">
    <link rel="stylesheet" href="styleA.css">
    
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
  <section class="">
    <nav>
  <div class="profile-details">
       
      </div>
      <form class="" action="insert.php" method="post" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm();">
      <div class="wrapper">
    <div class="title">
      Add Assignment
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
                                    $query=mysqli_query($conn,"SELECT tbl_booking.bid, tbl_login.email, tbl_courseadd.cname,tbl_courseadd.cid,tbl_subcategory.class,tbl_booking.status FROM tbl_booking INNER JOIN tbl_login ON tbl_booking.logid = tbl_login.logid INNER JOIN tbl_courseadd ON tbl_booking.cid = tbl_courseadd.cid INNER JOIN tbl_subcategory ON tbl_subcategory.subcatid = tbl_courseadd.subcatid where tbl_login.logid='$logid'");
                                    while($row=mysqli_fetch_array($query))
                                    {
                                    ?>

      
                                     <label>Course Name :</label>
                                     <?php echo htmlentities($row['cname']);?>
                                    <input type="hidden" name="cid" class="form-control" placeholder="name" value="<?php echo $row['cid'];?>">
                                    <?php }} ?> 
                                    
                                    </select></div>
    <div class="inputfield">
      <label>Title:</label>
            <input type="text" id="Title" name="Title" placeholder="Title">
            </div> 
            <div class="inputfield"> 
            <label for="mail">Start Date:</label>
            <input type="Date" id="email" name="sdate" placeholder=""><br>
            </div> 
            <div class="inputfield">
            <label for="mail">End Date:</label>
            <input type="Date" id="email" name="edate" placeholder=""><br>
            </div> 
            <div class="inputfield">
            <label for="mail">Start Time:</label>
            <input type="Time" id="email" name="stime" placeholder=""><br>
            </div> 
            <div class="inputfield">
            <label for="mail">End Time</label>
            <input type="Time" id="email" name="send" placeholder=""><br>
            </div> 
            <div class="inputfield">
        <label for="">Choose Your File</label><br>
        <input id="pdf" type="file" name="pdf" value="" required><br><br>
        </div> 
        <input id="upload" type="submit" name="submit" value="Upload">
       <script>
function validateForm() {
  // get form inputs
  var title = document.forms["myForm"]["Title"].value;
  var startDate = document.forms["myForm"]["sdate"].value;
  var endDate = document.forms["myForm"]["edate"].value;
  var startTime = document.forms["myForm"]["stime"].value;
  var endTime = document.forms["myForm"]["send"].value;
  var file = document.forms["myForm"]["pdf"].value;

  // check if all inputs are filled
  if (title == "" || startDate == "" || endDate == "" || startTime == "" || endTime == "" || file == "") {
    alert("Please fill all fields.");
    return false;
  }

  // check if start date is before end date
  if (startDate > endDate) {
    alert("Start date must be before end date.");
    return false;
  }

  // check if start time is before end time when dates are the same
  if (startDate == endDate && startTime > endTime) {
    alert("Start time must be before end time.");
    return false;
  }

  // file type validation
  var allowedExtensions = /(\.pdf)$/i;
  if (!allowedExtensions.exec(file)) {
    alert("Please upload a PDF file.");
    return false;
  }

  // if all validations pass, submit form
  return true;
}
 </script>
      </form>
z
    </div>

  </body>
</html>
