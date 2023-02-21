<?php
include '../../include/connect.php';

$seminar_id = $_GET['ID'];

$date_modified = date("Y-m-d");
$time_modified = date("h:i:s");

$sql = "UPDATE seminars SET status='active', date_modified='$date_modified', time_modified='$time_modified' WHERE seminar_id=$seminar_id";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_seminars.php");
} else {
  echo "Error updating record: " . $conn->error;
}