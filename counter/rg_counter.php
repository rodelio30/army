<?php
$rg_counter = 0;
$archive_rg_counter = 0;

// This line is Counting for the number of Registered rg
$sql = "SELECT rg_id FROM reservists WHERE status != 'archive' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $rg_counter++;
  }
} else {
  $rg_counter = 0;
} 
// This line is Counting for the number of Archive rg 

$sql_archive = "SELECT rg_id FROM reservists WHERE status = 'archive' ";
$result_archive = $conn->query($sql_archive);

if ($result_archive->num_rows > 0) {
while ($row = $result_archive->fetch_assoc()) {
$archive_rg_counter++;
}
} else {
$archive_rg_counter = 0;
}
