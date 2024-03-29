<?php
include 'system_checker.php';
if($isSchool){
  header("Location: index.php");
}
// un_public is username of the user who logged in

$com_id = '';

if(isset($_GET['com_id'])){
  $com_id = $_GET['com_id'];
}

if (isset($_POST['submit'])) {
  if($com_id== ''){
    $company_name = $_POST['company_name'];
  } else {
    $company_name = $com_id;
  }
  $place        = $_POST['place'];
  $status       = 'active';
  $date         = date("Y-m-d");
  $time         = date("h:i:s");

  $duplicate = mysqli_query($conn, "SELECT * FROM aor WHERE place LIKE '%$place%'");
  if (mysqli_num_rows($duplicate) > 0) {
    echo
    "<script> alert('Area of Responsibility Has Already Taken'); </script>";
  } else {
    // Checking if password confirmation match
    $query = "INSERT INTO aor VALUES('','$company_name','$place','$status')";
    mysqli_query($conn, $query);

    echo '<script type="text/javascript"> alert("' . $place . ' Added!.")</script>';
    header('Refresh: 0; url=admin_aor.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
  <div class="wrapper">
    <?php
    $nav_active = 'aor';
    include 'side_navigation.php'
    ?>

    <div class="main">
      <?php include 'top_right_navigation.php' ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><a href="admin_aor.php" class="linked-navigation">Area of Responsibility List</a></h1>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <form method="post" autocomplete="off">
                    <?php 
                  if($com_id == ''){ 
                    ?>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Company Name</label>
                      <!-- <input type="text" class="form-control" id="name" name="name" placeholder="Enter company Name" required> -->
                      <select class="form-control" id="company_name" name="company_name">
                          <?php
                          $result = mysqli_query($conn, "select company_id, company_name from company where status='active'") or die("Query School List is inncorrect........");
                          while (list($company_id, $company_name) = mysqli_fetch_array($result)) {
                            echo "<option value='$company_id'>$company_name</option>";
                          }
                          ?>
                      </select>
                    </div>
                    <br>
                  <?php } ?>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Location</label>
                      <input type="text" class="form-control" id="place" name="place" placeholder="Enter City/Municipality" required>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-6">
                        <a href="admin_aor.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
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