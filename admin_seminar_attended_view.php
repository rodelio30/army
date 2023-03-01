<?php
include 'system_checker.php';

$seminars_id = $_GET['ID'];
$result       = mysqli_query($conn, "SELECT * FROM seminars WHERE seminar_id='$seminars_id'");
while ($res   = mysqli_fetch_array($result)) {
  $seminar_name   = $res['seminar_name'];
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
  <div class="wrapper">
    <?php
    $nav_active = 'ts_available';
    include 'side_navigation.php'
    ?>

    <div class="main">
      <?php include 'top_right_navigation.php' ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3" id="action-print"><a href="admin_ts_attended.php" class="linked-navigation">Training and Seminar Attended</a> /
            <?php echo $seminar_name ?></h1>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                <?php include 'print_header.php'?>
                <h1 class="h3 mb-3"> <strong>
                <h4>Attendance for: <?php echo $seminar_name ?>  <button onclick="window.print();" class="btn btn-outline-primary" id="print-btn"><span data-feather="printer"></span> Print</button>
                  </h4>
                </strong> 
                </h1>
                <?php include 'seminar_attendance.php'?>
                <?php include 'print_footer.php'?>
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
    <!-- This line below is the jquery for the datatables -->
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/jquery.dataTable.min.js"></script>

</body>

</html>