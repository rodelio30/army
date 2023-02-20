<?php
include '../../include/connect.php';

$student_id = $_GET['ID'];

$sql = "DELETE FROM students WHERE student_id = $student_id ";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_archive.php");
} else {
  echo "Error updating record: " . $conn->error;
}
