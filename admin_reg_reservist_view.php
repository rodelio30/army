<?php 
include 'system_checker.php';
if(!$isSadmin){
  header("Location: index.php");
}
// include 'admin_checker.php';

$reservist_id = $_GET['ID'];

$result       = mysqli_query($conn, "SELECT * FROM registration_user WHERE reg_id='$reservist_id' && user_type='reservist' ");
while ($res   = mysqli_fetch_array($result)) {
  $reservist_id = $res['reg_id'];
  $firstname    = $res['firstname'];
  $lastname     = $res['lastname'];
  $username     = $res['username'];
  $email        = $res['email'];
  $user_type    = $res['user_type'];
  $rank_id         = $res['rank_id'];
  $company_id      = $res['company_id'];
  $afpsn        = $res['afpsn'];
  $status       = $res['status'];
  $user_status  = $res['user_status'];
  $date         = $res['date'];
  $time         = $res['time'];
}
include 'admin_query_getter.php';

// $time_formatted  = date("g:i a ", strtotime($time_created));
// $time_m_formatted  = date("g:i a ", strtotime($time_modified));
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
    <div class="wrapper">
        <?php
		$nav_active = 'reservist';
		include 'side_navigation.php'
		?>

        <div class="main">
            <?php include 'top_right_navigation.php' ?>

            <main class="content">
                <div class="container-fluid p-0">
                  <div class="row">
                    <div class="col-6">
                      <h1 class="h3 mb-3"><a href="admin_reg_reservist.php" class="linked-navigation">Reservist List </a> / <?php echo $firstname . ' ' . $lastname ?></h1>
                    </div>
                    <div class="col-6">
                      <?php 
                      if($isSadmin || $isAdmin){
                      ?>
                        <a <?php echo "href=\"admin_reg_reservist_edit.php?ID=$reservist_id\" " ?> class="btn btn-md btn-outline-success mb-0" style="float:right">Update</a>
                      <?php } ?>
                    </div>
                  </div> 
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Latest Reservist</h5>
                                </div>
                                <div class="card-body">
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0 flatpickr-weekwrapper"><strong>Name</strong></h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                    <div class="flatpickr-weekwrapper">
                                      <?php echo $firstname .' '. $lastname?>
                                    </div>
                                  </div>
                                </div>
                                <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0 flatpickr-weekwrapper"><strong>Username</strong></h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                    <div class="flatpickr-weekwrapper">
                                      <?php echo $username ?>
                                    </div>
                                  </div>
                                </div>
                                <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0 flatpickr-weekwrapper"><strong>Email</strong></h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                    <div class="flatpickr-weekwrapper">
                                      <?php echo $email?>
                                    </div>
                                  </div>
                                </div>
                                <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0 flatpickr-weekwrapper"><strong>Type</strong></h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                    <div class="flatpickr-weekwrapper">
                                      <?php echo $user_type ?>
                                    </div>
                                  </div>
                                </div>
                                <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0 flatpickr-weekwrapper"><strong>Rank</strong></h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                    <div class="flatpickr-weekwrapper">
                                      <?php echo $rank_name ?>
                                    </div>
                                  </div>
                                </div>
                                <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0 flatpickr-weekwrapper"><strong>Company</strong></h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                    <div class="flatpickr-weekwrapper">
                                      <?php echo $company_name ?>
                                    </div>
                                  </div>
                                </div>
                                <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0 flatpickr-weekwrapper"><strong>AFPSN</strong></h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                    <div class="flatpickr-weekwrapper">
                                      <?php echo $afpsn ?>
                                    </div>
                                  </div>
                                </div>
                                <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0 flatpickr-weekwrapper"><strong>Status</strong></h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                    <div class="flatpickr-weekwrapper">
                                      <?php echo $status ?>
                                    </div>
                                  </div>
                                </div>
                                <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0 flatpickr-weekwrapper"><strong>User Status</strong></h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                    <div class="flatpickr-weekwrapper">
                                      <?php echo $user_status ?>
                                    </div>
                                  </div>
                                </div>
                                <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0 flatpickr-weekwrapper"><strong>Date</strong></h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                    <div class="flatpickr-weekwrapper">
                                      <?php echo $date .'/'. $time ?>
                                    </div>
                                  </div>
                                </div>
                                <hr>
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