<?php

require 'include/connect.php';
$isSadmin    = false;
$isAdmin     = false;
$isStaff     = false;
$isCommander = false;
$isSchool    = false;
$isReservist = false;

if (!empty($_SESSION["id"])) {
  $id          = $_SESSION["id"];
  $result      = mysqli_query($conn, "SELECT * FROM army_users WHERE id = $id");
  $row         = mysqli_fetch_assoc($result);
  $user_id     = $row["id"];
  $fn_public   = $row["firstname"];
  $ln_public   = $row["lastname"];
  $un_public   = $row["username"];
  $rank_public = $row["rank"];
  $type        = $row["type"];
  $status      = $row["status"];
  $user_status = $row["user_status"];

  if ($user_status == 'active') {
    if ($type == 'sadmin') {
      $isSadmin = true;
    }
    if ($type == 'admin') {
      $isAdmin = true;
    } 
    if ($type == 'staff') {
      $isStaff = true;
    } if($type == 'school_coordinator') {
      $school_name_public = $row["school_name"];
      $isSchool = true;
    } if($type == 'commander') {
      $isCommander = true;
    } if($type == 'reservist') {
      $isReservist = true;
    }
    // if ($type == 'reservist') {
    //   header("location: lvl3/index.php");
    // }
    // if ($type == 'school_coordinator') {
    //   header("location: lvl4/index.php");
    // }
    // if ($type == 'commander') {
    //   header("location: lvl5/index.php");
    // }
  } else {
    echo "<script> alert('Sorry, your account is inactive. Please wait for the approval'); </script>";
  }
} else {
  header("Location: bulletin.php");
}

// include 'counter/counter.php';