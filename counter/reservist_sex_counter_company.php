<?php 
$male_counter   = 0;
$female_counter = 0;
$total_counter  = 0;
$active_total_counter  = 0;
$inactive_total_counter  = 0;

// This line is Counting for the number of Male Reservist User
$sql = "SELECT reservist_id FROM reservists WHERE user_status != 'archive' && company_id = $public_company_id && sex = 'Male'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $male_counter++;
  }
} else {
  $male_counter = 0;
} 

// This line is Counting for the number of Female Reservist User
$sql_female = "SELECT reservist_id FROM reservists WHERE user_status != 'archive' && company_id = $public_company_id && sex = 'Female' ";
$result_female = $conn->query($sql_female);

if ($result_female->num_rows > 0) {
  while ($row = $result_female->fetch_assoc()) {
    $female_counter++;
  }
} else {
  $female_counter = 0;
} 

// This line is Counting for the total number of Reservist User
$sql_total = "SELECT reservist_id FROM reservists WHERE user_status != 'archive' && company_id = $public_company_id";
$result_total = $conn->query($sql_total);

if ($result_total->num_rows > 0) {
  while ($row = $result_total->fetch_assoc()) {
    $total_counter++;
  }
} else {
  $total_counter = 0;
} 

// This line is Counting for the total number of Reservist User
$sql_total_active = "SELECT reservist_id FROM reservists WHERE user_status = 'active' && company_id = $public_company_id";
$result_total_active = $conn->query($sql_total_active);

if ($result_total_active->num_rows > 0) {
  while ($row = $result_total_active->fetch_assoc()) {
    $active_total_counter++;
  }
} else {
  $active_total_counter = 0;
} 

// This line is Counting for the total number of Reservist User
$sql_total_inactive = "SELECT reservist_id FROM reservists WHERE user_status = 'inactive' && company_id = $public_company_id";
$result_total_inactive = $conn->query($sql_total_inactive);

if ($result_total_inactive->num_rows > 0) {
  while ($row = $result_total_inactive->fetch_assoc()) {
    $inactive_total_counter++;
  }
} else {
  $inactive_total_counter = 0;
} 
?>