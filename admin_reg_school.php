<?php 
include 'system_checker.php';
if(!$isSadmin){
  header("Location: index.php");
}
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

                    <h1 class="h3 mb-3 header-dash">School Coordinator List
                        <button onclick="window.print();" class="btn btn-outline-primary" id="print-btn"><span data-feather="printer"></span> Print</button>
                    </h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php include 'print_header.php'?>
                                    <h3 class="print-hidden"><strong>School Coordinator List</strong></h3>
                                            <table id="example" class="table table-hover my-0">
                                                <thead>
                                                    <tr>
                                                        <th>Username</th>
                                                        <th>School Name</th>
                                                        <th>School Address</th>
                                                        <th>Date Modified</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                <?php
                                    include 'counter/registration_counter.php';
                                    //   echo "<script>console.log('" . $reservist_counter . "');</script>";
                                    if($sc_counter > 0) {
                                        $result = mysqli_query($conn, "select reg_id, username, user_type, rank_id, school_id, status, date, time from registration_user WHERE status = 'pending' && user_type='school_coordinator' ORDER BY date") or die("Query for latest reservist....");
                                        while (list($reg_id, $username, $user_type, $rank_id, $school_id, $status, $date, $time) = mysqli_fetch_array($result)) {
                                                // include 'admin_query_getter.php';
                                                include 'admin_query_getter_school.php';
                                                echo "
                                                    <tr>	
                                                        <td scope='row'><a href=\"admin_reg_school_view.php?ID=$reg_id\" class='user-clicker'>$username</a></td>
                                                        <td>$school_name</td>
                                                        <td>$school_address</td>
                                                        <td>$date $time</td>
                                                        <td><span class='badge bg-warning' style='font-size: 12px;'>$status</span></td>
                                                    </tr>
                                                ";
                                            }
                                            }
                                            else {
                                                echo " <tr>	
                                                <td></td>
                                                <td></td>
                                                <td class='text-center'>No Registered User </td>
                                                <td></td>
                                                <td></td>
                                                </tr>";
                                            }
                                        ?>
                                                </tbody>
                                            </table>
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