<?php
include '../../include/connect.php';

$att_id = $_GET['ID'];

$sql = "DELETE FROM seminar_attendance WHERE att_id = $att_id ";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_archive.php");
} else {
  echo "Error updating record: " . $conn->error;
}
