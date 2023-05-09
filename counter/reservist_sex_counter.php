<?php 
$male_counter   = 0;
$female_counter = 0;
$total_counter  = 0;

$ready_male_counter   = 0;
$ready_female_counter = 0;
$ready_total_counter  = 0;

$standby_male_counter   = 0;
$standby_female_counter = 0;
$standby_total_counter  = 0;

$retired_male_counter   = 0;
$retired_female_counter = 0;
$retired_total_counter  = 0;

// This line is Counting for the number of Male Reservist User
$sql = "SELECT reservist_id FROM reservists WHERE user_status != 'archive' && sex = 'Male'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $male_counter++;
  }
} else {
  $male_counter = 0;
} 

// This line is Counting for the number of Female Reservist User
$sql_female = "SELECT reservist_id FROM reservists WHERE user_status != 'archive' && sex = 'Female' ";
$result_female = $conn->query($sql_female);

if ($result_female->num_rows > 0) {
  while ($row = $result_female->fetch_assoc()) {
    $female_counter++;
  }
} else {
  $female_counter = 0;
} 

// This line is Counting for the total number of Reservist User
$sql_total = "SELECT reservist_id FROM reservists WHERE user_status != 'archive'";
$result_total = $conn->query($sql_total);

if ($result_total->num_rows > 0) {
  while ($row = $result_total->fetch_assoc()) {
    $total_counter++;
  }
} else {
  $total_counter = 0;
} 

// This line is Counting for the number of Ready Male Reservist User
$ready_sql = "SELECT reservist_id FROM reservists WHERE user_status != 'archive' && status = 'Ready' && sex = 'Male'";
$ready_result = $conn->query($ready_sql);

if ($ready_result->num_rows > 0) {
  while ($row = $ready_result->fetch_assoc()) {
    $ready_male_counter++;
  }
} else {
  $ready_male_counter = 0;
} 

// This line is Counting for the number of Ready Female Reservist User
$ready_sql_female = "SELECT reservist_id FROM reservists WHERE user_status != 'archive' && status = 'Ready' && sex = 'Female' ";
$ready_result_female = $conn->query($ready_sql_female);

if ($ready_result_female->num_rows > 0) {
  while ($row = $ready_result_female->fetch_assoc()) {
    $ready_female_counter++;
  }
} else {
  $ready_female_counter = 0;
} 

// This line is Counting for the total number of Ready Reservist User
$ready_sql_total = "SELECT reservist_id FROM reservists WHERE user_status != 'archive' && status = 'Ready'";
$ready_result_total = $conn->query($ready_sql_total);

if ($ready_result_total->num_rows > 0) {
  while ($row = $ready_result_total->fetch_assoc()) {
    $ready_total_counter++;
  }
} else {
  $ready_total_counter = 0;
} 

// This line is Counting for the number of Standby Male Reservist User
$standby_sql = "SELECT reservist_id FROM reservists WHERE user_status != 'archive' && status = 'Standby' && sex = 'Male'";
$standby_result = $conn->query($standby_sql);

if ($standby_result->num_rows > 0) {
  while ($row = $standby_result->fetch_assoc()) {
    $standby_male_counter++;
  }
} else {
  $standby_male_counter = 0;
} 

// This line is Counting for the number of Standby Female Reservist User
$standby_sql_female = "SELECT reservist_id FROM reservists WHERE user_status != 'archive' && status = 'Standby' && sex = 'Female' ";
$standby_result_female = $conn->query($standby_sql_female);

if ($standby_result_female->num_rows > 0) {
  while ($row = $standby_result_female->fetch_assoc()) {
    $standby_female_counter++;
  }
} else {
  $standby_female_counter = 0;
} 

// This line is Counting for the total number of Standby Reservist User
$standby_sql_total = "SELECT reservist_id FROM reservists WHERE user_status != 'archive' && status = 'Standby'";
$standby_result_total = $conn->query($standby_sql_total);

if ($standby_result_total->num_rows > 0) {
  while ($row = $standby_result_total->fetch_assoc()) {
    $standby_total_counter++;
  }
} else {
  $standby_total_counter = 0;
} 

// This line is Counting for the number of Retired Male Reservist User
$retired_sql = "SELECT reservist_id FROM reservists WHERE user_status != 'archive' && status = 'Retired' && sex = 'Male'";
$retired_result = $conn->query($retired_sql);

if ($retired_result->num_rows > 0) {
  while ($row = $retired_result->fetch_assoc()) {
    $retired_male_counter++;
  }
} else {
  $retired_male_counter = 0;
} 

// This line is Counting for the number of Retired Female Reservist User
$retired_sql_female = "SELECT reservist_id FROM reservists WHERE user_status != 'archive' && status = 'Retired' && sex = 'Female' ";
$retired_result_female = $conn->query($retired_sql_female);

if ($retired_result_female->num_rows > 0) {
  while ($row = $retired_result_female->fetch_assoc()) {
    $retired_female_counter++;
  }
} else {
  $retired_female_counter = 0;
} 

// This line is Counting for the total number of Retired Reservist User
$retired_sql_total = "SELECT reservist_id FROM reservists WHERE user_status != 'archive' && status = 'Retired'";
$retired_result_total = $conn->query($retired_sql_total);

if ($retired_result_total->num_rows > 0) {
  while ($row = $retired_result_total->fetch_assoc()) {
    $retired_total_counter++;
  }
} else {
  $retired_total_counter = 0;
} 
?>