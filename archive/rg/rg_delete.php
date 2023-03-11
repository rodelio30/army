<?php
include '../../include/connect.php';

$rg_id = $_GET['ID'];

$sql = "DELETE FROM reservists WHERE rg_id = $rg_id ";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_archive.php");
} else {
  echo "Error updating record: " . $conn->error;
}
