<?php
include '../../include/connect.php';

$user_id = $_GET['ID'];

$date_modified = date("Y-m-d");
$time_modified = date("h:i:s");

$sql = "UPDATE army_users SET user_status='active', date_modified='$date_modified', time_modified='$time_modified' WHERE id=$user_id";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_users.php");
} else {
  echo "Error updating record: " . $conn->error;
}