<?php 
$reserve_counter    = 0;
$inactive_reserve_counter    = 0;

// This line is Counting for the number of Registered Rotc Graduate
$sql_rg = "SELECT reservist_id FROM reservists WHERE user_status = 'active'";
$result_rg = $conn->query($sql_rg);

if ($result_rg->num_rows > 0) {
  while ($row = $result_rg->fetch_assoc()) {
    $reserve_counter++;
  }
} else {
  $reserve_counter = 0;
} 
// This line is Counting for the number of Registered Rotc Graduate
$sql_rg_inactive = "SELECT reservist_id FROM reservists WHERE user_status = 'inactive'";
$result_rg_inactive  = $conn->query($sql_rg_inactive);

if ($result_rg_inactive->num_rows > 0) {
  while ($row = $result_rg_inactive->fetch_assoc()) {
    $inactive_reserve_counter++;
  }
} else {
  $inactive_reserve_counter = 0;
} 
?>