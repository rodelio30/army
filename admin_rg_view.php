
<?php
include 'system_checker.php';

$rg_id = $_GET['ID'];

$result       = mysqli_query($conn, "SELECT * FROM rotc_graduates WHERE rg_id='$rg_id'");
while ($res   = mysqli_fetch_array($result)) {
  $rg_id           = $res['rg_id'];
  $name            = $res['name'];
  $afpsn           = $res['afpsn'];
  $date_of_birth   = $res['date_of_birth'];
  $home_address    = $res['home_address'];
  $date_graduated  = $res['date_graduated'];
  $age             = $res['age'];
  $sex             = $res['sex'];
  $school_graduated = $res['school_graduated'];
  $status          = $res['status'];
  $date_created    = $res['date_created'];
  $time_created    = $res['time_created'];
  $date_modified   = $res['date_modified'];
  $time_modified   = $res['time_modified'];
}

if (isset($_POST['update'])) {
  $name           = $_POST['name'];
  $afpsn_now          = $_POST['afpsn'];
  $date_of_birth  = $_POST['date_of_birth'];
  $home_address   = $_POST['home_address'];
  $status         = $_POST['status'];
  $date_modified  = date("Y-m-d");
  $time_modified  = date("h:i:s");

  // Computation of Age
  $bday = new DateTime($date_of_birth);
  $today = new DateTime(date('m.d.y'));
  $diff = $today->diff($bday);
  // echo "<script>console.log('" . $diff->y. "');</script>";
  $age                  = $diff->y;

  // if($afpsn != $afpsn_now) {

  // }
  $duplicate = mysqli_query($conn, "SELECT * FROM rotc_graduates WHERE afpsn = '$afpsn_now' && afpsn != '$afpsn'");
  if (mysqli_num_rows($duplicate) > 0) {
    echo
    "<script> alert('AFPSN Has Already Taken'); </script>";
  } else {

  mysqli_query($conn, "update rotc_graduates set name = '$name', afpsn = '$afpsn_now', date_of_birth = '$date_of_birth', home_address = '$home_address', age = '$age', status = '$status', date_modified = '$date_modified', time_modified = '$time_modified' where rg_id = '$rg_id'") or die("Query 4 is incorrect....");


  echo '<script type="text/javascript"> alert("' . $name . ' updated!.")</script>';
  header('Refresh: 0; url=admin_rg.php');
  // End of Else in Inactive if
  }
}

$sel_active   = "";
$sel_inactive = "";

$sel_2014   = "";
$sel_2015   = "";
$sel_2016   = "";
$sel_2017   = "";
$sel_2018   = "";
$sel_2019   = "";
$sel_2020   = "";
$sel_2021   = "";
$sel_2022   = "";
$sel_2023   = "";

if ($status == "active") {
  $sel_active  = "selected";
} else if ($status == "inactive") {
  $sel_inactive = "selected";
}

if ($date_graduated == "2014-2015") {
  $sel_2014 = "selected";
} else if ($date_graduated == "2015-2016") {
  $sel_2015 = "selected";
} else if ($date_graduated == "2016-2017") {
  $sel_2016 = "selected";
} else if ($date_graduated == "2017-2018") {
  $sel_2017 = "selected";
} else if ($date_graduated == "2018-2019") {
  $sel_2018 = "selected";
} else if ($date_graduated == "2019-2020") {
  $sel_2019 = "selected";
} else if ($date_graduated == "2020-2021") {
  $sel_2020 = "selected";
} else if ($date_graduated == "2021-2022") {
  $sel_2021 = "selected";
} else if ($date_graduated == "2022-2023") {
  $sel_2022 = "selected";
} else if ($date_graduated == "2023-2024") {
  $sel_2023 = "selected";
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
          <h1 class="h3 mb-3"><a href="admin_rg.php" class="linked-navigation">Reserve List</a> /
            <?php echo $name ?></h1>

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
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>" placeholder="Enter Name">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>AFPSN</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="afpsn" name="afpsn" value="<?php echo $afpsn ?>" placeholder="Enter AFPSN ">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Date of Birth</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo $date_of_birth?>" placeholder="Enter Birthdate">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Home Address</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="home_address" name="home_address" value="<?php echo $home_address?>" placeholder="Enter Home Address">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Date Graduated</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="date_graduated" name="date_graduated" value="<?php echo $date_graduated ?>"disabled>
                        <!-- <select class="form-control" id="date_graduated" value="<?php echo $date_graduated ?>" name="date_graduated">
                          <option value="2014-2015">2014-2015</option>
                          <option value="2015-2016">2015-2016</option>
                          <option value="2016-2017">2016-2017</option>
                          <option value="2017-2018">2017-2018</option>
                          <option value="2018-2019">2018-2019</option>
                          <option value="2019-2020">2019-2020</option>
                          <option value="2020-2021">2020-2021</option>
                          <option value="2021-2022">2021-2022</option>
                          <option value="2022-2023">2022-2023</option>
                          <option value="2023-2024">2023-2024</option>
                        </select> -->
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
                        <input type="text" class="form-control" id="sex" name="sex" value="<?php echo $sex?>" placeholder="Enter Sex" disabled>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>School Graduated</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="school_graduated" name="school_graduated" value="<?php echo $school_graduated?>" placeholder="Enter School Gradute" disabled>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Status</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <select class="form-control" id="status" value="<?php echo $status ?>" name="status">
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
                    <br>
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
                    <div class="row">
                      <div class="col-6">
                        <a href="admin_rg.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
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