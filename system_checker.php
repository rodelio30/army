<?php

require 'include/connect.php';

if (!empty($_SESSION["id"])) {
  $id          = $_SESSION["id"];
  $result      = mysqli_query($conn, "SELECT * FROM army_users WHERE id = $id");
  $row         = mysqli_fetch_assoc($result);
  $user_id     = $row["id"];
  $un_public   = $row["username"];
  $type        = $row["type"];
  $status      = $row["status"];
  $user_status = $row["user_status"];

  if ($user_status == 'active') {
    if ($type == 'lvl2') {
      header("location: lvl2/index.php");
    }
    if ($type == 'reservist') {
      header("location: lvl3/index.php");
    }
    if ($type == 'lvl4') {
      header("location: lvl4/index.php");
    }
  } else {
    echo "<script> alert('Sorry, your account is inactive. Please wait for the approval'); </script>";
  }
} else {
  header("Location: sign-in.php");
}

// include 'counter/counter.php';