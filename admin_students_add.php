
<?php
include 'system_checker.php';
// un_public is username of the user who logged in

if (isset($_POST['submit'])) {
  $firstname      = $_POST['firstname'];
  $lastname       = $_POST['lastname'];
  $afpsn          = $_POST['afpsn'];
  $birth_date     = $_POST['birth_date'];
  $school_address = $_POST['school_address'];
  $course         = $_POST['course'];
  $grade          = $_POST['grade'];
  $semester       = $_POST['semester'];
  $academic_year  = $_POST['academic_year'];
  $status         = 'inactive';
  $date           = date("Y-m-d");
  $time           = date("h:i:s");

  $duplicate = mysqli_query($conn, "SELECT * FROM students WHERE afpsn = '$afpsn' OR  firstname = '$firstname' OR lastname = '$lastname'");
  if (mysqli_num_rows($duplicate) > 0) {
    echo
    "<script> alert('Firstname or lastname and or AFPSN Has Already Taken'); </script>";
  } else {
    // Checking if password confirmation match
    $query = "INSERT INTO students VALUES('','$firstname','$lastname','$school_address','$birth_date','$grade','$afpsn','$course','$semester','$academic_year','$date','$time','$date','$time','$status')";
    mysqli_query($conn, $query);

    echo '<script type="text/javascript"> alert("' . $firstname . ' Added!.")</script>';
    header('Refresh: 0; url=admin_students.php');
  }
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
          <h1 class="h3 mb-3"><a href="admin_students.php" class="linked-navigation">Student List</a></h1>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <form method="post">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Firstname</label>
                      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter Firstname" required autofocus>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Last Name</label>
                      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Lastname" required>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">AFPSN</label>
                      <input type="text" class="form-control" id="afpsn" name="afpsn" placeholder="Enter AFPSN">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Date of Birth</label>
                      <input type="date" class="form-control" id="birth_date" name="birth_date" placeholder="Enter Birthdate" required>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Address</label>
                      <input type="text" class="form-control" id="school_address" name="school_address" placeholder="Enter Address">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Course</label>
                        <select class="form-control" id="course" name="course">
                                <option value="none">None</option>
                            <?php
                            $result = mysqli_query($conn, "select course_name from courses where status='active'") or die("Query School List is inncorrect........");
                            while (list($course_name) = mysqli_fetch_array($result)) {
                              echo "<option value='$course_name'>$course_name</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Grade</label>
                      <input type="number" class="form-control" id="grade" name="grade" placeholder="Enter Grade" required>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Semester</label>
                      <input type="text" class="form-control" id="semester" name="semester" placeholder="Enter Semester" required>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Academic Year</label>
                      <input type="text" class="form-control" id="academic_year" name="academic_year" placeholder="Enter Academic Year" required>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-6">
                        <a href="admin_students.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
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