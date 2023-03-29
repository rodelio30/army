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
        include 'counter/seminar_attendance_counter.php';

        if ($seminar_attendance_counter > 0) {
                $result = mysqli_query($conn, "select att_id, seminar_id, army_id, date_attended, time_attended, status from seminar_attendance WHERE seminar_id = $seminars_id  && status != 'Declined' ORDER BY att_id") or die("Query for seminar Attendance Error....");
            while (list($att_id, $at_seminar_id, $at_army_id, $date_attended, $time_attended, $status) = mysqli_fetch_array($result)) {
                $time_formatted   = date("g:i a ", strtotime($time_attended));
                $result_tn       = mysqli_query($conn, "SELECT * FROM seminars WHERE seminar_id='$at_seminar_id'");
                while ($res      = mysqli_fetch_array($result_tn)) {
                  $seminar_id   = $res['seminar_id'];
                  $seminar_name = $res['seminar_name'];
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
                                
                                <button type='submit' name='sem_approved' class='btn btn-md btn-outline-primary '>Approved</button>
                                | 
                                <button type='submit' name='sem_declined' class='btn btn-md btn-outline-warning'>Declined</button>
                                </td>
                                <input type='hidden' name='seminar_id' value='$seminar_id'>
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
                                <button type='submit' name='sem_declined' class='btn btn-md btn-outline-warning'>Declined</button>
                                </td>
                                <input type='hidden' name='seminar_id' value='$seminar_id'>
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