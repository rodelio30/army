<?php
include '../../include/connect.php';

$seminar_id = $_GET['ID'];

$sql = "DELETE FROM seminars WHERE seminar_id = $seminar_id ";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_archive.php");
} else {
  echo "Error updating record: " . $conn->error;
}
