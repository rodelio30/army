<?php 
include 'system_checker.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
    <div class="wrapper">
        <?php
		$nav_active = 'users';
		include 'side_navigation.php'
		?>

        <div class="main">
            <?php include 'top_right_navigation.php' ?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3 header-dash">User List</h1>

                    <div class="row" id="areaToPrint">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Latest Users</h5>
                                    <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
                                </div>
                                <div class="card-body">
                                    <div class="col-12 col-lg-12 col-xxl-12">
                                        <div class="card">
                                            <table class="table table-bordered print">
                                                <thead>
                                                    <tr>
                                                      <th>Username</th>
                                                      <th>Date Modified</th>
                                                      <th>Status</th>
                                                      <th>Username</th>
                                                      <th>Date Modified</th>
                                                      <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                    <?php
                                    include 'counter/users_counter.php';

                                    if($users_counter > 0) {
                                        $result = mysqli_query($conn, "select id, username, type, status, date_modified, time_modified from army_users WHERE user_status='active' ORDER BY date_modified") or die("Query for latest reservist....");
                                        while (list($id, $username, $user_type, $status, $date, $time) = mysqli_fetch_array($result)) {
                                            echo "
                                                <tr>	
                                                    <td scope='row'><a href=\"admin_users_view.php?ID=$id\" class='user-clicker'>$username</a></td>
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