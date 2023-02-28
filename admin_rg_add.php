<?php
include 'system_checker.php';
  // echo "<script>console.log('High this is me " . $school_name_public. "');</script>";

if (isset($_POST['submit'])) {
  $name           = $_POST['name'];
  $afpsn          = $_POST['afpsn'];
  $birth_date     = $_POST['birth_date'];
  $home_address   = $_POST['home_address'];
  
  
  if($isSchool) {
    $school_address = $school_name_public;
  } else {
    $school_address = $_POST['school_graduated'];
  }

  $date_graduated = $_POST['date_graduated'];
  $sex            = $_POST['sex'];
  $status         = 'active';
  $date           = date("Y-m-d");
  $time           = date("h:i:s");


  // Computation of Age
  $bday = new DateTime($birth_date);
  $today = new DateTime(date('m.d.y'));
  $diff = $today->diff($bday);
  // echo "<script>console.log('" . $diff->y. "');</script>";
  $age                  = $diff->y;

  $duplicate = mysqli_query($conn, "SELECT * FROM rotc_graduates WHERE afpsn = '$afpsn'");
  if (mysqli_num_rows($duplicate) > 0) {
    echo
    "<script> alert('AFPSN Has Already Taken'); </script>";
  } else {
    // Checking if password confirmation match
    $query = "INSERT INTO rotc_graduates VALUES('','$name','$afpsn','$birth_date','$home_address','$date_graduated','$age','$sex','$school_address','$status','$date','$time','$date','$time')";
    mysqli_query($conn, $query);

    echo '<script type="text/javascript"> alert("' . $name . ' Added!.")</script>';
    header('Refresh: 0; url=admin_rg.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
  <div class="wrapper">
    <?php
  $nav_active = 'rotc';
    include 'side_navigation.php'
    ?>

    <div class="main">
      <?php include 'top_right_navigation.php' ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><a href="admin_rg.php" class="linked-navigation">Reserve List</a></h1>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <form method="post">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required autofocus>
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
                      <label for="exampleInputEmail1">Home Address</label>
                      <input type="text" class="form-control" id="home_address" name="home_address" placeholder="Enter Home Address">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Date Graduated (A.Y.)</label>
                      <select class="form-control" id="date_graduated"name="date_graduated">
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
                      </select>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Sex</label>
                      <select class="form-control" id="sex"name="sex">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                    <br>
                    <?php if($isStaff) {
                    ?> 
                    <div class="form-group">
                      <label for="exampleInputEmail1">School Graduated</label>
                        <select class="form-control" id="school_graduated" name="school_graduated">
                            <?php
                            $result = mysqli_query($conn, "select acronym from schools where status='active'") or die("Query School List is inncorrect........");
                            while (list($acronym) = mysqli_fetch_array($result)) {
                              echo "<option value='$acronym'>$acronym</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <br>

                    <?php
                    }
                    ?>
                    <div class="row">
                      <div class="col-6">
                        <a href="admin_rg.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
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