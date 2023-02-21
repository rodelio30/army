<?php
$appointments_counter = 0;
$archive_appointments_counter = 0;

// This line is Counting for the number of Registered appointments
$sql = "SELECT ap_id FROM appointments WHERE status != 'archive' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $appointments_counter++;
  }
} else {
  $appointments_counter = 0;
} 
// This line is Counting for the number of Archive appointments 

$sql_archive = "SELECT ap_id FROM appointments WHERE status = 'archive' ";
$result_archive = $conn->query($sql_archive);

if ($result_archive->num_rows > 0) {
while ($row = $result_archive->fetch_assoc()) {
$archive_appointments_counter++;
}
} else {
$archive_appointments_counter = 0;
}
