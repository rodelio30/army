<?php
include 'system_checker.php';
// un_public is username of the user who logged in

if (isset($_POST['submit'])) {
  $seminar_name = $_POST['seminar_name'];
  $description   = $_POST['description'];
  $status        = 'inactive';
  $date          = date("Y-m-d");
  $time          = date("h:i:s");

  $duplicate = mysqli_query($conn, "SELECT * FROM seminars WHERE seminar_name = '$seminar_name'");
  if (mysqli_num_rows($duplicate) > 0) {
    echo
    "<script> alert('This Traning Has Already Taken'); </script>";
  } else {
    // Checking if password confirmation match
    $query = "INSERT INTO seminars VALUES('','$seminar_name','$description','$status','','$date','$time','$date','$time')";
    mysqli_query($conn, $query);

    echo '<script type="text/javascript"> alert("' . $seminar_name . ' Added!.")</script>';
    header('Refresh: 0; url=admin_seminars.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
  <div class="wrapper">
    <?php
    $nav_active = 'seminars';
    include 'side_navigation.php'
    ?>

    <div class="main">
      <?php include 'top_right_navigation.php' ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><a href="admin_seminars.php" class="linked-navigation">Seminars List</a></h1>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <form method="post">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Seminar Name</label>
                      <input type="text" class="form-control" id="seminar_name" name="seminar_name" placeholder="Enter seminar name" required autofocus>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" required>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-6">
                        <a href="admin_seminars.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
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