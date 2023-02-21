
<?php
include 'system_checker.php';
// un_public is username of the user who logged in

if (isset($_POST['submit'])) {
  $reservist_id   = $_POST['reservist_id'];
  $commander_id   = $_POST['commander_id'];
  $subject        = $_POST['subject'];
  $text           = $_POST['text'];
  $date_appoint   = $_POST['date_appoint'];
  $time_appoint   = $_POST['time_appoint'];
  $status         = 'pending';
  $date           = date("Y-m-d");
  $time           = date("h:i:s");

  $time_formatted   = date("g:i a ", strtotime($time_appoint));

  $duplicate = mysqli_query($conn, "SELECT * FROM appointments WHERE date_appoint = '$date_appoint' OR  time_appoint = '$time_formatted' ");
  if (mysqli_num_rows($duplicate) > 0) {
    echo
    "<script> alert('Date and Time Has Already Taken'); </script>";
  } else {
    // Checking if password confirmation match
    $query = "INSERT INTO appointments VALUES('','$reservist_id','$commander_id','$subject','$text','$status','$date_appoint','$time_appoint','$date','$time','$date','$time')";
    mysqli_query($conn, $query);
    
    echo '<script type="text/javascript"> alert("' . $subject . ' Added!.")</script>';
    header('Refresh: 0; url=admin_appointments.php');
  }
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
          <h1 class="h3 mb-3"><a href="admin_appointments.php" class="linked-navigation">Appointments List</a></h1>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <form method="post">
                      <input type="hidden" class="form-control" id="reservist_id" name="reservist_id" value="<?php echo $id?>">
                    <div class="form-group">
                      <label for="exampleInputEmail1">To:</label>
                        <select class="form-control" id="commander_id" name="commander_id">
                                <!-- <option value="none">None</option> -->
                            <?php
                            $result = mysqli_query($conn, "select id, firstname, lastname, rank from army_users where type='commander' && user_status='active'") or die("Query School List is inncorrect........");
                            while (list($commander_id, $firstname, $lastname, $rank ) = mysqli_fetch_array($result)) {
                              echo "<option value='$commander_id'>$rank $firstname $lastname</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Subject</label>
                      <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" required>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <input type="text" class="form-control" id="text" name="text" placeholder="Enter Description">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Date Appointment</label>
                      <input type="date" class="form-control" id="date_appoint" name="date_appoint" placeholder="Enter Date Appointment" required>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Time Appointment</label>
                      <input type="time" class="form-control" id="time_appoint" name="time_appoint" min="08:30" max="15:00" placeholder="Enter Time Appointment" required>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-6">
                        <a href="admin_appointments.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
                      </div>
                      <div class="col-6">
                        <button type="submit" class="btn btn-outline-success" name="submit" style="float: right">Insert</button>
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