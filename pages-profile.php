<?php 
require 'system_checker.php';
// include 'encryption.php';

$user_id = $army_id;

$result       = mysqli_query($conn, "SELECT * FROM army_users WHERE army_id='$user_id'");
while ($res   = mysqli_fetch_array($result)) {
  $user_id       = $res['army_id'];
  $user_img      = $res['user_img'];
  $firstname     = $res['firstname'];
  $lastname      = $res['lastname'];
  $username      = $res['username'];
  $email         = $res['email'];
  $password      = $res['password'];
  $type          = $res['type'];
  $user_rank_id     = $res['rank_id'];
  $user_school_id = $res['school_id'];
  $company_id       = $res['company_id'];
  $afpsn         = $res['afpsn'];
  $status        = $res['status'];
  $user_status   = $res['user_status'];
  $date_created  = $res['date_created'];
  $time_created  = $res['time_created'];
  $date_modified = $res['date_modified'];
  $time_modified = $res['time_modified'];
}
  $time_c_formatted   = date("G:i A ", strtotime($time_created));
  $time_m_formatted   = date("G:i A ", strtotime($time_modified));

$user_rank_name      = '';
// Get the rank name
if($user_rank_id == 0) { 
  $user_rank_name = 'None';
} else {
  $result_rank = mysqli_query($conn, "SELECT * FROM ranks WHERE rank_id = '$user_rank_id'");
  while ($res      = mysqli_fetch_array($result_rank)) {
  $user_rank_name = $res['rank_name'];
  }
}

if (isset($_POST['update'])) {
  $firstname     = $_POST['firstname'];
  $lastname      = $_POST['lastname'];
  $username      = $_POST['username'];
  $email         = $_POST['email'];
  // $password      = $_POST['password'];
  if($isSadmin) {
  $rank_id          = $_POST['rank_id'];
  }
  $company_id       = $_POST['company_id'];
  $afpsn         = $_POST['afpsn'];

  if($isSchool){
  $school_id   = $user_school_id;
  }

  $status        = $_POST['status'];
  $user_status   = $_POST['user_status'];

  $date_modified = date("Y-m-d");
  $time_modified = date("h:i:s");

  if($isSadmin){
    mysqli_query($conn, "update army_users set firstname = '$firstname', lastname = '$lastname', username = '$username', email = '$email', rank_id = '$rank_id', company_id = '$company_id', afpsn = '$afpsn', status = '$status', user_status = '$user_status', date_modified = '$date_modified', time_modified = '$time_modified' where army_id = '$user_id'") or die("Query 4 is incorrect....");
  } else if($isSchool) {
    mysqli_query($conn, "update army_users set firstname = '$firstname', lastname = '$lastname', username = '$username', email = '$email', company_id = '$company_id', afpsn = '$afpsn', status = '$status', user_status = '$user_status', date_modified = '$date_modified', time_modified = '$time_modified' where army_id = '$user_id'") or die("Query 4 is incorrect....");
  }
  else {
    mysqli_query($conn, "update army_users set firstname = '$firstname', lastname = '$lastname', username = '$username', email = '$email', company_id = '$company_id', afpsn = '$afpsn', status = '$status', user_status = '$user_status', date_modified = '$date_modified', time_modified = '$time_modified' where army_id = '$user_id'") or die("Query 4 is incorrect....");
  }

  echo '<script type="text/javascript"> alert("' . $username . ' updated!.")</script>';
  header('Refresh: 0; url=pages-profile.php');
  // End of Else in Inactive if
}

$sel_active   = "";
$sel_inactive = "";

$sel_ready    = "";
$sel_standby  = "";
$sel_retired  = "";

$sel_admin     = "";
$sel_staff     = "";
$sel_commander = "";
$sel_school    = "";
$sel_reservist = "";

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

if ($type == "admin") {
  $sel_admin  = "selected";
} else if ($type == "staff") {
  $sel_staff = "selected";
} else if ($type == "commander") {
  $sel_commander = "selected";
} else if ($type == "school_coordinator") {
  $sel_school = "selected";
} else if ($type == "reservist") {
  $sel_reservist = "selected";
}


if (isset($_POST['image_update'])) {
  $filename = $_FILES["uploadfile"]["name"];
if(empty($filename)){
  echo '<script type="text/javascript"> alert("Insert an image first!.")</script>';
} else {
  $tempname = $_FILES["uploadfile"]["tmp_name"];
  $folder = "img/profile/" . $filename;
  $date_modified = date("Y-m-d h:i:s");

  // echo "<script>console.log('" . $email . "');</script>";
  // This line below is to update a specific faculty user
  mysqli_query($conn, "update army_users set user_img = '$filename' where army_id = '$army_id'") or die("Query Changing image is incorrect....");

  // removing image in folder
  if(!empty($user_img)){
    unlink('img/profile/' . $user_img . '');
    echo "<script>console.log('Successfully removed " . $user_img . "');</script>";
  }

  if (move_uploaded_file($tempname, $folder)) {
    echo "<script>console.log('Image uploaded successfully!');</script>";
  } else {
    echo "<script>console.log(' Failed to upload image!!');</script>";
  }
  echo '<script type="text/javascript"> alert("' . $firstname . '`s image updated!.")</script>';
  header('Refresh: 0; url=pages-profile.php');

}
}

$disabled = '';
if($isSchool) {
  $disabled = 'disabled';
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
    <div class="wrapper">
        <?php
        $nav_active = 'profile';
        include 'side_navigation.php'
        ?>

        <div class="main">
            <?php include 'top_right_navigation.php' ?>

            <main class="content">
                <div class="container-fluid p-0">

                    <div class="mb-3">
                        <h1 class="h3 d-inline align-middle">Profile</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-5 col-xl-4">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Profile Details</h5>
                                </div>
                                <div class="card-body text-center">
                                    <form method="post" enctype="multipart/form-data">
                                    <img src="img/profile/<?php echo $user_img ? $user_img: 'empty_user.png' ?>" alt="Admin"
                                        class="page_profile">
                                    </div>
                                        <h5 class="card-title mb-0 text-center"><?php echo $fn_public . ' '. $ln_public?></h5>
                                        <h5 class="card-title mb-0 text-center"><?php echo $user_rank_id ?></h5>
                                    <br>
                                    <div class="form-group ms-2 me-2">
                                    <label>New Image</label>
                                      <input class="form-control" type="file" name="uploadfile"/>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group text-center mb-4">
                                        <button type="submit" class="btn btn-outline-success" name="image_update">Update Profile</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-7 col-xl-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Edit Profile Info</h5>
                                </div>
                                <div class="card-body h-100">
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
                    <!-- <div class="row" style="margin-bottom: -1rem;">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Password</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="password" class="form-control" id="main_password" name="password" value="<?php echo $password ?>" placeholder="Enter Password">
												<input type="checkbox" onclick="myFunction()"> Show Password
                      </div>
                    </div>
                    <br> -->
                    <?php 
                    if($isSchool){
                      ?>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>School</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                          <select class="form-control" id="school_id" name="school_id" <?php echo $disabled?>>
                            <option value="None">None</option>
                              <?php
                              $result = mysqli_query($conn, "select school_id, school_name from schools where status='active'") or die("Query School List is inncorrect........");
                              while (list($sch_id, $school_name) = mysqli_fetch_array($result)) {
                                  if($sch_id == $school_id){
                                      echo "<option value='$sch_id' selected>$school_name</option>";
                                  }
                                  else {
                                      echo "<option value='$sch_id'>$school_name</option>";
                                  }
                              }
                              ?>
                          </select>
                      </div>
                    </div>
                    <br>
                    <?php
                    }
                    ?>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Rank</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <?php if(!$isSadmin) { ?>
                        <input type="text" class="form-control" id="rank_id" name="rank_id" value="<?php echo $user_rank_name?>" disabled>
                        <?php
                        } else {
                          ?> 
                          <select class="form-control" id="rank_id" name="rank_id">
                                  <option value="none">None</option>
                              <?php
                              $result = mysqli_query($conn, "select rank_id, rank_name from ranks where status='active'") or die("Query School List is inncorrect........");
                              while (list($r_id, $rank_name) = mysqli_fetch_array($result)) {
                                  if($user_rank_id == 0){
                                      echo "<option value='$user_rank_id' selected>None</option>";
                                  }
                                  if($r_id == $user_rank_id){
                                      echo "<option value='$rank_id' selected>$rank_name</option>";
                                  }
                                  else {
                                      echo "<option value='$rank_id'>$rank_name</option>";
                                  }
                              }
                              ?>
                          </select>
                          <?php
                        }
                        ?>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Company</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <!-- <input type="text" class="form-control" id="company_id" name="company_id" value="<?php echo $company_id ?>" placeholder="Enter User Company"> -->
                        <select class="form-control" id="company_id" name="company_id">
                            <option value="none">None</option>
                            <?php
                            $result = mysqli_query($conn, "select company_id, company_name from company where status='active'") or die("Query School List is inncorrect........");
                            while (list($comp_id, $company_name) = mysqli_fetch_array($result)) {
                                if($company_id == $comp_id){
                                    echo "<option value='$company_id' selected>$company_name</option>";
                                } else {
                                    echo "<option value='$company_id'>$company_name</option>";
                                }
                            }
                            ?>
                        </select>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>AFPSN</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="afpsn" name="afpsn" value="<?php echo $afpsn?>" placeholder="Enter User AFPSN">
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
                        <a href="admin_change_pass.php?ID=<?php echo $army_id?>" class="btn btn-md btn-outline-primary" style="float:left">Change Password</a>
                      </div>
                      <div class="col-6">
                        <button type="submit" name="update" class="btn btn-md btn-outline-success" style="float:right">Update</button>
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
	<script src="js/pw.js"></script>

</body>

</html>