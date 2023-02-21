<?php
$trainings_counter = 0;
$archive_trainings_counter = 0;

// This line is Counting for the number of Registered trainings
$sql = "SELECT training_id FROM trainings WHERE status != 'archive' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $trainings_counter++;
  }
} else {
  $trainings_counter = 0;
} 
// This line is Counting for the number of Archive trainings 

$sql_archive = "SELECT training_id FROM trainings WHERE status = 'archive' ";
$result_archive = $conn->query($sql_archive);

if ($result_archive->num_rows > 0) {
while ($row = $result_archive->fetch_assoc()) {
$archive_trainings_counter++;
}
} else {
$archive_trainings_counter = 0;
}
