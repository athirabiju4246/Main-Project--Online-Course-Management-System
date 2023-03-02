<html>
  <body>
    <h4 align="center">Schedule<h4>
<table style="width:75%"cellpadding="10" cellspacing="4" border="3" align="center">          
              <tr>
                  <th>No</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Link</th>                 
              </tr>             
              <?php
              include 'db.php';
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
