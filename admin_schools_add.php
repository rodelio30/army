<?php
include 'system_checker.php';
// un_public is username of the user who logged in

if (isset($_POST['submit'])) {
  $acronym        = $_POST['acronym'];
  $school_name    = $_POST['name'];
  $description    = $_POST['description'];
  $school_address = $_POST['school_address'];
  $status         = 'inactive';
  $date           = date("Y-m-d");
  $time           = date("h:i:s");

  $duplicate = mysqli_query($conn, "SELECT * FROM schools WHERE school_name = '$school_name' OR  acronym = '$acronym'");
  if (mysqli_num_rows($duplicate) > 0) {
    echo
    "<script> alert('Acronym or School name Has Already Taken'); </script>";
  } else {
    // Checking if password confirmation match
    $query = "INSERT INTO schools VALUES('','$school_name','$acronym','$description','$school_address','$status','$date','$time','$date','$time','$un_public')";
    mysqli_query($conn, $query);

    echo '<script type="text/javascript"> alert("' . $school_name . ' Added!.")</script>';
    header('Refresh: 0; url=admin_schools.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
  <div class="wrapper">
    <?php
    $nav_active = 'schools';
    include 'side_navigation.php'
    ?>

    <div class="main">
      <?php include 'top_right_navigation.php' ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><a href="admin_schools.php" class="linked-navigation">School List</a></h1>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title mb-0">Latest School</h5>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Acronym</label>
                      <input type="text" class="form-control" id="acronym" name="acronym" placeholder="Enter School Acronym" required autofocus>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">School Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter School Name" required>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">School Address</label>
                      <input type="text" class="form-control" id="school_address" name="school_address" placeholder="Enter School Address">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" required>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-6">
                        <a href="admin_schools.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
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