<?php
include 'system_checker.php';
if($isSchool || $isCommander || $isReservist){
  header("Location: index.php");
}

$schools_id = $_GET['ID'];

if (isset($_POST['update'])) {
  $acronym        = $_POST['acronym'];
  $school_name    = $_POST['school_name'];
  $school_address = $_POST['school_address'];
  $description    = $_POST['description'];
  $status         = $_POST['status'];
  $date_modified  = date("Y-m-d");
  $time_modified  = date("h:i:s");

  mysqli_query($conn, "update schools set school_name = '$school_name', acronym = '$acronym', description = '$description', school_address = '$school_address', status = '$status', date_modified = '$date_modified', time_modified = '$time_modified' where school_id = '$schools_id'") or die("Query 4 is incorrect....");

  echo '<script type="text/javascript"> alert("' . $school_name . ' updated!.")</script>';
  header('Refresh: 0; url=admin_schools.php');
  // End of Else in Inactive if
}

$result       = mysqli_query($conn, "SELECT * FROM schools WHERE school_id='$schools_id'");
while ($res   = mysqli_fetch_array($result)) {
  $schools_id     = $res['school_id'];
  $school_name    = $res['school_name'];
  $acronym        = $res['acronym'];
  $description    = $res['description'];
  $school_address = $res['school_address'];
  $status         = $res['status'];
  $date_created   = $res['date_created'];
  $time_created   = $res['time_created'];
  $date_modified  = $res['date_modified'];
  $time_modified  = $res['time_modified'];
}
  $time_c_formatted   = date("G:i A ", strtotime($time_created));
  $time_m_formatted   = date("G:i A ", strtotime($time_modified));

$sel_active   = "";
$sel_inactive = "";

if ($status == "active") {
  $sel_active  = "selected";
} else if ($status == "inactive") {
  $sel_inactive = "selected";
}
$disable = '';
if($isAdmin) {
  $disable = 'disabled';
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
  <div class="wrapper">
    <?php
    $nav_active = 'schools';
    include 'side_navigation.php'
    ?>

    <div class="main">
      <?php include 'top_right_navigation.php' ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><a href="admin_schools.php" class="linked-navigation">School List</a> /
            <?php echo $acronym ?></h1>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title mb-0">Edit School</h5>
                </div>
                <div class="card-body">
                  <form method="post" autocomplete="off">
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Acronym</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="acronym" name="acronym" value="<?php echo $acronym ?>" placeholder="Enter Acronym">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>School Name</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="school_name" name="school_name" value="<?php echo $school_name ?>" placeholder="Enter School Name">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>School Address</strong>
                        </h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="school_address" name="school_address" value="<?php echo $school_address ?>" placeholder="Enter School Address">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Description</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="description" name="description" value="<?php echo $description ?>" placeholder="Enter Description">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Status</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">

                      <?php if(!$isSadmin) { ?>
                        <input type="text" class="form-control" id="status" name="status" value="<?php echo ucfirst($status) ?>"disabled>
                        <input type="hidden" class="form-control" id="status" name="status" value="<?php echo ucfirst($status) ?>">
                      <?php } else { ?> 
                        <select class="form-control" id="status" value="<?php echo $status ?>" name="status">
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
                        <a href="admin_schools.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
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