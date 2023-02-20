<?php 
include 'system_checker.php';

$user_id = $_GET['ID'];

if (isset($_POST['update'])) {
  $firstname     = $_POST['firstname'];
  $lastname      = $_POST['lastname'];
  $username      = $_POST['username'];
  $email         = $_POST['email'];
  $user_type     = $_POST['type'];
  $status        = $_POST['status'];
  $user_status   = $_POST['user_status'];

  $date_modified = date("Y-m-d");
  $time_modified = date("h:i:s");

  mysqli_query($conn, "update army_users set firstname = '$firstname', lastname = '$lastname', username = '$username', email = '$email', type = '$user_type', status = '$status', user_status = '$user_status', date_modified = '$date_modified', time_modified = '$time_modified' where id = '$user_id'") or die("Query 4 is incorrect....");

  echo '<script type="text/javascript"> alert("' . $username . ' updated!.")</script>';
  header('Refresh: 0; url=admin_users.php');
  // End of Else in Inactive if
}

$result       = mysqli_query($conn, "SELECT * FROM army_users WHERE id='$user_id'");
while ($res   = mysqli_fetch_array($result)) {
  $user_id       = $res['id'];
  $firstname     = $res['firstname'];
  $middle_name   = $res['middle_name'];
  $lastname      = $res['lastname'];
  $username      = $res['username'];
  $email         = $res['email'];
  $type          = $res['type'];
  $rank          = $res['rank'];
  $company       = $res['company'];
  $afpsn         = $res['afpsn'];
  $status        = $res['status'];
  $user_status   = $res['user_status'];
  $date_modified = $res['date_modified'];
  $time_modified = $res['time_modified'];
}
include 'admin_rids_query.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
    <div class="wrapper">
        <?php
		$nav_active = 'rids';
		include 'side_navigation.php'
		?>

        <div class="main">
            <?php include 'top_right_navigation.php' ?>

            <main class="content">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-md-9">
                        <h1 class="h3 mb-3 header-dash"><a href="admin_rids.php" class="linked-navigation">Reservist ist </a> / <?php echo $username ?>
                            <button onclick="window.print();" class="btn btn-outline-primary" id="print-btn"><span data-feather="printer"></span> Print</button>
                        </h1>
                        </div>
                        <div class="col-md-3">
                            <a <?php echo "href=\"admin_rids_edit.php\"" ?> style="float: right" id="action-print" class="btn btn-outline-primary">&nbsp Edit Info</a>
                        </div>
                    </div>

                    <?php include 'reservist_form_edit.php'?>
                </div>
            </main>

            <?php include 'system_controller/footer.php' ?>
        </div>
    </div>

    <script src="js/app.js"></script>

</body>

</html>