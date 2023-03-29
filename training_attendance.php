<?php 
// if (isset($_POST['approved'])) {
//   $att_id    = $_POST['att_id'];
//   $firstname = $_POST['firstname'];
//   $lastname  = $_POST['lastname'];
//   $status    = 'Approved';

//   mysqli_query($conn, "update training_attendance set status = '$status' where att_id = '$att_id'") or die("Query 4 is incorrect....");

//   echo '<script type="text/javascript"> alert("' . $firstname . ' '. $lastname .' updated!.")</script>';
//   header('Refresh: 0; url=admin_trainings_view.php?ID=$training_id');
// }
?>
<table id="example" class="table table-hover my-0" style="width:100%">
    <thead>
        <tr>
            <th>Attendee</th>
            <th>Date / Time Attended</th>
            <th>Status</th>
            <?php if(!$isReservist && !$isCommander) {?>
            <th>Action</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'counter/training_attendance_counter.php';

        if ($training_attendance_counter > 0) {
                $result = mysqli_query($conn, "select att_id, training_id, army_id, date_attended, time_attended, status from training_attendance WHERE training_id = $trainings_id && status != 'Declined' ORDER BY att_id") or die("Query for Training Attendance Error....");
            while (list($att_id, $at_training_id, $at_army_id, $date_attended, $time_attended, $status) = mysqli_fetch_array($result)) {
                $time_formatted   = date("g:i a ", strtotime($time_attended));
                $result_tn       = mysqli_query($conn, "SELECT * FROM trainings WHERE training_id='$at_training_id'");
                while ($res      = mysqli_fetch_array($result_tn)) {
                  $training_id   = $res['training_id'];
                  $training_name = $res['training_name'];
                }

                $result_un   = mysqli_query($conn, "SELECT * FROM army_users WHERE army_id='$at_army_id'");
                while ($res  = mysqli_fetch_array($result_un)) {
                  $firstname = $res['firstname'];
                  $lastname  = $res['lastname'];
                }
                    if($status == 'Pending' && !$isReservist && !$isCommander){
                    echo "
                        <tr>	
                            <form method='post'>
                                <td>$firstname $lastname</td>
                                <td>$date_attended $time_formatted</td>
                                <td>$status</td>
                                <td>
                                
                                <button type='submit' name='approved' class='btn btn-md btn-outline-primary '>Approved</button>
                                | 
                                <button type='submit' name='declined' class='btn btn-md btn-outline-warning'>Declined</button>
                                </td>
                                <input type='hidden' name='training_id' value='$training_id'>
                                <input type='hidden' name='att_id' value='$att_id'>
                                <input type='hidden' name='firstname' value='$firstname'>
                                <input type='hidden' name='lastname' value='$lastname'>
                            </form>
                        </tr>
                        "; 
                    } else if($status == 'Approved' && !$isReservist && !$isCommander) {
                    echo "
                        <tr>	
                            <form method='post'>
                                <td>$firstname $lastname</td>
                                <td>$date_attended $time_formatted</td>
                                <td>$status</td>
                                <td>
                                <button type='submit' name='declined' class='btn btn-md btn-outline-warning'>Declined</button>
                                </td>
                                <input type='hidden' name='training_id' value='$training_id'>
                                <input type='hidden' name='att_id' value='$att_id'>
                                <input type='hidden' name='firstname' value='$firstname'>
                                <input type='hidden' name='lastname' value='$lastname'>
                            </form>
                        </tr>
                        "; 
                    }
                    else {
                    echo "
                        <tr>	
                                <td>$firstname $lastname</td>
                                <td>$date_attended $time_formatted</td>
                                <td>$status</td>
                        </tr>
                        "; 
                    }
                }
        }
          else {
            if(!$isReservist && !$isCommander){ 
                echo " <tr>	
                <td></td>
                <td>No Attendee </td>
                <td></td>
                <td></td>
                </tr>";
            } else {
                echo " <tr>	
                <td></td>
                <td>No Attendee </td>
                <td></td>
                </tr>";
            }
        }
        ?>
    </tbody>
</table>