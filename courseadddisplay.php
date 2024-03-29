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
    <link rel="stylesheet" href="styleA.css">
    
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
<body style="margin:">  
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
          <a href="categoryadd.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">category</span>
          </a>
        </li>
        <li>
          <a href="subcategory.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Subactegory</span>
          </a>
        </li>
        <li>
          <a href="courseregister.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Courses</span>
          </a>
        </li>
        <li>
          <a href="categoryview.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Category View</span>
          </a>
        </li>
        <li>
          <a href="subcategoryview.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Subcategory view</span>
          </a>
        </li>
       <!-- <li>
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
          <a href="logout.php">
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
        <img src="images/profile.jpg" alt="">
        <span class="admin_name">Admin</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
</div>
    </nav>
</div>
    <div class="row header" style="text-align:center;color:black;backgroundcolor:white" >
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
                  <th>Class</th>
                  <th>Subject Code</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Fees</th>
                  <th>Description</th>
                 <!-- <th>Image</th>-->
                  <th>Add</th>
                  <th>Delete</th>
                  <th>Edit</th>
              </tr>
        </thead>  
        <tbody> 
        <?php
                        include 'config.php';
                        $query=mysqli_query($conn,"SELECT tbl_courseadd.cid,tbl_courseadd.cname,tbl_subcategory.class,tbl_courseadd.subcode,tbl_courseadd.cstart,tbl_courseadd.cend,tbl_courseadd.fees,tbl_courseadd.description, tbl_courseadd.status FROM tbl_courseadd INNER JOIN tbl_subcategory ON tbl_subcategory.subcatid = tbl_courseadd.subcatid;");
                    
                        $cnt=1;
                        while($row=mysqli_fetch_array($query))
                        {
                        
                        ?>                                  
                                      <tr>
                                          <td><?php echo htmlentities($cnt);?></td>
                                          <td><?php echo htmlentities($row['cname']);?></td>
                                          <td><?php echo htmlentities($row['class']);?></td>
                                          <td><?php echo htmlentities($row['subcode']);?></td>
                                          <td><?php echo htmlentities($row['cstart']);?></td>
                                          <td> <?php echo htmlentities($row['cend']);?></td>
                                          <td><?php echo htmlentities($row['fees']);?></td>
                                          <td><?php echo htmlentities($row['description']);?></td>
                                        
                                          <td><a href="courseregister.php?cid=<?php echo $row['cid']?>" style="color: darkblue;">Add</a></td>
                                       <td>
                                       <?php
                                            if($row['status']==1){
                                                echo '<p><a href="inactivate.php?id='.$row['cid'].'$status=1"style="color:green;font-size:14px">Disable</a></p>';
                                            }else{
                                                echo '<p><a href="activate.php?id='.$row['cid'].'$status=0"style="color:red;font-size:14px">Active</a></p>';
                                            }
                                            ?>
                                       <td><a href="course-edit.php?cid=<?php echo $row['cid'] ?>"style="color: hotpink;">Edit</a></td>
                                      </tr>
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