<?php
$aor_counter = 0;
$archive_aor_counter = 0;

// This line is Counting for the number of Registered aor
$sql = "SELECT aor_id FROM aor WHERE status != 'archive' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $aor_counter++;
  }
} else {
  $aor_counter = 0;
} 
// This line is Counting for the number of Archive aor 

$sql_archive = "SELECT aor_id FROM aor WHERE status = 'archive' ";
$result_archive = $conn->query($sql_archive);

if ($result_archive->num_rows > 0) {
while ($row = $result_archive->fetch_assoc()) {
$archive_aor_counter++;
}
} else {
$archive_aor_counter = 0;
}
