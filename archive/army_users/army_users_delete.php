<?php
include '../../include/connect.php';

$user_id = $_GET['ID'];

// user id getter
$result       = mysqli_query($conn, "SELECT * FROM army_users WHERE army_id='$user_id'");
while ($res   = mysqli_fetch_array($result)) {
  $user_type = $res['type'];
}

$result_res       = mysqli_query($conn, "SELECT * FROM reservists WHERE army_id='$user_id'");
while ($res   = mysqli_fetch_array($result_res)) {
  $res_id = $res['reservist_id'];
}

if($user_type == "reservist") {
  mysqli_query($conn, "DELETE FROM rids WHERE reservist_id = $res_id ")  or die("Query deleting rids form for army user is incorrect.....");
  mysqli_query($conn, "DELETE FROM reservists WHERE army_id = $user_id ")  or die("Query deleting reservist for army user is incorrect.....");
}

$sql = "DELETE FROM army_users WHERE army_id = $user_id ";
if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_archive.php");
} else {
  echo "Error updating record: " . $conn->error;
}
