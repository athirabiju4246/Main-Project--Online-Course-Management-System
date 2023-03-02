<html>
  <body>
  <section class="">
    <nav>
  <div class="profile-details">
        <img src="images/profile.jpg" alt="">
        <span class="admin_name">athira@gmail.com</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    <h4 align="center">Study Materials<h4>
<table style="width:75%"cellpadding="10" cellspacing="4" border="3" align="center">          
              <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>Study Materials</th>
                  
                  
              </tr>             
              <?php
              include 'db.php';
              $query=mysqli_query($conn,"select * from tbl_studymaterials");             
$cnt=1;
while($row=mysqli_fetch_array($query))
{
 
?>                                  
              <tr>
                  <td><?php echo htmlentities($cnt);?></td>
                  <td><?php echo htmlentities($row['title']);?></td>
                  <td><?php echo htmlentities($row['pdf']);?></td>
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
