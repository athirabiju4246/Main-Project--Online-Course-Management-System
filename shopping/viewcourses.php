<?php
session_start();
include 'config.php';
$email=$_SESSION['email'];
	$sqlq="SELECT logid from tbl_login where email='$email'";
    $resu = mysqli_query($conn, $sqlq);
    $row = mysqli_fetch_assoc($resu);
	  $logid= $row['logid'];
     // echo $email;
    ?>

<!DOCTYPE html>   
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title>Course List</title>   

<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../styleA.css">
    
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
  h3 {
    color: black;
    font-weight: bold;
  }
</style>
    </head>  
<body style="margin:10px auto">  
 <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">EduWell</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="viewcourses.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">courses</span>
          </a>
        </li>
        <li>
          <a href="../Studymaterials/scheduleview.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">schedules</span>
          </a>
        </li>
        <li>
          <a href="videos/viewvideo.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">video</span>
          </a>
        </li>
      <li>
          <a href="../pdfview.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Assignments</span>
          </a>
        </li>
         <!--  <li>
          <a href="subcategoryview.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Subcategory view</span>
          </a>
        </li>
       <li>
          <a href="#">
            <i class='bx bx-user' ></i>
            <span class="links_name">Team</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Favrorites</span>
          </a>
        </li>-->
        <li>
          <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span>
          </a>
        </li>
        <li class="log_out">
          <a href="../logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
     <!-- <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>-->
      <div class="profile-details">
       
        <span class="admin_name"><?php echo $email?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
</div>
    </nav>
</div>
    <div class="row header" style="text-align:center;color:black" >
    <div>
    <br>
    <br>
    <br><br>
<h3>Courses</h3>
<table id="myTable" class="table table-striped table-bordered table-responsive table-hover" >  
        <thead>  
        <tr>
        <th>Course No</th>
          <th>Course Name</th>
          <th>Class name</th>
          <th>Add Videos</th>
          <th>Add Assignment</th>
          <th>Add Schedules</th>
              </tr>
        </thead>  
        <tbody> 
        <?php
                        
                        $query=mysqli_query($conn,"SELECT tbl_booking.bid, tbl_login.email, tbl_courseadd.cname,tbl_subcategory.class,tbl_booking.status FROM tbl_booking INNER JOIN tbl_login ON tbl_booking.logid = tbl_login.logid INNER JOIN tbl_courseadd ON tbl_booking.cid = tbl_courseadd.cid INNER JOIN tbl_subcategory ON tbl_subcategory.subcatid = tbl_courseadd.subcatid where tbl_login.logid='$logid';");
                        
                        $cnt=1;
                        while($row=mysqli_fetch_array($query))
                        {
                        
                        ?>                                  
                                      <tr>
                                      <td><?php echo htmlentities($cnt);?></td>
    <td> <?php echo htmlentities($row['cname']);?></td>

   <td> <?php echo htmlentities($row['class']);?></td>
   <td><a href="videos/add.php?cid=<?php echo $row['bid']?>&logid=<?php echo $logid; ?>">Add Video</a></td>
   <td><a href="../insert.php?cid=<?php echo $row['bid']?>&logid=<?php echo $logid; ?>">Add Assignments</a></td>
   <td><a href="../Studymaterials/schedule.php?cid=<?php echo $row['bid']?>&logid=<?php echo $logid; ?>">Add Schedules</a></td></tr>
                                      <?php $cnt=$cnt+1; } ?>
        </tbody>  
      </table>  
	  </div>
</body>  
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
</html>  