<?php
include 'system_checker.php';
if($isReservist){
  header("Location: index.php");
}

$rg_id = $_GET['ID'];

$result       = mysqli_query($conn, "SELECT * FROM reservists WHERE rg_id='$rg_id'");
while ($res   = mysqli_fetch_array($result)) {
  $rg_id            = $res['rg_id'];
  $firstname        = $res['firstname'];
  $middle_initial   = $res['middle_initial'];
  $lastname         = $res['lastname'];
  $extname          = $res['extname'];
  $afpsn            = $res['afpsn'];
  $rank             = $res['rank'];
  $date_of_birth    = $res['date_of_birth'];
  $home_address     = $res['home_address'];
  $date_graduated   = $res['date_graduated'];
  $age              = $res['age'];
  $sex              = $res['sex'];
  $school_graduated = $res['school_graduated'];
  $status           = $res['status'];
  $user_status      = $res['user_status'];
  $date_created     = $res['date_created'];
  $time_created     = $res['time_created'];
  $date_modified    = $res['date_modified'];
  $time_modified    = $res['time_modified'];
}
  $time_c_formatted   = date("G:i A ", strtotime($time_created));
  $time_m_formatted   = date("G:i A ", strtotime($time_modified));

if (isset($_POST['update_staff'])) {
  $status           = $_POST['status'];
  $user_status      = $_POST['user_status'];
  $date_modified    = date("Y-m-d");
  $time_modified    = date("h:i:s");

  if($user_status == 'inactive') {
    mysqli_query($conn, "update reservists set status = '$status',user_status = '$user_status', date_modified = '$date_modified', time_modified = '$time_modified' where rg_id = '$rg_id'") or die("Query 4 is incorrect....");
  } else if($user_status == 'active') {
    $query_reservist = "update reservists set status = '$status',user_status = '$user_status', date_modified = '$date_modified', time_modified = '$time_modified' where rg_id = '$rg_id'";
     if (mysqli_query($conn, $query_reservist)) {
      // Inserting other info for reservist in personal information
        mysqli_query($conn, "insert into personal_information (reservist_id) values('$rg_id')")  or die("Query Personal Information is incorrect.....");

      // Inserting other info for reservist in reservist personal information
        mysqli_query($conn, "insert into rpi (reservist_id) values('$rg_id')")  or die("Query RPI is incorrect.....");

      // Inserting other info for reservist in below information
        mysqli_query($conn, "insert into below_info (reservist_id) values('$rg_id')")  or die("Query Below Info is incorrect.....");
     }
  }
  echo '<script type="text/javascript"> alert("' . $firstname . ' '. $lastname .' updated!.")</script>';
  header('Refresh: 0; url=admin_rg.php');
}
if (isset($_POST['update'])) {
  $fname            = $_POST['firstname'];
  $minitial         = $_POST['middle_initial'];
  $lname            = $_POST['lastname'];
  $ename            = $_POST['extname'];
  $afpsn_now        = $_POST['afpsn'];
  $rank_now         = $_POST['rank'];
  $date_graduated   = $_POST['date_graduated'];
  $date_of_birth    = $_POST['date_of_birth'];
  $home_address     = $_POST['home_address'];
  $sex              = $_POST['sex'];
  $school_graduated = $_POST['school_graduated'];
  $status           = $_POST['status'];
  $user_status      = $_POST['user_status'];
  $date_modified    = date("Y-m-d");
  $time_modified    = date("h:i:s");

  // Computation of Age
  $bday = new DateTime($date_of_birth);
  $today = new DateTime(date('m.d.y'));
  $diff = $today->diff($bday);
  // echo "<script>console.log('" . $diff->y. "');</script>";
  $age                  = $diff->y;

  // if($afpsn != $afpsn_now) {

  // }
  $duplicate = mysqli_query($conn, "SELECT * FROM reservists WHERE afpsn = '$afpsn_now' && afpsn != '$afpsn'");
  if (mysqli_num_rows($duplicate) > 0) {
    echo
    "<script> alert('AFPSN Has Already Taken'); </script>";
  } else {

  if($user_status == 'inactive') {
    mysqli_query($conn, "update reservists set firstname = '$fname', middle_initial = '$minitial', lastname = '$lname', extname = '$ename', afpsn = '$afpsn_now', rank = '$rank_now',date_of_birth = '$date_of_birth', home_address = '$home_address', date_graduated = '$date_graduated', age = '$age', sex = '$sex', school_graduated = '$school_graduated', status = '$status',user_status = '$user_status', date_modified = '$date_modified', time_modified = '$time_modified' where rg_id = '$rg_id'") or die("Query 4 is incorrect....");
  } else if($user_status == 'active') {
    $query_reservist = "update reservists set firstname = '$fname', middle_initial = '$minitial', lastname = '$lname', extname = '$ename', afpsn = '$afpsn_now', rank = '$rank_now',date_of_birth = '$date_of_birth', home_address = '$home_address', date_graduated = '$date_graduated', age = '$age', sex = '$sex', school_graduated = '$school_graduated', status = '$status',user_status = '$user_status', date_modified = '$date_modified', time_modified = '$time_modified' where rg_id = '$rg_id'";
     if (mysqli_query($conn, $query_reservist)) {
      // Inserting other info for reservist in personal information
        mysqli_query($conn, "insert into personal_information (reservist_id) values('$rg_id')")  or die("Query Personal Information is incorrect.....");

      // Inserting other info for reservist in reservist personal information
        mysqli_query($conn, "insert into rpi (reservist_id) values('$rg_id')")  or die("Query RPI is incorrect.....");

      // Inserting other info for reservist in below information
        mysqli_query($conn, "insert into below_info (reservist_id) values('$rg_id')")  or die("Query Below Info is incorrect.....");
     }
  }

  echo '<script type="text/javascript"> alert("' . $firstname . ' '. $lastname .' updated!.")</script>';
  header('Refresh: 0; url=admin_rg.php');
  }
}

// for Status
$sel_ready   = "";
$sel_standby = "";
$sel_retired = "";

// for User Status
$sel_active   = "";
$sel_inactive = "";

// for User Sex
$sel_male      = "";
$sel_female   = "";

if ($status == "Ready") {
  $sel_ready = "selected";
} else if ($status == "Standby") {
  $sel_standby = "selected";
} else if ($status == "Retired") {
  $sel_retired = "selected";
}

if ($user_status == "active") {
  $sel_active  = "selected";
} else if ($user_status == "inactive") {
  $sel_inactive = "selected";
}

if ($sex == "Male") {
  $sel_male   = "selected";
} else if ($sex == "Female") {
  $sel_female = "selected";
}

$disabled = '';
if($isStaff || $isCommander){
$disabled = 'disabled';
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
  <div class="wrapper">
    <?php
    $nav_active = 'rotc';
    include 'side_navigation.php'
    ?>

    <div class="main">
      <?php include 'top_right_navigation.php' ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><a href="admin_rg.php" class="linked-navigation">Reservist List</a> /
            <?php echo $firstname .' '. $lastname?></h1>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title mb-0">Edit ROTC Graduate</h5>
                </div>
                <div class="card-body">
                  <form method="post" autocomplete="off">
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Name</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <div class="row">
                          <div class="col-3">
                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname ?>" placeholder="Enter First Name" <?php echo $disabled ?>>
                          </div>
                          <div class="col-3">
                            <input type="text" class="form-control" id="middle_initial" name="middle_initial" value="<?php echo $middle_initial ?>" placeholder="Enter Middle Initial" <?php echo $disabled ?>>
                          </div>
                          <div class="col-3">
                            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname ?>" placeholder="Enter Last Name" <?php echo $disabled ?>>
                          </div>
                          <div class="col-3">
                            <input type="text" class="form-control" id="extname" name="extname" value="<?php echo $extname ?>" placeholder="Enter Extention Name" <?php echo $disabled ?>>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>AFPSN</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="afpsn" name="afpsn" value="<?php echo $afpsn ?>" placeholder="Enter AFPSN " <?php echo $disabled ?>>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Rank Classification</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <select class="form-control" id="rank" name="rank"<?php echo $disabled ?>>
                            <option value="none">None</option>
                          <?php
                          $result = mysqli_query($conn, "select rank_name from ranks where status='active'") or die("Query School List is inncorrect........");
                          while (list($rank_name) = mysqli_fetch_array($result)) {
                            if($rank == $rank_name) {
                              echo "<option value='$rank_name' selected>$rank_name</option>";
                            } else {
                              echo "<option value='$rank_name'>$rank_name</option>";
                            }
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Date of Birth</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo $date_of_birth?>" placeholder="Enter Birthdate" <?php echo $disabled ?>>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Home Address</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="home_address" name="home_address" value="<?php echo $home_address?>" placeholder="Enter Home Address" <?php echo $disabled ?>>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Date Graduated</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <!-- <input type="text" class="form-control" id="date_graduated" name="date_graduated" value="<?php echo $date_graduated ?>"disabled> -->
                        <select class="form-control" id="date_graduated"name="date_graduated"<?php echo $disabled ?>>
                          <?php  
                          $year_start = 1999;
                          $year_end   = 2000;
                          for ($x = 0; $x <= 30; $x++) {
                            $year_start++;
                            $year_end++;
                            $ay = $year_start . '-' .$year_end;
                            if($ay == $date_graduated) {
                              echo "<option value='$year_start-$year_end' selected>$year_start-$year_end</option>";
                            } else {
                              echo "<option value='$year_start-$year_end'>$year_start-$year_end</option>";
                            }
                          }
                          ?>  
                        </select>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Age</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="age" name="age" value="<?php echo $age?>" placeholder="Enter Sex" disabled>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Sex</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                      <?php if($isAdmin || $isSchool || $isStaff || $isCommander) {?>
                        <input type="text" class="form-control" id="sex" name="sex" value="<?php echo ucfirst($sex) ?>" disabled>
                        <input type="hidden" id="sex" name="sex" value="<?php echo $sex?>">
                        <?php } else { ?>
                          <select class="form-control" id="sex" value="<?php echo $sex?>" name="sex" <?php echo $disabled ?>>
                            <option value="Male" <?php echo $sel_male ?>>Male</option>
                            <option value="Female" <?php echo $sel_female ?>>Female</option>
                          </select>
                        <?php }?>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>School Graduated</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                      <?php if($isAdmin || $isSchool || $isStaff || $isCommander) {?>
                        <input type="text" class="form-control" id="school_graduated" name="school_graduated" value="<?php echo ucfirst($school_graduated) ?>" disabled>
                        <input type="hidden" id="school_graduated" name="school_graduated" value="<?php echo $school_graduated?>">
                        <?php } else { ?>
                        <select class="form-control" id="school_graduated" name="school_graduated">
                            <option value="none">None</option>
                          <?php
                          $result = mysqli_query($conn, "select acronym from schools where status='active'") or die("Query School List is inncorrect........");
                          while (list($acronym) = mysqli_fetch_array($result)) {
                            if($acronym == $school_graduated) {
                              echo "<option value='$acronym' selected>$acronym</option>";
                            } else {
                              echo "<option value='$acronym'>$acronym</option>";
                            }
                          }
                          ?>
                        </select>
                        <?php }?>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Status</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">

                      <?php if($isSchool || $isCommander) {?>
                        <input type="text" class="form-control" id="status" name="status" value="<?php echo ucfirst($status) ?>" disabled>
                        <input type="hidden" id="status" name="status" value="<?php echo $status ?>">
                      <?php } else { ?>
                        <select class="form-control" id="status" value="<?php echo $status ?>" name="status">
                          <option value="Ready" <?php echo $sel_ready ?>>Ready</option>
                          <option value="Standby" <?php echo $sel_standby ?>>Standby</option>
                          <option value="Retired" <?php echo $sel_retired ?>>Retired</option>
                        </select>
                      <?php }?>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>User Status</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">

                      <?php if($isSchool || $isCommander) {?>
                        <input type="text" class="form-control" id="user_status" name="user_status" value="<?php echo ucfirst($user_status) ?>" disabled>
                        <input type="hidden" id="user_status" name="user_status" value="<?php echo $user_status ?>">
                      <?php } else { ?>
                        <select class="form-control" id="user_status" value="<?php echo $user_status ?>" name="user_status">
                          <option value="active" <?php echo $sel_active ?>>Active</option>
                          <option value="inactive" <?php echo $sel_inactive ?>>Inactive
                          </option>
                        </select>
                          
                      <?php }?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Date Created</strong>
                        </h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <div class="flatpickr-weekwrapper">
                          <?php echo $date_created ?>
                          <?php echo $time_c_formatted ?>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Date Modified</strong>
                        </h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <div class="flatpickr-weekwrapper">
                          <?php echo $date_modified ?>
                          <?php echo $time_m_formatted ?>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-6">
                        <a href="admin_rg.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
                      </div>
                      <div class="col-6">
                        <?php if(!$isStaff && !$isCommander) {?>
                        <button type="submit" name="update" class="btn btn-md btn-outline-success" style="float:right">Update</button>
                        <?php } else if($isStaff) {?>
                        <button type="submit" name="update_staff" class="btn btn-md btn-outline-success" style="float:right">Update</button>
                        <?php } ?>
                      </div>
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