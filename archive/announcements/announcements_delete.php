<?php
include '../../include/connect.php';

$ann_id = $_GET['ID'];

$sql = "DELETE FROM announcements WHERE ann_id = $ann_id ";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_archive.php");
} else {
  echo "Error updating record: " . $conn->error;
}
