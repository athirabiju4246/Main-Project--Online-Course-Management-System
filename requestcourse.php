<html><body>
<style>
    body{
      /*  background-image: url('https://wallpapercave.com/wp/wp1898174.jpg');*/
        background-repeat:no-repeat;
        background-size:cover;
    }
</style>
    <?php
    $stid=$_POST['stid'];
    ?>
<?php
$conn=mysqli_connect("localhost", "root", "", "tutor");

if(!$conn)
{
    die("Error: Failed to connect to database!"); 
}
$cid=$_POST['cid'];
$query=mysqli_query($conn,"SELECT * FROM `tbl_courseadd `where cid=$cid");

session_start(); 
$stid=$_SESSION['stid']; 
//echo $item_id;
echo "<table align=center>";
while($row= mysqli_fetch_array($query)){
    echo "<tr><th>C ID</th><td style='border: solid 1px black;'>".$row['cid']."</td></tr>";
    $packageid=$row['cid'];
    echo "<tr><th>SERVICE NAME</th><td style='border: solid 1px black;'>".$row['cname']."</td></tr>";
    echo "<tr><th>PRICE</th><td style='border: solid 1px black;'>"."$".$row['subcode']."</td></tr>";
    $subcode=$row['subcode'];
    echo "<tr><th>FEATURES</th><td style='border: solid 1px black;'>".$row['fees'] ."</td></tr>";
    echo "<tr><th>DETAILS</th><td style='border: solid 1px black;'>".$row['description'] ."</td></tr>";
    
            }           
echo "</table>";

?>

<!DOCTYPE HTML>
<html>
<head>
 <title>BOOKING</title>
</head>
 <body>
<div>
     <form action="reqconn.php" method="post">  
    <input type="hidden" name="stid" value="<?php echo $stid; ?>" readonly>
     <input type="hidden" readonly name="cid" value="<?php echo $cid;?>"><br>
     <input type="hidden" readonly name="subcode" value="<?php echo $subcode;?>"><br>
     <input type="hidden" readonly name="fees" value="<?php echo $fees;?>"><br>
     <input type="hidden" readonly name="description" value="<?php echo $description;?>"><br>
        <!-- CALENDER:<input type="date"name="calender"required><br><br><br>-->
         <input type="submit" value="BOOK">
         <button><a href="viewserviceuser.php">CANCEL</a></button>
         <button><a href="userhome.html">GO TO HOME</a></button>
    </form>
     
</div>     
</body>
</html>