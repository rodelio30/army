<?php
include '../../include/connect.php';
date_default_timezone_set("Asia/Manila");

$school_id = $_GET['ID'];

$date_modified = date("Y-m-d h:i:s");

$sql = "UPDATE schools SET status='archive', date_modified='$date_modified' WHERE school_id=$school_id";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_schools.php");
} else {
  echo "Error updating record: " . $conn->error;
}