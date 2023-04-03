<!DOCTYPE html>   
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title>Carrier</title>   
<meta name="description" content="Bootstrap.">  
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>  
<body style="margin:20px auto">  
<div class="container">
<div class="row header" style="text-align:center;color:green">
<h3>Carrier</h3>
</div>

<table id="myTable" class="table table-striped table-bordered table-responsive table-hover" >  
        <thead>  
          <tr>  
            <th>Sr No.</th>  
            <th>Title</th>  
            <th>Description</th>  
            <th>Action</th>
          </tr>  
        </thead>  
        <tbody> 
        <?php
                        include 'config.php';
                        $query=mysqli_query($conn,"select * from tbl_carrier");
                        
          $cnt=1;
          while($row=mysqli_fetch_array($query))
          {
          ?>                         
          <tr>  
          <td><?php echo htmlentities($cnt);?></td>
                            <td><?php echo htmlentities($row['title']);?></td>                           
                            <td><?php echo htmlentities($row['description']);?></td>
                            <td><a href="carrierdelete.php?carid=<?php echo $row['carid']?>">Delete</a></td>
                                               
          </tr>  
          <?php $cnt=$cnt+1; } ?>
        </tbody>  
      </table>  
	  </div>
</body>  
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
</html>  