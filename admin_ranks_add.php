<?php
include 'system_checker.php';
// un_public is username of the user who logged in

$result       = mysqli_query($conn, "SELECT * FROM ranks");
while ($res   = mysqli_fetch_array($result)) {
  $ranked = $res['ranked'];
}

if (isset($_POST['submit'])) {
  $acronym    = $_POST['acronym'];
  $rank_name = $_POST['name'];
  $status    = 'inactive';
  $date      = date("Y-m-d");
  $time      = date("h:i:s");

  $duplicate = mysqli_query($conn, "SELECT * FROM ranks WHERE rank_name = '$rank_name' OR  acronym = '$acronym'");
  if (mysqli_num_rows($duplicate) > 0) {
    echo
    "<script> alert('Rank Classification or Rank name Has Already Taken'); </script>";
  } else {
    // Checking if password confirmation match
    $query = "INSERT INTO ranks VALUES('','','$acronym','$rank_name','$status','$date','$time','$date','$time','$un_public')";
    mysqli_query($conn, $query);

    echo '<script type="text/javascript"> alert("' . $rank_name . ' Added!.")</script>';
    header('Refresh: 0; url=admin_ranks_add.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
  <div class="wrapper">
    <?php
    $nav_active = 'rank';
    include 'side_navigation.php'
    ?>

    <div class="main">
      <?php include 'top_right_navigation.php' ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><a href="admin_ranks.php" class="linked-navigation">Rank List</a></h1>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header" style="margin-bottom: -2rem;">
                  <h5 class="card-title">Add new Rank</h5>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Rank</label>
                      <input type="text" class="form-control" id="acronym" name="acronym" placeholder="Enter Rank Abbreviation" required>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Rank Description</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Rank Title" required>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-6">
                        <a href="admin_ranks.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
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