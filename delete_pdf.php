<?php
include 'db.php';
$id = $_GET['id'];
$sql = "DELETE FROM pdf_file WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Schedule item deleted successfully!');</script>";
    echo "<script>window.location.href='pdfview.php';</script>";
  } else {
    echo "<script>alert('Error deleting schedule item.');</script>";
    echo "<script>window.location.href='pdfview.php';</script>";
  }
mysqli_close($conn);
?>
