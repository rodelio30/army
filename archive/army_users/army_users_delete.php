<?php
include '../../include/connect.php';

$user_id = $_GET['ID'];

// user id getter
$result       = mysqli_query($conn, "SELECT * FROM army_users WHERE id='$user_id'");
while ($res   = mysqli_fetch_array($result)) {
  $user_type = $res['type'];
}

if($user_type == "reservist") {
  mysqli_query($conn, "DELETE FROM rpi WHERE reservist_id = $user_id ")  or die("Query Updated status for army user is incorrect.....");
  mysqli_query($conn, "DELETE FROM personal_information WHERE reservist_id = $user_id ")  or die("Query Updated status for army user is incorrect.....");
  mysqli_query($conn, "DELETE FROM below_info WHERE reservist_id = $user_id ")  or die("Query Updated status for army user is incorrect.....");
  mysqli_query($conn, "DELETE FROM reservists WHERE army_id = $user_id ")  or die("Query Updated status for army user is incorrect.....");
}

$sql = "DELETE FROM army_users WHERE id = $user_id ";
if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_archive.php");
} else {
  echo "Error updating record: " . $conn->error;
}
