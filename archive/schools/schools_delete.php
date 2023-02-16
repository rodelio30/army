<?php
include '../../include/connect.php';
date_default_timezone_set("Asia/Manila");

$school_id = $_GET['ID'];

$sql = "DELETE FROM schools WHERE school_id = $school_id ";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_archive.php");
} else {
  echo "Error updating record: " . $conn->error;
}
