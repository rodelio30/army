<?php 
require 'include/connect.php';
// include 'admin_checker.php';

$reservist_id = $_GET['ID'];

$result       = mysqli_query($conn, "SELECT * FROM registration_user WHERE reg_id='$reservist_id'");
while ($res   = mysqli_fetch_array($result)) {
  $reservist_id  = $res['reg_id'];
  $firstname     = $res['firstname'];
  $lastname      = $res['lastname'];
  $email         = $res['email'];
  $type          = $res['type'];
  $status        = $res['status'];
}

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

                    <h1 class="h3 mb-3">Reservist List / User Name</h1>

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
                                      <?php echo $type ?>
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