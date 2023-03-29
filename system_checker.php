<?php
require 'include/connect.php';
$isSadmin    = false;
$isAdmin     = false;
$isStaff     = false;
$isCommander = false;
$isSchool    = false;
$isReservist = false;

if (!empty($_SESSION["army_id"])) {
  $army_id     = $_SESSION["army_id"];

  $result      = mysqli_query($conn, "SELECT * FROM army_users WHERE army_id = $army_id");
  $row         = mysqli_fetch_assoc($result);
  $user_id     = $row["army_id"];
  $fn_public   = $row["firstname"];
  $ln_public   = $row["lastname"];
  $un_public   = $row["username"];
  $rank_id_pub = $row["rank_id"];
  $type        = $row["type"];
  $status      = $row["status"];
  $user_status = $row["user_status"];

  if($rank_id_pub != 0) {
    $result_rank = mysqli_query($conn, "SELECT * FROM ranks WHERE rank_id = $rank_id_pub");
    $row         = mysqli_fetch_assoc($result_rank);
    $rank_public = $row["rank_name"];
  } else{
    $rank_public = '';
  }

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
      // getting the school id of school coordinator
      $public_school_id = $row["school_id"];
      if($public_school_id != 0) {
        $result_school      = mysqli_query($conn, "SELECT * FROM schools WHERE school_id = $public_school_id");
        $row                = mysqli_fetch_assoc($result_school);
        $school_name_public = $row["school_name"];
      } else{
        $school_name_public = '';
      }
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