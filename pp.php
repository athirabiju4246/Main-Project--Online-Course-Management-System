<?php
session_start();
include 'config.php';
$email=$_SESSION['email'];
$sqlq="SELECT logid from tbl_login where email='$email'";
$resu = mysqli_query($conn, $sqlq);
$row = mysqli_fetch_assoc($resu);
  $logid= $row['logid'];
echo $logid;
			$cid= $_GET['cid'];
$ret=mysqli_query($conn,"select * from tbl_courseadd where cid=$cid AND logid='$logid'");
$num=mysqli_num_rows($ret);
if($num>0)
{
while ($row=mysqli_fetch_array($ret)) 
{
	$a='cimages/'.$row['pimage'];
	?>							
		<div class="col-sm-6 col-md-4 wow fadeInUp">
			<div class="products">				
	<div class="product">		
		<div class="product-image">
			<div class="image">
			<img src="<?php echo $a ?>" style=" width="50dp", height="50dp"">
				<!--<img  src="<?php echo $a ?>" alt="" width="200" height="200"></a>-->
			</div><!-- /.image -->			                      		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="product-details.php?sid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['cname']);?></a></h3>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					Rs. <?php echo htmlentities($row['fees']);?>			</span>
										     <span class="price-before-discount">Rs. <?php echo htmlentities($row['fees']);?></span>
									
			</div><!-- /.product-price -->
            <?php } }?>