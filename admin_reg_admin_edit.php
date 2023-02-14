
<?php 
require 'include/connect.php';
// include 'admin_checker.php';

$reservist_id = $_GET['ID'];

$result       = mysqli_query($conn, "SELECT * FROM registration_user WHERE reg_id='$reservist_id' && user_type='admin' ");
while ($res   = mysqli_fetch_array($result)) {
  $admin_id     = $res['reg_id'];
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
  $status         = $_POST['status'];
  $user_status    = $_POST['user_status'];
  $date_modified  = date("Y-m-d");
  $time_modified  = date("h:i:s");

  if($status = 'disapproved' && $user_status == 'inactive'){
  echo '<script type="text/javascript"> alert("User ' . $username . ' is disapproved!.")</script>';
      mysqli_query($conn, "update registration_user set status = '$status' where reg_id = '$admin_id'") or die("Query 4 is incorrect....");
  }
  else{

  $query_army_user = "INSERT INTO army_users VALUES('','$firstname','$lastname','$username','$email','$password','$user_type','$status', '$user_status', '$date_modified', '$time_modified','$admin_id')";

     if (mysqli_query($conn, $query_army_user)) {
    // Getter for army user id
      $result_getter = mysqli_query($conn, "SELECT id FROM army_users WHERE reg_user = $admin_id");
      $row           = mysqli_fetch_assoc($result_getter);
      $army_user_id  = $row["id"];

      // Insert into Admin Table
      $query_reservist = "INSERT INTO army_admin VALUES('','$army_user_id','$rank','$company','$afpsn','$date_modified', '$time_modified')";
        mysqli_query($conn, $query_reservist);
        
      $query_del_reservist = "DELETE FROM registration_user WHERE reg_id = $admin_id";
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
		$nav_active = 'admin';
		include 'side_navigation.php'
		?>

        <div class="main">
            <?php include 'top_right_navigation.php' ?>

            <main class="content">
                <div class="container-fluid p-0">
                      <h1 class="h3 mb-3"><a href="admin_reg_admin.php" class="linked-navigation">Admin List </a> / <a href="admin_reg_admin_view.php?ID=<?php echo $reservist_id ?>" class="linked-navigation"><?php echo $firstname . ' ' . $lastname ?> </a> / Edit</h1>
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
                                        <label class="form-label">APPROVED?</label>
                                        <select class="form-control" id="status" name="status">
                                          <option value="disapproved" selected>Disapproved</option>
                                          <option value="ready">Ready</option>
                                          <option value="inactive">Standby</option>
                                          <option value="retired">Retired</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="mb-3">
                                        <label class="form-label">Activate the Account?</label>
                                        <select class="form-control" id="user_status" name="user_status">
                                          <option value="active">Active</option>
                                          <option value="inactive" selected>Inactive</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="text-center mt-3">
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