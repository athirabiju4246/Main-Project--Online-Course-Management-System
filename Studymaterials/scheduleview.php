<?php
session_start();
include 'db.php';
$email=$_SESSION['email'];
                                         $sqlq="SELECT logid from tbl_login where email='$email'";
                                         $resu = mysqli_query($conn, $sqlq);
                                         $row = mysqli_fetch_assoc($resu);
                                           $logid= $row['logid'];
                                           ?>
<html>
  <body>
    <h4 align="center">Schedule<h4>
<table style="width:75%"cellpadding="10" cellspacing="4" border="3" align="center">          
              <tr>
                  <th>No</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Link</th> 
                  <th>Add</th>                 
              </tr>             
              <?php
             
              $query=mysqli_query($conn,"select * from tbl_schedule");             
$cnt=1;
while($row=mysqli_fetch_array($query))
{
 
?>                                  
              <tr>
                  <td><?php echo htmlentities($cnt);?></td>
                  <td><?php echo htmlentities($row['date']);?></td>
                  <td><?php echo htmlentities($row['time']);?></td>
                  <td><?php echo htmlentities($row['link']);?></td>
                  <td><a href="schedule.php?id=<?php echo $row['scid']?>&logid=<?php echo $logid; ?>">View</a></td>
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
