<?php 
include 'system_checker.php';
// include 'admin_checker.php';

$reservist_id = $_GET['ID'];

$result       = mysqli_query($conn, "SELECT * FROM registration_user WHERE reg_id='$reservist_id' && user_type='reservist'");
while ($res   = mysqli_fetch_array($result)) {
  $reservist_id = $res['reg_id'];
  $firstname    = $res['firstname'];
  $lastname     = $res['lastname'];
  $username     = $res['username'];
  $email        = $res['email'];
  $password     = $res['password'];
  $rank         = $res['rank'];
  $company      = $res['company'];
  $afpsn        = $res['afpsn'];
  $status       = $res['status'];
  $user_status  = $res['user_status'];
  $user_type    = $res['user_type'];
}

if (isset($_POST['update'])) {
  $up_status      = $_POST['status'];
  $up_user_status = 'active';
  $date_modified  = date("Y-m-d");
  $time_modified  = date("h:i:s");
  $school_graduated = 'None';

  if($up_status == 'disapproved'){
  echo '<script type="text/javascript"> alert("User ' . $username . ' is disapproved! It will go to Archive List.")</script>';
    mysqli_query($conn, "update registration_user set status = '$up_status' where reg_id = '$reservist_id'") or die("Query 4 is incorrect....");
    header('Refresh: 0; url=admin_reg_reservist.php');
  }
  else{
    // inserting reservist to army table for log in credentials
    $query_army_user = "INSERT INTO army_users VALUES('','','$firstname','','$lastname','$username','$email','$password','$user_type','','$company','','','','$up_status','$up_user_status','$date_modified','$time_modified','$date_modified','$time_modified')";
    // inserting reservist to reservist table
    $query_reservist  = "INSERT INTO reservists VALUES('','$firstname','','$lastname','','$afpsn','$rank','','','','','','','$school_graduated','$up_user_status','$date_modified','$time_modified','$date_modified','$time_modified')";
     mysqli_query($conn, $query_reservist);

     if (mysqli_query($conn, $query_army_user)) {
        if($user_type == 'reservist'){
          $result_get_id = mysqli_query($conn, "SELECT * FROM army_users WHERE username ='$username' && type='reservist'");
          while ($res   = mysqli_fetch_array($result_get_id)) {
            $reserve_id= $res['id'];
          }
          // Inserting other info for reservist in personal information
            mysqli_query($conn, "insert into personal_information (reservist_id) values('$reserve_id')")  or die("Query Personal Information is incorrect.....");

          // Inserting other info for reservist in reservist personal information
            mysqli_query($conn, "insert into rpi (reservist_id) values('$reserve_id')")  or die("Query RPI is incorrect.....");

          // Inserting other info for reservist in below information
            mysqli_query($conn, "insert into below_info (reservist_id) values('$reserve_id')")  or die("Query Below Info is incorrect.....");
        }

      $query_del_reservist = "DELETE FROM registration_user WHERE reg_id = $reservist_id";
       mysqli_query($conn, $query_del_reservist);
     }

    echo '<script type="text/javascript"> alert("User ' . $username . ' updated!.")</script>';
    header('Refresh: 0; url=admin_reg_reservist.php');
  }
  // End of Else in Inactive if
}

// $time_formatted  = date("g:i a ", strtotime($time_created));
// $time_m_formatted  = date("g:i a ", strtotime($time_modified));
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
    <div class="wrapper">
        <?php
		$nav_active = 'reservist';
		include 'side_navigation.php'
		?>

        <div class="main">
            <?php include 'top_right_navigation.php' ?>

            <main class="content">
                <div class="container-fluid p-0">
                      <h1 class="h3 mb-3"><a href="admin_reg_reservist.php" class="linked-navigation">Reservist List </a> / <a href="admin_reg_reservist_view.php?ID=<?php echo $reservist_id ?>" class="linked-navigation"><?php echo $firstname . ' ' . $lastname ?> </a> / Edit</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                              <div class="card-header">
                                  <h5 class="card-title mb-0">User Reservist</h5>
                              </div>
                              <div class="card-body">
                                <form method="post" autocomplete="off">
                                  <div class="row">
                                    <div class="col-6">
                                      <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-control" id="status" name="status">
                                          <option value="disapproved" selected>Disapproved</option>
                                          <option value="ready">Ready</option>
                                          <option value="standby">Standby</option>
                                          <option value="retired">Retired</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mt-2">
                                      <button type="submit" name="update" class="btn btn-md btn-outline-success">Update</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <?php include 'system_controller/footer.php' ?>
        </div>
    </div>

    <script src="js/app.js"></script>

</body>

</html>