<?php
include 'system_checker.php';
if($isReservist){
  header("Location: index.php");
}
  // echo "<script>console.log('High this is me " . $school_name_public. "');</script>";

if (isset($_POST['submit'])) {
  $firstname     = $_POST['firstname'];
  $m_i           = $_POST['m_i'];
  $lastname      = $_POST['lastname'];
  $extname      = $_POST['extname'];
  $afpsn         = $_POST['afpsn'];
  $rank          = $_POST['rank'];
  $birth_date    = $_POST['birth_date'];
  $home_address  = $_POST['home_address'];
  
  
  if($isSchool) {
    $school_id = $public_school_id;
  } else {
    $school_id = $_POST['school_id'];
  }

  $date_graduated = $_POST['date_graduated'];
  $sex            = $_POST['sex'];
  $status         = 'Standby';
  $user_status    = 'inactive';
  $date           = date("Y-m-d");
  $time           = date("h:i:s");


  // Computation of Age
  $bday = new DateTime($birth_date);
  $today = new DateTime(date('m.d.y'));
  $diff = $today->diff($bday);
  // echo "<script>console.log('" . $diff->y. "');</script>";
  $age                  = $diff->y;

  $duplicate = mysqli_query($conn, "SELECT * FROM reservists WHERE afpsn = '$afpsn'");
  if (mysqli_num_rows($duplicate) > 0) {
    echo
    "<script> alert('AFPSN Has Already Taken'); </script>";
  } else {
    // Checking if password confirmation match
    $query = "INSERT INTO reservists VALUES('','','$firstname','$m_i','$lastname','$extname','$afpsn','$rank','','$birth_date','$home_address','$date_graduated','$age','$sex','$school_id','$status','$user_status','$date','$time','$date','$time')";
    mysqli_query($conn, $query);

    echo '<script type="text/javascript"> alert("' . $firstname . ' '. $lastname . ' Added!.")</script>';
    header('Refresh: 0; url=admin_rg.php');
  }
}

// this line below is the maximum year for the users not below 15 years
$date = date("Y-m-d"); // date you want to upgade

$date_max = date("Y-m-d", strtotime($date ." -15 year") );
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
          <h1 class="h3 mb-3"><a href="admin_rg.php" class="linked-navigation">Reservist List</a></h1>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title mb-0">Add New Reservist</h5>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-3">
                          <label for="exampleInputEmail1">First Name</label>
                          <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name" required autofocus>
                        </div>
                        <div class="col-3">
                          <label for="exampleInputEmail1">Middle Initial</label>
                          <input type="text" class="form-control" id="m_i" name="m_i" placeholder="Enter Middle Initial">
                        </div>
                        <div class="col-3">
                          <label for="exampleInputEmail1">Last Name</label>
                          <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name" required>
                        </div>
                        <div class="col-3">
                          <label for="exampleInputEmail1">Extension Name</label>
                          <input type="text" class="form-control" id="extname" name="extname" placeholder="Enter Extension Name">
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">AFPSN</label>
                      <input type="text" class="form-control" id="afpsn" name="afpsn" placeholder="Enter AFPSN">
                    </div>
                    <br>
										<div class="form-group">
											<label class="form-label">Rank Classification </label>
											<select class="form-control" id="rank" name="rank">
													<option value="none">None</option>
												<?php
												$result = mysqli_query($conn, "select rank_name from ranks where status='active'") or die("Query School List is inncorrect........");
												while (list($rank_name) = mysqli_fetch_array($result)) {
													echo "<option value='$rank_name'>$rank_name</option>";
												}
												?>
											</select>
										</div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Date of Birth</label>
                      <input type="date" class="form-control" id="birth_date" name="birth_date" max="<?php echo $date_max; ?>" placeholder="Enter Birthdate" required>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Home Address</label>
                      <input type="text" class="form-control" id="home_address" name="home_address" placeholder="Barangay, Municipality/City, Province">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Date Graduated (A.Y.)</label>
                      <select class="form-control" id="date_graduated" name="date_graduated">
                        <?php  
                        $year_start = 1999;
                        $year_end   = 2000;
                        for ($x = 0; $x <= 30; $x++) {
                          $year_start++;
                          $year_end++;
                          echo "<option value='$year_start-$year_end'>$year_start-$year_end</option>";
                        }
                        ?>  
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
                    <?php if(!$isSchool) {
                    ?> 
                    <div class="form-group">
                      <label for="exampleInputEmail1">School Graduated</label>
                        <select class="form-control" id="school_id" name="school_id">
                          <option value="None">None</option>
                            <?php
                            $result = mysqli_query($conn, "select acronym from schools where status='active'") or die("Query School List is inncorrect........");
                            while (list($acronym) = mysqli_fetch_array($result)) {
                              echo "<option value='$acronym'>$acronym</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <br>

                    <?php } ?>
                    <div class="row">
                      <div class="col-6">
                        <a href="admin_rg.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
                      </div>
                      <div class="col-6">
                        <button type="submit" class="btn btn-outline-success" name="submit" style="float: right">Add</button>
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