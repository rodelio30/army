<?php
include '../../include/connect.php';

$student_id = $_GET['ID'];

$date_modified = date("Y-m-d");
$time_modified = date("h:i:s");

$sql = "UPDATE students SET status='active', date_modified='$date_modified', time_modified='$time_modified' WHERE student_id=$student_id";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_students.php");
} else {
  echo "Error updating record: " . $conn->error;
}