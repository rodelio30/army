<?php 
require 'include/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
    <div class="wrapper">
        <?php
		$nav_active = 'school';
		include 'side_navigation.php'
		?>

        <div class="main">
            <?php include 'top_right_navigation.php' ?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3">School Coordinator List</h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Latest School Coordinator</h5>
                                </div>
                                <div class="card-body">
                                    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                                        <div class="card flex-fill">
                                            <table class="table table-hover my-0">
                                                <thead>
                                                    <tr>
                                                        <th>Username</th>
                                                        <th class="d-none d-md-table-cell">School Name</th>
                                                        <th class="d-none d-xl-table-cell">School Address</th>
                                                        <th>Date Modified</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                    <?php
                                        $result = mysqli_query($conn, "select sc_id, username, school_name, school_address, user_type, status, date, time from registration_sc WHERE status='pending' ORDER BY date") or die("Query for latest reservist....");
                                        while (list($sc_id, $username, $school_name, $school_address, $user_type, $status, $date, $time) = mysqli_fetch_array($result)) {
                                            echo "
                                                <tr>	
                                                    <td scope='row'><a href=\"admin_reg_school_view.php?ID=$sc_id\" class='user-clicker'>$username</a></td>
                                                    <td>$school_name</td>
                                                    <td>$school_address</td>
                                                    <td>$date $time</td>
                                                    <td><span class='badge bg-warning' style='font-size: 12px;'>$status</span></td>
                                                </tr>
                                            ";
                                        }
                                        ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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