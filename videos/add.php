<?php
include('conn.php');
session_start();
$email=$_SESSION['email'];

    date_default_timezone_set('Asia/Manila');
    
    if(ISSET($_POST['save'])){      
        $email=$_SESSION['email'];    
        $sqlq="SELECT logid from tbl_login where email='$email'";
        $resu = mysqli_query($conn, $sqlq);
        $row = mysqli_fetch_assoc($resu);
          $logid= $row['logid'];
        $logid = $_GET['logid'];
        $cname = $_POST['cname'];
        $subcatid = $_POST['subcatid'];
        $title = $_POST['title'];
        $file_name = $_FILES['video']['name'];
        $file_temp = $_FILES['video']['tmp_name'];
        $file_size = $_FILES['video']['size'];
 
        if($file_size < 50000000){
            $file = explode('.', $file_name);
            $end = end($file);
            $allowed_ext = array('avi', 'flv', 'wmv', 'mov', 'mp4');
            if(in_array($end, $allowed_ext)){
                $name = date("Ymd").time();
                $location = 'video/'.$name.".".$end;
                if(move_uploaded_file($file_temp, $location)){

                  
                    mysqli_query($conn, "INSERT INTO `video` VALUES('', '$logid', '$cid', '$subcatid', '$title', '$name', '$location')") or die(mysqli_error());
                    echo "<script>alert('Video Uploaded')</script>";
                    echo "<script>window.location = 'add.php'</script>";
                }
            }else{
                echo "<script>alert('Wrong video format')</script>";
                echo "<script>window.location = 'index.php'</script>";
            }
        }else{
            echo "<script>alert('File too large to upload')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
        <link rel="stylesheet" href="../stylescadd.css">
    </head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!--<a href="https://campcodes.com" class="navbar-brand">CampCodes</a>-->
        </div>
    </nav>
    
        <?php
            require 'conn.php';
 
            ?>
    <div class="modal fade" id="form_modal" aria-hidden="true">
        <div class="modal-dialog">
            <form action="save_video.php" method="POST" enctype="multipart/form-data">
            <div class="wrapper">
    <div class="title">
      Upload Videos
    </div>
    <div class="form">
    
                                    
                              
    <div class="inputfield">
                                    <?php 
                                        
                                        $email=$_SESSION['email'];    
                                            $sqlq="SELECT logid from tbl_login where email='$email'";
                                            $resu = mysqli_query($conn, $sqlq);
                                            $row = mysqli_fetch_assoc($resu);
                                              $logid= $row['logid'];
                                            
                                    $con=mysqli_connect("localhost","root","","tutor");
                                    
                                    if(isset($_GET['cid']))
                                     {
                                     $cid=$_GET['cid'];
                                     $query=mysqli_query($conn,"SELECT tbl_booking.bid, tbl_login.email, tbl_courseadd.cname,tbl_subcategory.class,tbl_booking.status FROM tbl_booking INNER JOIN tbl_login ON tbl_booking.logid = tbl_login.logid INNER JOIN tbl_courseadd ON tbl_booking.cid = tbl_courseadd.cid INNER JOIN tbl_subcategory ON tbl_subcategory.subcatid = tbl_courseadd.subcatid where tbl_login.logid='$logid'");
                                     while($row=mysqli_fetch_array($query))
                                     {
                                     ?>

       
                                      <label>Course Name :</label>
                                      <?php echo htmlentities($row['cname']);?>
                                     <input type="hidden" name="cid" class="form-control" placeholder="name" value="<?php echo $row['cname'];?>">
                                     <?php }} ?> 
                                     </div>
                                     <div class="inputfield">
                                    <?php
                                    $con=mysqli_connect("localhost","root","","tutor");
                                    
                                    
                                    $sql=mysqli_query($con,"SELECT tbl_booking.bid,tbl_booking.cid,tbl_login.email FROM tbl_booking INNER JOIN tbl_login ON tbl_booking.logid = tbl_login.logid WHERE tbl_login.role = 'teacher' AND tbl_booking.status='accepted'"); 
                                    ?>
                                    <label> Name</label><br>
                                    
                                    
                                    <select   name="logid" id="sub_category" onchange="showResult(this.value)" class="form-control m-bot15" required >
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
                                    <?php  
                                    $con=mysqli_connect("localhost","root","","tutor");
                                    
                                    if(isset($_GET['cid']))
                                     {
                                     $cid=$_GET['cid'];
                                     $query=mysqli_query($conn,"SELECT tbl_booking.bid, tbl_login.email, tbl_courseadd.cname,tbl_subcategory.class,tbl_booking.status FROM tbl_booking INNER JOIN tbl_login ON tbl_booking.logid = tbl_login.logid INNER JOIN tbl_courseadd ON tbl_booking.cid = tbl_courseadd.cid INNER JOIN tbl_subcategory ON tbl_subcategory.subcatid = tbl_courseadd.subcatid where tbl_login.logid='$logid'");
                                     while($row=mysqli_fetch_array($query))
                                     {
                                     ?>

       
                                      <label>Class Name :</label>
                                      <?php echo htmlentities($row['class']);?>
                                     <input type="hidden" name="subcatid" class="form-control" placeholder="name" value="<?php echo $row['class'];?>">
                                     <?php }} ?> 
                                    </div>
                                    <div class="inputfield">
                                    </div>
                                    <div class="inputfield">
                                   <label>Title</label>
                                  <input type="text" class="input" name="title" placeholder="">
           
                                 </div>                                    
                            <div class="inputfield">
                                <label>Video File</label>
                                <input type="file" name="video" class="form-control-file"/>
                            </div>
                            <div class="inputfield">
                        <button type="button" class="btn" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                        <button name="save" class="btn"><span class="btn"></span> Save</button>
                    </div>
                          
                        </div>
                    </div>

                  <!--  <div class="inputfield">
                        <button type="button" class="btn" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                        <button name="save" class="btn"><span class="btn"></span> Save</button>
                    </div>-->
                </div>
            </form>
        </div>
    </div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>