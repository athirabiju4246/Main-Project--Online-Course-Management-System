<!DOCTYPE html>
<html>
<head>
  <title>MCQ Quiz</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <h2>MCQ Quiz</h2>
    <form method="post" action="add_question.php">
      <?php
        // connect to the database
       include 'config.php';

        // get the questions from the database
        $sql = "SELECT * FROM questions";
        $result = mysqli_query($conn, $sql);

        // loop through the questions and display them
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<div class="panel panel-default">';
          echo '<div class="panel-heading">Question ' . $i . '</div>';
          echo '<div class="panel-body">' . $row['question'] . '</div>';
          echo '<ul class="list-group">';
          echo '<li class="list-group-item"><input type="radio" name="answer' . $i . '" value="1"> ' . $row['option1'] . '</li>';
          echo '<li class="list-group-item"><input type="radio" name="answer' . $i . '" value="2"> ' . $row['option2'] . '</li>';
          echo '<li class="list-group-item"><input type="radio" name="answer' . $i . '" value="3"> ' . $row['option3'] . '</li>';
          echo '<li class="list-group-item"><input type="radio" name="answer' . $i . '" value="4"> ' . $row['option4'] . '</li>';
          echo '</ul>';
          echo '</div>';

          // store the correct answer in a hidden input field
          echo '<input type="hidden" name="correct_answer' . $i . '" value="' . $row['answer'] . '">';

          $i++;
        }

        mysqli_close($conn);
      ?>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>
</html>
