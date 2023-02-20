<?php
$students_counter = 0;
$archive_students_counter = 0;

// This line is Counting for the number of Registered students
$sql = "SELECT student_id FROM students WHERE status != 'archive' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $students_counter++;
  }
} else {
  $students_counter = 0;
} 
// This line is Counting for the number of Archive students 

$sql_archive = "SELECT student_id FROM students WHERE status = 'archive' ";
$result_archive = $conn->query($sql_archive);

if ($result_archive->num_rows > 0) {
while ($row = $result_archive->fetch_assoc()) {
$archive_students_counter++;
}
} else {
$archive_students_counter = 0;
}
