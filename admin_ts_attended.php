<?php
include 'system_checker.php';

$isAvailable = false;
$result = mysqli_query($conn, "select training_id, training_name from trainings where status='active'") or die("Query Training list inncorrect........");
while (list($training_id, $training_name) = mysqli_fetch_array($result)) {
$isAvailable = true;
// echo "<option value='$training_id'>$training_name</option>";
} 
$result_seminar = mysqli_query($conn, "select seminar_id, seminar_name from seminars where status='active'") or die("Query Training list inncorrect........");
while (list($seminar_id, $seminar_name) = mysqli_fetch_array($result_seminar)) {
$isAvailable = true;
} 
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
    <div class="wrapper">
        <?php
        $nav_active = 'ts_available';
        include 'side_navigation.php'
        ?>

        <div class="main">
            <?php include 'top_right_navigation.php' ?>

            <main class="content">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-md-9">
                            <h1 class="h3 mb-3" id="action-print"> Training and Seminar Attended
                                <button onclick="window.print();" class="btn btn-outline-primary" id="print-btn"><span data-feather="printer"></span> Print</button>
                            </h1>
                        </div>
                        <div class="col-md-3">
                            <?php if(!$isAvailable) { 
                                    echo "<a href=\"admin_ts_attended.php\" onClick=\"return confirm('No Available Training and Seminar for today')\" class='btn btn-outline-success float-end' id='action-print'><span data-feather='user-plus'></span>&nbsp Add Training or Seminar</a>";
                                ?>
                            <?php } else { ?>
                            <a <?php echo "href=\"admin_ts_add.php\"" ?> style="float: right" id="action-print" class="btn btn-outline-success"><span data-feather="user-plus"></span>&nbsp Add Training or Seminar</a>
                            <?php }?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php include 'print_header.php'?>
                                    <h3 class="print-hidden"><strong>Traiing and Seminar Attended</strong></h3>
                                    <table id="example" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Training or Seminar</th>
                                                <th>Date and Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include 'counter/ts_counter.php';
                                            //   echo "<script>console.log('" . $reservist_counter . "');</script>";
                                            if ($ts_counter > 0) {
                                                $result = mysqli_query($conn, "select att_id, training_id, user_id from training_attendance WHERE user_id = '$id' ORDER BY att_id") or die("Query for attendance....");
                                                while (list($att_id, $at_training_id, $at_user_id) = mysqli_fetch_array($result)) {
                                                    $result_tn       = mysqli_query($conn, "SELECT * FROM trainings WHERE training_id='$at_training_id'");
                                                    while ($res      = mysqli_fetch_array($result_tn)) {
                                                    $training_name = $res['training_name'];
                                                    $t_date        = $res['date_created'];
                                                    $t_time        = $res['time_created'];
                                                    }
                                                    $time_formatted   = date("g:i a ", strtotime($t_time));
                                                    echo "
                                                    <tr>	
                                                        <td scope='row'><a href='admin_training_attended_view.php?ID=$at_training_id' class='linked-navigation'>$training_name</td>
                                                        <td scope='row'>$t_date $time_formatted</td>
                                                    </tr>
                                                ";
                                                }

                                                $result_seminar = mysqli_query($conn, "select att_id, seminar_id, user_id from seminar_attendance WHERE user_id = '$id' ORDER BY att_id") or die("Query for attendance....");
                                                while (list($att_id, $at_seminar_id, $at_user_id) = mysqli_fetch_array($result_seminar)) {
                                                    $result_tn       = mysqli_query($conn, "SELECT * FROM seminars WHERE seminar_id='$at_seminar_id'");
                                                    while ($res      = mysqli_fetch_array($result_tn)) {
                                                    $seminar_name  = $res['seminar_name'];
                                                    $t_date        = $res['date_created'];
                                                    $t_time        = $res['time_created'];
                                                    }
                                                    $time_formatted   = date("g:i a ", strtotime($t_time));
                                                    echo "
                                                    <tr>	
                                                        <td scope='row'><a href='admin_seminar_attended_view.php?ID=$at_seminar_id' class='linked-navigation'>$seminar_name</td>
                                                        <td scope='row'>$t_date $time_formatted</td>
                                                    </tr>
                                                ";
                                                }
                                            } else {
                                                echo " <tr>	
                                                        <td>No Data for Training and Seminar</td>
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