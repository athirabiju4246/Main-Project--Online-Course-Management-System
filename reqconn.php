<html><body>
  <style>
    body{
        background-image: url("../images/bg4.jpg");
        background-repeat:no-repeat;
        background-size:cover;
    }
    </style></body></html>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tutor";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    $stid= $_POST['stid'];
    $cid=$_POST['cid'];
    

    $sql = "INSERT INTO tbl_requestcourse (stid, cid) VALUES ('22', '14')";

   
    
    
      
    if ($conn->query($sql) === TRUE) {
      echo "Booking successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    

?>
<button><a href="userhome.html">GO TO HOME</a></button>