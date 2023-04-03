<!DOCTYPE html>
<html>
<head>
	<title>Add Quiz Questions</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h2>Add Quiz Questions</h2>
		<form action="addquiz.php" method="post">
			<div class="form-group">
				<label for="question">Question:</label>
				<input type="text" class="form-control" id="question" name="question" required>
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
				<input type="text" class="form-control" id="answer" name="answer" required>
			</div>
			<button type="submit" name="submit" class="btn btn-primary">Add Question</button>
		</form>
	</div>
</body>
</html>
<?php
//connect to the database
include 'config.php';
if(isset($_POST['submit']))
{
	
//get the form data
$question = $_POST['question'];
$option1 = $_POST['option1'];
$option2 = $_POST['option2'];
$option3 = $_POST['option3'];
$option4 = $_POST['option4'];
$answer = $_POST['answer'];

//insert the question into the database
$sql = "INSERT INTO questions (question, option1, option2, option3, option4, answer) VALUES ('$question', '$option1', '$option2', '$option3', '$option4', '$answer')";

if (mysqli_query($conn, $sql)) {
	echo "Question added successfully";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
?>
