<!DOCTYPE html>
<html>
<head>
  <title>Add MCQ Question</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <h2>Add MCQ Question</h2>
    <form method="post" action="">
      <div class="form-group">
        <label for="question">Question:</label>
        <textarea class="form-control" id="question" name="question" required></textarea>
      </div>
      <div class="form-group">
        <label for="option1">Option 1:</label>
        <input type="text" class="form-control" id="option1" name="option1" required>
      </div>
      <div class="form-group">
        <label for="option2">Option 2:</label>
        <input type="text" class="form-control" id="option2" name="option2" required>
      </div>
      <div class="form-group">
        <label for="option3">Option 3:</label>
        <input type="text" class="form-control" id="option3" name="option3" required>
      </div>
      <div class="form-group">
        <label for="option4">Option 4:</label>
        <input type="text" class="form-control" id="option4" name="option4" required>
      </div>
      <div class="form-group">
        <label for="answer">Answer:</label>
        <select class="form-control" id="answer" name="answer" required>
          <option value="1">Option 1</option>
          <option value="2">Option 2</option>
          <option value="3">Option 3</option>
          <option value="4">Option 4</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Add Question</button>
    </form>
  </div>
</body>
</html>
<?php
// connect to the database
include 'config.php';

// check for errors

if(isset($_POST['submit']))
{
// get the form data
$question = mysqli_real_escape_string($conn, $_POST['question']);
$option1 = mysqli_real_escape_string($conn, $_POST['option1']);
$option2 = mysqli_real_escape_string($conn, $_POST['option2']);
$option3 = mysqli_real_escape_string($conn, $_POST['option3']);
$option4 = mysqli_real_escape_string($conn, $_POST['option4']);
$answer = mysqli_real_escape_string($conn, $_POST['answer']);

// insert the data into the questions table
$sql = "INSERT INTO questions (question, option1, option2, option3, option4, answer) VALUES ('$question', '$option1', '$option2', '$option3', '$option4', '$answer')";

if (mysqli_query($conn, $sql)) {
// redirect to the form with a success message
//header("Location: indexs.php?success=1");
} else {
// redirect to the form with an error message
//header("Location: indexs.php?error=1");
}

mysqli_close($conn);
}
?>