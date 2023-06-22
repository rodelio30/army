<?php
include '../../include/connect.php';

$docu_id = $_GET['ID'];

$date_modified = date("Y-m-d H:i:s");

$sql = "UPDATE documents SET status='archive', date_modified='$date_modified' WHERE docu_id=$docu_id";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../documents.php");
} else {
  echo "Error updating record: " . $conn->error;
}