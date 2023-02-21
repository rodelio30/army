<?php
include '../../include/connect.php';

$training_id = $_GET['ID'];

$sql = "DELETE FROM trainings WHERE training_id = $training_id ";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_archive.php");
} else {
  echo "Error updating record: " . $conn->error;
}
