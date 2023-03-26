<?php
include 'config.php';

// Retrieve the registered course codes from the database
$sql = "SELECT cid FROM tbl_booking";
$result = $conn->query($sql);

// Display the course codes
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row["cid"] . "<br>";
    }
} else {
    echo "No registered courses found.";
}

// Close the database connection
$conn->close();
?>
