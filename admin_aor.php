<?php
include 'system_checker.php';
if($isSchool){
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
    <div class="wrapper">
        <?php
        $nav_active = 'aor';
        include 'side_navigation.php'
        ?>

        <div class="main">
            <?php include 'top_right_navigation.php' ?>

            <main class="content">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-md-9">
                            <h1 class="h3 mb-3" id="action-print"> Area of Responsibility
                                <button onclick="window.print();" class="btn btn-outline-primary" id="print-btn"><span data-feather="printer"></span> Print</button>
                            </h1>
                        </div>
                        <div class="col-md-3">
                            <?php if($isSadmin || $isAdmin) {
                            ?>
                            <a <?php echo "href=\"admin_aor_add.php\"" ?> style="float: right" id="action-print" class="btn btn-outline-success"><span data-feather="user-plus"></span>&nbsp Add new AoR</a>
                            <?php }
                            ?>


                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php include 'print_header.php'?>
                                    <!-- <h3 class="print-hidden"><strong>Rank List</strong></h3> -->
                                    <h3 class="text-center">CITY/MUNICIPALITY</h3>
                                    <table id="example" class="table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>AoR</th>
                                                <th>Location</th>
                                                <?php if($isSadmin) {
                                                ?>
                                                <th id="action-print"><span class="float-end me-5">Action</span> </th>
                                                <?php }
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include 'counter/aor_counter.php';
                                            //   echo "<script>console.log('" . $reservist_counter . "');</script>";
                                            if ($aor_counter > 0) {
                                                $result = mysqli_query($conn, "select aor_id, company_id, place from aor WHERE status != 'archive' ORDER BY company_id") or die("Query for latest reservist....");
                                                while (list($aor_id, $company_id, $place) = mysqli_fetch_array($result)) {

                                                    // getting the status of Company Commander
                                                    $result_active  = mysqli_query($conn, "SELECT * FROM company WHERE status='active' && company_id = '$company_id '");
                                                    while ($res  = mysqli_fetch_array($result_active)) {
                                                    $status_com   = $res['status'];
                                                    $company_name = $res['company_name'];
                                                    if($status_com == 'active') {
                                                        if($isSadmin){
                                                                    echo "
                                                                    <tr>	
                                                                        <td scope='row'><a href=\"admin_aor_view.php?ID=$aor_id\" class='user-clicker'>$company_name</a></td>
                                                                        <td scope='row'><a href=\"admin_aor_view.php?ID=$aor_id\" class='user-clicker'>$place</a></td>
                                                                        <td id='action-print'><a href=\"archive/aor/aor_archive.php?ID=$aor_id\" onClick=\"return confirm('Are you sure you want this aor move to archive?')\" class='btn btn-outline-warning btn-md float-end ms-2'><span><span data-feather='package'></span>&nbsp Archive</a></td>
                                                                    </tr>
                                                                ";
                                                                    } else { 
                                                                echo "
                                                                <tr>	
                                                                    <td scope='row'><a href=\"admin_aor_view.php?ID=$aor_id\" class='user-clicker'>$company_name</a></td>
                                                                    <td scope='row'><a href=\"admin_aor_view.php?ID=$aor_id\" class='user-clicker'>$place</a></td>
                                                                </tr>
                                                            ";
                                                                }

                                                        }
                                                    // End of if Active
                                                    }
                                                }
                                            } else {
                                                if($isSadmin){
                                                    echo " <tr>	
                                                            <td>No Record found</td>
                                                            <td></td>
                                                            <td></td>
                                                            </tr>";
                                                } else {
                                                    echo " <tr>	
                                                            <td>No Record found</td>
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