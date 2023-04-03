<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylescadd.css">
  </head>
  <body>
  <section class="">
    <nav>
  <div class="profile-details">
        <img src="images/profile.jpg" alt="">
        <span class="admin_name"></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
      <form class="" action="studymaterials.php" method="post" enctype="multipart/form-data">
      <div class="wrapper">
    <div class="title">
      Add Study Materials
    </div>  
    <div class="form">
      
    <div class="inputfield">
      <label>Title:</label>
            <input type="text" id="title" name="title" placeholder="Title">
            </div>      
            <div class="inputfield">
        <label for="">Choose Your File</label><br>
        <input id="pdf" type="file" name="pdf" value="" required><br><br>
        </div> 
        <input id="upload" type="submit" name="submit" value="Upload">
        <?php
        include 'db.php';

        if (isset($_POST['submit'])) {
            $cid = $_POST['cid'];
            $logid = $_POST['logid'];
            $title = $_POST['title'];
          $pdf=$_FILES['pdf']['name'];
          $pdf_type=$_FILES['pdf']['type'];
          $pdf_size=$_FILES['pdf']['size'];
          $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
          $pdf_store="pdf/".$pdf;
          move_uploaded_file($pdf_tem_loc,$pdf_store);

          $sql="INSERT INTO tbl_studymaterials(`cid`, `logid`, `pdf`, `title`) values('$cid', '$logid', '$pdf','$title')";
      
          $query=mysqli_query($conn,$sql);



        }



         ?>

      </form>

    </div>

  </body>
</html>
