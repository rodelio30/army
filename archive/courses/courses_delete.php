<?php
include '../../include/connect.php';

$course_id = $_GET['ID'];

$sql = "DELETE FROM courses WHERE course_id = $course_id ";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_archive.php");
} else {
  echo "Error updating record: " . $conn->error;
}
