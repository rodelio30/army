<?php
include 'system_checker.php';
if($isSchool || $isCommander){
  header("Location: index.php");
}

$trainings_id = $_GET['ID'];

if (isset($_POST['update'])) {
  $training_name = $_POST['training_name'];
  $description   = $_POST['description'];
  $venue         = $_POST['venue'];
  $start_date    = $_POST['start_date'];
  $end_date      = $_POST['end_date'];
  $status        = $_POST['status'];
  $date_modified = date("Y-m-d");
  $time_modified = date("h:i:s");

  mysqli_query($conn, "update trainings set training_name = '$training_name', description = '$description', venue = '$venue', start_date = '$start_date', end_date = '$end_date', status = '$status', date_modified = '$date_modified', time_modified = '$time_modified' where training_id = '$trainings_id'") or die("Query 4 is incorrect....");

  echo '<script type="text/javascript"> alert("' . $training_name . ' updated!.")</script>';
  header('Refresh: 0; url=admin_trainings.php');
  // End of Else in Inactive if
}

$result       = mysqli_query($conn, "SELECT * FROM trainings WHERE training_id='$trainings_id'");
while ($res   = mysqli_fetch_array($result)) {
  $trainings_id  = $res['training_id'];
  $training_name = $res['training_name'];
  $description   = $res['description'];
  $venue         = $res['venue'];
  $start_date    = $res['start_date'];
  $end_date      = $res['end_date'];
  $status        = $res['status'];
  $date_created  = $res['date_created'];
  $time_created  = $res['time_created'];
  $date_modified = $res['date_modified'];
  $time_modified = $res['time_modified'];
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
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
  <div class="wrapper">
    <?php
    $nav_active = 'training';
    include 'side_navigation.php'
    ?>

    <div class="main">
      <?php include 'top_right_navigation.php' ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3" id="action-print"><a href="admin_trainings.php" class="linked-navigation">Training List</a> /
            <?php echo $training_name ?></h1>

          <div class="row">
            <div class="col-12">
              <div class="card" id="action-print">
                <div class="card-header">
                  <h5 class="card-title mb-0">Edit Training</h5>
                </div>
                <div class="card-body">
                  <form method="post" autocomplete="off">
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Training Title</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="training_name" name="training_name" value="<?php echo $training_name?>" placeholder="Enter training Name">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Venue</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="venue" name="venue" value="<?php echo $venue ?>" placeholder="Enter venue">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Start Date</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="date" class="form-control"  id="start_date" name="start_date" value="<?php echo $start_date?>">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>End Date</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo $end_date ?>" >
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
                        <a href="admin_trainings.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
                      </div>
                      <div class="col-6">
                        <button type="submit" name="update" class="btn btn-md btn-outline-success" style="float:right">Update</button>
                      </div>
                    </div>
                  </form>
                  <hr>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                <?php include 'print_header.php'?>
                <h1 class="h3 mb-3"> <strong>
                <h4>Attendance for: <?php echo $training_name ?> <button onclick="window.print();" class="btn btn-outline-primary" id="print-btn"><span data-feather="printer"></span> Print</button>
                  </h4>
                </strong> 
                </h1>
                <?php include 'training_attendance.php'?>
                <?php include 'print_footer.php'?>
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

    <script>
      function getISODate(){
      var d = new Date();
      return d.getFullYear() + '-' + 
              ('0' + (d.getMonth()+1)).slice(-2) + '-' +
              ('0' + d.getDate()).slice(-2);
      }

      window.onload = function() {
          document.getElementById('end_date').setAttribute('min',getISODate());
      }
    </script>
    <script type="text/javascript">
      $(function(){
          var dtToday = new Date();
      
          var month = dtToday.getMonth() + 1;
          var day = dtToday.getDate();
          var year = dtToday.getFullYear();
          if(month < 10)
              month = '0' + month.toString();
          if(day < 10)
          day = '0' + day.toString();
          var maxDate = year + '-' + month + '-' + day;
          $('#start_date').attr('min', maxDate);
      });
</script>
</body>

</html>