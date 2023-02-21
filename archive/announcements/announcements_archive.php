<?php
include '../../include/connect.php';

$ann_id = $_GET['ID'];

$date_modified = date("Y-m-d");
$time_modified = date("h:i:s");

$sql = "UPDATE announcements SET status='archive', date_modified='$date_modified', time_modified='$time_modified' WHERE ann_id=$ann_id";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_announcements.php");
} else {
  echo "Error updating record: " . $conn->error;
}