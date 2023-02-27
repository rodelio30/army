<?php
include '../../include/connect.php';

$app_id = $_GET['ID'];

$date_modified = date("Y-m-d");
$time_modified = date("h:i:s");

$sql = "UPDATE appointments SET status='pending', date_modified='$date_modified', time_modified='$time_modified' WHERE ap_id=$app_id";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_appointments.php");
} else {
  echo "Error updating record: " . $conn->error;
}