<form action="mcqresult.php" method="post">
  <?php
  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "quiz";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Get a random question from the database
$sql = "SELECT * FROM questions ORDER BY RAND() LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$question_id = $row['id'];
$question = $row['question'];

// Get the options for the question from the database
$sql = "SELECT * FROM options WHERE question_id = '$question_id'";
$result = mysqli_query($conn, $sql);
$options = array();
while ($row = mysqli_fetch_assoc($result)) {
$options[] = $row['option_value'];
}
shuffle($options);

// Display the question and options
echo "<p>$question</p>";
foreach ($options as $option) {
echo "<label><input type='radio' name='answer' value='$option'> $option</label><br>";
}

// Store the question ID in a hidden field
echo "<input type='hidden' name='question_id' value='$question_id'>";
?>

  <input type="submit" value="Submit" name="submit">
</form>
<div id="timer"></div>
	<script>
		var count = 600; // 10 minutes in seconds
		var timer = setInterval(function() {
			count--;
			var minutes = Math.floor(count / 60);
			var seconds = count % 60;
			document.getElementById("timer").innerHTML = "Time remaining: " + minutes + "m " + seconds + "s";
			if (count == 0) {
				clearInterval(timer);
				document.forms[0].submit();
			}
		}, 1000);
	</script>
<!--PHP script to check the answer:
php
Copy code-->
<?php
if(isset($_POST['submit']))
{
$question_id = $_POST['question_id'];
$answer = $_POST['answer'];
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Get the correct answer from the database
$sql = "SELECT answer FROM answers WHERE question_id = '$question_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
}
?>

<!-- HTML for displaying the result -->
<p>
<?php
if ($answer == $row['answer']) {
    echo "Correct! ";
} else {
    echo "Incorrect. The correct answer is: " . $row['answer'];
}
?>
</p>
<?php
// Close the connection
mysqli_close($conn);

?>