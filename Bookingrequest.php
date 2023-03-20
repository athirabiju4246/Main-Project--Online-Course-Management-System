<html>
    <body>
    <input type="hidden" class="cid" value="<?= $row['cid'] ?>">
                <input type="hidden" class="logid" value="<?= $row['logid'] ?>">
<h1 align="center"> Booking Request</h1>
<table style="width:75%"cellpadding="1" cellspacing="4" border="6" align="center">
              
<tr>
    <th>Course No</th>
    <th>Course Name</th>
    <th>Teacher name</th>
    <th>Decline</th>
    <th>Accept</th>
    <th>Status</th>
    
</tr>
<?php
include 'config.php';
$query=mysqli_query($conn,"SELECT tbl_booking.bid, tbl_login.email, tbl_courseadd.cname, tbl_booking.status FROM tbl_booking INNER JOIN tbl_login ON tbl_booking.logid = tbl_login.logid INNER JOIN tbl_courseadd ON tbl_booking.cid = tbl_courseadd.cid");
//$query=mysqli_query($conn,"SELECT * FROM `tbl_studentregister` t inner join tbl_courseadd c WHERE t.stid in (SELECT stid from tbl_booking WHERE bid = bid ) and c.cid in (SELECT cid from tbl_booking where bid = bid);");
//$query=mysqli_query($conn,"SELECT tbl_booking.bid, tbl_courseadd.cname,tbl_login.email FROM tbl_booking JOIN tbl_courseadd ON tbl_booking.bid = tbl_courseadd.cid JOIN tbl_login ON tbl_courseadd.cid = tbl_login.logid;;");
//$query=mysqli_query($conn,"SELECT * FROM `tbl_studentregister` t inner join tbl_courseadd c WHERE t.stid in (SELECT stid from tbl_booking WHERE bid = bid ) and c.cid in (SELECT cid from tbl_booking where bid = bid);");

$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>                                  
<tr>
    <td><?php echo htmlentities($cnt);?></td>
   
   <td> <?php echo htmlentities($row['cname']);?></td>

    <td><?php echo htmlentities($row['email']);?></td>
    
    <td><a href="declinebooking.php?bid=<?php echo $row['bid']?>">Decline</a>
                   
</td>
<td><a href="acceptbooking.php?bid=<?php echo $row['bid']?>">Accept</a>
                   
</td>
<td><?php echo htmlentities($row['status']);?></td>
               <!-- <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;Accept</button>-->
              <!-- <td> 
               <a href="process_booking.php?bid=<?php echo $row['bid']?>">Accept</a></td> -->
                                
</tr>
<?php $cnt=$cnt+1; } ?>

</table>
</body>
</html>