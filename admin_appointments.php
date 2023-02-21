<?php 
include 'system_checker.php';
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
                                                <th>Reservist</th>
                                                <th>Subject</th>
                                                <th>Commander</th>
                                                <th>Date & Time</th>
                                                <th>Status</th>
                                                <th id='action-print'><span class="float-end">Action</span</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include 'counter/appointments_counter.php';

                                            if ($appointments_counter > 0) {
                                                    $result = mysqli_query($conn, "select ap_id, reservist_id, commander_id, subject, text, status, date_appoint, time_appoint from appointments ORDER BY date_modified") or die("Query for Appointments....");
                                                while (list($ap_id, $reservist_id, $commander_id, $subject, $text, $status, $date_appoint, $time_appoint) = mysqli_fetch_array($result)) {
                                                    $color_me = '';
                                                    if($status == 'pending') {
                                                        $color_me = 'warning';
                                                    } else if($status == 'active') {
                                                        $color_me = 'success';
                                                    } else if($status == 'inactive') {
                                                        $color_me = 'danger';
                                                    }
                                                    echo "
                                                <tr>	
                                                    <td scope='row'><a href=\"admin_appointments_view.php?ID=$ap_id\" class='user-clicker'>$reservist_id</a></td>
                                                    <td scope='row'><a href=\"admin_appointments_view.php?ID=$ap_id\" class='user-clicker'>$subject</a></td>
                                                    <td scope='row'><a href=\"admin_appointments_view.php?ID=$ap_id\" class='user-clicker'>$commander_id</a></td>
                                                    <td scope='row'>$date_appoint $time_appoint</td>
                                                    <td><span class='badge bg-$color_me' style='font-size: 12px;'>$status</span></td>
                                                    <td id='action-print'><a href=\"archive/army_users/army_users_archive.php?ID=$ap_id\" onClick=\"return confirm('Are you sure you want this user to archive?')\" class='btn btn-outline-warning btn-md float-end'><span><span data-feather='package'></span>&nbsp Archive</a></td>
                                                </tr>
                                                        "; 

                                                    }
                                            } else {
                                                echo " <tr>
                                                <td></td>
                                                <td></td>
                                                	<td class='text-center'>No Registered User </td>
                                                <td></td>
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