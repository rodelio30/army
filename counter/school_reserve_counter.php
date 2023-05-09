<?php 
$reserve_counter    = 0;
$own_school_counter = 0;
$school_male        = 0;
$school_female      = 0;
$total_counter      = 0;

// This line is Counting for the number of Registered Rotc Graduate
$sql_rg = "SELECT reservist_id FROM reservists WHERE status != 'archive'";
$result_rg = $conn->query($sql_rg);

if ($result_rg->num_rows > 0) {
  while ($row = $result_rg->fetch_assoc()) {
    $reserve_counter++;
  }
} else {
  $reserve_counter = 0;
} 

  $sql_ws = "SELECT reservist_id FROM reservists WHERE status != 'archive' && school_id = '$public_school_id'";
  $result_ws = $conn->query($sql_ws);

  if ($result_ws->num_rows > 0) {
    while ($row = $result_ws->fetch_assoc()) {
      $own_school_counter++;
    }
  } else {
    $own_school_counter = 0;
  } 

  $sql_male = "SELECT reservist_id FROM reservists WHERE sex = 'male' && status != 'archive' && school_id = '$public_school_id'";
  $result_male = $conn->query($sql_male);

  if ($result_male->num_rows > 0) {
    while ($row = $result_male->fetch_assoc()) {
      $school_male++;
    }
  } else {
    $school_male = 0;
  } 

  $sql_fm = "SELECT reservist_id FROM reservists WHERE sex = 'female' && status != 'archive' && school_id = '$public_school_id'";
  $result_fm = $conn->query($sql_fm);

  if ($result_fm->num_rows > 0) {
    while ($row = $result_fm->fetch_assoc()) {
      $school_female++;
    }
  } else {
    $school_female = 0;
  } 

  $sql_total = "SELECT reservist_id FROM reservists WHERE status != 'archive' && school_id = '$public_school_id'";
  $result_total = $conn->query($sql_total);

  if ($result_total->num_rows > 0) {
    while ($row = $result_total->fetch_assoc()) {
      $total_counter++;
    }
  } else {
    $total_counter = 0;
  } 
?>