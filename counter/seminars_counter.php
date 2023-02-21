<?php
$seminars_counter = 0;
$archive_seminars_counter = 0;

// This line is Counting for the number of Registered seminars
$sql = "SELECT seminar_id FROM seminars WHERE status != 'archive' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $seminars_counter++;
  }
} else {
  $seminars_counter = 0;
} 
// This line is Counting for the number of Archive seminars 

$sql_archive = "SELECT seminar_id FROM seminars WHERE status = 'archive' ";
$result_archive = $conn->query($sql_archive);

if ($result_archive->num_rows > 0) {
while ($row = $result_archive->fetch_assoc()) {
$archive_seminars_counter++;
}
} else {
$archive_seminars_counter = 0;
}
