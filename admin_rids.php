<?php 
include 'system_checker.php';
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

                    <h1 class="h3 mb-3">Reservist List
                        <button onclick="window.print();" class="btn btn-outline-primary" id="print-btn"><span data-feather="printer"></span> Print</button>
                    </h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="example" class="table table-hover my-0" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <?php if($isSadmin || $isAdmin) {
                                                ?>
                                                <th id='action-print'><span class="float-end">Action</span</th>
                                                <?php }
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include 'counter/users_counter.php';

                                            if ($users_counter > 0) {
                                                    $result = mysqli_query($conn, "select id, username, type, status, date_modified, time_modified from army_users WHERE type = 'reservist' && user_status='active' && id != $id ORDER BY date_modified") or die("Query for latest reservist....");
                                                while (list($army_id, $username, $user_type, $status, $date, $time) = mysqli_fetch_array($result)) {
                                                    $color_me = '';
                                                    if($status == 'pending') {
                                                        $color_me = 'warning';
                                                    } else if($status == 'ready') {
                                                        $color_me = 'success';
                                                    } else if($status == 'standby') {
                                                        $color_me = 'primary';
                                                    } else if($status == 'retired') {
                                                        $color_me = 'secondary';
                                                    }
                                                    if($isSadmin || $isAdmin) {
                                                    echo "
                                                <tr>	
                                                    <td scope='row'><a href=\"admin_rids_view.php?ID=$army_id\" class='user-clicker'>$username</a></td>
                                                    <td scope='row'><a href=\"admin_rids_view.php?ID=$army_id\" class='user-clicker'>$user_type</a></td>
                                                    <td><span class='badge bg-$color_me' style='font-size: 12px;'>$status</span></td>
                                                    <td id='action-print'><a href=\"archive/army_users/army_users_archive.php?ID=$army_id\" onClick=\"return confirm('Are you sure you want this user to archive?')\" class='btn btn-outline-warning btn-md float-end'><span><span data-feather='package'></span>&nbsp Archive</a></td>
                                                </tr>
                                                        "; 
                                                    }
                                                    else {
                                                    echo "
                                                        <tr>	
                                                            <td scope='row'><a href=\"admin_rids_view.php?ID=$army_id\" class='user-clicker'>$username</a></td>
                                                            <td>$user_status</td>
                                                            <td><span class='badge bg-$color_me' style='font-size: 12px;'>$status</span></td>
                                                        </tr>
                                                    ";
                                                    }

                                                    }
                                            } else {
                                                echo " <tr>	<td colspan='4' class='text-center'>No Registered User </td></tr>";
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