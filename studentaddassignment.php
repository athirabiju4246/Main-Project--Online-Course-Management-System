<?php
session_start();
	include 'config.php';
	$email=$_SESSION['email'];
	$sqlq="SELECT logid from tbl_login where email='$email'";
    $resu = mysqli_query($conn, $sqlq);
    $row = mysqli_fetch_assoc($resu);
	  $logid= $row['logid'];
	//echo $logid;
//if(isset($_SESSION['logid'])){
  //  $islogged=$_SESSION['logid'];
    //if($islogged==false){
      //  header('Location: Multilogin.php');
        
    //}
//}
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="styleA.css">
    <title>COURSE TUTORIAL</title>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
     <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</style>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">EduWell</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="Adminpanel.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
       <!-- <li>
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
      
      <div class="profile-details">
        
        <span class="admin_name"><?php echo $email?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>
    <body>
    <input type="hidden" class="cid" value="<?= $row['cid'] ?>">
                <input type="hidden" class="logid" value="<?= $row['logid'] ?>">
                
<h1 align="center"></h1>
<br>
                <br>
                <br>
                <br>
               <u> <h1 align="center">Assignments</h1></u> <br>
<table style="width:95%">
              
<tr>
    <th>Course No</th>
   
    <th>Course Name</th>
    <th>title</th>
    <th>pdf</th>
    <th>View/Download</th>
    <th>Attend</th>
    
</tr>
<?php

          
$query=mysqli_query($conn,"SELECT a.title,a.pdf,a.id,c.cname FROM pdf_file a INNER JOIN tbl_courseadd c ON a.cid = c.cid INNER JOIN studentcourse e ON c.cid = e.cid INNER JOIN tbl_login s ON e.logid = s.logid WHERE s.logid =s.logid AND c.cid = c.cid AND a.id = a.id; ");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>                                  
<tr>
    <td><?php echo htmlentities($cnt);?></td>
   

   
    <td><?php echo htmlentities($row['cname']);?></td>
    <td><?php echo htmlentities($row['title']);?></td>
    <td> <?php echo htmlentities($row['pdf']);?></td>
    
    <td><a href="display_pdf.php?id=<?php echo $row['id']?>">View</a></td>
             
    <td><a href="submitassignment.php?id=<?php echo $row['id']?>&logid=<?php echo $logid; ?>">View</a></td>
                                
</tr>
<?php $cnt=$cnt+1; } ?>

</table>
</body>
</html>