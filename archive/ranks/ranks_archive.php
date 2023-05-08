<?php
include '../../include/connect.php';

$rank_id = $_GET['ID'];

$date_modified = date("Y-m-d");
$time_modified = date("H:i:s");

$sql = "UPDATE ranks SET status='archive', date_modified='$date_modified', time_modified='$time_modified' WHERE rank_id=$rank_id";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_ranks.php");
} else {
  echo "Error updating record: " . $conn->error;
}