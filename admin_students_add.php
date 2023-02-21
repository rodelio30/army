
<?php
include 'system_checker.php';
// un_public is username of the user who logged in

if (isset($_POST['submit'])) {
  $id_no          = $_POST['id_no'];
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

  $duplicate = mysqli_query($conn, "SELECT * FROM students WHERE id_no = '$id_no' OR afpsn = '$afpsn' OR  firstname = '$firstname' OR lastname = '$lastname'");
  if (mysqli_num_rows($duplicate) > 0) {
    echo
    "<script> alert('Firstname or lastname and or AFPSN or ID NumberHas Already Taken'); </script>";
  } else {
    // Checking if password confirmation match
    $query = "INSERT INTO students VALUES('','$id_no','$firstname','$lastname','$school_address','$birth_date','$grade','$afpsn','$course','$semester','$academic_year','$date','$time','$date','$time','$status')";
    mysqli_query($conn, $query);
    
    mysqli_query($conn, "update courses set student_count = student_count + 1 where course_name = '$course'") or die("Query 4 is incorrect....");

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
                      <label for="exampleInputEmail1">Student ID Number</label>
                      <input type="text" class="form-control" id="id_no" name="id_no" placeholder="Enter Student ID Number" required autofocus>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Firstname</label>
                      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter Firstname" required >
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
                      <input type="text" class="form-control" id="grade" name="grade" placeholder="Enter Grade" required>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Semester</label>
                      <select class="form-control" id="semester" value="<?php echo $semester ?>" name="semester">
                        <option value="First">First Semester</option>
                        <option value="Second">Second Semester</option>
                      </select>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Academic Year</label>
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