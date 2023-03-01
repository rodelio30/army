<table id="example" class="table table-hover my-0" style="width:100%">
    <thead>
        <tr>
            <th>Attendee</th>
            <th>Date / Time Attended</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'counter/seminar_attendance_counter.php';

        if ($seminar_attendance_counter > 0) {
                $result = mysqli_query($conn, "select att_id, seminar_id, user_id, date_attended, time_attended from seminar_attendance WHERE seminar_id = $seminars_id ORDER BY att_id") or die("Query for seminar Attendance Error....");
            while (list($att_id, $at_seminar_id, $at_user_id, $date_attended, $time_attended) = mysqli_fetch_array($result)) {
                $time_formatted   = date("g:i a ", strtotime($time_attended));
                $result_tn       = mysqli_query($conn, "SELECT * FROM seminars WHERE seminar_id='$at_seminar_id'");
                while ($res      = mysqli_fetch_array($result_tn)) {
                  $seminar_name = $res['seminar_name'];
                }

                $result_un   = mysqli_query($conn, "SELECT * FROM army_users WHERE id='$at_user_id'");
                while ($res  = mysqli_fetch_array($result_un)) {
                  $firstname = $res['firstname'];
                  $lastname  = $res['lastname'];
                }
                echo "
                    <tr>	
                        <td>$firstname $lastname</td>
                        <td>$date_attended $time_formatted</td>
                    </tr>
                    "; 
                }
        }
          else {
            echo " <tr>	<td></td><td>No Attendee </td></tr>";
        }
        ?>
    </tbody>
</table>