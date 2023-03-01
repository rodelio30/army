<?php
include 'system_checker.php';
// un_public is username of the user who logged in

if (isset($_POST['submit'])) {
  $training_name = $_POST['training_name'];
  $link          = $_POST['link'];
  $description   = $_POST['description'];
  $status        = 'inactive';
  $date          = date("Y-m-d");
  $time          = date("h:i:s");

  $duplicate = mysqli_query($conn, "SELECT * FROM trainings WHERE training_name = '$training_name' OR link = '$link'");
  if (mysqli_num_rows($duplicate) > 0) {
    echo
    "<script> alert('This Traning or Link Has Already Taken'); </script>";
  } else {
    // Checking if password confirmation match
    $query = "INSERT INTO trainings VALUES('','$training_name','$description','$link','$status','','$date','$time','$date','$time')";
    mysqli_query($conn, $query);

    echo '<script type="text/javascript"> alert("' . $training_name . ' Added!.")</script>';
    header('Refresh: 0; url=admin_trainings.php');
  }
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
          <h1 class="h3 mb-3"><a href="admin_trainings.php" class="linked-navigation">Trainings List</a></h1>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <form method="post">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Training Name</label>
                      <input type="text" class="form-control" id="training_name" name="training_name" placeholder="Enter training name" required autofocus>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Link</label>
                      <input type="url" class="form-control" id="link" name="link" placeholder="Enter Link" required>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" required>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-6">
                        <a href="admin_trainings.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
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