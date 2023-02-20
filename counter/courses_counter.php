<?php
$courses_counter = 0;
$archive_courses_counter = 0;

// This line is Counting for the number of Registered courses
$sql = "SELECT course_id FROM courses WHERE status != 'archive' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $courses_counter++;
  }
} else {
  $courses_counter = 0;
} 
// This line is Counting for the number of Archive courses 

$sql_archive = "SELECT course_id FROM courses WHERE status = 'archive' ";
$result_archive = $conn->query($sql_archive);

if ($result_archive->num_rows > 0) {
while ($row = $result_archive->fetch_assoc()) {
$archive_courses_counter++;
}
} else {
$archive_courses_counter = 0;
}
