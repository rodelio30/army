<?php 
$male_counter     = 0;
$female_counter = 0;

// This line is Counting for the number of Male Reservist User
$sql = "SELECT reservist_id FROM reservists WHERE user_status = 'active' && sex = 'Male'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $male_counter++;
  }
} else {
  $male_counter = 0;
} 
// This line is Counting for the number of Female Reservist User
$sql_female = "SELECT reservist_id FROM reservists WHERE user_status = 'active' && sex = 'Female' ";
$result_female = $conn->query($sql_female);

if ($result_female->num_rows > 0) {
  while ($row = $result_female->fetch_assoc()) {
    $female_counter++;
  }
} else {
  $female_counter = 0;
} 

?>