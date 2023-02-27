<h1 align="center">Category List</h1>
<table style="width:75%"cellpadding="10" cellspacing="4" border="3" align="center">
              
<tr>
    <th>Course No</th>
    <th>Category Name</th>
    <th>Delete</th>
    <th>Edit</th>
</tr>


<?php
include 'config.php';
$query=mysqli_query($conn,"select * from tbl_category");

$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>                                  
<tr>
    <td><?php echo htmlentities($cnt);?></td>
    <td><?php echo htmlentities($row['catname']);?></td>
    <td>
               <?php
                    if($row['status']==1){
                        echo '<p><a href="categoryinactive.php?id='.$row['catid'].'$status=1">Disable</a></p>';
                    }else{
                        echo '<p><a href="categoryactive.php?id='.$row['catid'].'$status=0">Enable</a></p>';
                    }
                    ?>

    <td><a href="categoryedit.php?catid=<?php echo $row['catid']?>">Edit</a></td>
</tr>
<?php $cnt=$cnt+1; } ?>

</table>