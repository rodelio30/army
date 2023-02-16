<?php

require '../include/connect.php';

if(!empty($_SESSION["id"])){
  $id      = $_SESSION["id"];
  $result  = mysqli_query($conn, "SELECT * FROM army_users WHERE id = $id");
  $row     = mysqli_fetch_assoc($result);
  $user_id = $row["id"];
  $type    = $row["type"];
  
if ($type == 'admin') {
    header("location: ../index.php");
}
if ($type == 'lvl3') {
    header("location: ../lvl3/index.php");
}
if ($type == 'lvl4') {
    header("location: ../lvl4/index.php");
}
}
else{
  header("Location: sign-in.php");
}
// include 'counter/counter.php';