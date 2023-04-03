<?php
session_start();
error_reporting(0);
include('config.php');
$sid=$_GET['scid'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>Product Category</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<!-- Demo Purpose Only. Should be removed in production : END -->

		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">

		<!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

	</head>
    <body class="cnt-home">
	
<header class="header-style-1">

	<!-- ================ TOP MENU ====================== -->
<?php include('includes/top-header.php');?>
<!--================ TOP MENU : END ======================= -->
<?php include('includes/main-header.php');?>
	<!-- ==================== NAVBAR==================== -->
<?php include('includes/menu-bar.php');?>
<!-- ================= NAVBAR : END ===================== -->

</header>
<!-- ==================== HEADER : END====================== -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row outer-bottom-sm'>
			<div class='col-md-3 sidebar'>
	            <!-- ======== TOP NAVIGATION =============== -->

<!--============== TOP NAVIGATION : END ================ -->	            <div class="sidebar-module-container">
	            	<h3 class="section-title">shop by</h3>
	            	<div class="sidebar-filter">
		            	<!-- =================== SIDEBAR CATEGORY ======================== -->
						<li><a href="../../logout.php">logout</a></li>
						<div class="sidebar-widget wow fadeInUp outer-bottom-xs ">
	<div class="widget-header m-t-20">
		<h4 class="widget-title">Category</h4>
	</div>
	<div class="sidebar-widget-body m-t-10">
	         <?php $sql=mysqli_query($conn,"select catid,catname from tbl_category");
while($row=mysqli_fetch_array($sql))
{
    ?>
		<div class="accordion">
	    	<div class="accordion-group">
	            <div class="accordion-heading">
	                <a href="category.php?sid=<?php echo $row['id'];?>" class="accordion-toggle collapsed">
	                   <?php echo $row['catname'];?>
	                </a>
	            </div>  
	        </div>
	    </div>
	    <?php } ?>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->

<!-- ============================================== COLOR: END ============================================== -->

	            	</div><!-- /.sidebar-filter -->
	            </div><!-- /.sidebar-module-container -->
            </div><!-- /.sidebar -->
			<div class='col-md-9'>
					<!-- ========================================== SECTION – HERO ========================================= -->

	<div id="category" class="category-carousel hidden-xs">
		<div class="item">	
			<div class="image">
				<img src="assets/images/banners/cat-banner-2.jpg" alt="" class="img-responsive">
			</div>
			<div class="container-fluid">
				<div class="caption vertical-top text-left">
					<div class="big-text">
						<br />
					</div>

					       <?php $sql=mysqli_query($conn,"select class from tbl_subcategory where catid='$sid'");
while($row=mysqli_fetch_array($sql))
{
    ?>

					<div class="excerpt hidden-sm hidden-md">
						<?php echo htmlentities($row['class']);?>
					</div>
			<?php } ?>
			
				</div><!-- /.caption -->
			</div><!-- /.container-fluid -->
		</div>
</div>

				<div class="search-result-container">
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane active " id="grid-container">
							<div class="category-product  inner-top-vs">
								<div class="row">									
			<?php
			$sid= $_GET['sid'];
$ret=mysqli_query($conn,"select * from tbl_courseadd where subcatid=$sid");
$num=mysqli_num_rows($ret);
if($num>0)
{
while ($row=mysqli_fetch_array($ret)) 
{
	$a='cimages/'.$row['pimage'];
	?>	
	<form method="POST" action="manage_cart.php">					
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
											 <span class="price-before-discount"><?php echo htmlentities($row['quantity']);?></span><br>
							Enrollment capacity: 150<input class='text-center iquantity' type='number'  name='quantity' value='".$row["quantity"]."' min='1' max='1'>
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
		<div class="cart clearfix animate-effect">
                <div class="action">
                    <ul class="list-unstyled">
                        <li>
                            <input type="text" value="<?php echo $row['cid']?>" name="cid"hidden>
                            <input type="text" value="<?php echo $_GET['subcatid']?>" name="subcatid"hidden>
                            
                        </li>
                        <li class="add-cart-button btn-group">
						<!--<h3 class="name"><a href="action.php?cid=<?php echo htmlentities($row['cid']);?>">Add to cart</a></h3> -->              
						<button class="btn btn-primary icon" data-toggle="dropdown" type="button"><i class="fa fa-shopping-cart"></i></button>
                                    <input class="btn btn-primary" type="submit" name="add_to_cart" value="Add to cart">
                                    <li class="lnk wishlist">
                                    <div class="inputfield">
        <input type="submit" value="Add to Wishlist" name="wishlist" class="btn">
        
      </div>
                        </li>

                                 
                                
                            </form>                     
                        </li>
                       
                        
                        
                    </ul>
                </div>
            </div>
            </div>
            </div>
        </div>
      <?php } } else {?>
    
        <div class="col-sm-6 col-md-4 wow fadeInUp"> <h3>No Product Found</h3>
        </div>
        
<?php } ?>
										</div>
							</div>
						
						</div>
				</div>

			</div>
		</div></div>
		<?php include('includes/brands-slider.php');?>

</div>
</div>
<?php include('includes/footer.php');?>
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>


</body>
</html>