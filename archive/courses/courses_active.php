<?php
include '../../include/connect.php';

$course_id = $_GET['ID'];

$date_modified = date("Y-m-d");
$time_modified = date("h:i:s");

$sql = "UPDATE courses SET status='active', date_modified='$date_modified', time_modified='$time_modified' WHERE course_id=$course_id";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_courses.php");
} else {
  echo "Error updating record: " . $conn->error;
}