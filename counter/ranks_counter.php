<?php
$ranks_counter = 0;
$archive_ranks_counter = 0;

// This line is Counting for the number of Registered ranks
$sql = "SELECT rank_id FROM ranks WHERE status != 'archive' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $ranks_counter++;
  }
} else {
  $ranks_counter = 0;
} 
// This line is Counting for the number of Archive ranks 

$sql_archive = "SELECT rank_id FROM ranks WHERE status = 'archive' ";
$result_archive = $conn->query($sql_archive);

if ($result_archive->num_rows > 0) {
while ($row = $result_archive->fetch_assoc()) {
$archive_ranks_counter++;
}
} else {
$archive_ranks_counter = 0;
}
