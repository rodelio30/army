<?php
date_default_timezone_set("Asia/Manila");
session_start();
if (!isset($_SESSION['armylogged'])) {
    header("location: sign-in.php");
    // header("location: pages-sign-in.php");
}
include('include/connect.php');
$id = $_SESSION['id'];

$query = mysqli_query($conn, "select type from users where user_id='$id'") or die("query 1 incorrect.......");
list($type) = mysqli_fetch_array($query);

// if ($type == 'faculty') {
//     header("location: faculty/index.php");
// }
// if ($type == 'student') {
//     header("location: student/index.php");
// }
// include 'counter/counter.php';