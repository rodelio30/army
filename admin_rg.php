<?php
include 'system_checker.php';
if($isReservist){
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
    <div class="wrapper">
        <?php
        $nav_active = 'rotc';
        include 'side_navigation.php'
        ?>

        <div class="main">
            <?php include 'top_right_navigation.php' ?>

            <main class="content">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-md-9">
                            <h1 class="h3 mb-3" id="action-print">Reservist List
                                <button onclick="window.print();" class="btn btn-outline-primary" id="print-btn"><span data-feather="printer"></span> Print</button>
                            </h1>
                        </div>
                        <div class="col-md-3">
                            <?php if(!$isCommander) {
                            ?>
                            <a <?php echo "href=\"admin_rg_add.php\"" ?> style="float: right" id="action-print" class="btn btn-outline-success"><span data-feather="user-plus"></span>&nbsp Add Reservist</a>
                            <?php }
                            ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php include 'print_header.php'?>
                                    <h3 class="print-hidden"><strong>ROTC Graduate List</strong></h3>
                                    <table id="example" class="table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Rank</th>
                                                <th>Name</th>
                                                <th>AFPSN</th>
                                                <th>Date of Birth</th>
                                                <th>School Graduated</th>
                                                <th>Date Graduated</th>
                                                <th>User Status</th>
                                                <?php if($isSadmin) {
                                                ?>
                                                <th id="action-print"><span class="float-end me-5">Action</span> </th>
                                                <?php }
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include 'counter/rg_counter.php';
                                            //   echo "<script>console.log('" . $reservist_counter . "');</script>";
                                            if ($rg_counter > 0) {

                                                if($isSchool){
                                                $result = mysqli_query($conn, "select rg_id, firstname, middle_initial, lastname, extname, afpsn, rank, date_of_birth, home_address, date_graduated, school_graduated, user_status from reservists WHERE user_status != 'archive' && school_graduated = '$school_name_public' ORDER BY date_modified") or die("Query for latest reservist....");
                                                } else{
                                                $result = mysqli_query($conn, "select rg_id, firstname, middle_initial, lastname, extname, afpsn, rank, date_of_birth, home_address, date_graduated, school_graduated, user_status from reservists WHERE user_status != 'archive' ORDER BY date_modified") or die("Query for latest reservist....");
                                                }

                                                while (list($rg_id, $firstname, $middle_initial, $lastname, $extname, $afpsn, $rank, $date_of_birth, $home_address, $date_graduated, $school_graduated, $user_status) = mysqli_fetch_array($result)) {
                                                    if($isSadmin){
                                                    echo "
                                                    <tr>	
                                                        <td scope='row'><a href=\"admin_rg_view.php?ID=$rg_id\" class='user-clicker'>$rank</a></td>
                                                        <td scope='row'><a href=\"admin_rg_view.php?ID=$rg_id\" class='user-clicker'>$firstname $middle_initial $lastname $extname</a></td>
                                                        <td scope='row'><a href=\"admin_rg_view.php?ID=$rg_id\" class='user-clicker'>$afpsn</a></td>
                                                        <td>$date_of_birth</td>
                                                        <td>$school_graduated</td>
                                                        <td>$date_graduated</td>
                                                        <td>$user_status</td>
                                                        <td id='action-print'><a href=\"archive/reservist/reservist_archive.php?ID=$rg_id\" onClick=\"return confirm('Are you sure you want this rg move to archive?')\" class='btn btn-outline-warning btn-md float-end ms-2'><span><span data-feather='package'></span>&nbsp Archive</a></td>
                                                    </tr>
                                                ";
                                                    } 
                                                    else if ($isStaff) {
                                                    echo "
                                                    <tr>	
                                                        <td scope='row'><a href=\"admin_rg_view.php?ID=$rg_id\" class='user-clicker'>$rank</a></td>
                                                        <td scope='row'><a href=\"admin_rg_view.php?ID=$rg_id\" class='user-clicker'>$firstname $middle_initial $lastname $extname</a></td>
                                                        <td scope='row'><a href=\"admin_rg_view.php?ID=$rg_id\" class='user-clicker'>$afpsn</a></td>
                                                        <td>$date_of_birth</td>
                                                        <td>$school_graduated</td>
                                                        <td>$date_graduated</td>
                                                        <td>$user_status</td>
                                                    </tr>
                                                ";
                                                    }
                                                    else {
                                                    echo "
                                                    <tr>	
                                                        <td scope='row'><a href=\"admin_rg_view.php?ID=$rg_id\" class='user-clicker'>$rank</a></td>
                                                        <td scope='row'><a href=\"admin_rg_view.php?ID=$rg_id\" class='user-clicker'>$firstname $middle_initial $lastname $extname</a></td>
                                                        <td scope='row'><a href=\"admin_rg_view.php?ID=$rg_id\" class='user-clicker'>$afpsn</a></td>
                                                        <td>$date_of_birth</td>
                                                        <td>$school_graduated</td>
                                                        <td>$date_graduated</td>
                                                        <td>$user_status</td>
                                                    </tr>
                                                ";
                                                    }
                                                }
                                            } else {
                                                    if($isSadmin){ 
                                                        echo " <tr>	
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td class='text-center'>Empty Rotc Graduate</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                </tr>";
                                                    } else {
                                                        echo " <tr>	
                                                                <td></td>
                                                                <td></td>
                                                                <td class='text-center'>No ROTC Graduate</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                </tr>";
                                                    }
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