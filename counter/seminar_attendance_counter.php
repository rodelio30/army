<?php
$seminar_attendance_counter = 0;

// This line is Counting for the number of Registered seminar_attendance
$sql = "SELECT att_id FROM seminar_attendance where seminar_id = '$seminars_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $seminar_attendance_counter++;
  }
} else {
  $seminar_attendance_counter = 0;
} 
