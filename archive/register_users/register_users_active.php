<?php
include '../../include/connect.php';

$user_id = $_GET['ID'];

$date = date("Y-m-d");
$time = date("h:i:s");

$sql = "UPDATE registration_user SET status='pending', date='$date', time = '$time' WHERE reg_id=$user_id";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_archive.php");
} else {
  echo "Error updating record: " . $conn->error;
}