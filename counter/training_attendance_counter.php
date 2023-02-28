<?php
$training_attendance_counter = 0;

// This line is Counting for the number of Registered training_attendance
$sql = "SELECT att_id FROM training_attendance where training_id = '$trainings_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $training_attendance_counter++;
  }
} else {
  $training_attendance_counter = 0;
} 
