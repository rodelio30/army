<?php
include '../../include/connect.php';

$user_id = $_GET['ID'];

// user id getter
$result       = mysqli_query($conn, "SELECT * FROM reservists WHERE reservist_id='$user_id'");
while ($res   = mysqli_fetch_array($result)) {
  $army_id = $res['army_id'];
}

if($army_id != 0) {
  mysqli_query($conn, "DELETE FROM army_users WHERE army_id = $army_id ")  or die("Query Updated status for army user is incorrect.....");
}

  mysqli_query($conn, "DELETE FROM rids WHERE reservist_id = $user_id")  or die("Query Updated status for army user is incorrect.....");

$sql = "DELETE FROM reservists WHERE reservist_id = $user_id ";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_archive.php");
} else {
  echo "Error updating record: " . $conn->error;
}
