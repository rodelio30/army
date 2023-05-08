<?php
include '../../include/connect.php';

$rg_id = $_GET['ID'];

$date_modified = date("Y-m-d");
$time_modified = date("H:i:s");

$sql = "UPDATE reservists SET user_status='active', date_modified='$date_modified', time_modified='$time_modified' WHERE rg_id=$rg_id";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_rg.php");
} else {
  echo "Error updating record: " . $conn->error;
}