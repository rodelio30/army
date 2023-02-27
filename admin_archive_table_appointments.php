
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="archive_appointments" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Purpose</th>
                            <th>Date Modified</th>
                            <th id="action-print"><span class="float-end me-5">Action</span> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'counter/appointments_counter.php';
                        //   echo "<script>console.log('" . $reservist_counter . "');</script>";
                        if ($archive_appointments_counter > 0) {
                            $result = mysqli_query($conn, "select ap_id, name, purpose, date_appoint from appointments WHERE status = 'archive' ORDER BY date_modified") or die("Query for appointments Archive....");
                            while (list($ap_id, $name, $purpose, $date_appoint) = mysqli_fetch_array($result)) {
                                echo "
                                <tr>	
                                    <td scope='row'>$name</td>
                                    <td scope='row'>$purpose</td>
                                    <td>$date_appoint</td>
                                    <td id='action-print'>
                                    <a href=\"archive/appointments/appointments_delete.php?ID=$ap_id\" onClick=\"return confirm('Are you sure you want to Delete this Event permanent?')\" class='btn btn-outline-danger btn-md float-end ms-2'><span data-feather='file-minus'></span>&nbsp Delete Permanent?</a>
                                    <a href=\"archive/appointments/appointments_active.php?ID=$ap_id\" onClick=\"return confirm('Are you sure you want this Announcement return to active?')\" class='btn btn-outline-primary btn-md float-end'><span data-feather='file-plus'></span>&nbsp Active?</a>
                                    </td>
                                </tr>
                            ";
                            }
                        } else {
                            echo " <tr>	<td></td> <td></td> <td class='text-center'>No Active Announcement</td><td></td> </tr>";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>