<?php 

if (isset($_POST['update'])) {
  $firstname     = $_POST['firstname'];
  $lastname      = $_POST['lastname'];
  $username      = $_POST['username'];
  $email         = $_POST['email'];
  $user_type     = $_POST['type'];
  $status        = $_POST['status'];
  $user_status   = $_POST['user_status'];

  $date_modified = date("Y-m-d");
  $time_modified = date("h:i:s");

  mysqli_query($conn, "update army_users set firstname = '$firstname', lastname = '$lastname', username = '$username', email = '$email', type = '$user_type', status = '$status', user_status = '$user_status', date_modified = '$date_modified', time_modified = '$time_modified' where id = '$user_id'") or die("Query 4 is incorrect....");

  echo '<script type="text/javascript"> alert("' . $username . ' updated!.")</script>';
  header('Refresh: 0; url=admin_users.php');
  // End of Else in Inactive if
}

  $result_rpi       = mysqli_query($conn, "SELECT * FROM rpi WHERE reservist_id='$user_id'");
  while ($res   = mysqli_fetch_array($result_rpi)) {
    $brsvc                = $res['brsvc'];
    $afpos_mos            = $res['afpos_mos'];
    $soc_enlistment       = $res['soc_enlistment'];
    $initial_rank         = $res['initial_rank'];
    $date_of_comsn_enlist = $res['date_of_comsn_enlist'];
    $authority            = $res['authority'];
    $mobilization_center  = $res['mobilization_center'];
    $designation          = $res['designation'];
    $squad                = $res['squad'];
    $platoon              = $res['platoon'];
    $battalion            = $res['battalion'];
    $size_cs              = $res['size_cs'];
    $size_cap             = $res['size_cap'];
    $size_bda             = $res['size_bda'];
  }
?>