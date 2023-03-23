<?php 
$reservist_counter  = 0;
$admin_counter      = 0;
$staff_counter      = 0;
$commander_counter  = 0;
$sc_counter         = 0;
$registered_counter = 0;

// This line is Counting for the number of Reservist Register User
if($isSadmin){
  $sql_all = "SELECT reg_id FROM registration_user WHERE user_status = 'inactive' ";
  $result_all = $conn->query($sql_all);
} else if($isAdmin || $isStaff){
  $sql_all = "SELECT reg_id FROM registration_user WHERE user_status = 'inactive' && user_type != 'admin' && user_type != 'sadmin' ";
  $result_all = $conn->query($sql_all);
}
if ($result_all->num_rows > 0) {
  while ($row = $result_all->fetch_assoc()) {
    $registered_counter++;
  }
} 

// This line is Counting for the number of Reservist Register User
$sql = "SELECT reg_id FROM registration_user WHERE user_status = 'inactive' && user_type = 'reservist' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $reservist_counter++;
  }
} else {
  $reservist_counter = 0;
}

// This line is Counting for the number of Admin Register User
$sql_admin = "SELECT reg_id FROM registration_user WHERE user_status = 'inactive' && user_type = 'admin' ";
$result_admin = $conn->query($sql_admin);

if ($result_admin->num_rows > 0) {
  while ($row = $result_admin->fetch_assoc()) {
    $admin_counter++;
  }
} else {
  $admin_counter = 0;
}

// This line is Counting for the number of Admin Staff Register User
$sql_staff = "SELECT reg_id FROM registration_user WHERE user_status = 'inactive' && user_type = 'staff' ";
$result_staff = $conn->query($sql_staff);

if ($result_staff->num_rows > 0) {
  while ($row = $result_staff->fetch_assoc()) {
    $staff_counter++;
  }
} else {
  $staff_counter = 0;
}
// This line is Counting for the number of Commander Register User
$sql_commander = "SELECT reg_id FROM registration_user WHERE user_status = 'inactive' && user_type = 'commander' ";
$result_commander = $conn->query($sql_commander);

if ($result_commander->num_rows > 0) {
  while ($row = $result_commander->fetch_assoc()) {
    $commander_counter++;
  }
} else {
  $commander_counter = 0;
}
// This line is Counting for the number of school Register User
$sql_school = "SELECT reg_id FROM registration_user WHERE status = 'pending' && user_type = 'school_coordinator' ";
$result_school = $conn->query($sql_school);

if ($result_school->num_rows > 0) {
  while ($row = $result_school->fetch_assoc()) {
    $sc_counter++;
  }
} else {
  $sc_counter = 0;
}

?>