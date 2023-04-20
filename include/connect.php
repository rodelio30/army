<?php
session_start();
date_default_timezone_set("Asia/Manila");

$conn = mysqli_connect("localhost", "root", "");
if (!$conn) {
  $ConnErr = "Not Connected to the Server";
}
if (!mysqli_select_db($conn, 'army_uat')) {
// if (!mysqli_select_db($conn, 'army')) {
  $SelcErr = "Database Not Selected";
}
?>