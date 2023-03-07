<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div>
        
           <div id="bannerImage">
               <div class="container">
               <?php $sql=mysqli_query($conn,"select subcatid,class  from tbl_subcategory limit 6");
while($row=mysqli_fetch_array($sql))
{
    ?>

            <li class="dropdown yamm">
                <a href="home.php?subcatid=<?php echo $row['subcatid'];?>"> <?php echo $row['class'];?></a>
            
            </li>
            <?php } ?>     
              
                   </div>
               </div>
           </div>
            <br><br> <br><br><br><br>
           <footer class="footer"> 
               <div class="container">
               <center> 
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>