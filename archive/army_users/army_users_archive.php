<?php
include '../../include/connect.php';

$user_id = $_GET['ID'];

$date_modified = date("Y-m-d");
$time_modified = date("h:i:s");

// user type getter
$result       = mysqli_query($conn, "SELECT * FROM army_users WHERE id='$user_id'");
while ($res   = mysqli_fetch_array($result)) {
  $user_type = $res['type'];
}

if($user_type == 'reservist') {
  mysqli_query($conn, "UPDATE reservists SET user_status = 'archive', date_modified = '$date_modified', time_modified = '$time_modified' WHERE army_id = $user_id")  or die("Query Updated status for army user is incorrect.....");
}

$sql = "UPDATE army_users SET user_status='archive', date_modified='$date_modified', time_modified='$time_modified' WHERE id=$user_id";
if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_users.php");
} else {
  echo "Error updating record: " . $conn->error;
}