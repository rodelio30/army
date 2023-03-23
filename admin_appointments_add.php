
<?php
include 'system_checker.php';
if($isSchool || $isCommander || $isReservist){
  header("Location: index.php");
}
// un_public is username of the user who logged in

if (isset($_POST['submit'])) {
  $name           = $_POST['name'];
  $email          = $_POST['email'];
  $cnumber        = $_POST['cnumber'];
  $purpose        = $_POST['purpose'];
  $text           = $_POST['message'];
  $date_appoint   = $_POST['app_date'];
  $time_appoint   = $_POST['app_time'];
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
    $query = "INSERT INTO appointments VALUES('','$name','$email','$cnumber','$purpose','$text','$status','$date_appoint','$time_appoint','$date','$time','$date','$time')";
    mysqli_query($conn, $query);
    
    echo '<script type="text/javascript"> alert("' . $purpose . ' Added!.")</script>';
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
                <div class="card-header" style="margin-bottom: -2rem;">
                  <h5 class="card-title">Add new Appointments</h5>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="row mb-2">
                        <div class="col-md-6 form-group">
                        <label>Appointment Date</label>
                        <input type="date" name="app_date" class="form-control" id="app_date" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6 form-group">
                        <label>Appointment Time</label>
                        <input type="time" class="form-control" name="app_time" id="app_time" min="08:00" max="17:00" placeholder="Your Email" required>
                        <small>Office hours are 8am to 5pm</small>
                        </div>
                    </div>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Complete Name" required>
                        <br>
                    <div class="row">
                        <div class="col-md-6 form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                        <!-- <input type="text" name="cnumber" class="form-control" id="cnumber" placeholder="Your Contact Number" required> -->
                        <input type="tel" id="cnumber" class="form-control"  name="cnumber" placeholder="(+63)" pattern="[0-9]{10}" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="purpose" id="purpose" placeholder="Purpose of Appointment" required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
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
    <script>
    function getISODate(){
    var d = new Date();
    return d.getFullYear() + '-' + 
            ('0' + (d.getMonth()+1)).slice(-2) + '-' +
            ('0' + d.getDate()).slice(-2);
    }

    window.onload = function() {
        document.getElementById('app_date').setAttribute('min',getISODate());
    }
    </script>

</body>

</html>