<?php 
$users_counter = 0;

// This line is Counting for the number of Registered User
$sql = "SELECT id FROM army_users WHERE user_status = 'active' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $users_counter++;
  }
} else {
  $users_counter = 0;
} ?>