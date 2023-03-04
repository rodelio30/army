<?php
include 'system_checker.php';

$aor_id = $_GET['ID'];

$result       = mysqli_query($conn, "SELECT * FROM aor WHERE aor_id='$aor_id'");
while ($res   = mysqli_fetch_array($result)) {
  $company_name   = $res['company_name'];
  $place          = $res['place'];
  $status         = $res['status'];
}
if (isset($_POST['update'])) {
  $company_name  = $_POST['company_name'];
  $place_new         = $_POST['place'];
  $status        = $_POST['status'];

  $duplicate = mysqli_query($conn, "SELECT * FROM aor WHERE place = '$place_new'");
  if (mysqli_num_rows($duplicate) > 0) {
    echo
    "<script> alert('Area of Responsibilty has already taken'); </script>";
  } 
  else {
  mysqli_query($conn, "update aor set company_name = '$company_name', place = '$place_new', status = '$status' where aor_id = '$aor_id'") or die("Query 4 is incorrect....");

  echo '<script type="text/javascript"> alert("' . $place_new . ' updated!.")</script>';
  header('Refresh: 0; url=admin_aor.php');
  }
  // End of Else in Inactive if
}


$sel_active   = "";
$sel_inactive = "";

if ($status == "active") {
  $sel_active  = "selected";
} else if ($status == "inactive") {
  $sel_inactive = "selected";
}

$disabled = '';
if($isReservist || $isCommander || $isStaff) {
  $disabled = 'disabled';
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
  <div class="wrapper">
    <?php
    $nav_active = 'aor';
    include 'side_navigation.php'
    ?>

    <div class="main">
      <?php include 'top_right_navigation.php' ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><a href="admin_aor.php" class="linked-navigation">Area of Responsibility List</a> /
            <?php echo $place ?></h1>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <?php if($isSadmin || $isAdmin || $isStaff) {
                  ?>
                    <h5 class="card-title mb-0">Edit Area of Responsibility</h5>
                  <?php }
                  ?>
                </div>
                <div class="card-body">
                  <form method="post" autocomplete="off">
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Company Name</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <!-- <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo $company_name ?>" placeholder="Enter company Name"> -->
                      <select class="form-control" id="company_name" name="company_name" <?php echo $disabled ?>>
                          <?php
                          $result = mysqli_query($conn, "select company_name from company where status='active'") or die("Query School List is inncorrect........");
                          while (list($c_name) = mysqli_fetch_array($result)) {
                            if($c_name == $company_name) {
                            echo "<option value='$c_name' selected>$c_name</option>";
                            }else {
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
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Location</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="place" name="place" value="<?php echo $place ?>" placeholder="Enter City/Municipality" <?php echo $disabled?>>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Status</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <select class="form-control" id="status" value="<?php echo $status ?>" name="status" <?php echo $disabled?>>
                          <option value="active" <?php echo $sel_active ?>>Active</option>
                          <option value="inactive" <?php echo $sel_inactive ?>>Inactive
                          </option>
                        </select>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-6">
                        <a href="admin_aor.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
                      </div>
                      <div class="col-6">
                            <?php if($isSadmin || $isAdmin) {
                            ?>
                        <button type="submit" name="update" class="btn btn-md btn-outline-success" style="float:right">Update</button>
                            <?php }
                            ?>
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