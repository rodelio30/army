<?php
include '../../include/connect.php';

$company_id = $_GET['ID'];

$date_modified = date("Y-m-d");
$time_modified = date("H:i:s");

$sql = "UPDATE company SET status='archive', date_modified='$date_modified', time_modified='$time_modified' WHERE company_id=$company_id";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_company.php");
} else {
  echo "Error updating record: " . $conn->error;
}