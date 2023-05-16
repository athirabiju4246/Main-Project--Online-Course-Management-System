<?php
include 'db.php';
$id = $_GET['id'];

$query=mysqli_query($conn,"DELETE FROM tbl_schedule WHERE scid='$id'");

if($query) {
  echo "<script>alert('Schedule item deleted successfully!');</script>";
  echo "<script>window.location.href='scheduleview.php';</script>";
} else {
  echo "<script>alert('Error deleting schedule item.');</script>";
  echo "<script>window.location.href='scheduleview.php';</script>";
}
?>
