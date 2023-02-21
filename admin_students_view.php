
<?php
include 'system_checker.php';

$students_id = $_GET['ID'];

$result       = mysqli_query($conn, "SELECT * FROM students WHERE student_id='$students_id'");
while ($res   = mysqli_fetch_array($result)) {
  $students_id     = $res['student_id'];
  $id_no           = $res['id_no'];
  $firstname       = $res['firstname'];
  $lastname        = $res['lastname'];
  $address         = $res['address'];
  $birth_date      = $res['birth_date'];
  $grade           = $res['grade'];
  $afpsn           = $res['afpsn'];
  $course          = $res['course'];
  $semester        = $res['semester'];
  $academic_year   = $res['academic_year'];
  $status          = $res['status'];
  $date_created    = $res['date_created'];
  $time_created    = $res['time_created'];
  $date_modified   = $res['date_modified'];
  $time_modified   = $res['time_modified'];
}

if (isset($_POST['update'])) {
  $id_no          = $_POST['id_no'];
  $firstname      = $_POST['firstname'];
  $lastname       = $_POST['lastname'];
  $birth_date     = $_POST['birth_date'];
  $course_update  = $_POST['course'];
  $grade          = $_POST['grade'];
  $afpsn          = $_POST['afpsn'];
  $address        = $_POST['address'];
  $semester       = $_POST['semester'];
  $academic_year  = $_POST['academic_year'];
  $status         = $_POST['status'];
  $date_modified  = date("Y-m-d");
  $time_modified  = date("h:i:s");

  mysqli_query($conn, "update students set id_no = '$id_no', firstname = '$firstname', lastname = '$lastname', birth_date = '$birth_date', course = '$course_update', grade = '$grade', afpsn = '$afpsn', address = '$address', semester = '$semester', academic_year = '$academic_year', status = '$status', date_modified = '$date_modified', time_modified = '$time_modified' where student_id = '$students_id'") or die("Query 4 is incorrect....");


  if($course != $course_update) {
    mysqli_query($conn, "update courses set student_count = student_count + 1 where course_name = '$course_update'") or die("Query 4 is incorrect....");
    mysqli_query($conn, "update courses set student_count = student_count - 1 where course_name = '$course'") or die("Query 4 is incorrect....");
  } 

  echo '<script type="text/javascript"> alert("' . $firstname . ' updated!.")</script>';
  header('Refresh: 0; url=admin_students.php');
  // End of Else in Inactive if
}

$sel_active   = "";
$sel_inactive = "";

$sel_first    = "";
$sel_second   = "";


$sel_2014   = "";
$sel_2015   = "";
$sel_2016   = "";
$sel_2017   = "";
$sel_2018   = "";
$sel_2019   = "";
$sel_2020   = "";
$sel_2021   = "";
$sel_2022   = "";
$sel_2023   = "";

if ($status == "active") {
  $sel_active  = "selected";
} else if ($status == "inactive") {
  $sel_inactive = "selected";
}

if ($semester == "First") {
  $sel_first = "selected";
} else if ($semester == "Second") {
  $sel_second = "selected";
}

if ($academic_year == "2014-2015") {
  $sel_2014 = "selected";
} else if ($academic_year == "2015-2016") {
  $sel_2015 = "selected";
} else if ($academic_year == "2016-2017") {
  $sel_2016 = "selected";
} else if ($academic_year == "2017-2018") {
  $sel_2017 = "selected";
} else if ($academic_year == "2018-2019") {
  $sel_2018 = "selected";
} else if ($academic_year == "2019-2020") {
  $sel_2019 = "selected";
} else if ($academic_year == "2020-2021") {
  $sel_2020 = "selected";
} else if ($academic_year == "2021-2022") {
  $sel_2021 = "selected";
} else if ($academic_year == "2022-2023") {
  $sel_2022 = "selected";
} else if ($academic_year == "2023-2024") {
  $sel_2023 = "selected";
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
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Student ID Number</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="id_no" name="id_no" value="<?php echo $id_no?>" placeholder="Enter Student ID Number">
                      </div>
                    </div>
                    <br>
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
                        <select class="form-control" id="course" name="course">
                                <option value="none">None</option>
                            <?php
                            $result = mysqli_query($conn, "select course_name from courses where status='active'") or die("Query School List is inncorrect........");
                            while (list($course_name) = mysqli_fetch_array($result)) {
                              if($course_name == $course) {
                              echo "<option value='$course_name' selected >$course_name</option>";
                              } else {
                              echo "<option value='$course_name'>$course_name</option>";

                              }
                            }
                            ?>
                        </select>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Grade</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="grade" name="grade" value="<?php echo $grade ?>" placeholder="Enter Grade">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Semester</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                      <select class="form-control" id="semester" value="<?php echo $semester ?>" name="semester">
                        <option value="First" <?php echo $sel_first ?>>First Semester</option>
                        <option value="Second" <?php echo $sel_second ?>>Second Semester</option>
                      </select>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Academic Year</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <select class="form-control" id="academic_year" value="<?php echo $academic_year ?>" name="academic_year">
                          <option value="2014-2015">2014-2015</option>
                          <option value="2015-2016">2015-2016</option>
                          <option value="2016-2017">2016-2017</option>
                          <option value="2017-2018">2017-2018</option>
                          <option value="2018-2019">2018-2019</option>
                          <option value="2019-2020">2019-2020</option>
                          <option value="2020-2021">2020-2021</option>
                          <option value="2021-2022">2021-2022</option>
                          <option value="2022-2023">2022-2023</option>
                          <option value="2023-2024">2023-2024</option>
                          <!-- <option value="2024-2025">2020-2021</option>
                          <option value="2025-2026">2020-2021</option>
                          <option value="2026-2027">2020-2021</option>
                          <option value="2027-2028">2020-2021</option>
                          <option value="2028-2029">2020-2021</option>
                          <option value="2029-2030">2020-2021</option> -->
                        </select>
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