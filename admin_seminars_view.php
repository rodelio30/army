<?php
include 'system_checker.php';

$seminars_id = $_GET['ID'];

if (isset($_POST['update'])) {
  $seminar_name   = $_POST['seminar_name'];
  $description   = $_POST['description'];
  $status        = $_POST['status'];
  $date_modified = date("Y-m-d");
  $time_modified = date("h:i:s");

  mysqli_query($conn, "update seminars set seminar_name = '$seminar_name', description = '$description', status = '$status', date_modified = '$date_modified', time_modified = '$time_modified' where seminar_id = '$seminars_id'") or die("Query 4 is incorrect....");

  echo '<script type="text/javascript"> alert("' . $seminar_name . ' updated!.")</script>';
  header('Refresh: 0; url=admin_seminars.php');
  // End of Else in Inactive if
}

$result       = mysqli_query($conn, "SELECT * FROM seminars WHERE seminar_id='$seminars_id'");
while ($res   = mysqli_fetch_array($result)) {
  $seminars_id    = $res['seminar_id'];
  $seminar_name   = $res['seminar_name'];
  $description   = $res['description'];
  $status        = $res['status'];
  $date_created  = $res['date_created'];
  $time_created  = $res['time_created'];
  $date_modified = $res['date_modified'];
  $time_modified = $res['time_modified'];
}

$sel_active   = "";
$sel_inactive = "";

if ($status == "active") {
  $sel_active  = "selected";
} else if ($status == "inactive") {
  $sel_inactive = "selected";
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
  <div class="wrapper">
    <?php
    $nav_active = 'seminar';
    include 'side_navigation.php'
    ?>

    <div class="main">
      <?php include 'top_right_navigation.php' ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><a href="admin_seminars.php" class="linked-navigation">Seminar List</a> /
            <?php echo $seminar_name ?></h1>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title mb-0">Edit Seminar</h5>
                </div>
                <div class="card-body">
                  <form method="post" autocomplete="off">
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Seminar Name</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="seminar_name" name="seminar_name" value="<?php echo $seminar_name?>" placeholder="Enter seminar Name">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Description</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="description" name="description" value="<?php echo $description ?>" placeholder="Enter Description ">
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
                        <a href="admin_seminars.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
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