<table id="example" class="table table-hover my-0" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Date / Time</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'counter/training_attendance_counter.php';

        if ($training_attendance_counter > 0) {
                $result = mysqli_query($conn, "select att_id, training_id, user_id from training_attendance WHERE training_id = $trainings_id ORDER BY att_id") or die("Query for Training Attendance Error....");
            while (list($att_id, $at_training_id, $at_user_id) = mysqli_fetch_array($result)) {
                $result_tn       = mysqli_query($conn, "SELECT * FROM trainings WHERE training_id='$at_training_id'");
                while ($res      = mysqli_fetch_array($result_tn)) {
                  $training_name = $res['training_name'];
                }

                $result_un   = mysqli_query($conn, "SELECT * FROM army_users WHERE id='$at_user_id'");
                while ($res  = mysqli_fetch_array($result_un)) {
                  $firstname = $res['firstname'];
                  $lastname  = $res['lastname'];
                }
                echo "
            <tr>	
                <td>$training_name</td>
                <td>$firstname $lastname</td>
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