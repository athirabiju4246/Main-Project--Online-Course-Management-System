<!DOCTYPE html>
<html>
<head>
  <title>View Exams</title>
</head>
<body>
  <h1>View Exams</h1>
  <table>
    <tr>
      <th>Exam Name</th>
      <th>Duration</th>
      <th>Action</th>
    </tr>
    <?php
      include 'config.php';

      $query = "SELECT * FROM exams";
      $result = mysqli_query($conn, $query);

      while ($row = mysqli_fetch_assoc($result)) {
        $exam_name = $row['exam_name'];
        $duration_in_seconds = $row['duration'];
        $duration_in_minutes = floor($duration_in_seconds / 60);
        $duration_in_hours = floor($duration_in_minutes / 60);
        $duration_text = "";
        if ($duration_in_hours > 0) {
          $duration_text .= $duration_in_hours . " hours ";
        }
        if ($duration_in_minutes > 0) {
          $duration_in_minutes %= 60;
          $duration_text .= $duration_in_minutes . " minutes ";
        }
        if ($duration_in_seconds > 0) {
          $duration_in_seconds %= 60;
          $duration_text .= $duration_in_seconds . " seconds ";
        }
        echo '<tr>';
        echo '<td>' . $exam_name . '</td>';
        echo '<td>' . $duration_text . '</td>';
        echo '<td><a href="attend_exam.php?exam_name=' . urlencode($exam_name) . '">Attend Exam</a></td>';
        echo '</tr>';
      }
    ?>
  </table>
</body>
