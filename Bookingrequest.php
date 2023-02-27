<h1 align="center"> Booking Request</h1>
<table style="width:75%"cellpadding="1" cellspacing="4" border="6" align="center">
              
<tr>
    <th>Course No</th>
    <th>Course Name</th>
    <th>Teacher name</th>
    <th>Status</th>
    
</tr>
<?php
include 'config.php';
$query=mysqli_query($conn,"SELECT * FROM `tbl_studentregister` t inner join tbl_courseadd c WHERE t.stid in (SELECT stid from tbl_booking WHERE bid = bid ) and c.cid in (SELECT cid from tbl_booking where bid = bid);");

$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>                                  
<tr>
    <td><?php echo htmlentities($cnt);?></td>
    <td><?php echo htmlentities($row['cname']);?></td>
    <td><?php echo htmlentities($row['name']);?></td>
    
    <td>
               <?php
                    if($row['status']==1){
                        echo '<p><a href="declinebooking.php?id='.$row['cid'].'$status=1">Decline</a></p>';
                    }
                    else{
                        echo '<p><a href="acceptbooking.php?id='.$row['cid'].'$status=0">Accept</a></p>';
                    }
                    ?>                  
</tr>
<?php $cnt=$cnt+1; } ?>

</table>