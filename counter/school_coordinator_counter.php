<?php 
$students_counter    = 0;
$courses_counter    = 0;

// This line is Counting for the number of Registered student User
$sql_student = "SELECT student_id FROM students WHERE status != 'archive' ";
$result_student = $conn->query($sql_student);

if ($result_student->num_rows > 0) {
  while ($row = $result_student->fetch_assoc()) {
    $students_counter++;
  }
} else {
  $students_counter = 0;
} 

// This line is Counting for the number of Registered courses User
$sql_courses = "SELECT course_id FROM courses WHERE status != 'archive' ";
$result_courses = $conn->query($sql_courses);

if ($result_courses->num_rows > 0) {
  while ($row = $result_courses->fetch_assoc()) {
    $courses_counter++;
  }
} else {
  $courses_counter = 0;
} 
?>