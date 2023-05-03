<?php
include 'system_checker.php';
// if($isSchool || $isCommander || $isReservist){
if(!empty($_SESSION["army_id"])){
  header("Location: index.php");
}

$appointments_id = $_GET['ID'];

$result       = mysqli_query($conn, "SELECT * FROM appointments WHERE ap_id='$appointments_id'");
while ($res   = mysqli_fetch_array($result)) {
  $ap_id         = $res['ap_id'];
  $name          = $res['name'];
  $email         = $res['email'];
  $cnumber       = $res['number'];
  $purpose       = $res['purpose'];
  $text          = $res['text'];
  $date_appoint  = $res['date_appoint'];
  $time_appoint  = $res['time_appoint'];
  $status        = $res['status'];
  $date_created  = $res['date_created'];
  $time_created  = $res['time_created'];
  $date_modified = $res['date_modified'];
  $time_modified = $res['time_modified'];
}

  $time_formatted   = date("G:i A ", strtotime($time_appoint));
  $time_c_formatted   = date("G:i A ", strtotime($time_created));
  $time_m_formatted   = date("G:i A ", strtotime($time_modified));

if (isset($_POST['update'])) {
  $status         = $_POST['status'];
  $date_modified  = date("Y-m-d");
  $time_modified  = date("h:i:s");

  mysqli_query($conn, "update appointments set status = '$status', date_modified = '$date_modified', time_modified = '$time_modified' where ap_id = '$ap_id'") or die("Query 4 is incorrect....");

  echo '<script type="text/javascript"> alert("' . $purpose . ' updated!.")</script>';
  header('Refresh: 0; url=admin_appointments.php');
  // End of Else in Inactive if
}

$sel_pending  = "";
$sel_approved = "";
$sel_declined = "";

if ($status == "approved") {
  $sel_approved = "selected";
} else if ($status == "pending") {
  $sel_pending = "selected";
} else if ($status == "declined") {
  $sel_declined = "selected";
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
            <?php echo $purpose ?></h1>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <form method="post" autocomplete="off">
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Name</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <h3><?php echo $name ?></h3>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Purpose</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <h5><?php echo $purpose?></h5>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Message </strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <h5><?php echo $text?></h5>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Cellphone Number</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <h5>(+63) <?php echo $cnumber?></h5>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Email</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <h5><?php echo $email?></h5>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Date Appoinment</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <h5><?php echo $date_appoint ?></h5>
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Time Appoinment</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <h5><?php echo $time_formatted?></h5>
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
                          <option value="approved" <?php echo $sel_approved?>>Approved</option>
                          <option value="declined" <?php echo $sel_declined?>>Declined</option>
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
                    <br>
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