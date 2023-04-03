<?php
  // Connect to the database
  $conn = mysqli_connect("localhost", "root", "", "tutor");

  // Retrieve all the questions and answers from the database
  $query = "SELECT * FROM questions";
  $result = mysqli_query($conn, $query);
  $score = 0;

  // Loop through each question and check if the user's answer matches the correct answer
  while ($row = mysqli_fetch_assoc($result)) {
    if ($_POST[$row['id']] == $row['answer']) {
      $score++;
    }
  }

  // Display the user's score
  echo "<p>Your score is: ".$score."/".mysqli_num_rows($result)."</p>";

  // Close the database connection
  mysqli_close($conn);
?>
