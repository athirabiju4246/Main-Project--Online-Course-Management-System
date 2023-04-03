<form method="post" action="process_quiz.php">
  <?php
    // Fetch quiz questions from the database
    $conn = mysqli_connect("localhost", "root", "", "tutor");
    $query = "SELECT * FROM questions ORDER BY RAND() LIMIT 5";
    $result = mysqli_query($conn, $query);
    $count = 1;
    while ($row = mysqli_fetch_assoc($result)) {
  ?>
    <h3><?php echo $count . ". " . $row['question']; ?></h3>
    <input type="radio" name="<?php echo $row['id']; ?>" value="A"> <?php echo $row['option1']; ?><br>
    <input type="radio" name="<?php echo $row['id']; ?>" value="B"> <?php echo $row['option2']; ?><br>
    <input type="radio" name="<?php echo $row['id']; ?>" value="C"> <?php echo $row['option2']; ?><br>
    <input type="radio" name="<?php echo $row['id']; ?>" value="D"> <?php echo $row['option4']; ?><br>
  <?php
    $count++;
    }
  ?>
  <input type="submit" name="submit" value="Submit">
</form>
