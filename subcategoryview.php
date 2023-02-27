<h1 align="center"> Subcategory List</h1>
<table style="width:75%"cellpadding="10" cellspacing="4" border="3" align="center">
              
<tr>
    <th>Course No</th>
    <th>Category Name</th>
    <th>Class</th>
    
</tr>


<?php
include 'config.php';
$query=mysqli_query($conn,"select tbl_subcategory.class,tbl_category.catname from tbl_subcategory JOIN tbl_category ON tbl_category.catid=tbl_subcategory.catid");

$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>                                  
<tr>
    <td><?php echo htmlentities($cnt);?></td>
    <td><?php echo htmlentities($row['catname']);?></td>
    <td><?php echo htmlentities($row['class']);?></td>
 
</tr>
<?php $cnt=$cnt+1; } ?>

</table>