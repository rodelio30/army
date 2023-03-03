<?php 
$p_reservist_counter = 0;
$p_admin_counter     = 0;
$p_staff_counter     = 0;
$p_commander_counter = 0;
$p_school_counter    = 0;

// This line is Counting for the number of Registered Reservist User
$sql_reservist = "SELECT reg_id FROM registration_user WHERE user_type='reservist' && status = 'pending' && user_status = 'inactive' ";
$result_reservist = $conn->query($sql_reservist);

if ($result_reservist->num_rows > 0) {
  while ($row = $result_reservist->fetch_assoc()) {
    $p_reservist_counter++;
  }
} else {
  $p_reservist_counter = 0;
} 

// This line is Counting for the number of Registered Admin User
$sql_admin = "SELECT reg_id FROM registration_user WHERE user_type='admin' && status = 'pending' && user_status = 'inactive' ";
$result_admin = $conn->query($sql_admin);

if ($result_admin->num_rows > 0) {
  while ($row = $result_admin->fetch_assoc()) {
    $p_admin_counter++;
  }
} else {
  $p_admin_counter = 0;
} 

// This line is Counting for the number of Registered staff User
$sql_staff = "SELECT reg_id FROM registration_user WHERE user_type='staff' && status = 'pending' && user_status = 'inactive' ";
$result_staff = $conn->query($sql_staff);

if ($result_staff->num_rows > 0) {
  while ($row = $result_staff->fetch_assoc()) {
    $p_staff_counter++;
  }
} else {
  $p_staff_counter = 0;
} 

// This line is Counting for the number of Registered commander User
$sql_commander = "SELECT reg_id FROM registration_user WHERE user_type='commander' && status = 'pending' && user_status = 'inactive' ";
$result_commander = $conn->query($sql_commander);

if ($result_commander->num_rows > 0) {
  while ($row = $result_commander->fetch_assoc()) {
    $p_commander_counter++;
  }
} else {
  $p_commander_counter = 0;
} 

// This line is Counting for the number of Registered school User
$sql_school = "SELECT reg_id FROM registration_user WHERE user_type='school_coordinator' && status = 'pending' && user_status = 'inactive' ";
$result_school = $conn->query($sql_school);

if ($result_school->num_rows > 0) {
  while ($row = $result_school->fetch_assoc()) {
    $p_school_counter++;
  }
} else {
  $p_school_counter = 0;
} 
?>