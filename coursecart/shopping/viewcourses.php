<?php
session_start();
include 'config.php';
$email=$_SESSION['email'];
	$sqlq="SELECT logid from tbl_login where email='$email'";
    $resu = mysqli_query($conn, $sqlq);
    $row = mysqli_fetch_assoc($resu);
	  $logid= $row['logid'];
      echo $email;
    ?>
      <html>
        <body>
      <h1 align="center"> Courses</h1>
      <table style="width:65%"cellpadding="1" cellspacing="4" border="6" align="center">
                    
      <tr>
          <th>Course No</th>
          <th>Course Name</th>
          <th>Class name</th>
         
      </tr>
      <?php
     
$ret=mysqli_query($conn,"SELECT studentcourse.scid, tbl_login.email, tbl_courseadd.cname,tbl_subcategory.class FROM studentcourse INNER JOIN tbl_login ON studentcourse.logid = tbl_login.logid INNER JOIN tbl_courseadd ON studentcourse.cid = tbl_courseadd.cid INNER JOIN tbl_subcategory ON tbl_subcategory.subcatid = tbl_courseadd.subcatid where tbl_login.logid='$logid';");

$num=mysqli_num_rows($ret);
if($num>0)
{
    $cnt=1;
while ($row=mysqli_fetch_array($ret)) 
{
	//$a='cimages/'.$row['pimage'];
	?>							
		<tr>
    <td><?php echo htmlentities($cnt);?></td>
    <td> <?php echo htmlentities($row['cname']);?></td>

   <td> <?php echo htmlentities($row['class']);?></td>
   <!--<td><a href="videos/add.php?cid=<?php echo $row['bid']?>&logid=<?php echo $logid; ?>">Add Video</a></td>-->
   
            <?php } }?>
