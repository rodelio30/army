<?php
include 'system_checker.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
    <div class="wrapper">
        <?php
        $nav_active = 'training';
        include 'side_navigation.php'
        ?>

        <div class="main">
            <?php include 'top_right_navigation.php' ?>

            <main class="content">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-md-9">
                            <h1 class="h3 mb-3" id="action-print">Training List
                                <button onclick="window.print();" class="btn btn-outline-primary" id="print-btn"><span data-feather="printer"></span> Print</button>
                            </h1>
                        </div>
                        <div class="col-md-3">
                            <a <?php echo "href=\"admin_trainings_add.php\"" ?> style="float: right" id="action-print" class="btn btn-outline-success"><span data-feather="user-plus"></span>&nbsp Add
                                Training</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php include 'print_header.php'?>
                                    <h3 class="print-hidden"><strong>Training List</strong></h3>
                                    <table id="example" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Date Modified</th>
                                                <th>Status</th>
                                                </th>
                                                <?php if($isSadmin || $isAdmin || $isSchool) {
                                                ?>
                                                <th id="action-print"><span class="float-end me-5">Action</span> </th>
                                                <?php }
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include 'counter/trainings_counter.php';
                                            //   echo "<script>console.log('" . $reservist_counter . "');</script>";
                                            if ($trainings_counter > 0) {

                                                $result = mysqli_query($conn, "select training_id, training_name, description, status, date_modified from trainings WHERE status != 'archive' ORDER BY date_modified") or die("Query for latest reservist....");
                                                while (list($training_id, $training_name, $description, $status, $date_modified) = mysqli_fetch_array($result)) {
                                                    if($isSadmin || $isAdmin || $isSchool){
                                                    echo "
                                                    <tr>	
                                                        <td scope='row'><a href=\"admin_trainings_view.php?ID=$training_id\" class='user-clicker'>$training_name</a></td>
                                                        <td>$date_modified</td>
                                                        <td>$status</td>
                                                        <td id='action-print'><a href=\"archive/trainings/trainings_archive.php?ID=$training_id\" onClick=\"return confirm('Are you sure you want this training move to archive?')\" class='btn btn-outline-warning btn-md float-end ms-2'><span><span data-feather='package'></span>&nbsp Archive</a></td>
                                                    </tr>
                                                ";
                                                    } else {
                                                    echo "
                                                    <tr>	
                                                        <td scope='row'><a href=\"admin_trainings_view.php?ID=$training_id\" class='user-clicker'>$training_name</a></td>
                                                        <td>$date_modified</td>
                                                        <td>$status</td>
                                                    </tr>
                                                ";
                                                    }
                                                }
                                            } else {
                                                    if($isSadmin || $isAdmin){ 
                                                        echo " <tr>	
                                                                <td></td>
                                                                <td colspan='2' class='text-center'>Empty training</td>
                                                                <td></td>
                                                                <td></td>
                                                                </tr>";
                                                    } else {
                                                        echo " <tr>	
                                                                <td></td>
                                                                <td colspan='2' class='text-center'>Empty training</td>
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