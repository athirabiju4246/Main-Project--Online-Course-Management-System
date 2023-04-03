<!DOCTYPE html>
<html>
<head>
  <title>Online Exam</title>
  <style>
    #timer {
      color: red;
      font-size: 24px;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <h1>Online Exam</h1>
  <div id="timer"></div>
  <form method="post" action="result.php">
    <?php
      $conn = mysqli_connect('localhost', 'root', '', 'tutor');

      $query = "SELECT * FROM questions ORDER BY RAND() LIMIT 10";
      $result = mysqli_query($conn, $query);

      $count = 1;

      while ($row = mysqli_fetch_assoc($result)) {
        echo '<p>' . $count . '. ' . $row['question'] . '</p>';
        echo '<input type="hidden" name="q' . $count . '_id" value="' . $row['id'] . '">';
        echo '<label><input type="radio" name="q' . $count . '_answer" value="a"> ' . $row['option_a'] . '</label><br>';
        echo '<label><input type="radio" name="q' . $count . '_answer" value="b"> ' . $row['option_b'] . '</label><br>';
        echo '<label><input type="radio" name="q' . $count . '_answer" value="c"> ' . $row['option_c'] . '</label><br>';
        echo '<label><input type="radio" name="q' . $count . '_answer" value="d"> ' . $row['option_d'] . '</label><br>';
        echo '<hr>';
        $count++;
      }
    ?>
    <input type="submit" name="submit" value="Submit">
  </form>

  <script>
    // Set the time limit for the exam
    var timeLimit = 60; // in seconds

    // Get the timer element
    var timerEl = document.getElementById("timer");

    // Set the initial time remaining
    var timeRemaining = timeLimit;

    // Update the timer element every second
    setInterval(function() {
      // Decrement the time remaining
      timeRemaining--;

      // Update the timer element
      timerEl.innerHTML = "Time Remaining: " + timeRemaining + "s";

      // If time runs out, submit the form
      if (timeRemaining <= 0) {
        document.forms[0].submit();
      }
    }, 1000);
  </script>
</body>
</html>
