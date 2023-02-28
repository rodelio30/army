<?php
include 'system_checker.php';
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
                            <h1 class="h3 mb-3" id="action-print">Reserve List
                                <button onclick="window.print();" class="btn btn-outline-primary" id="print-btn"><span data-feather="printer"></span> Print</button>
                            </h1>
                        </div>
                        <div class="col-md-3">
                            <a <?php echo "href=\"admin_rg_add.php\"" ?> style="float: right" id="action-print" class="btn btn-outline-success"><span data-feather="user-plus"></span>&nbsp Add Reserve</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php include 'print_header.php'?>
                                    <h3 class="print-hidden"><strong>Reservist List</strong></h3>
                                    <table id="example" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>AFPSN</th>
                                                <th>Date of Birth</th>
                                                <th>Home Address</th>
                                                <th>Date Graduated</th>
                                                </th>
                                                <?php if($isStaff) {
                                                ?>
                                                <th>School Graduate</th>
                                                <?php }
                                                ?>
                                                <?php if($isSadmin || $isAdmin || $isSchool) {
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
                                                $result = mysqli_query($conn, "select rg_id, name, afpsn, date_of_birth, home_address, date_graduated, school_graduated, status from rotc_graduates WHERE status != 'archive' && school_graduated = '$school_name_public' ORDER BY date_modified") or die("Query for latest reservist....");
                                                } else{
                                                $result = mysqli_query($conn, "select rg_id, name, afpsn, date_of_birth, home_address, date_graduated, school_graduated, status from rotc_graduates WHERE status != 'archive' ORDER BY date_modified") or die("Query for latest reservist....");
                                                }

                                                while (list($rg_id, $name, $afpsn, $date_of_birth, $home_address, $date_graduated, $school_graduated, $status) = mysqli_fetch_array($result)) {
                                                    if($isSadmin || $isAdmin || $isSchool){
                                                    echo "
                                                    <tr>	
                                                        <td scope='row'><a href=\"admin_rg_view.php?ID=$rg_id\" class='user-clicker'>$name</a></td>
                                                        <td scope='row'><a href=\"admin_rg_view.php?ID=$rg_id\" class='user-clicker'>$afpsn</a></td>
                                                        <td>$date_of_birth</td>
                                                        <td>$home_address</td>
                                                        <td>$date_graduated</td>
                                                        <td id='action-print'><a href=\"archive/rg/rg_archive.php?ID=$rg_id\" onClick=\"return confirm('Are you sure you want this rg move to archive?')\" class='btn btn-outline-warning btn-md float-end ms-2'><span><span data-feather='package'></span>&nbsp Archive</a></td>
                                                    </tr>
                                                ";
                                                    } 
                                                    else if ($isStaff) {
                                                    echo "
                                                    <tr>	
                                                        <td scope='row'><a href=\"admin_rg_view.php?ID=$rg_id\" class='user-clicker'>$name</a></td>
                                                        <td scope='row'><a href=\"admin_rg_view.php?ID=$rg_id\" class='user-clicker'>$afpsn</a></td>
                                                        <td>$date_of_birth</td>
                                                        <td>$home_address</td>
                                                        <td>$date_graduated</td>
                                                        <td>$school_graduated</td>
                                                    </tr>
                                                ";
                                                    }
                                                    else {
                                                    echo "
                                                    <tr>	
                                                        <td scope='row'><a href=\"admin_rg_view.php?ID=$rg_id\" class='user-clicker'>$name</a></td>
                                                        <td scope='row'><a href=\"admin_rg_view.php?ID=$rg_id\" class='user-clicker'>$afpsn</a></td>
                                                        <td>$date_of_birth</td>
                                                        <td>$home_address</td>
                                                        <td>$date_graduated</td>
                                                    </tr>
                                                ";
                                                    }
                                                }
                                            } else {
                                                    if($isSadmin || $isAdmin || $isSchool ){ 
                                                        echo " <tr>	
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td class='text-center'>Empty Rotc Graduate</td>
                                                                <td></td>
                                                                <td></td>
                                                                </tr>";
                                                    } else if($isStaff){
                                                        echo " <tr>	
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td class='text-center'>No ROTC Graduate</td>
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