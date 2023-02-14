<?php 
require 'include/connect.php';
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

                    <h1 class="h3 mb-3">Reservist List</h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Latest Reservist</h5>
                                </div>
                                <div class="card-body">
                                    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                                        <div class="card flex-fill">
                                            <table class="table table-hover my-0">
                                                <thead>
                                                    <tr>
                                            <th>Username</th>
                                            <th class="d-none d-md-table-cell">Rank</th>
                                            <th class="d-none d-xl-table-cell">Company</th>
                                            <th>Date Modified</th>
                                            <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                    <?php
                                    include 'counter/registration_counter.php';
                                    //   echo "<script>console.log('" . $reservist_counter . "');</script>";

                                    if($reservist_counter > 0) {
                                        $result = mysqli_query($conn, "select reg_id, username, user_type, rank, company, status, date, time from registration_user WHERE status='pending' && user_type='reservist' ORDER BY date") or die("Query for latest reservist....");
                                        while (list($reg_id, $username, $user_type, $rank, $company, $status, $date, $time) = mysqli_fetch_array($result)) {
                                            echo "
                                                <tr>	
                                                    <td scope='row'><a href=\"admin_reg_reservist_view.php?ID=$reg_id\" class='user-clicker'>$username</a></td>
                                                    <td>$rank</td>
                                                    <td>$company</td>
                                                    <td>$date $time</td>
                                                    <td><span class='badge bg-warning' style='font-size: 12px;'>$status</span></td>
                                                </tr>
                                            ";
                                        }
                                    }
                                    else {
                                        echo " <tr>	<td colspan='5' class='text-center'>No Registered User </td></tr>";
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