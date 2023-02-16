<?php
$schools_counter = 0;
$archive_schools_counter = 0;

// This line is Counting for the number of Registered Schools
$sql = "SELECT school_id FROM schools WHERE status != 'archive' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $schools_counter++;
  }
} else {
  $schools_counter = 0;
} 
// This line is Counting for the number of Archive Schools 

$sql_archive = "SELECT school_id FROM schools WHERE status = 'archive' ";
$result_archive = $conn->query($sql_archive);

if ($result_archive->num_rows > 0) {
while ($row = $result_archive->fetch_assoc()) {
$archive_schools_counter++;
}
} else {
$archive_schools_counter = 0;
}
