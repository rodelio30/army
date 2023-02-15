<?php 
$schools_counter = 0;

// This line is Counting for the number of Registered User
$sql = "SELECT school_id FROM schools WHERE status != 'archive' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $schools_counter++;
  }
} else {
  $schools_counter = 0;
} ?>