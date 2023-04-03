<?php

    
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
            session_start();
$email=$_SESSION['email'];
	$sqlq="SELECT logid from tbl_login where email='$email'";
    $resu = mysqli_query($conn, $sqlq);
    $row = mysqli_fetch_assoc($resu);
	  $logid= $row['logid'];
      echo $email;
 
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
                                    $query=mysqli_query($conn,"SELECT tbl_booking.bid, tbl_login.email, tbl_courseadd.cname,tbl_subcategory.class,tbl_booking.status FROM tbl_booking INNER JOIN tbl_login ON tbl_booking.logid = tbl_login.logid INNER JOIN tbl_courseadd ON tbl_booking.cid = tbl_courseadd.cid INNER JOIN tbl_subcategory ON tbl_subcategory.subcatid = tbl_courseadd.subcatid where tbl_login.logid='$logid'");
                                    while($row=mysqli_fetch_array($query))
                                    {
                                    ?>

      
                                     <label>Course Name :</label>
                                     <?php echo htmlentities($row['cname']);?>
                                    <input type="hidden" name="cid" class="form-control" placeholder="name" value="<?php echo $row['cname'];?>">
                                    <?php }} ?> 
                                    
                                    
                                    </select></div>
                                    
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