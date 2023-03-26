<?php
 
  $conn = mysqli_connect('localhost', 'root', '', 'tutor');

  $question = $_POST['question'];
  $option1 = $_POST['option1'];
  $option2 = $_POST['option2'];
  $option3 = $_POST['option3'];
  $option4 = $_POST['option4'];
  $answer = $_POST['answer'];

  $query = "INSERT INTO questions (question, option1, option2, option3, option4, answer) VALUES ('$question', '$option1', '$option2', '$option3', '$option4', '$answer')";

  mysqli_query($conn, $query);

  mysqli_close($conn);

  header('Location: add_question.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Questions</title>
</head>
<body>
  <h1>Add Questions</h1>
  <form method="post" action="add_question.php">
    <label>Question:</label><br>
    <textarea name="question" required></textarea><br>
    <label>Option 1:</label><br>
    <input type="text" name="option1" required><br>
    <label>Option 2:</label><br>
    <input type="text" name="option2" required><br>
    <label>Option 3:</label><br>
    <input type="text" name="option3" required><br>
    <label>Option 4:</label><br>
    <input type="text" name="option4" required><br>
    <label>Answer:</label><br>
    <input type="text" name="answer" required><br>
    <br>
    <button type="submit">Add Question</button>
  </form>
</body>
</html>
