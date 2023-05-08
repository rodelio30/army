<?php
include '../../include/connect.php';

$training_id = $_GET['ID'];

$date_modified = date("Y-m-d");
$time_modified = date("H:i:s");

$sql = "UPDATE trainings SET status='active', date_modified='$date_modified', time_modified='$time_modified' WHERE training_id=$training_id";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_trainings.php");
} else {
  echo "Error updating record: " . $conn->error;
}