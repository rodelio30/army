<?php
include 'system_checker.php';
// un_public is username of the user who logged in

if (isset($_POST['submit_training'])) {
  $training_id  = $_POST['training_id'];
  $date         = date("Y-m-d");
  $time         = date("h:i:s");
  $status       = 'Pending';

  $duplicate = mysqli_query($conn, "SELECT * FROM training_attendance WHERE user_id = '$id' && training_id = '$training_id'");
  if (mysqli_num_rows($duplicate) > 0) {
    echo "<script> alert('This User Has Already Attend to this Training'); </script>";
  } else {
    // Checking if password confirmation match
    $query = "INSERT INTO training_attendance VALUES('','$training_id','$id','$date','$time','$status')";
    mysqli_query($conn, $query);

    echo '<script type="text/javascript"> alert("' . $un_public. ' Attended!.")</script>';
    header('Refresh: 0; url=admin_ts_attended.php');
  }
}

if (isset($_POST['submit_seminar'])) {
  $seminar_id  = $_POST['seminar_id'];
  $date         = date("Y-m-d");
  $time         = date("h:i:s");
  $status       = 'pending';

  $duplicate = mysqli_query($conn, "SELECT * FROM seminar_attendance WHERE user_id = '$id' && seminar_id = '$seminar_id'");
  if (mysqli_num_rows($duplicate) > 0) {
    echo
    "<script> alert('This User Has Already Attend to this seminar'); </script>";
  } else {
    // Checking if password confirmation match
    $query = "INSERT INTO seminar_attendance VALUES('','$seminar_id','$id','$date','$time','$status')";
    mysqli_query($conn, $query);

    echo '<script type="text/javascript"> alert("' . $un_public. ' Attended!.")</script>';
    header('Refresh: 0; url=admin_ts_attended.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
  <div class="wrapper">
    <?php
    $nav_active = 'ts_available';
    include 'side_navigation.php'
    ?>

    <div class="main">
      <?php include 'top_right_navigation.php' ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><a href="admin_ts_attended.php" class="linked-navigation">Training and Seminar Attended</a></h1>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <table id="example" class="table table-hover my-0" style="width:100%">
                          <thead>
                              <tr>
                                  <th>Available Training Name</th>
                                  <th>venue</th>
                                  <th id='action-print'><span class='float-end'>Action</span></th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                                $result = mysqli_query($conn, "select training_id, training_name, venue from trainings where status='active'") or die("Query Training list inncorrect........");
                              while (list($training_id, $training_name, $venue) = mysqli_fetch_array($result)) {
                              echo "
                                <form method='post'>
                                <tr>	
                                    <td>$training_name</td>
                                    <td>$venue</td>
                                    <input type='hidden' name='training_id' value='$training_id'>
                                    <td>
                                      <button type='submit' class='btn btn-outline-success' name='submit_training' style='float: right'>Attend</button>
                                    </td>
                                </tr>
                                </form>
                              "; 
                              } 
                                $result_seminar = mysqli_query($conn, "select seminar_id, seminar_name, venue from seminars where status='active'") or die("Query seminar list inncorrect........");
                              while (list($seminar_id, $seminar_name, $venue) = mysqli_fetch_array($result_seminar)) {
                              echo "
                                <form method='post'>
                                <tr>	
                                    <td>$seminar_name</td>
                                    <td>$venue</td>
                                    <input type='hidden' name='seminar_id' value='$seminar_id'>
                                    <td>
                                      <button type='submit' class='btn btn-outline-success' name='submit_seminar' style='float: right'>Attend</button>
                                    </td>
                                </tr>
                                </form>
                              "; 
                              } 
                              ?>
                          </tbody>
                          </table>
                      
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-6">
                        <a href="admin_ts_attended.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
                      </div>
                      <div class="col-6">
                        <!-- <button type="submit" class="btn btn-outline-success" name="submit" style="float: right">Attend</button> -->
                      </div>
                    </div>
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

    <!-- This line below is the jquery for the datatables -->
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/jquery.dataTable.min.js"></script>
</body>

</html>