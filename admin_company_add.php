<?php
include 'system_checker.php';
// un_public is username of the user who logged in

if (isset($_POST['submit'])) {
  $rank_letter  = $_POST['rank_letter'];
  $company_name = $_POST['name'];
  $status       = 'inactive';
  $date         = date("Y-m-d");
  $time         = date("h:i:s");

  $duplicate = mysqli_query($conn, "SELECT * FROM company WHERE company_name = '$company_name' OR  rank_letter = '$rank_letter'");
  if (mysqli_num_rows($duplicate) > 0) {
    echo
    "<script> alert('Company or Letter Rank Has Already Taken'); </script>";
  } else {
    // Checking if password confirmation match
    $query = "INSERT INTO company VALUES('','$rank_letter','$company_name','$status','$date','$time','$date','$time','$un_public')";
    mysqli_query($conn, $query);

    echo '<script type="text/javascript"> alert("' . $company_name . ' Added!.")</script>';
    header('Refresh: 0; url=admin_company.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
  <div class="wrapper">
    <?php
    $nav_active = 'company';
    include 'side_navigation.php'
    ?>

    <div class="main">
      <?php include 'top_right_navigation.php' ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><a href="admin_company.php" class="linked-navigation">Company List</a></h1>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <form method="post">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Rank Letter</label>
                      <input type="text" class="form-control" id="rank_letter" name="rank_letter" placeholder="Enter Rank Letter" required>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Company Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter company Name" required>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-6">
                        <a href="admin_company.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
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