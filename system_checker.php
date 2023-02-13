<?php

require 'include/connect.php';

if(!empty($_SESSION["id"])){
  $id      = $_SESSION["id"];
  $result  = mysqli_query($conn, "SELECT * FROM army_users WHERE id = $id");
  $row     = mysqli_fetch_assoc($result);
  $user_id = $row["id"];
  $type    = $row["type"];
  
if ($type == 'lvl2') {
    header("location: lvl2/index.php");
}
if ($type == 'lvl3') {
    header("location: lvl3/index.php");
}
if ($type == 'lvl4') {
    header("location: lvl4/index.php");
}
}
else{
  header("Location: sign-in.php");
}

// include('include/connect.php');
// $id = $_SESSION['id'];

// $query = mysqli_query($conn, "select type from users where user_id='$id'") or die("query 1 incorrect.......");
// list($type) = mysqli_fetch_array($query);

// if ($type == 'faculty') {
//     header("location: faculty/index.php");
// }
// if ($type == 'student') {
//     header("location: student/index.php");
// }
// include 'counter/counter.php';