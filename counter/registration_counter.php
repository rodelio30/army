<?php 
$reservist_counter   = 0;
$admin_counter       = 0;

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

?>