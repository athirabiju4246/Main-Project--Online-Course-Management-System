<!DOCTYPE html>
<html>
<head>
	<title>Multiple Choice Quiz</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<h1>Multiple Choice Quiz</h1>
	<form method="post" action="quiz_result.php">
		<?php
			// Fetch questions from database
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "tutor";

			$conn = new mysqli($servername, $username, $password, $dbname);

			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 

			$sql = "SELECT * FROM questions";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        echo "<h3>" . $row["question"] . "</h3>";
			        echo "<input type='radio' name='" . $row["id"] . "' value='a'>" . $row["option1"] . "<br>";
			        echo "<input type='radio' name='" . $row["id"] . "' value='b'>" . $row["option2"] . "<br>";
			        echo "<input type='radio' name='" . $row["id"] . "' value='c'>" . $row["option3"] . "<br>";
			        echo "<input type='radio' name='" . $row["id"] . "' value='d'>" . $row["option4"] . "<br>";
			    }
			} else {
			    echo "0 results";
			}
			$conn->close();
		?>
		<label for="student_name">Enter your name:</label>
		<input type="text" name="student_name" required>
		<br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>
<!--PHP Code (quiz_result.php):-->


<?php
	// Store quiz result in database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "tutor";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM questions";
	$result = $conn->query($sql);

	$total_questions = 0;
	$correct_answers = 0;

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	$total_questions++;

	    	if($_POST[$row["id"]] == $row["answer"]) {
	    		$correct_answers++;
	    	}
	    }
	} else {
	    echo "0 results";
	}

	// Calculate percentage score
	$percentage_score = round(($correct_answers / $total_questions) * 100, 2);

	// Store result in database
	$student_name = $_POST["student_name"];
	$sql = "INSERT INTO results (student_name, score) VALUES ('$student_name', '$percentage_score')";
	if($conn->query($sql) === FALSE) {
echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();

// Display quiz result
echo "<h1>Quiz Result</h1>";
echo "<p>Student Name: " . $student_name . "</p>";
echo "<p>Total Questions: " . $total_questions . "</p>";
echo "<p>Correct Answers: " . $correct_answers . "</p>";
echo "<p>Percentage Score: " . $percentage_score . "%</p>";
?>