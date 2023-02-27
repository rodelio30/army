<?php
include '../../include/connect.php';

$app_id = $_GET['ID'];

$sql = "DELETE FROM appointments WHERE ap_id = $app_id ";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_archive.php");
} else {
  echo "Error updating record: " . $conn->error;
}
