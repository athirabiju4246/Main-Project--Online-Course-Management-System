<?php
        include 'db.php';
        session_start();
        $email=$_SESSION['email'];
        $sqlq="SELECT logid from tbl_login where email='$email'";
          $resu = mysqli_query($conn, $sqlq);
          $row = mysqli_fetch_assoc($resu);
          $logid= $row['logid'];
        echo $email;
        $id = $_REQUEST['id'];
        
        if (isset($_POST['submit'])) {
         //$submission=$_POST['submission'];
          $pdf=$_FILES['pdf']['name'];
          $pdf_type=$_FILES['pdf']['type'];
          $pdf_size=$_FILES['pdf']['size'];
          $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
          $pdf_store="pdf/".$pdf;
          move_uploaded_file($pdf_tem_loc,$pdf_store);

          $sql="INSERT INTO tbl_assignmentsubmit(`logid`, `id`, `pdf`,`status`) values('$logid','$id','$pdf','submitted')";
      
          $query=mysqli_query($conn,$sql);
          if($query){
            echo "New record added";
            header('LOCATION:studentindex.php');
          }
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
      <form class="" action="submitassignment.php" method="post" enctype="multipart/form-data">
      <div class="wrapper">
    <div class="title">
      Add Assignment
    </div>  
    <div class="form">
    <div class="inputfield">
                                                          <?php
                                    $con=mysqli_connect("localhost","root","","tutor");
                                    
                                    
                                
                                    $email=$_SESSION['email'];
                                         $sqlq="SELECT logid from tbl_login where email='$email'";
                                         $resu = mysqli_query($conn, $sqlq);
                                         $row = mysqli_fetch_assoc($resu);
                                           $logid= $row['logid'];
                                           
                                   // $logid=$_POST['logid'];
                                    $query=mysqli_query($conn,"SELECT a.title,a.pdf,a.id,c.cname FROM pdf_file a INNER JOIN tbl_courseadd c ON a.cid = c.cid INNER JOIN studentcourse e ON c.cid = e.cid INNER JOIN tbl_login s ON e.logid = s.logid WHERE s.logid =s.logid AND c.cid = c.cid AND a.id = a.id;");
                                    while($row=mysqli_fetch_array($query))
                                    {
                                    ?>

      
                                     <label>Title:</label>
                                     <?php echo htmlentities($row['title']);?>
                                    <input type="hidden" name="id" class="form-control" placeholder="name" value="<?php echo $row['id'];?>">
                                    <?php } ?> 
                                    
                                    </select></div>
    
     
            <div class="inputfield">
        <label for="">Choose Your File</label><br>
        <input id="pdf" type="file" name="pdf" value="" required><br><br>
        </div> 
        <input id="upload" type="submit" name="submit" value="Upload">
       
      </form>

    </div>

  </body>
</html>
