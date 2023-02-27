<table style="width:75%"cellpadding="10" cellspacing="4" border="3" align="center">
              
              <tr>
                  <th>#</th>
                  <th>Course Name</th>
                  <th>Subject Code</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Fees</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Edit</th>
              </tr>
          
              
              <?php
              include 'config.php';
              $query=mysqli_query($conn,"select * from tbl_courseadd");
              
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>                                  
              <tr>
                  <td><?php echo htmlentities($cnt);?></td>
                  <td><?php echo htmlentities($row['cname']);?></td>
                  <td><?php echo htmlentities($row['subcode']);?></td>
                  <td><?php echo htmlentities($row['cstart']);?></td>
                  <td> <?php echo htmlentities($row['cend']);?></td>
                  <td><?php echo htmlentities($row['fees']);?></td>
                  <td><?php echo htmlentities($row['description']);?></td>
               <td>
               <?php
                    if($row['status']==1){
                        echo '<p><a href="inactivate.php?id='.$row['cid'].'$status=1">Disable</a></p>';
                    }else{
                        echo '<p><a href="activate.php?id='.$row['cid'].'$status=0">Enable</a></p>';
                    }
                    ?>
               <td><a href="courseedit.html?cid=<?php echo $row['cid']?>">Edit</a></td>
              </tr>
              <?php $cnt=$cnt+1; } ?>
              
      </table>
