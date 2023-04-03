<html>
    <head>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
         <title>MCQ Quiz</title> 
</head>
<body>
<div class="container">
    <h2>MCQ Quiz</h2>
<form action="mcqadd.php" method="post">
  <label for="question">Question:</label>
  <input type="text" name="question" id="question" required><br>

  <label for="option1">Option 1:</label>
  <input type="text" name="option1" id="option1" required><br>

  <label for="option2">Option 2:</label>
  <input type="text" name="option2" id="option2" required><br>

  <label for="option3">Option 3:</label>
  <input type="text" name="option3" id="option3" required><br>

  <label for="option4">Option 4:</label>
  <input type="text" name="option4" id="option4" required><br>

  <label for="answer">Correct answer:</label>
  <select name="answer" id="answer">
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
    <option value="3">Option 3</option>
    <option value="4">Option 4</option>
  </select><br>
  <input type="submit" value="Add question" name="submit">
</form>
</body>
<?php
if(isset($_POST['submit']))
{
$question = $_POST['question'];
$option1 = $_POST['option1'];
$option2 = $_POST['option2'];
$option3 = $_POST['option3'];
$option4 = $_POST['option4'];
$answer = $_POST['answer'];

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Insert the question into the database
$sql = "INSERT INTO questions (question) VALUES ('$question')";
mysqli_query($conn, $sql);

// Get the ID of the question
$question_id = mysqli_insert_id($conn);

// Insert the options into the database
$sql = "INSERT INTO options (question_id, option_value) VALUES ('$question_id', '$option1')";
mysqli_query($conn, $sql);

$sql = "INSERT INTO options (question_id, option_value) VALUES ('$question_id', '$option2')";
mysqli_query($conn, $sql);

$sql = "INSERT INTO options (question_id, option_value) VALUES ('$question_id', '$option3')";
mysqli_query($conn, $sql);

$sql = "INSERT INTO options (question_id, option_value) VALUES ('$question_id', '$option4')";
mysqli_query($conn, $sql);

// Insert the answer into the database
$sql = "INSERT INTO answers (question_id, answer) VALUES ('$question_id', '$answer')";
mysqli_query($conn, $sql);

// Close the connection
mysqli_close($conn);
}
?>