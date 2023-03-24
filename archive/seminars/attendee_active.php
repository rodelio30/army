<?php
include '../../include/connect.php';

$att_id = $_GET['ID'];

$sql = "UPDATE seminar_attendance SET status='Pending' WHERE att_id=$att_id";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_seminars.php");
} else {
  echo "Error updating record: " . $conn->error;
}