<?php 
include 'system_checker.php';
if (isset($_POST['update'])) {
  $app_id         = $_POST['app_id'];
  $purpose        = $_POST['purpose'];
  $status         = $_POST['status'];
  $date_modified  = date("Y-m-d");
  $time_modified  = date("h:i:s");

  mysqli_query($conn, "update appointments set status = '$status', date_modified = '$date_modified', time_modified = '$time_modified' where ap_id = '$app_id'") or die("Query 4 is incorrect....");

  echo '<script type="text/javascript"> alert("' . $purpose . ' updated!.")</script>';
  header('Refresh: 0; url=admin_appointments.php');
  // End of Else in Inactive if
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
    <div class="wrapper">
        <?php
		$nav_active = 'appoint';
		include 'side_navigation.php'
		?>

        <div class="main">
            <?php include 'top_right_navigation.php' ?>

            <main class="content">
                <div class="container-fluid p-0">

                    <div class="row">
                        <div class="col-md-9">
                        <h1 class="h3 mb-3">Appointment List
                            <button onclick="window.print();" class="btn btn-outline-primary" id="print-btn"><span data-feather="printer"></span> Print</button>
                        </h1>
                        </div>
                        <div class="col-md-3">
                            <a <?php echo "href=\"admin_appointments_add.php\"" ?> style="float: right" id="action-print" class="btn btn-outline-success"><span data-feather="user-plus"></span>&nbsp Add
                                New Appointment</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="example" class="table table-hover my-0" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Purpose</th>
                                                <th>Date & Time</th>
                                                <th>Status</th>
                                                <th id='action-print'><span class="float-end">Action</span</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include 'counter/appointments_counter.php';

                                            if ($appointments_counter > 0) {
                                                    $result = mysqli_query($conn, "select ap_id, name, purpose, text, status, date_appoint, time_appoint from appointments where status != 'archive' ORDER BY date_modified") or die("Query for Appointments....");
                                                while (list($ap_id, $name, $purpose, $text, $status, $date_appoint, $time_appoint) = mysqli_fetch_array($result)) {
                                                    $color_me = '';
                                                    if($status == 'pending') {
                                                        $color_me = 'warning';
                                                    } else if($status == 'approved') {
                                                        $color_me = 'success';
                                                    } else if($status == 'declined') {
                                                        $color_me = 'danger';
                                                    }
                                                    $sel_pending  = "";
                                                    $sel_approved = "";
                                                    $sel_declined= "";

                                                    if ($status == "approved") {
                                                    $sel_approved = "selected";
                                                    } else if ($status == "pending") {
                                                    $sel_pending = "selected";
                                                    } else if ($status == "declined") {
                                                    $sel_declined = "selected";
                                                    }
                                                    echo "
                                                <tr>	
                                                    <form method='post'>
                                                    <td scope='row'><a href=\"admin_appointments_view.php?ID=$ap_id\" class='user-clicker'>$name</a></td>
                                                    <td scope='row'><a href=\"admin_appointments_view.php?ID=$ap_id\" class='user-clicker'>$purpose</a></td>
                                                    <td scope='row'>$date_appoint $time_appoint</td>
                                                    <td>
                                                        <select class='badge bg-$color_me' id='status' value='$status' name='status'>
                                                        <option value='pending' $sel_pending>Pending</option>
                                                        <option value='approved' $sel_approved>Approved</option>
                                                        <option value='declined' $sel_declined>Declined</option>
                                                        </select>
                                                    </td>
                                                    <input type='hidden' name='app_id' value='$ap_id'>
                                                    <input type='hidden' name='purpose' value='$purpose'>
                                                    <td id='action-print'>
                                                        <button type='submit' name='update' class='ms-3 btn btn-md btn-outline-primary '>Update</button>
                                                        <a href=\"archive/appointments/appointments_archive.php?ID=$ap_id\" onClick=\"return confirm('Are you sure you want this user to archive?')\" class='btn btn-outline-warning btn-md'><span><span data-feather='package'></span>&nbsp Archive</a>
                                                    </td>
                                                    </form>
                                                </tr>
                                                        "; 

                                                    }
                                            } else {
                                                echo " <tr>
                                                <td></td>
                                                <td></td>
                                                	<td class='text-center'>No Registered Appointment </td>
                                                <td></td>
                                                <td></td>
                                                    </tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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