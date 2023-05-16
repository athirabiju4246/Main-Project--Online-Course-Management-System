<?php 
	include 'db.php';
	session_start(); 
	//Set Question Number
	$number = $_GET['n'];

	//Query for the Question
	$query = "SELECT * FROM questions WHERE question_number = $number";

	// Get the question
	$result = mysqli_query($connection,$query);
	$question = mysqli_fetch_assoc($result); 

	//Get Choices
	$query = "SELECT * FROM options WHERE question_number = $number";
	$choices = mysqli_query($connection,$query);
	// Get Total questions
	$query = "SELECT * FROM questions";
	$total_questions = mysqli_num_rows(mysqli_query($connection,$query));
 	
	
?>
<html>
<head>
	<title>Quizer</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/timer.js"></script>
    <style>
		.timer {
  font-size: 18px;
  font-weight: bold;
  text-align: center;
  margin-bottom: 20px;
}

		</style>
</head>
<body>

	<header>
		<div class="container">
			<p>Quizer</p>
		</div>
	</header>

	<main>
			<div class="container">
				<div class="current">Question <?php echo $number; ?> of <?php echo $total_questions; ?> </div>
				<p class="question"><?php echo $question['question_text']; ?> </p>
				<form method="POST" action="process.php">
					<ul class="choicess">
						<?php while($row=mysqli_fetch_assoc($choices)){ ?>
						<li><input type="radio" name="choice" value="<?php echo $row['id']; ?>"><?php echo $row['coption']; ?></li>
						<?php } ?>
						
						
					</ul>
					<input type="hidden" name="number" value="<?php echo $number; ?>">
					<input type="submit" name="submit" value="Submit">


				</form>
				<script>
				// Set the time limit in seconds
var timeLimit = 120;

// Get the timer element
var timer = document.createElement("div");
timer.className = "timer";
document.body.appendChild(timer);

// Set the initial time
var timeLeft = timeLimit;

// Update the timer every second
var countdown = setInterval(function() {
  // Convert the time left to minutes and seconds
  var minutes = Math.floor(timeLeft / 60);
  var seconds = timeLeft % 60;

  // Add leading zero if necessary
  if (seconds < 10) {
    seconds = "0" + seconds;
  }

  // Update the timer element
  timer.innerHTML = "Time left: " + minutes + ":" + seconds;

  // Decrement the time left
  timeLeft--;

  // End the quiz when time is up
  if (timeLeft < 0) {
    clearInterval(countdown);
    document.forms[0].submit();
  }
}, 1000);

</script>
			</div>

	</main>


	<!-- <footer>
			<div class="container">
				Copyright &copy; IT SERIES TUTOR
			</div>


	</footer> -->








</body>
</html>