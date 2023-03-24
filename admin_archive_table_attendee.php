
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="archive_attendee" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Attendee</th>
                            <th>Training Name</th>
                            <th>Status</th>
                            <th id="action-print"><span class="float-end me-5">Action</span> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'counter/trainings_counter.php';
                        //   echo "<script>console.log('" . $reservist_counter . "');</script>";
                        if ($archive_attendee_counter > 0) {
                            // Getting information for trainings
                        $result = mysqli_query($conn, "select att_id, training_id, user_id, date_attended, time_attended, status from training_attendance WHERE status = 'Declined'ORDER BY att_id") or die("Query for Training Attendance Error....");
                    while (list($att_id, $at_training_id, $at_user_id, $date_attended, $time_attended, $status) = mysqli_fetch_array($result)) {
                        $time_formatted   = date("g:i a ", strtotime($time_attended));
                        $result_tn       = mysqli_query($conn, "SELECT * FROM trainings WHERE training_id='$at_training_id'");
                        while ($res      = mysqli_fetch_array($result_tn)) {
                        $training_id   = $res['training_id'];
                        $training_name = $res['training_name'];
                        }
                        $result_un   = mysqli_query($conn, "SELECT * FROM army_users WHERE id='$at_user_id'");
                        while ($res  = mysqli_fetch_array($result_un)) {
                        $firstname = $res['firstname'];
                        $lastname  = $res['lastname'];
                        }

                                echo "
                                <tr>	
                                    <td scope='row'>$firstname $lastname</td>
                                    <td scope='row'>$training_name</td>
                                    <td>$status</td>
                                    <td id='action-print'>
                                    <a href=\"archive/trainings/attendee_delete.php?ID=$att_id\" onClick=\"return confirm('Are you sure you want to Delete this Attendee permanent?')\" class='btn btn-outline-danger btn-sm float-end ms-2'><span data-feather='file-minus'></span>&nbsp Delete Permanent?</a>
                                    <a href=\"archive/trainings/attendee_active.php?ID=$att_id\" onClick=\"return confirm('Are you sure you want this Attendee return to active?')\" class='btn btn-outline-primary btn-sm float-end'><span data-feather='file-plus'></span>&nbsp Active?</a>
                                    </td>
                                </tr>
                            ";

                        }

                            // Getting information for seminars 
                        $result = mysqli_query($conn, "select att_id, seminar_id, user_id, date_attended, time_attended, status from seminar_attendance WHERE status = 'Declined' ORDER BY att_id") or die("Query for Seminar Attendance Error....");
                    while (list($att_id, $at_seminar_id, $at_user_id, $date_attended, $time_attended, $status) = mysqli_fetch_array($result)) {
                        $time_formatted   = date("g:i a ", strtotime($time_attended));
                        $result_tn       = mysqli_query($conn, "SELECT * FROM seminars WHERE seminar_id='$at_seminar_id'");
                        while ($res      = mysqli_fetch_array($result_tn)) {
                        $seminar_id   = $res['seminar_id'];
                        $seminar_name = $res['seminar_name'];
                        }
                        $result_un   = mysqli_query($conn, "SELECT * FROM army_users WHERE id='$at_user_id'");
                        while ($res  = mysqli_fetch_array($result_un)) {
                        $firstname = $res['firstname'];
                        $lastname  = $res['lastname'];
                        }

                                echo "
                                <tr>	
                                    <td scope='row'>$firstname $lastname</td>
                                    <td scope='row'>$seminar_name</td>
                                    <td>$status</td>
                                    <td id='action-print'>
                                    <a href=\"archive/seminars/attendee_delete.php?ID=$att_id\" onClick=\"return confirm('Are you sure you want to Delete this Attendee permanent?')\" class='btn btn-outline-danger btn-sm float-end ms-2'><span data-feather='file-minus'></span>&nbsp Delete Permanent?</a>
                                    <a href=\"archive/seminars/attendee_active.php?ID=$att_id\" onClick=\"return confirm('Are you sure you want this Attendee return to active?')\" class='btn btn-outline-primary btn-sm float-end'><span data-feather='file-plus'></span>&nbsp Active?</a>
                                    </td>
                                </tr>
                            ";

                        }
                }
                else {
                    echo " <tr>	
                    <td></td>
                    <td>No Attendee </td>
                    <td></td>
                    <td></td>
                    </tr>";
                }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>