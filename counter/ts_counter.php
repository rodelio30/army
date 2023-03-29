<?php
$training_attendance_counter = 0;
$seminar_attendance_counter = 0;
$ts_counter = 0;

// This line is Counting for the number of training attendance
$sql = "SELECT att_id FROM training_attendance where army_id = '$army_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $training_attendance_counter++;
  }
} else {
  $training_attendance_counter = 0;
} 

// This line is Counting for the number of seminar attendance
$sql = "SELECT att_id FROM seminar_attendance where army_id = '$army_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $seminar_attendance_counter++;
  }
} else {
  $seminar_attendance_counter = 0;
} 

$ts_counter = $training_attendance_counter + $seminar_attendance_counter;