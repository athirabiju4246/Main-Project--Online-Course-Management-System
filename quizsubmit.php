<?php
include 'config.php';

// Retrieve quiz questions from the database
$sql = "SELECT * FROM questions";
$result = mysqli_query($conn, $sql);

// Display quiz questions and options
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $question_id = $row['id'];
    $question = $row['question'];
    $option1 = $row['option1'];
    $option2 = $row['option2'];
    $option3 = $row['option3'];
    $option4 = $row['option4'];

    echo "<h3>$question</h3>";
    echo "<input type='radio' name='answer_$question_id' value='1'>$option1<br>";
    echo "<input type='radio' name='answer_$question_id' value='2'>$option2<br>";
    echo "<input type='radio' name='answer_$question_id' value='3'>$option3<br>";
    echo "<input type='radio' name='answer_$question_id' value='4'>$option4<br>";
  }
}

mysqli_close($conn);
?>

<input type="text" name="student_name" placeholder="Enter your name" required><br>
<input type="submit" value="Submit Quiz" name="submit">
</form>

<?php
// Process submitted quiz answers and display results
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Connect to the database
  $host = "localhost";
  $username = "root";
  $password = "";
  $dbname = "tutor";
  $conn = mysqli_connect($host, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Retrieve quiz questions from the database
  $sql = "SELECT * FROM questions";
  $result = mysqli_query($conn, $sql);

  $total_score = 0;

  // Process submitted quiz answers
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $question_id = $row['id'];
      $answer = $row['answer'];
      $student_answer = $_POST["answer_$question_id"];

      if ($answer == $student_answer) {
        $total_score++;
      }
    }
  }

  // Insert quiz results into the database
  
}
?>
