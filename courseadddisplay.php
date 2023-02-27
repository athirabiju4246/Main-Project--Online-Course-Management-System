
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="styleA.css">
    <title>COURSE DISPLAY</title>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
      th {
  height: 50px;
  vertical-align: bottom;
}
td {
  height: 50px;
  vertical-align: bottom;
}
.button {
  background: linear-gradient(120deg,#FFEFD5 , #8e44ad);
  border: none;
  color: white;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>

<body>
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
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <img src="images/profile.jpg" alt="">
        <span class="admin_name">Admin</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>
    <h1 align="center">Course List</h1>
    <h1 align="center">Course List</h1>
    <h1 align="center">Course List</h1>
  
    <table style="width:75%"cellpadding="10" cellspacing="4" border="3" align="center">
              
              <tr>
                  <th>Course No</th>
                  <th>Course Name</th>
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
          
              
              <?php
              include 'config.php';
              $query=mysqli_query($conn,"select * from tbl_courseadd");
              
$cnt=1;
while($row=mysqli_fetch_array($query))
{
 $a='shopping/cimages/'.$row["pimage"];
?>                                  
              <tr>
                  <td><?php echo htmlentities($cnt);?></td>
                  <td><?php echo htmlentities($row['cname']);?></td>
                  
                  <td><?php echo htmlentities($row['subcode']);?></td>
                  <td><?php echo htmlentities($row['cstart']);?></td>
                  <td> <?php echo htmlentities($row['cend']);?></td>
                  <td><?php echo htmlentities($row['fees']);?></td>
                  <td><?php echo htmlentities($row['description']);?></td>
                 <!-- <td><?php echo htmlentities($row['pimage']);?></td>-->
                  <td><a href="courseregister.php?cid=<?php echo $row['cid']?>">Add</a></td>
               <td>
               <?php
                    if($row['status']==1){
                        echo '<p><a href="inactivate.php?id='.$row['cid'].'$status=1">Disable</a></p>';
                    }else{
                        echo '<p><a href="activate.php?id='.$row['cid'].'$status=0">Enable</a></p>';
                    }
                    ?>
               <td><a href="course-edit.php?cid=<?php echo $row['cid']?>">Edit</a></td>
              </tr>
              <?php $cnt=$cnt+1; } ?>
              
      </table>

    </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  

</body>
</html>

