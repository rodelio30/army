<?php
$announcements_counter = 0;
$archive_announcements_counter = 0;

// This line is Counting for the number of Registered announcements
$sql = "SELECT ann_id FROM announcements WHERE status != 'archive' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $announcements_counter++;
  }
} else {
  $announcements_counter = 0;
} 
// This line is Counting for the number of Archive announcements 

$sql_archive = "SELECT ann_id FROM announcements WHERE status = 'archive' ";
$result_archive = $conn->query($sql_archive);

if ($result_archive->num_rows > 0) {
while ($row = $result_archive->fetch_assoc()) {
$archive_announcements_counter++;
}
} else {
$archive_announcements_counter = 0;
}
