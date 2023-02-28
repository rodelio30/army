<?php 
$reserve_counter    = 0;

// This line is Counting for the number of Registered Rotc Graduate
$sql_rg = "SELECT rg_id FROM rotc_graduates WHERE status != 'archive'";
$result_rg = $conn->query($sql_rg);

if ($result_rg->num_rows > 0) {
  while ($row = $result_rg->fetch_assoc()) {
    $reserve_counter++;
  }
} else {
  $reserve_counter = 0;
} 
?>