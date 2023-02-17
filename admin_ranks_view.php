<?php
include 'system_checker.php';

$ranks_id = $_GET['ID'];

$result       = mysqli_query($conn, "SELECT * FROM ranks WHERE rank_id='$ranks_id'");
while ($res   = mysqli_fetch_array($result)) {
  $ranks_id       = $res['rank_id'];
  $my_ranked         = $res['ranked'];
  $rank_name      = $res['rank_name'];
  $status         = $res['status'];
  $date_created   = $res['date_created'];
  $time_created   = $res['time_created'];
  $date_modified  = $res['date_modified'];
  $time_modified  = $res['time_modified'];
}

if (isset($_POST['update'])) {
  $ranked         = $_POST['ranked'];
  $rank_name      = $_POST['rank_name'];
  $status         = $_POST['status'];
  $date_modified  = date("Y-m-d");
  $time_modified  = date("h:i:s");

  $duplicate = mysqli_query($conn, "SELECT * FROM ranks WHERE ranked = '$ranked' && ranked != '$my_ranked'");
  if (mysqli_num_rows($duplicate) > 0) {
    echo
    "<script> alert('Rank Classification has already taken'); </script>";
  } else {
  mysqli_query($conn, "update ranks set ranked = '$ranked', rank_name = '$rank_name', status = '$status', date_modified = '$date_modified', time_modified = '$time_modified' where rank_id = '$ranks_id'") or die("Query 4 is incorrect....");

  echo '<script type="text/javascript"> alert("' . $rank_name . ' updated!.")</script>';
  header('Refresh: 0; url=admin_ranks.php');
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
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
  <div class="wrapper">
    <?php
    $nav_active = 'rank';
    include 'side_navigation.php'
    ?>

    <div class="main">
      <?php include 'top_right_navigation.php' ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><a href="admin_ranks.php" class="linked-navigation">Rank List</a> /
            <?php echo $rank_name ?></h1>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title mb-0">Edit Rank</h5>
                </div>
                <div class="card-body">
                  <form method="post" autocomplete="off">
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Ranked</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="number" class="form-control" id="ranked" name="ranked" value="<?php echo $my_ranked ?>" placeholder="Enter Ranked">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Rank Name</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="rank_name" name="rank_name" value="<?php echo $rank_name ?>" placeholder="Enter Rank Name">
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
                        <a href="admin_ranks.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
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