<?php 
require 'system_checker.php';

$user_id = $id;

if (isset($_POST['update'])) {
  $firstname     = $_POST['firstname'];
  $lastname      = $_POST['lastname'];
  $username      = $_POST['username'];
  $email         = $_POST['email'];
  if($isSadmin) {
  $rank          = $_POST['rank'];
  }
  $company       = $_POST['company'];
  $afpsn         = $_POST['afpsn'];
  $school_name   = $_POST['school_name'];
  $status        = $_POST['status'];
  $user_status   = $_POST['user_status'];

  $date_modified = date("Y-m-d");
  $time_modified = date("h:i:s");

  if($isSadmin){
  mysqli_query($conn, "update army_users set firstname = '$firstname', lastname = '$lastname', username = '$username', email = '$email', rank = '$rank', company = '$company', afpsn = '$afpsn', status = '$status', user_status = '$user_status', date_modified = '$date_modified', time_modified = '$time_modified' where id = '$user_id'") or die("Query 4 is incorrect....");
  } else {
  mysqli_query($conn, "update army_users set firstname = '$firstname', lastname = '$lastname', username = '$username', email = '$email', company = '$company', afpsn = '$afpsn', school_name = '$school_name', status = '$status', user_status = '$user_status', date_modified = '$date_modified', time_modified = '$time_modified' where id = '$user_id'") or die("Query 4 is incorrect....");
  }

  echo '<script type="text/javascript"> alert("' . $username . ' updated!.")</script>';
  header('Refresh: 0; url=pages-profile.php');
  // End of Else in Inactive if
}

$result       = mysqli_query($conn, "SELECT * FROM army_users WHERE id='$user_id'");
while ($res   = mysqli_fetch_array($result)) {
  $user_id       = $res['id'];
  $user_img      = $res['user_img'];
  $firstname     = $res['firstname'];
  $lastname      = $res['lastname'];
  $username      = $res['username'];
  $email         = $res['email'];
  $type          = $res['type'];
  $user_rank     = $res['rank'];
  $company       = $res['company'];
  $afpsn         = $res['afpsn'];
  $user_school_name = $res['school_name'];
  $status        = $res['status'];
  $user_status   = $res['user_status'];
  $date_created  = $res['date_created'];
  $time_created  = $res['time_created'];
  $date_modified = $res['date_modified'];
  $time_modified = $res['time_modified'];
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
  mysqli_query($conn, "update army_users set user_img = '$filename' where id = '$id'") or die("Query Changing image is incorrect....");

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
                                        <h5 class="card-title mb-0 text-center"><?php echo $user_rank ?></h5>
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
                    <?php 
                    if($isSchool){
                      ?>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>School Acronym</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                          <select class="form-control" id="school_name" name="school_name">
                              <?php
                              $result = mysqli_query($conn, "select school_name, acronym from schools where status='active'") or die("Query School List is inncorrect........");
                              while (list($school_name, $acronym) = mysqli_fetch_array($result)) {
                                  if($school_name == $user_school_name){
                                      echo "<option value='$school_name' selected>$acronym</option>";
                                  }
                                  else {
                                      echo "<option value='$school_name'>$acronym</option>";
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
                        <input type="text" class="form-control" id="rank" name="rank" value="<?php echo $user_rank?>" disabled>
                        <?php
                        } else {
                          ?> 
                          <select class="form-control" id="rank" name="rank">
                                  <option value="none">None</option>
                              <?php
                              $result = mysqli_query($conn, "select ranked, rank_name from ranks where status='active'") or die("Query School List is inncorrect........");
                              while (list($ranked, $rank_name) = mysqli_fetch_array($result)) {
                                  if($rank_name == $user_rank){
                                      echo "<option value='$rank_name' selected>$ranked. $rank_name</option>";
                                  }
                                  else {
                                      echo "<option value='$rank_name'>$ranked. $rank_name</option>";
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
                        <!-- <input type="text" class="form-control" id="company" name="company" value="<?php echo $company ?>" placeholder="Enter User Company"> -->
                        <select class="form-control" id="company" name="company">
                            <option value="none">None</option>
                            <?php
                            $result = mysqli_query($conn, "select company_name from company where status='active'") or die("Query School List is inncorrect........");
                            while (list($company_name) = mysqli_fetch_array($result)) {
                                if($company_name == $company){
                                    echo "<option value='$company_name' selected>$company_name</option>";
                                } else {
                                    echo "<option value='$company_name'>$company_name</option>";
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
                          <?php echo $time_created ?>
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
                          <?php echo $time_modified ?>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row" id="action-print">
                      <div class="col-6">
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

</body>

</html>