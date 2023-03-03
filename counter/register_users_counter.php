<?php 
$register_users_counter     = 0;
$reservist_counter = 0;
$admin_counter     = 0;
$staff_counter     = 0;
$commander_counter = 0;
$school_counter    = 0;

// This line is Counting for the number of Registered User
$sql = "SELECT reg_id FROM registration_user WHERE status = 'disapproved' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $register_users_counter++;
  }
} else {
  $register_users_counter = 0;
} 


// This line is Counting for the number of Registered Reservist User
$sql_reservist = "SELECT id FROM army_users WHERE type='reservist' && user_status = 'active' ";
$result_reservist = $conn->query($sql_reservist);

if ($result_reservist->num_rows > 0) {
  while ($row = $result_reservist->fetch_assoc()) {
    $reservist_counter++;
  }
} else {
  $reservist_counter = 0;
} 

// This line is Counting for the number of Registered Admin User
$sql_admin = "SELECT id FROM army_users WHERE type='admin' && user_status = 'active' ";
$result_admin = $conn->query($sql_admin);

if ($result_admin->num_rows > 0) {
  while ($row = $result_admin->fetch_assoc()) {
    $admin_counter++;
  }
} else {
  $admin_counter = 0;
} 

// This line is Counting for the number of Registered staff User
$sql_staff = "SELECT id FROM army_users WHERE type='staff' && user_status = 'active' ";
$result_staff = $conn->query($sql_staff);

if ($result_staff->num_rows > 0) {
  while ($row = $result_staff->fetch_assoc()) {
    $staff_counter++;
  }
} else {
  $staff_counter = 0;
} 

// This line is Counting for the number of Registered commander User
$sql_commander = "SELECT id FROM army_users WHERE type='commander' && user_status = 'active' ";
$result_commander = $conn->query($sql_commander);

if ($result_commander->num_rows > 0) {
  while ($row = $result_commander->fetch_assoc()) {
    $commander_counter++;
  }
} else {
  $commander_counter = 0;
} 

// This line is Counting for the number of Registered school User
$sql_school = "SELECT id FROM army_users WHERE type='school_coordinator' && user_status = 'active' ";
$result_school = $conn->query($sql_school);

if ($result_school->num_rows > 0) {
  while ($row = $result_school->fetch_assoc()) {
    $school_counter++;
  }
} else {
  $school_counter = 0;
} 
?>