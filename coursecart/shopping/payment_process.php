<?php 
include('config.php');
session_start();
$email=$_SESSION['email'];
echo $email;
if(isset($_POST['payment_id']) && isset($_POST['amount'])){
    $pymnt_id=$_POST['payment_id'];
    $amt=$_POST['amount'];
    
    $payment_status="completed";
    
    //mysqli_query($conn,"DELETE FROM `tbl_cart` where username='$nme'");
    mysqli_query($conn,"INSERT INTO `tbl_payment`( `name`,`amount`,`payment_id`,`payment_status`)
     VALUES ('$email','$amt','$pymnt_id', '$payment_status')");
    
}
?>