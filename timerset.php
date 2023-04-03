<!DOCTYPE html>
<html>
<head>
	<title>Timer Example</title>
</head>
<body>
	<h1>Timer Example</h1>

	<!-- input fields for start and end times -->
	<label for="start-time">Start Time:</label>
	<input type="time" id="start-time" name="start-time">
	<label for="end-time">End Time:</label>
	<input type="time" id="end-time" name="end-time">

	<!-- display for the timer -->
	<p>Time Elapsed: <span id="timer"></span></p>

	<!-- JavaScript code to update the timer display -->
	<script>
		// get the start and end time input fields
		const startTimeInput = document.getElementById("start-time");
		const endTimeInput = document.getElementById("end-time");

		// get the timer display element
		const timerDisplay = document.getElementById("timer");

		// add event listeners to the input fields to update the timer display
		startTimeInput.addEventListener("change", updateTimerDisplay);
		endTimeInput.addEventListener("change", updateTimerDisplay);

		// function to update the timer display based on the start and end times
		function updateTimerDisplay() {
			// get the start and end times as Date objects
			const startTime = new Date(`1970-01-01T${startTimeInput.value}`);
			const endTime = new Date(`1970-01-01T${endTimeInput.value}`);

			// calculate the duration between the start and end times in milliseconds
			const duration = endTime - startTime;

			// format the duration as hours, minutes, and seconds
			const hours = Math.floor(duration / (1000 * 60 * 60));
			const minutes = Math.floor((duration % (1000 * 60 * 60)) / (1000 * 60));
			const seconds = Math.floor((duration % (1000 * 60)) / 1000);

			// update the timer display with the formatted duration
			timerDisplay.textContent = `${hours.toString().padStart(2, "0")}:${minutes.toString().padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;
		}
	</script>
</body>
</html>
