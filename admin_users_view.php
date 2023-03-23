<?php
include 'system_checker.php';
if(!$isSadmin){
  header("Location: index.php");
}

$user_id = $_GET['ID'];

if (isset($_POST['update'])) {
  $firstname     = $_POST['firstname'];
  $lastname      = $_POST['lastname'];
  $username      = $_POST['username'];
  $email         = $_POST['email'];
  // $user_type     = $_POST['type'];
  $company       = $_POST['company'];
  $status        = $_POST['status'];
  $user_status   = $_POST['user_status'];

  $date_modified = date("Y-m-d");
  $time_modified = date("h:i:s");

  mysqli_query($conn, "update army_users set firstname = '$firstname', lastname = '$lastname', username = '$username', email = '$email', company = '$company', status = '$status', user_status = '$user_status', date_modified = '$date_modified', time_modified = '$time_modified' where id = '$user_id'") or die("Query 4 is incorrect....");

  echo '<script type="text/javascript"> alert("' . $username . ' updated!.")</script>';
  header('Refresh: 0; url=admin_users.php');
  // End of Else in Inactive if
}

$result       = mysqli_query($conn, "SELECT * FROM army_users WHERE id='$user_id'");
while ($res   = mysqli_fetch_array($result)) {
  $user_id       = $res['id'];
  $firstname     = $res['firstname'];
  $lastname      = $res['lastname'];
  $username      = $res['username'];
  $email         = $res['email'];
  $type          = $res['type'];
  $company       = $res['company'];
  $status        = $res['status'];
  $user_status   = $res['user_status'];
  $date_modified = $res['date_modified'];
  $time_modified = $res['time_modified'];
}
  $time_m_formatted   = date("G:i A ", strtotime($time_modified));

$sel_active   = "";
$sel_inactive = "";
$sel_ready    = "";
$sel_standby  = "";
$sel_retired  = "";

if ($status == "ready") {
  $sel_ready = "selected";
} else if ($status == "standby") {
  $sel_standby = "selected";
} else if ($status == "retired") {
  $sel_retired = "selected";
}

if ($user_status == "active") {
  $sel_active  = "selected";
} else if ($user_status == "inactive") {
  $sel_inactive = "selected";
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
    <div class="wrapper">
        <?php
        $nav_active = 'users';
        include 'side_navigation.php'
        ?>

        <div class="main">
            <?php include 'top_right_navigation.php' ?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3 header-dash"><a href="admin_users.php" class="linked-navigation">User List </a> / <?php echo $username ?>
                        <button onclick="window.print();" class="btn btn-outline-primary" id="print-btn"><span data-feather="printer"></span> Print</button>
                    </h1>

                    <div class="row" id="areaToPrint">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php include 'print_header.php'?>
                  <form method="post" autocomplete="off">
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Firstname</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname ?>" placeholder="Enter Lastname">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Lastname</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname ?>" placeholder="Enter Lastname">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Username</strong>
                        </h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $username ?>" placeholder="Enter Username">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Email</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $email ?>" placeholder="Enter Email">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Type</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="type" name="type" value="<?php echo $type ?>" placeholder="Enter User Type " disabled>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Company</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <select class="form-control" id="company" name="company">
                          <option value="None">None</option>
                            <?php
                            $result = mysqli_query($conn, "select company_name from company where status='active'") or die("Query School List is inncorrect........");
                            while (list($c_name) = mysqli_fetch_array($result)) {
                              if($c_name == $company) {
                                echo "<option value='$c_name' selected>$c_name</option>";
                              } else if($c_name == 'None'){
                                echo "<option value='None' selected>None</option>";
                              } else {
                                echo "<option value='$c_name'>$c_name</option>";
                              }
                            }
                            ?>
                        </select>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Status</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <select class="form-control" id="status" name="status">
                          <option value="ready" <?php echo $sel_ready ?>>Ready</option>
                          <option value="standby" <?php echo $sel_standby ?>>Standby</option>
                          <option value="retired" <?php echo $sel_retired ?>>Retired</option>
                        </select>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>User Status</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <select class="form-control" id="user_status" name="user_status">
                          <option value="active" <?php echo $sel_active ?>>Active</option>
                          <option value="inactive" <?php echo $sel_inactive ?>>Inactive
                          </option>
                        </select>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Date Modified</strong>
                        </h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <div class="flatpickr-weekwrapper">
                          <?php echo $date_modified ?>
                          <?php echo $time_m_formatted?>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row" id="action-print">
                      <div class="col-6">
                        <a href="admin_users.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
                      </div>
                      <div class="col-6">
                        <button type="submit" name="update" class="btn btn-md btn-outline-success" style="float:right">Update</button>
                      </div>
                    </div>
                  </form>
                                    <?php include 'print_footer.php'?>
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
    <!-- This line below is the jquery for the datatables -->
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/jquery.dataTable.min.js"></script>

</body>

</html>