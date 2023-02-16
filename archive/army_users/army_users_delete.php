<?php
include '../../include/connect.php';

$user_id = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM army_users WHERE id = $user_id");
$row    = mysqli_fetch_assoc($result);
$user_type   = $row["type"];

if ($user_type == 'admin') {
$sql = "DELETE FROM army_admin WHERE army_user_id = $user_id ";
$conn->query($sql);
} 
if ($user_type == 'staff') {
$sql = "DELETE FROM army_staff WHERE army_user_id = $user_id ";
$conn->query($sql);
} 
if ($user_type == 'commander') {
$sql = "DELETE FROM army_commander WHERE army_user_id = $user_id ";
$conn->query($sql);
} 
if ($user_type =='reservist') {
$sql = "DELETE FROM reservists WHERE army_user_id = $user_id ";
$conn->query($sql);
}
if ($user_type =='school_coordinator') {
$sql = "DELETE FROM army_sc WHERE army_user_id = $user_id ";
$conn->query($sql);
}
$sql = "DELETE FROM army_users WHERE id = $user_id ";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_archive.php");
} else {
  echo "Error updating record: " . $conn->error;
}
