<?php
include "config.php";
?>

<?php
$id=$_REQUEST['id'];
mysqli_query($conn,"insert into tbl_requestcourse ( `reqid`, `id`, `stid`, `status`) select `cname`, `subcode`, `cstart`, `cend`, `fees`, `description`,  `status` from tbl_courseadd where id='$cid'");
    
    echo "<script language='javascript'>";
  //  echo 'window.location.href = "viewbooked.php";';
    echo "alert('Booking succefully')";
    
    echo "</script>";
    

?>