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
        <img src="images/profile.jpg" alt="">
        <span class="admin_name">athira@gmail.com</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
      <form class="" action="insert.php" method="post" enctype="multipart/form-data">
      <div class="wrapper">
    <div class="title">
      Add Assignment
    </div>  
    <div class="form">
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
        <?php
        include 'db.php';

        if (isset($_POST['submit'])) {
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

          $sql="INSERT INTO pdf_file(`pdf`, `Title`, `sdate`, `edate`, `stime`, `send`) values('$pdf','$Title', '$sdate', '$edate', '$stime', '$send')";
      
          $query=mysqli_query($conn,$sql);



        }



         ?>

      </form>

    </div>

  </body>
</html>
