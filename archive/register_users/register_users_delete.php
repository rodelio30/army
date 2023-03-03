<?php
include '../../include/connect.php';

$user_id = $_GET['ID'];

$sql = "DELETE FROM registration_user WHERE reg_id = $user_id ";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_archive.php");
} else {
  echo "Error updating record: " . $conn->error;
}
