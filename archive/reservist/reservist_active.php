<?php
include '../../include/connect.php';

$user_id = $_GET['ID'];

$date_modified = date("Y-m-d");
$time_modified = date("H:i:s");

// user id getter
$result       = mysqli_query($conn, "SELECT * FROM reservists WHERE reservist_id='$user_id'");
while ($res   = mysqli_fetch_array($result)) {
  $army_id = $res['army_id'];
}

if($army_id != 0) {
  mysqli_query($conn, "UPDATE army_users SET user_status = 'active', date_modified = '$date_modified', time_modified = '$time_modified' WHERE army_id = $army_id")  or die("Query Updated status for army user is incorrect.....");
}

$sql = "UPDATE reservists SET user_status='active', date_modified='$date_modified', time_modified='$time_modified' WHERE reservist_id=$user_id";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_rg.php");
} else {
  echo "Error updating record: " . $conn->error;
}