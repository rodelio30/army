
<?php
include 'system_checker.php';

$students_id = $_GET['ID'];

if (isset($_POST['update'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $birth_date = $_POST['birth_date'];
  $course = $_POST['course'];
  $afpsn = $_POST['afpsn'];
  $address        = $_POST['address'];
  $status         = $_POST['status'];
  $date_modified  = date("Y-m-d");
  $time_modified  = date("h:i:s");

  mysqli_query($conn, "update students set firstname = '$firstname', lastname = '$lastname', birth_date = '$birth_date', course = '$course', afpsn = '$afpsn', address = '$address', status = '$status', date_modified = '$date_modified', time_modified = '$time_modified' where student_id = '$students_id'") or die("Query 4 is incorrect....");

  echo '<script type="text/javascript"> alert("' . $firstname . ' updated!.")</script>';
  header('Refresh: 0; url=admin_students.php');
  // End of Else in Inactive if
}

$result       = mysqli_query($conn, "SELECT * FROM students WHERE student_id='$students_id'");
while ($res   = mysqli_fetch_array($result)) {
  $students_id     = $res['student_id'];
  $firstname       = $res['firstname'];
  $lastname        = $res['lastname'];
  $address         = $res['address'];
  $birth_date      = $res['birth_date'];
  $grade           = $res['grade'];
  $afpsn           = $res['afpsn'];
  $course          = $res['course'];
  $status          = $res['status'];
  $date_created    = $res['date_created'];
  $time_created    = $res['time_created'];
  $date_modified   = $res['date_modified'];
  $time_modified   = $res['time_modified'];
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
    $nav_active = 'student';
    include 'side_navigation.php'
    ?>

    <div class="main">
      <?php include 'top_right_navigation.php' ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><a href="admin_students.php" class="linked-navigation">Student List</a> /
            <?php echo $firstname ?></h1>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title mb-0">Edit Student</h5>
                </div>
                <div class="card-body">
                  <form method="post" autocomplete="off">
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>First Name</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname?>" placeholder="Enter First Name">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Last Name</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname ?>" placeholder="Enter Last Name">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Student Address</strong>
                        </h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $address ?>" placeholder="Enter Student Address">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>AFPSN</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="afpsn" name="afpsn" value="<?php echo $afpsn ?>" placeholder="Enter AFPSN ">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Date of Birth</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?php echo $birth_date?>" placeholder="Enter Birthdate">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Course </strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="course" name="course" value="<?php echo $course ?>" placeholder="Enter Course">
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
                        <a href="admin_students.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
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