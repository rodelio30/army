
<?php
include 'system_checker.php';

$appointments_id = $_GET['ID'];

$result       = mysqli_query($conn, "SELECT * FROM appointments WHERE ap_id='$appointments_id'");
while ($res   = mysqli_fetch_array($result)) {
  $ap_id           = $res['ap_id'];
  $reservist_id    = $res['reservist_id'];
  $commander_id    = $res['commander_id'];
  $subject         = $res['subject'];
  $text            = $res['text'];
  $date_appoint    = $res['date_appoint'];
  $time_appoint    = $res['time_appoint'];
  $status          = $res['status'];
  $date_created    = $res['date_created'];
  $time_created    = $res['time_created'];
  $date_modified   = $res['date_modified'];
  $time_modified   = $res['time_modified'];
}

  $time_formatted   = date("G:i A ", strtotime($time_appoint));

if (isset($_POST['update'])) {
  $commander_id   = $_POST['commander_id'];
  $subject        = $_POST['subject'];
  $text           = $_POST['text'];
  $date_appoint   = $_POST['date_appoint'];
  $time_appoint   = $_POST['time_appoint'];
  $status         = $_POST['status'];
  $date_modified  = date("Y-m-d");
  $time_modified  = date("h:i:s");

  mysqli_query($conn, "update appointments set commander_id = '$commander_id', subject = '$subject', text= '$text', date_appoint = '$date_appoint', time_appoint = '$time_appoint', status = '$status', date_modified = '$date_modified', time_modified = '$time_modified' where ap_id = '$ap_id'") or die("Query 4 is incorrect....");

  echo '<script type="text/javascript"> alert("' . $subject . ' updated!.")</script>';
  header('Refresh: 0; url=admin_appointments.php');
  // End of Else in Inactive if
}

$sel_pending  = "";
$sel_active   = "";
$sel_inactive = "";

if ($status == "active") {
  $sel_active  = "selected";
} else if ($status == "pending") {
  $sel_pending = "selected";
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
    $nav_active = 'appoint';
    include 'side_navigation.php'
    ?>

    <div class="main">
      <?php include 'top_right_navigation.php' ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><a href="admin_appointments.php" class="linked-navigation">Appointment List</a> /
            <?php echo $subject ?></h1>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <form method="post" autocomplete="off">
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>To: </strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <select class="form-control" id="commander_id" name="commander_id">
                            <?php
                            $result = mysqli_query($conn, "select id, firstname, lastname, rank from army_users where type='commander' && user_status='active'") or die("Query School List is inncorrect........");
                            while (list($comm_id, $firstname, $lastname, $rank ) = mysqli_fetch_array($result)) {
                              if($commander_id == $comm_id){
                                echo "<option value='$comm_id' selected>$rank $firstname $lastname</option>";
                              } else {
                                echo "<option value='$comm_id'>$rank $firstname $lastname</option>";
                              }
                            }
                            ?>
                        </select>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Subject</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="subject" name="subject"  value="<?php echo $subject ?> "placeholder="Enter Subject" required>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Description</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="text" name="text" value="<?php echo $text?>" placeholder="Enter Description">
                      </div>
                    </div>

                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Date Appoinment</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="date" class="form-control" id="date_appoint" name="date_appoint" value="<?php echo $date_appoint ?>" placeholder="Enter Date">
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Time Appoinment</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="time_appoint" name="time_appoint" value="<?php echo $time_formatted ?>" placeholder="Enter Time">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Status</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <select class="form-control" id="status" value="<?php echo $status ?>" name="status">
                          <option value="pending" <?php echo $sel_pending?>>Pending</option>
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
                        <a href="admin_appointments.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
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